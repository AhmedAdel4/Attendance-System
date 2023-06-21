@extends('layouts.app')


@section('content')
    @include('includes.messages')
    @include('layouts.parts.header', ['name' => 'Edit Instructor'])

    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Edit Instructor</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form action="{{ route('Instructor.update',$instructor->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="card-body">
                <div class="form-group">
                    <label for="Name">Name</label>
                    <input type="text" name="name" value="{{ old('name') ?? $instructor->name }}" class="form-control" id="Name"
                        placeholder="Enter name">
                        @error('name')
                        <div class="text-danger">*{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" value="{{ old('email') ?? $instructor->email }}" name="email" class="form-control"
                        id="exampleInputEmail1" placeholder="Enter email">
                        @error('email')
                        <div class="text-danger">*{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Phone</label>
                    <input type="text" value="{{ old('phone') ?? $instructor->phone }}" name="phone" class="form-control"
                        id="exampleInputEmail1" placeholder="Enter phone">
                        @error('phone')
                        <div class="text-danger">*{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleSelectRounded0">Title</label>
                    <select name="title_id" class="custom-select rounded-0" id="exampleSelectRounded0">
                        @foreach ($titles as $title)
                            <option value="{{ $title->id }} {{ $instructor->title_id == $title->id? 'selected' : '' }}">{{ $title->name }}</option>
                        @endforeach
                    </select>
                    @error('title')
                    <div class="text-danger">*{{ $message }}</div>
                @enderror
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" name="password" value="{{ old('password') }}" class="form-control"
                        id="exampleInputPassword1" placeholder="Password">
                        @error('password')
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
