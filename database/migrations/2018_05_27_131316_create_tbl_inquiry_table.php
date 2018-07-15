<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblInquiryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_inquiry', function (Blueprint $table) {
            $table->increments('inquiry_id');
            $table->string('inquiry_name');
            $table->string('inquiry_email');
            $table->string('inquiry_subject');
            $table->string('inquiry_message');
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
        Schema::dropIfExists('tbl_inquiry');
    }
}
