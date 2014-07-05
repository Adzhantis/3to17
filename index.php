<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <link rel="stylesheet" type="text/css" href="style.css"> 
        <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
        <script src="http://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
        <script>
            $(document).ready(function() {
                $('#button').click(function() {
                    ajax();
                })
            })

            function ajax() {
                $.post(
                        '3to17.php',
                        {
                            value: $('#value').val(),
                        },
                        function(data) {
                            $('#result').html(data);
                        }
                );
            }
        </script>
    </head>
    <body> 
        <input name="value" type="text" id="value" placeholder="0 1 2"><br>
        <input type="submit" id="button" value="3 to 17"><br>
        <div id="result">
        </div>
    </body>
</html>
