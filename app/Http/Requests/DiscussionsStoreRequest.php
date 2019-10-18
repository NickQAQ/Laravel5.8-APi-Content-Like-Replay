<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DiscussionsStoreRequest extends FormRequest
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
            'topic_id' => 'required',
            'body'     => 'required|min:3'
        ];
    }

    public function messages()
    {
        return [
            'topic_id.required' => 'topic_id为必传字段',
            'body.required'     => '请填写内容',
            'body.min'          => '最少字段为3'
        ];
    }
}
