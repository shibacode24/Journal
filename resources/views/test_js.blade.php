<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>jQuery Example</title>
    <!-- jQuery CDN -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <style>
        #box {
            width: 200px;
            height: 200px;
            background-color: blue;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <h1>jQuery Example</h1>
    <button id="changeColorBtn">Change Color</button>
    <div id="box"></div>

    <script>
        // jQuery function to change the color of the div
        $(document).ready(function(){
            $("#changeColorBtn").click(function(){
              //  $("#box").css("background-color", "black"); //this is for after click on button change the color
               $("#box").css("background-color", "red").slideUp(1000).slideDown(1000); //this is for after click on button change the color and also up and down the box
              //  $('#box').append('<li>New Item</li>');
               // $('#box').fadeOut();

            });
        });
    </script>
</body>
</html>
