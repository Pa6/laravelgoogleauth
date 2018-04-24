<?php
/**
 * Created by PhpStorm.
 * User: pa6
 * Date: 09/03/2017
 * Time: 12:28
 */

namespace Mob\Classes;


interface MobClassInterface
{
    public function all();

    public function create(array $data);

    public function show($id);

    public function update($id, array $data);

    public function delete($id);

    public function rules();
}