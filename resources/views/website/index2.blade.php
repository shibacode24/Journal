{{-- <!DOCTYPE html>
<html>
<head>
    <title>Search Example</title>
    <style>
        .highlight {
            background-color: yellow;
        }
    </style>
</head>
<body>
    <h1>Search Example</h1>

    <form id="search-form">
        <input type="text" id="search-term" placeholder="Search...">
        <button type="submit">Search</button>
    </form>

    <div id="content">
        <p>This is an example paragraph. You can search for characters or strings within this text.</p>
        <p>Another paragraph for search functionality demonstration.</p>
    </div>

    <script>
        document.getElementById('search-form').addEventListener('submit', function(e) {
            e.preventDefault();

            // Get the search term
            const searchTerm = document.getElementById('search-term').value;

            // Get the content
            const content = document.getElementById('content').innerHTML;

            // Create a regex to search for the term, case-insensitive
            const regex = new RegExp(`(${searchTerm})`, 'gi');

            // Replace the matched term with a span that has a highlight class
            const newContent = content.replace(regex, '<span class="highlight">$1</span>');

            // Update the content with the new highlighted text
            document.getElementById('content').innerHTML = newContent;
        });
    </script>
</body>
</html> --}}


<!DOCTYPE html>
<html>
<head>
    <title>Search Example</title>
</head>
<body>
    <h1>Search Example</h1>

    <form id="search-form">
        <input type="text" id="search-term" placeholder="Search...">
        <button type="submit">Search</button>
    </form>

    <div id="content">
        <p>This is an example paragraph. You can search for characters or strings within this text.</p>
        <p>Another paragraph for search functionality demonstration.</p>
    </div>

    <div id="search-results"></div>

    <script>
        document.getElementById('search-form').addEventListener('submit', function(e) {
            e.preventDefault();

            // Get the search term
            const searchTerm = document.getElementById('search-term').value.toLowerCase();

            // Get all paragraphs from the content
            const paragraphs = document.querySelectorAll('#content p');

            // Clear previous search results
            const searchResults = document.getElementById('search-results');
            searchResults.innerHTML = '';

            // Loop through paragraphs and display only those containing the search term
            paragraphs.forEach(paragraph => {
                if (paragraph.textContent.toLowerCase().includes(searchTerm)) {
                    const result = document.createElement('p');
                    result.textContent = paragraph.textContent;
                    searchResults.appendChild(result);
                }
            });

            // If no results found, show a message
            if (searchResults.innerHTML === '') {
                searchResults.innerHTML = '<p>No results found.</p>';
            }
        });
    </script>
</body>
</html>

