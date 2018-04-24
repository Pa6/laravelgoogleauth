<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBalancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('balances', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('vdc_agent_id')->unsigned()->index();
            $table->foreign('vdc_agent_id')->references('id')->on('vdc_agents')->onDelete('cascade');
            $table->integer('financial_institution_id')->unsigned()->index();
            $table->foreign('financial_institution_id')->references('id')->on('financial_institutions')->onDelete('cascade');
            $table->double('balance_money',15,2)->default(0);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('balances');
    }
}
