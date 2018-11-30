<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('text',255)->nullable();
            $table->string('photo',500)->nullable();
            $table->string('memo',500)->nullable();
            $table->string('name',255)->nullable();;
            $table->string('tel',15)->nullable();;
            $table->tinyInteger('status');
            $table->string('invitation_code',20)->nullable();;
            $table->timestamp('c_date')->useCurrent();
            $table->timestamp('m_date')->useCurrent();
            $table->Integer('collaborator_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customers');
    }
}
