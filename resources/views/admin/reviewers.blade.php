@extends('admin.layout')
@section('content')

            <div class="page-content-wrap">
                <div class="row">
                    <div class="col-md-12">

                        <div class="panel-body" style="padding:1px 5px 2px 5px;">

                            <div class="row">
                                <div class="col-md-12" style="margin-top:15px;">
                                    <div class="panel panel-default">
                                        <h5 class="panel-title" style="color:#07418F; background-color:#eaeaea; width:100%; font-size:14px;margin-top: 1vh;" align="center">
                                            <i class="fa fa-users"></i> &nbsp;<b>Reviewers</b>
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
                                                    <th>Reviewer Name</th>
                                                    <th>Email</th>
                                                    <th>Affiliation(Clg name)</th>
                                                    <th>Reviewed Count</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($reviewers as $reviewerss)
                                                <tr>
                                                    <td>{{$loop->iteration}}</td>
                                                    <td>{{$reviewerss->first_name}} {{$reviewerss->last_name}}</td>
                                                    <td>{{$reviewerss->email}}</td>
                                                    <td>{{$reviewerss->affiliation}}</td>
                                                    @php
                                                        $count = App\Models\editor\Assign_Reviewer::where('assign_reviewer_id',$reviewerss->id)->count();
                                                    @endphp
                                                    <td>{{$count}}</td>
                                                    <td>
                                                        <!-- <button style="background-color:#3399ff; border:none; max-height:25px; margin-top:-5px; margin-bottom:-5px;" type="button" class="btn btn-info" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit" style="margin-left:5px;"></i></button> -->
                                                        <!-- <button style="background-color:#ff0000; border:none; max-height:25px; margin-top:-5px; margin-bottom:-5px;" type="button" class="btn btn-info" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash-o" style="margin-left:5px;"></i></button> -->
                                                        {{-- <label class="switch switch-small">
                                                            <input type="checkbox" checked value="0"/>
                                                            <span></span> --}}
                                                            {{-- <a href="{{url('/reviewer_status',$reviewerss->id)}}" class="switch"> --}}
                                                                <label class="switch switch-small label_change" id="{{$reviewerss->id}}" @if($reviewerss->status == '0') checked value="1" @else value="0" @endif>
                                                                    <input type="checkbox"  @if($reviewerss->status == '0') checked @endif>
                                                                    <span class="slider round"></span>
                                                        </label>
                                                                {{-- </a> --}}
                                                        {{-- </label> --}}
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

        @stop

        @section('js')
        <script>
            $(document).ready(function(){
                // console.log(1);
                $(document).on("click",".label_change",function(){
                    $.ajax({
                        url: "{{route('reviewer_status')}}", 
                        data:{
                            status:$(this).attr('value'),
                            id:$(this).attr('id')
                        },
                        success: function(result){
                        setTimeout(function(){
                            location.reload();
                        },200);
          }});
        
                })
            })
        </script>
        @stop