<!DOCTYPE html>
<html>
    <head>
		<?php include_once("analyticstracking.php") ?>
        <title>Is It On Tonight</title>
        <link rel="stylesheet" type="text/css" href="styles.css">
        <script type="text/javascript" src="colorfade.js"></script>
        <script src="http://code.jquery.com/jquery-latest.js"></script>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"></script>
        <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script>
        <script>
            //$("body").stop().animate({"backgroundColor":"#34c8c7"}, 800);
            function colorFade(code)
            {
                $(document).ready(function()
                {          
                    if (code == 1)  
                        $("body").stop().animate({"backgroundColor":"#01DF01"}, 800);
                    else if (code == 2)
                        $("body").stop().animate({"backgroundColor":"#DBA901"}, 800);
                    else
                        $("body").stop().animate({"backgroundColor":"#DF0101"}, 800);
                });
            }
        </script>
    </head>
    <body>
        
