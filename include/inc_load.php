<?php
if(basename(__FILE__) == basename($_SERVER['PHP_SELF'])){exit();}
ob_start();
#ini_set("session.cookie_httponly", 1);
// Session Start

ini_set('session.use_only_cookies',0);
ini_set('session.use_trans_sid',1);
#ini_set("session.cookie_httponly", 1);
#ini_set('session.save_path',realpath(dirname(__FILE__).'/session/'));
session_start();
// display error for production
ini_set('display_errors', 'on');
error_reporting(E_ALL & ~E_DEPRECATED & ~E_STRICT);
#error_reporting (0);
#ini_set('display_error', '0');
define("APP_ROOT", dirname(__FILE__));
define("DS", DIRECTORY_SEPARATOR );
define("PROJECT_PATH", dirname(APP_ROOT));
define("CONTENT", PROJECT_PATH.DS.'content');

define("INCLUDE_PATH", PROJECT_PATH .DS.'include');
define("PRIVATE_PATH", INCLUDE_PATH .DS.'lib');
define('MAILER', PRIVATE_PATH.DS.'mailer');
// Base URL Setting Front
#define('BASE_URL', "http://localhost/riazeda");

define("DIR_ADMINUSERS", "assets/adminuserphoto/");
define("DIR_SETTINGS", "assets/settings/");
define('BASE_URL_STYLES',"/assets/css/");
define('BASE_URL_IMAGES', "/assets/img/");
define('BASE_URL_SCRIPTS', "/assets/js/");
define('BASE_URL_UPLOAD',"/admin/");
define('VIEW','content/themes/default/');
define("DIR_MODULES", "modules/");
    define("MANDATORY", "<span class=\"mandatory noPrint\">*</span>");
    define("THUMB_WIDTH", 72); //In Pixel
    define("THUMB_HEIGHT", 72); //In Pixel
    define("INDENT", "&nbsp;&nbsp;&nbsp;");
    define("MAX_IMAGE_SIZE", 20480); //In KB

    define("DIR_BRANDS_IMAGES", "assets/brands-images/");
    define("DIR_CATEGORY_BANNERS", "assets/category-banners/");
    define("DIR_CLIENT_BANNERS", "assets/client-banner/");
    define("DIR_PRODUCTS_IMAGES", "assets/product-images/");
    define("DIR_PAGE_BANNERS", "assets/infopage-banner/");
    define("DIR_LOGOS", "assets/logo/");
    define("DIR_SLIDERS", "assets/website-sliders/");
    define("DIR_THUMBNAILS", "assets/thumbnails/");
    define("DIR_WEBSITE_BANNERS", "assets/website-banners/");
    define("DIR_PAYMENT_METHODS", "assets/payment-methods/");
    define("DIR_MULTIMEDIA_IMAGES", "assets/multimedia-images/");
    define("DIR_SOCIALMEDIA_IMAGES", "assets/socialmedia-images/");
    define("DIR_NEWSLETTERS", "assets/newsletters/");
    define("DIR_CLIENTUSERS", "assets/clientuserphoto/");
    define("DIR_EMPLOYEEUSERS", "assets/employeeuserphoto/");
    define("DIR_ORDERSDOC", "assets/ordersdocuments/");
    define("DIR_INTERNALORDERSDOC", "assets/internalordersdocuments/");
    define("DIR_TEMPDOC", "admin/assets/tempdocuments/");

    $_IMAGE_ALLOWED_TYPES=array("jpg","JPG", "jpeg","JPEG", "gif", "png","PNG","psd","ai","xls","xlsx","csv","doc","docx","ppt","pptx","pdf","zip","rar","txt","html","css","js");
    $_NEWSLETTER_ALLOWED_TYPES=array("html", "htm", "HTML");
    $_PACKAGE_TYPES=array("-- Not Selected --", "Corporate", "Individual");
    $_USERS_TYPES=array("-- Not Selected --", "Corporate", "Individual");
    $_CATEGORY_TYPES=array("-- Not Selected --", "Company Profile", "Salary Report", "Feedback");
    $_FORM_TYPES=array("-- Not Selected --", "Corporate", "Individual");
    $_AD=array("Deactive", "Active");
    $_OPEN_IN=array("_self", "_blank");
    $_INPUT_TYPE=array("","Radio", "Selection", "Textbox");
    $_QUESTION_MODULES=array("","Countries","Industries","Educations","Experiances", "Occupation", "Skills", "KSA Cities", "Spciality (Majors)", "Traning Courses");
    $_MONTHS = array("","January","February","March","April","May","June","July","Augest","September","October","November","December");
    $_EXP_MONTH = array("","1","2","3","6","9","12","24","48");
    $_MARK_AS = array("", "Gender", "Grade","Company Size");
    $_MARK_AS_COMPANY = array("", "Company Size", "Industry", "KSA City");
    $_GENDER = array("", "Male", "Female");
    $_ADS_POSITION = array("", "Header", "Sidebar");
    $_AD_FILE_NAMES = array("", array("Main Page","Index.php"), array("Dashboard","Dashboard.php"), array("Pages","Page.php"), array("Login","Login.php"),
                        array("Registration","Registration.php"),array("404","404.php"), );
    $_INSTITUTE_TYPE = array("", "College/University", "Vocational/Technical", "Other");
    $_MAJOR_TYPES = array("", "Scientific", "Non Scientific");
    $_MAJOR_TYPES_UNIVERSITY = array("", "Normal", "Vocational");
    $_QUESTION_MODULES_CORPORATE = array("","Industries", "KSA Cities", "How old is your company", "How many Branchs","How long to fill position (Time to Fill)","How long to join position (Time to Join)","How do you rate your Salary in your industry");
    $_MISC_TYPE=array("Heading", "Message", "HTML", "Image");
    $_EXCLUDEED_FILES = array("--Index.php","Blank.php","BuyPackage.php","BuyUsers.php","CompanyProfile(WithoutModules).php","CompanyProfile1.php","CorporateForm.php","CorporateUsers.php","Countries.php","Dashboard2.php","Faqs.php","Header1.php","IndividualForm.php","IndividualSalaryReport(02-05-14).php","IndividualSalaryReport-backup(20-04-14).php","IndividualUsers.php","Industries.php","Institutes.php","Logout.php","Majors.php","NationalCategories.php","News.php","QuestionCategories.php","Questions.php","Sidebar.php","buy_package.php","buy_report_corporate.php","chart.php","check.php","check_user_login.php","circles.php","display_image.php","form.php","index--.php","index2.php","inner.php","inquiries.php","ipnac.php","ipnc.php","ipnlistener.php","ipnp.php","ipnpa.php","ipnu.php","print_session.php","profile_check.php","profile_indicator.php","question_rivision---.php","question_rivision--.php","report1.php","report2.php","report___.php","rivision(WithoutAnswer).php","rivision(WithoutSubAnswer).php","s.php","salary_report1.php","show_cities.php","skill_details.php","test.php","thumbnail_generator.php","up.php","user_credits.php","user_info.php","user_reports_display.php","user_side_bar.php","view_list.php","view_salary_report-old.php","view_salary_report-test.php","view_salary_report_test.php");

// Base URL Setting Front
#define('BASE_URL', "http://localhost/riazeda");
#define("DIR_ADMINUSERS", "assets/adminuserphoto/");
#define("DIR_SETTINGS", "assets/settings/");
#define('BASE_URL_STYLES',BASE_URL ."/assets/css/");
#define('BASE_URL_IMAGES', BASE_URL."/assets/img/");
#define('BASE_URL_SCRIPTS', BASE_URL."/assets/js/");
#define('BASE_URL_UPLOAD', BASE_URL."/admin/");
#define('VIEW','template/');
if(USE_THEMES === TRUE){
define("THEMES", CONTENT.DS.'themes');
}
$is_included = get_included_files();
$is_required= get_required_files();

mb_internal_encoding("UTF-8");
mb_http_input( "UTF-8" );
mb_http_output( "UTF-8" );



// Database Setting
require  PRIVATE_PATH.DS. 'db_functions.php';

// FUNCTION Query
require PRIVATE_PATH.DS.'function_query.php';

// BASIC Function Setting
require PRIVATE_PATH.DS.'function.php';

// BASIC Template Settings
require  PRIVATE_PATH.DS.'/init.php';

require  PRIVATE_PATH.DS.'/ipblock.php';

require PRIVATE_PATH.DS.'/plugin.php';

require PRIVATE_PATH.DS.'/formatting.php';

#require PRIVATE_PATH.DS.'/class-wp-hook.php';

require PRIVATE_PATH.DS.'/shortcodes.php';

require  PROJECT_PATH.DS.'/mail.php';

if(is_file(MAILER.DS."PHPMailerAutoload.php")){
require_once MAILER.DS.'PHPMailerAutoload.php';
}else{
   echo "please check the mailer configure files";
}


function mailing_registration($fromAddress,$fromName,$addAddress,$name,$password,$hash){
//Create a new PHPMailer instance
date_default_timezone_set('Asia/Karachi');
$mail = new PHPMailer;

//Tell PHPMailer to use SMTP
$mail->isSMTP();

//Enable SMTP debugging
// 0 = off (for production use)
// 1 = client messages
// 2 = client and server messages
#$mail->SMTPDebug = 2;

//Ask for HTML-friendly debug output
$mail->Debugoutput = MAIL_TYPE;

//Set the hostname of the mail server
$mail->Host = MAIL_HOST;  // Specify main and backup SMTP servers
// use
// $mail->Host = gethostbyname('smtp.gmail.com');
// if your network does not support SMTP over IPv6

//Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
$mail->Port = MAIL_PORT;

//Set the encryption system to use - ssl (deprecated) or tls
$mail->SMTPSecure = 'tls';

//Whether to use SMTP authentication
$mail->SMTPAuth = true;

//Username to use for SMTP authentication - use full email address for gmail
$mail->Username = MAIL_USERNAME;                 // SMTP username

//Password to use for SMTP authentication
$mail->Password = MAIL_PASSWORD;                           // SMTP password

//Set who the message is to be sent from
$mail->setFrom($fromAddress,$fromName);

//Set an alternative reply-to address
$mail->addReplyTo($fromAddress,$fromName);

//Set who the message is to be sent to
$mail->addAddress($addAddress, $name);

//Set the subject line
$mail->Subject = 'Registration | Verification';

//Read an HTML message body from an external file, convert referenced images to embedded,
//convert HTML into a basic plain-text alternative body
#$mail->msgHTML(file_get_contents('contents.html'), dirname(__FILE__));

$mail->msgHTML('<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
  <head>
    <link rel="stylesheet" type="text/css" href="css/app.css">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width">
    <title>'.$mail->Subject.'</title>
  </head>
  <body>
    <span class="preheader"></span>
    <table class="body">
      <tr>
        <td class="center" align="center" valign="top">
          <center data-parsed="">

            <table align="center" class="container header float-center"><tbody><tr><td>
            <table align="center" class="container body-border float-center"><tbody><tr><td>
              <table class="row"><tbody><tr>
                <th class="small-12 large-12 columns first last"><table><tr><th>

                  <table class="spacer"><tbody><tr><td height="32px" style="font-size:32px;line-height:32px;">&#xA0;</td>
                  </tr></tbody></table>

                  <table class="spacer"><tbody><tr><td height="16px" style="font-size:16px;line-height:16px;">&#xA0;</td></tr></tbody></table>

                  <h4> Thanks for signing up!</h4>
                  <p>Your account has been created, you can login with the following credentials after you have activated your account by pressing the below link.</p>

                    <table align="center" class="menu float-center"><tr><td><table><tr>
                      <th class="menu-item float-center">Username: '.$name.'</th>
                      <th class="menu-item float-center">Password: '.$password.'</th>
                      </tr></table></td></tr></table>

                   <p>Please click this link to activate your account:</p>
                   <span style="text-align: center;display: block;" >
                   <a href="'.BASE_URL.'/verify.php?email='.$addAddress.'&hash='.$hash.'">Verify Now</a>
                 </span>

                </th>
<th class="expander">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th></tr></table></th>
              </tr></tbody></table>

              <table class="spacer"><tbody><tr><td height="16px" style="font-size:16px;line-height:16px;">&#xA0;</td></tr></tbody></table>
            </td></tr></tbody></table>

          </center>
        </td>
      </tr>
    </table>

   <div style="display:none; white-space:nowrap; font:15px courier; line-height:0;"> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; </div>
  </body>
</html>

');
#$mail->msgHTML('Thanks for Registration!\n Your account has been created, you can login with the following credentials after you have activated your account by pressing the url below.');

//Replace the plain text body with one created manually
#$mail->AltBody = 'This is a plain-text message body';

//Attach an image file
#$mail->addAttachment('images/phpmailer_mini.png');

//send the message, check for errors
if (!$mail->send()){
    //echo "Mailer Error: " . $mail->ErrorInfo;
} else {
    //echo "Message sent!";
}



}


/* db connection active */
$db = db_connect();

/* errors settings */
$errors = [];

require_once('inc_params.php');
require_once('inc_functions.php');
#require_once('inc_paths.php');

/************ set TIME ZONE Default Setting In Asia/Karachi (NO REMOVE IT) *******/
date_default_timezone_set("Asia/Karachi");
#date_default_timezone_set($time_zone);

$timezones_array = array(
    'Pacific/Midway'       => "(GMT-11:00) Midway Island",
    'US/Samoa'             => "(GMT-11:00) Samoa",
    'US/Hawaii'            => "(GMT-10:00) Hawaii",
    'US/Alaska'            => "(GMT-09:00) Alaska",
    'US/Pacific'           => "(GMT-08:00) Pacific Time (US &amp; Canada)",
    'America/Tijuana'      => "(GMT-08:00) Tijuana",
    'US/Arizona'           => "(GMT-07:00) Arizona",
    'US/Mountain'          => "(GMT-07:00) Mountain Time (US &amp; Canada)",
    'America/Chihuahua'    => "(GMT-07:00) Chihuahua",
    'America/Mazatlan'     => "(GMT-07:00) Mazatlan",
    'America/Mexico_City'  => "(GMT-06:00) Mexico City",
    'America/Monterrey'    => "(GMT-06:00) Monterrey",
    'Canada/Saskatchewan'  => "(GMT-06:00) Saskatchewan",
    'US/Central'           => "(GMT-06:00) Central Time (US &amp; Canada)",
    'US/Eastern'           => "(GMT-05:00) Eastern Time (US &amp; Canada)",
    'US/East-Indiana'      => "(GMT-05:00) Indiana (East)",
    'America/Bogota'       => "(GMT-05:00) Bogota",
    'America/Lima'         => "(GMT-05:00) Lima",
    'America/Caracas'      => "(GMT-04:30) Caracas",
    'Canada/Atlantic'      => "(GMT-04:00) Atlantic Time (Canada)",
    'America/La_Paz'       => "(GMT-04:00) La Paz",
    'America/Santiago'     => "(GMT-04:00) Santiago",
    'Canada/Newfoundland'  => "(GMT-03:30) Newfoundland",
    'America/Buenos_Aires' => "(GMT-03:00) Buenos Aires",
    'Greenland'            => "(GMT-03:00) Greenland",
    'Atlantic/Stanley'     => "(GMT-02:00) Stanley",
    'Atlantic/Azores'      => "(GMT-01:00) Azores",
    'Atlantic/Cape_Verde'  => "(GMT-01:00) Cape Verde Is.",
    'Africa/Casablanca'    => "(GMT) Casablanca",
    'Europe/Dublin'        => "(GMT) Dublin",
    'Europe/Lisbon'        => "(GMT) Lisbon",
    'Europe/London'        => "(GMT) London",
    'Africa/Monrovia'      => "(GMT) Monrovia",
    'Europe/Amsterdam'     => "(GMT+01:00) Amsterdam",
    'Europe/Belgrade'      => "(GMT+01:00) Belgrade",
    'Europe/Berlin'        => "(GMT+01:00) Berlin",
    'Europe/Bratislava'    => "(GMT+01:00) Bratislava",
    'Europe/Brussels'      => "(GMT+01:00) Brussels",
    'Europe/Budapest'      => "(GMT+01:00) Budapest",
    'Europe/Copenhagen'    => "(GMT+01:00) Copenhagen",
    'Europe/Ljubljana'     => "(GMT+01:00) Ljubljana",
    'Europe/Madrid'        => "(GMT+01:00) Madrid",
    'Europe/Paris'         => "(GMT+01:00) Paris",
    'Europe/Prague'        => "(GMT+01:00) Prague",
    'Europe/Rome'          => "(GMT+01:00) Rome",
    'Europe/Sarajevo'      => "(GMT+01:00) Sarajevo",
    'Europe/Skopje'        => "(GMT+01:00) Skopje",
    'Europe/Stockholm'     => "(GMT+01:00) Stockholm",
    'Europe/Vienna'        => "(GMT+01:00) Vienna",
    'Europe/Warsaw'        => "(GMT+01:00) Warsaw",
    'Europe/Zagreb'        => "(GMT+01:00) Zagreb",
    'Europe/Athens'        => "(GMT+02:00) Athens",
    'Europe/Bucharest'     => "(GMT+02:00) Bucharest",
    'Africa/Cairo'         => "(GMT+02:00) Cairo",
    'Africa/Harare'        => "(GMT+02:00) Harare",
    'Europe/Helsinki'      => "(GMT+02:00) Helsinki",
    'Europe/Istanbul'      => "(GMT+02:00) Istanbul",
    'Asia/Jerusalem'       => "(GMT+02:00) Jerusalem",
    'Europe/Kiev'          => "(GMT+02:00) Kyiv",
    'Europe/Minsk'         => "(GMT+02:00) Minsk",
    'Europe/Riga'          => "(GMT+02:00) Riga",
    'Europe/Sofia'         => "(GMT+02:00) Sofia",
    'Europe/Tallinn'       => "(GMT+02:00) Tallinn",
    'Europe/Vilnius'       => "(GMT+02:00) Vilnius",
    'Asia/Baghdad'         => "(GMT+03:00) Baghdad",
    'Asia/Kuwait'          => "(GMT+03:00) Kuwait",
    'Africa/Nairobi'       => "(GMT+03:00) Nairobi",
    'Asia/Riyadh'          => "(GMT+03:00) Riyadh",
    'Asia/Tehran'          => "(GMT+03:30) Tehran",
    'Europe/Moscow'        => "(GMT+04:00) Moscow",
    'Asia/Baku'            => "(GMT+04:00) Baku",
    'Europe/Volgograd'     => "(GMT+04:00) Volgograd",
    'Asia/Muscat'          => "(GMT+04:00) Muscat",
    'Asia/Tbilisi'         => "(GMT+04:00) Tbilisi",
    'Asia/Yerevan'         => "(GMT+04:00) Yerevan",
    'Asia/Kabul'           => "(GMT+04:30) Kabul",
    'Asia/Karachi'         => "(GMT+05:00) Karachi",
    'Asia/Tashkent'        => "(GMT+05:00) Tashkent",
    'Asia/Kolkata'         => "(GMT+05:30) Kolkata",
    'Asia/Kathmandu'       => "(GMT+05:45) Kathmandu",
    'Asia/Yekaterinburg'   => "(GMT+06:00) Ekaterinburg",
    'Asia/Almaty'          => "(GMT+06:00) Almaty",
    'Asia/Dhaka'           => "(GMT+06:00) Dhaka",
    'Asia/Novosibirsk'     => "(GMT+07:00) Novosibirsk",
    'Asia/Bangkok'         => "(GMT+07:00) Bangkok",
    'Asia/Jakarta'         => "(GMT+07:00) Jakarta",
    'Asia/Krasnoyarsk'     => "(GMT+08:00) Krasnoyarsk",
    'Asia/Chongqing'       => "(GMT+08:00) Chongqing",
    'Asia/Hong_Kong'       => "(GMT+08:00) Hong Kong",
    'Asia/Kuala_Lumpur'    => "(GMT+08:00) Kuala Lumpur",
    'Australia/Perth'      => "(GMT+08:00) Perth",
    'Asia/Singapore'       => "(GMT+08:00) Singapore",
    'Asia/Taipei'          => "(GMT+08:00) Taipei",
    'Asia/Ulaanbaatar'     => "(GMT+08:00) Ulaan Bataar",
    'Asia/Urumqi'          => "(GMT+08:00) Urumqi",
    'Asia/Irkutsk'         => "(GMT+09:00) Irkutsk",
    'Asia/Seoul'           => "(GMT+09:00) Seoul",
    'Asia/Tokyo'           => "(GMT+09:00) Tokyo",
    'Australia/Adelaide'   => "(GMT+09:30) Adelaide",
    'Australia/Darwin'     => "(GMT+09:30) Darwin",
    'Asia/Yakutsk'         => "(GMT+10:00) Yakutsk",
    'Australia/Brisbane'   => "(GMT+10:00) Brisbane",
    'Australia/Canberra'   => "(GMT+10:00) Canberra",
    'Pacific/Guam'         => "(GMT+10:00) Guam",
    'Australia/Hobart'     => "(GMT+10:00) Hobart",
    'Australia/Melbourne'  => "(GMT+10:00) Melbourne",
    'Pacific/Port_Moresby' => "(GMT+10:00) Port Moresby",
    'Australia/Sydney'     => "(GMT+10:00) Sydney",
    'Asia/Vladivostok'     => "(GMT+11:00) Vladivostok",
    'Asia/Magadan'         => "(GMT+12:00) Magadan",
    'Pacific/Auckland'     => "(GMT+12:00) Auckland",
    'Pacific/Fiji'         => "(GMT+12:00) Fiji",
);

$defaultQ = "SELECT default_id,post_id,default_value FROM `defaultpage` WHERE default_id = 1";
			$defaultR = mysqli_query($db,$defaultQ);
			$defaultRow = mysqli_fetch_assoc($defaultR);
			 $defaultCOunt = mysqli_num_rows($defaultR);
				if($defaultCOunt > 0){

				include 'pages.php';
				}else{
			include 'blog.php';
}
?>
