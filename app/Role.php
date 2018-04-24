<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Bican\Roles\Models\Role as Base;

class Role extends Base
{
    protected $hidden = [
        'description', 'level', 'created_at', 'updated_at',
    ];


    public function roles()
    {
        return $this->belongsToMany('App\user');
    }

    public function withRole($slug){
        return Role::where('slug',$slug);
    }
}
