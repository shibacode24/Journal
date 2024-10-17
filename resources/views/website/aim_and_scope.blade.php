@extends('website.layout')
@section('content')

            <!--************************************
					Inner Banner Start
			*************************************-->
            <div class="sj-innerbanner" style="margin-top: 20px;">
                <div class="container">
                    <div class="row">
                        <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                            <div class="sj-innerbannercontent">
                                <h1><b>Aim And Scope</b></h1>
                                <ol class="sj-breadcrumb">
                                    <li><a href="{{route('index')}}">Home</a></li>
                                    <li><a href="javascript:void(0);">Aim And Scope</a></li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--************************************
					Inner Banner End
			*************************************-->


            <!--************************************
					Main Start
			*************************************-->
            <main id="sj-main" class="sj-main sj-haslayout sj-sectionspace">
                <div id="sj-twocolumns" class="sj-twocolumns">
                    <div class="container">
                        <div class="row">

                            <div class="col-12 col-sm-12 col-md-8 col-lg-12">
                                <div id="sj-content" class="sj-content">
                                    <div class="sj-articledetail">

                                        <div class="sj-articledescription sj-sectioninnerspace">
                                            <div class="sj-borderheading">
                                                <h3><b>Aim and Scope</b></h3>
                                            </div>
                                            <div class="sj-description">
                                                <p align="justify">Prtibha Multidisciplinary International Research Journal, an E-Journal aims to acquaint and encourage the scholars with the current national and international issues related to research in different disciplines
                                                    of knowledge. </p>
                                                <p align="justify">Due to information technology the whole world has become a small village where the communication has become very smooth and fast. On this backdrop ‘Prtibha Multidisciplinary International Research Journal’
                                                    has a wider scope. It is a platform for the interaction of the scholars of social sciences, sciences, commerce and different languages to share their views and ideas. It invites research papers in English,
                                                    Marathi and Hindi language so that the scholars may enhance their knowledge without the barriers of language. The Journal aims to propagate the knowledge in the field of various streams of knowledge
                                                    and research and provides a forum for deliberations and exchange of ideas, creative mite, knowledge and expertise among Scientist, Academicians, Researchers, Professionals, Industries and Practitioners.
                                                    The Journal encourages budding as well as established researchers to submit original thoughts, theoretical and empirical result-based papers, case studies and research articles in the multidisciplinary
                                                    domains of knowledge.</p>
                                            </div>
                                        </div>

                                        <div class="sj-articledescription sj-sectioninnerspace">
                                            <div class="sj-borderheading">
                                                <h3><b>Editorial Board</b></h3>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-3 sj-author" style="border-top: none; padding-top: 0px;">
                                                    <!-- <figure class="sj-authorimg">
                                                        <img src="http://via.placeholder.com/100X100" alt="image description">
                                                    </figure>
                                                    <div class="sj-authorcontent">
                                                        <div class="sj-authorhead">
                                                            <div class="sj-leftarea">
                                                                <div class="sj-authorname">
                                                                    <h3>Dr. P. S. Yenkar</h3>
                                                                    <span>Chief Editor</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div> -->
                                                    <img src="{{asset('public/images/1.png')}}" alt="Image 2" class="sj-authorimg">
                                                </div>

                                                <div class="col-md-9 scroll-container">
                                                    <div class="scroll-content" style="padding-top: 25px;;">
                                                        <!-- <div class="sj-author" style="border-top: none;  padding-top: 0px;">
                                                            <figure class="sj-authorimg">
                                                                <img src="http://via.placeholder.com/100X100" alt="image description">
                                                            </figure>
                                                            <div class="sj-authorname">
                                                                <h3>Dr. G. T. Lamdhade</h3>
                                                                <span>Associate Editor</span>
                                                            </div>

                                                        </div>
                                                        <div class="col-md-4 sj-author" style="border-top: none;  padding-top: 0px;">
                                                            <figure class="sj-authorimg">
                                                                <img src="http://via.placeholder.com/100X100" alt="image description">
                                                            </figure>
                                                            <div class="sj-authorcontent">
                                                                <div class="sj-authorhead">
                                                                    <div class="sj-leftarea">
                                                                        <div class="sj-authorname">
                                                                            <h3>Dr. M. M.Rathore</h3>
                                                                            <span>Associate Editor</span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4 sj-author" style="border-top: none;  padding-top: 0px;">
                                                            <figure class="sj-authorimg">
                                                                <img src="http://via.placeholder.com/100X100" alt="image description">
                                                            </figure>
                                                            <div class="sj-authorcontent">
                                                                <div class="sj-authorhead">
                                                                    <div class="sj-leftarea">
                                                                        <div class="sj-authorname">
                                                                            <h3>Dr. R. J. Gajbe</h3>
                                                                            <span>Associate Editor</span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div> -->
                                                        <img src="{{asset('public/images/2.png')}}" alt="Image 2" class="sj-authorimg">
                                                        <img src="{{asset('public/images/3.png')}}" alt="Image 3" class="sj-authorimg">
                                                        <img src="{{asset('public/images/4.png')}}" alt="Image 2" class="sj-authorimg">
                                                        <img src="{{asset('public/images/5.png')}}" alt="Image 3" class="sj-authorimg">
                                                        <img src="{{asset('public/images/6.png')}}" alt="Image 2" class="sj-authorimg">
                                                        <img src="{{asset('public/images/7.png')}}" alt="Image 3" class="sj-authorimg">
                                                        <img src="{{asset('public/images/8.png')}}" alt="Image 2" class="sj-authorimg">
                                                        <img src="{{asset('public/images/9.png')}}" alt="Image 3" class="sj-authorimg">
                                                        <img src="{{asset('public/images/10.png')}}" alt="Image 2" class="sj-authorimg">
                                                        <img src="{{asset('public/images/11.png')}}" alt="Image 3" class="sj-authorimg">
                                                        <img src="{{asset('public/images/12.png')}}" alt="Image 2" class="sj-authorimg">
                                                        <img src="{{asset('public/images/13.png')}}" alt="Image 3" class="sj-authorimg">
                                                        <img src="{{asset('public/images/14.png')}}" alt="Image 2" class="sj-authorimg">
                                                        <img src="{{asset('public/images/15.png')}}" alt="Image 3" class="sj-authorimg">
                                                        <img src="{{asset('public/images/16.png')}}" alt="Image 2" class="sj-authorimg">
                                                        <img src="{{asset('public/images/17.png')}}" alt="Image 3" class="sj-authorimg">
                                                    </div>
                                                </div>

                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
            <!--************************************
					Main End
			*************************************-->

@stop