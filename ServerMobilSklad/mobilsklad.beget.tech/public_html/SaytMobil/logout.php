<?php
if($_GET['do'] == 'logout')
{
    session_start ();
	unset($_SESSION['asd']);
	session_destroy();
	exit("<script type='text/javascript'>  window.location='http://mobilsklad.beget.tech/'; </script>");
	
        
}
?>