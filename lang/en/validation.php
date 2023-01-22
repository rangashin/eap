<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted' => 'The :attribute must be accepted.',
    'accepted_if' => 'The :attribute must be accepted when :other is :value.',
    'active_url' => 'The :attribute is not a valid URL.',
    'after' => 'The :attribute must be a date after :date.',
    'after_or_equal' => 'The :attribute must be a date after or equal to :date.',
    'alpha' => 'The :attribute must only contain letters.',
    'alpha_dash' => 'The :attribute must only contain letters, numbers, dashes and underscores.',
    'alpha_num' => 'The :attribute must only contain letters and numbers.',
    'array' => 'The :attribute must be an array.',
    'before' => 'The :attribute must be a date before :date.',
    'before_or_equal' => 'The :attribute must be a date before or equal to :date.',
    'between' => [
        'array' => 'The :attribute must have between :min and :max items.',
        'file' => 'The :attribute must be between :min and :max kilobytes.',
        'numeric' => 'The :attribute must be between :min and :max.',
        'string' => 'The :attribute must be between :min and :max characters.',
    ],
    'boolean' => 'The :attribute field must be true or false.',
    'confirmed' => 'The :attribute confirmation does not match.',
    'current_password' => 'The password is incorrect.',
    'date' => 'The :attribute is not a valid date.',
    'date_equals' => 'The :attribute must be a date equal to :date.',
    'date_format' => 'The :attribute does not match the format :format.',
    'declined' => 'The :attribute must be declined.',
    'declined_if' => 'The :attribute must be declined when :other is :value.',
    'different' => 'The :attribute and :other must be different.',
    'digits' => 'The :attribute must be :digits digits.',
    'digits_between' => 'The :attribute must be between :min and :max digits.',
    'dimensions' => 'The :attribute has invalid image dimensions.',
    'distinct' => 'The :attribute field has a duplicate value.',
    'doesnt_end_with' => 'The :attribute may not end with one of the following: :values.',
    'doesnt_start_with' => 'The :attribute may not start with one of the following: :values.',
    'email' => 'The :attribute must be a valid email address.',
    'ends_with' => 'The :attribute must end with one of the following: :values.',
    'enum' => 'The selected :attribute is invalid.',
    'exists' => 'The selected :attribute is invalid.',
    'file' => 'The :attribute must be a file.',
    'filled' => 'The :attribute field must have a value.',
    'gt' => [
        'array' => 'The :attribute must have more than :value items.',
        'file' => 'The :attribute must be greater than :value kilobytes.',
        'numeric' => 'The :attribute must be greater than :value.',
        'string' => 'The :attribute must be greater than :value characters.',
    ],
    'gte' => [
        'array' => 'The :attribute must have :value items or more.',
        'file' => 'The :attribute must be greater than or equal to :value kilobytes.',
        'numeric' => 'The :attribute must be greater than or equal to :value.',
        'string' => 'The :attribute must be greater than or equal to :value characters.',
    ],
    'image' => 'The :attribute must be an image.',
    'in' => 'The selected :attribute is invalid.',
    'in_array' => 'The :attribute field does not exist in :other.',
    'integer' => 'The :attribute must be an integer.',
    'ip' => 'The :attribute must be a valid IP address.',
    'ipv4' => 'The :attribute must be a valid IPv4 address.',
    'ipv6' => 'The :attribute must be a valid IPv6 address.',
    'json' => 'The :attribute must be a valid JSON string.',
    'lowercase' => 'The :attribute must be lowercase.',
    'lt' => [
        'array' => 'The :attribute must have less than :value items.',
        'file' => 'The :attribute must be less than :value kilobytes.',
        'numeric' => 'The :attribute must be less than :value.',
        'string' => 'The :attribute must be less than :value characters.',
    ],
    'lte' => [
        'array' => 'The :attribute must not have more than :value items.',
        'file' => 'The :attribute must be less than or equal to :value kilobytes.',
        'numeric' => 'The :attribute must be less than or equal to :value.',
        'string' => 'The :attribute must be less than or equal to :value characters.',
    ],
    'mac_address' => 'The :attribute must be a valid MAC address.',
    'max' => [
        'array' => 'The :attribute must not have more than :max items.',
        'file' => 'The :attribute must not be greater than :max kilobytes.',
        'numeric' => 'The :attribute must not be greater than :max.',
        'string' => 'The :attribute must not be greater than :max characters.',
    ],
    'max_digits' => 'The :attribute must not have more than :max digits.',
    'mimes' => 'The :attribute must be a file of type: :values.',
    'mimetypes' => 'The :attribute must be a file of type: :values.',
    'min' => [
        'array' => 'The :attribute must have at least :min items.',
        'file' => 'The :attribute must be at least :min kilobytes.',
        'numeric' => 'The :attribute must be at least :min.',
        'string' => 'The :attribute must be at least :min characters.',
    ],
    'min_digits' => 'The :attribute must have at least :min digits.',
    'multiple_of' => 'The :attribute must be a multiple of :value.',
    'not_in' => 'The selected :attribute is invalid.',
    'not_regex' => 'The :attribute format is invalid.',
    'numeric' => 'The :attribute must be a number.',
    'password' => [
        'letters' => 'The :attribute must contain at least one letter.',
        'mixed' => 'The :attribute must contain at least one uppercase and one lowercase letter.',
        'numbers' => 'The :attribute must contain at least one number.',
        'symbols' => 'The :attribute must contain at least one symbol.',
        'uncompromised' => 'The given :attribute has appeared in a data leak. Please choose a different :attribute.',
    ],
    'present' => 'The :attribute field must be present.',
    'prohibited' => 'The :attribute field is prohibited.',
    'prohibited_if' => 'The :attribute field is prohibited when :other is :value.',
    'prohibited_unless' => 'The :attribute field is prohibited unless :other is in :values.',
    'prohibits' => 'The :attribute field prohibits :other from being present.',
    'regex' => 'The :attribute format is invalid.',
    'required' => 'The :attribute field is required.',
    'required_array_keys' => 'The :attribute field must contain entries for: :values.',
    'required_if' => 'The :attribute field is required when :other is :value.',
    'required_if_accepted' => 'The :attribute field is required when :other is accepted.',
    'required_unless' => 'The :attribute field is required unless :other is in :values.',
    'required_with' => 'The :attribute field is required when :values is present.',
    'required_with_all' => 'The :attribute field is required when :values are present.',
    'required_without' => 'The :attribute field is required when :values is not present.',
    'required_without_all' => 'The :attribute field is required when none of :values are present.',
    'same' => 'The :attribute and :other must match.',
    'size' => [
        'array' => 'The :attribute must contain :size items.',
        'file' => 'The :attribute must be :size kilobytes.',
        'numeric' => 'The :attribute must be :size.',
        'string' => 'The :attribute must be :size characters.',
    ],
    'starts_with' => 'The :attribute must start with one of the following: :values.',
    'string' => 'The :attribute must be a string.',
    'timezone' => 'The :attribute must be a valid timezone.',
    'unique' => 'The :attribute has already been taken.',
    'uploaded' => 'The :attribute failed to upload.',
    'uppercase' => 'The :attribute must be uppercase.',
    'url' => 'The :attribute must be a valid URL.',
    'uuid' => 'The :attribute must be a valid UUID.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'file_input_picture' => [
            'required' => 'The :attribute is required.',
        ],
        'file_input_baptismal' => [
            'required_if' => 'The :attribute is required.',
        ],
        'file_input_birth' => [
            'required_if' => 'The :attribute is required.',
        ],
        'file_input_regi_report' => [
            'required_if' => 'The :attribute is required.',
        ],
        'file_input_regi' => [
            'required_if' => 'The :attribute is required.',
        ],
        'file_input_report' => [
            'required_if' => 'The :attribute is required.',
        ],
        'fathername' => [
            'required_without_all' => 'At least one parent/guardian information is required.'
        ],
        'mothername' => [
            'required_without_all' => 'At least one parent/guardian information is required.'
        ],
        'guardianname' => [
            'required_without_all' => 'At least one parent/guardian information is required.'
        ],
        'firststudent' => [
            'gte' => 'The :attribute must be a counting value.',
            'lte' => 'The :attribute must be less than 3 hours (180 minutes).'
        ],
        'secondstudent' => [
            'gte' => 'The :attribute must be a counting value.',
            'lte' => 'The :attribute must be less than 3 hours (180 minutes).'
        ],
        'thirdstudent' => [
            'gte' => 'The :attribute must be a counting value.',
            'lte' => 'The :attribute must be less than 3 hours (180 minutes).'
        ],
        'fourthstudent' => [
            'gte' => 'The :attribute must be a counting value.',
            'lte' => 'The :attribute must be less than 3 hours (180 minutes).'
        ],
        'firstparent' => [
            'gte' => 'The :attribute must be a counting value.',
            'lte' => 'The :attribute must be less than 3 hours (180 minutes).'
        ],
        'secondparent' => [
            'gte' => 'The :attribute must be a counting value.',
            'lte' => 'The :attribute must be less than 3 hours (180 minutes).'
        ],
        'thirdparent' => [
            'gte' => 'The :attribute must be a counting value.',
            'lte' => 'The :attribute must be less than 3 hours (180 minutes).'
        ],
        'fourthparent' => [
            'gte' => 'The :attribute must be a counting value.',
            'lte' => 'The :attribute must be less than 3 hours (180 minutes).'
        ],
        'file_input_scholar_regi' => [
            'required_without' => 'The :attribute is required.'
        ],
        'file_input_scholar_report' => [
            'required_without' => 'The :attribute is required.'
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

    'attributes' => [
        'contactno' => 'contact number',
        'email' => 'email address',
        'fullname' => 'full name',
        'acctype' => 'account type',
        'leaderfullname' => 'full name',
        'leaderaddress' => 'address',
        'leaderbirthdate' => 'birthdate',
        'leadersex' => 'sex',
        'kawan_id' => 'kawan',
        'subadminfullname' => 'full name',
        'subadminaddress' => 'address',
        'subadminbirthdate' => 'birthdate',
        'role_id' => 'role',
        'genave' => 'general average',
        'elemtohsgenave' => 'general average',
        'collegegenave' => 'general average',
        'scholaryears' => 'scholar year\'s',
        'applicantfirstname' => 'applicant\'s first name',
        'applicantmiddlename' => 'applicant\'s middle name',
        'applicantlastname' => 'applicant\'s last name',
        'applicantsuffix' => 'applicant\'s suffix',
        'applicantbirthdate' => 'applicant\'s birthdate',
        'applicantsex' => 'applicant\'s sex',
        'applicantcontactno' => 'applicant\'s contact number',
        'applicantaddress' => 'applicant\'s address',
        'gradeyearorlevel' => 'incoming grade year level',
        'schoolname' => 'school name',
        'schooladdress' => 'school address',
        'fathername' => 'father\'s name',
        'fatherage' => 'father\'s age',
        'fatheroccupation' => 'father\'s occupation',
        'fatherincome' => 'father\'s income',
        'fathercontactno' => 'father\'s contact number',
        'fatherreligion' => 'father\'s name',
        'mothername' => 'mother\'s name',
        'motherage' => 'mother\'s age',
        'motheroccupation' => 'mother\'s occupation',
        'motherincome' => 'mother\'s income',
        'mothercontactno' => 'mother\'s contact number',
        'motherreligion' => 'mother\'s name',
        'parentstatus' => 'parent status',
        'guardianname' => 'guardian\'s name',
        'guardiancontactno' => 'guardian\'s contact number',
        'pwdname.*' => 'pwd family member\'s name',
        'pwdage.*' => 'pwd family member\'s age',
        'siblingname.*' => 'sibling\'s name',
        'siblingage.*' => 'sibling\'s age',
        'siblingyearorwork.*' => 'sibling\'s work-study',
        'siblingsnumberofworking' => 'number of working siblings',
        'siblingstotalincome' => 'sibling\'s total income',
        'applicantministryans' => 'answer to this',
        'applicantministry' => 'applicant\'s ministry',
        'parentapplicantministryans' => 'answer to this',
        'parentapplicantministry' => 'parent of applicant\'s ministry',
        'relativename.*' => 'relative\'s name',
        'relativeage.*' => 'relative\'s age',
        'relativerelation.*' => 'relative\'s relation to applicant',
        'relativework.*' => 'relative\'s work',
        'resubmissionmessage' => 'resubmission message',
        'file_input_picture' => '2X2 picture',
        'file_input_baptismal' => 'baptismal file',
        'file_input_birth' => 'birth certificate',
        // 'file_input_regi_report' => 'registration card or report form', 
        'file_input_regi' => 'registration form',
        'file_input_report' => 'report card',
        'applicantstatus' => 'applicant status (dropdown)',
        'firststudent' => 'first attendance',
        'secondstudent' => 'second attendance',
        'thirdstudent' => 'third attendance',
        'fourthstudent' => 'fourth attendance',
        'firstparent' => 'first attendance',
        'secondparent' => 'second attendance',
        'thirdparent' => 'third attendance',
        'fourthparent' => 'fourth attendance',
        'file_input_scholar_regi' => 'registration form',
        'file_input_scholar_report' => 'report card',
        'scholarresubmissionmessage' => 'resubmission message',
    ],

];
