@extends('layouts.admin')
@section('content')
<div class="main-card">
    <div class="header">
        {{ trans('global.show') }} {{ trans('cruds.pengunjung.title') }}
    </div>

    <div class="body">
        <div class="block pb-4">
            <a class="btn-md btn-gray" href="{{ route('admin.pengunjungs.index') }}">
                {{ trans('global.back_to_list') }}
            </a>
        </div>
        <table class="striped bordered show-table">
            <tbody>
                <tr>
                    <th>
                        {{ trans('cruds.pengunjung.fields.id') }}
                    </th>
                    <td>
                        {{ $pengunjung->id }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('cruds.pengunjung.fields.title') }}
                    </th>
                    <td>
                        {{ $pengunjung->nama_pengunjung }}
                    </td>
                </tr>
            </tbody>
        </table>
        <div class="block pt-4">
            <a class="btn-md btn-gray" href="{{ route('admin.pengunjungs.index') }}">
                {{ trans('global.back_to_list') }}
            </a>
        </div>
    </div>
</div>
@endsection
