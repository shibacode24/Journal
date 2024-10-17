@extends('website.layout')
@section('content')

    <main id="sj-main" class="sj-main sj-haslayout sj-sectionspace" style="padding-top:20px;">
        <!-- <div class="sj-haslayout">
                <div class="container">
                    <div class="row">
                        <div class="sj-welcomegreeting">
                            <div class="col-12 col-sm-12 col-md-5 col-lg-5 sj-verticalmiddle">
                                <div id="sj-welcomeimgslider" class="sj-welcomeimgslider sj-welcomeslider owl-carousel">
                                    <figure class="sj-welcomeimg item">
                                        <img src="images/welcomeimg/img-01.jpg" alt="welcome Image">
                                    </figure>
                                    <figure class="sj-welcomeimg item">
                                        <img src="images/welcomeimg/img-02.jpg" alt="welcome Image">
                                    </figure>
                                    <figure class="sj-welcomeimg item">
                                        <img src="images/welcomeimg/img-03.jpg" alt="welcome Image">
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
                                        <p>Consectetur adipisicing elied dotaem eiusmod incididunt ulabore etoimisi dolore magna aliqua aenimalie admie veniam aistrud exrcittion ullamco laboris utaliquip commodouis aute irure dolorendries in voluptate
                                            velit esse cillum dolore.</p>
                                    </div>
                                    <div class="sj-btnarea">
                                        <a class="sj-btn" href="javascript:void(0);">Read More</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->
        <div id="sj-twocolumns" class="sj-twocolumns">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                        <div id="sj-content" class="sj-content">
                            <!--************************************
                                    Editor's Pick Start
                            *************************************-->
                            <section class="">
                                <!-- <h3><b>Social Science</b></h3> -->
                                <div class="">
                                    {{-- <h3><b>Social Science</b></h3> --}}
                                    {{-- <a class="sj-btnview" href="javascript:void(0);">View All</a> --}}
                                </div>
                                <div id="" style="padding-top:40px;">
                                    <div class="item">
                                        @foreach ($papers as $paper)
                                            <article class="sj-post sj-editorchoice">
                                                <figure class="sj-postimg">
                                                    {{-- @if ($paper->user_id == '1') --}}
                                                    {{-- @if (auth()->check()) --}}
                                                    {{-- @if (auth()->check())
                                                        <a id="download-link"
                                                            href="{{ asset('public/panel/images/menuscript_file/' . $paper->file) }}"
                                                            download>
                                                            <figure class="sj-postimg">

                                                                <img src="{{ asset('public/images/editorchoice/news-paper.png') }}"
                                                                    alt="image description"
                                                                    style="width: 80%; height: 80%;">

                                                            </figure>
                                                        </a>
                                                    @else
                                                        <a id="download-link" href="{{ url('/create_account') }}">  <figure class="sj-postimg">

                                                            <img src="{{ asset('public/images/editorchoice/news-paper.png') }}"
                                                                alt="image description"
                                                                style="width: 80%; height: 80%;">

                                                        </figure></a>
                                                    @endif --}}

                                                    {{-- <a href="{{asset('public/panel/images/menuscript_file/'.$paper->file)}}" download>
                                                --}}

                                                    <a href="{{ route('get_menuscript', $paper->id) }}" target="_blank">
                                                        <figure class="sj-postimg">

                                                            <img src="{{ asset('public/images/editorchoice/news-paper.png') }}"
                                                                alt="image description" style="width: 80%; height: 80%;">

                                                        </figure>
                                                    </a>
                                                    {{-- @else --}}
                                                    {{-- <script>
                                                window.location.href = "{{ url('/create_account') }}";
                                            </script>
                                        @endif --}}
                                                    {{-- @else
                                            <a href="{{asset('public/panel/images/menuscript_file/'.$paper->file)}}" download>
                                                <figure class="sj-postimg">
                                                   
                                                    <img src="{{ asset('public/images/editorchoice/news-paper.png') }}"
                                                        alt="image description" style="width: 80%; height: 80%;">
                                                    
                                                </figure>
                                            </a> --}}
                                                    {{-- @endif --}}
                                                </figure>
                                                <div class="sj-postcontent">
                                                    <div class="sj-head">
                                                        <span><i class="fa fa-calendar" aria-hidden="true"></i> Published :
                                                            {{ date('d-m-Y', strtotime($paper->publish_date)) ?? '' }}</span>
                                                        <a href="{{ route('get_menuscript', $paper->id) }}" target="_blank">
                                                            <h3> <b>{{ $paper->menuscript_title }}</b>
                                                            </h3>
                                                        </a>
                                                    </div>
                                                    <div class="sj-description">
                                                        <p style="font-size: 17px;">{!! $paper->submitted_paper->abstract ?? '' !!}</p><br>
                                                        <p><i class="fa fa-user" aria-hidden="true"></i> <b> Author :
                                                                {{ $paper->user_name->first_name }}
                                                                {{ $paper->user_name->last_name ?? '' }}</b></p>
                                                        <p><i class="fa fa-university" aria-hidden="true"></i> <b>University
                                                                : {{ $paper->user_name->affiliation ?? '' }}</b></p>
                                                    </div>
                                                </div>
                                            </article>
                                        @endforeach
                                    </div>

                                </div>


                            </section>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <script>
        document.getElementById('download-link').addEventListener('click', function(event) {
            @if (!auth()->check())
                event.preventDefault();
                window.location.href = "{{ url('/create_account') }}";
            @endif
        });
    </script>

@stop
