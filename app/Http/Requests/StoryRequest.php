<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoryRequest extends FormRequest
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
            'story_name' => 'required|unique:stories,story_name|min:10|max:30',

            'story_title' => 'required|max:255',

            'story_content' => 'required|max:255',

            'story_image' => 'required|mimes:jpeg,jpg,png,gif',

            'link' => 'required',
        ];
    }

      public function messages()
    {
        return [
            'story_name.required' => 'Bạn chưa nhập tên truyện',
            'story_name.min' => 'Tên truyện học quá ngắn',
            'story_name.unique' => 'Tên truyện học đã tồn tại',
            'story_title.required' => 'Bạn chưa nhập title',
            'story_title.max' => 'Title đã vượt quá 255 kí tự',
            'story_content.required' => 'Bạn chưa nhập content',
            'story_content.max' => 'Content đã vượt quá 255 kí tự',
            'story_image.required' => 'Bạn chưa nhập hình ảnh',
            'story_image.mimes' => 'Hình ảnh không đúng định dạng',
            'link.required' => 'Bạn chưa nhập link liên kết',
        ];
    }
}
