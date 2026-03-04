<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Chirp extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'message',
    ];

    public function user():BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function likes(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'likes', 'chirp_id', 'user_id');
    }

    public function toggleLike(User $user): void
    {
        if ($this->likes()->where('user_id', $user->id)->exists()) {
            $this->likes()->detach($user->id);
        } else {
            $this->likes()->attach($user->id);
        }
    }

}
