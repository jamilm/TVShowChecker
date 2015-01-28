<script src="http://code.jquery.com/jquery-latest.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script>
<script> 
        $(document).ready(function()
        {          
            $("#logo").click(function() 
            {
                $("body").stop().animate({"backgroundColor":"#900"}, 800);
            });

            $("#sec_log").click(function() {
                $("body").stop().animate({"backgroundColor":"#090"}, 800);
            });
        });
        </script>
