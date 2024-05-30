<?php

namespace BasicDashboard\Web\Users\Validation;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Hash;

class StoreUserRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    protected function prepareForValidation(): void
    {
        $this->offsetUnset('_token');
    }

    
    public function rules(): array
    {
        return [
          "name"=>"required",
          "email"=>"required|email",
          "password"=>"required",
          "status"=>"numeric|required",
        ];
    }

    protected function passedValidation(): void
    {
        $this->merge([
            'password' => Hash::make($this->password),
        ]);
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