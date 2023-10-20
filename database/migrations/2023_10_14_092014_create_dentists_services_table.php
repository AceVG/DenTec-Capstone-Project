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
        Schema::create('dentists_services', function (Blueprint $table) {
            $table->id();
            $table->unsignedBiginteger('dentists_id')->unsigned();
            $table->unsignedBiginteger('services_id')->unsigned();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('dentists_id')->references('id')
                 ->on('dentists')->onDelete('cascade');
            $table->foreign('services_id')->references('id')
                ->on('services')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dentists_services');
    }
};
