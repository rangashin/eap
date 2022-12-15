<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProfileUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'username' => [
                'string', 
                'required', 
                Rule::unique(User::class)->ignore($this->user()->id),
                'regex:/^(?=.{6,20}$)(?![_.])(?!.*[_.]{2})[a-zA-Z0-9._]+(?<![_.])$/'
            ],
            'contactno' => [
                'required',
                'string',
                Rule::unique(User::class)->ignore($this->user()->id),
                'regex:/^(09|\+639)\d{9}$/'
            ],
            'email' => [
                'email',
                'string',
                Rule::unique(User::class)->ignore($this->user()->id)
            ],
        ];
    }
}
