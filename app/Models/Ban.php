<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ban extends Model
{
    use HasFactory;

    protected $fillable = [
        'cause',
        'project_id',
        'until'
    ];

    public function project() {
        return $this->belongsTo(Project::class);
    }
}
