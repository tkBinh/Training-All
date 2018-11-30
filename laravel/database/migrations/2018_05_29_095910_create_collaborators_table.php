<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCollaboratorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('collaborators', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',100);
            $table->string('tel',15);
            $table->string('email',255);
            $table->string('car_type',50);
            $table->string('source',50);
            $table->string('invitation_code',20);
            $table->string('profile_picture',500);
            $table->string('driver_lic_picture',500);
            $table->string('id_front_picture',500);
            $table->string('id_back_picture',500);
            $table->tinyInteger('status');
            $table->string('area',50);
            $table->string('otp',10);
            $table->timestamp('otp_created')->nullable();
            $table->timestamp('c_date')->useCurrent();
            $table->timestamp('m_date')->useCurrent();
            $table->string('access_token',200);
            $table->string('sign_picture',500);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('collaborators');
    }
}
