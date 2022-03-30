@extends('layouts.admin')
@section('content')
<div class="main-card">
    <div class="header">
        {{ trans('global.create') }} {{ trans('cruds.pengunjung.title_singular') }}
    </div>

    <form method="POST" action="{{ route("admin.pengunjungs.store") }}" enctype="multipart/form-data">
        @csrf
        <div class="body">
            <div class="mb-3">
                <label for="nama_pengunjung" class="text-xs required">{{ trans('cruds.pengunjung.fields.title') }}</label>

                <div class="form-group">
                    <input type="text" id="nama_pengunjung" name="nama_pengunjung" class="{{ $errors->has('nama_pengunjung') ? ' ' : '' }}" value="{{ old('nama_pengunjung') }}" required>
                </div>
                @if($errors->has('nama_pengunjung'))
                    <p class="invalid-feedback">{{ $errors->first('nama_pengunjung') }}</p>
                @endif
                <span class="block">{{ trans('cruds.pengunjung.fields.title_helper') }}</span>
            </div>
        </div>

        <div class="footer">
            <button type="submit" class="submit-button">{{ trans('global.save') }}</button>
        </div>
    </form>
</div>
@endsection
