@extends('author.layout')
@section('content')

    <div class="page-content-wrap">
        <div class="row">
            <div class="col-md-12">
                <form id="register_Form" action="{{ route('update_paper_for_editor') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" value="{{$added_menuscript->id}}" name="id">
                    <div class="panel-body" style="padding:1px 5px 2px 5px;">


                        <div class="col-md-12" style="margin-top:5px;">
                            <div class="panel panel-default">
                                <h5 class="panel-title"
                                    style="color:#07418F; background-color:#eaeaea; width:100%; font-size:14px;margin-top: 1vh;"
                                    align="center">
                                    <i class="fa fa-book"></i> &nbsp;<b>Update Menuscript</b>
                                  
                                </h5>
                            </div>
                        </div>
                       
                            <input type="hidden" name="menuscript_id" value="{{ $added_menuscript->menuscript_id }}" >

                        <div class="col-md-12" style="margin-top:10px;">

                            <div class="col-md-12">
                                <label class="control-label">Title</label>
                                <input type="text" class="form-control" name="title_of_paper" value="{{ $added_menuscript->title_of_paper }}" placeholder="" />
                            </div>
                            <div class="col-md-6" style="margin-top:15px;">
                                <label class="control-label">Category<font color="#FF0000">*</font></label>
                                <select class="form-control select" name="category_id">
                                    <option disabled selected>Select</option>
                                    @foreach ($category as $categorys)
                                        <option value="{{ $categorys->id }}" @if ($added_menuscript->category_id == $categorys->id)
                                            selected @endif>{{ $categorys->category_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6" style="margin-top:15px;">
                                <label class="control-label">Author Name</label>
                                <input type="text" class="form-control" name="author" value="{{$added_menuscript->author_name}}" placeholder="" />
                                <!-- <select multiple class="form-control select">
                                                <option>Pratik Mohod</option>
                                                <option>Mayuri Vadatkar</option>
                                                <option>Shubham Wankhade</option>
                                                <option>Chetan Saraf</option>
                                                <option>Yash Patil</option>
                                            </select>  -->
                            </div>
                            <div class="col-md-6" style="margin-top:15px;">
                                <label class="control-label">Affiliation</label>
                                <input type="text" class="form-control" name="affiliation" value="{{ $added_menuscript->affiliation }}" placeholder="" />
                            </div>
                            <div class="col-md-6" style="margin-top:15px;">
                                <label class="control-label">Email Id</label>
                                <input type="text" class="form-control" name="email" value="{{ $added_menuscript->email }}" placeholder="" />
                            </div>
                            <div class="col-md-12" style="margin-top:15px;">
                                <label class="control-label">Add Your Abstract</label>
                                <textarea class="summernote" name="abstract">{{$added_menuscript->abstract}}
                                    </textarea>
                                    {{-- <textarea  name="abstract">
                                    </textarea> --}}
                            </div>
                            <div class="col-md-12" style="margin-top:15px;">
                                <label class="control-label">Add Keywords</label>
                                <textarea class="summernote"name="keywords">{{$added_menuscript->keyword}}
                                    </textarea>
                            </div>
                            <div class="col-md-12" style="margin-top:15px;">
                                <label class="control-label">Introduction</label>
                                <textarea class="summernote" name="introduction">{{$added_menuscript->introduction}}
                                    </textarea>
                            </div>
                            <div class="col-md-12" style="margin-top:15px;">
                                <label class="control-label">Results</label>
                                <textarea class="summernote" name="results">{{$added_menuscript->results}}
                                    </textarea>
                            </div>
                            <div class="col-md-12" style="margin-top:15px;">
                                <label class="control-label">Discussion</label>
                                <textarea class="summernote" name="discussion">{{$added_menuscript->discussion}}
                                    </textarea>
                            </div>
                            <div class="col-md-12" style="margin-top:15px;">
                                <label class="control-label">Materials and Methods</label>
                                <textarea class="summernote" name="materials_and_methods">{{$added_menuscript->materials_and_methods}}
                                    </textarea>
                            </div>
                            <div class="col-md-12" style="margin-top:15px;">
                                <label class="control-label">Conclusion</label>
                                <textarea class="summernote" name="conclusion">{{$added_menuscript->conclusion}}
                                    </textarea>
                            </div>
                            <div class="col-md-12" style="margin-top:15px;">
                                <label class="control-label">Abbreviations</label>
                                <textarea class="summernote" name="abbreviations">{{$added_menuscript->abbreviations}}
                                    </textarea>
                            </div>
                            <div class="col-md-12" style="margin-top:15px;">
                                <label class="control-label">Declarations</label>
                                <textarea class="summernote" name="declarations">{{$added_menuscript->declarations}}
                                    </textarea>
                            </div>
                            <div class="col-md-12" style="margin-top:15px;">
                                <label class="control-label">Conflict of Interests</label>
                                <textarea class="summernote" name="conflict_of_interests">{{$added_menuscript->conflict_of_interests}}
                                    </textarea>
                            </div>
                            <div class="col-md-12" style="margin-top:15px;">
                                <label class="control-label">Funding</label>
                                <textarea class="summernote" name="funding">{{$added_menuscript->funding}}
                                    </textarea>
                            </div>
                            <div class="col-md-12" style="margin-top:15px;">
                                <label class="control-label">Acknowledgment</label>
                                <textarea class="summernote" name="acknowledgment">{{$added_menuscript->acknowledgment}}
                                    </textarea>
                            </div>
                            <div class="col-md-12" style="margin-top:15px;">
                                <label class="control-label">References</label>
                                <textarea class="summernote" name="references">{{$added_menuscript->references}}
                                    </textarea>
                            </div>
                            <div class="col-md-12" style="margin-top:20px;" align="center">
                                <button id="on" type="submit" class="btn mjks"
                                    style="color:#FFFFFF; height:30px; width:20%;"> <i class="fa fa-plus"></i>Update &
                                    Next</button>
                            </div>


                            <!-- <div class="col-md-12" style="margin-top:20px;" align="center">
                                            <button id="on" type="button" data-toggle="modal" data-target="#popup1" class="btn mjks" style="color:#FFFFFF; height:30px; width:20%;"> <i
                                            class="fa fa-plus"></i>Submit & Next</button>
                                        </div> -->

                        </div>

                    </div>
                </form>
            </div>
        </div>


    </div>

    <div class="modal" id="popup1" tabindex="-1" role="dialog" aria-labelledby="largeModalHead"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span
                            aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4 class="modal-title" id="H4">Sign Up</h4>
                </div>
                <div class="modal-body" style="height:30%">
                    <div class="col-md-12">
                        <label class="control-label">First Name</label>
                        <input type="text" class="form-control" name="fname" placeholder="" />
                    </div>
                    <div class="col-md-12">
                        <label class="control-label">Last Name</label>
                        <input type="text" class="form-control" name="lname" placeholder="" />
                    </div>
                    <div class="col-md-12" style="margin-top:10px;">
                        <label class="control-label">Email Id</label>
                        <input type="text" class="form-control" name="email" placeholder="" />
                    </div>
                    <div class="col-md-12" style="margin-top:10px;">
                        <label class="control-label">Select Role</label>
                        <select class="form-control select">
                            <option>Both(Admin & Reviewer)</option>
                            <option>Admin</option>
                            <option>Reviewer</option>
                        </select>
                    </div>
                    <div class="col-md-12" style="margin-top:10px; ">
                        <label class="control-label">Password</label>
                        <input type="text" class="form-control" name="fname" placeholder="" />
                    </div>
                    <div class="col-md-12" style="margin-top:10px; ">
                        <label class="control-label">Confirm Password</label>
                        <input type="text" class="form-control" name="fname" placeholder="" />
                    </div>
                    <div class="modal-footer" style="border: none !important; background-color: #FFF !important;"
                        align="center">
                        <button id="on" type="button" class="btn mjks"
                            style="color:#FFFFFF; height:30px; width:30%;"> <i class="fa fa-plus"></i>Submit &
                            Next</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop
@section('js')

<script>

     $(document).ready(function() {
        // console.log(1);
              
        // $(document).ready(function() {
        $('#register_Form').validate({
        
            rules: {
                title_of_paper: {
                    required: true,
                },
                category_id: {
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
            category_id: "Please select the category.",
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