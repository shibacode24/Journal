<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Manuscript Review Response</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            margin: 20px;
        }
        .container {
            max-width: 800px;
            margin: auto;
        }
        h1, h2 {
            color: #333;
        }
        p {
            margin: 0 0 1em 0;
        }
        .suggestion {
            margin-left: 20px;
            color: #555;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Review of Manuscript {{$menuscript_data->menuscript_title}}</h1>
        <p>Dear {{$user_data->first_name}} {{$user_data->last_name}},</p>

        <p>I hope this message finds you well.</p>

        <p>I have completed my review of your manuscript titled "<strong>{{$menuscript_data->menuscript_title}}</strong>" submitted to <strong>Pratibha Journal</strong>. Here are my comments and suggestions:</p>

        <h2>Comments:</h2>
       <p>{!!$data['reviewer_remark']!!}</p>

        {{-- <h2>Specific Comments:</h2>
        <ul>
            <li><strong>Title and Abstract:</strong>
                <p>The title accurately reflects the content of the manuscript. The abstract is concise and provides a good summary of the research. However, consider including <span class="suggestion">[specific suggestion, if any]</span>.</p>
            </li>
            <li><strong>Introduction:</strong>
                <p>The introduction provides sufficient background and clearly states the research question. A minor improvement could be made by <span class="suggestion">[specific suggestion, e.g., adding more recent references, clarifying a point]</span>.</p>
            </li>
            <li><strong>Methods:</strong>
                <p>The methodology is sound and well-detailed. I suggest <span class="suggestion">[specific suggestion, e.g., clarifying a certain procedure, including more details on sample size]</span>.</p>
            </li>
            <li><strong>Results:</strong>
                <p>The results are clearly presented and supported by appropriate statistical analyses. Consider <span class="suggestion">[specific suggestion, e.g., including a table/figure, explaining a result in more detail]</span>.</p>
            </li>
            <li><strong>Discussion:</strong>
                <p>The discussion interprets the results effectively and relates them to the research question and existing literature. It would be beneficial to <span class="suggestion">[specific suggestion, e.g., discuss the implications of a certain finding, address a potential limitation]</span>.</p>
            </li>
            <li><strong>Conclusion:</strong>
                <p>The conclusion summarizes the key findings and their relevance. Consider <span class="suggestion">[specific suggestion, e.g., emphasizing a key point, suggesting future research]</span>.</p>
            </li>
        </ul> --}}

        {{-- <p>I appreciate the opportunity to review your work. Please do not hesitate to contact me if you have any questions or need further clarification.</p> --}}

        <p>Best regards,</p>
        <p>Pratibha Journal</p>
    </div>
</body>
</html>
