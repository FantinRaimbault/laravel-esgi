<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Invitation extends Model
{
    use HasFactory;

    protected $fillable = [
        'project_id',
        'role',
        'user_id'
    ];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}
