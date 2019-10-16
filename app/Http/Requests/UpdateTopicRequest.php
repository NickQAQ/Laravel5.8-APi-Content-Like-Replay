<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTopicRequest extends FormRequest
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


    public function rules()
    {
        return [
            'title'         => 'required|min:6',
            'topic_content' => 'required|min:10'
        ];
    }

    public function messages()
    {
        return [
            'title.required'         => '请填写标题',
            'title.min'              => '最少字数为6',
            'topic_content.required' => '请填写内容',
            'topic_content.min'      => '内容最少为10'
        ];
    }
}
