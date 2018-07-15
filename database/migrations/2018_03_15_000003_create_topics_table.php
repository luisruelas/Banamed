<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTopicsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('topics', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->length(999);
            $table->integer('subject_id')->unsigned();
            $table->float('added_at_version',4,2);
            $table->float('updated_at_version',4,2);
            $table->float('deleted_at_version',4,2)->nullable()->default(null);
            $table->boolean("to_update")->default(false);
            $table->timestamps();

            $table->foreign('subject_id')->references('id')->on('subjects');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('topics');
    }
}
