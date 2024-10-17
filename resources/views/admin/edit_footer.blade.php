@extends('admin.layout')
@section('content')
@include('alert')
            <div class="page-content-wrap">
                <div class="row">
                    <div class="col-md-12">

                        <div class="panel-body" style="padding:1px 5px 2px 5px;">
                            @include('alert')

                            <div class="col-md-12" style="margin-top:5px;">
                                <div class="panel panel-default">
                                    <h5 class="panel-title" style="color:#07418F; background-color:#eaeaea; width:100%; font-size:14px;margin-top: 1vh;" align="center">
                                        <i class="fa fa-plus"></i> &nbsp;<b>Update Footer</b>
                                    </h5>
                                </div>
                            </div>
                            <form action="{{route('update_footer')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="id" value="{{$footeredit->id}}">
                            <div class="col-md-12" style="margin-top:10px;">
                                <div class="col-md-4"></div>

                                <div class="col-md-3" style="margin-top: 5px;">
                                    <label class="control-label">Upload Image (1080x100)<font color="#FF0000">*</font></label>
                                    <input type="file" class="form-control" name="file" placeholder="" />
                                    <img src="{{asset('public/panel/images/footer_img/'.$footeredit->footer)}}" style="height: 50px;width:50px;"> 
                                </div>

                                <div class="col-md-2" style="margin-top:22px;" align="left">
                                    <button id="on" type="submit" class="btn mjks" style="color:#FFFFFF; width:50%;"> <i
                                                    class="fa fa-plus"></i>Update</button>
                                </div>

                                <div class="col-md-3"></div>

                            </div>
                            </form>
                         
                        </div>
                    </div>
                </div>


            </div>

      @stop
      