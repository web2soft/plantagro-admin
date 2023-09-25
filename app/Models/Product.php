<?php

namespace App\Models;

use App\Models\Tag;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Product extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $fillable = [
        'title',
        'price',
        'tags'
    ];
    
    // public function tags()
    // {
    //     return $this->belongsToMany(Tag::class);
    // }

    protected $casts = [
        'tags' => 'array',
    ];

    public function registerMediaConversions(Media $media = null): void
    {
        $this
            ->addMediaConversion('thumb')
            ->crop('crop-center', 112, 117)
            ->nonQueued();
        $this
            ->addMediaConversion('full')
            ->width(1280)
            ->nonQueued();
    }
}
