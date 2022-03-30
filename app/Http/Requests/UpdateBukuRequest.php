<?php

namespace App\Http\Requests;

use App\Buku;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateBukuRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('buku_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'judul_buku' => [
                'string',
                'required',
            ],
        ];
    }
}
