@extends('layouts.app', ['page' => __('User Profile'), 'pageSlug' => 'profile', 'section' => 'users'])

@section('content')

    <div id="body">


            <div class="card  center" style="width:60rem;">
                <div class="card-header">
                    <div class="center2">
                        <p>UPHOME FUNERAL HOME</p>
                        <P>Tel:0798439434934</P>
                        <p>Email:info@uphome.com</p>
                        <h1>Admission Form</h1>
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
                                    <input type="text" name="county" id="home_area" class="form-control" value="{{$admins->date_admitted}}"required>


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
                        <p>Witnessed By :Clerk At UPHOME</p>
                        <div class="row">
                            <div class="col-4">
                                 <div class="form-group">
                                <textarea id="w3review" name="w3review" rows="6" cols="100">

                                    Witness Name_________________Signature__________________

                                    Date Witnessed_________________________

                                </textarea>
                            </div>
                            </div>

                        </div>
                        <p>Important Instructions</p>
                        <div class="form-group">
                                <textarea id="w3review" name="w3review" rows="6" cols="100">
                                    1- All bills clearance to be done one day before body collection
                                    3-A Coffin clean clothes one day befor body removal
                                    1-Original burial permit
                                    3-Original ID for rightful next of kin
                                </textarea>
                            <div>
                            <h2>Note:On Sunday the facility remains closed,Kindly clear with the office on saturday between 7am to 12pm</h2>
                            </div>
                        </div>
                        I have read and understood all the terms and conditions and agreed to abide
                        by them Sign______________________________________
                    </div>

                </form>
                <div class="card-footer">
                    <button id="print" onclick="printContent('body');" >Print</button>
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
