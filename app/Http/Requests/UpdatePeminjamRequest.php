<?php

namespace App\Http\Requests;

use App\Peminjam;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdatePeminjamRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('peminjam_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'nama_peminjam' => [
                'string',
                'required',
            ],
        ];
    }
}
