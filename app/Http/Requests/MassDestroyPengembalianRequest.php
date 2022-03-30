<?php

namespace App\Http\Requests;

use App\Pengembalian;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyPengembalianRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('pengembalian_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:pengembalians,id',
        ];
    }
}
