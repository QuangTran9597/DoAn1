<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VocabularyRequest extends FormRequest
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
            'vocabulary_name' => 'required|unique:vocabularies,vocabulary_name|max:30',

            'vocabulary_image' => 'required|mimes:jpeg,jpg,png,gif',

            'vocabulary_audio' => 'required|mimes:audio/mpeg,mp3',

            'vietsub' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'vocabulary_name.required' => 'Bạn chưa nhập tên từ vựng',
            'vocabulary_name.max' => 'Tên từ vựng quá 30 kí tự',
            'vocabulary_name.unique' => 'Tên từ vựng đã tồn tại',

            'vocabulary_image.required' => 'Bạn chưa nhập hình ảnh',
            'vocabulary_image.mimes' => 'Hình ảnh không đúng định dạng',

            'vocabulary_audio.required' => 'Bạn chưa nhập audio',
            'vocabulary_audio.mimes' => 'File audio không đúng định dạng',

            'vietsub.required' => 'Bạn chưa nhập nghĩa của từ',
        ];
    }
}
