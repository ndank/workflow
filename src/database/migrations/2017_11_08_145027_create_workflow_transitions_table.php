<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWorkflowTransitionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('workflow_transitions', function (Blueprint $table) {
            $table->increments('id')->comment("The id of workflow");
            $table->string('name',191)->unique()->comment("The name of workflow");
            $table->string('label',191)->comment("The label of workflow");
            $table->string('from',191)->nullable()->comment("The original state of workflow");
            $table->string('to',191)->nullable()->comment("The target state of workflow");
            $table->text('message')->comment("Message");
            $table->smallInteger('status')->default(0)->comment("The status of workflow");
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
        Schema::dropIfExists('workflow_transitions');
    }
}
