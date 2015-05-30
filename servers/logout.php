<?php
session_start();
session_destroy();
echo "<script languaje='Javascript'>
		window.location.href='../index.html';</script>";