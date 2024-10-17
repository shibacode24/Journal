@extends('website.layout')
@section('content')


<div class="sj-innerbanner" style="margin-top: 20px;">
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                <div class="sj-innerbannercontent">
                    <h1><b>Become A Member</b></h1>
                    <ol class="sj-breadcrumb">
                        <li><a href="{{route('index')}}">Home</a></li>
                        <li><a href="javascript:void(0);">Log In</a></li>
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
                                <div class="col-sm-7 col-md-7  sj-borderheading">
                                    <h2 style="color: rgb(3, 52, 131);"><b>Login into Your Account</b></h2>
                                </div>
                                <div class="col-sm-5 col-md-5  sj-borderheading">
                                    <h2 style="color: rgb(3, 52, 131);"><b>Create A Free Account</b></h2>
                                </div>
                                <div class="sj-registerformholder">
                                    <div class="row">
                                        <div class="col-12 col-sm-12 col-md-12 col-lg-6" style="box-shadow: rgba(0, 0, 0, 0.16) 0px 10px 36px 0px, rgba(0, 0, 0, 0.06) 0px 0px 0px 1px; padding:30px;">
                                            <form class="sj-formtheme sj-formregister" action="{{route('check_login')}}" method="post">
                                                @csrf
                                                <fieldset>
                                                    <div class="form-group">
                                                        <input type="email" name="email" class="form-control" placeholder="Email*">
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="password" name="password" class="form-control" placeholder="Password*">
                                                    </div>
                                                    <div class="sj-btnarea">
                                                        <button type="submit" class="sj-btn sj-btnactive"> Log In </button>
                                                    </div>
                                                </fieldset>
                                            </form>
                                        </div>
                                        <div class="col-12 col-sm-12 col-md-12 col-lg-1"></div>
                                        <div class="col-12 col-sm-12 col-md-12 col-lg-5">
                                            <!-- <div class="sj-borderheading">
                                                <h3><b>Create A Free Account</b></h3>
                                            </div> -->
                                            <div class="sj-howtoregister">
                                                <p style="color:black; font-size: 20px;">Get our Free Membership! Join Us Now!</p><br>
                                                <form class="sj-formtheme sj-formregister">
                                                    <fieldset>
                                                        <div class="form-group">
                                                            <input type="email" name="youremail" class="form-control" placeholder="Email*">
                                                        </div>
                                                        <div class="sj-btnarea">
                                                            <a class="sj-btn sj-btnactive" href="javascript:void(0);">Join Us</a>
                                                        </div>
                                                    </fieldset>
                                                </form>
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
    </div>
</main>

@stop