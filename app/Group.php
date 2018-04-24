<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Group extends Model
{
    protected $table = "groups";
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $fillable = ['name', 'code', 'description'];
}
