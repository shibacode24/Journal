@extends('author.layout')
@section('content')
@include('alert')
    <div class="page-content-wrap">
        <div class="row">
            <div class="col-md-12">

                <div class="panel-body" style="padding:1px 5px 2px 5px;">

                    <div class="row">

                        <div class="col-md-12" style="margin-top:15px;">
                            <div class="panel panel-default">
                                <h5 class="panel-title"
                                    style="color:#07418F; background-color:#eaeaea; width:100%; font-size:14px;margin-top: 1vh;"
                                    align="center">
                                    <i class="fa fa-book"></i> &nbsp;<b>Added Menuscripts</b>
                                </h5>
                            </div>
                        </div>

                        <div class="col-md-12" style="margin-top:15px;">

                            <div class="panel-body" style="margin-top:5px; margin-bottom:15px;">
                                <table class="table datatable">
                                    <thead>
                                        <tr>
                                            <th>Category</th>
                                            <th>Menuscript Title</th>
                                            {{-- <th>Author Name</th>
                                            <th>Affiliation</th> --}}
                                            <th>Date of Submission</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($rejected_menuscript as $rejected_menuscripts)
                                            <tr>
                                                <td>{{$rejected_menuscripts->category->category_name}}</td>
                                                <td>{{$rejected_menuscripts->menuscript_title}}</td>
                                                {{-- <td>Sachin Patil</td>
                                                <td>Demo</td> --}}
                                                <td>{{date('d-m-Y',strtotime($rejected_menuscripts->date_of_submission))}}</td>
                                                <td>{{$rejected_menuscripts->editor_status}}</td>
                                                <td>
                                                    <a href="{{route('edit_menuscript',$rejected_menuscripts->id)}}" target="_blank"> <button style="background-color:#3399ff; border:none; max-height:25px; margin-top:-5px; margin-bottom:-5px;" type="button" class="btn btn-info" data-toggle="tooltip" data-placement="top" title="View"><i class="fa fa-eye" style="margin-left:5px;"></i></button> </a>
                                                    <!-- <a href="upload_menuscript.html"><button style="background-color:#3399ff; border:none; max-height:25px; margin-top:-5px; margin-bottom:-5px;" type="button" class="btn btn-info" data-toggle="tooltip" data-placement="top" title="Upload Menuscript"><i class="fa fa-upload" style="margin-left:5px;"></i></button></a> -->
                                                    <button data-toggle="modal" data-target="#popup1"
                                                        style="background-color:#028c24; border:none; max-height:25px; margin-top:-5px; margin-bottom:-5px;" menuscript_id={{$rejected_menuscripts->id}}
                                                        type="button" class="btn btn-info get_reviewer_id" data-toggle="tooltip"
                                                        data-placement="top" title="Status Tracker" ><i
                                                            class="fa fa-check-circle"
                                                            style="margin-left:5px;"></i></button>
                                                            @if ($rejected_menuscripts->assign_status == '0')
                                                            <button onclick="openCustomModal('{{ route('withdraw_script', $rejected_menuscripts->id) }}')"
                                                                id="customModal"
                                                                style="background-color:#ff0000; border:none; max-height:25px; margin-top:-5px; margin-bottom:-5px;"
                                                                type="button" class="btn btn-info" data-toggle="tooltip"
                                                                data-placement="top" title="Delete"><i class="fa fa-trash-o"
                                                                    style="margin-left:5px;"></i></button>   
                                                            @endif
                                                    
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>


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
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span
                            class="sr-only">Close</span></button>
                    <h4 class="modal-title" id="H4">Status Tracker</h4>
                </div>
                {{-- <input type="text" name="assign_reviewer_id"  id="assign_reviewer_id"> --}}
                <input type="text" name="menuscript_id"  id="menuscript_id">
                <div class="modal-body" style="height:30%" >
                    <div class="col-md-12" id="table_append">
                    
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
        $(".get_reviewer_id").on('click', function() {
            // console.log('alart');
            $menuscript_id = $(this).attr('menuscript_id');
            console.log($menuscript_id);
            // $('#assign_reviewer_id').val($(this).attr('assign_reviewer_id'));
            //  console.log($assign_reviewer_id);
            $('#menuscript_id').val($menuscript_id);
            $.ajax({
                type: "get",
                url: '{{ route('get_status_tracker_for_author') }}',
                dataType: "json",
                data: {
                    // assign_reviewer_id: $(this).attr('id'),
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