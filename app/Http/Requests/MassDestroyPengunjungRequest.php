<?php

namespace App\Http\Requests;

use App\Pengunjung;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyPengunjungRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('pengunjung_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:pengunjungs,id',
        ];
    }
}
