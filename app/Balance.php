<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Balance extends Model
{
    protected $table = "balances";
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $fillable = ['vdc_agent_id', 'financial_institution_id','balance_money'];


    public function vdcAgent(){
        return $this->belongsTo('App\VdcAgent');
    }

    public function financeInstitution(){
        return $this->belongsTo('App\FinancialInstitution');
    }
}
