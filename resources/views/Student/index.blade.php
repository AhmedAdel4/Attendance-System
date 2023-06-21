@extends('layouts.app')

@php
    $barcodValue = '';
@endphp

@section('content')
    @include('includes.messages')
    @include('layouts.parts.header', ['name' => 'Students'])

    <div class="mb-3">
        <a class="btn btn-success" href="{{ route('Student.create') }}">Add Student</a>
    </div>
    <div class="card">

        <!-- /.card-header -->
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Name Ar</th>
                        <th>Name En</th>
                        <th>Seat No</th>
                        <th>SSN</th>
                        <th>Phone</th>
                        <th>Group</th>
                        <th>Barcode</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($Students as $Student)
                        <tr>
                            <td>{{ $Student->nameAr }}</td>
                            <td>{{ $Student->nameEn }}</td>
                            <td>{{ $Student->seatNo }}</td>
                            <td>{{ $Student->ssn }}</td>
                            <td>{{ $Student->phone }}</td>
                            <td>{{ $Student->group->nameEn }}</td>
                            <td>
                                <a href="{{ route('Student.barcode', $Student->id) }}" class="btn btn-default">
                                    Show Barcode
                                </a>
                            </td>
                            <td>
                                <a class="btn btn-info" href="{{ route('Student.edit', $Student->id) }}">Edit<span
                                        class="glyphicon glyphicon-edit"></span></a>
                            </td>
                            <td>
                                <form action="{{ route('Student.destroy', $Student->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger">

                                        <span>Delete</span>
                                    </button>
                                </form>
                            </td>

                        </tr>
                    @endforeach
                </tbody>

                {{ $Students->links('pagination::bootstrap-4') }}
            </table>
        </div>
        <!-- /.card-body -->
    </div>


@endsection



@section('style')
    <link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
@endsection


@section('js')

    <script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('plugins/jszip/jszip.min.js') }}"></script>
    <script src="{{ asset('plugins/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ asset('plugins/pdfmake/vfs_fonts.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>


    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
    </script>
@endsection
