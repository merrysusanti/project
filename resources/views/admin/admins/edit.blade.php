@extends('layouts.admin')
@section('content')
<div class="main-card">
    <div class="header">
        {{ trans('global.edit') }} {{ trans('cruds.admin.title_singular') }}
    </div>

    <form method="POST" action="{{ route("admin.admins.update", [$admin->id]) }}" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <div class="body">
            <div class="mb-3">
                <label for="nama" class="text-xs required">{{ trans('cruds.admin.fields.title') }}</label>

                <div class="form-group">
                    <input type="text" id="nama" name="nama" class="{{ $errors->has('nama') ? ' ' : '' }}" value="{{ old('nama', $admin->nama) }}" required>
                </div>
                @if($errors->has('nama'))
                    <p class="invalid-feedback">{{ $errors->first('nama') }}</p>
                @endif
                <span class="block">{{ trans('cruds.admin.fields.title_helper') }}</span>
            </div>
        </div>

        <div class="footer">
            <button type="submit" class="submit-button">{{ trans('global.save') }}</button>
        </div>
    </form>
</div>
@endsection
