@extends('layouts.app')


@section('content')
    @include('includes.messages')
    @include('layouts.parts.header', ['name' => 'Add Group'])

    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Add Group</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form action="{{ route('Group.store') }}" method="POST">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="Name">Name Ar</label>
                    <input type="text" name="nameAr" value="{{ old('nameAr') }}" class="form-control" id="Name"
                        placeholder="Enter name in arabic">
                    @error('nameAr')
                        <div class="text-danger">*{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="NameEn">Name En</label>
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
