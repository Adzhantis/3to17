<html>
    <head>
        <title>Перевод чисел</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <link rel="stylesheet" type="text/css" href="style.css"> 
        <link rel="stylesheet" type="text/css" href="bootstrap.css"> 

        <link rel="stylesheet" href="//code.jquery.com/ui/1.11.0/themes/smoothness/jquery-ui.css">
        <script src="//code.jquery.com/jquery-1.10.2.js"></script>
        <script src="//code.jquery.com/ui/1.11.0/jquery-ui.js"></script>
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
//           </script>
    </head>
    <body> 

        <div id="input">
            <input class="ui-corner-all" name="value" type="text" id="value" placeholder=" you can input 0 1 2"><br>
            <input class="btn btn-primary" type="submit" id="button" value="3 to 17"><br>
        </div>
        <div id="result">

        </div>
    </body>
</html>
