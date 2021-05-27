<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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

                'name' => 'required|unique:users,name',
                'email' => 'required|email|unique:users,email',
                'password' => 'required|min:6',


        ];
    }

    public function messages()
    {
        return [
                'name.required' => 'Bạn chưa nhập tên User',
                'name.unique' => 'Tên người dùng đã tồn tại',

                'email.required' => 'Bạn chưa nhập Email',
                'email.unique' => 'Email đã tồn tại',
                'email.email' => 'Bạn chưa nhập đúng định dạng Email',

                'password.required' => 'Bạn chưa nhập mật khẩu',
                'password.min' => 'Mật khẩu phải có ít nhất 6 kí tự',
            
        ];
    }
}
