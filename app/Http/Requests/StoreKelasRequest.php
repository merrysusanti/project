<?php

namespace App\Http\Requests;

use App\Kelas;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreKelasRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('kelas_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'nama_kelas' => [
                'string',
                'required',
            ],
        ];
    }
}
