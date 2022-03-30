<?php

namespace App\Http\Requests;

use App\Pengunjung;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdatePengunjungRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('pengunjung_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'nama_pengunjung' => [
                'string',
                'required',
            ],
        ];
    }
}
