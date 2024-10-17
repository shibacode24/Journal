@extends('website.layout')
@section('content')

<div class="sj-innerbanner" style="margin-top: 20px;">
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                <div class="sj-innerbannercontent">
                    <h1>Contact US</h1>
                    <ol class="sj-breadcrumb">
                        <li><a href="{{route('index')}}">Home</a></li>
                        <li><a href="javascript:void(0);">Contact Us</a></li>
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
            <div class="row">
                <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                    <div id="sj-content" class="sj-content">
                        <div class="sj-registerarea">
                            <div class="registernow">
                                <div class="sj-borderheading">
                                    <h2 style="color: rgb(3, 52, 131);"><b>Get in touch with us</b></h2>
                                </div>

                                <div class="row">
                                    <div class="col-12 col-sm-12 col-md-12 col-lg-4">
                                        <div class="sj-registerformholder" style="box-shadow: rgba(0, 0, 0, 0.16) 0px 10px 36px 0px, rgba(0, 0, 0, 0.06) 0px 0px 0px 1px; padding:30px;">
                                            <h4><b>Address :</b></h4>
                                            <p style="font-size: 15px; font-weight: 500;"><i class="fa fa-location-arrow"></i> &nbsp;C. K. Naidu Road, Camp, Maltekdi, Amravati, Maharashtra 444603
                                            </p>
                                        </div>
                                    </div>

                                    <div class="col-12 col-sm-12 col-md-12 col-lg-4 sj-registerformholder">
                                        <div class="sj-registerformholder" style="box-shadow: rgba(0, 0, 0, 0.16) 0px 10px 36px 0px, rgba(0, 0, 0, 0.06) 0px 0px 0px 1px; padding:30px;">
                                            <h4><b>Phone No. :</b></h4>
                                            <p style="font-size: 15px; font-weight: 500;"><i class="fa fa-phone"></i> &nbsp;<a href="tel:07212662740">(0721) 266 2740</a><br> <i class="fa fa-phone"></i> &nbsp;<a href="tel:07212552012">(0721) 255 2012</a> </p>
                                        </div>
                                    </div>

                                    <div class="col-12 col-sm-12 col-md-12 col-lg-4 sj-registerformholder">
                                        <div class="sj-registerformholder" style="box-shadow: rgba(0, 0, 0, 0.16) 0px 10px 36px 0px, rgba(0, 0, 0, 0.06) 0px 0px 0px 1px; padding:30px;">
                                            <h4><b>Email Id :</b></h4>
                                            <p style="font-size: 15px; font-weight: 500;"><i class="fa fa-envelope"></i> &nbsp;<a href="mailto:info@vbmv.org ">info@vbmv.org </a></p><br>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

@stop