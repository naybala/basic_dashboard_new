<?php

namespace BasicDashboard\Web\Users\Validation;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class UpdateUserRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
          "id"=>"required",
          "name"=>"required",
          "email"=>"required|email",
          "password"=>"required",
          "newPassword"=>"required",
          "status"=>"numeric|required",
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => __('user.name_validation'),
            'email.required' => __('user.email_validation'),
            'password.required'=> __('user.password_validation'),
            'status.required'=>__('user._validation'),
        ];
    }
}