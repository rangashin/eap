<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAttendanceRequest extends FormRequest
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
            'firststudent' => ['integer', 'nullable', 'gte:0', 'lte:180'],
            'secondstudent' => ['integer', 'nullable', 'gte:0', 'lte:180'],
            'thirdstudent' => ['integer', 'nullable', 'gte:0', 'lte:180'],
            'fourthstudent' => ['integer', 'nullable', 'gte:0', 'lte:180'],
            'firstparent' => ['integer', 'nullable', 'gte:0', 'lte:180'],
            'secondparent' => ['integer', 'nullable', 'gte:0', 'lte:180'],
            'thirdparent' => ['integer', 'nullable', 'gte:0', 'lte:180'],
            'fourthparent' =>  ['integer', 'nullable', 'gte:0', 'lte:180'],
        ];
    }
}
