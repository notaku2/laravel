<?php

namespace App\Http\Requests;

use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;
use App\Models\User;

class UpdateUserRequest extends FormRequest
{
    /*
    public function authorize()
    {
        abort_if(Gate::denies('user_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        return true;
    }
    */

    public function rules()
    {
        return [
            'name' => [
                'required',
            ],
            'email' => [
                'required',
                'unique:users,email,' . request()->route('user')->id,
            ],
        ];
    }
}