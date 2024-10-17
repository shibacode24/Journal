<!DOCTYPE html>
<html lang="en">

<head>
    <!-- META SECTION -->
    <title>Pratibha International Interdisciplinary Journal </title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <link rel="icon" href="{{asset('public/panel/logo/favicon.png')}}" type="image/x-icon" />
    <!-- END META SECTION -->
    <!-- CSS INCLUDE -->
    <link rel="stylesheet" type="text/css" id="theme" href="{{asset('public/panel/css/theme-default.css')}}" />
    <link rel="stylesheet" type="text/css" id="theme" href="{{asset('public/panel/css/notification.css')}}" />
    <!-- EOF CSS INCLUDE -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/summernote@0.8.20/dist/summernote.min.css">
    {{-- <link href="https://cdn.jsdelivr.net/npm/smartwizard@6.0.6/dist/css/smart_wizard.min.css" rel="stylesheet"> --}}
</head>

<body>

    <style>
        .task {
            position: relative;
            color: #2e2e2f;
            cursor: move;
            background-color: #fff;
            padding: 1rem;
            border-radius: 8px;
            box-shadow: rgba(99, 99, 99, 0.1) 0px 2px 8px 0px;
            margin-bottom: 1rem;
            border: 3px dashed transparent;
            max-width: 208px;
        }
        
        .task:hover {
            box-shadow: rgba(99, 99, 99, 0.3) 0px 2px 8px 0px;
            border-color: rgba(162, 179, 207, 0.2) !important;
        }
        
        .task p {
            font-size: 15px;
            margin: 1.2rem 0;
        }
        
        .tag {
            border-radius: 100px;
            padding: 4px 13px;
            font-size: 12px;
            color: #ffffff;
            background-color: #1389eb;
        }
        
        .tags {
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        
        .options {
            background: transparent;
            border: 0;
            color: #c4cad3;
            font-size: 17px;
        }
        
        .options svg {
            fill: #9fa4aa;
            width: 20px;
        }
        
        .stats {
            position: relative;
            width: 100%;
            color: #9fa4aa;
            font-size: 12px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        
        .stats div {
            margin-right: 1rem;
            height: 20px;
            display: flex;
            align-items: center;
            cursor: pointer;
        }
        
        .stats svg {
            margin-right: 5px;
            height: 100%;
            stroke: #9fa4aa;
        }
        
        .viewer span {
            height: 30px;
            width: 30px;
            background-color: rgb(28, 117, 219);
            margin-right: -10px;
            border-radius: 50%;
            border: 1px solid #fff;
            display: grid;
            align-items: center;
            text-align: center;
            font-weight: bold;
            color: #fff;
            padding: 2px;
        }
        
        .viewer span svg {
            stroke: #fff;
        }
    </style>
    <!-- START PAGE CONTAINER -->
    <div class="page-container page-navigation-top">
        <!-- PAGE CONTENT -->
        <div class="page-content">

            <!-- START X-NAVIGATION VERTICAL -->
            <ul class="x-navigation x-navigation-horizontal">
                <li class="xn-logo" style="margin-right:30px;">
                    <a> <img src="{{asset('public/panel/logo/logo.png')}}" alt="" style="margin-top:-12px;" /></a>
                    <a href="#" class="x-navigation-control"></a>
                </li>
                <li class="xn-profile">
                    <a href="#" class="profile-mini">
                        <img src="assets/images/users/avatar.jpg" alt="" />
                    </a>
                </li>
                <li>
                    <a href="{{route('author_dashboard')}}" title="Dashboard"><span class="fa fa-desktop"> </span>Dashboard</a>

                </li>
                <li>
                    <a href="{{route('add_menuscript')}}" title="Menuscripts"><span class="fa fa-book"> </span>Add Menuscripts</a>
                </li>
                <li>
                    <a href="{{route('added_menuscript')}}" title="Menuscripts"><span class="fa fa-book"> </span>Added Menuscripts</a>
                </li>
                {{-- <li>
                    <a href="{{route('rejected_menuscript')}}" title="Menuscripts"><span class="fa fa-book"> </span>Rejected Menuscripts</a>
                </li> --}}
                <li>
                    <a href="{{route('published_menuscript')}}" title="Published Papers"><span class="fa fa-book"> </span>Published Menuscripts</a>
                </li>
                <li>
                    <a href="{{route('author_notification')}}" title="Pending Papers"><span class="fa fa-bell"> </span>Notification</a>
                </li>
                <li>
                    <a href="#" title="Rejected Papers"><span class="fa fa-support"> </span>Help</a>
                </li>


                <li class="xn-icon-button pull-right">
                    <a href="#" class="mb-control" data-box="#mb-signout"><span class="fa fa-sign-out"></span></a>
                </li>
                <li class="xn-icon-button pull-right">
                    <a href="profile.html"><span class="fa fa-user"></span></a>
                </li>
                <!-- MESSAGES -->
                <li class="xn-icon-button pull-right" style="margin-right:25px; min-width:100px; color:#FFFFFF; padding-top:20px;">
                    Welcome, Author - {{auth()->user()->first_name}} {{auth()->user()->last_name}}
                </li>

            </ul>
            <!-- END X-NAVIGATION -->
            <div class="modal" id="customModal" style="width:65% !important; margin-left:15%;">
                <div class="modal-dialog" style="width:65% !important; margin-left:15%;">
                    <div class="modal-content">
                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h4 class="modal-title">Confirmation</h4>
                            {{-- <button type="button" class="close" data-dismiss="modal"
                                onclick="closeCustomModal()">&times;</button> --}}
                        </div>
                        <!-- Modal Body -->
                        <div class="modal-body" style="font-weight: bold;font-size:15px">
                            <i> Are you sure you want to withdraw the script?</i>
                        </div>
                        <!-- Modal Footer -->
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" onclick="deleteItem()">Yes</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal"
                                onclick="closeCustomModal()">No</button>
                        </div>
                    </div>
                </div>
            </div>
            @yield('content')

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


    <!-- MESSAGE BOX-->
    <div class="message-box animated fadeIn" data-sound="alert" id="mb-signout">
        <div class="mb-container">
            <div class="mb-middle">
                <div class="mb-title"><span class="fa fa-sign-out"></span> Log <strong>Out</strong> ?</div>
                <div class="mb-content">
                    <p>Are you sure you want to log out?</p>
                    <p>Press No if youwant to continue work. Press Yes to logout current user.</p>
                </div>
                <div class="mb-footer">
                    <div class="pull-right">
                        <a href="{{route('log_out')}}" class="btn btn-success btn-lg">Yes</a>
                        <button class="btn btn-default btn-lg mb-control-close">No</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END MESSAGE BOX-->

    <!-- START PRELOADS -->
    <audio id="audio-alert" src="audio/alert.mp3" preload="auto"></audio>
    <audio id="audio-fail" src="audio/fail.mp3" preload="auto"></audio>
    <!-- END PRELOADS -->
    <!-- START SCRIPTS -->
    <script type="text/javascript" src="{{asset('public/panel/js/plugins/jquery/jquery.min.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.js"></script>
   
    <script type="text/javascript" src="{{asset('public/panel/js/plugins/summernote/summernote.js')}}"></script>
    <script type="text/javascript" src="{{asset('public/panel/js/plugins/jquery/jquery-ui.min.js')}}"></script>
   
   
    <script type="text/javascript" src="{{asset('public/panel/js/plugins/bootstrap/bootstrap.min.js')}}"></script>
    <!-- END PLUGINS -->
    <!-- THIS PAGE PLUGINS -->
    <script type='text/javascript' src='{{asset('public/panel/js/plugins/icheck/icheck.min.js')}}'></script>
    <script type="text/javascript" src="{{asset('public/panel/js/plugins/mcustomscrollbar/jquery.mCustomScrollbar.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('public/panel/js/plugins/bootstrap/bootstrap-datepicker.js')}}"></script>
    <script type="text/javascript" src="{{asset('public/panel/js/plugins/bootstrap/bootstrap-timepicker.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('public/panel/js/plugins/bootstrap/bootstrap-colorpicker.js')}}"></script>
    <script type="text/javascript" src="{{asset('public/panel/js/plugins/bootstrap/bootstrap-file-input.js')}}"></script>
    <script type="text/javascript" src="{{asset('public/panel/js/plugins/bootstrap/bootstrap-select.js')}}"></script>
    <script type="text/javascript" src="{{asset('public/panel/js/plugins/tagsinput/jquery.tagsinput.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('public/panel/js/plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('public/panel/js/plugins/dropzone/dropzone.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('public/panel/js/plugins/fileinput/fileinput.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('public/panel/js/plugins/filetree/jqueryFileTree.js')}}"></script>
 
    <!-- END PAGE PLUGINS -->
    <!-- START TEMPLATE -->
    <script type="text/javascript" src="{{asset('public/panel/js/plugins.js')}}"></script>
    <script type="text/javascript" src="{{asset('public/panel/js/actions.js')}}"></script>
    <!-- END TEMPLATE -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        $(function() {
            $("#file-simple").fileinput({
                showUpload: false,
                showCaption: false,
                browseClass: "btn btn-danger",
                fileType: "any"
            });
            $("#filetree").fileTree({
                root: '/',

                expandSpeed: 100,
                collapseSpeed: 100,
                multiFolder: false
            }, function(file) {
                alert(file);
            }, function(dir) {
                setTimeout(function() {
                    page_content_onresize();
                }, 200);
            });
        });

        function openCustomModal(deleteUrl) {
            // Set the delete URL in the modal
            document.getElementById('customModal').deleteUrl = deleteUrl;
            // Show the modal
            $('#customModal').modal('show');
        }

        function deleteItem() {
            // Get the delete URL from the modal
            var deleteUrl = document.getElementById('customModal').deleteUrl;
            // Redirect to the delete URL
            window.location.href = deleteUrl;
            // Hide the modal
            $('#customModal').modal('hide');
        }

        function closeCustomModal() {
            // Hide the modal
            $('#customModal').modal('hide');
        }

        setTimeout(() => {
                        $('.alert_close_btn').trigger('click');
                    }, 3000);

    </script>
    
    @yield('js')
</body>

</html>