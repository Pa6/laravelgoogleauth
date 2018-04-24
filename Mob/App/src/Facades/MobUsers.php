<?php
namespace Mob\Facades;
use Illuminate\Support\Facades\Facade;

/**
 * Created by PhpStorm.
 * User: pa6
 * Date: 09/03/2017
 * Time: 12:09
 */
class MobUsers extends Facade
{

    public static function getFacadeAccessor()
    {
        return 'mob_users';
    }
}