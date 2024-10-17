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
                            <section class="sj-haslayout sj-sectioninnerspace">
                                <!-- <h3><b>Social Science</b></h3> -->
                                <div class="sj-borderheading">
                                    <h3><b>{{ $category->category_name }}</b></h3>
                                    <a class="sj-btnview" href="javascript:void(0);">View All</a>
                                </div>
                                <div id="sj-editorchoiceslider" class="sj-editorchoiceslider sj-editorschoice owl-carousel"
                                    style="padding-top:40px;">
                                    @foreach ($papers->chunk(3) as $paperChunk)  
                                    <div class="item">
                                        @foreach ($paperChunk as $paper)
                                        <article class="sj-post sj-editorchoice">
                                            {{-- @if ($paper->user_id == '1')
                                            <a href="{{asset('public/panel/images/menuscript_file/'.$paper->file)}}" download>
                                                <figure class="sj-postimg">
                                                   
                                                    <img src="{{ asset('public/images/editorchoice/news-paper.png') }}"
                                                        alt="image description" style="width: 80%; height: 80%;">
                                                    
                                                </figure>
                                            </a> 
                                            @else --}}
                                            {{-- <a href="{{asset('public/panel/images/menuscript_file/'.$paper->file)}}" download>
                                                <figure class="sj-postimg">
                                                   
                                                    <img src="{{ asset('public/images/editorchoice/news-paper.png') }}"
                                                        alt="image description" style="width: 80%; height: 80%;">
                                                    
                                                </figure>
                                            </a> --}}
                                            {{-- @endif --}}
                                           
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

                                        <a href="{{route('get_menuscript',$paper->id)}}" target="_blank">
                                            <figure class="sj-postimg">

                                                <img src="{{ asset('public/images/editorchoice/news-paper.png') }}"
                                                    alt="image description"
                                                    style="width: 80%; height: 80%;">

                                            </figure>
                                        </a>
                                      
                                            <div class="sj-postcontent">
                                                <div class="sj-head">
                                                    <span><i class="fa fa-calendar" aria-hidden="true"></i> Published :
                                                        {{date('d-m-Y',strtotime($paper->publish_date)) ?? '' }}</span> &nbsp; &nbsp;
                                                        {{-- <span><i
                                                            class="fa fa-book" aria-hidden="true"></i> Pages :
                                                        {{ $paper->pages }}</span> --}}
                                                    <h3>
                                                            <a href="{{route('get_menuscript',$paper->id)}}" target="_blank">
                                                            <b>{{ $paper->menuscript_title }}</b>
                                                           </a>
                                                    </h3>
                                                </div>
                                                <div class="sj-description">
                                                    <p style="font-size: 17px;">{!! $paper->submitted_paper->abstract ?? '' !!}</p><br>
                                                    <p><i class="fa fa-user" aria-hidden="true"></i> <b>Author :
                                                            {{ $paper->user_name->first_name }} {{ $paper->user_name->last_name ?? '' }}</b></p>
                                                    <p><i class="fa fa-university" aria-hidden="true"></i> <b>University
                                                            : {{ $paper->user_name->affiliation ?? ''}}</b></p>
                                                </div>
                                            </div>
                                        </article>
                                        @endforeach
                                    </div>  
                                    @endforeach
                                    </article>
                                    {{-- <article class="sj-post sj-editorchoice">
                                        <figure class="sj-postimg">
                                            <img src="images/editorchoice/news-paper.png" alt="image description"
                                                style="width: 80%; height: 80%;">
                                        </figure>
                                        <div class="sj-postcontent">
                                            <div class="sj-head">
                                                <span><i class="fa fa-calendar" aria-hidden="true"></i> Published : 05 March
                                                    2023</span> &nbsp; &nbsp;<span><i class="fa fa-book"
                                                        aria-hidden="true"></i> Pages : 14</span>
                                                <h3><a href="#"><b>Anthropology & Archaeology Research Network
                                                        </b></a></h3>
                                            </div>
                                            <div class="sj-description">
                                                <p style="font-size: 17px;">Data from your journal will be shown here...</p>
                                                <br>
                                                <p><i class="fa fa-user" aria-hidden="true"></i> <b>Published by : Author
                                                        Name</b></p>
                                                <p><i class="fa fa-university" aria-hidden="true"></i> <b>University :
                                                        University Name</b></p>
                                            </div>
                                        </div>
                                    </article>
                                    <article class="sj-post sj-editorchoice">
                                        <figure class="sj-postimg">
                                            <img src="images/editorchoice/news-paper.png" alt="image description"
                                                style="width: 80%; height: 80%;">
                                        </figure>
                                        <div class="sj-postcontent">
                                            <div class="sj-head">
                                                <span><i class="fa fa-calendar" aria-hidden="true"></i> Published : 16 April
                                                    2023</span> &nbsp; &nbsp;<span><i class="fa fa-book"
                                                        aria-hidden="true"></i> Pages : 06</span>
                                                <h3><a href="#"><b>Corporate Governance Network</b></a></h3>
                                            </div>
                                            <div class="sj-description">
                                                <p style="font-size: 17px;">Data from your journal will be shown here...</p>
                                                <br>
                                                <p><i class="fa fa-user" aria-hidden="true"></i> <b>Published by : Author
                                                        Name</b></p>
                                                <p><i class="fa fa-university" aria-hidden="true"></i> <b>University :
                                                        University Name</b></p>
                                            </div>
                                        </div>
                                    </article> --}}
                                </div>
                                {{-- <div class="item">
                                    <article class="sj-post sj-editorchoice">
                                        <figure class="sj-postimg">
                                            <img src="images/editorchoice/news-paper.png" alt="image description" style="width: 80%; height: 80%;">
                                        </figure>
                                        <div class="sj-postcontent">
                                            <div class="sj-head">
                                                <span><i class="fa fa-calendar" aria-hidden="true"></i> Published : 20 May 2023</span> &nbsp; &nbsp;<span><i class="fa fa-book" aria-hidden="true"></i> Pages : 16</span>
                                                <h3><a href="#"><b>Decision Science Research Network </b></a></h3>
                                            </div>
                                            <div class="sj-description">
                                                <p style="font-size: 17px;">Data from your journal will be shown here...</p><br>
                                                <p><i class="fa fa-user" aria-hidden="true"></i> <b>Published by : Author Name</b></p>
                                                <p><i class="fa fa-university" aria-hidden="true"></i> <b>University : University Name</b></p>
                                            </div>
                                        </div>
                                    </article>
                                    <article class="sj-post sj-editorchoice">
                                        <figure class="sj-postimg">
                                            <img src="images/editorchoice/news-paper.png" alt="image description" style="width: 80%; height: 80%;">
                                        </figure>
                                        <div class="sj-postcontent">
                                            <div class="sj-head">
                                                <span><i class="fa fa-calendar" aria-hidden="true"></i> Published : 26 June 2023</span> &nbsp; &nbsp;<span><i class="fa fa-book" aria-hidden="true"></i> Pages : 07</span>
                                                <h3><a href="#"><b>Education Research Network </b></a></h3>
                                            </div>
                                            <div class="sj-description">
                                                <p style="font-size: 17px;">Data from your journal will be shown here...</p><br>
                                                <p><i class="fa fa-user" aria-hidden="true"></i> <b>Published by : Author Name</b></p>
                                                <p><i class="fa fa-university" aria-hidden="true"></i> <b>University : University Name</b></p>
                                            </div>
                                        </div>
                                    </article>
                                    <article class="sj-post sj-editorchoice">
                                        <figure class="sj-postimg">
                                            <img src="images/editorchoice/news-paper.png" alt="image description" style="width: 80%; height: 80%;">
                                        </figure>
                                        <div class="sj-postcontent">
                                            <div class="sj-head">
                                                <span><i class="fa fa-calendar" aria-hidden="true"></i> Published : 30 June 2023</span> &nbsp; &nbsp;<span><i class="fa fa-book" aria-hidden="true"></i> Pages : 12</span>
                                                <h3><a href="#"><b>Health Economics Network </b></a></h3>
                                            </div>
                                            <div class="sj-description">
                                                <p style="font-size: 17px;">Data from your journal will be shown here...</p><br>
                                                <p><i class="fa fa-user" aria-hidden="true"></i> <b>Published by : Author Name</b></p>
                                                <p><i class="fa fa-university" aria-hidden="true"></i> <b>University : University Name</b></p>
                                            </div>
                                        </div>
                                    </article>
                                </div>
                                <div class="item">
                                    <article class="sj-post sj-editorchoice">
                                        <figure class="sj-postimg">
                                            <img src="images/editorchoice/news-paper.png" alt="image description" style="width: 80%; height: 80%;">
                                        </figure>
                                        <div class="sj-postcontent">
                                            <div class="sj-head">
                                                <span><i class="fa fa-calendar" aria-hidden="true"></i> Published : 15 July 2023</span> &nbsp; &nbsp;<span><i class="fa fa-book" aria-hidden="true"></i> Pages : 09</span>
                                                <h3><a href="#"><b>Legal Scholarship Network </b></a></h3>
                                            </div>
                                            <div class="sj-description">
                                                <p style="font-size: 17px;">Data from your journal will be shown here...</p><br>
                                                <p><i class="fa fa-user" aria-hidden="true"></i> <b>Published by : Author Name</b></p>
                                                <p><i class="fa fa-university" aria-hidden="true"></i> <b>University : University Name</b></p>
                                            </div>
                                        </div>
                                    </article>
                                    <article class="sj-post sj-editorchoice">
                                        <figure class="sj-postimg">
                                            <img src="images/editorchoice/news-paper.png" alt="image description" style="width: 80%; height: 80%;">
                                        </figure>
                                        <div class="sj-postcontent">
                                            <div class="sj-head">
                                                <span><i class="fa fa-calendar" aria-hidden="true"></i> Published : 11 Sept 2023</span> &nbsp; &nbsp;<span><i class="fa fa-book" aria-hidden="true"></i> Pages : 10</span>
                                                <h3><a href="#"><b>Political Science Network</b></a></h3>
                                            </div>
                                            <div class="sj-description">
                                                <p style="font-size: 17px;">Data from your journal will be shown here...</p><br>
                                                <p><i class="fa fa-user" aria-hidden="true"></i> <b>Published by : Author Name</b></p>
                                                <p><i class="fa fa-university" aria-hidden="true"></i> <b>University : University Name</b></p>
                                            </div>
                                        </div>
                                    </article>
                                    <article class="sj-post sj-editorchoice">
                                        <figure class="sj-postimg">
                                            <img src="images/editorchoice/news-paper.png" alt="image description" style="width: 80%; height: 80%;">
                                        </figure>
                                        <div class="sj-postcontent">
                                            <div class="sj-head">
                                                <span><i class="fa fa-calendar" aria-hidden="true"></i> Published : 25 Oct 2023</span> &nbsp; &nbsp;<span><i class="fa fa-book" aria-hidden="true"></i> Pages : 05</span>
                                                <h3><a href="#"><b>Sociology Research Network</b></a></h3>
                                            </div>
                                            <div class="sj-description">
                                                <p style="font-size: 17px;">Data from your journal will be shown here...</p><br>
                                                <p><i class="fa fa-user" aria-hidden="true"></i> <b>Published by : Author Name</b></p>
                                                <p><i class="fa fa-university" aria-hidden="true"></i> <b>University : University Name</b></p>
                                            </div>
                                        </div>
                                    </article>
                                </div> --}}
                        </div>

                        <!-- <div class="pagination">
                                    <button id="previous"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5 8.25 12l7.5-7.5" />
                                      </svg>
                                      </button>
                                    <ul>
                                        <li class="active">1</li>
                                        <li>2</li>
                                        <li>3</li>
                                        <li>4</li>
                                        <li>5</li>
                                    </ul>
                                    <button id="next"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
                                      </svg>
                                      </button>
                                </div> -->

                        <!-- <div class="pagination">
                                    <a href="#">&laquo;</a>
                                    <a href="#">1</a>
                                    <a href="#">2</a>
                                    <a href="#">3</a>
                                    <a href="#">4</a>
                                    <a href="#">5</a>
                                    <a href="#">6</a>
                                    <a href="#">&raquo;</a>
                                </div> -->
                        </section>
                        <!--************************************
                                Editor's Pick End
                        *************************************-->

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
