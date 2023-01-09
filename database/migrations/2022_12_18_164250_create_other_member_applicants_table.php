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
        Schema::create('other_member_applicants', function (Blueprint $table) {
            $table->id();
            // $table->foreignId('applicant_id')->constrained()->cascadeOnDelete();
            $table->foreignId('applicant_user_id')->constrained('applicants', 'user_id')->cascadeOnDelete();
            $table->string('relativename', 45)->nullable();
            $table->integer('relativeage')->nullable();
            $table->string('relativerelation', 45)->nullable();
            $table->string('relativework', 45)->nullable();
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
        Schema::dropIfExists('other_member_applicants');
    }
};
