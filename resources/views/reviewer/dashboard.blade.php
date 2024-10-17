@extends('reviewer.layout')
@section('content')
          
          
          <div class="page-content-wrap">
                <div class="row">
                    <div class="col-md-12">

                        <div class="panel-body" style="padding:40px;">

                            <!-- WIDGETS -->
                            <div class="row">

                                <div class="col-md-3">
                                    <div class="widget widget-primary widget-item-icon" style="background: linear-gradient(to bottom, #8e8f8f 0%, #96979a 100%);">
                                        <div class="widget-item-left">
                                            <span class="fa fa-book"></span>
                                        </div>
                                        <div class="widget-data">
                                            <div class="widget-int num-count">{{$assign_menuscript}}</div>
                                            <a href="menuscript.html" style="color: #fff;">
                                                <div class="widget-title">Assign<br> Menuscripts</div>
                                            </a>
                                            <div class="widget-subtitle">That assign to our reviewer</div>
                                        </div>
                                    </div>
                                </div>

                                <!-- <div class="col-md-3">
                                    <div class="widget widget-success widget-item-icon" style="background: linear-gradient(to bottom, #8e8f8f 0%, #96979a 100%);">
                                        <div class="widget-item-left">
                                            <span class="fa fa-book"></span>
                                        </div>
                                        <div class="widget-data">
                                            <div class="widget-int num-count">567</div>
                                            <div class="widget-title">Rejected Papers</div>
                                            <div class="widget-subtitle">That rejected on our site</div>
                                        </div>
                                    </div>
                                </div> -->

                                <!-- <div class="col-md-3">
                                    <div class="widget widget-success widget-item-icon" style="background: linear-gradient(to bottom, #8e8f8f 0%, #96979a 100%);">
                                        <div class="widget-item-left">
                                            <span class="fa fa-book"></span>
                                        </div>
                                        <div class="widget-data">
                                            <div class="widget-int num-count">879</div>
                                            <div class="widget-title">Published Mrnuscripts</div>
                                            <div class="widget-subtitle">That published to our site</div>
                                        </div>
                                    </div>
                                </div> -->

                                <div class="col-md-3">
                                    <div class="widget widget-primary widget-item-icon" style="background: linear-gradient(to bottom, #8e8f8f 0%, #96979a 100%);">
                                        <div class="widget-item-left">
                                            <span class="fa fa-book"></span>
                                        </div>
                                        <div class="widget-data">
                                            <div class="widget-int num-count">{{$pending_menuscript}}</div>
                                            <a href="pending_menuscript.html" style="color: #fff;">
                                                <div class="widget-title">Pending Menuscripts</div>
                                            </a>
                                            <div class="widget-subtitle">That published on our site</div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <!-- END WIDGETS -->

                        </div>
                    </div>
                </div>


            </div>

      @stop