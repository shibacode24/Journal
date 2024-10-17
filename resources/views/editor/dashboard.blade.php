@extends('editor.layout')
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
                                            <div class="widget-int num-count">{{$total_menuscript}}</div>
                                            <a href="menuscript.html" style="color:#fff;">
                                                <div class="widget-title">Total <br>Menuscripts</div>
                                            </a>
                                            <div class="widget-subtitle">That added to our site</div>
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

                                <div class="col-md-3">
                                    <div class="widget widget-success widget-item-icon" style="background: linear-gradient(to bottom, #8e8f8f 0%, #96979a 100%);">
                                        <div class="widget-item-left">
                                            <span class="fa fa-book"></span>
                                        </div>
                                        <div class="widget-data">
                                            <div class="widget-int num-count">{{$publish_menuscript}}</div>
                                            <a href="published_menuscript.html" style="color:#fff;">
                                                <div class="widget-title">Published Menuscripts</div>
                                            </a>
                                            <div class="widget-subtitle">That published to our site</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="widget widget-primary widget-item-icon" style="background: linear-gradient(to bottom, #8e8f8f 0%, #96979a 100%);">
                                        <div class="widget-item-left">
                                            <span class="fa fa-book"></span>
                                        </div>
                                        <div class="widget-data">
                                            <div class="widget-int num-count">{{$pending_menuscript}}</div>
                                            <a href="pending_menuscripts.html" style="color:#fff;">
                                                <div class="widget-title">Pending Menuscripts</div>
                                            </a>
                                            <div class="widget-subtitle">That pending to our site</div>
                                        </div>
                                    </div>
                                </div>

                                <!-- <div class="col-md-3">
                                    <div class="widget widget-success widget-item-icon" style="background: linear-gradient(to bottom, #7e8182 0%, #01121d 100%);">
                                        <div class="widget-item-left">
                                            <span class="fa fa-book"></span>
                                        </div>
                                        <div class="widget-data">
                                            <div class="widget-int num-count">550</div>
                                            <div class="widget-title">Published Papers</div>
                                            <div class="widget-subtitle">That published on our site</div>
                                        </div>
                                    </div>
                                </div> -->

                            </div>
                            <!-- END WIDGETS -->

                        </div>
                    </div>
                </div>


            </div>

       @stop