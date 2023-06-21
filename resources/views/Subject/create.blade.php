@extends('layouts.app')


@section('content')
    @include('includes.messages')
    @include('layouts.parts.header', ['name' => 'Add Subject'])

    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Add Subject</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form action="{{ route('Subject.store') }}" method="POST">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="Name">Name</label>
                    <input type="text" name="nameAr" value="{{ old('nameAr') }}" class="form-control" id="Name"
                        placeholder="Enter name in arabic">
                    @error('nameAr')
                        <div class="text-danger">*{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="NameEn">Name</label>
                    <input type="text" name="nameEn" value="{{ old('nameEn') }}" class="form-control" id="NameEn"
                        placeholder="Enter name in english">
                    @error('nameEn')
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
@endsection
