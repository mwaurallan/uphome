@extends('layouts.app', ['page' => __('User Profile'), 'pageSlug' => 'profile', 'section' => 'users'])

@section('content')
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h5 class="title">Edit Admission</h5>
                </div>
                <form method="post" action="{{ route('admin.update') }}" autocomplete="off">
                    <div class="card-body">
                            @csrf
                            @method('put')

                            @include('alerts.success')
                        <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                            <label>Enter File Number</label>
                            <input type="text" name="id" class="form-control" value="">
                            @include('alerts.feedback', ['field' => 'name'])
                        </div>


                            <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                <label>permit_no</label>
                                <input type="text" name="permit_no" class="form-control" value="">
                                @include('alerts.feedback', ['field' => 'name'])
                            </div>
                        <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                            <label>Name(Next Of Kin)s</label>
                            <input type="text" name="name" class="form-control" value="">
                            @include('alerts.feedback', ['field' => 'name'])
                        </div>

                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-fill btn-primary">Save</button>
                    </div>
                </form>
            </div>


        </div>
{{--        <div class="col-md-4">--}}
{{--            <div class="card card-user">--}}
{{--                <div class="card-body">--}}
{{--                    <p class="card-text">--}}
{{--                        <div class="author">--}}
{{--                            <div class="block block-one"></div>--}}
{{--                            <div class="block block-two"></div>--}}
{{--                            <div class="block block-three"></div>--}}
{{--                            <div class="block block-four"></div>--}}
{{--                            <a href="#">--}}
{{--                                <img class="avatar" src="{{ asset('assets/img/emilyz.jpg') }}" alt="">--}}
{{--                                <h5 class="title">{{ auth()->user()->name }}</h5>--}}
{{--                            </a>--}}
{{--                            <p class="description"></p>--}}
{{--                        </div>--}}
{{--                    </p>--}}
{{--                    <div class="card-description"></div>--}}
{{--                </div>--}}

{{--                --}}{{-- <div class="card-footer">--}}
{{--                    <div class="button-container">--}}
{{--                        <button class="btn btn-icon btn-round btn-facebook">--}}
{{--                            <i class="fab fa-facebook"></i>--}}
{{--                        </button>--}}
{{--                        <button class="btn btn-icon btn-round btn-twitter">--}}
{{--                            <i class="fab fa-twitter"></i>--}}
{{--                        </button>--}}
{{--                        <button class="btn btn-icon btn-round btn-google">--}}
{{--                            <i class="fab fa-google-plus"></i>--}}
{{--                        </button>--}}
{{--                    </div>--}}
{{--                </div> --}}
{{--            </div>--}}
        </div>
    </div>
@endsection
