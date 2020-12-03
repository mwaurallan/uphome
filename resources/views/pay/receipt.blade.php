@extends('layouts.app', ['page' => 'New Admission', 'pageSlug' => 'admission', 'section' => 'inventory'])

@section('content')

   <div id="body">

           {{-- ... customer name and email fields --}}

           <div class="card  center" style="width: 50rem;">
               <div class="card-header">
                   <div class="center2">
                       <p>UPHOME FUNERAL HOME</p>
                       <p>Official Receipt</p>
                   </div>
                   <div class="right">
                       <P>Tel:0798439434934</P>
                       <p>Email:info@uphome.com</p>
                   </div>
               </div>


               <div class="card-body">
                   <table class="table" id="products_table">
                       <thead>

                       </thead>

                       <tbody>

                       <tr>
                           <td><p>hfjkdhfjkdhfkhdlfd
                               dfhdlfhdljfldjf
                               wfkjsdklfhkldfjklsdjfsklfvsd
                               dfkjsdklfhkldsjfkldjfkld
                               asfknhsaklfhasdklfjksdjf;sd
                               askjfksdjfd;kasjfdklhfsd
                               dkfjsdklfhsdklfhdklf;d
                               sfkhsdj;kfhsd;kfjd;kf
                               asskdfhasklfhkl</p></td>
                       </tr>
                       <tr>
                           <th>Services</th>
                           <th>Amount</th>
                       </tr>

                           @foreach ($orders as $order)

                                 <tr><td>{{$order->name}}</td><td>{{$order->quantity}}</td></tr>


                           @endforeach

                       <tr id="product1"></tr>

                       </tbody>

                   </table>


                   <div class="row">
                       <button id="print" onclick="printContent('body');" >Print</button>
                   </div>

           <div>

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
            select: '.form-select4'
        })
    </script>
    <script>
        $(document).ready(function(){
            let row_number = 1;
            $("#add_row").click(function(e){
                e.preventDefault();
                let new_row_number = row_number - 1;
                $('#product' + row_number).html($('#product' + new_row_number).html()).find('td:first-child');
                $('#products_table').append('<tr id="product' + (row_number + 1) + '"></tr>');
                row_number++;
            });

            $("#delete_row").click(function(e){
                e.preventDefault();
                if(row_number > 1){
                    $("#product" + (row_number - 1)).html('');
                    row_number--;
                }
            });
    });
    </script>
    <script>
        $(document).ready(function(){

            //iterate through each textboxes and add keyup
            //handler to trigger sum event
            $("#qty").each(function() {

                $(this).keyup(function(){
                    //calculateSum();
                   console.log('yes');
                });
            });

        });
    </script>

<script>
    $(document).ready(function(){
        $("#dato").datepicker({
            format: "dd-M-yyyy"
        });
    });
</script>
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
