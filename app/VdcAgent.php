<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class VdcAgent extends Model
{
    protected $table = "vdc_agents";
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $fillable = ['agent_first_name', 'agent_last_name', 'agent_group_status'];
    protected $with = ['balance'];
    public function balance(){
        return $this->hasMany('App\Balance');
    }

    public static function rules() {
        $rules = [
            'agent_first_name' => 'required'
        ];
        return $rules;
    }
}
