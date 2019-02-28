<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateElancerProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('elancer_profiles', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('elancer_id');
            $table->string('name');
            $table->string('image')->default('pseudo.jpeg');
            $table->string('gender')->default('Unknown');
            $table->string('phone');
            $table->string('proficiency');
            $table->string('service');
            $table->string('category');
            $table->text('about');
            $table->string('degree');
            $table->string('university');
            $table->string('from');
            $table->string('to');
            $table->text('address');
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
        Schema::dropIfExists('elancer_profiles');
    }
}
