<?php
	function randomCode($length=5) {
	   /* Only select from letters and numbers that are readable - no 0 or O etc..*/
	   $characters = "23456789ABCDEFHJKLMNPRTVWXYZ";
	 
	   for ($p = 0; $p < $length; $p++) 
	   {
		   $string .= $characters[mt_rand(0, strlen($characters)-1)];
	   }
	 
	   return $string;	 
	}
?>