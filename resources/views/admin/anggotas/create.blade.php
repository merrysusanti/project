@extends('layouts.admin')
@section('content')
<div class="main-card">
    <div class="header">
        {{ trans('global.create') }} {{ trans('cruds.anggota.title_singular') }}
    </div>

    <form method="POST" action="{{ route("admin.anggotas.store") }}" enctype="multipart/form-data">
        @csrf
        <div class="body">
            <div class="mb-3">
                <label for="nama_anggota" class="text-xs required">{{ trans('cruds.anggota.fields.title') }}</label>

                <div class="form-group">
                    <input type="text" id="nama_anggota" name="nama_anggota" class="{{ $errors->has('nama_anggota') ? ' ' : '' }}" value="{{ old('nama_anggota') }}" required>
                </div>
                @if($errors->has('nama_anggota'))
                    <p class="invalid-feedback">{{ $errors->first('nama_anggota') }}</p>
                @endif
                <span class="block">{{ trans('cruds.anggota.fields.title_helper') }}</span>
            </div>
        </div>

        <div class="footer">
            <button type="submit" class="submit-button">{{ trans('global.save') }}</button>
        </div>
    </form>
</div>
@endsection
