<?php

namespace App\Http\Requests;

use App\Kategori;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyKategoriRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('kategori_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:categories,id',
        ];
    }
}
