<?php

namespace App\Http\Requests;

class TopicRequest extends Request
{
    public function rules()
    {
        switch($this->method())
        {
            // CREATE
            case 'POST':
            {
                return [
                    // CREATE ROLES
                ];
            }
            // UPDATE
            case 'PUT':
            case 'PATCH':
            {
                return [
                    'title'=>'required|min:2',
                    'category_id'=>'required|numeric',
                    'body'=>'required|min:3',
                ];
            }
            case 'GET':
            case 'DELETE':
            default:
            {
                return [];
            }
        }
    }

    public function messages()
    {
        return [
            'title.min'=>'文章标题至少需要两个字符',
            'body.min'=>'文章内容至少需三个字符'
        ];
    }
}
