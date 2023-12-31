<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table ->string('name');
            $table ->string('email')->unique()->nullable();
            $table ->string('phone')->unique()->nullable();
            $table ->string('address')->nullable();
            $table ->string('country')->nullable();
            $table ->string('location')->nullable();
            $table ->string('id_number')->nullable();
            $table->integer('created_by')->nullable();
            $table->integer('updated_by')->nullable();
            $table->enum( 'status', ['active', 'inactive'] )->default( 'active' );
            $table->timestamps();
            $table->softDeletes();
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
