<?php

namespace App\Http\Requests;

use App\Admin;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateAdminRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('admin_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'nama' => [
                'string',
                'required',
            ],
        ];
    }
}
