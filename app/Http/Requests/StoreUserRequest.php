<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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
            'username' => ['required', 'string', Rule::unique(User::class), 'regex:/^(?=.{6,20}$)(?![_.])(?!.*[_.]{2})[a-zA-Z0-9._]+(?<![_.])$/'],
            'email' => ['email', 'string', Rule::unique(User::class)],
            'contactno' => [ 'required', 'string', Rule::unique(User::class), 'regex:/^(09|\+639)\d{9}$/'],
            'password' => ['required', 'string'],
            'role_id' => ['required'],
        ];
    }
}
