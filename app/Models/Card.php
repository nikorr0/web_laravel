<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Card extends Model
{
    use HasFactory;
    use SoftDeletes;

     protected $table = 'cards';

     protected $fillable = [
         'name',
         'short_text',
         'long_text', 
         'image_url'
     ];

     public function getNameAttribute($value) {
        return ucfirst($value);
     }
}
