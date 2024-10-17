@extends('website.layout')
@section('content')

<main id="sj-main" class="sj-main sj-haslayout sj-sectionspace" style="padding-top:20px;">
    <div class="sj-haslayout">
        <div class="container">
            <div class="row">
                <div class="sj-welcomegreeting">
                    <div class="col-12 col-sm-12 col-md-5 col-lg-5 sj-verticalmiddle">
                        <div id="sj-welcomeimgslider" class="sj-welcomeimgslider sj-welcomeslider owl-carousel">
                            <figure class="sj-welcomeimg item">
                                <img src="{{asset('public/images/welcomeimg/1.png')}}" alt="welcome Image">
                            </figure>
                            <figure class="sj-welcomeimg item">
                                <img src="{{asset('public/images/welcomeimg/2.png')}}" alt="welcome Image">
                            </figure>
                            <figure class="sj-welcomeimg item">
                                <img src="{{asset('public/images/welcomeimg/3.png')}}" alt="welcome Image">
                            </figure>
                        </div>
                    </div>
                    <div class="col-12 col-sm-12 col-md-7 col-lg-7 sj-verticalmiddle">
                        <div class="sj-welcomecontent">
                            <div class="sj-welcomehead">
                                <span>Greetings &amp; Welcome</span>
                                <h2>Explore Latest Researches</h2>
                            </div>
                            <div class="sj-description">
                                <p>We publish research papers across a wide range of domains and share our latest developments in science research.</p>
                            </div>
                            <div class="sj-btnarea">
                                <a class="sj-btn" href="javascript:void(0);">Read More</a>
                                <!-- <a class="sj-btn sj-btnactive" href="javascript:void(0);">Buy Now</a> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="sj-twocolumns" class="sj-twocolumns">
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-12 col-md-8 col-lg-9">
                    <div id="sj-content" class="sj-content">
                        <!--************************************
                            Editor's Pick Start
                    *************************************-->
                        <section class="sj-haslayout sj-sectioninnerspace">
                            <div class="sj-borderheading">
                                <h3><b>Browse</b></h3>
                                <a class="sj-btnview" href="javascript:void(0);">View All</a>
                            </div>
                            <div id="sj-editorchoiceslider" class="sj-editorchoiceslider sj-editorschoice owl-carousel">
                                @foreach ($categories->chunk(3) as $categoryChunk)
                                    <div class="item">
                                        @foreach ($categoryChunk as $category)
                                            <article class="sj-post sj-editorchoice">
                                                <figure class="sj-postimg">
                                                    <img src="{{ asset('public/panel/images/category_image/'.$category->category_image) }}" alt="image description" style="height: 170px;width:270px;">
                                                </figure>
                                                <div class="sj-postcontent">
                                                    <div class="sj-head">
                                                        <h3 style="font-size: 20px;"><a href="{{ route('details', $category->id) }}">{{ $category->category_name }}</a></h3>
                                                    </div>
                                                    <div class="sj-description">
                                                        <p style="font-size: 17px;">Data from your journal will be shown here...</p><br>
                                                    </div>
                                                    <a class="sj-btn" href="{{ route('details', $category->id) }}">View All</a>
                                                </div>
                                            </article>
                                        @endforeach
                                    </div>
                                @endforeach
                            </div>
                            {{-- <div id="sj-editorchoiceslider" class="sj-editorchoiceslider sj-editorschoice owl-carousel">
                                <div class="item">
                                    <article class="sj-post sj-editorchoice">
                                        <figure class="sj-postimg">
                                            <img src="{{asset('public/images/editorchoice/1.png')}}" alt="image description">
                                        </figure>
                                        <div class="sj-postcontent">
                                            <div class="sj-head">
                                                <!-- <span><i class="fa fa-book" aria-hidden="true"></i> &nbsp;8963</span> -->
                                                <h3 style="font-size: 20px;"><a href="details.html">Social Science</a></h3>
                                            </div>
                                            <div class="sj-description">
                                                <p style="font-size: 17px;">Data from your journal will be shown here...</p><br> </div>
                                            <a class="sj-btn" href="details.html">View All</a>
                                        </div>
                                    </article>
                                    <article class="sj-post sj-editorchoice">
                                        <figure class="sj-postimg">
                                            <img src="{{asset('public/images/editorchoice/2.png')}}" alt="image description">
                                        </figure>
                                        <div class="sj-postcontent">
                                            <div class="sj-head">
                                                <!-- <span><i class="fa fa-book" aria-hidden="true"></i> &nbsp;4792</span> -->
                                                <h3 style="font-size: 20px;"><a href="javascript:void(0);">Life Science</a></h3>
                                            </div>
                                            <div class="sj-description">
                                                <p style="font-size: 17px;">Data from your journal will be shown here...</p><br> </div>
                                            <a class="sj-btn" href="javascript:void(0);">View All</a>
                                        </div>
                                    </article>
                                    <article class="sj-post sj-editorchoice">
                                        <figure class="sj-postimg">
                                            <img src="{{asset('public/images/editorchoice/3.png')}}" alt="image description">
                                        </figure>
                                        <div class="sj-postcontent">
                                            <div class="sj-head">
                                                <!-- <span><i class="fa fa-book" aria-hidden="true"></i> &nbsp;5100</span> -->
                                                <h3 style="font-size: 20px;"><a href="javascript:void(0);">Humanities</a></h3>
                                            </div>
                                            <div class="sj-description">
                                                <p style="font-size: 17px;">Data from your journal will be shown here...</p><br> </div>
                                            <a class="sj-btn" href="javascript:void(0);">View All</a>
                                        </div>
                                    </article>
                                </div>
                                <div class="item">
                                    <article class="sj-post sj-editorchoice">
                                        <figure class="sj-postimg">
                                            <img src="{{asset('public/images/editorchoice/6.png')}}" alt="image description">
                                        </figure>
                                        <div class="sj-postcontent">
                                            <div class="sj-head">
                                                <!-- <span class="sj-username"><a href="javascript:void(0);">8497</a></span> -->
                                                <h3 style="font-size: 20px;"><a href="javascript:void(0);">Physical Science</a></h3>
                                            </div>
                                            <div class="sj-description">
                                                <p style="font-size: 17px;">Data from your journal will be shown here...</p><br> </div>
                                            <a class="sj-btn" href="javascript:void(0);">View All</a>
                                        </div>
                                    </article>
                                    <article class="sj-post sj-editorchoice">
                                        <figure class="sj-postimg">
                                            <img src="{{asset('public/images/editorchoice/4.png')}}" alt="image description">
                                        </figure>
                                        <div class="sj-postcontent">
                                            <div class="sj-head">
                                                <!-- <span><i class="fa fa-book" aria-hidden="true"></i> &nbsp;5699</span> -->
                                                <h3 style="font-size: 20px;"><a href="javascript:void(0);">General Economics</a></h3>
                                            </div>
                                            <div class="sj-description">
                                                <p style="font-size: 17px;">Data from your journal will be shown here...</p><br> </div>
                                            <a class="sj-btn" href="javascript:void(0);">View All</a>
                                        </div>
                                    </article>
                                    <article class="sj-post sj-editorchoice">
                                        <figure class="sj-postimg">
                                            <img src="{{asset('public/images/editorchoice/5.png')}}" alt="image description">
                                        </figure>
                                        <div class="sj-postcontent">
                                            <div class="sj-head">
                                                <!-- <span><i class="fa fa-book" aria-hidden="true"></i> &nbsp;7230</span> -->
                                                <h3 style="font-size: 20px;"><a href="javascript:void(0);">Agriculture</a></h3>
                                            </div>
                                            <div class="sj-description">
                                                <p style="font-size: 17px;">Data from your journal will be shown here...</p><br> </div>
                                            <a class="sj-btn" href="javascript:void(0);">View All</a>
                                        </div>
                                    </article>
                                </div>
                                <div class="item">
                                    <article class="sj-post sj-editorchoice">
                                        <figure class="sj-postimg">
                                            <img src="{{asset('public/images/editorchoice/9.png')}}" alt="image description">
                                        </figure>
                                        <div class="sj-postcontent">
                                            <div class="sj-head">
                                                <!-- <span><i class="fa fa-book" aria-hidden="true"></i> &nbsp;5891</span> -->
                                                <h3 style="font-size: 20px;"><a href="javascript:void(0);">Industrial Organization</a></h3>
                                            </div>
                                            <div class="sj-description">
                                                <p style="font-size: 17px;">Data from your journal will be shown here...</p><br> </div>
                                            <a class="sj-btn" href="javascript:void(0);">View All</a>
                                        </div>
                                    </article>
                                    <article class="sj-post sj-editorchoice">
                                        <figure class="sj-postimg">
                                            <img src="{{asset('public/images/editorchoice/7.png')}}" alt="image description">
                                        </figure>
                                        <div class="sj-postcontent">
                                            <div class="sj-head">
                                                <!-- <span><i class="fa fa-book" aria-hidden="true"></i> &nbsp;6085</span> -->
                                                <h3 style="font-size: 20px;"><a href="javascript:void(0);">Public Economics</a></h3>
                                            </div>
                                            <div class="sj-description">
                                                <p style="font-size: 17px;">Data from your journal will be shown here...</p><br> </div>
                                            <a class="sj-btn" href="javascript:void(0);">View All</a>
                                        </div>
                                    </article>
                                    <article class="sj-post sj-editorchoice">
                                        <figure class="sj-postimg">
                                            <img src="{{asset('public/images/editorchoice/8.png')}}" alt="image description">
                                        </figure>
                                        <div class="sj-postcontent">
                                            <div class="sj-head">
                                                <!-- <span><i class="fa fa-book" aria-hidden="true"></i> &nbsp;10000</span> -->
                                                <h3 style="font-size: 20px;"><a href="javascript:void(0);">Marketing</a></h3>
                                            </div>
                                            <div class="sj-description">
                                                <p style="font-size: 17px;">Data from your journal will be shown here...</p><br> </div>
                                            <a class="sj-btn" href="javascript:void(0);">View All</a>
                                        </div>
                                    </article>
                                </div>
                            </div> --}}
                        </section>
                        <!--************************************
                            Editor's Pick End
                    *************************************-->

                    </div>
                </div>
                <div class="col-12 col-sm-12 col-md-4 col-lg-3">
                    <aside id="sj-sidebar" class="sj-sidebar">
                        {{-- <div class="sj-widget sj-widgetsearch">
                            <div class="sj-widgetcontent">
                                <form action="{{route('get_search')}}" method="get" class="sj-formtheme sj-formsearch">
                                    <fieldset>
                                        <input type="search" name="search" class="form-control" placeholder="Search here">
                                        <button type="submit" class="sj-btnsearch"><i class="lnr lnr-magnifier"></i></button>
                                    </fieldset>
                                </form>
                            </div>
                        </div> --}}
                        <div class="sj-widget sj-widgetimpactfector">
                            <h4 style="font-size: 23px;margin-top:11%;"><b>Categories :</b></h4>
                            <div class="sj-widgetcontent">
                                <div class="row">
                                    @foreach ($categories as $categorys)
                                    <div class="col-md-7" align="left">
                                        <p style="font-size: 12px;">
                                            <a href="{{route('details',$categorys->id)}}"><b>{{$categorys->category_name}} :</b></a> </p>
                                    </div>
                                    @php
                                    $count = \App\Models\Menuscript::where('category_id', $categorys->id)
									->where('publish_script', '1')
									->count();
                                @endphp
                                    <div class="col-md-5" align="right">
                                        <p style="font-size: 12px;"><b>{{$count}}</b></p>
                                    </div>  
                                    @endforeach
                                   
                                    {{-- <div class="col-md-7" align="left">
                                        <p style="font-size: 12px;"><b>Physics :</b></p>
                                    </div>
                                    <div class="col-md-5" align="right">
                                        <p style="font-size: 12px;"><b>00</b></p>
                                    </div>
                                    <div class="col-md-7" align="left">
                                        <p style="font-size: 12px;"><b>Chemistry:</b></p>
                                    </div>
                                    <div class="col-md-5" align="right">
                                        <p style="font-size: 12px;"><b>00</b></p>
                                    </div>
                                    <div class="col-md-7" align="left">
                                        <p style="font-size: 12px;"><b>Physical Science:</b></p>
                                    </div>
                                    <div class="col-md-5" align="right">
                                        <p style="font-size: 12px;"><b>00</b></p>
                                    </div>
                                    <div class="col-md-7" align="left">
                                        <p style="font-size: 12px;"><b>Agriculture :</b></p>
                                    </div>
                                    <div class="col-md-5" align="right">
                                        <p style="font-size: 12px;"><b>00</b></p>
                                    </div>
                                    <div class="col-md-7" align="left">
                                        <p style="font-size: 12px;"><b>General Economics  :</b></p>
                                    </div>
                                    <div class="col-md-5" align="right">
                                        <p style="font-size: 12px;"><b>00</b></p>
                                    </div>
                                    <div class="col-md-7" align="left">
                                        <p style="font-size: 12px;"><b>Public Economics  :</b></p>
                                    </div>
                                    <div class="col-md-5" align="right">
                                        <p style="font-size: 12px;"><b>00</b></p>
                                    </div>
                                    <div class="col-md-7" align="left">
                                        <p style="font-size: 12px;"><b>Marketing  :</b></p>
                                    </div>
                                    <div class="col-md-5" align="right">
                                        <p style="font-size: 12px;"><b>00</b></p>
                                    </div>
                                    <div class="col-md-7" align="left">
                                        <p style="font-size: 12px;"><b>Life Science:</b></p>
                                    </div>
                                    <div class="col-md-5" align="right">
                                        <p style="font-size: 12px;"><b>00</b></p>
                                    </div>
                                    <div class="col-md-7" align="left">
                                        <p style="font-size: 12px;"><b>Humanities :</b></p>
                                    </div>
                                    <div class="col-md-5" align="right">
                                        <p style="font-size: 12px;"><b>00</b></p>
                                    </div>
                                    <div class="col-md-7" align="left">
                                        <p style="font-size: 12px;"><b>Biology :</b></p>
                                    </div>
                                    <div class="col-md-5" align="right">
                                        <p style="font-size: 12px;"><b>00</b></p>
                                    </div> --}}
                                    {{-- <div class="col-md-12" align="center">
                                        <div class="sj-postcontent">
                                            <a class="sj-btn" href="javascript:void(0);">View More</a>
                                        </div>
                                    </div> --}}
                                </div>
                            </div>
                        </div>
                        <!-- <div class="sj-widget sj-widgetnoticeboard">
                            <div class="sj-widgetheading">
                                <h3>Notice Board</h3>
                            </div>
                            <div class="sj-widgetcontent">
                                <ul>
                                    <li><a href="javascript:void(0);">Adipisicing elitaium sed dotas eiusm tempor incididunt utae labore etiate dolore magna aliqua enim.</a></li>
                                </ul>
                            </div>
                        </div> -->
                    </aside>
                </div>
            </div>
        </div>
    </div>
</main>

@stop