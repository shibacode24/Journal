@extends('reviewer.layout')
@section('content')
@include('alert')
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
                                            <i class="fa fa-users"></i> &nbsp;<b> Assign Menuscripts</b>
                                        </h5>
                                        @include('sweetalert')
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
                                                    <th>Category</th>
                                                    <th>Menuscript Title</th>
                                                    <th>Date of Submission</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                    
                                               
                                                @foreach ($menuscript as $menuscripts)
                                                @if ($menuscripts->reviewer_status != 'Accepted' )
                                               
                                                <tr>
                                                    <td>{{$loop->iteration}}</td>
                                                    <td>{{$menuscripts->get_menuscript->category->category_name ?? ''}}</td>
                                                    <td>{{$menuscripts->get_menuscript->menuscript_title}}</td>
                                                    <td>{{date('d-m-Y',strtotime($menuscripts->get_menuscript->date_of_submission))}}</td>
                                                      <td>
                                                        <a href="{{route('get_pdf',$menuscripts->get_menuscript->id ?? '')}}" target="_blank">
                                                        <button style="background-color:#07418F; border:none; max-height:25px; margin-top:-5px; margin-bottom:-5px;" type="button" class="btn btn-info" data-toggle="tooltip" data-placement="top" title="pdf">View Menuscript
                                                            {{-- <i class="fa fa-file-pdf-o" style="margin-left:5px;"></i> --}}
                                                        </button>
                                                        </a>
                                                        <a href="{{route('add_remark',$menuscripts->id)}}"><button style="background-color:#028c24; border:none; max-height:25px; margin-top:-5px; margin-bottom:-5px;" type="button" class="btn btn-info" data-toggle="tooltip" data-placement="top" title="Review">
                                                            Reviwer Status
                                                            {{-- <i class="fa fa-check-square-o" style="margin-left:5px;"></i> --}}
                                                        </button></a>
                                                        {{-- <button data-toggle="modal" data-target="#popup1" style="background-color:#1389eb; border:none; max-height:25px; margin-top:-5px; margin-bottom:-5px;" type="button" class="btn btn-info" data-toggle="tooltip" data-placement="top" title="Status Tracker"><i class="fa fa-check-circle" style="margin-left:5px;"></i></button> --}}
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



  @stop