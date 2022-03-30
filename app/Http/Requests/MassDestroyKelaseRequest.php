<?php

namespace App\Http\Requests;

use App\Kelase;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyKelaseRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('kelase_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:kelase,id',
        ];
    }
}
