@extends('layouts.app', ['page' => 'Clients', 'pageSlug' => 'clients', 'section' => 'clients'])

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header">
                    <div class="row">
                        <div class="col-8">
                            <h4 class="card-title">Clients</h4>
                        </div>
                        <div class="col-4 text-right">
                            <a href="{{ route('admission.create') }}" class="btn btn-sm btn-primary">New Admission</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    @include('alerts.success')

                    <div class="">
                        <table  class="table table tablesorter" id="myTable">
                            <thead class=" text-primary">
                            <tr>


                                <th>Name</th>
                                <th>Email / Telephone</th>
                                <th>Balance</th>
                                <th>Purchases</th>
                                <th>Total Payment</th>
                                <th>User_Id</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                               @foreach ($clients as $client)

                                    <tr>
                                        <td>{{ $client->name }}--{{ $client->name_of_deceased }}-{{ $client->id_no }}</td>
                                        <td>
                                            <!--<a href="mailto:{{ $client->email }}">{{ $client->email }}</a>-->
                                            <!--<br>-->
                                            {{ $client->tel_no}}
                                        </td>
                                        <td>
                                         {{$client->home_area}}
                                        </td>
                                        <td>{{ $client->realtionship}}</td>
                                        <td>{{$client->permit_no }}</td>
                                        <td>{{$client->date_admitted}}</td>
                                        <td class="td-actions text-right">

                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer py-4">
                    <nav class="d-flex justify-content-end" aria-label="...">

                    </nav>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('js')

<script>
    $(document).ready( function () {
        $('#myTable').DataTable();
    } );
</script>
@endpush
