<!-- https://code.google.com/archive/p/samstyle-php-framework/downloads 
https://code.google.com/archive/p/samstyle-php-framework/downloads
    https://github.com/daneden/PHP-Functions
https://github.com/eoghanobrien/php-simple-mail
https://github.com/lstrojny/functional-php
https://stackoverflow.com/questions/5414662/php-get-line-number-of-regex-result
https://stackoverflow.com/questions/1581049/preg-replace-out-css-comments
https://github.com/joshcam/PHP-MySQLi-Database-Class#insert-query
https://css-tricks.com/php-for-beginners-building-your-first-simple-cms/
https://www.elated.com/articles/cms-in-an-afternoon-php-mysql/


http://apostrophecms.org/

https://www.silverstripe.org/


http://www.w3programmers.com/create-a-content-management-system-with-php-oop-and-mysqli-part-1/


https://stackoverflow.com/questions/2149437/how-to-add-an-array-value-to-the-middle-of-an-associative-array

https://stackoverflow.com/questions/3797239/insert-new-item-in-array-on-any-position-in-php


https://bootsnipp.com/snippets/M55DW
https://bootsnipp.com/snippets/ZXloz
https://bootsnipp.com/snippets/orVKg
https://bootsnipp.com/snippets/N6BgR
https://bootsnipp.com/snippets/3kD3D
https://bootsnipp.com/snippets/BE8Rp
https://bootsnipp.com/snippets/6X6WM
https://bootsnipp.com/snippets/lV09q
https://bootsnipp.com/snippets/kvP2W
https://bootsnipp.com/snippets/2q5gx
https://bootsnipp.com/snippets/2eoAB
https://bootsnipp.com/snippets/D02X4
https://bootsnipp.com/snippets/92ygp
https://bootsnipp.com/snippets/W0GDr
https://bootsnipp.com/snippets/4OlpK
https://bootsnipp.com/snippets/vlOar
https://bootsnipp.com/snippets/featured/fullscreen-background-carousel

-->
<?php

$sql = "UPDATE `products`
 SET `MetaDescription` = replace(`MetaDescription`, 'Warning:  session_start(): Cannot send session cache limiter - headers already sent (output started at /home/zakutaa/public_html/admin/get_p_meta_des.php:2) in /home/zakutaa/public_html/admin/Common.php on line 2', '')";
$pageQ = "SELECT p.id AS postid, p.title AS posttitle,p.post_type AS page,p.slug AS url, p.body AS content,p.images AS feature, pp.meta_value, pp.meta_id, dpage.default_id AS firstpage,p.website_type, web.name AS theme  FROM `posts` p LEFT JOIN postmeta pp  ON p.id = pp.post_id LEFT JOIN defaultpage dpage ON p.id = dpage.post_id LEFT JOIN defaultpage dpg ON dpg.website_type = p.website_type  LEFT JOIN website_type web ON p.website_type = web.id  WHERE  post_type = 'pages' AND p.status = 1 AND p.website_type = '1';
?>