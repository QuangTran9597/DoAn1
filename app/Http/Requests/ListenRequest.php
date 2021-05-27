<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ListenRequest extends FormRequest
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
            'listen_name' => 'required|min:10|max:255|unique:listens',

            'listen_audio' => 'required|mimes:audio/mpeg,mp3',

        ];
    }

    public function messages()
    {
        return [
            'listen_name.required' => 'Bạn chưa nhập tên bài nghe',
            'listen_name.min' => 'Tên bài nghe quá ngắn',
            'listen_name.max' => 'Tên bài nghe vượt quá 255 kí tự',
            'listen_name.unique' => ' Tên bài nghe đã tồn tại',

            'listen_audio.required' => 'Bạn chưa nhập file âm thanh',
            'listen_audio.mimes' => 'File âm thanh không đúng định dạng',
        ];
    }
}
