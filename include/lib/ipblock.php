<?php 


// Denied IP's.
    $deny_ips = array(
        //'127.0.0.1',
        '192.168.10.54',
        '192.168.200.1',
        '192.168.300.1',
        'xxx.xxx.xxx.xxx',
       // '::1'
    );
 
    // $deny_ips = file('blocked_ips.txt');
 
    // read user ip adress:
    $ip = isset($_SERVER['REMOTE_ADDR']) ? trim($_SERVER['REMOTE_ADDR']) : '';
    $ip .= isset($_SERVER['SERVER_ADDR']) ? trim($_SERVER['SERVER_ADDR']) : '';
 
    // search current IP in $deny_ips array
    if (($i = array_search($ip, $deny_ips)) !== FALSE){
 
        // $i = contains the array key of the IP adress.        
 
        // user is blocked:
        print "Your IP adress ('$ip') was blocked!";
        exit;
    }

 
    // If we reach this section, the IP adress is valid

 ?>