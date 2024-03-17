<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|min:5|max:255',
            'email' => 'required|email|unique:users|min:11|max:255',
            'password_confirmation' => 'required|max:255',
            'password' => 'required|confirmed|max:255',
        ];
    }
    public function messages(): array
    {
        return [
            'name.required' => 'Bạn chưa nhập họ và tên',
            'name.min' => 'Tên phải từ 5 kí tự',
            'name.max' => 'Không được nhập quá 255 kí tự',
            'email.required' => 'Bạn chưa nhập email',
            'email.unique:users' => 'Email đã tồn tại',
            'email.email' => 'Email chưa đúng định dạng',
            'email.min' => 'Email phải từ 5 kí tự',
            'email.max' => 'Không được nhập quá 255 kí tự',
            'password_confirmation.required' => 'Bạn chưa nhập mật khẩu',
            'password_confirmation.max' => 'Không được nhập quá 255 kí tự',
            'password.required' => 'Bạn chưa nhập lại mật khẩu',
            'password.confirmed' => 'Nhập lại mật khẩu không đúng',
            'password.max' => 'Không được nhập quá 255 kí tự',
        ];
    }
}
