<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterFormRequest extends FormRequest
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
            'username' =>
            'required|string|max:30',
            'email' =>
            'required|string|email|max:100|unique:users',
            'password' => 'required|string|min:8|max:30|confirmed'
        ];
    }

    public function messages()
    {
        return [
            'username.required' => '入力必須',
            'username.max' => '30文字以内で入力してください',
            'email.required' => '入力必須',
            'email.email' => 'メールアドレスの形式で入力してください',
            'email.max' => '100文字以内で入力してください',
            'email.unique' => '登録済みメールアドレスです',
            'password.required' => '入力必須',
            'password.confirmed' => 'パスワードが一致しません',
            'password.min' => '8文字以上入力してください',
            'password.max' => '30文字以内で入力してください',
        ];
    }
}
