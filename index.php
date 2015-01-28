<?php 
    session_start();
    include 'functions.php';
    include 'header.php';
?>
    </br>
    </br>
    </br>
    </br>
    <div id="form">
        <form action="index.php" method="get">
            <input type="text" class="text" name="showname" placeholder="TV Show" onfocus="this.placeholder = ''" onblur="this.placeholder = 'TV Show'" >
            <input type="image" id="imgarrow" value="submit" src="images/arrowNG.gif" alt="Enter" onMouseOver="this.src='images/arrowH.gif'" onMouseOut="this.src='images/arrowNG.gif'" onMouseUp="this.src='images/arrowNG.gif'" onMouseDown="this.src='images/arrowP.gif'">
        </form>
    </div>
        <?php
            if(isset($_GET['showname']))
            {
                $varCheck = returnStatus($_GET['showname']);
                if (!isset($_SESSION['message']))
                    apologize("Opps! Something went wrong");
                echo '<div id="message">';
                echo $_SESSION['message'];
                echo "</div></br>";
            }
        ?>
    </div>
    
<?php   
    include 'footer.php';
    session_destroy();  
?>
