<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLeadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('leads', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('company')->nullable();
            $table->string('web')->nullable();
            $table->string('email')->nullable();
            $table->string('phone_number');
            $table->string('address');
            $table->text('description')->nullable();
            $table->integer('lead_status_id')->nullable();
            $table->integer('lead_source_id')->nullable();
            $table->integer('employee_id')->nullable();
            $table->integer('lead_category_id')->nullable();
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
        Schema::dropIfExists('leads');
    }
}
