@extends('layouts.app')

@section('content')
    @include('includes.messages')
    @include('layouts.parts.header', ['name' => 'Instructor Subjects'])

    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Add Subject</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form action="{{ route('Instructor.storeSubject', $user->id) }}" method="POST">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="exampleSelectRounded0">Subject</label>
                    <select name="subject_id" class="custom-select rounded-0" id="exampleSelectRounded0">
                        @foreach ($Subjects as $Subject)
                            <option value="{{ $Subject->id }}">{{ $Subject->nameEn }}</option>
                        @endforeach
                    </select>
                    @error('subject_id')
                        <div class="text-danger">*{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
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
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($userSubjects as $userSubject)
                        <tr>
                            <td>{{ $userSubject->nameAr }}</td>
                            <td>{{ $userSubject->nameEn }}</td>
                            <td>
                                <form action="{{ route('Instructor.destroySubject',[$user->id, $userSubject->id]) }}" method="POST">
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
