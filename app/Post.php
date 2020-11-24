<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $guarded = [];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function like($user = null, $liked = true) {
        $this->likes()->updateOrCreate([
            'user_id' => $user ? $user->id : auth()->id(),
        ], [
            'liked' => $liked
        ]);
    }

    public function dislike($user = null) {
        return $this->like($user, false);
    }

    public function isLikedBy(User $user) {
        return (bool) $user->likes->where('post_id', $this->id)->where('liked', true)->count();
    }

    public function isDislikedBy(User $user) {
        return (bool) $user->likes->where('post_id', $this->id)->where('liked', false)->count();
    }

    public function likes() {
        return $this->hasMany(Like::class);
    }
    // Dynamically build query with likes
    public function scopeWithLikes($query) {
        $query->leftJoinSub(
            'select post_id, sum(liked) likes, sum(!liked) dislikes from likes group by post_id',
            'likes',
            'likes.post_id',
            'posts.id'
        );
    }
}
