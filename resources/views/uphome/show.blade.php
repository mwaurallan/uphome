<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Uphomes</title>
    <style media="screen">
        body {
            font-family: 'Segoe UI','Microsoft Sans Serif',sans-serif;
        }

        /*
            These next two styles are apparently the modern way to clear a float. This allows the logo
            and the word "Invoice" to remain above the From and To sections. Inserting an empty div
            between them with clear:both also works but is bad style.
            Reference:
            http://stackoverflow.com/questions/490184/what-is-the-best-way-to-clear-the-css-style-float
        */
        header:before, header:after {
            content: " ";
            display: table;
        }

        header:after {
            clear: both;
        }

        .invoiceNbr {
            font-size: 20px;
            margin-right: 100px;
            margin-top: 60px;
            float:left;
        }

        .logo {
            float: left;
        }

        .from {
            float: left;
        }

        .to {
            float: right;
        }

        .fromto {
            border-style: solid;
            border-width: 1px;
            border-color: #e8e5e5;
            border-radius: 5px;
            margin: 20px;
            min-width: 200px;
        }

        .fromtocontent {
            margin: 10px;
            margin-right: 15px;
        }

        .panel {
            background-color: #e8e5e5;
            padding: 7px;
        }

        .items {
            clear: both;
            display: table;
            padding: 20px;
        }

        /* Factor out common styles for all of the "col-" classes.*/
        div[class^="col-"] {
            display: table-cell;
            padding: 7px;
        }

        /*for clarity name column styles by the percentage of width */
        .col-1-10 {
            width: 10%;
        }

        .col-1-52 {
            width: 52%;
        }

        .row {
            display: table-row;
            page-break-inside: avoid;
        }

    </style>

    <!-- These styles are exactly like the screen styles except they use points (pt) as units
        of measure instead of pixels (px) -->
    <style media="print">
        body {
            font-family: 'Segoe UI','Microsoft Sans Serif',sans-serif;
        }

        header:before, header:after {
            content: " ";
            display: table;
        }

        header:after {
            clear: both;
        }

        .invoiceNbr {
            font-size: 20pt;
            margin-right: 30pt;
            margin-top: 30pt;
            float:centre;
        }

        .logo {
            float: left;
        }

        .from {
            float: left;
        }

        .to {
            float: right;
        }

        .fromto {
            border-style: solid;
            border-width: 1pt;
            border-color: #e8e5e5;
            border-radius: 5pt;
            margin: 20pt;
            min-width: 200pt;
        }

        .fromtocontent {
            margin: 10pt;
            margin-right: 15pt;
        }

        .panel {
            background-color: #e8e5e5;
            padding: 7pt;
        }

        .items {
            clear: both;
            display: table;
            padding: 20pt;
        }

        div[class^="col-"] {
            display: table-cell;
            padding: 7pt;
        }

        .col-1-10 {
            width: 10%;
        }

        .col-1-52 {
            width: 52%;
        }

        .row {
            display: table-row;
            page-break-inside: avoid;
        }
    </style>

</head>
<body>



<header>
    <div class="logo">
        <img src="../images/genericlogo.jpg" alt="generic business logo" height="181" width="167" />
    </div>
    <div class="invoiceNbr">
        UPHOME FUNERAL HOME
        <br />
        Clearance Form
    </div>
</header>

<div class="fromto from">
    <div class="panel"> Deceased Details:</div>
    <div class="fromtocontent">
        @php
        $date = \Carbon\Carbon::parse($admins->date_admitted)->format('yy-m-d');
        @endphp
        <span>Admission No:{{$admins->id}}</span><br />
        <span>Name:{{$admins->name_of_deceased}}</span><br />
        <span>Date Admited:{{$date}}</span><br />

    </div>
</div>
<div class="fromto to">
    <div class="panel">TO:</div>
    <div class="fromtocontent">
        <span>Someone</span><br />
        <span>123 Street St.</span><br />
        <span>Portland ME, 04101</span>
    </div>
</div>

<section class="items">

    <!-- your favorite templating/data-binding library would come in handy here to generate these rows dynamically !-->
    <div class="row">
        <div class="col-1-10 panel">
            Labels
        </div>
        <div class="col-1-30 panel">
            Details
        </div>

        </div>
    </div>

    <div class="row">
        <div class="col-1-10">
           Name
        </div>
        <div class="col-1-52">
            {{$admins->name}}
        </div>
        <div class="col-1-10">
            12
        </div>
        <div class="col-1-10">
            25
        </div>
        <div class="col-1-10">
            $300.00
        </div>
    </div>
    <div class="row">
        <div class="col-1-10">
            ID_NO
        </div>
        <div class="col-1-52">
            {{$admins->id_no}}
        </div>
        <div class="col-1-10">
            12
        </div>
        <div class="col-1-10">
            25
        </div>
        <div class="col-1-10">
            $300.00
        </div>
    </div>
    <div class="row">
        <div class="col-1-10">
            Telephone_Number
        </div>
        <div class="col-1-52">
            {{$admins->tel_no}}
        </div>
        <div class="col-1-10">
            12
        </div>
        <div class="col-1-10">
            25
        </div>
        <div class="col-1-10">
            $300.00
        </div>
    </div>
    <div class="row">
        <div class="col-1-10">
            Permit_Number
        </div>
        <div class="col-1-52">
            {{$admins->permit_no}}
        </div>
        <div class="col-1-10">
            12
        </div>
        <div class="col-1-10">
            25
        </div>
        <div class="col-1-10">
            $300.00
        </div>
    </div>
    <div class="row">
        <div class="col-1-10">
          Relationship_With_Deceased
        </div>
        <div class="col-1-52">
            {{$admins->relationship}}
        </div>
        <div class="col-1-10">
            12
        </div>
        <div class="col-1-10">
            25
        </div>
        <div class="col-1-10">
            $300.00
        </div>
    </div>
    <div class="row panel">
        <div class="col-1-10">

        </div>
        <div class="col-1-52">

        </div>
        <div class="col-1-10">

        </div>
        <div class="col-1-10">
            Pay this amount:
        </div>
        <div class="col-1-10">
            $900.00
        </div>
    </div>
</section>

</body>
</html>
