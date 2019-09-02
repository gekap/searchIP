<?php

function validateIP($ip){
	if (filter_var($ip, FILTER_VALIDATE_IP)) {
		return True;
	} else {
		return False;
	}
}


?>
