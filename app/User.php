<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Authenticatable;
use Illuminate\Auth\Passwords\CanResetPassword;
use Bican\Roles\Traits\HasRoleAndPermission;
use Bican\Roles\Contracts\HasRoleAndPermission as HasRoleAndPermissionContract;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract, HasRoleAndPermissionContract
{
    use Authenticatable, CanResetPassword, HasRoleAndPermission;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'email', 'password', 'phone'
    ];


    use SoftDeletes;
    protected $date = ['deleted_at'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token'
    ];


    public static function rules($user_id = 0) {
        $rules = [
            'phone' => 'required',
            'username' => 'unique:users,username,'.$user_id,
            'password' => 'required|min:4|confirmed',
            'password_confirmation' => 'required|min:4',
        ];
        if ($user_id) {
            $rules['password'] = 'min:6|confirmed';
            $rules['password_confirmation'] = 'min:6';
        }
        return $rules;
    }
}
