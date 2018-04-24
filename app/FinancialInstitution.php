<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FinancialInstitution extends Model
{
    protected $table = 'financial_institutions';
    use SoftDeletes;
    protected $fillable = ['name', 'details', 'email', 'phone'];
    protected $dates = ['deleted_at'];
    protected $with = ['balance'];
    public function balance(){
        return $this->hasMany('App\Balance');
    }

    public static function rules() {
        $rules = [
            'name' => 'required'
        ];
        return $rules;
    }
}
