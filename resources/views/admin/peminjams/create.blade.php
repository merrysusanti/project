@extends('layouts.admin')
@section('content')
<div class="main-card">
    <div class="header">
        {{ trans('global.create') }} {{ trans('cruds.peminjam.title_singular') }}
    </div>

    <form method="POST" action="{{ route("admin.peminjams.store") }}" enctype="multipart/form-data">
        @csrf
        <div class="body">
            <div class="mb-3">
                <label for="nama_peminjam" class="text-xs required">{{ trans('cruds.peminjam.fields.title') }}</label>

                <div class="form-group">
                    <input type="text" id="nama_peminjam" name="nama_peminjam" class="{{ $errors->has('nama_peminjam') ? ' ' : '' }}" value="{{ old('nama_peminjam') }}" required>
                </div>
                @if($errors->has('nama_peminjam'))
                    <p class="invalid-feedback">{{ $errors->first('nama_peminjam') }}</p>
                @endif
                <span class="block">{{ trans('cruds.peminjam.fields.title_helper') }}</span>
            </div>
        </div>

        <div class="footer">
            <button type="submit" class="submit-button">{{ trans('global.save') }}</button>
        </div>
    </form>
</div>
@endsection
