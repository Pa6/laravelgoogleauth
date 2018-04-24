<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVdcAgentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vdc_agents', function (Blueprint $table) {
            $table->increments('id');
            $table->string('agent_first_name');
            $table->string('agent_last_name');
            $table->string('agent_group_status');
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
        Schema::drop('vdc_agents');
    }
}
