<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = [];

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

    //sa users may department_id
    //gusto ko kunin yung data ng department gamit ang department_id sa users
    //gagawa ako ng function sa user gamit ang convention name ng department , dahil ang gusto kong kunin ay data ng department
    //this user hasOne Deparment::class

    public function department(){
        return $this->hasOne(Department::class, 'id', 'department_id');
    }

    public function role(){
        return $this->hasOne(Role::class, 'id', 'role_id');
    }
}
