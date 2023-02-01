<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    use HasFactory;
    protected $table = 'banners';
    protected $fillable = ['title'];

    // relations
    public function image()
    {
        return $this->morphOne(Image::class, 'imageable');
    }

    public static function boot()
    {
        parent::boot();

        self::created(function ($banner) {
            $image = request()->file('image');
            $uploaded = Image::uploadImage($image);
            Image::create([
                'thumb' => 'thumbnails/' . $uploaded['thumb']->basename,
                'src' => 'images/' . $uploaded['src']->basename,
                'alt' => Image::getAlt($image),
                'imageable_id' => $banner->id,
                'imageable_type' => "App\Models\Brand"
            ]);
        });

        self::deleting(function ($banner) {
            $image = $banner->logo;
            $image->delete();
        });
    }
}