@extends('layouts.admin')
@section('content')
@can('pengembalian_create')
    <div class="block my-4">
        <a class="btn-md btn-green" href="{{ route('admin.pengembalians.create') }}">
            {{ trans('global.add') }} {{ trans('cruds.pengembalian.title_singular') }}
        </a>
    </div>
@endcan
<div class="main-card">
    <div class="header">
        {{ trans('cruds.pengembalian.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="body">
        <div class="w-full">
            <table class="stripe hover bordered datatable datatable-Pengembalian">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.pengembalian.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.pengembalian.fields.title') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($pengembalians ?? '' as $key => $pengembalian)
                        <tr data-entry-id="{{ $pengembalian->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $pengembalian->id ?? '' }}
                            </td>
                            <td>
                                {{ $pengembalian->nama_peminjam ?? '' }}
                            </td>
                            <td>
                                @can('pengembalian_show')
                                    <a class="btn-sm btn-indigo" href="{{ route('admin.pengembalians.show', $pengembalian->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('pengembalian_edit')
                                    <a class="btn-sm btn-blue" href="{{ route('admin.pengembalians.edit', $pengembalian->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('pengembalian_delete')
                                    <form action="{{ route('admin.pengembalians.destroy', $pengembalian->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn-sm btn-red" value="{{ trans('global.delete') }}">
                                    </form>
                                @endcan

                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>



@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('pengembalian_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.pengembalians.massDestroy') }}",
    className: 'btn-red',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
          return $(entry).data('entry-id')
      });

      if (ids.length === 0) {
        alert('{{ trans('global.datatables.zero_selected') }}')

        return
      }

      if (confirm('{{ trans('global.areYouSure') }}')) {
        $.ajax({
          headers: {'x-csrf-token': _token},
          method: 'POST',
          url: config.url,
          data: { ids: ids, _method: 'DELETE' }})
          .done(function () { location.reload() })
      }
    }
  }
  dtButtons.push(deleteButton)
@endcan

  $.extend(true, $.fn.dataTable.defaults, {
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  });
  let table = $('.datatable-Pengembalian:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });

})

</script>
@endsection
