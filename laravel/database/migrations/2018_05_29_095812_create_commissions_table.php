<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('commissions', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('collaborator_id');
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('customer_id');
            $table->integer('amount');
            $table->timestamp('c_date')->useCurrent();
            $table->timestamp('m_date')->useCurrent();
            /*
            * Add Foreign/Unique/Index
            */
            // $table->foreign('user_id')
            //     ->references('id')
            //     ->on('users')
            //     ->onDelete('cascade');
            // $table->foreign('collaborator_id')
            //     ->references('id')
            //     ->on('collorators')
            //     ->onDelete('cascade');
            // $table->foreign('customer_id')
            //     ->references('id')
            //     ->on('customers')
            //     ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('commissions');
    }
}
