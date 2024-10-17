@extends('admin.layout')
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
                                            <span class="fa fa-user"></span>
                                        </div>
                                        <div class="widget-data">
                                            <div class="widget-int num-count">{{$total_editor}}</div>
                                            <div class="widget-title">Total <br>Editors</div>
                                            <div class="widget-subtitle">That added to our site</div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="widget widget-success widget-item-icon" style="background: linear-gradient(to bottom, #8e8f8f 0%, #96979a 100%);">
                                        <div class="widget-item-left">
                                            <span class="fa fa-user"></span>
                                        </div>
                                        <div class="widget-data">
                                            <div class="widget-int num-count">{{$total_reviewer}}</div>
                                            <div class="widget-title">Total <br>Reviewers</div>
                                            <div class="widget-subtitle">That added to our site</div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="widget widget-success widget-item-icon" style="background: linear-gradient(to bottom, #8e8f8f 0%, #96979a 100%);">
                                        <div class="widget-item-left">
                                            <span class="fa fa-user"></span>
                                        </div>
                                        <div class="widget-data">
                                            <div class="widget-int num-count">{{$total_author}}</div>
                                            <div class="widget-title">Total <br>Authors</div>
                                            <div class="widget-subtitle">That added to our site</div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="widget widget-success widget-item-icon" style="background: linear-gradient(to bottom, #8e8f8f 0%, #96979a 100%);">
                                        <div class="widget-item-left">
                                            <span class="fa fa-book"></span>
                                        </div>
                                        <div class="widget-data">
                                            <div class="widget-int num-count">{{$publish_menuscript}}</div>
                                            <div class="widget-title">Published Menuscripts</div>
                                            <div class="widget-subtitle">That published on our site</div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <!-- END WIDGETS -->

                            <!-- WIDGETS -->
                            <div class="row">


                                <div class="col-md-3">
                                    <div class="widget widget-primary widget-item-icon" style="background: linear-gradient(to bottom, #8e8f8f 0%, #96979a 100%);">
                                        <div class="widget-item-left">
                                            <span class="fa fa-book"></span>
                                        </div>
                                        <div class="widget-data">
                                            <div class="widget-int num-count">{{$pending_menuscript}}</div>
                                            <div class="widget-title">Pending Menuscripts</div>
                                            <div class="widget-subtitle">That pending for approval</div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="widget widget-success widget-item-icon" style="background: linear-gradient(to bottom, #8e8f8f 0%, #96979a 100%);">
                                        <div class="widget-item-left">
                                            <span class="fa fa-book"></span>
                                        </div>
                                        <div class="widget-data">
                                            <div class="widget-int num-count">{{$rejected_menuscript}}</div>
                                            <div class="widget-title">Reject <br>Menuscripts</div>
                                            <div class="widget-subtitle">That rejected by editor</div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="widget widget-success widget-item-icon" style="background: linear-gradient(to bottom, #8e8f8f 0%, #96979a 100%);">
                                        <div class="widget-item-left">
                                            <span class="fa fa-book"></span>
                                        </div>
                                        <div class="widget-data">
                                            <div class="widget-int num-count">{{$withdrawal_menuscript}}</div>
                                            <div class="widget-title">Withdrawl Menuscripts</div>
                                            <div class="widget-subtitle">That collected from our site</div>
                                        </div>
                                    </div>
                                </div>


                                <div class="col-md-3">
                                    <div class="widget widget-success widget-item-icon" style="background: linear-gradient(to bottom, #8e8f8f 0%, #96979a 100%);">
                                        <div class="widget-item-left">
                                            <span class="fa fa-money"></span>
                                        </div>
                                        <div class="widget-data">
                                            <div class="widget-int num-count">1056</div>
                                            <div class="widget-title">Payment <br> Collection</div>
                                            <div class="widget-subtitle">That collected from our site</div>
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
                                            <div class="widget-subtitle">That visited our site today</div>
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