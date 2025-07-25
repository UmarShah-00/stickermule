<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sticker extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'title', 'slug', 'description', 'image', 'background'];

    public function sizes()
    {
        return $this->hasMany(StickerSize::class);
    }
}
