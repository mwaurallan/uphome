@extends('layouts.app', ['page' => __('User Profile'), 'pageSlug' => 'profile', 'section' => 'users'])

@section('content')

    <div id="body">


            <div class="card  center" style="width:60rem;">
                <div class="card-header">
                    <div class="center2">
                        <p>UPHOME FUNERAL HOME</p>
                        <p>Admission Form</p>
                        <P>Tel:0798439434934</P>
                        <p>Email:info@uphome.com</p>
                    </div>

                </div>


                    <div class="card-body">
                    <div>
                <table class="table">
                    <th>Client</th>
                    <th>Service</th>
                    <th>Payment_Date</th>
                    <th>Amount_Paid</th>

                    @foreach($orders as $order)
                        <tr>
                            <td>{{$order->customer_name}}</td>
                            <td>{{$order->name}}</td>
                            <td>{{$order->payment_date}}</td>
                            <td>{{$order->amount_paid}}</td>
                        </tr>
                    @endforeach
                    <tr>
                        <td><p>Totals</p></td>
                        <td></td>
                        <td></td>
                        <td><p>{{number_format($total,2)}}</p></td>
                    </tr>
                </table>
                    </div>

                    </div>


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
