<?php

use App\Models\Applicant;
use App\Models\ApplicantStatus;
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
        Schema::create('applicants', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->string('kawan_id', 10)->nullable();
            $table->foreign('kawan_id')->references('id')->on('kawans')->nullOnDelete();
            $table->enum('renewal', ['NEW', 'OLD']);
            $table->decimal('genave', 5, 2, true);
            $table->integer('scholaryears', false, true);
            $table->string('applicantfirstname', 30);
            $table->string('applicantmiddlename', 30)->nullable();
            $table->string('applicantlastname', 30);
            $table->string('applicantsuffix', 5)->nullable();
            $table->date('applicantbirthdate');
            $table->enum('applicantsex', ['MALE', 'FEMALE']);
            $table->string('applicantcontactno', 13);
            $table->string('applicantaddress', 100);
            $table->string('gradeyearorlevel', 20);
            $table->string('yearlevel', 5)->nullable();
            $table->foreign('yearlevel')->references('id')->on('year_levels')->nullOnDelete();
            $table->string('course', 100)->nullable();
            $table->string('schoolname', 100);
            $table->string('schooladdress', 100);
            $table->string('fathername', 45)->nullable();
            $table->integer('fatherage')->nullable();
            $table->string('fatheroccupation', 45)->nullable();
            $table->decimal('fatherincome', 8, 2, true)->nullable();
            $table->string('fathercontactno', 13)->nullable();
            $table->string('fatherreligion', 45)->nullable();
            $table->string('mothername', 45)->nullable();
            $table->integer('motherage')->nullable();
            $table->string('motheroccupation', 45)->nullable();
            $table->decimal('motherincome', 8, 2, true)->nullable();
            $table->string('mothercontactno', 13)->nullable();
            $table->string('motherreligion', 45)->nullable();
            $table->string('parentstatus', 45)->nullable(); 
            $table->string('guardianname', 45)->nullable();
            $table->string('guardiancontactno', 13)->nullable();
            $table->integer('siblingsnumberofworking');
            $table->decimal('siblingstotalincome', 8, 2);
            $table->string('applicantministry', 15)->nullable();
            $table->foreign('applicantministry')->references('id')->on('ministries')->nullOnDelete();    
            $table->string('parentapplicantministry', 15)->nullable();
            $table->foreign('parentapplicantministry')->references('id')->on('ministries')->nullOnDelete();
            $table->date('interviewdate')->nullable();
            $table->date('hasbeenselecteddate')->nullable();
            $table->date('formreceived')->nullable();
            $table->tinyInteger('issubmitted')->default(Applicant::IS_SUBMITTED);
            $table->string('resubmissionmessage')->nullable();
            $table->foreignId('applicant_statuses_id')->default(ApplicantStatus::IS_UNDER_REVIEW)->nullable()->constrained()->nullOnDelete();
            $table->decimal('sawpoints')->nullable();
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
        Schema::dropIfExists('applicants');
    }
};
