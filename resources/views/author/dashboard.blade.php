@extends('author.layout')
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
                                            <div class="widget-int num-count">{{$new_submission}}</div>
                                            <div class="widget-title">New <br>Submission</div>
                                            <div class="widget-subtitle">That submitted to our site</div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="widget widget-primary widget-item-icon" style="background: linear-gradient(to bottom, #8e8f8f 0%, #96979a 100%);">
                                        <div class="widget-item-left">
                                            <span class="fa fa-book"></span>
                                        </div>
                                        <div class="widget-data">
                                            <div class="widget-int num-count">567</div>
                                            <div class="widget-title">Revised Menuscripts</div>
                                            <div class="widget-subtitle">That revised on our site</div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="widget widget-primary widget-item-icon" style="background: linear-gradient(to bottom, #8e8f8f 0%, #96979a 100%);">
                                        <div class="widget-item-left">
                                            <span class="fa fa-book"></span>
                                        </div>
                                        <div class="widget-data">
                                            <div class="widget-int num-count">{{$published_menuscript}}</div>
                                            <div class="widget-title">Withdrawl Menuscripts</div>
                                            <div class="widget-subtitle">That withdrawl from our site</div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="widget widget-primary widget-item-icon" style="background: linear-gradient(to bottom, #8e8f8f 0%, #96979a 100%);">
                                        <div class="widget-item-left">
                                            <span class="fa fa-book"></span>
                                        </div>
                                        <div class="widget-data">
                                            <div class="widget-int num-count">{{$withdrawal_menuscript}}</div>
                                            <div class="widget-title">Published Menuscripts</div>
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