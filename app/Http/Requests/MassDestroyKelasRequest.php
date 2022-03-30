<?php

namespace App\Http\Requests;

use App\Kelas;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyKelasRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('kelas_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:kelas,id',
        ];
    }
}
