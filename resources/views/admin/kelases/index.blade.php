@extends('layouts.admin')
@section('content')
@can('kelase_create')
    <div class="block my-4">
        <a class="btn-md btn-green" href="{{ route('admin.kelases.create') }}">
            {{ trans('global.add') }} {{ trans('cruds.kelase.title_singular') }}
        </a>
    </div>
@endcan
<div class="main-card">
    <div class="header">
        {{ trans('cruds.kelase.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="body">
        <div class="w-full">
            <table class="stripe hover bordered datatable datatable-Kelase">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.kelase.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.kelase.fields.title') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($kelases as $key => $kelase)
                        <tr data-entry-id="{{ $kelase->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $kelase->id ?? '' }}
                            </td>
                            <td>
                                {{ $kelase->nama_kelas ?? '' }}
                            </td>
                            <td>
                                @can('kelase_show')
                                    <a class="btn-sm btn-indigo" href="{{ route('admin.kelases.show', $kelase->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('kelase_edit')
                                    <a class="btn-sm btn-blue" href="{{ route('admin.kelases.edit', $kelase->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('kelase_delete')
                                    <form action="{{ route('admin.kelases.destroy', $kelase->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('kelase_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.kelases.massDestroy') }}",
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
  let table = $('.datatable-Kelase:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });

})

</script>
@endsection
