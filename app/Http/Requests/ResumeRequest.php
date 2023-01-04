<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ResumeRequest extends FormRequest
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
            'name' => 'required|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|max:255',
            'summary' => 'required',
            'education' => 'required|array',
            'education.*.school' => 'required|max:255',
            'education.*.degree' => 'required|max:255',
            'education.*.field_of_study' => 'required|max:255',
            'education.*.start_date' => 'required|date',
            'education.*.end_date' => 'required|date',
            'experience' => 'required|array',
            'experience.*.company' => 'required|max:255',
            'experience.*.position' => 'required|max:255',
            'experience.*.description' => 'required',
            'experience.*.start_date' => 'required|date',
            'experience.*.end_date' => 'required|date',
            'skills' => 'required|array',
            'skills.*.name' => 'required|max:255',
            'skills.*.level' => 'required|max:255',
        ];
    }
}
