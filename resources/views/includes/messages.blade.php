@if (count($errors) > 0)
    <p class="alert alert-danger alert-dismissible fade show" style="padding-top: 0px; text-align: center;font-size: x-large; height: 40px;"> Operation Faield </p>
@endif


@if (session()->has('success'))
    <p class="alert alert-success alert-dismissible fade show" style="padding-top: 0px; text-align: center;font-size: x-large; height: 40px;">{{session('success')}} </p>
@endif

@if (session()->has('warning'))
    <p class="alert alert-warning alert-dismissible fade show" style="padding-top: 0px; text-align: center;font-size: x-large; height: 40px;">{{session('warning')}} </p>
@endif
