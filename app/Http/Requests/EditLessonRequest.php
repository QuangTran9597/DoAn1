<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditLessonRequest extends FormRequest
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

            'lesson_name' => 'required|min:10|max:30',

            'lesson_title' => 'required|max:255',

            'lesson_content' => 'required|max:255',

            'lesson_image' => 'required|mimes:jpeg,jpg,png,gif',
        ];
    }

    public function messages()
    {
        return [
            'lesson_name.required' => 'Bạn chưa nhập tên bài học',
            'lesson_name.min' => 'Tên bài học quá ngắn',
            'lesson_name.max' => 'Tên bài học đã vượt quá giới hạn',

            'lesson_title.required' => 'Bạn chưa nhập title',
            'lesson_title.max' => 'Title đã vượt quá 255 kí tự',

            'lesson_content.required' => 'Bạn chưa nhập content',
            'lesson_content.max' => 'Content đã vượt quá 255 kí tự',

            'lesson_image.required' => 'Bạn chưa nhập hình ảnh',
            'lesson_image.mimes' => 'Hình ảnh không đúng định dạng',
        ];
    }
}
