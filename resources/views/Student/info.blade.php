@extends('layouts.app')

@section('content')
    @include('includes.messages')
    @include('layouts.parts.header', ['name' => 'Student Info'])

    <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Student Information</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <strong> Name Ar</strong>

          <p class="text-muted">
            {{ $Student->nameAr }}
          </p>
          <hr>
          <strong> Name En</strong>

          <p class="text-muted">
            {{ $Student->nameEn }}
          </p>

          <hr>

          <strong> Seat No</strong>

          <p class="text-muted">{{ $Student->seatNo }}</p>

          <hr>

          <strong> SSN</strong>

          <p class="text-muted">
            {{ $Student->ssn }}
          </p>

          <hr>

          <strong> Phone</strong>

          <p class="text-muted">{{ $Student->phone }}</p>

          <hr>
          <strong> Group</strong>

          <p class="text-muted">{{ $Student->group->nameEn }}</p>

          <hr>
          
          <strong> Barcode</strong>
          
          <p class="text-muted">{!! DNS1D::getBarcodeHTML($Student->ssn, 'PHARMA') !!}</p>

          <hr>
        </div>
        <!-- /.card-body -->
      </div>
@endsection
