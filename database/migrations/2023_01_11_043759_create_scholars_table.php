<?php

use App\Models\ScholarStatus;
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
        Schema::create('scholars', function (Blueprint $table) {
            $table->id();
            $table->foreignId('applicant_user_id')->constrained('applicants', 'user_id')->cascadeOnDelete();
            $table->integer('firststudent')->nullable();
            $table->integer('secondstudent')->nullable();
            $table->integer('thirdstudent')->nullable();
            $table->integer('fourthstudent')->nullable();
            $table->integer('totalstudent')->nullable();
            $table->integer('firstparent')->nullable();
            $table->integer('secondparent')->nullable();
            $table->integer('thirdparent')->nullable();
            $table->integer('fourthparent')->nullable();
            $table->integer('totalparent')->nullable();
            $table->integer('totalcombinedattendance')->nullable();
            $table->string('scholar_statuses_id', 1)->nullable()->default(ScholarStatus::IS_REGULAR);
            $table->foreign('scholar_statuses_id')->references('id')->on('scholar_statuses')->nullOnDelete();
            $table->string('scholarresubmissionmessage')->nullable();
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
        Schema::dropIfExists('scholars');
    }
};
