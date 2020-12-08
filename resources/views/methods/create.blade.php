@extends('layouts.app', ['page' => 'New Method', 'pageSlug' => 'methods-create', 'section' => 'transactions'])

@section('content')
    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card ">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">New Method</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('methods.index') }}" class="btn btn-sm btn-primary">Back to List</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body ">
                        <form action="" method="POST">
                            @csrf
                            <div class="row">
                                <div>
                                    <div class="form-group{{ $errors->has('stock') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-stock"><p>Date Admitted</p></label>
                                        <select name="service" id="home_area" class="form-select2 form-control" required>
                                            @foreach ($services as $service)

                                                <option value="{{$service->id}}" selected>{{$service->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group{{ $errors->has('stock_defective') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-stock_defective"><p>Permit No:</p></label>
                                        <input type="date" name="date1" id="subcounty" class="form-control" value="">
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group{{ $errors->has('price') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-price"><p>Relationship</p></label>
                                        <input type="date"  name="date2" id="home_area" class="form-control" value="">
                                    </div>
                                </div>
                                <div class="col-4">
                                <div class="text-center">
                                    <button type="submit" class="btn btn-success mt-4">Save</button>
                                </div>
                                </div>
                            </div>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
  @endsection
@push('js')
    <script>
        new SlimSelect({
            select: '.form-select'
        })
        new SlimSelect({
            select: '.form-select2'
        })
        new SlimSelect({
            select: '.form-select3'
        })
@endpush
