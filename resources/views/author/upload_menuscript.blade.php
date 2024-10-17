@extends('author.layout')
@section('content')

    <div class="page-content-wrap">
        <div class="row">
            <div class="col-md-12">
                <form id="register_Form" action="{{ route('store_paper') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="panel-body" style="padding:1px 5px 2px 5px;">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <div class="col-md-12" style="margin-top:5px;">
                            <div class="panel panel-default">
                                <h5 class="panel-title"
                                    style="color:#07418F; background-color:#eaeaea; width:100%; font-size:14px;margin-top: 1vh;"
                                    align="center">
                                    <i class="fa fa-book"></i> &nbsp;<b>Upload Menuscript</b>
                                    {{-- {{ $menuscriptId }} --}}

                                </h5>
                            </div>
                        </div>
                        {{-- <p>Menuscript ID: {{ session('menuscript_id') }}</p>    agar hume direct id use kr na ho to session use kr na --}}
                        @if (isset($menuscriptId))
                            <input type="text" name="menuscript_id" value="{{ $menuscriptId }}" >
                        @else
                            <input type="text" name="menuscript_id" value="{{ old('menuscript_id') }}" >
                        @endif

                        <div class="col-md-12" style="margin-top:10px;">

                            <div class="col-md-12">
                                <label class="control-label">Title</label>
                                <input type="text" class="form-control" name="title_of_paper"
                                    value="{{ old('title_of_paper') }}" placeholder="" />
                            </div>
                            <div class="col-md-6" style="margin-top:15px;">
                                <label class="control-label">Category</label>
                                <select class="form-control select" name="category_id">
                                    <option disabled selected>Select</option>
                                    {{-- @foreach ($category as $categorys)
                                        <option value="{{ $categorys->id }}" @if (app('request')->input('category_id') == $categorys->id)
                                            selected
                                        @endif>{{ $categorys->category_name }}</option>
                                    @endforeach --}}

                                    @foreach ($category as $categorys)
                                        <option value="{{ $categorys->id }}"
                                            @if (old('category_id', app('request')->input('category_id')) == $categorys->id) selected @endif>
                                            {{ $categorys->category_name }}
                                        </option>
                                    @endforeach


                                </select>
                            </div>
                            <div class="col-md-6" style="margin-top:15px;">
                                <label class="control-label">Author Name</label>
                                <input type="text" class="form-control" name="author" value="{{ old('author') }}"
                                    placeholder="" />
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
                                <input type="text" class="form-control" name="affiliation"
                                    value="{{ old('affiliation') }}" placeholder="" />
                            </div>
                            <div class="col-md-6" style="margin-top:15px;">
                                <label class="control-label">Email Id</label>
                                <input type="text" class="form-control" name="email" value="{{ old('email') }}"
                                    placeholder="" />
                                @error('email')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-12" style="margin-top:15px;">
                                <label class="control-label">Add Your Abstract</label>
                                <textarea class="summernote" name="abstract">{{ old('abstract') }}
                                    </textarea>
                                @error('abstract')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-12" style="margin-top:15px;">
                                <label class="control-label">Add Keywords</label>
                                <textarea class="summernote"name="keywords">
                                    {{ old('keywords') }}
                                    </textarea>
                                @error('keywords')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            {{-- <div class="col-md-12" style="margin-top:15px;">
                                <label class="control-label">Introduction</label>
                                <textarea class="summernote" name="introduction">
                                    </textarea>
                            </div> --}}
                            <div class="col-md-12" style="margin-top:15px;">
                                <label class="control-label">Introduction</label>
                                <textarea class="summernote" name="introduction">{{ old('introduction') }}</textarea>
                                @error('introduction')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-12" style="margin-top:15px;">
                                <label class="control-label">Results</label>
                                <textarea class="summernote" name="results">
                                    {{ old('results') }}
                                    </textarea>
                                @error('results')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-12" style="margin-top:15px;">
                                <label class="control-label">Discussion</label>
                                <textarea class="summernote" name="discussion">
                                    {{ old('discussion') }}
                                    </textarea>
                                @error('discussion')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-12" style="margin-top:15px;">
                                <label class="control-label">Materials and Methods</label>
                                <textarea class="summernote" name="materials_and_methods">
                                    {{ old('materials_and_methods') }}
                                </textarea>
                                @error('materials_and_methods')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-12" style="margin-top:15px;">
                                <label class="control-label">Conclusion</label>
                                <textarea class="summernote" name="conclusion">
                                    {{ old('conclusion') }}
                                    </textarea>
                                @error('conclusion')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-12" style="margin-top:15px;">
                                <label class="control-label">Abbreviations</label>
                                <textarea class="summernote" name="abbreviations">
                                    {{ old('abbreviations') }}
                                    </textarea>
                                @error('abbreviations')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-12" style="margin-top:15px;">
                                <label class="control-label">Declarations</label>
                                <textarea class="summernote" name="declarations">
                                    {{ old('declarations') }}
                                </textarea>
                                @error('declarations')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-12" style="margin-top:15px;">
                                <label class="control-label">Conflict of Interests</label>
                                <textarea class="summernote" name="conflict_of_interests">
                                    {{ old('conflict_of_interests') }}
                                    </textarea>
                                @error('conflict_of_interests')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-12" style="margin-top:15px;">
                                <label class="control-label">Funding</label>
                                <textarea class="summernote" name="funding">
                                    {{ old('funding') }}
                                    </textarea>
                                @error('funding')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-12" style="margin-top:15px;">
                                <label class="control-label">Acknowledgment</label>
                                <textarea class="summernote" name="acknowledgment">{{ old('acknowledgment') }}</textarea>
                                @error('acknowledgment')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                            </div>
                            <div class="col-md-12" style="margin-top:15px;">
                                <label class="control-label">References</label>
                                <textarea class="summernote" name="references">{{ old('references') }}</textarea>
                                @error('references')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                            </div>
                            <div class="col-md-12" style="margin-top:20px;" align="center">
                                <button id="on" type="submit" class="btn mjks"
                                    style="color:#FFFFFF; height:30px; width:20%;"> <i class="fa fa-plus"></i>Submit &
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
                            {{-- <option>Both(Admin & Reviewer)</option> --}}
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
                errorPlacement: function(error, element) {
                    console.log(element);
                    if (element.is("textarea")) {
                        console.log("Placing error for textarea:", element);
                        // element.nextAll(".error").append(error);
                        element.closest(".col-md-12").find(".error").append(error);
                    } else {
                        console.log("Placing error for other element:", element);
                        error.insertAfter(element);
                    }
                },

                //                 errorPlacement: function(error, element) {
                //     if (element.is("textarea")) {
                //         console.log("Placing error for textarea:", element);
                //         error.insertAfter(element); // Ensure this targets the correct element
                //     } else {
                //         console.log("Placing error for other element:", element);
                //         error.insertAfter(element);
                //     }
                // },

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
