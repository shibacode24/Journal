@extends('admin.layout')
@section('content')
            <div class="page-content-wrap">
                <div class="row">
                    <div class="col-md-12">

                        <div class="panel-body" style="padding:1px 5px 2px 5px;">

@include('alert')
                            <div class="col-md-12" style="margin-top:5px;">
                                <div class="panel panel-default">
                                    <h5 class="panel-title" style="color:#07418F; background-color:#eaeaea; width:100%; font-size:14px;margin-top: 1vh;" align="center">
                                        <i class="fa fa-plus"></i> &nbsp;<b>Add Footer</b>
                                    </h5>
                                </div>
                            </div>
                            @if(count($errors)>0)
                            <ul class="alert alert-danger">
                                @foreach($errors->all() as $error)
                                <li>{{ $error }} </li>
                                @endforeach
                            </ul>
                            @endif
                            <form action="{{route('update_footer')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="id" value="{{$footeredit->id}}">
                            <div class="col-md-12" style="margin-top:10px;">
                                <div class="col-md-4"></div>

                                <div class="col-md-3" style="margin-top: 5px;">
                                    <label class="control-label">Upload Image (1080x100)<font color="#FF0000">*</font></label>
                                    <input type="file" class="form-control" name="file" placeholder="" /><br><br>
                                    <img src="{{asset('public/panel/images/footer_img/'.$footeredit->footer)}}" style="height: auto;width:100%;"> 
                                </div>

                                <div class="col-md-2" style="margin-top:22px;" align="left">
                                    <button id="on" type="submit" class="btn mjks" style="color:#FFFFFF; width:50%;"> <i
                                                    class="fa fa-plus"></i>Update</button>
                                </div>

                                <div class="col-md-3"></div>

                            </div>
                            </form>
                            {{-- <div class="row">

                                <div class="col-md-12" style="margin-top:15px;">
                                    <div class="panel panel-default">
                                        <h5 class="panel-title" style="color:#07418F; background-color:#eaeaea; width:100%; font-size:14px;margin-top: 1vh;" align="center">
                                            <i class="fa fa-plus"></i> &nbsp;<b>Added Footer</b>

                                        </h5>



                                    </div>
                                </div> --}}


                                {{-- <div class="col-md-2"></div>
                                <div class="col-md-8" style="margin-top:15px;"> --}}
                                    <!-- START DEFAULT DATATABLE -->

                                    <!-- <h5 class="panel-title" style="color:#FFFFFF; background-color:#754d35; width:100%; font-size:14px;" align="center"> <i class="fa fa-plus"></i> Added Party</h5> -->
                                    {{-- <div class="panel-body" style="margin-top:5px; margin-bottom:15px;">
                                        <table class="table datatable">
                                            <thead>
                                                <tr>
                                                    <th>Sr. No.</th>
                                                    <th>Footer Image</th>
                                                  
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($footer as $footers)
                                                <tr>
                                                    <td>{{$loop->iteration}}</td>
                                                    <td><a href="{{asset('public/panel/images/footer_img/'.$footers->footer)}}" target="_blank">
                                                        <img src="{{asset('public/panel/images/footer_img/'.$footers->footer)}}" style="height: 50px;width:50px;"> 
                                                        </a>
                                                    </td>
                                                    <td>

                                                       <a href="{{route('edit_footer',$footers->id)}}"> 
                                                         <button style="background-color:#3399ff; border:none; max-height:25px; margin-top:-5px; margin-bottom:-5px;" type="button" class="btn btn-info" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit" style="margin-left:5px;"></i></button> 
                                                       </a> --}}
                                                        {{-- <button style="background-color:#ff0000; border:none; max-height:25px; margin-top:-5px; margin-bottom:-5px;" type="button" class="btn btn-info" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash-o" style="margin-left:5px;"></i></button> --}}
                                                    {{-- </td>
                                                </tr> 
                                                @endforeach

                                            </tbody>
                                        </table>
                                    </div> --}}

                                    <!-- END DEFAULT DATATABLE -->


                                </div>
                                <div class="col-md-2"></div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>

      @stop
      