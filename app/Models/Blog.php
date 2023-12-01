<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Blog extends Model
{
    use HasFactory;
    use Sluggable;
    protected $table = "blogs";
    protected $fillable = ['image', 'title', 'short_desc', 'description', 'slug', 'status', 'meta_title', 'meta_desc', 'meta_desc'];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
}
