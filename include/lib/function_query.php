<?php
function setting(){

	global $db;

		$queryORG="SELECT * FROM settings";
		$resultORG = mysqli_query ($db,$queryORG) or die(mysqli_error());
		$count = mysqli_num_rows($resultORG);
		#$rowORG = mysqli_fetch_assoc($resultORG);
		confirm_result_set($resultORG);
		$rowORG = mysqli_fetch_assoc($resultORG);
		mysqli_free_result($result);
			//$SETTING_Name=$rowORG["Name"];
			//$SETTING_Photo=$rowORG["Photo"];
			return $rowORG; // returns an assoc. array;
}


function webintro(){
	global $db;
	$q = "SELECT * FROM website_type WHERE id <> 0 ORDER by label ASC";
	 $result = mysqli_query($db, $q);
	 confirm_result_set($result);
	 return $result;
}

if(!function_exists('post_type')){
function post_type($pages, $web=0, $id=0,$positon='') {

     global $db;
    //$q = "select p.id,p.title,p.slug,p.body AS content,p.images, web.name AS theme FROM posts p LEFT JOIN website_type web ON p.website_type = web.id   WHERE post_type = '$pages' ".($web == 0 ? '' : ' AND website_type = '.$web.'')." ".($id == 0 ? '' : ' AND id = '.$id.'')." ".($positon == '' ? '' : ''.$positon.'')."";
    echo $q = "select p.id,p.title,p.slug,p.body AS content,p.images FROM posts p   WHERE post_type = '$pages' ".($positon == '' ? '' : ''.$positon.'');
    $r = mysqli_query($db, $q);
		confirm_result_set($r);
    $results = array();
    while ($result = mysqli_fetch_array($r)) {$results[] = $result;}
   return json_decode(json_encode($results));
}
}
if(!function_exists('menu')){
function menu() {

     global $db;
    $q = "SELECT m.menu_id,m.menu_label,m.menu_parent,p.title,p.slug FROM `menu` m LEFT JOIN posts p on m.post_id = p.id WHERE m.menu_parent = 0";
    $r = mysqli_query($db, $q);
		confirm_result_set($r);
    $results = array();
    while ($result = mysqli_fetch_array($r)) {$results[] = $result;}
   return $results;
}
}
if(!function_exists('nav')){
function nav($parent = null) {
     global $db;

     
    $q = "SELECT m.menu_id,m.menu_label,m.menu_parent,p.slug FROM `menu` m LEFT JOIN posts p on m.post_id = p.id ".(($parent == null) ? '' : 'WHERE menu_id = $parent  ')."";
    $r = mysqli_query($db, $q);
		confirm_result_set($r);
    $count = mysqli_query($db, $q);
    $results = array();
    while ($result = mysqli_fetch_array($r)) {$results[] = $result;}
    foreach ($results as $key) {
       if($key['menu_parent'] == 0) {

         echo '<li><a href="'.get_template_directory_uri()."/".$key['slug'].'">'.$key['menu_label'].'</a>

        
         </li>';
 
       }else{

       echo $key['menu_label'].'<br/>';
       }
    }

   #return $results;
}

}


if(!function_exists('slider')){
function slider($slider, $web=0, $id=0) {

     global $db;
    $q = "SELECT id,title,body AS content, website_type,images FROM posts WHERE post_type = '$slider' ".($web == 0 ? '' : ' AND website_type = '.$web.'')." ".($id == 0 ? '' : ' AND id = '.$id.'')."";
    $r = mysqli_query($db, $q);
    $results = array();
    while ($result = mysqli_fetch_array($r)) {$results[] = $result;}
   return json_decode(json_encode($results));
}
}


//$sliderQ = "SELECT * FROM posts WHERE id <> 0 AND post_type='slider' AND website_type = $web  ORDER by title ASC";
	//$sliderR = mysqli_query($db, $sliderQ);



function bootstrap_menu($array,$menu_parent = 0,$parents = array())
    {


        if($menu_parent==0)
        {

            foreach ($array as $element) {
              
                if (($element['menu_parent'] != 0) && !in_array($element['menu_parent'],$parents)) {
                    $parents[] = $element['menu_parent'];

                }
            }
        }
        $menu_html = '';
        foreach($array as $element)
        {

            if($element['menu_parent']==$menu_parent)
            {
                if(in_array($element['menu_id'],$parents))
                {


                    $menu_html .= '<li class="dropdown">';
                    $menu_html .= '<a href="'.$element['slug'].'" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">'.$element['menu_label'].' <span class="caret"></span></a>';
                }
                else   {
                 $pagenameurl=$element['slug'];
                 $pagename= curPageURL();
                  $host =$_SERVER['REQUEST_URI'];
                #$pages = 'boot1.php';



                if($host==$pagenameurl){  $act="active";} else { $act=""; }
                    $menu_html .= '<li class='.$act.'>';
                    $menu_html .= '<a href="' . $element['slug'] . '">' . $element['menu_label'] . '</a>';
                }
                if(in_array($element['menu_id'],$parents))
                {
                    $menu_html .= '<ul class="dropdown-menu" role="menu">';
                    $menu_html .= bootstrap_menu($array, $element['menu_id'], $parents);
                    $menu_html .= '</ul>';
                }
                $menu_html .= '</li>';
            }
        }
        return $menu_html;
    }

?>
