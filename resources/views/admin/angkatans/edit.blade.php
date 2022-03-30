@extends('layouts.admin')
@section('content')
<div class="main-card">
    <div class="header">
        {{ trans('global.edit') }} {{ trans('cruds.angkatan.title_singular') }}
    </div>

    <form method="POST" action="{{ route("admin.angkatans.update", [$angkatan->id]) }}" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <div class="body">
            <div class="mb-3">
                <label for="tahun" class="text-xs required">{{ trans('cruds.angkatan.fields.title') }}</label>

                <div class="form-group">
                    <input type="text" id="tahun" name="tahun" class="{{ $errors->has('tahun') ? ' ' : '' }}" value="{{ old('tahun', $angkatan->tahun) }}" required>
                </div>
                @if($errors->has('tahun'))
                    <p class="invalid-feedback">{{ $errors->first('tahun') }}</p>
                @endif
                <span class="block">{{ trans('cruds.angkatan.fields.title_helper') }}</span>
            </div>
        </div>

        <div class="footer">
            <button type="submit" class="submit-button">{{ trans('global.save') }}</button>
        </div>
    </form>
</div>
@endsection
