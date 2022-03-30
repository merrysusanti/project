@extends('layouts.admin')
@section('content')
<div class="main-card">
    <div class="header">
        {{ trans('global.create') }} {{ trans('cruds.category.title_singular') }}
    </div>

    <form method="POST" action="{{ route("admin.categories.store") }}" enctype="multipart/form-data">
        @csrf
        <div class="body">
            <div class="mb-3">
                <label for="nama_kategori" class="text-xs required">{{ trans('cruds.category.fields.title') }}</label>

                <div class="form-group">
                    <input type="text" id="nama_kategori" name="nama_kategori" class="{{ $errors->has('nama_kategori') ? ' ' : '' }}" value="{{ old('nama_kategori') }}" required>
                </div>
                @if($errors->has('nama_kategori'))
                    <p class="invalid-feedback">{{ $errors->first('nama_kategori') }}</p>
                @endif
                <span class="block">{{ trans('cruds.category.fields.title_helper') }}</span>
            </div>
        </div>

        <div class="footer">
            <button type="submit" class="submit-button">{{ trans('global.save') }}</button>
        </div>
    </form>
</div>
@endsection
