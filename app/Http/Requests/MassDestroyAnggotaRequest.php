<?php

namespace App\Http\Requests;

use App\Anggota;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyAnggotaRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('anggota_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:anggotas,id',
        ];
    }
}
