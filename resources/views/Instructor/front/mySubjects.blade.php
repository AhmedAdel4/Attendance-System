@extends('layouts.app')

@section('content')
    @include('includes.messages')
    @include('layouts.parts.header', ['name' => 'My Subjects'])


    <div class="card card-solid">
        <div class="card-body pb-0">
            <div class="row">
                @foreach ($subjects as $subject)
                    <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column">
                        <div class="card bg-light d-flex flex-fill">
                            <div class="card-body pt-0">
                                <div class="row" style="text-align: end; margin-top: 30px;">
                                    <div class="col-7">
                                        <h2 class="lead"><b>{{ $subject->nameEn }}</b></h2>
                                    </div>
                                    {{-- <div class="col-5 text-center">
                                        <img src="../../dist/img/user1-128x128.jpg" alt="user-avatar"
                                            class="img-circle img-fluid">
                                    </div> --}}
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="row">
                                    <div class="col-md-6">
                                        <a href="{{ route('Instructor.subjectWeeks', $subject->id) }}"
                                            class="btn btn-sm btn-primary">
                                            {{-- <i class="fas fa-user"></i> --}}
                                             View Weeks
                                        </a>
                                    </div>
                                    <div class="col-md-6 text-right">
                                        <a class="btn btn-sm  btn-success"
                                            href="{{ route('Instructor.printReport', $subject->id) }}">Print Report</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <!-- /.card-body -->

        <!-- /.card-footer -->
    </div>
@endsection
