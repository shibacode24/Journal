<!DOCTYPE html>
<html>

<head>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
        crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
    <style>
        body {
            position: relative;
            margin: 0;
            padding: 0;
            /* font-family: Arial, sans-serif; */
        }

        .form-group1 {
            margin-bottom: 20px;
        }

        .form-group-horizontal1 {
            display: flex;
            gap: 20px;
            margin-bottom: 20px;
        }

        .form-group-horizontal1 .form-group1 {
            flex: 1;
        }

        label {
            font-weight: bold;
            margin-bottom: 5px;
            display: block;
        }

        input[type="text"],
        textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            font-size: 16px;
        }

        textarea {
            resize: vertical;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        .form-group select {
            width: 100%;
            padding: 8px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        .form-group select:focus {
            border-color: #66afe9;
            outline: none;
            box-shadow: 0 0 8px rgba(102, 175, 233, 0.6);
        }

        .submit-button {
            display: inline-block;
            padding: 10px 20px;
            font-size: 16px;
            color: #fff;
            background-color: #007bff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            text-align: center;
            text-decoration: none;
        }

        .submit-button:hover {
            background-color: #0056b3;
        }

        header, footer {
            width: 100%;
            text-align: center;
            padding: 10px 0;
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
            color: white;
        }

        header {
            background-image: url('{{ asset('public/panel/images/header_img/' . $header->header) }}');
            height: 70px; /* Adjust height as needed */
        }

        footer {
            background-image: url('{{ asset('public/panel/images/footer_img/' . $footer->footer) }}');
            height: 70px; /* Adjust height as needed */
            /* position: fixed; */
            bottom: 0px;
        }

        .watermark {
            position: fixed;
            top: 50%;
            left: 50%;
            width: 100%;
            height: 100%;
            background: url('{{ asset('public/panel/images/watermark_img/' . $watermark->watermark) }}') no-repeat center center;
            background-size: contain;
            opacity: 0.1;
            transform: translate(-50%, -50%) rotate(-45deg);
            z-index: -1;
            pointer-events: none;
        }

        main {
            padding: 20px;
            margin-bottom: 100px; /* Space for footer */
        }
    </style>
</head>

<body>

    <div class="watermark"></div>

    <header>
        {{-- <img src="{{ asset('public/panel/images/header_img/' . $header->header) }}" alt="Header Image"> --}}
        {{-- <h1>Header Content</h1> --}}
    </header>

    <main>
        <div class="form-group-horizontal1">
            <div class="form-group1">
                <label for="title_of_story">Title &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: {{$script->title_of_paper ?? ''}} </label>
            </div><br>
            <div class="form-group1">
                <label for="email">Email Id &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: {{$script->email ?? ''}}</label>
            </div>
        </div>

        <div class="form-group-horizontal1">
            <div class="form-group1">
                <label for="affiliation">Affiliation &nbsp;: {{$script->affiliation ?? ''}}</label>
            </div>
            <div class="form-group1">
                <label for="author_name">Author Name &nbsp;&nbsp;: {{$script->author_name ?? ''}}</label>
            </div>
        </div>

        <div class="form-group">
            <label for="category">Category &nbsp;&nbsp;&nbsp;: {{$script->category->category_name ?? ''}}</label>
        </div>

        <label>Abstract:</label>
        <p>
           {!! $script->abstract ?? '' !!}
        </p>

        <label>Keywords:</label>
        <p>
            {!! $script->keyword ?? '' !!}
        <p>

        {{-- <div style="margin-top: 6%;"> --}}
            <label>Introduction:</label>
            <p>
                {!! $script->introduction ?? '' !!}
            </p>
        {{-- </div> --}}

        {{-- <div style="margin-top: 5%;"> --}}
            <label>Results:</label>
            <p>
                {!! $script->results ?? '' !!}
            </p>
        {{-- </div> --}}

        <label>Discussion:</label>
        <p>
            {!! $script->discussion ?? '' !!}
        </p>

        <label>Materials and Methods:</label>
        <p>
            {!! $script->materials_and_methods ?? '' !!}
        </p>

        <label>Conclusion:</label>
        <p>
            {!! $script->conclusion ?? '' !!}
        </p>

        <label>Abbreviations:</label>
        <p>
            {!! $script->abbreviations ?? '' !!}
        </p>

        <label>Declarations:</label>
        <p>
            {!! $script->declarations ?? '' !!}
        </p>

        <label>Conflict of Interests:</label>
        <p>
            {!! $script->conflict_of_interests ?? '' !!}
        </p>

        <label>Funding:</label>
        <p>
            {!! $script->funding ?? '' !!}
        </p>

        <label>Acknowledgment:</label>
        <p>
            {!! $script->acknowledgment ?? '' !!}
        </p>

        <label>References:</label>
        <p>
            {!! $script->references ?? '' !!}
        </p>
    </main>

    <footer>
        {{-- <img src="{{ asset('public/panel/images/footer_img/' . $footer->footer) }}" alt="Footer Image"> --}}
        {{-- <p>Footer Content</p> --}}
    </footer>

</body>

</html>
