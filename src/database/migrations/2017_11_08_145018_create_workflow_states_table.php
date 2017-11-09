<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWorkflowStatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('workflow_states', function (Blueprint $table) {
            $table->increments('id')->comment("The id of state");
            $table->string('name',191)->unique()->comment("The name of state");
            $table->string('label',191)->comment("The label of state");
            $table->smallInteger('status')->default(0)->comment("The status of state");
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
        Schema::dropIfExists('workflow_states');
    }
}
