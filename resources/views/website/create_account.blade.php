@extends('website.layout')
@section('content')
{{-- @include('alert') --}}

<div class="sj-innerbanner" style="margin-top: 20px;">
    <div class="container">
        <div class="row">
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
            <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                <div class="sj-innerbannercontent">
                    <h1><b>Become A Member</b></h1>
                    <ol class="sj-breadcrumb">
                        <li><a href="index.html">Home</a></li>
                        <li><a href="create_account.html">Create Account</a></li>
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
                                    <h2 style="color: rgb(3, 52, 131);"><b>Create Your Account</b></h2>
                                </div>

                               

                                <div class="sj-registerformholder">
                                    <div class="row">
                                        <div class="col-12 col-sm-12 col-md-12 col-lg-6" style="box-shadow: rgba(0, 0, 0, 0.16) 0px 10px 36px 0px, rgba(0, 0, 0, 0.06) 0px 0px 0px 1px; padding:30px;">
                                            <form id="registerForm" action="{{ route('create_account_store') }}" method="post">
                                                @csrf
                                                <fieldset>
                                                    <div class="form-group">
                                                        <input type="text" name="firstname" class="form-control" placeholder="First Name*" value="{{old('firstname')}}">
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="text" name="lastname" class="form-control" placeholder="Last Name*" value="{{old('lastname')}}">
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="email" name="email" class="form-control" placeholder="Email*" value="{{old('email')}}">
                                                    </div>
                                                    <div class="form-group">
                                                        <select name="role" class="form-control">
                                                            <option value="author">Author</option>
                                                            <option value="reviewer">Reviewer</option>
                                                            {{-- <option value="both">Both</option> --}}
                                                          </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="text" name="affiliation" class="form-control" placeholder="Affiliation/Clg Name*" value="{{old('affiliation')}}"> 
                                                    </div> 
                                                    <div class="form-group">
                                                        <input type="password" name="password" id="password" class="form-control" placeholder="Password*">
                                                    </div> 
                                                    <div class="form-group">
                                                        <input type="password" name="retypepassword" class="form-control" placeholder="Re-type Password*">
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="sj-checkbox">
                                                            <input type="checkbox" id="terms" name="terms" value="1"  required checked>
                                                            <label for="terms">By registering, you accept our <a href="javascript:void(0);">Terms &amp; Conditions</a></label>
                                                        </div>
                                                    </div>
                                            
                                                    <div class="sj-btnarea">
                                                        <button type="submit" name="submit" class="sj-btn sj-btnactive">Register</button>
                                                    </div>
                                                </fieldset>
                                            </form>
                                            
                                        </div>
                                        <div class="col-12 col-sm-12 col-md-12 col-lg-1"></div>
                                        <div class="col-12 col-sm-12 col-md-12 col-lg-5">
                                            <div class="sj-borderheading">
                                                <h3><b>Benefits of Creating a Free Account</b></h3>
                                            </div>
                                            <div class="sj-howtoregister">
                                                <!-- <h3>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit.</h3>
                                                <div class="sj-description">
                                                    <p>Quis nostrud exercitation ullamcoaris nisiuate aliquip ex ea commodo consequat aute irure dolor atem reprehenderit in esse.</p>
                                                </div> -->
                                                <ul class="sj-liststyle" style="font-size: 18px; line-height: 22px;">

                                                    <li><span>Sharing and updating your research and working papers.</span></li>
                                                    <li><span>Ability to easily access, revise, and update your submitted papers.</span></li>
                                                    <li><span>Access to hundreds of thousands of working papers within our site.</span></li>
                                                    <li><span>Ability to see your rankings based on downloads from the site.</span></li>
                                                    <li><span>Ability to subscribe to hundreds of abstracting Journals.</span></li>
                                                    <li><span>Management of your account from anywhere.</span></li>

                                                </ul>
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
@section('js')
<script>
    $(document).ready(function() {
        $('#registerForm').validate({
            rules: {
                firstname: {
                    required: true
                },
                lastname: {
                    required: true
                },
                email: {
                    required: true,
                    email: true
                },
                password: {
                    required: true,
                    minlength: 4
                },
                retypepassword: {
                    required: true,
                    equalTo: "#password"
                },
                affiliation: {
                    required: true,
                    // equalTo: "#password"
                },
                role: {
                    required: true,
                    // equalTo: "#password"
                },
                terms: {
                    required: true
                }
            },
            messages: {
               
            firstname: {
            required: "<span class='error-msg'>Please enter your first name</span>"
        },
        lastname: {
            required: "<span class='error-msg'>Please enter your last name</span>"
        },
        email: {
            required: "<span class='error-msg'>Please enter your email</span>",
            email: "<span class='error-msg'>Please enter a valid email address</span>"
        },
        affiliation: {
            required: "<span class='error-msg'>Please enter your affiliation</span>",
            // email: "<span class='error-msg'>Please enter a valid email address</span>"
        },
        role: {
            required: "<span class='error-msg'>Please enter your role</span>",
            // email: "<span class='error-msg'>Please enter a valid email address</span>"
        },
        password: {
            required: "<span class='error-msg'>Please enter a password</span>",
            minlength: "<span class='error-msg'>Password must be at least 4 characters long</span>"
        },
        retypepassword: {
            required: "<span class='error-msg'>Please re-enter your password</span>",
            equalTo: "<span class='error-msg'>Passwords do not match</span>"
        },
        terms: {
            required: "<span class='error-msg'>Please accept the terms and conditions</span>"
        }
            },
            
            errorPlacement: function(error, element) {
                if (element.attr("name") == "terms") {
                error.insertAfter(element.parent());
            } else {
                error.insertAfter(element);
            }
        },
            // submitHandler: function(form) {
            //     form.submit();
            // }
        });
    });
</script>
@stop    