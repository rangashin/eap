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
        Schema::create('p_w_d_family_member_applicants', function (Blueprint $table) {
            $table->id();
            // $table->foreignId('applicant_id')->constrained()->cascadeOnDelete();
            $table->foreignId('applicant_user_id')->constrained('applicants', 'user_id')->cascadeOnDelete();
            $table->string('pwdname', 45)->nullable();
            $table->integer('pwdage')->nullable();
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
        Schema::dropIfExists('p_w_d_family_member_applicants');
    }
};
