<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ExperienceUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     */
    public function authorize(): bool
    {
        if ($this->route('experience') === null) {
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
            'name' => 'required|string|max:255',
            'minimum_experience_of_year' => 'required|integer',
            'maximum_experience_of_year' => 'required|integer'
        ];
    }
}
