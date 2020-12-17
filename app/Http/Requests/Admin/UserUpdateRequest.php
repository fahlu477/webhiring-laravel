<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UserUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     */
    public function authorize(): bool
    {
        if ($this->route('user') === null) {
            abort(404);
        }

        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'name'      => 'required|string|max:255',
            'email'     => 'required|email|unique:users,email,'.$this->route('user')->id,
            'role_id'   => 'required',
            'role_id.*' => 'required|exists:roles,id',
            'custom' => [
                'role_id.*' => [
                    'exists' => 'Each person must have a unique e-mail address',
                ]
            ],
        ];
    }
}
