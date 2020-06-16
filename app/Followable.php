<?php

namespace App;

trait Followable
{
    public function toggleFollow(int $targetUserId)
    {
        return $this->follows()->toggle($targetUserId);
    }

    public function follows()
    {
        return $this->belongsToMany(
            User::class,
            'follows',
            'user_id',
            'following_user_id'
        );
    }

    public function following(int $targetId)
    {
        return $this->follows()->where('following_user_id', $targetId)->exists();
    }
}
