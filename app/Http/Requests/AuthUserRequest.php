<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AuthUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'     => 'max:30|min:3|required|unique:users',
            'password' => 'max:100|min:6|required',
            'email'    => 'max:100|min:3|required',
            'mobile'   => 'max:12|min:11|required|unique:uses',
        ];
    }

    public function messages()
    {
        return [
            'name.max'          => '用户名最大30位',
            'name.min'          => '用户名最低3位',
            'name.required'     => '请填写用户名',
            'name.unique'       => '用户名已被占用',
            'password.max'      => '密码最高100位',
            'password.min'      => '密码最低6位',
            'password.required' => '请填写密码',
            'email.max'         => '密码最高100位',
            'email.min'         => '密码最低6位',
            'email.required'    => '请填写邮箱',
            'mobile.max'        => '手机号码最高100位',
            'mobile.min'        => '手机号码最低6位',
            'mobile.required'   => '请填手机号码',
        ];
    }


}
