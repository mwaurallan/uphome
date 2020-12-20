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
                            Email:uuphome44@gmail.com
                            <div>
                                Tel:072875392/0729544203
                            </div>
                            <div>
                                Website:www.uphomefuneral.com
                            </div>
                            <div>
                                Along Nairobi-Nakuru Highway
                            </div>
                            <div class="myDiv2">
                                <h1>Admission Form</h1>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
            <form method="post" action="" autocomplete="off">

                <div class="card-body">
                    <div class="myDiv">
                        <table class="table table-striped">
                            <tbody>
                            <tr>
                                <th scope="row"><h1>Adm_No</h1></th>
                                <td><div class="form-group"><h1><input type="text" class="form-control" value=" {{$admins->id}}"></h1></div></td>
                                <td><h1>Name_Of_Deceased</h1></td>
                                <td><div class="form-group">
                                <h1><input type="text" class="form-control" value=" {{$admins->name_of_deceased}}"></h1></div></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <div>
                    <h1 style="color:red;"> Next Of Kin Details</h1>
                    </div>
                    <table class="table table-striped">
                        <tbody>
                    <tr>
                        <th scope="row"><h1>Name</h1></th>
                        <td><div class="form-group"><h1><input type="text" class="form-control" value=" {{$admins->name}}"></h1></div></td>
                        <td><h1>ID No:</h1></td>
                        <td><div class="form-group">
                        <h1><input type="text" class="form-control" value=" {{$admins->id_no}}"></h1></div></td>
                     </tr>
                </tbody>
                </table>

                    .
                    <table class="table table-striped">
                        <tbody>
                        <tr>
                    <div class="form-group{{ $errors->has('old_password') ? ' has-danger' : '' }}">
                        <td><label><p>Tel No:</p></label></td>
                       <td><input type="text" name="tel_no" class="form-control" placeholder="Telephone Number" value="{{$admins->tel_no}}" required></td>
                        @include('alerts.feedback', ['field' => 'old_password'])
                    </div>
                    </tr>
                    </tbody>
                    </table>
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
                    <p style="color:red;">Witnessed By :Clerk At UPHOME</p>
                    <div class="row">
                        <div class="col-4">
                            <div class="form-group">
                                <textarea id="w3review" name="w3review" rows="6" cols="100" class="input2">

                                    Witness Name_____________________________Signature__________________

                                    Date Witnessed____________________________

                                </textarea>
                            </div>
                        </div>

                    </div>
                    <p style="color:red;">IMPORTANT INSTRUCTIONS</p>
                    <div class="form-group">
                                <textarea  rows="3" cols="100" class="input2">
                                    1-ALL PAYMENTS,BRINGING OF CLEAN CLOTHES,COFFIN AND ORIGINAL BURIAL PERMIT
                                    TO BE PRESENTED A DAY BEFORE THE COLLECTION DAY BETWEEN MON - FRI by 4PM.
                                </textarea>
                        <div>
                            <p>Note:On Sundays cashiers office remains closed,Kindly clear with the office on saturdays between 7am to 1pm</p>
                        </div>
                    </div>
                    <div class="myDiv3">
                    <P>I have read and understood all the terms and conditions and agreed to abide
                        by them Sign______________________________________</P>
                    </div>
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
