
@extends('layouts.admin.app')

@push('header.css')
    <style>
        .no-sort::after { display: none!important; }
        .no-sort { pointer-events: none!important; cursor: default!important; }
    </style>
@endpush

@section('content')
    <section class="content-header">
        <h1>Management Job</h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('admin.home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="{{ route('admin.job.index') }}">Management Job</a></li>
            <li class="active">List Data Job</li>
        </ol>
    </section>

    @if (session('alert'))
        <div class="pad margin no-print">
            <div class="callout callout-{{ session('alert')['alert'] }}" style="margin-bottom: 0!important;">
                <h4><i class="fa fa-{{ session('alert')['alert'] }}"></i> Note:</h4>
                {{ session('alert')['message'] }}
            </div>
        </div>
    @endif

    <section class="content">
        <div class="box box-primary color-palette-box">
            <div class="box-header with-border">
                <h1 class="box-title"><i class="fa fa-list-ul"></i> List Data Job</h1>
            </div>
            <div class="box-body">
                <div class="row">
                    <div class="col-md-12">
                        <table id="job_table" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th style="width: 10px" class="no-sort">#</th>
                                <th>Name</th>
                                <th>Experience</th>
                                <th>Program Study</th>
                                <th>Function</th>
                                <th>Open</th>
                                <th>Close</th>
                                <th>Published</th>
                                <th width="15%" class="no-sort">Action</th>
                            </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
            <div class="box-footer">
                <a href="{{ route('admin.job.create') }}" type="button" class="btn btn-primary btn-flat">Add Data Job</a>
                <a href="{{ route('admin.home') }}" type="button" class="btn btn-default btn-flat pull-right ">Home</a>
            </div>
        </div>
    </section>
@endsection

@push('footer.javascript')
    <!-- DataTables -->
    <script src="{{ asset('/template/adminLte/bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('/template/adminLte/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $.fn.dataTableExt.oApi.fnPagingInfo = function (oSettings)
            {
                return {
                    iStart        : oSettings._iDisplayStart,
                    iEnd          : oSettings.fnDisplayEnd(),
                    iLength       : oSettings._iDisplayLength,
                    iTotal        : oSettings.fnRecordsTotal(),
                    iFilteredTotal: oSettings.fnRecordsDisplay(),
                    iPage         : Math.ceil(oSettings._iDisplayStart / oSettings._iDisplayLength),
                    iTotalPages   : Math.ceil(oSettings.fnRecordsDisplay() / oSettings._iDisplayLength)
                };
            };

            $('#job_table').DataTable({
                paging      : true,
                lengthChange: true,
                ordering    : true,
                info        : true,
                autoWidth   : false,
                processing  : true,
                serverSide  : true,
                search      : true,
                ajax: '{!! route('admin.job.data_table') !!}',
                columns: [
                    { data: null, "orderable": false, "targets": 0 },
                    { data: 'name', name: 'name' },
                    { data: 'experience_name', name: 'experience_name' },
                    { data: 'program_study_name', name: 'program_study_name' },
                    { data: 'function', name: 'function' },
                    { data: 'open_format', name: 'open' },
                    { data: 'close_format', name: 'close' },
                    { data: 'status', name: 'status' },
                    { data: 'action', name: 'action', orderable: false, searchable: false }
                ],
                rowCallback: function (row, data, iDisplayIndex) {
                    let info = this.fnPagingInfo();
                    let page = info.iPage;
                    let length = info.iLength;
                    let index = page * length + (iDisplayIndex + 1);
                    $('td:eq(0)', row).html(index);
                }
            });
        });
    </script>
@endpush
