@extends('layouts.app', ['page' => __('User Profile'), 'pageSlug' => 'profile', 'section' => 'users'])

@section('content')

    <div id="body">

            <div class="card  center" style="width:60rem;">
                <div class="card-header">
                    <div class="row no-gutters">
                        <div class="col-auto">
                            <img src="{{ asset('assets/img/logo10.jpeg') }}" width="300" height="300" class="img-fluid" alt="Uphome Logo">
                        </div>
                        <div class="col">
                            <div class="card-block px-6" align="center">
                                <p class="card-text">UPHOME FUNERAL HOME</p>
                            </div>
                            <div align="center">
                                Email:uphome@gmail.com
                                <div>
                                Tel:0883292332/082398932
                                </div>
                                <div>
                                    Website:www.uphomefuneral.com
                                </div>
                                <div>
                                    Along Nairobi-Nakuru Highway
                                </div>
                                <div class="myDiv2">
                                <h1>Clearance Form</h1>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
                <form method="post" action="" autocomplete="off">

                    <div class="card-body">
                        <div class="myDiv">
                            <div class="form-group{{ $errors->has('password') ? ' has-danger' : '' }}">
                                <label><p>Name_of_Deceased</p></label>
                                <input type="text" name="Name_of_Deceased" class="form-control input2" placeholder="" value="{{$clients->name_of_deceased}}" readonly>
                                @include('alerts.feedback', ['field' => 'password'])
                            </div>
                        <div class="form-group">
                            <label><p>File Number</p></label>
                            <input type="text" name="adm_no" class="form-control input2" placeholder="" value="{{$clients->id}}" readonly>
                        </div>
                        </div>
                        <p style="color:red;">(Relatives to check and comfirm name tag and body before removing)</p>

                        <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                            <label  class="form-control-label" for="input-name"><p>Next Of Kin</p></label>
                            <input type="text" name="name" class="form-control" placeholder="Name" value="{{$clients->location}}" readonly>
                            @include('alerts.feedback', ['field' => 'name'])
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                            <label><p>ID Number:</p></label>
                         <input type="text" name="id_no" class="form-control" placeholder="ID Number" value="{{ $clients->id_no }}" readonly>
                            @include('alerts.feedback', ['field' => 'email'])
                        </div>


                        <div class="form-group{{ $errors->has('old_password') ? ' has-danger' : '' }}">
                            <label><p>Payment Receipt No:</p></label>
                            <input type="text" name="rct_no" class="form-control" placeholder="Payment Receipt No" value="{{$clients->witness}}" readonly>
                            @include('alerts.feedback', ['field' => 'old_password'])
                        </div>
                        <div class="form-group{{ $errors->has('stock_defective') ? ' has-danger' : '' }}">
                            <label><p>Disposal Permit No:</p></label>
                            <input type="text" name="permit_no" id="subcounty" class="form-control" value="{{$clients->permit_no}}" readonly>
                        </div>
                        <p style="color:red;">BODY DESTINATION</p>

                        <div class="row">
                            <div>
                                <div class="form-group{{ $errors->has('stock') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-stock"><p>County</p></label>
                                    <input type="text" name="county" id="home_area" class="form-control input2" value="{{$clients->county}}"readonly>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group{{ $errors->has('price') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-price"><p>SubCounty</p></label>
                                    <input type="text"  name="subcounty" id="home_area" class="form-control input2" value="{{$clients->subcounty}}" readonly>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group{{ $errors->has('price') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-price"><p>Location</p></label>
                                    <input type="text"  name="location" id="home_area" class="form-control input2" value="{{$clients->location}}" readonly>
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div>
                                <div class="form-group{{ $errors->has('stock') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-stock"><p>Village</p></label>
                                    <input type="text" name="village" id="home_area" class="form-control input2" value="{{$clients->village}}"readonly>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group{{ $errors->has('price') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-price"><p>Nearest Shopping Centre</p></label>
                                    <input type="text"  name="nearest_centre" class="form-control input2" value="{{$clients->nearest_centre}}" readonly>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group{{ $errors->has('price') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-price"><p>Nearest Police</p></label>
                                    <input type="text"  name="nearest_police"  class="form-control input2" value="{{$clients->nearest_police}}" readonly>
                                </div>
                            </div>

                        </div>
                        <p style="color:red;">Witnesses</p>
                        <div class="row">
                            <div class="col-4">
                                 <div class="form-group">
                                    <label class="form-control-label" for="input-price"><p>Witness</p></label>
                                    <input type="text"  name="nearest_police"  class="form-control input3" value="{{$clients->witness}}" readonly>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-price"><p>Witness ID</p></label>
                                    <input type="text"  name="witness_id"  class="form-control input3" value="{{$clients->witness_id}}" readonly>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-price"><p>Signature</p></label>
                                    <input type="text"  name="witness_id"  class="form-control input3" value="__________________" readonly>
                                </div>
                            </div>

                        </div>
                        <p style="color:red;">Uphomes Official Details</p>
                        <div class="row">
                            <div class="col-4">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-price"><p>Authorising Officer</p></label>
                                    <input type="text"  name="nearest_police"  class="form-control input3" value="{{$clients->auth_officer}}" readonly>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-price"><p>Releasing Officer</p></label>
                                    <input type="text"  name="witness_id"  class="form-control input3" value="{{$clients->release_officer}}" readonly>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-price"><p>Date Released</p></label>
                                    <input type="text"  name="witness_id"  class="form-control input3" value="{{$clients->release_date}}" readonly>
                                </div>
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
