@extends('website.layout')
@section('content')
@include('alert')
{{$errors}}
@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
<div class="sj-innerbanner" style="margin-top: 20px;">
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                <div class="sj-innerbannercontent">
                    <h1><b>Submit Paper</b></h1>
                    <ol class="sj-breadcrumb">
                        <li><a href="index.html">Home</a></li>
                        <li><a href="#">Submit Paper</a></li>
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
@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
<main id="sj-main" class="sj-main sj-haslayout sj-sectionspace">
    <div class="container">
        <div class="row">
            <div id="sj-twocolumns" class="sj-twocolumns">
                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 float-right">
                    <div id="sj-content" class="sj-content sj-addarticleholdcontent">
                        <!-- <div class="sj-dashboardboxtitle">
                            <h2>Add A New Article</h2>
                        </div> -->
                        <div class="sj-addarticlehold">
                            <form id="registerForm" method="post" action="{{route('store_paper')}}" enctype="multipart/form-data">
                                @csrf
                                <fieldset>
                                    <div class="form-group">
                                        <!-- <label><b>Title :</b></title_of_paper> -->
                                        <input type="text" name="title_of_paper" class="form-control" placeholder="Title of Paper*">
                                    </div>

                                    <div class="form-group">
                                        <input type="text" name="author" class="form-control" placeholder="Author Name*">
                                    </div>

                                    <div class="form-group">
                                        <input type="text" name="affiliation" class="form-control" placeholder="Affilation*">
                                    </div>

                                    <div class="form-group">
                                        <input type="text" name="email" class="form-control" placeholder="Email Id*">
                                    </div>
                                    <!-- <div class="form-group">
                                        <input type="text" name="Corresponding" class="form-control" placeholder="Corresponding Author Title Here">
                                    </div> -->
                                    <div class="form-group">
                                        <textarea placeholder="Add Your Abstract" name="abstract"></textarea>
                                    </div>

                                    <div class="form-group">
                                        <textarea placeholder="Add Keywords" name="keywords"></textarea>
                                        @if ($errors->has('keywords'))
                                        <span class="text-danger">{{ $errors->first('keywords') }}</span>
                                    @endif
                                    </div>

                                    <div class="form-group">
                                        <textarea placeholder="Introduction" name="introduction"></textarea>
                                    </div>

                                    <div class="form-group">
                                        <textarea placeholder="Results" name="results"></textarea>
                                    </div>

                                    <div class="form-group">
                                        <textarea placeholder="Discussion" name="discussion"></textarea>
                                    </div>

                                    <div class="form-group">
                                        <textarea placeholder="Materials and Methods" name="materials_and_methods"></textarea>
                                    </div>

                                    <div class="form-group">
                                        <textarea placeholder="Conclusion" name="conclusion"></textarea>
                                    </div>

                                    <div class="form-group">
                                        <textarea placeholder="Abbreviations" name="abbreviations"></textarea>
                                    </div>

                                    <div class="form-group">
                                        <textarea placeholder="Declarations" name="declarations"></textarea>
                                    </div>

                                    <div class="form-group">
                                        <textarea placeholder="Conflict of Interests" name="conflict_of_interests"></textarea>
                                    </div>

                                    <div class="form-group">
                                        <textarea placeholder="Funding" name="funding"></textarea>
                                    </div>

                                    <div class="form-group">
                                        <textarea placeholder="Acknowledgment" name="acknowledgment"></textarea>
                                    </div>

                                    <div class="form-group">
                                        <textarea placeholder="References" name="references"></textarea>
                                    </div>

                                    <div class="sj-inputtyfile" style="padding-top:10px;">
                                        <div class="sj-title">
                                            <h3>Upload Photos</h3>
                                        </div>
                                        <label for="sj-uploadimgvtwo">
                                                <span>Upload Your File Here</span>
                                                <span><i class="ti-upload"></i></span>
                                                <input type="file" name="image" id="sj-uploadimgvtwo">
                                            </label>
                                        <div class="sj-filedetails">
                                            <span>File should be max 500kb </span>
                                            <em>Not Uploaded Yet</em>
                                        </div>
                                    </div>
                                </fieldset>

                                <div class="sj-submitdetails">
                                    <button class="sj-btn sj-btnactive">Submit Now</button>
                                </div>
                            </form>

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
            errorPlacement: function(error, element) {
            if (element.is("textarea")) {
                error.insertAfter(element); // Display error message below the textarea
            } else {
                error.insertAfter(element); // Default placement for other fields
            }
        },
            rules: {
                title_of_paper: {
                    required: true,
                },
                author: {
                    required: true,
                },
                affiliation: {
                    required: true,
                    // email: true
                },
                email: {
                    required: true,
                    // minlength: 6
                },
                abstract: {
                    required: true,
                    // equalTo: "#password"
                },
                keywords: {
                    required: true,
                },
                introduction: {
                    required: true,
                },
                results: {
                    required: true,
                },
                discussion: {
                    required: true,
                    // email: true
                },
                materials_and_methods: {
                    required: true,
                    // minlength: 6
                },
                conclusion: {
                    required: true,
                    // equalTo: "#password"
                },
                abbreviations: {
                    required: true,
                },
                declarations: {
                    required: true,
                },
                conflict_of_interests: {
                    required: true,
                },
                funding: {
                    required: true,
                },
                acknowledgment: {
                    required: true,

                },
                references: {
                    required: true,
                },
               
            },
            // messages: {
            //     firstname: {
            //         required: "Please enter Title"
            //     },
            //     lastname: {
            //         required: "Please enter your last name"
            //     },
            //     email: {
            //         required: "Please enter your email",
            //         email: "Please enter a valid email address"
            //     },
            //     password: {
            //         required: "Please enter a password",
            //         minlength: "Password must be at least 6 characters long"
            //     },
            //     retypepassword: {
            //         required: "Please re-enter your password",
            //         equalTo: "Passwords do not match"
            //     },
            //     terms: {
            //         required: "Please accept the terms and conditions"
            //     }
            //     firstname: {
            //         required: "Please enter your first name"
            //     },
            //     lastname: {
            //         required: "Please enter your last name"
            //     },
            //     email: {
            //         required: "Please enter your email",
            //         email: "Please enter a valid email address"
            //     },
            //     password: {
            //         required: "Please enter a password",
            //         minlength: "Password must be at least 6 characters long"
            //     },
            //     retypepassword: {
            //         required: "Please re-enter your password",
            //         equalTo: "Passwords do not match"
            //     },
            //     terms: {
            //         required: "Please accept the terms and conditions"
            //     }
            //     firstname: {
            //         required: "Please enter your first name"
            //     },
            //     lastname: {
            //         required: "Please enter your last name"
            //     },
            //     email: {
            //         required: "Please enter your email",
            //         email: "Please enter a valid email address"
            //     },
            //     password: {
            //         required: "Please enter a password",
            //         minlength: "Password must be at least 6 characters long"
            //     },
            //     retypepassword: {
            //         required: "Please re-enter your password",
            //         equalTo: "Passwords do not match"
            //     },
               
            // },

            messages: {
            title_of_paper: "Please enter the title of your paper.",
            author: "Please enter the author's name.",
            affiliation: "Please enter your affiliation.",
            email: "Please enter a valid email address.",
            abstract: "Please provide an abstract for your paper.",
            keywords: "Please provide keywords for your paper.",
            introduction: "Please provide an introduction.",
            results: "Please provide results.",
            discussion: "Please provide a discussion.",
            materials_and_methods: "Please provide materials and methods.",
            conclusion: "Please provide a conclusion.",
            abbreviations: "Please provide abbreviations used in your paper.",
            declarations: "Please provide declarations.",
            conflict_of_interests: "Please provide conflict of interests information.",
            funding: "Please provide funding information.",
            acknowledgment: "Please provide acknowledgments.",
            references: "Please provide references.",
        },
            
        });
    });
    </script>
@stop  