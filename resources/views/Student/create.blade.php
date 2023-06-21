@extends('layouts.app')


@section('content')
    @include('includes.messages')
    @include('layouts.parts.header', ['name' => 'Add Student'])

    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Add Student</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form action="{{ route('Student.store') }}" method="POST">
            @csrf
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="Name">Name Ar</label>
                            <input type="text" name="nameAr" value="{{ old('nameAr') }}" class="form-control"
                                id="Name" placeholder="Enter name in arabic">
                            @error('nameAr')
                                <div class="text-danger">*{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="NameEn">Name En</label>
                            <input type="text" name="nameEn" value="{{ old('nameEn') }}" class="form-control"
                                id="NameEn" placeholder="Enter name in english">
                            @error('nameEn')
                                <div class="text-danger">*{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="seatNo">Seat No</label>
                            <input type="text" name="seatNo" value="{{ old('seatNo') }}" class="form-control"
                                id="seatNo" placeholder="Enter name in english">
                            @error('seatNo')
                                <div class="text-danger">*{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="ssn">SSN</label>
                            <input type="text" name="ssn" value="{{ old('ssn') }}" class="form-control"
                                id="ssn" placeholder="Enter name in english">
                            @error('ssn')
                                <div class="text-danger">*{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="phone">Phone</label>
                            <input type="text" name="phone" value="{{ old('phone') }}" class="form-control"
                                id="phone" placeholder="Enter name in english">
                            @error('phone')
                                <div class="text-danger">*{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleSelectRounded0">Group</label>
                            <select name="group_id" class="custom-select rounded-0" id="exampleSelectRounded0">
                                @foreach ($Groups as $Group)
                                    <option value="{{ $Group->id }}">{{ $Group->nameEn }}</option>
                                @endforeach
                            </select>
                            @error('group_id')
                                <div class="text-danger">*{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                </div>





            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
@endsection
