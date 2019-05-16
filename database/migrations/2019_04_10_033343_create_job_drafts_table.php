<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobDraftsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job_drafts', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id');
            $table->string('title')->nullable();
            $table->json('service')->nullable();
            $table->json('category')->nullable();
            $table->string('description')->nullable();
            $table->string('job_type')->nullable();
            $table->text('question_1')->nullable();
            $table->text('question_2')->nullable();
            $table->text('question_3')->nullable();
            $table->text('question_4')->nullable();
            $table->text('question_5')->nullable();
            $table->string('skills')->nullable();
            $table->string('client_added_skills')->nullable();
            $table->string('experience_level')->nullable();
            $table->string('expected_duration')->nullable();
            $table->boolean('job_post_completed')->default(0);
            $table->string('files')->nullable();
            $table->unsignedInteger('current_page');
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
        Schema::dropIfExists('job_drafts');
    }
}
