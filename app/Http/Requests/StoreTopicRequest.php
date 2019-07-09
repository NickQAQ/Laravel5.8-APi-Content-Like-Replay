<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTopicRequest extends FormRequest
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
            'title'   => 'require|min:6',
            'content' => 'require|min:10'
        ];
    }

    public function messages()
    {
        return [
            'title.require'   => '请填写标题',
            'title.min'       => '最少字数为6',
            'content.require' => '请填写内容',
            'content.min'     => '内容最少为10'

        ];
    }
}
