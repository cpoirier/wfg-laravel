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


    public function listings()
    {
        return $this->hasMany('App\Listing')->where('user_is_author', 1);
    }


    public function getGravatarAttribute()
    {
        $email = trim($this->email);
        $lower = strtolower($email);
        $hash  = md5($lower);

        return "https://www.gravatar.com/avatar/" . ($email ? $hash : '00000000000000000000000000000000');
    }
}
