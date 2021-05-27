<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TopicRequest extends FormRequest
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
            'topic_name' => 'required|unique:topics,topic_name|max:30',

            'topic_title' => 'required|max:255|min:10',

            'topic_content' => 'required|max:255|min:10',

            'topic_image' => 'required|mimes:jpeg,jpg,png,gif',
        ];
    }

    public function messages()
    {
        return [
            'topic_name.required' => 'Bạn chưa nhập tên chủ đề học',
            'topic_name.max' => 'Tên chủ đề học quá 30 kí tự',
            'topic_name.unique' => 'Tên chủ đề học đã tồn tại',

            'topic_title.required' => 'Bạn chưa nhập title',
            'topic_title.max' => 'Title đã vượt quá 255 kí tự',
            'topic_title.min' => 'Title quá ngắn',

            'topic_content.required' => 'Bạn chưa nhập content',
            'topic_content.max' => 'Content đã vượt quá 255 kí tự',
            'topic_content.min' => 'Content quá ngắn',

            'topic_image.required' => 'Bạn chưa nhập hình ảnh',
            'topic_image.mimes' => 'Hình ảnh không đúng định dạng',
        ];
    }
}
