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
                                            <i class="fa fa-book"></i> &nbsp;<b>Menuscript</b>
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
                                                    <th>Author Name</th>
                                                    {{-- <th>Affilation</th> --}}
                                                    <th>Author Email Id</th>
                                                    <th>Assign Editor</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($all_menuscript as $all_menuscripts)
                                                <tr>
                                                    <td>{{$loop->iteration}}</td>
                                                    <td>{{$all_menuscripts->category->category_name}}</td>
                                                    <td>{{$all_menuscripts->menuscript_title}}</td>
                                                    <td>{{$all_menuscripts->user_name->first_name ?? ''}}</td>
                                                    {{-- <td>{{$all_menuscripts}}</td> --}}
                                                    <td>{{$all_menuscripts->user_name->email ?? ''}}</td>
                                                    <td>
                                                      
                                                        <select class="form-control select" id="editor_select_{{$all_menuscripts->id}}">
                                                            <option selected disabled>Select</option>
                                                            @foreach ($editor_list as $editor_lists)
                                                                <option value="{{$editor_lists->id}}" @if ($all_menuscripts->assign_editor == $editor_lists->id) selected @endif>
                                                                    {{$editor_lists->first_name}} {{$editor_lists->last_name}} - {{$editor_lists->affiliation}}
                                                                </option>
                                                            @endforeach
                                                          
                                                        </select>
                                                    </td>
                                                    </td>
                                                    <td>
                                                       <a href="{{route('get_menuscript',$all_menuscripts->id)}}" target="_blank"> <button style="background-color:#3399ff; border:none; max-height:25px; margin-top:-5px; margin-bottom:-5px;" type="button" class="btn btn-info" data-toggle="tooltip" data-placement="top" title="View">
                                                        View Menuscript
                                                        {{-- <i class="fa fa-eye" style="margin-left:5px;"></i> --}}
                                                    </button> </a>
                                                        {{-- <a href="{{ route('assign_editor', ['id' => $all_menuscripts->id, 'assign_editor_id' => $editor_lists->id]) }}"> --}}
                                                            <button style="background-color:#028c24; border:none; max-height:25px; margin-top:-5px; margin-bottom:-5px;" type="button" class="btn btn-info assign_editor" data-menu-id="{{$all_menuscripts->id}}" data-placement="top" data-toggle="tooltip" title="Assign to Editor">Assign</button>

                                                            <button data-toggle="modal" data-target="#popup1"
                                                            style="background-color:rgb(105, 11, 194); border:none; max-height:25px; margin-top:-5px; margin-bottom:-5px;" menuscript_id="{{$all_menuscripts->id}}"  script_name="{{$all_menuscripts->menuscript_title}}"
                                                            type="button" class="btn btn-info get_reviewer_id" data-toggle="tooltip"
                                                            data-placement="top" title="Status Tracker" >
                                                            {{-- <i
                                                                class="fa fa-check-circle"
                                                                style="margin-left:5px;"></i> --}}
                                                                Status Tracker
                                                            </button>

                                                        {{-- </a> --}}
                                                        <!-- <button data-toggle="modal" data-target="#popup1" style="background-color:#028c24; border:none; max-height:25px; margin-top:-5px; margin-bottom:-5px;" type="button" class="btn btn-info" data-placement="top" title="Assign"><i class="fa fa-laptop" style="margin-left:5px;"></i></button> -->
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

            <div class="modal" id="popup1" tabindex="-1" role="dialog" aria-labelledby="largeModalHead" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span
                                    class="sr-only">Close</span></button>
                            <h4 class="modal-title" id="H4"></h4>
                        </div>
                        {{-- <input type="text" name="assign_reviewer_id"  id="assign_reviewer_id"> --}}
                        <input type="hidden" name="menuscript_id"  id="menuscript_id">
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
        $(document).ready(function(){
            console.log(1);
            $(document).on('click', '.assign_editor', function(){
            // $('.assign_editor').click(function(){ // ye function sirf 10 record tk hi work krta hai kyu ki dom me records nhi rehte
                // Get the selected editor id
                var editorId = $('#editor_select_' + $(this).data('menu-id')).val();
    // console.log(editorId);
    // console.log(2);
                // Get the manuscript id
                var manuscriptId = $(this).data('menu-id');
    
                // Perform AJAX request to assign editor
                $.ajax({
                    type: 'get',
                    url: '{{ route('assign_editor') }}',
                    data: {
                        id: manuscriptId,
                        assign_editor_id: editorId,
                        // _token: '{{ csrf_token() }}' // Uncomment if CSRF token is needed
                    },
                    success: function(data){
                        
                        // Show SweetAlert notification
                        const Toast = Swal.mixin({
                            toast: true,
                            position: 'top',
                            showConfirmButton: false,
                            timer: 6000,
                            timerProgressBar: true,
                            didOpen: (toast) => {
                                toast.onmouseenter = Swal.stopTimer;
                                toast.onmouseleave = Swal.resumeTimer;
                            }
                        });
    
                        Toast.fire({
                            icon: 'success',
                            title: 'Editor assign successfully.'
                        });
    
                        // Reload the page after showing the notification
                        // setTimeout(function() {
                        //     location.reload();
                        // }, 4000); // Delay the reload to allow the notification to be seen
                    },
                    error: function(xhr, status, error){
                        console.error(xhr.responseText);
                    }
                });
            });

            $(document).on('click', '.get_reviewer_id', function(){
            // $(".get_reviewer_id").on('click', function() {
            // console.log('alart');
            $menuscript_id = $(this).attr('menuscript_id');
            console.log($menuscript_id);
           $script_name  = $(this).attr('script_name'); 

            // $('#assign_reviewer_id').val($(this).attr('assign_reviewer_id'));
             console.log($script_name);
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
                    $('#H4').text('Status Tracker : ' + $script_name ); 
                },
            });
        })



        });
    </script>
    


     @stop