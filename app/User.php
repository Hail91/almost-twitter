<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    // Traits
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // Getter
    public function getAvatarAttribute() {
        return "https://i.pravatar.cc/200?u=" . $this->email;
    }
    // Retrieve Timeline for the current user
    public function timeline() {
       // Include all the user's posts
       $ids = $this->follows()->pluck('id');
       $ids->push($this->id);
       // And the posts from the people that he/she follows
       return Post::whereIn('user_id', $ids)
       ->latest()
       ->get();
    }
    public function posts() {
        return $this->hasMany(Post::class)->latest();
    }
    // Function to be called to follow the user passed to the function
    public function follow(User $user) {
        return $this->follows()
        ->save($user);
    }
    // Retrieve a list of people the user is following
    public function follows() {
        return $this->belongsToMany(User::class, 'follows', 'user_id', 'following_user_id');
    }
    // Function to check if the current user is following anyone
    public function isFollowing(User $user) {
        /* This works, but it will return an ENTIRE collection, this can work for smaller datasets
        But this would become highly inefficient when we are dealing with MANY users. */
        // return $this->follows->containers($user);
        // -------------------------------------------------------------------------------------------
        // Below is more efficient as we utilize a 'where' clause to target the specific user to check.
        return $this->follows() // Return who this user follows
        ->where('following_user_id', $user->id) // Where the ID's match
        ->exists(); // And it exists
    }
    // Function to Remove follow relationship
    public function unFollow(User $user) {
        // Find the user we are following and detach the relationship (detach)
        return $this->follows()->detach($user);
    }
    // Path method to specify where we want to direct to on User
    public function path($append = '') {
        // Default path to user's profile
        $path = route('show', $this->name);
        // If an append argument is received, return the path with the append added, otherwise, return the default path.
        return $append ? "{$path}/${append}" : $path;
    }
}
