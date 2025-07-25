<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StickerPrice extends Model
{
    use HasFactory;


    protected $fillable = ['sticker_size_id', 'quantity', 'price'];

    public function size()
    {
        return $this->belongsTo(StickerSize::class, 'sticker_size_id');
    }
}
