@extends('layouts.app', ['page' => __('User Profile'), 'pageSlug' => 'profile', 'section' => 'users'])

@section('content')

    <div id="body">
    <div class="row">
        <div class="col-md-8">
            <div class="card  center" style="width:60rem;">
                <div class="card-header">
                    <div class="center2">
                        <p>UPHOME FUNERAL HOME</p>
                        <p>Admission Form</p>
                        <P>Tel:0798439434934</P>
                        <p>Email:info@uphome.com</p>
                    </div>

                </div>

                <form method="post" action="" autocomplete="off">
                    <div class="card-body">

                        <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                            <label  class="form-control-label" for="input-name"><p>Name</p></label>
                            <input type="text" name="name" class="form-control" placeholder="Name" value="{{$admins->name}}">
                            @include('alerts.feedback', ['field' => 'name'])
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                            <label><p>ID No:</p></label>
                         <input type="text" name="id_no" class="form-control" placeholder="ID Number" value="{{ $admins->id_no }}">
                            @include('alerts.feedback', ['field' => 'email'])
                        </div>


                        <div class="form-group{{ $errors->has('old_password') ? ' has-danger' : '' }}">
                            <label><p>Tel No:</p></label>
                            <input type="text" name="tel_no" class="form-control" placeholder="Telephone Number" value="{{$admins->tel_no}}" required>
                            @include('alerts.feedback', ['field' => 'old_password'])
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-danger' : '' }}">
                            <label><p>Name_of_Deceased</p></label>
                            <input type="text" name="Name_of_Deceased" class="form-control" placeholder="" value="{{$admins->name_of_deceased}}" required>
                            @include('alerts.feedback', ['field' => 'password'])
                        </div>
                        <div class="form-group">
                            <label><p>Admission No</p></label>
                            <input type="text" name="password_confirmation" class="form-control" placeholder="" value="{{$admins->id}}" required>
                        </div>
                        <div class="row">
                            <div>
                                <div class="form-group{{ $errors->has('stock') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-stock"><p>Date Admitted</p></label>
                                    <input type="text" name="county" id="home_area" class="form-control" value="{{\Carbon\Carbon::parse($admins->date_admitted)->format('j F, Y')}}"required>


                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group{{ $errors->has('stock_defective') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-stock_defective"><p>Permit No:</p></label>
                                    <input type="text" name="subcounty" id="subcounty" class="form-control" value="{{$admins->permit_no}}">
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group{{ $errors->has('price') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-price"><p>Relationship</p></label>
                                    <input type="text"  name="location" id="home_area" class="form-control" value="{{$admins->relationship}}">

                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="card-footer">
                        <button id="print" onclick="printContent('body');" >Print</button>
                    </div>
                </form>
            </div>
        </div>

    </div>
    </div>

@endsection
@push('js')
    <script>
        function printContent(el){
            var restorepage = $('body').html();
            var printcontent = $('#' + el).clone();
            $('body').empty().html(printcontent);
            window.print();
            $('body').html(restorepage);
        }
    </script>


@endpush
