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
        Schema::create('admin_profiles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->string('adminfullname', 45);
            $table->string('adminaddress', 100);
            $table->date('adminbirthdate');
            $table->enum('sex', ['MALE', 'FEMALE'])->nullable();
            // $table->string('kawan_id', 10)->nullable()->constrained()->nullOnDelete();
            $table->string('kawan_id', 10)->nullable();
            $table->foreign('kawan_id')->references('id')->on('kawans')->nullOnDelete();
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
        Schema::dropIfExists('admin_profiles');
    }
};
