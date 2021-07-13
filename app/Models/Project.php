<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'slug'
    ];

    public function users()
    {
        return $this->belongsToMany(User::class, 'contributors')->withPivot(['role', 'id']);
    }

    public function articles()
    {
        return $this->hasMany(Article::class);
    }

    public function getArticleBySlug($slug)
    {
        return $this->hasMany(Article::class)->where('slug', '=', $slug);
    }
}
