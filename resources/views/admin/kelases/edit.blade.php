@extends('layouts.admin')
@section('content')
<div class="main-card">
    <div class="header">
        {{ trans('global.edit') }} {{ trans('cruds.kelase.title_singular') }}
    </div>

    <form method="POST" action="{{ route("admin.kelases.update", [$kelase->id]) }}" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <div class="body">
            <div class="mb-3">
                <label for="nama_kelas" class="text-xs required">{{ trans('cruds.kelase.fields.title') }}</label>

                <div class="form-group">
                    <input type="text" id="nama_kelas" name="nama_kelas" class="{{ $errors->has('nama_kelas') ? ' ' : '' }}" value="{{ old('nama_kelas', $kelase->nama_kelas) }}" required>
                </div>
                @if($errors->has('nama_kelas'))
                    <p class="invalid-feedback">{{ $errors->first('nama_kelas') }}</p>
                @endif
                <span class="block">{{ trans('cruds.kelase.fields.title_helper') }}</span>
            </div>
        </div>

        <div class="footer">
            <button type="submit" class="submit-button">{{ trans('global.save') }}</button>
        </div>
    </form>
</div>
@endsection
