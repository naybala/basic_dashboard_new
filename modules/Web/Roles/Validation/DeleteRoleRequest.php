<?php

namespace BasicDashboard\Web\Roles\Validation;

use Illuminate\Foundation\Http\FormRequest;

class DeleteRoleRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
          // "id"=>required,
        ];
    }
}
