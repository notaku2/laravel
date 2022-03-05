<?php

namespace App\Http\Requests;

use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class StoreQuestionRequest extends FormRequest
{
    /*
    public function authorize()
    {
        abort_if(Gate::denies('question_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        return true;
    }
    */

    public function rules()
    {
        return [
            'character' => [
                'required',
            ],
            'line' => [
                'required',
            ],
            'user_id' =>[
                'required',
            ],
            'title_id' =>[
                'required',
            ],
            'chapter_id' =>[
                'required',
            ],
        ];
    }
}