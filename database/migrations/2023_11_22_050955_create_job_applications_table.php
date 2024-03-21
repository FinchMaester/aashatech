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
        Schema::create('job_applications', function (Blueprint $table) {
            $table->id();
            $table->string('full_name');
            $table->string('email');
            $table->text('permanent_address');
            $table->text('temporary_address');
            $table->string('contact_number');
            $table->json('expertise');
            $table->string('preferred');
            $table->text('cover_letter')->nullable();
            $table->string('resume');
            $table->unsignedBigInteger('career_id');
            $table->foreign('career_id')
                ->references('id')
                ->on('careers')
                ->onDelete('cascade');
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
        Schema::dropIfExists('job_applications');
    }
};