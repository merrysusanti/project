<?php

namespace App\Http\Requests;

use App\Angkatan;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateAngkatanRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('angkatan_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'tahun' => [
                'string',
                'required',
            ],
        ];
    }
}
