@extends('editor.layout')
@section('content')

    <div class="page-content-wrap">
        <div class="row">
            <div class="col-md-12">

                <div class="panel-body" style="padding:1px 5px 2px 5px;">

                    <!--
                    <div class="col-md-12" style="margin-top:5px;">
                        <div class="panel panel-default">
                            <h5 class="panel-title" style="color:#07418F; background-color:#eaeaea; width:100%; font-size:14px;margin-top: 1vh;" align="center">
                                <i class="fa fa-users"></i> &nbsp;<b>Add Editor</b></h5>
                        </div>
                    </div>
                    <div class="col-md-12" style="margin-top:10px;">
                    
                        <div class="col-md-2">
                            <label class="control-label">First Name<font color="#FF0000">*</font></label>
                            <input type="text" class="form-control" name="fname" placeholder="" />
                        </div>
                        <div class="col-md-2">
                            <label class="control-label">Last Name<font color="#FF0000">*</font></label>
                            <input type="text" class="form-control" name="lname" placeholder="" />
                        </div>
                        <div class="col-md-2">
                            <label class="control-label">Email<font color="#FF0000">*</font></label>
                            <input type="text" class="form-control" name="name" placeholder="" />
                        </div>
                        <div class="col-md-2">
                            <label class="control-label">Mobile Number<font color="#FF0000">*</font></label>
                            <input type="number" class="form-control" name="name" placeholder="" />
                        </div>
                        <div class="col-md-2">
                            <label class="control-label">Author Name<font color="#FF0000">*</font></label>
                            <input type="text" class="form-control" name="aname" placeholder="" />
                        </div>

                        <div class="col-md-2" style="margin-top:15px;" align="left">
                            <button id="on" type="button" class="btn mjks" style="color:#FFFFFF; height:30px; width:100%;"> <i
                                            class="fa fa-plus"></i>Add</button>

                        </div>

                    </div> -->
                    <div class="row">

                        <div class="col-md-12" style="margin-top:15px;">
                            <div class="panel panel-default">
                                <h5 class="panel-title"
                                    style="color:#07418F; background-color:#eaeaea; width:100%; font-size:14px;margin-top: 1vh;"
                                    align="center">
                                    <i class="fa fa-book"></i> &nbsp;<b>Menuscripts</b>
                                </h5>
                            </div>
                        </div>

                        <div class="col-md-12" style="margin-top:15px;">

                            <!-- START DEFAULT DATATABLE -->

                            <!-- <h5 class="panel-title" style="color:#FFFFFF; background-color:#754d35; width:100%; font-size:14px;" align="center"> <i class="fa fa-plus"></i> Added Party</h5> -->
                            <div class="panel-body" style="margin-top:5px; margin-bottom:15px;">
                                <table class="table datatable">
                                    <thead>
                                        <tr>
                                            <th>Sr. No.</th>
                                            <th>Menuscript Title</th>
                                            <th>Date of Submission</th>
                                            <th>Reviewer 1</th>
                                            <th>Reviewer 2</th>
                                            <th>Action</th>
                                        </tr> 
                                    </thead>

                                    {{-- @if ($reviews && $reviews->isNotEmpty() && optional($reviews->first()->get_menuscript)->editor_status != 'Accepted')
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $reviews->first()->get_menuscript->menuscript_title ?? '' }}</td>
                                        <td>{{ optional($reviews->first()->get_menuscript)->date_of_submission ? date('d-m-Y', strtotime(optional($reviews->first()->get_menuscript)->date_of_submission)) : '' }}</td>       if show the error then use this --}}   

                                        <tbody>
                                            @foreach($assign_reviewer as $menuscript_id => $reviews)
                                                @php
                                                    $firstReview = $reviews->first();
                                                    $submitPaperData = $firstReview ? $firstReview->submit_paper_data : null;
                                                    $getMenuscript = $firstReview ? $firstReview->get_menuscript : null;
                                                @endphp
                                                
                                                @if ($submitPaperData && ($submitPaperData->resubmitted_editor_status == '0' || ($getMenuscript && $getMenuscript->editor_status == NULL && $getMenuscript->editor_status != 'Accepted')))
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>{{ $getMenuscript ? $getMenuscript->menuscript_title : '' }}</td>
                                                        <td>{{ $getMenuscript ? date('d-m-Y', strtotime($getMenuscript->date_of_submission)) : '' }}</td>
                                                        
                                                        @foreach($reviews as $index => $review)
                                                            @if($index < 2) <!-- Ensure we don't exceed two columns for reviewers -->
                                                                @php
                                                                    $getUserName = $review->get_user_name;
                                                                @endphp
                                                                <td data-toggle="tooltip" data-placement="bottom" title="{{ $getUserName ? $getUserName->first_name : ''}}">
                                                                    {{ $getUserName ? $getUserName->first_name : ''}} {{ $getUserName ? $getUserName->last_name : ''}} &nbsp;&nbsp;&nbsp;&nbsp;
                                                                    <button data-toggle="modal" data-target="#popup"
                                                                        style="background-color:#1389eb; border:none; max-height:25px; margin-top:-5px; margin-bottom:-5px;"
                                                                        type="button" class="btn btn-info get_reviewer_id" id="{{ $review->assign_reviewer_id }}" menuscript_id={{$review->menuscript_id}} data-toggle="tooltip" data-placement="top" title="Status Tracker">
                                                                        {{-- <i class="fa fa-check-circle" style="margin-left:5px;"></i> --}}
                                                                        Status Tracker
                                                                    </button>
                                                                </td>
                                                            @else
                                                                @break
                                                            @endif
                                                        @endforeach
                                        
                                                        @if($reviews->count() < 2)
                                                            <td></td>
                                                        @endif
                                        
                                                        <td>
                                                            <a href="{{route('get_menuscript', $getMenuscript ? $getMenuscript->id : '')}}" target="_blank">
                                                                <button
                                                                    style="background-color:#07418F; border:none; max-height:25px; margin-top:-5px; margin-bottom:-5px;"
                                                                    type="button" class="btn btn-info" data-toggle="tooltip" data-placement="top" title="pdf"> View Menuscript
                                                                    {{-- <i class="fa fa-file-pdf-o" style="margin-left:5px;"></i> --}}
                                                                </button>
                                                            </a>
                                                            
                                                            <button data-toggle="modal" data-target="#popup1"
                                                                style="background-color:#02760b; border:none; max-height:25px; margin-top:-5px; margin-bottom:-5px;"
                                                                type="button" class="btn btn-info get_script_id" id="{{ $review->menuscript_id }}" data-toggle="tooltip" data-placement="top" title="Decision">
                                                                {{-- <i class="fa fa-check" style="margin-left:5px;"></i> --}}
                                                                Decision
                                                            </button>
                                                        </td>
                                                    </tr>
                                                @endif
                                            @endforeach
                                        </tbody>
                                        
                                    
                                </table>
                            </div>

                            <!-- END DEFAULT DATATABLE -->


                        </div>
                        <div class="col-md-2" style="margin-top:15px;"></div>
                    </div>
                </div>
            </div>
        </div>


    </div>


    <div class="modal" id="popup" tabindex="-1" role="dialog" aria-labelledby="largeModalHead"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span
                            aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4 class="modal-title" id="H4">Status Tracker</h4>
                </div>
                <input type="hidden" name="assign_reviewer_id"  id="assign_reviewer_id">
                <input type="hidden" name="menuscript_id"  id="menuscript_id">
                <div class="modal-body" style="height:30%">
                    {{-- <div class="col-md-12">
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Reviewer Status</th>
                                    <th>Remark</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>12/04/2024</td>
                                    <td>Pending</td>
                                    <th>demo</th>
                                </tr>
                                <tr>
                                    <td>22/05/2024</td>
                                    <td>Accept</td>
                                    <th>demo</th>
                                </tr>
                                <tr>
                                    <td>20/04/2023</td>
                                    <td>In Progress</td>
                                    <th>demo</th>
                                </tr>
                                <tr>
                                    <td>09/02/2023</td>
                                    <td>Accept</td>
                                    <th>demo</th>
                                </tr>

                            </tbody>
                        </table>
                    </div> --}}
                    <div class="col-md-12" id="table_append">

                    </div>
                    <div class="modal-footer" style="border: none !important; background-color: #FFF !important;">
                        <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> -->
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Add Remark -->
    {{-- <div class="modal" id="popup3" tabindex="-1" role="dialog" aria-labelledby="largeModalHead"
        aria-hidden="true">
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
                                    <th>Reviewer Status</th>
                                    <th>Remark</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>12/04/2024</td>
                                    <td>Pending</td>
                                    <th>demo</th>
                                </tr>
                                <tr>
                                    <td>22/05/2024</td>
                                    <td>Accept</td>
                                    <th>demo</th>
                                </tr>
                                <tr>
                                    <td>20/04/2023</td>
                                    <td>In Progress</td>
                                    <th>demo</th>
                                </tr>
                                <tr>
                                    <td>09/02/2023</td>
                                    <td>Accept</td>
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
    </div> --}}


    <!-- Add Remark -->
    <div class="modal" id="popup1" tabindex="-1" role="dialog" aria-labelledby="largeModalHead"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span
                            aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4 class="modal-title" id="H4">Add Status</h4>
                </div>
                <form action="{{route('update_editor_status')}}" method="post">
                    @csrf
                <div class="modal-body" style="height:30%">
                 <input type="hidden" name="script_id" id="script_id">  
                    <div class="col-md-12" style="margin-top:15px;">
                        <label class="control-label">Status<font color="#FF0000">*</font></label>
                        <select class="form-control select" name="editor_status">
                            <option>Accepted</option>
                            <option>Major Revised</option>
                            <option>Minor Revised</option>
                            {{-- <option>Published</option> --}}
                            <option>Rejected</option>
                        </select>
                    </div>
                    <div class="col-md-12" style="margin-top:15px;">
                        <label class="control-label">Add Remark<font color="#FF0000">*</font></label>
                        <textarea name="editor_remark" rows="6" class="form-control" name="lname" placeholder=""></textarea>
                    </div>

                    <div class="modal-footer" style="border: none !important; background-color: #FFF !important;">
                        <div class="col-md-12" style="margin-top:20px;" align="center">
                            <button id="on" type="submit" class="btn mjks"
                                style="color:#FFFFFF; height:30px; width:20%;"> Submit</button>
                        </div>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>

@stop
@section('js')

{{-- <script>
    $(document).ready(function() {
        // Add click event listener to all buttons with the class 'get_reviewer_id'
        $('.get_reviewer_id').on('click', function() {
            // Retrieve the assign_reviewer_id from the button's id attribute
            const assignReviewerId = $(this).attr('id');
            console.log(assignReviewerId); // You can replace this with any action you need to perform
            // Example: display the ID in an alert
            $('#assign_reviewer_id').val(assignReviewerId);
            // alert(assignReviewerId);
    
            // You can also send this ID to your backend, update the modal content, etc.
        });
    });
    </script> --}}

<script>
    $(document).ready(function() {
        $(".get_reviewer_id").on('click', function() {
            // console.log('alart');
            $menuscript_id = $(this).attr('menuscript_id');
            // console.log($menuscript_id);
            $('#assign_reviewer_id').val($(this).attr('id'));
            $('#menuscript_id').val($menuscript_id);
            $.ajax({
                type: "get",
                url: '{{ route('get_reviewer_status_tracker') }}',
                dataType: "json",
                data: {
                    assign_reviewer_id: $(this).attr('id'),
                    menuscript_id:$menuscript_id
                },
                success: function(data) {
                    $("#table_append").html(data);

                },
            });
        })

        $('.get_script_id').on('click', function() {
            // Retrieve the assign_reviewer_id from the button's id attribute
            const Id = $(this).attr('id');
            console.log(Id); // You can replace this with any action you need to perform
            // Example: display the ID in an alert
            $('#script_id').val(Id);
            // alert(assignReviewerId);
        });
    })
</script>

@stop