<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class Card extends Model
{
    use HasFactory, Notifiable, SoftDeletes;

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
     
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($card) {
            $card->user_id = auth()->id();
        });
    }
}
