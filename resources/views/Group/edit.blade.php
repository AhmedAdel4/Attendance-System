@extends('layouts.app')


@section('content')
    @include('includes.messages')
    @include('layouts.parts.header', ['name' => 'Edit Group'])

    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Edit Group</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form action="{{ route('Group.update', $Group->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="card-body">
                <div class="form-group">
                    <label for="Name">Name Ar</label>
                    <input type="text" name="nameAr" value="{{ old('nameAr') ?? $Group->nameAr }}" class="form-control"
                        id="Name" placeholder="Enter name in arabic">
                    @error('nameAr')
                        <div class="text-danger">*{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="Name">Name En</label>
                    <input type="text" name="nameEn" value="{{ old('nameEn') ?? $Group->nameEn }}" class="form-control"
                        id="Name" placeholder="Enter name in english">
                    @error('nameEn')
                        <div class="text-danger">*{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>
    </div>
@endsection
