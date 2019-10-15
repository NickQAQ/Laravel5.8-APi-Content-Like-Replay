<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterUserRequest extends FormRequest
{
    /**
     *是否要验证身份 true 不需要验证 false 需要验证身份
     */
    public function authorize()
    {
        return true;
    }

    /**
     * 定义规则
     */
    public function rules()
    {
        return [
            'name'      => 'required|min:3|max:20|unique:users',
            'email'     => 'required|min:3|email|unique:users',
            'password'  => 'required|min:3|max:20',
            'mobile'    => 'required|min:11|max:12',
        ];
    }

    /**
     * 定义规则验证失败的返回信息
     */
    public function messages()
    {
        return [

            'name.required'      => '请填写用户名',
            'name.min'           => '用户名小于3位',
            'name.max'           => '用户名最多位20位',
            'name.unique'        => '此用户名已存在',
            'email.email'        => '请输入正确的邮箱格式',
            'email.required'     => '请填写邮箱地址',
            'email.min'          => '邮箱最少3位',
            'email.unique'       => '该邮箱已存在',
            'password.required'  => '请填写密码',
            'password.min'       => '密码不得小于3位',
            'password.max'       => '密码最多20位',
            'mobile.required'    => '请输入手机号码',
            'mobile.min'         => '手机号码最少为11位',
            'mobile.max'         => '手机号码最多为12位'

        ];
    }
}
