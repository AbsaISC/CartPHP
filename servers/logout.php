<?php
session_start();
session_unset(); 
session_destroy();
echo "<script languaje='Javascript'>
		window.location.href='../';</script>";