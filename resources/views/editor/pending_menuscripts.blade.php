@extends('editor.layout')
@section('content')
@include('sweetalert')
@include('alert')
            <div class="page-content-wrap">
                <div class="row">
                    <div class="col-md-12">

                        <div class="panel-body" style="padding:1px 5px 2px 5px;">

                            <div class="row">

                                <div class="col-md-12" style="margin-top:15px;">
                                    <div class="panel panel-default">
                                        <h5 class="panel-title" style="color:#07418F; background-color:#eaeaea; width:100%; font-size:14px;margin-top: 1vh;" align="center">
                                            <i class="fa fa-book"></i> &nbsp;<b>Pending Menuscripts</b>
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
                                                    <th>Category</th>
                                                    <th>Menuscript Title</th>
                                                    <th>Date Of Submission</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($menuscript as $menuscripts)
                                                <tr>
                                                    <td>{{$loop->iteration}}</td>
                                                    <td>{{$menuscripts->category->category_name ?? ''}}</td>
                                                    <td>{{$menuscripts->menuscript_title}}</td>
                                                    <td>{{ date('d-m-Y',strtotime($menuscripts->date_of_submission))}}</td>
                                                    <td>
                                                        <button style="background-color:#07418F; border:none; max-height:25px; margin-top:-5px; margin-bottom:-5px;" type="button" class="btn btn-info" data-toggle="tooltip" data-placement="top" title="View Menuscript">
                                                            View Menuscript
                                                            {{-- <i class="fa fa-file-pdf-o" style="margin-left:5px;"></i> --}}
                                                        </button>
                                                        <button data-toggle="modal" data-target="#popup1" style="background-color:#028c24; border:none; max-height:25px; margin-top:-5px; margin-bottom:-5px;" type="button" class="btn btn-info get_menuscript_id" data-toggle="tooltip" data-placement="top" menuscript_id="{{$menuscripts->id}}" title="Publish Online">Publish Online
                                                             {{-- <i class="fa fa-laptop" style="margin-left:5px;"></i> --}}
                                                        </button> 
                                                    </td>
                                                </tr>
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

            <div class="modal" id="popup1" tabindex="-1" role="dialog" aria-labelledby="largeModalHead" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal"><span
                        aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                            <h4 class="modal-title" id="H4">Add Status</h4>
                        </div>
                        <form action="{{route('publish')}}" method="post">
                            @csrf
                        <div class="modal-body" style="height:30%">
                              <input type="hidden" name="id" id="menuscript_id">
                            <div class="col-md-12" style="margin-top:15px;">
                                <h4 style="color: #000;"><b>Are you sure you want to publish Online?</b></h4>
                            </div>
        
                            <div class="modal-footer" style="border: none !important; background-color: #FFF !important;">
                                <div class="col-md-12" style="margin-top:20px;" align="left">
                                    <button id="on" type="submit" class="btn mjks" style="color:#FFFFFF; height:30px; width:20%;"> Publish Online</button>
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
        $(document).ready(function() {
            $(".get_menuscript_id").on('click', function() {
                // console.log('alart');
                $menuscript_id = $(this).attr('menuscript_id');
               
                $('#menuscript_id').val($menuscript_id);
            //     $.ajax({
            //         type: "get",
            //         url: '{{ route('get_reviewer_status_tracker') }}',
            //         dataType: "json",
            //         data: {
            //             menuscript_id:$menuscript_id
            //         },
            //         success: function(data) {
            //             $("#table_append").html(data);
    
            //         },
            //     });
            })
        });
      </script>

      @stop