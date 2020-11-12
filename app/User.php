<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
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
       return Post::whereIn('user_id', $ids)->latest()->get();
    }
    public function posts() {
        return $this->hasMany(Post::class);
    }
    // Function to be called to follow the user passed to the function
    public function follow(User $user) {
        return $this->follows()->save($user);
    }
    // Retrieve a list of people the user is following
    public function follows() {
        return $this->belongsToMany(User::class, 'follows', 'user_id', 'following_user_id');
    }
    // Override how Laravel grabs the User wildcard by default
    public function getRouteKeyName() {
        return 'name';
    }
}
