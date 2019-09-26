<?php
function confirm_query($result_set){
	if(!$result_set){
		die("Database query failed.");
	}
}
// User Add Query
if(!function_exists('addUser')){
	function addUser(){
		global $database;
		if(isset($_POST['adduser'])){
        $username = $_POST['username'];
        $email = $_POST['email'];
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $password = specialcharacter(md5($_POST['password']));
        $role = $_POST['role'];
		if(isset($_POST['nickname']) && !empty($_POST['nickname']))
	{
		$nickname = $_POST['nickname'];
	}
	else
	{
		$nickname = null;
                is_null($nickname);
                
	}
	
	if(isset($_POST['displayname']) && !empty($_POST['displayname']))
	{
		$displayname = $_POST['displayname'];
	}
	else
	{
		$displayname = null;
                is_null($displayname);
                
	}
		
	
        
		
		$addUser = "INSERT INTO `users` (username,email,firstname,lastname,nickname,password,displayname,role)VALUES ('$username','$email','$firstname','$lastname','$nickname','$password','$displayname','$role')";
                    $addUserResult = $database->query($addUser);
								
					// If there was a query error
if($addUserResult){
	// Success
	$_SESSION["message"] = "User created.";
	 redirect_to("view-user.php");
}else{
	// Failure
	$_SESSION["message"] = "User creation failed.";
	redirect_to("view-user.php");
	}
					
         
      }
		
		}
	}


// category Add Query
if(!function_exists('addCategory')){
function addCategory(){
	global $database;
	if(isset($_POST['AddCategory'])){
	$cat_name = $_POST['cat_name'];
	$cat_desc = $_POST['cat_desc'];
	$cat_status = $_POST['cat_status'];
	$user_id = $_SESSION['user_id'];
	
	
	$addCategory = "INSERT INTO `category` (cat_name,cat_desc,cat_status,user_id)VALUES ('$cat_name','$cat_desc','$cat_status','$user_id')";
	$addCategoryResult = $database->query($addCategory);
	
	if($addCategoryResult){
	// Success
	$_SESSION["message"] = "Category created.";
	 redirect_to("view-category.php");
}else{
	// Failure
	$_SESSION["message"] = "Category  creation failed.";
	redirect_to("view-category.php");
	}
	}
	
	}
}

// Doctor Add Query
if(!function_exists('addDoctor')){
function addDoctor(){
	global $database;
	if(isset($_POST['addDoctor'])){
	$doctor_name = $_POST['doctor_name'];
	$doctor_desc = $_POST['doctor_desc'];
	$doctor_status = $_POST['doctor_status'];
	$user_id = $_SESSION['user_id'];
	
	
	$addDoctor = "INSERT INTO `doctor` (doctor_name,doctor_desc,doctor_status,user_id) VALUES ('$doctor_name','$doctor_desc','$doctor_status','$user_id')";
	$addDoctorResult = $database->query($addDoctor);
	
	if($addDoctorResult){
	// Success
	$_SESSION["message"] = "Doctor created.";
	 redirect_to("view-doctor.php");
}else{
	// Failure
	$_SESSION["message"] = "Category  creation failed.";
	redirect_to("view-doctor.php");
	}
	}
	
	}
}


//find_category_by_id
if(!function_exists('find_category_by_id')){
function find_category_by_id($category_id){
	global $database;
$safe_subject_id = mysqli_real_escape_string($connection,$category_id);
$query  = "SELECT * ";
$query .= "FROM subjects ";
$query .= "WHERE id = {$safe_subject_id} ";
$query .= "LIMIT 1";
$category_set = mysqli_query($database,$query);
confirm_query($category_set);
if($category = mysqli_fetch_assoc($category_set)){

return $category;
}else {
	return null;
}

}

}

//find_all_category()
function find_all_category(){
global $database;
$user_id = $_SESSION['user_id'];
$query  = "SELECT * ";
$query .= "FROM category ";
$query .= "WHERE user_id = {$user_id} ";
$query .= "ORDER BY cat_name ASC";
$subject_set = mysqli_query($database,$query);
confirm_query($subject_set);

return $subject_set;

}

function find_category_by_id($subject_id){
	global $database;
$safe_subject_id = mysqli_real_escape_string($database,$subject_id);
$query  = "SELECT * ";
$query .= "FROM category ";
$query .= "WHERE user_id = {$safe_subject_id} ";
$query .= "LIMIT 1";
$subject_set = mysqli_query($database,$query);
confirm_query($subject_set);
if($category = mysqli_fetch_assoc($subject_set)){

return $category;
}else {
	return null;
}

}

function find_all_users(){
global $database;
$user_id = $_SESSION['user_id'];
$query  = "SELECT * ";
$query .= "FROM users ";
$query .= "WHERE user_id = {$user_id} ";
$query .= "ORDER BY cat_name ASC";
$users_set = mysqli_query($database,$query);
confirm_query($users_set);

return $users_set;

}

function find_edit_users($edit_users){
global $database;
$edit_users = $_SESSION['user_id'];
$query  = "SELECT * ";
$query .= "FROM users ";
$query .= "WHERE user_id = {$edit_users} ";
$edit_users = mysqli_query($database,$query);
confirm_query($edit_users);

return $edit_users;

}
// find_all_doctor()
function find_all_doctor(){
global $database;
$user_id = $_SESSION['user_id'];
$query  = "SELECT * ";
$query .= "FROM doctor ";
$query .= "WHERE user_id = {$user_id} ";
$query .= "ORDER BY doctor_name ASC";
$doctor_set = mysqli_query($database,$query);
confirm_query($doctor_set);

return $doctor_set;

}




// Department Add Query
if(!function_exists('addDepartment')){
function addDepartment(){
	global $database;
	if(isset($_POST['addDepartment'])){
	$department_name = $_POST['department_name'];
	$department_desc = $_POST['department_desc'];
	$department_status = $_POST['department_status'];
	$user_id = $_SESSION['user_id'];
	
	
	$addDepartment = "INSERT INTO `department` (department_name,department_desc,department_status,user_id) VALUES ('$department_name','$department_desc','$department_status','$user_id')";
	$addDepartmentResult = $database->query($addDepartment);
	
	if($addDepartmentResult){
	// Success
	$_SESSION["message"] = "Department created.";
	 redirect_to("view-department.php");
}else{
	// Failure
	$_SESSION["message"] = "Department  creation failed.";
	redirect_to("view-department.php");
	}
	}
	
	}
}

// department select view function
function find_all_department(){
global $database;
$user_id = $_SESSION['user_id'];
$query  = "SELECT * ";
$query .= "FROM department ";
$query .= "WHERE user_id = {$user_id} ";
$query .= "ORDER BY department_name ASC";
$department_set = mysqli_query($database,$query);
confirm_query($department_set);

return $department_set;

}


?>