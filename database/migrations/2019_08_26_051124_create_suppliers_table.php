<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSuppliersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('suppliers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('email')->nullable;
            $table->string('phone')->nullable;
            $table->string('address');
            $table->string('type');
            $table->string('shop');
            $table->string('accountholder')->nullable;
            $table->string('accountnumber')->nullable;
            $table->string('photo')->nullable;
            $table->string('bankname')->nullable;
            $table->string('branchname')->nullable;
            $table->string('city');
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
        Schema::dropIfExists('suppliers');
    }
}
