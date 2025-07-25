<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StickerSize extends Model
{
    use HasFactory;

     protected $fillable = ['sticker_id', 'width', 'height', 'label'];

    public function prices()
    {
        return $this->hasMany(StickerPrice::class);
    }

    public function sticker()
    {
        return $this->belongsTo(Sticker::class);
    }
}
