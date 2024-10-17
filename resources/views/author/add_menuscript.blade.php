@extends('author.layout')
@section('content')


<div class="page-content-wrap">
    <div class="row">
        <div class="col-md-12">

            <div class="panel-body" style="padding:1px 5px 2px 5px;">

@include('alert')

                <!-- START WIZARD WITH SUBMIT BUTTON -->
                <!-- <div class="block">
                                <div class="col-md-12" style="margin-top:5px;">
                                    <div class="panel panel-default">
                                        <h5 class="panel-title" style="color:#07418F; background-color:#eaeaea; width:100%; font-size:14px;margin-top: 1vh;" align="center">
                                            <i class="fa fa-book"></i> &nbsp;<b>Menuscript</b>
                                        </h5>
                                    </div>
                                </div>
                                <form action="javascript:alert('Submited!');" role="form" class="form-horizontal">
                                    <div class="wizard show-submit">
                                        <ul>
                                            <li>
                                                <a href="#step-5">
                                                    <span class="stepNumber">1</span>
                                                    <span class="stepDesc">Step 1<br /><small>Add Menuscript</small></span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#step-6">
                                                    <span class="stepNumber">2</span>
                                                    <span class="stepDesc">Step 2<br /><small>Upload Menuscript</small></span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#step-7">
                                                    <span class="stepNumber">2</span>
                                                    <span class="stepDesc">Step 3<br /><small>Submit</small></span>
                                                </a>
                                            </li>
                                        </ul>
                                        <div id="step-5">
                                            <div class="col-md-12" style="margin-top:10px;">
                                                <div class="col-md-2">
                                                    <label class="control-label" style="margin-bottom: 5px;">Category<font color="#FF0000">*</font></label>
                                                    <select class="form-control select">
                                                            <option>Biology</option>
                                                            <option>Arts</option>
                                                            <option>Social Science</option>
                                                            <option>English</option>
                                                            <option>Mathematics</option>
                                                </select>
                                                </div>
                                                <div class="col-md-2">
                                                    <label class="control-label">Menuscript Title<font color="#FF0000">*</font></label>
                                                    <input type="text" class="form-control" name="fname" placeholder="" />
                                                </div>
                                                <div class="col-md-2">
                                                    <label class="control-label">Author Name<font color="#FF0000">*</font></label>
                                                    <select multiple class="form-control select">
                                                            <option>Pratik Mohod</option>
                                                            <option>Mayuri Vadatkar</option>
                                                            <option>Shubham Wankhade</option>
                                                            <option>Chetan Saraf</option>
                                                            <option>Yash Patil</option>                
                                                        </select>
                                                </div>
                                                <div class="col-md-2">
                                                    <label class="control-label">Affiliation<font color="#FF0000">*</font></label>
                                                    <input type="text" class="form-control" name="name" placeholder="" />
                                                </div>
                                
                                                <div class="col-md-2">
                                                    <label class="control-label">Date of Submission<font color="#FF0000">*</font></label>
                                                    <input type="text" class="form-control" name="name" placeholder="" />
                                                </div>
                                                <div class="col-md-2">
                                                    <label class="control-label">Upload Menuscript<font color="#FF0000">*</font></label>
                                                    <input type="file" class="form-control" name="name" placeholder="" />
                                                    <p style="font-size: 9px; padding-top: 1px;" align="center">Upload Supplementary File(Optional)<br>MS-Word(Doc/Docx)</p>
                                                </div>
                                                <div class="col-md-2" style="margin-top:20px;" align="left">
                                                    <button id="on" type="button" class="btn mjks" style="color:#FFFFFF; height:30px; width:50%;"> <i
                                                                        class="fa fa-plus"></i>Add</button>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="step-6">
                                            <div class="col-md-12" style="margin-top:15px;">
                                                <div class="panel-body" style="margin-top:5px; margin-bottom:15px;">
                                                    <table class="table datatable">
                                                        <thead>
                                                            <tr>
                                                                <th>Category</th>
                                                                <th>Menuscript Title</th>
                                                                <th>Author Name</th>
                                                                <th>Affiliation</th>
                                                                <th>Date of Submission</th>
                                                                <th>Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>Biology</td>
                                                                <td>Biology Research</td>
                                                                <td>Sachin Patil</td>
                                                                <td>Demo</td>
                                                                <td>12/05/2024</td>
                                                                <td>
                                                                    <a href="upload_menuscript.html"><button style="background-color:#3399ff; border:none; max-height:25px; margin-top:-5px; margin-bottom:-5px;" type="button" class="btn btn-info" data-toggle="tooltip" data-placement="top" title="Upload Menuscript"><i class="fa fa-upload" style="margin-left:5px;"></i></button></a>
                                                                    <button data-toggle="modal" data-target="#popup1" style="background-color:#028c24; border:none; max-height:25px; margin-top:-5px; margin-bottom:-5px;" type="button" class="btn btn-info" data-toggle="tooltip" data-placement="top" title="Status Tracker"><i class="fa fa-check-circle" style="margin-left:5px;"></i></button>
                                                                    <button style="background-color:#ff0000; border:none; max-height:25px; margin-top:-5px; margin-bottom:-5px;" type="button" class="btn btn-info" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash-o" style="margin-left:5px;"></i></button>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </form>
                            </div> -->
                <!-- END WIZARD WITH SUBMIT BUTTON -->


                <div class="col-md-12" style="margin-top:5px;">
                    <div class="panel panel-default">
                        <h5 class="panel-title"
                            style="color:#07418F; background-color:#eaeaea; width:100%; font-size:14px;margin-top: 1vh;"
                            align="center">
                            <i class="fa fa-book"></i> &nbsp;<b>Add Menuscript</b>
                        </h5>
                    </div>
                </div>
                <form id="menuscript_Form" action="{{route('author_create_menuscript')}}" method="post" enctype="multipart/form-data">
                    @csrf
                <div class="col-md-12" style="margin-top:10px;">
                    <div class="col-md-1"></div>
                    <div class="col-md-2">
                        <label class="control-label">Category<font color="#FF0000">*</font></label>
                        <select class="form-control select" name="category_id">
                           <option disabled selected>Select</option>
                            @foreach ($category as $categorys)
                            <option value="{{ $categorys->id }}" {{ old('category_id') == $categorys->id ? 'selected' : '' }}>
                                {{ $categorys->category_name }}
                            </option>  
                            @endforeach
                            {{-- <option>Arts</option>
                            <option>Social Science</option>
                            <option>English</option>
                            <option>Mathematics</option> --}}
                        </select>
                    </div>
                    <div class="col-md-2">
                        <label class="control-label">Menuscript Title<font color="#FF0000">*</font></label>
                        <input type="text" class="form-control" name="menuscript_title" value="{{ old('menuscript_title') }}" placeholder="" />
                    </div>
                    <!-- <div class="col-md-2">
                                    <label class="control-label">Author Name<font color="#FF0000">*</font></label>
                                    <select multiple class="form-control select">
                                            <option>Pratik Mohod</option>
                                            <option>Mayuri Vadatkar</option>
                                            <option>Shubham Wankhade</option>
                                            <option>Chetan Saraf</option>
                                            <option>Yash Patil</option>                
                                        </select>
                                </div>
                                <div class="col-md-2">
                                    <label class="control-label">Affiliation<font color="#FF0000">*</font></label>
                                    <input type="text" class="form-control" name="name" placeholder="" />
                                </div> -->
                    <div class="col-md-2">
                        <label class="control-label">Date of Submission<font color="#FF0000">*</font></label>
                        <input type="date" class="form-control" name="date_of_submission" value="{{ \Carbon\Carbon::now()->format('Y-m-d') }}" placeholder="" />
                    </div>
                    <div class="col-md-2" style="margin-top: 5px;">
                        <label class="control-label">Upload Menuscript<font color="#FF0000">*</font></label>
                        <input type="file" class="form-control" name="file" placeholder="" />
                        <p style="font-size: 9px; padding-top: 1px;" align="center">Upload 
                            File<br>MS-Word(Doc/Docx)</p>
                    </div>
                    <div class="col-md-2" style="margin-top:20px;" align="left">
                        <button id="on" type="submit" class="btn mjks"
                                style="color:#FFFFFF; height:30px; width:50%;"> <i
                                    class="fa fa-plus"></i>Next</button>
                    </div>
                    <div class="col-md-1"></div>

                </div>
            </form>
            </div>
        </div>
    </div>


</div>

<div class="modal" id="popup1" tabindex="-1" role="dialog" aria-labelledby="largeModalHead" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span
                        class="sr-only">Close</span></button>
                <h4 class="modal-title" id="H4">Status Tracker</h4>
            </div>
            <div class="modal-body" style="height:30%">
                <div class="col-md-12">
                    <table class="table datatable">
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>Reviewer1 Status</th>
                                <th>Reviewer2 Status</th>
                                <th>Editor Status</th>
                                <th>Remark</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>12/04/2024</td>
                                <td>Pending</td>
                                <td>In Progress</td>
                                <td>Pending</td>
                                <th>demo</th>
                            </tr>
                            <tr>
                                <td>22/05/2024</td>
                                <td>Accept</td>
                                <td>In Progress</td>
                                <td>Pending</td>
                                <th>demo</th>
                            </tr>
                            <tr>
                                <td>20/04/2023</td>
                                <td>In Progress</td>
                                <td>Reject</td>
                                <td>Pending</td>
                                <th>demo</th>
                            </tr>
                            <tr>
                                <td>09/02/2023</td>
                                <td>Accept</td>
                                <td>Accept</td>
                                <td>Pending</td>
                                <th>demo</th>
                            </tr>

                        </tbody>
                    </table>
                </div>

                <div class="modal-footer" style="border: none !important; background-color: #FFF !important;">
                    <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> -->
                </div>
            </div>
        </div>
    </div>
</div>

@stop
@section('js')
<script>
    $(document).ready(function() {
        $('#menuscript_Form').validate({
            rules: {
                category_id: {
                    required: true
                },
                menuscript_title: {
                    required: true
                },
                date_of_submission: {
                    required: true,
                    // email: true
                },
                file: {
                    required: true,
                },
            },
            messages: {
               
            category_id: {
            required: "<span class='error-msg'>Please enter category</span>"
        },
        menuscript_title: {
            required: "<span class='error-msg'>Please enter menuscript title</span>"
        },
        date_of_submission: {
            required: "<span class='error-msg'>Please enter date of submission</span>",
            // email: "<span class='error-msg'>Please enter a valid email address</span>"
        },
        // file: {
        //     required: "<span class='error-msg'>Please upload a file</span>",
        //     // minlength: "<span class='error-msg'>Password must be at least 4 characters long</span>"
        // },
            },
            
            // submitHandler: function(form) {
            //     form.submit();
            // }
        });
    });
</script>
@stop    