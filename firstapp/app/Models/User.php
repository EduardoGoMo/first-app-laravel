<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'username',
        'email',
        'password',
    ];

    protected function avatar(): Attribute{
        return Attribute::make( get: function ($value){
            return $value ? '/storage/avatars/' . $value : '/fallback-avatar.jpg';
        });
    }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    //relacion de imágenes con usuario
    public function images(){
        return $this->hasMany(UserImage::class, 'user_id');
    }

    //Relación de a quienes sigues con los post que ha hecho
    public function feedPosts(){
        return $this->hasManyThrough(Post::class, Follow::class, 'user_id', 'user_id', 'id', 'followeduser');
    }

    //relacion con los posts
    public function posts(){
        return $this->hasMany(Post::class, 'user_id');
    }

    //relacion con los seguidos
    public function followingTheseUsers(){
        return $this->hasMany(Follow::class, 'user_id');
    }

    //relacion con los seguidores
    public function followers(){
        return $this->hasMany(Follow::class, 'followeduser');
    }
}
