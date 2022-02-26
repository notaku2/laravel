<?php

namespace App\Http\Requests;

use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class UpdateAnswerRequest extends FormRequest
{
    /*
    public function authorize()
    {
        abort_if(Gate::denies('answer_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
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
        ];
    }
}