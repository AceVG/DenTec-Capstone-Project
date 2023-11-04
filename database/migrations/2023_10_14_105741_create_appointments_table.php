<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appointments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBiginteger('user_id')->unsigned()->nullable();
            $table->unsignedBiginteger('service_id')->unsigned()->nullable();
            $table->unsignedBiginteger('dentist_id')->unsigned()->nullable();
            $table->string('name');
            $table->string('phone');
            $table->string('email');
            $table->string('notes')->nullable();
            $table->dateTime('start');
            $table->dateTime('end');
            $table->string('status')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('user_id')->references('id')
                 ->on('users')->onDelete('cascade');
            $table->foreign('service_id')->references('id')
                 ->on('services')->onDelete('cascade');
            $table->foreign('dentist_id')->references('id')
                 ->on('dentists')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('appointments');
    }
};
