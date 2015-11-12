
<?php
	if( !isset($_REQUEST['schedule'])){
		switch( date('N') ){
			case 1 :
			case 2 :
			case 3 :
			case 4 :		$_REQUEST['schedule'] = 1;
							break;
							
			case 5 :		$_REQUEST['schedule'] = 2;	
							break;
							
			case 6 :		$_REQUEST['schedule'] = 3;	
							break;
							
			case 7 :		$_REQUEST['schedule'] = 4;	
							break;
		}
	}
?>