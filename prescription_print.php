<!DOCTYPE html>
<html>

<head>
    <title>SAHRC | PRESCRIPTION</title>

    <link href="http://fonts.googleapis.com/css?family=Lato:300,400,400italic,600,700|Raleway:300,400,500,600,700|Crete+Round:400italic" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">


</head>
<style>
    /* ROOT FONT STYLES */

    * {
        padding: 0;
        margin: 0 auto;
        box-sizing: border-box;
    }



    /* ==== GRID SYSTEM ==== */
    .container {
        width: 90%;
        margin-left: auto;
        margin-right: auto;
    }

    .row {
        position: relative;
        width: 100%;
    }

    .row [class^="col"] {
        float: left;
    }

    .row::after {
        content: "";
        clear: both;
        display: block;
    }

    .col-1 {
        width: 8.33%;
    }

    .col-2 {
        width: 16.66%;
    }

    .col-3 {
        width: 25%;
    }

    .col-4 {
        width: 33.33%;
    }

    .col-5 {
        width: 41.66%;
    }

    .col-6 {
        width: 50%;
    }

    .col-7 {
        width: 58.33%;
    }

    .col-8 {
        width: 66.66%;
    }

    .col-9 {
        width: 75%;
    }

    .col-10 {
        width: 83.33%;
    }

    .col-11 {
        width: 91.66%;
    }

    .col-12 {
        width: 100%;
    }

    /* Custom */

    .container {
        min-height: 84px;
        border: 1px solid black;
        max-width: 420px;
        margin: 0 auto;
        margin-top: 40px;
    }

    header {
        min-height: 83px;
        border-bottom: 1px solid black;

    }

    .doc-details {
        margin-top: 5px;
        margin-left: 15px;

    }

    .clinic-details {
        margin-top: 5px;
        margin-left: 15px;
    }

    .doc-name {
        font-weight: bold;
        margin-bottom: 5px;

    }

    .doc-meta {
        font-size: 9px;
    }

    .datetime {
        font-size: 10px;
        margin-top: 5px;

    }

    .row.title {
        font-weight: bold;
        padding-left: 10px;
        margin-top: 10px;
        margin-bottom: 10px;
    }

    .prescription {
        min-height: 380px;
        margin-bottom: 10px;
    }

    table {
        text-align: left;
        width: 90%;
        min-height: 25px;
    }

    table th {
        font-size: 8px;
        font-weight: bold;
    }

    table tr {
        margin-top: 20px;
    }

    table td {
        font-size: 7px;

    }

    .instruction {
        font-size: 6px;
    }
</style>

<body>
    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-3">

                </div>
                <div class="col-md-6">
                    <div class="wrapper">
                        <div class="title">
                            <h3 class="text-centre"> St. Anthony Hostpital & Research Center </h3>
                        </div>
                        <div class="content">
                            <table class="table">
                                <thead>
                                    <th>Sr.No.</th>
                                    <th>Item Name</th>
                                    <th>Qty</th>
                                    <th>Price</th>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1.</td>
                                        <td>Medicine 1</td>
                                        <td>1</td>
                                        <td>200</td>
                                    </tr>
                                    <tr>
                                        <td>2.</td>
                                        <td>Medicine 1 Medicine 1
                                            Medicine 1 Medicine 1dkjgflnv
                                        </td>
                                        <td>1</td>
                                        <td>200</td>
                                    </tr>
                                    <tr>
                                        <td>3.</td>
                                        <td>Medicine 1</td>
                                        <td>1</td>
                                        <td>200</td>
                                    </tr>
                                    <tr>
                                        <td>4.</td>
                                        <td>Medicine 1</td>
                                        <td>1</td>
                                        <td>200</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
                <div class="col-md-3">

                </div>
            </div>
        </div>
        <div class="container">
            <header class="row">
                <div class="col-10">
                    <div class="doc-details">
                        <p class="doc-name">Alvin plus father name</p>
                        <p class="doc-meta">MS - General Surgery , F.I.A.G.E.S , F.UROGYN(USA) , FECSM (Oxford , UK) , MBBS</p>
                        <p class="doc-meta">Rgn: 2341</p>
                    </div>

                    <div class="clinic-details">
                        <p class="doc-meta">Clinic Name</p>
                        <p class="doc-meta">#1, Crescent Park Street, Chennai</p>
                    </div>

                </div>
                <div class="col-2 datetime">
                    <p>Date: 18/03/16</p>
                    <p>Time: 03:13</p>
                </div>
            </header>
            <div class="prescription">
                <p style="margin-left:15px;font-size:10px;font-weight:bold;">Rx Name of patient, M/35</p>
                <table>
                    <tr>
                        <th></th>
                        <th>Type</th>
                        <th>Name of the drug</th>
                        <th>Dosage</th>
                        <th>Frequency</th>
                        <th>Period</th>
                    </tr>
                    <tr>
                        <td>1.</td>
                        <td>Tablet</td>
                        <td>Brufen Brufen Brufen</td>
                        <td>400 mg</td>
                        <td>1 - 0 - 1</td>
                        <td>10 days</td>
                    </tr>
                    <tr>
                        <td>2.</td>
                        <td>Lotion</td>
                        <td>Brufen</td>
                        <td>400 mg</td>
                        <td>1 - 0 - 1</td>
                        <td>10 days</td>
                    </tr>

                    <tr>
                        <td>3.</td>
                        <td>Syrub</td>
                        <td>Brufen</td>
                        <td>400 mg</td>
                        <td>1 - 0 - 1</td>
                        <td>10 days</td>
                    </tr>

                    <tr>
                        <td colspan="5">
                            <p style="margin-left:14px;font-size:6px">Before food (Don’t take the tab, I say)</p>
                        </td>
                    </tr>
                    <tr>
                        <td>4.</td>
                        <td>Oil</td>
                        <td>Brufen</td>
                        <td>400 mg</td>
                        <td>1 - 0 - 1</td>
                        <td>10 days</td>
                    </tr>

                </table>


            </div>

            <p style="font-size:9px;text-align:right;padding-bottom:15px;padding-right:25px;">Dr. Alvin plus father name</p>
            <p style="font-size:6px;text-align:center;padding-bottom:20px;">This is a digitally generated Prescription</p>
        </div>
    </section>

    <h2 style="background-color: #333;">The window.print() Method</h2>

    <p>Click the button to print the current page.</p>

    <button onclick="window.print()">Print this page</button>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>

</html>