<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class SupportTicket extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('support_ticket', function (Blueprint $table) {
            $table->id();
            $table->string('ref_no');
            $table->string('customer_name');
            $table->string('problem_description');
            $table->string('email');
            $table->string('phone_number')->nullable();
            $table->string('status');
            $table->boolean('isView');
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
        Schema::dropIfExists('support_ticket');
    }
}
