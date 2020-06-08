<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCourse extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|string|max:60',
            'price' => 'required|integer',
            'short_desc' => 'required|string|max:191',
            'desc' => 'required|string',
            'cat_id' => 'required|exists:cats,id',
            'trainer_id' => 'required|exists:trainers,id',
            'img' => 'required|image|mimes:jpg,png,jpeg',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'course name is required!',
            'price.integer' => 'course price must be a number!'
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'course_name',
            'price' => 'course price',
            'short_desc' => 'course short description',
            'desc' => 'course full description',
            'cat_id' => 'course category',
            'trainer_id' => 'course trainer',
            'img' => 'course image',
        ];
    }
}
