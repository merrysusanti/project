<?php

namespace App\Http\Requests;

use App\Angkatan;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyAngkatanRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('angkatan_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:angkatans,id',
        ];
    }
}
