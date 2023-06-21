@extends('layouts.app')

@section('content')
    @include('includes.messages')
    @include('layouts.parts.header', ['name' => 'Students'])

    <div class="mb-3">
        <div class="row">
            <div class="col-md-3">
                <form id="AttendForm" action="{{ route('Instructor.attendStudents',[$subjectId,$weekId,$groupId]) }}" method="POST">
                    @csrf
                    <input type="text" class="form-control" autofocus name="studentBarcode" id="studentBarcode">
                </form>
            </div>
            <div class="col-md-11">
            </div>
        </div>
    </div>
    <div class="card card-primary">
        <!-- /.card-header -->
        <!-- form start -->
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
                                {!! DNS1D::getBarcodeHTML($Student->ssn, 'PHARMA') !!}
                            </td>


                        </tr>
                    @endforeach
                </tbody>

                {{-- {{ $Students->links('pagination::bootstrap-4') }} --}}
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
