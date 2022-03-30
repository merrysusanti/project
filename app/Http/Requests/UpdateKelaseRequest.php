<?php

namespace App\Http\Requests;

use App\Kelase;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateKelaseRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('kelase_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

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
