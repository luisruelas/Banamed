<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->length(999);
            $table->string('options')->length(9999);
            $table->integer('topic_id')->unsigned();
            $table->integer('type_of_question_id')->unsigned();
            $table->float('added_at_version',4,2)->unsigned();
            $table->float('updated_at_version',4,2)->unsigned();
            $table->float('deleted_at_version',4,2)->nullable()->default(null);
            $table->boolean("to_update")->default(false);
            $table->timestamps();

            $table->foreign("type_of_question_id")->references("id")->on("types_of_question");
            $table->foreign('topic_id')->references('id')->on('topics');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('questions');
    }
}
