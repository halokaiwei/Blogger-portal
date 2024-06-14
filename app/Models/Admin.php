<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Admin extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $guard = 'admin';
    protected $fillable = [
        'username','password',
    ];
    protected $hidden = [
        'password', 'remember_token',
    ];
    public function isAdmin()
    {
        return true; // 这里假设所有的管理员都具有管理员权限，你可以根据实际需求进行逻辑处理
    }
}
