@extends('layouts.app', ['page' => __('User Profile'), 'pageSlug' => 'profile', 'section' => 'users'])

@section('content')

    <div id="body">
    <div class="row">
        <div class="col-md-8">
            <div class="card  center" style="width: 50rem;">
                <div class="card-header">
                    <div class="center2">
                        <p>UPHOME FUNERAL HOME</p>
                        <p>Admission Form</p>
                        <P>Tel:0798439434934</P>
                        <p>Email:info@uphome.com</p>
                    </div>

                </div>
                <form method="post" action="{{ route('profile.update') }}" autocomplete="off">
                    <div class="card-body">
                        @csrf
                        @method('put')

                        @include('alerts.success')

                        <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control" placeholder="Name" value="{{ old('name', auth()->user()->name) }}">
                            @include('alerts.feedback', ['field' => 'name'])
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                            <label>Email</label>
                         <input type="text" name="email" class="form-control" placeholder="Email" value="{{ old('email', auth()->user()->email) }}">
                            @include('alerts.feedback', ['field' => 'email'])
                        </div>


                        <div class="form-group{{ $errors->has('old_password') ? ' has-danger' : '' }}">
                            <label>Current password</label>
                            <input type="text" name="no -outline" class="form-control" placeholder="Current password" value="" required>
                            @include('alerts.feedback', ['field' => 'old_password'])
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-danger' : '' }}">
                            <label>New Password</label>
                            <input type="text" name="password" class="form-control" placeholder="New password" value="" required>
                            @include('alerts.feedback', ['field' => 'password'])
                        </div>
                        <div class="form-group">
                            <label>Confirm new password</label>
                            <input type="text" name="password_confirmation" class="form-control" placeholder="Confirm new password" value="" required>
                        </div>
                        <div class="row">
                            <div>
                                <div class="form-group{{ $errors->has('stock') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-stock">County</label>
                                    <input type="text" name="county" id="home_area" class="form-control" required>

                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group{{ $errors->has('stock_defective') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-stock_defective">Subcounties</label>
                                    <input type="text" name="subcounty" id="subcounty" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group{{ $errors->has('price') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-price">Home_Area</label>
                                    <input type="text"  name="location" id="home_area" class="form-control" required>

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
