@extends('reviewer.layout')
@section('content')
            <div class="page-content-wrap">
                <div class="row">
                    <div class="col-md-12">

                        <div class="panel-body" style="padding:1px 5px 2px 5px;">
                            <form action="{{ route('reviewer_decision') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="id" value="{{ $manuscript->id }}">

                            <div class="col-md-12" style="margin-top:5px;">
                                <div class="panel panel-default">
                                    <h5 class="panel-title" style="color:#07418F; background-color:#eaeaea; width:100%; font-size:14px;margin-top: 1vh;" align="center">
                                        <i class="fa fa-check-square-o"></i> &nbsp;<b>Add Remark</b></h5>
                                </div>
                            </div>
                            <div class="col-md-12" style="margin-top:10px;">
                                <div class="col-md-2"></div>
                                <div class="col-md-8">
                                    <textarea id="editor" name="reviewer_remark" style="height:200px;" class="form-control"></textarea>
                                </div>
                                <div class="col-md-2"></div>
                            </div>
                            <div class="col-md-12" style="margin-top:10px;">
                                <div class="col-md-4"></div>

                                <div class="col-md-3" style="margin-top: 5px;">
                                    <label class="control-label">Upload File<font color="#FF0000">*</font></label>
                                    <input type="file" class="form-control" name="file" placeholder="" />
                                </div>

                                <div class="col-md-1" style="margin-top:22px;" align="left">
                                    <button id="on" type="button" class="btn mjks" style="color:#FFFFFF; width:100%;"> <i
                                                    class="fa fa-plus"></i>Add</button>
                                </div>
                                <div class="col-md-4"></div>
                            </div>
                            <!-- <div class="col-md-12" style="margin-top:20px;" align="center">
                                <div class="col-md-3"></div>
                                <div class="col-md-1">
                                    <img src="https://via.placeholder.com/75X75">
                                </div>
                                <div class="col-md-1">
                                    <img src="https://via.placeholder.com/75X75">
                                </div>
                                <div class="col-md-1">
                                    <img src="https://via.placeholder.com/75X75">
                                </div>
                                <div class="col-md-1">
                                    <img src="https://via.placeholder.com/75X75">
                                </div>
                                <div class="col-md-1">
                                    <img src="https://via.placeholder.com/75X75">
                                </div>
                                <div class="col-md-1">
                                    <img src="https://via.placeholder.com/75X75">
                                </div>
                                <div class="col-md-3"></div>
                            </div> -->
                            <div class="col-md-12" style="margin-top:20px;">
                                <div class="col-md-2"></div>
                                <div class="col-md-2" align="center">
                                    <input type="radio" id="major" name="reviewer_status" value="Major">
                                    <label for="major">Major Revised</label>
                                </div>
                                <div class="col-md-2" align="center">
                                    <input type="radio" id="minor" name="reviewer_status" value="Minor">
                                    <label for="minor">Minor Revised</label>
                                </div>
                                <div class="col-md-2" align="center">
                                    <input type="radio" id="accepted" name="reviewer_status" value="Accepted">
                                    <label for="accepted">Accepted</label>
                                </div>
                                <div class="col-md-2" align="center">
                                    <input type="radio" id="rejected" name="reviewer_status" value="Rejected">
                                    <label for="rejected">Rejected</label>
                                </div>
                                <div class="col-md-2"></div>
                            </div>
                            <div class="col-md-12" style="margin-top:10px;">
                                <div class="col-md-4"></div>
                                <div class="col-md-2" style="margin-top:22px;" align="left">
                                    <button id="on" type="submit" class="btn mjks" style="color:#FFFFFF; width:100%;"> <i
                                                    class="fa fa-check"></i>Submit</button></a>
                                </div>
                                <div class="col-md-2" style="margin-top:22px;" align="left">
                                    <a href="{{route('reviewer_dashboard')}}"><button id="on" type="button" class="btn mjks" style="color:#FFFFFF; width:100%;"> <i
                                                    class="fa fa-arrow-left"></i>Back to Dashboard</button></a>
                                </div>
                                <div class="col-md-4"></div>
                            </form>
                            </div>
                            <!-- <div class="row">

                                <div class="col-md-12" style="margin-top:15px;">
                                    <div class="panel panel-default">
                                        <h5 class="panel-title" style="color:#07418F; background-color:#eaeaea; width:100%; font-size:14px;margin-top: 1vh;" align="center">
                                            <i class="fa fa-users"></i> &nbsp;<b>Menuscripts</b>
                                        </h5>
                                    </div>
                                </div>

                                <div class="col-md-12" style="margin-top:15px;">
                                    <div class="panel-body" style="margin-top:5px; margin-bottom:15px;">
                                        <table class="table datatable">
                                            <thead>
                                                <tr>
                                                    <th>Sr. No.</th>
                                                    <th>Title</th>
                                                    <th>Issue Date</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>1</td>
                                                    <td>Physics Research</td>
                                                    <td>01/04/2024</td>
                                                    <td>
                                                        <button style="background-color:#07418F; border:none; max-height:25px; margin-top:-5px; margin-bottom:-5px;" type="button" class="btn btn-info" data-toggle="tooltip" data-placement="top" title="pdf"><i class="fa fa-file-pdf-o" style="margin-left:5px;"></i></button>
                                                        <button style="background-color:#028c24; border:none; max-height:25px; margin-top:-5px; margin-bottom:-5px;" type="button" class="btn btn-info" data-toggle="tooltip" data-placement="top" title="Review"><i class="fa fa-check-square-o" style="margin-left:5px;"></i></button>
                                                        <button data-toggle="modal" data-target="#popup1" style="background-color:#1389eb; border:none; max-height:25px; margin-top:-5px; margin-bottom:-5px;" type="button" class="btn btn-info" data-toggle="tooltip" data-placement="top" title="Status Tracker"><i class="fa fa-check-circle" style="margin-left:5px;"></i></button>
                                                    </td>
                                                </tr>


                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="col-md-2" style="margin-top:15px;"></div>
                            </div> -->
                        </div>
                    </div>
                </div>


            </div>
            <div class="modal" id="popup1" tabindex="-1" role="dialog" aria-labelledby="largeModalHead" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal"><span
                                aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
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
        </div>
   @stop
   @section('js')

   <script>
    // Initialize Quill
    var quill = new Quill('#editor', {
        theme: 'snow' // You can choose a different theme if you prefer
    });
    // Function to update the hidden input with Quill content and submit the form
    function submitForm() {
        var editorContent = document.querySelector('.ql-editor').innerHTML;
        document.getElementById('editor-content').value = editorContent;
        // Submit the form
        document.getElementById('myForm').submit(); 
    }
</script>

   @stop