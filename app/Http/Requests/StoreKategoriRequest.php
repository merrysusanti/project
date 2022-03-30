<?php

namespace App\Http\Requests;

use App\Kategori;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreKategoriRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('kategori_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'nama_kategori' => [
                'string',
                'required',
            ],
        ];
    }
}
