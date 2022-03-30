<?php

namespace App\Http\Requests;

use App\Anggota;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateAnggotaRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('anggota_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'nama_anggota' => [
                'string',
                'required',
            ],
        ];
    }
}
