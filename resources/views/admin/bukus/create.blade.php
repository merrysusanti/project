@extends('layouts.admin')
@section('content')
<div class="main-card">
    <div class="header">
        {{ trans('global.create') }} {{ trans('cruds.buku.title_singular') }}
    </div>

    <form method="POST" action="{{ route("admin.bukus.store") }}" enctype="multipart/form-data">
        @csrf
        <div class="body">
            <div class="mb-3">
                <label for="judul_buku" class="text-xs required">{{ trans('cruds.buku.fields.title') }}</label>

                <div class="form-group">
                    <input type="text" id="judul_buku" name="judul_buku" class="{{ $errors->has('judul_buku') ? ' ' : '' }}" value="{{ old('judul_buku') }}" required>
                </div>
                @if($errors->has('judul_buku'))
                    <p class="invalid-feedback">{{ $errors->first('judul_buku') }}</p>
                @endif
                <span class="block">{{ trans('cruds.buku.fields.title_helper') }}</span>
            </div>
        </div>

        <div class="footer">
            <button type="submit" class="submit-button">{{ trans('global.save') }}</button>
        </div>
    </form>
</div>
@endsection
