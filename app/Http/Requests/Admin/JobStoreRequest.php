<?php

namespace App\Http\Requests\Admin;

use App\Enums\Degree;
use BenSampo\Enum\Rules\EnumValue;
use Illuminate\Foundation\Http\FormRequest;

class JobStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
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
            'function' => 'required|string|max:255',
            'education_id' => ['required', new EnumValue(Degree::class, false)],
            'experience_id' => 'required|exists:experiences,id',
            'program_study_id' => 'required|exists:program_studies,id',
            'description' => 'required',
            'minimum_age' => 'required|integer',
            'maximum_age' => 'required|integer',
            'job_time' => 'required'
        ];
    }
}
