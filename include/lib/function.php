<?php
function base_url($script_path) {
  // add the leading '/' if not present
  if($script_path[0] != '/') {
    $script_path = "/" . $script_path;
  }
  return PROJECT_PATH . $script_path;
}

function view($template){
  //if(is_file($template)){
    $result = include("template/$template");
  //}
  return $result;
}
function redirect($new_location){header("Location:" . $new_location);exit;}
function redirect_location($location){ return "<script>window.open('$location'','_self')</script>";exit;}
function pretty_date($date){ return date("M d, Y h:i A",strtotime($date));}
// Mysql prep
function mysql_prep($string){global $db;$escaped_string = mysqli_real_escape_string($db, $string);return $escaped_string;}
// HTML
if ( ! function_exists('html')){
function html($arg){
   $doctypes = array(
					'xhtml11'=> '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">',
					'xhtml1-strict'	=> '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">',
					'xhtml1-trans'	=> '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">',
					'xhtml1-frame'	=> '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Frameset//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-frameset.dtd">',
					'html5'			=> '<!DOCTYPE html>',
					'html4-strict'	=> '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">',
					'html4-trans'	=> '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">',
					'html4-frame'	=> '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN" "http://www.w3.org/TR/html4/frameset.dtd">'
					);
    return $doctypes[$arg];

}
}

// Special Character
if ( ! function_exists('specialCharacter')){
function specialcharacter($text){
	return	htmlspecialchars($text,ENT_QUOTES,'UTF-8');
}
}

// Limit String
if ( ! function_exists('except')){
function except($text, $min_length, $max_length){

echo substr($text, $min_length,$max_length);

}
}

if ( ! function_exists('style')){
function style($styles){

    return '<link rel="stylesheet" href="'.BASE_URL_STYLES.$styles.'.css" media="all">';
}
}

if ( ! function_exists('script')){
function script($scripts){
    return '<script src="'.BASE_URL_SCRIPTS.$scripts.'.js" type="text/javascript"></script>';
}
}
// check login

function checkLogin(){

 if(!isset($_SESSION['logged_in']) === false){
	return header('location:'. BASE_URL.'index.php');
}
}

// Session MSG
if(!function_exists('message')){
function message(){
if(isset($_SESSION["message"])){
	$output = "<div class=\"form-message correct\" id=\"msg\">";
$output .= htmlentities($_SESSION["message"]);
$output .= "</div>";

// clear message after use
$_SESSION["message"] = null;
return $output;
}
}
}

//logged in function

if(!function_exists('logged_in')){
function logged_in($redirect){

if(!isset($_SESSION['logged_in'])){
	  return "<script>location.assign('$redirect')</script>";

        }

}

}

// Print_r Debug
if(!function_exists('pr')){
	function pr($debug){
		echo "<pre>";
		print_r($debug);
		echo "</pre>";

	}
}

// var_dump Debug
if(!function_exists('vd')){
	function vd($debug){
		echo "<pre>";
		var_dump($debug);
		echo "</pre>";

	}
}

// mysqli Database Close connection

if(!function_exists('mysqliClose')){
	function mysqliClose($connection){
		global $connection;
		if(isset($connection)){
	//$mysqli->close;
	 $connection->close;
}
return $connection;
		}
	}





function convertNumber($number) {

    $hyphen      = '-';
    $conjunction = ' and ';
    $separator   = ', ';
    $negative    = 'negative ';
    $decimal     = ' point ';
    $dictionary  = array(
        0                   => 'zero',
        1                   => 'one',
        2                   => 'two',
        3                   => 'three',
        4                   => 'four',
        5                   => 'five',
        6                   => 'six',
        7                   => 'seven',
        8                   => 'eight',
        9                   => 'nine',
        10                  => 'ten',
        11                  => 'eleven',
        12                  => 'twelve',
        13                  => 'thirteen',
        14                  => 'fourteen',
        15                  => 'fifteen',
        16                  => 'sixteen',
        17                  => 'seventeen',
        18                  => 'eighteen',
        19                  => 'nineteen',
        20                  => 'twenty',
        30                  => 'thirty',
        40                  => 'fourty',
        50                  => 'fifty',
        60                  => 'sixty',
        70                  => 'seventy',
        80                  => 'eighty',
        90                  => 'ninety',
        100                 => 'hundred',
        1000                => 'thousand',
        1000000             => 'million',
        1000000000          => 'billion',
        1000000000000       => 'trillion',
        1000000000000000    => 'quadrillion',
        1000000000000000000 => 'quintillion'
    );

    if (!is_numeric($number)) {
        return false;
    }

    if (($number >= 0 && (int) $number < 0) || (int) $number < 0 - PHP_INT_MAX) {
        // overflow
        trigger_error(
            'convert_number_to_words only accepts numbers between -' . PHP_INT_MAX . ' and ' . PHP_INT_MAX,
            E_USER_WARNING
        );
        return false;
    }

    if ($number < 0) {
        return $negative . convertNumber(abs($number));
    }

    $string = $fraction = null;

    if (strpos($number, '.') !== false) {
        list($number, $fraction) = explode('.', $number);
    }

    switch (true) {
        case $number < 21:
            $string = $dictionary[$number];
            break;
        case $number < 100:
            $tens   = ((int) ($number / 10)) * 10;
            $units  = $number % 10;
            $string = $dictionary[$tens];
            if ($units) {
                $string .= $hyphen . $dictionary[$units];
            }
            break;
        case $number < 1000:
            $hundreds  = $number / 100;
            $remainder = $number % 100;
            $string = $dictionary[$hundreds] . ' ' . $dictionary[100];
            if ($remainder) {
                $string .= $conjunction . convertNumber($remainder);
            }
            break;
        default:
            $baseUnit = pow(1000, floor(log($number, 1000)));
            $numBaseUnits = (int) ($number / $baseUnit);
            $remainder = $number % $baseUnit;
            $string = convertNumber($numBaseUnits) . ' ' . $dictionary[$baseUnit];
            if ($remainder) {
                $string .= $remainder < 100 ? $conjunction : $separator;
                $string .= convertNumber($remainder);
            }
            break;
    }

    if (null !== $fraction && is_numeric($fraction)) {
        $string .= $decimal;
        $words = array();
        foreach (str_split((string) $fraction) as $number) {
            $words[] = $dictionary[$number];
        }
        $string .= implode(' ', $words);
    }

    return $string;
}

	function convertGroup($index)
	{
		switch ($index)
		{
			case 11:
				return " decillion";
			case 10:
				return " nonillion";
			case 9:
				return " octillion";
			case 8:
				return " septillion";
			case 7:
				return " sextillion";
			case 6:
				return " quintrillion";
			case 5:
				return " quadrillion";
			case 4:
				return " trillion";
			case 3:
				return " billion";
			case 2:
				return " million";
			case 1:
				return " thousand";
			case 0:
				return "";
		}
	}

	function convertThreeDigit($digit1, $digit2, $digit3)
	{
		$buffer = "";

		if ($digit1 == "0" && $digit2 == "0" && $digit3 == "0")
		{
			return "";
		}

		if ($digit1 != "0")
		{
			$buffer .= convertDigit($digit1) . " hundred";
			if ($digit2 != "0" || $digit3 != "0")
			{
				$buffer .= " and ";
			}
		}

		if ($digit2 != "0")
		{
			$buffer .= convertTwoDigit($digit2, $digit3);
		}
		else if ($digit3 != "0")
		{
			$buffer .= convertDigit($digit3);
		}

		return $buffer;
	}

	function convertTwoDigit($digit1, $digit2)
	{
		if ($digit2 == "0")
		{
			switch ($digit1)
			{
				case "1":
					return "ten";
				case "2":
					return "twenty";
				case "3":
					return "thirty";
				case "4":
					return "forty";
				case "5":
					return "fifty";
				case "6":
					return "sixty";
				case "7":
					return "seventy";
				case "8":
					return "eighty";
				case "9":
					return "ninety";
			}
		} else if ($digit1 == "1")
		{
			switch ($digit2)
			{
				case "1":
					return "eleven";
				case "2":
					return "twelve";
				case "3":
					return "thirteen";
				case "4":
					return "fourteen";
				case "5":
					return "fifteen";
				case "6":
					return "sixteen";
				case "7":
					return "seventeen";
				case "8":
					return "eighteen";
				case "9":
					return "nineteen";
			}
		} else
		{
			$temp = convertDigit($digit2);
			switch ($digit1)
			{
				case "2":
					return "twenty-$temp";
				case "3":
					return "thirty-$temp";
				case "4":
					return "forty-$temp";
				case "5":
					return "fifty-$temp";
				case "6":
					return "sixty-$temp";
				case "7":
					return "seventy-$temp";
				case "8":
					return "eighty-$temp";
				case "9":
					return "ninety-$temp";
			}
		}
	}

	function convertDigit($digit)
	{
		switch ($digit)
		{
			case "0":
				return "zero";
			case "1":
				return "one";
			case "2":
				return "two";
			case "3":
				return "three";
			case "4":
				return "four";
			case "5":
				return "five";
			case "6":
				return "six";
			case "7":
				return "seven";
			case "8":
				return "eight";
			case "9":
				return "nine";
		}
	}



	function encode_email($e) {
		$output = '';
		for ($i = 0; $i < strlen($e); $i++) { $output .= '&#'.ord($e[$i]).';'; }
		return $output;
	}

	//generates a random password which contains all letters (both uppercase and lowercase) and all numbers
function generatePassword($length) {
	$password='';
	for ($i=0;$i<=$length;$i++) {
		$chr='';
		switch (mt_rand(1,3)) {
			case 1:
				$chr=chr(mt_rand(48,57));
				break;
			case 2:
				$chr=chr(mt_rand(65,90));
				break;
			case 3:
				$chr=chr(mt_rand(97,122));

		}
		$password.=$chr;
	}
	return $password;
	}

function validEmailAddress($email_address)
	{
		if(strpos($email_address, " ") > 0)
			return false;

		//return preg_match("^(([\w-]+\.)+[\w-]+|([a-zA-Z]{1}|[\w-]{2,}))@((([0-1]?[0-9]{1,2}|25[0-5]|2[0-4][0-9])\.([0-1]?[0-9]{1,2}|25[0-5]|2[0-4][0-9])\.([0-1]?[0-9]{1,2}|25[0-5]|2[0-4][0-9])\.([0-1]?[0-9]{1,2}|25[0-5]|2[0-4][0-9])){1}|([a-zA-Z]+[\w-]+\.)+[a-zA-Z]{2,4})$^", $email_address);

		return filter_var($email_address, FILTER_VALIDATE_EMAIL);
	}

	function validDate($dt)
	{
		if(trim($dt) == "")
			return false;

		$d = explode("/", $dt);
		if(sizeof($d) != 3)
			return false;

		if(!ctype_digit($d[0]) || !ctype_digit($d[1]) || !ctype_digit($d[2]))
			return false;

		return checkdate($d[1], $d[0], $d[2]);
	}

	function dbinput($string, $allow_html = false)
	{
		global $db;

		if($allow_html == false)
			$string = strip_tags($string);

		if (function_exists('mysql_real_escape_string'))
			return mysqli_real_escape_string($db,$string);
		elseif (function_exists('mysql_escape_string'))
			return mysqli_real_escape_string($db,$string);

		return addslashes($string);
	}

	function dboutput($string)
	{
		return stripslashes($string);
	}

	function dbhtmlinput($string)
	{
		$output = str_replace("'","\'",$string);
		$output = str_replace(",","\,",$output);
		return $output;
	}

	function not_null($value)
	{
		if (is_array($value))
		{
			if (sizeof($value) > 0)
				return true;
			else
				return false;
		}
		else
		{
			if ((is_string($value) || is_int($value)) && ($value != '') && ($value != 'NULL') && (strlen(trim($value)) > 0))
				return true;
			else
				return false;
		}
	}

	function replace_quote($string)
	{
		return str_replace('"', '&quot;', $string);
	}


function get_template_directory_uri(){
  //if(selfURL() !=''){
    return BASE_URL;
  //}else{
   // return BASE_URL;
  //}

}

function get_image_directory_uri(){
	return BASE_URL_UPLOAD;
}

function display_errors( $error_array ) {
  echo "<p class=\"errors\">";
  echo "Please review the following fields:<br />";
  foreach ( $error_array as $error ) {
    echo " - " . $error . " Required <br />";
  }
  echo "</p>";
}

function getRealIpAddr()
{
    if (!empty($_SERVER['HTTP_CLIENT_IP']))   //check ip from share internet
    {
      $ip=$_SERVER['HTTP_CLIENT_IP'];
    }
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))   //to check ip is pass from proxy
    {
      $ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
    }
    else
    {
      $ip=$_SERVER['REMOTE_ADDR'];
    }
    return $ip;
}

function get_ip_address() {
    $ip_keys = array('HTTP_CLIENT_IP', 'HTTP_X_FORWARDED_FOR', 'HTTP_X_FORWARDED', 'HTTP_X_CLUSTER_CLIENT_IP', 'HTTP_FORWARDED_FOR', 'HTTP_FORWARDED', 'REMOTE_ADDR');
    foreach ($ip_keys as $key) {
        if (array_key_exists($key, $_SERVER) === true) {
            foreach (explode(',', $_SERVER[$key]) as $ip) {
                // trim for safety measures
                $ip = trim($ip);
                // attempt to validate IP
                if (validate_ip($ip)) {
                    return $ip;
                }
            }
        }
    }
    return isset($_SERVER['REMOTE_ADDR']) ? $_SERVER['REMOTE_ADDR'] : false;
}

function validate_ip($ip)
{
    if (filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4 | FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE) === false) {
        return false;
    }
    return true;
}



 ?>
