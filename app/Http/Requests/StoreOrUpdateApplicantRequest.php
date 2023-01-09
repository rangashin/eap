<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreOrUpdateApplicantRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'kawan_id' => ['required'],
            'renewal' => ['required'],
            'scholaryears' => ['required_if:renewal,OLD', 'exclude_if:renewal,NEW', 'nullable', 'integer', 'between:1,17',],
            'genave' => ['filled', 'numeric'],
            'elemtohsgenave' => ['filled', 'numeric', 'between:60,100'],
            'collegegenave' => ['filled', 'numeric', 'between:1,5'],
            'applicantfirstname' => ['min:2', 'string', 'required', 'regex:/^(?=.{1,40}$)[a-zA-Z]+(?:[-\' ][a-zA-Z]+)*$/'],
            'applicantmiddlename' => ['min:2', 'string', 'nullable', 'regex:/^(?=.{1,40}$)[a-zA-Z]+(?:[-\' ][a-zA-Z]+)*$/'],
            'applicantlastname' => ['min:2', 'string', 'required', 'regex:/^(?=.{1,40}$)[a-zA-Z]+(?:[-\' ][a-zA-Z]+)*$/'],
            'applicantsuffix' => ['nullable'],
            'applicantbirthdate' => ['required', 'date', 'before_or_equal:5 years ago'],
            'applicantsex' => ['required'],
            'applicantcontactno' => ['string', 'required', 'regex:/^(09|\+639)\d{9}$/'], 
            'applicantaddress' => ['string', 'required', 'regex:/^(\d+)?([A-Za-z](?= ))?(.*?)([^ ]+?)$/'],
            'gradeyearorlevel' => ['required'],
            'course' => ['required_if:gradeyearorlvl,1ST YEAR COLLEGE,2ND YEAR COLLEGE,3RD YEAR COLLEGE,4TH YEAR COLLEGE,5TH YEAR COLLEGE', 'string', 'nullable', 'regex:/^([a-zA-Z]+\s)*[a-zA-Z]+$/'],
            'schoolname' => ['required', 'string', 'regex:/^([a-zA-Z\.]+\s)*[a-zA-Z]+$/'],
            'schooladdress' => ['required', 'string', 'regex:/^(\d+)?([A-Za-z](?= ))?(.*?)([^ ]+?)$/'],
            'fathername' => ['required_with:fatherage,fatheroccupation,fatherincome,fathercontactno,fatherreligion', 'required_without_all:mothername,guardianname', 'nullable', 'string', 'regex:/^[\w-]{2,}(\s([\w-]{2,}|[\w]{1}.))+$/'],
            'fatherage' => ['required_with:fathername', 'nullable', 'integer', 'min:23'],
            'fatheroccupation' => ['required_with:fathername', 'nullable', 'string'],
            'fatherincome' => ['required_with:fathername', 'nullable', 'integer'],
            'fathercontactno' => ['required_with:fathername', 'nullable', 'string', 'regex:/^(09|\+639)\d{9}$/'],
            'fatherreligion' => ['required_with:fathername', 'nullable', 'string'],
            'mothername' => ['required_with:mothername,motherage,motheroccupation,motherincome,mothercontactno,motherreligion', 'required_without_all:fathername,guardianname','nullable', 'string', 'regex:/^[\w-]{2,}(\s([\w-]{2,}|[\w]{1}.))+$/'],
            'motherage' => ['required_with:mothername', 'nullable', 'integer', 'min:23'],
            'motheroccupation' => ['required_with:mothername', 'nullable', 'string'],
            'motherincome' => ['required_with:mothername', 'nullable', 'integer'],
            'mothercontactno' => ['required_with:mothername', 'nullable', 'string', 'regex:/^(09|\+639)\d{9}$/'],
            'motherreligion' => ['required_with:mothername', 'nullable', 'string'],
            'parentstatus' => ['required_with:mothername,fathername', 'nullable'], //,
            'guardianname' => ['required_with:guardiancontactno', 'required_without_all:mothername,fathername', 'nullable', 'string', 'regex:/^[\w-]{2,}(\s([\w-]{2,}|[\w]{1}.))+$/'],
            'guardiancontactno' => ['required_with:guardianname', 'nullable', 'string', 'regex:/^(09|\+639)\d{9}$/'],
            'pwdname.*' => ['required_with:pwdage.*', 'nullable', 'string', 'regex:/^[\w-]{2,}(\s([\w-]{2,}|[\w]{1}.))+$/'],
            'pwdage.*' => ['required_with:pwdname.*', 'nullable', 'integer', 'max:100'],
            'siblingname.*' => ['required_with:siblingage.*,siblingyearorwork.*', 'nullable', 'string', 'regex:/^[\w-]{2,}(\s([\w-]{2,}|[\w]{1}.))+$/'],
            'siblingage.*' => ['required_with:siblingname.*', 'nullable', 'integer', 'max:100'],
            'siblingyearorwork.*' => ['required_with:siblingname.*', 'nullable'],
            'siblingsnumberofworking' => ['required', 'integer'],
            'siblingstotalincome' => ['required', 'integer'],
            'applicantministryans' => ['required'],
            'applicantministry' => ['required_if:applicantministryans,OO', 'nullable', 'string'],
            'parentapplicantministryans' => ['required'],
            'parentapplicantministry' => ['required_if:parentapplicantministryans,OO', 'nullable', 'string'],
            'relativename.*' => ['required_with:relativeage.*,relativerelation.*,relativework.*', 'nullable', 'string', 'regex:/^[\w-]{2,}(\s([\w-]{2,}|[\w]{1}.))+$/'],
            'relativeage.*' => ['required_with:relativename.*', 'nullable', 'integer', 'max:100'],
            'relativerelation.*' => ['required_with:relativename.*', 'nullable', 'string'],
            'relativework.*' => ['required_with:relativename.*', 'nullable', 'string'],
            'file_input_picture' => ['required', 'file', 'mimes:jpg,png,jpeg'],
            'file_input_baptismal' => ['required_if:renewal,NEW', 'file', 'mimes:jpg,png,jpeg'],
            'file_input_birth' => ['required_if:renewal,NEW', 'file', 'mimes:jpg,png,jpeg'],
            'file_input_regi_report' => ['required_if:renewal,NEW', 'file', 'mimes:jpg,png,jpeg'],
            'file_input_regi' => ['required_if:renewal,OLD', 'file', 'mimes:jpg,png,jpeg'],
            'file_input_report' => ['required_if:renewal,OLD', 'file', 'mimes:jpg,png,jpeg'],
            // 'file_input_baptismal' => ['filled', 'file', 'mimes:jpg,png,jpeg'],
            // 'file_input_birth' => ['filled', 'file', 'mimes:jpg,png,jpeg'],
            // 'file_input_regi_report' => ['filled', 'file', 'mimes:jpg,png,jpeg'],
            // 'file_input_regi' => ['filled', 'file', 'mimes:jpg,png,jpeg'],
            // 'file_input_report' => ['filled', 'file', 'mimes:jpg,png,jpeg'],
            
        ];
    }
}
