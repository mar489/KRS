@extends('layouts.admin-menu')

@section('content')
    <div class="container mt-5 mb-5">
        <div class="row d-flex justify-content-center">
            <div class="create-register col-sm-12 col-md-10 col-lg-7">
                <p class="form-title">{{Session::get('name')}}</p>
                <div class="card-body">{{Session::get('result')}}</div>
            </div>
        </div>
    </div>
@endsection
