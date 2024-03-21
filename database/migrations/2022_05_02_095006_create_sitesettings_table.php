<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sitesettings', function (Blueprint $table) {
            $table->id();
            $table->string('govn_name')->nullable();
            $table->string('ministry_name')->nullable();
            $table->string('department_name')->nullable();
            $table->string('office_name');
            $table->string('office_address');
            $table->string('office_contact');
            $table->string('office_mail');
            $table->string('main_logo');
            $table->string('side_logo')->nullable();
            $table->string('face_link')->nullable();
            $table->string('insta_link')->nullable();
            $table->string('linked_link')->nullable();
            $table->string('social_link')->nullable();
            $table->longText('google_maps')->nullable();
            $table->longText('f_page')->nullable();
            $table->string('insta_post_title')->nullable();
            $table->string('insta_post_link')->nullable();
            $table->text('slogan');
            $table->text('desc');
            $table->string('year');
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
        Schema::dropIfExists('sitesettings');
    }
};
