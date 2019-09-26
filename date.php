<?php 

function autoUpdatingCopyright($startYear){
 
    // given start year (e.g. 2004)
    $startYear = intval($startYear);
 
    // current year (e.g. 2007)
    $year = intval(date('Y'));
 
    // is the current year greater than the
    // given start year?
    if ($year > $startYear)
        return $startYear .'-'. $year;
    else
        return $startYear;
}



echo autoUpdatingCopyright(2013);

 ?>

 <?php
 
    $UnixTimeStamp = time();
 
    $Title      = strftime('%Y-%m-%dT%H:%M:%SZ', $UnixTimeStamp);
    $Caption    = strftime('%B %d, %Y at %H:%M', $UnixTimeStamp);
 
    print '<abbr class="date" title="'. $Title .'">'. $Caption .'</abbr>';
 
?>
 
<!-- example result -->
 
<abbr class="date" title="2007-07-25T20:15:21Z">July 25, 2007 at 20:15</abbr>