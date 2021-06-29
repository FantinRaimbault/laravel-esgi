<?php

namespace App\Models;

use App\Models\Project;
use App\Models\Invitation;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Session;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function projects()
    {
        return $this->belongsToMany(Project::class, 'contributors')->withPivot(['role', 'id']);;
    }

    public function invitations()
    {
        return $this->hasMany(Invitation::class);
    }

    public function getContributor(int $projectId)
    {
        return Contributor::where([
            ['user_id', '=', $this->id],
            ['project_id', '=', $projectId],
        ])->first();
    }

    public function getRole(int $projectId) {
        return Contributor::where([
            ['user_id', '=', $this->id],
            ['project_id', '=', $projectId],
        ])->first()->role;
    }

    public function canEditContributor($targetContributor) {
        error_log('totototo');
        $contributor = Auth::user()->projects()->where('projects.id', Session::get('currentProject')['id'])->first()->pivot;
        if($contributor->user_id === $targetContributor->user_id) {
            return true;
        } else {
            switch ($contributor->role) {
                case Config::get('constants.contributors.roles.editor'):
                    return false;
                case Config::get('constants.contributors.roles.admin'):
                    return $targetContributor->role !== Config::get('constants.contributors.roles.superAdmin');
                case Config::get('constants.contributors.roles.superAdmin'):
                    return true;
                default:
                    throw new \Exception('invalid role');
            }
        }
    }

    public function isEditor() {
        return Auth::user()->projects()->where('projects.id', Session::get('currentProject')['id'])->first()->pivot->role 
            === Config::get('constants.contributors.roles.editor');
    }

    public function isAdminApp()
    {
        return Auth::user()->role === Config::get('constants.users.roles.admin');
    }

    public function canPublishArticle() {
        $contributor = Auth::user()->projects()->where('projects.id', Session::get('currentProject')['id'])->first()->pivot;
        return in_array($contributor->role, Config::get('constants.contributors.canPublishArticle'));
    }
}
