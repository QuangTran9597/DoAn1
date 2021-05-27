<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditCourseRequest extends FormRequest
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
            'course_name' => 'required|min:10',
            'course_title' => 'required|max:255',
            'course_content' => 'required|max:255',
        ];
    }

    public function messages()
    {
        return [
            'course_name.required' => 'Bạn chưa nhập tên khóa học',
            'course_name.min' => 'Tên khóa học quá ngắn',
            'course_title.required' => 'Bạn chưa nhập title',
            'course_content.required' => 'Bạn chưa nhập content',
            'course_title.max' => 'Title đã vượt quá 255 kí tự',
            'course_content.max' => 'Content đã vượt quá 255 kí tự',
        ];
    }


}
