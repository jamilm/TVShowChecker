<?php
    //session_start();
    function returnStatus($name)
    {
        if ($name == '')
        {
            apologize("Please Enter a Title");
            return;
        }
        $urlName = getURL($name);
        $xmlID = simplexml_load_file($urlName);
        if ($xmlID === false)
        {
            apologize("Connection to server failed");
            return false;
        }
        $showID = verifyShow($xmlID, $name);
        if ($showID === false)
        {
            apologize("Invalid Title");
            return false;
        }
        $url = "http://services.tvrage.com/feeds/episode_list.php?sid=" . $showID;
        $xml = simplexml_load_file($url);
        if ($xml === false)
        {
            apologize("Something Went Wrong!");
            return false;
        }
        returnDate($xml); 
    }
    
    function getURL($showName)
    {
        $showName = str_replace (" ","+" ,$showName);
        $showName = "http://services.tvrage.com/feeds/search.php?show=" . $showName;
        return $showName;
    }
    
    function verifyShow($xml, $name)
    {
        $showName = $xml->show->name;
        if (strcasecmp($showName, $name) == 0)
            return $xml->show->showid;
        else
        {
            apologize("Invalid Title");
            return false;
        }
    }
    
    function returnDate($xml)
    {
        //Rewrite to work backwards
        $today = date("m/d/y");
        $todayU = time();
        $found = false;
        for ($i = 0; $i < sizeof($xml->Episodelist->Season); $i++)
            for ($j = 0; $j < sizeof($xml->Episodelist->Season[$i]->episode); $j++)
            {
                $dateU = strtotime($xml->Episodelist->Season[$i]->episode[$j]->airdate);
                $date = date('m/d/y', $dateU);
                if ($date == $today)
                {
                    message('YES', 1);
                    $found = true;
                    break 2;
                }
                
                elseif ($dateU > $todayU)
                {
                    message($date, 2);
                    $found = true;
                    break 2;
                }
            }
        if ($found == false)
            apologize("No date found for today or in the future. The show is probaby off air :(");    
    }
    
    function apologize($message)
    {
        message($message, 3);
    }
    
    function message($message, $state)
    {
        if ($state == 1)
            $_SESSION['message'] = "A new episode of " . $_GET['showname'] . " is playing today! :)";
        elseif ($state == 2)
            $_SESSION['message'] = 'Sorry. The next new episode of ' . $_GET['showname'] . ' is playing on ' . $message;
        else 
            $_SESSION['message'] = $message;
        echo '<script>colorFade(' . $state . ');</script>';
    } 

?>

