<?php
	session_start();
        require'config.php';

			if('staff1' == $_SESSION['username'] OR 'staff2' == $_SESSION['username'] OR 'staff3' == $_SESSION['username']){

                        	include("staff.php");

                        }
                        else
                        include("../webclient/index.php");

?>
