<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
class Service extends Model
{
    use HasFactory;
    use Sluggable;
    protected $table = "services";
    protected $fillable = ['logo', 'image', 'slug', 'title', 'short_desc', 'description', 'button_url', 'status'];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
}
