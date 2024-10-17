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
                                            <i class="fa fa-book"></i> &nbsp;<b>Withdrawal Menuscript</b>
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
                                                    <th>Author Name</th>
                                                    <th>Affilation</th>
                                                    <th>Email Id</th>
                                                    <!-- <th>Assign Editor</th> -->
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($withdrawal_list as $withdrawal_lists)
                                                <tr>
                                                    <td>{{$loop->iteration}}</td>
                                                    <td>{{$withdrawal_lists->category->category_name}}</td>
                                                    <td>{{$withdrawal_lists->menuscript_title}}</td>
                                                    <td>{{$withdrawal_lists->user_name->first_name ?? ''}}</td>
                                                    <td>{{$withdrawal_lists->affiliation}}</td>
                                                    <td>{{$withdrawal_lists->user_name->email ?? ''}}</td>
                                                    <!-- <td>
                                                        <select class="form-control select">
                                                                    <option>Pratik Mohod</option>
                                                                    <option>Mayuri Vadatkar</option>
                                                                    <option>Shubham Wankhade</option>
                                                                    <option>Chetan Saraf</option>
                                                                    <option>Yash Patil</option>
                                                        </select>
                                                    </td> -->
                                                    <td>
                                                        <a href="{{route('get_menuscript',$withdrawal_lists->id)}}" target="_blank">
                                                        <button style="background-color:#3399ff; border:none; max-height:25px; margin-top:-5px; margin-bottom:-5px;" type="button" class="btn btn-info" data-toggle="tooltip" data-placement="top" title="View">View Menuscript</button>
                                                        </a>
                                                        <!-- <button style="background-color:#ff0000; border:none; max-height:25px; margin-top:-5px; margin-bottom:-5px;" type="button" class="btn btn-info" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash-o" style="margin-left:5px;"></i></button> -->
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