@extends('website.layout')
@section('content')

<div class="sj-innerbanner" style="margin-top: 20px;">
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                <div class="sj-innerbannercontent">
                    <h1><b>Publication Charges</b></h1>
                    <ol class="sj-breadcrumb">
                        <li><a href="{{route('index')}}">Home</a></li>
                        <li><a href="{{route('website_login')}}">Log In</a></li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</div>
<!--************************************
        Inner Banner End
*************************************-->
<!--************************************
        Main Start
*************************************-->
<main id="sj-main" class="sj-main sj-haslayout sj-sectionspace sj-loginupdates">
    <div id="sj-twocolumns" class="sj-twocolumns">
        <div class="container">

            <div class="sj-ourhistory sj-sectioninnerspace">
                <div class="sj-borderheading">
                    <h3><b>Publication Charges</b></h3>
                </div>
                <div class="sj-description">

                    <table class="sj-tableourhistory table-bordered" style="border:1px solid; border-color:#ddd">
                        <thead>
                            <tr>
                                <th rowspan="2"><b>Menuscript Type</b></th>
                                <th colspan="4"><b>Publishing Charges</b></th>
                            </tr>
                            <tr>
                                <th><b>USD</b></th>
                                <th><b>EURO</b></th>
                                <th><b>GBP</b></th>
                                <th><b>INR</b></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>

                                <td>Regular Articles</td>
                                <td>20</td>
                                <td>20 </td>
                                <td>20 </td>
                                <td>2000 </td>
                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</main>

@stop