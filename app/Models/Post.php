<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Post extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'body',
        'image',
    ];

    public function user() : BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class)->whereNull('parent_id');
    }

    public function allComments() : HasMany
    {
        return $this->hasMany(Comment::class);
    }

    /**
     * Get the estimated reading time for the post.
     *
     * @return \Illuminate\Database\Eloquent\Casts\Attribute
     */
    public function readingTime(): Attribute
    {
        return Attribute::make(
            get: function ($value, $attributes) {
                $wordCount = str_word_count(strip_tags($attributes['body']));
                $minutes = ceil($wordCount / 200);
                return $minutes . ' دقیقه مطالعه';
            }
        );
    }
}
