<?php

namespace App\Http\Requests;

use App\Pengembalian;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StorePengembalianRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('pengembalian_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

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
