@extends('editor.layout')
@section('content')
@include('sweetalert')


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
                                        <h5 class="panel-title" style="color:#07418F; background-color:#eaeaea; width:100%; font-size:14px;margin-top: 1vh;" align="center">
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
                                                    {{-- <th>Reviewer </th> --}}
                                                    {{-- <th>Reviewer 2</th> --}}
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                
                                                @foreach ($menuscript as $menuscripts)
                                                @if ($menuscripts->assign_status == '0')
                                                <tr>
                                                    <td>{{$loop->iteration}}</td>
                                                    <td>{{$menuscripts->menuscript_title}}</td>
                                                    <td>{{date('d-m-Y',strtotime($menuscripts->date_of_submission))}}</td>
                                                    {{-- <td> --}}
                                                        {{-- <select class="form-control select" id="reviewer_select_{{$menuscripts->id}}" >
                                                            <option value="" disabled>Select</option>
                                                            @foreach ($reviewer_list as $reviewer_lists)
                                                                <option value="{{$reviewer_lists->id}}" @if ($menuscripts->assign_reviewer == $reviewer_lists->id) selected @endif>
                                                                    {{$reviewer_lists->first_name}} {{$reviewer_lists->last_name}} - {{$reviewer_lists->affiliation}}
                                                                </option>
                                                            @endforeach
                                                          
                                                        </select> --}}
                                                    {{-- data-toggle="tooltip" data-placement="bottom" title="Shubham Patil/Affiliation/Email">Shubham Patil &nbsp;&nbsp;&nbsp;&nbsp;
                                                        <button data-toggle="modal" data-target="#popup" style="background-color:#1389eb; border:none; max-height:25px; margin-top:-5px; margin-bottom:-5px;" type="button" class="btn btn-info" data-toggle="tooltip" data-placement="top" title="Status Tracker"><i class="fa fa-check-circle" style="margin-left:5px;"></i></button> --}}

                                                    {{-- </td> --}}
                                                    {{-- <td data-toggle="tooltip" data-placement="bottom" title="Chandan Saraf/Affiliation/Email">Chandan Saraf &nbsp;&nbsp;&nbsp;&nbsp;
                                                        <button data-toggle="modal" data-target="#popup3" style="background-color:#1389eb; border:none; max-height:25px; margin-top:-5px; margin-bottom:-5px;" type="button" class="btn btn-info" data-toggle="tooltip" data-placement="top" title="Status Tracker"><i class="fa fa-check-circle" style="margin-left:5px;"></i></button>
                                                    </td> --}}
                                                    <td>
                                                        <a href="{{route('get_menuscript',$menuscripts->id)}}" target="_blank">
                                                        <button style="background-color:#07418F; border:none; max-height:25px; margin-top:-5px; margin-bottom:-5px;" type="button" class="btn btn-info" data-toggle="tooltip" data-placement="top" title="pdf">
                                                            {{-- <i class="fa fa-file-pdf-o" style="margin-left:5px;"></i> --}}
                                                            View Menuscript
                                                        </button></a>
                                                        {{-- <button data-toggle="modal" data-target="#popup1" style="background-color:#02760b; border:none; max-height:25px; margin-top:-5px; margin-bottom:-5px;" type="button" class="btn btn-info" data-toggle="tooltip" data-placement="top" title="Accept"><i class="fa fa-check" style="margin-left:5px;"></i></button> --}}
                                                        {{-- <button style="background-color:#028c24; border:none; max-height:25px; margin-top:-5px; margin-bottom:-5px;" type="button" class="btn btn-info assign_reviewer" data-menu-id="{{$menuscripts->id}}" data-placement="top" data-toggle="tooltip" title="Assign to Editor">Assign</button> --}}
                                                        <button data-toggle="modal" data-target="#popup_assign"
                                                        style="background-color:#1b793a; border:none; max-height:25px; margin-top:-5px; margin-bottom:-5px;" 
                                                        type="button" class="btn btn-info" data-toggle="tooltip"
                                                        data-placement="top" title="Assign" menu_id="{{$menuscripts->id}}" onclick="setMenuId(this)">Assign</button>
                                                        <!-- <button data-toggle="modal" data-target="#popup2" style="background-color:#ff0000; border:none; max-height:25px; margin-top:-5px; margin-bottom:-5px;" type="button" class="btn btn-info" data-toggle="tooltip" data-placement="top" title="Reject"><i class="fa fa-times" style="margin-left:5px;"></i></button> -->
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

        </div>


        <!-- START DEFAULT DATATABLE -->


    </div>



    </div>

    <!-- PAGE CONTENT WRAPPER -->


    </div>
    <!-- END PAGE CONTENT -->
    </div>
    <!-- END PAGE CONTAINER -->

    <!-- Add Remark -->
    <div class="modal" id="popup" tabindex="-1" role="dialog" aria-labelledby="largeModalHead" aria-hidden="true">
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
    </div>

    <!-- Add Remark -->
    <div class="modal" id="popup3" tabindex="-1" role="dialog" aria-labelledby="largeModalHead" aria-hidden="true">
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
    </div>


    <!-- Add Remark -->
    <div class="modal" id="popup1" tabindex="-1" role="dialog" aria-labelledby="largeModalHead" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span
                    aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4 class="modal-title" id="H4">Add Status</h4>
                </div>
                <div class="modal-body" style="height:30%">

                    <div class="col-md-12" style="margin-top:15px;">
                        <label class="control-label">Status<font color="#FF0000">*</font></label>
                        <select class="form-control select">
                                <option>Accepted</option>
                                <option>Major Revised</option>
                                <option>Minor Revised</option>
                                <option>Published</option>
                                <option>Rejected</option>
                    </select>
                    </div>
                    <div class="col-md-12" style="margin-top:15px;">
                        <label class="control-label">Add Remark<font color="#FF0000">*</font></label>
                        <textarea name="textarea" rows="6" class="form-control" name="lname" placeholder=""></textarea>
                    </div>

                    <div class="modal-footer" style="border: none !important; background-color: #FFF !important;">
                        <div class="col-md-12" style="margin-top:20px;" align="center">
                            <button id="on" type="button" class="btn mjks" style="color:#FFFFFF; height:30px; width:20%;"> Submit</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Add Remark -->
    <div class="modal" id="popup_assign" tabindex="-1" role="dialog" aria-labelledby="largeModalHead"
    aria-hidden="true" >
    <div class="modal-dialog modal-lg" >
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span
                        aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="H4">Assign Reviewer</h4>
            </div>
            <form action="{{route('assign_reviewer')}}" method="post">
                @csrf
            <div class="modal-body">
                <input type="hidden" name="menuscript_id" id="menu_id">
                <div class="col-md-12" style="margin-top:15px;">
                    <label class="control-label">Assign Reviewer<font color="#FF0000">*</font></label>
                    <select class="form-control select" multiple name="assign_reviewer_id[]">
                        @foreach ($reviewer_list as $reviewer_lists)
                            <option value="{{ $reviewer_lists->id }}">
                                {{ $reviewer_lists->first_name }} {{ $reviewer_lists->last_name }} -
                                {{ $reviewer_lists->affiliation }}
                            </option>
                        @endforeach

                        {{-- <option>Major Revised</option>
                        <option>Minor Revised</option>
                        <option>Published</option>
                        <option>Rejected</option> --}}
                    </select>
                </div>
                {{-- <div class="col-md-12" style="margin-top:15px;">
                <label class="control-label">Add Remark<font color="#FF0000">*</font></label>
                <textarea name="textarea" rows="6" class="form-control" name="lname" placeholder=""></textarea>
            </div> --}}

                <div class="modal-footer" style="border: none !important; background-color: #FFF !important;">
                    <div class="col-md-12" style="margin-top:30px;" align="center">
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

  <script>
     $(document).ready(function(){
         $('.assign_reviewer').click(function(){
             // Get the selected editor id
             var reviewerId = $('#reviewer_select_' + $(this).data('menu-id')).val();
 
             // Get the manuscript id
             var manuscriptId = $(this).data('menu-id');
 console.log(reviewerId);

             // Perform AJAX request to assign reviewer
             $.ajax({
                 type: 'get',
                 url: '{{ route('assign_reviewer') }}',
                 data: {
                     id: manuscriptId,
                     assign_reviewer_id: reviewerId,
                     // _token: '{{ csrf_token() }}'
                 },
                 success: function(data){
                     // Reload the page after successful assignment
                     location.reload();
                 },
                 error: function(xhr, status, error){
                     console.error(xhr.responseText);
                 }
             });
         });
     });
 </script>

<script>
    function setMenuId(button) {
        var menuId = button.getAttribute('menu_id');
        document.getElementById('menu_id').value = menuId;
    }
    </script>
    
  @stop