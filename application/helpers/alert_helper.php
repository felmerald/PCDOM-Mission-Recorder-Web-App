<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
* class name 	: 	alert_helper
* @param 		:	NULL
* @access 		 	public
* @return 		:	HTML
* @author 		:	felmerald Besario
* Description 	: 	Bootstrap Alert helper choices are alert_success, alert_warning, alert_danger
*/ 
 function ci()
 {
 	return get_instance();
 }
 /**
* @param 		: $data
* @return 		: return an array 
* Description   : used for printing the array in readable format
*/ 
function printA($data)
{
	echo '<pre>';
	print_r($data);
	echo '</pre>';
}
/**
* @param $message : print alert message
* @access public
* Description 	  : show alert color green when success 
* @return 		  :	HTML / bootstrap alert
* TYPE 			  : alert-success, alert-danger, alert-warning, alert-info
*/ 
function alert($type="", $message = "")
{
	$alert = '<div class="alert '.$type.' alert-dismissible fade show" role="alert">
						<strong>'.$message.'</strong> 
 			 			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
 			 				<span aria-hidden="true">&times;</span>
 						</button>
 									 
				</div>'; 
	return $alert;

}
// call alert("type","message");
// call alert("type","message");
// this will get the week and date 
function weekdate()
{
	$current_dayname = date("l");    
	return $date = date("Y-F-d",strtotime('monday this week')).' To '.date("Y-F-d",strtotime("sunday this week")); 
}

// this will get the previous week
function previousweek()
{
	      	$previous_week = strtotime("-1 week +1 day");
			$start_week = strtotime("monday this week",$previous_week);
			$end_week = strtotime("sunday this week",$start_week);

			$start_week = date("Y-M-d",$start_week);
			$end_week = date("Y-M-d",$end_week);

			return $start_week.' To '.$end_week ;
}

/**
 * Returns the number of week in a month for the specified date.
 *
 * @param string $date
 * @return int
 */
function weekOfMonth($date) {
    // estract date parts
    list($y, $m, $d) = explode('-', date('Y-m-d', strtotime($date)));

    // current week, min 1
    $w = 1;

    // for each day since the start of the month
    for ($i = 1; $i <= $d; ++$i) {
        // if that day was a sunday and is not the first day of month
        if ($i > 1 && date('w', strtotime("$y-$m-$i")) == 0) {
            // increment current week
            ++$w;
        }
    }

    // now return
    return $w;
}




     