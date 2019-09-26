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
	$_SESSION["message"] = "Create a brand new user and add them to this site.";
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


//find_category_by_id
if(!function_exists('find_category_by_id')){
function find_category_by_id($category_id){
	global $database;
$safe_subject_id = mysqli_real_escape_string($connection,$category_id);
$query  = "SELECT * ";
$query .= "FROM subjects ";
$query .= "WHERE id = {$safe_subject_id} ";
$query .= "LIMIT 1";
$category_set = $database->query($query);
confirm_query($category_set);
if($category = mysqli_fetch_assoc($category_set)){

return $category;
}else {
	return null;
}

}

}


function find_all_category(){
global $database;
$user_id = $_SESSION['user_id'];
$query  = "SELECT * ";
$query .= "FROM category ";
$query .= "WHERE user_id = {$user_id} ";
/*$query .= "ORDER BY cat_name ASC";*/
$subject_set = $database->query($query);
confirm_query($subject_set);

return $subject_set;

}

function find_all_category_active(){
global $database;
$user_id = $_SESSION['user_id'];
$query  = "SELECT * ";
$query .= "FROM category ";
$query .= "WHERE cat_status = 'active' ";
/*$query .= "ORDER BY cat_name ASC";*/
$subject_set = $database->query($query);
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
$subject_set = $database->query($query);
confirm_query($subject_set);
if($category = mysqli_fetch_assoc($subject_set)){

return $category;
}else {
	return null;
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

function find_all_users(){
global $database;
$user_id = $_SESSION['user_id'];
$query  = "SELECT * ";
$query .= "FROM users ";
$query .= "WHERE user_id = {$user_id} ";
/*$query .= "ORDER BY cat_name ASC";*/
$users_set = $database->query($query);
confirm_query($users_set);

return $users_set;

}

function find_edit_users($edit_users){
global $database;
$edit_users = $_SESSION['user_id'];
$query  = "SELECT * ";
$query .= "FROM users ";
$query .= "WHERE user_id = {$edit_users} ";
$edit_users = $database->query($query);
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
$doctor_set = $database->query($query);
confirm_query($doctor_set);

return $doctor_set;

}

// find_all_doctor()
function find_all_doctor_active(){
global $database;
$user_id = $_SESSION['user_id'];
$query  = "SELECT * ";
$query .= "FROM doctor ";
$query .= "WHERE  doctor_status ='active'  ";
$query .= "ORDER BY doctor_name ASC";
$doctor_set = $database->query($query);
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
$department_set = $database->query($query);
confirm_query($department_set);

return $department_set;

}
// 
function find_all_department_active(){
global $database;
$user_id = $_SESSION['user_id'];
$query  = "SELECT * ";
$query .= "FROM department ";
$query .= "WHERE department_status = 'active'";
$query .= "ORDER BY department_name ASC";
$department_set = $database->query($query);
confirm_query($department_set);

return $department_set;

}


// Medicine category Add Query
if(!function_exists('addMcategory')){
function addMcategory(){
	global $database;
	if(isset($_POST['addMcategory'])){
	$mcat_name = $_POST['mcat_name'];
	$mcat_desc = $_POST['mcat_desc'];
	$mcat_status = $_POST['mcat_status'];
	$user_id = $_SESSION['user_id'];
	
	
	$addCategory = "INSERT INTO `mcategory` (mcat_name,mcat_desc,mcat_status,user_id)VALUES ('$mcat_name','$mcat_desc','$mcat_status','$user_id')";
	$addCategoryResult = $database->query($addCategory);
	
	if($addCategoryResult){
	// Success
	$_SESSION["message"] = "Medicine Category created.";
	 redirect_to("view-medicine-categories.php");
}else{
	// Failure
	$_SESSION["message"] = "Medicine Category creation failed.";
	redirect_to("view-medicine-categories.php");
	}
	}
	
	}
}
// Medicine all category data find
if(!function_exists('find_all_mcategory')){
function find_all_mcategory(){
global $database;
$user_id = $_SESSION['user_id'];
$query  = "SELECT * ";
$query .= "FROM mcategory ";
$query .= "WHERE user_id = {$user_id} ";
/*$query .= "ORDER BY cat_name ASC";*/
$subject_set = $database->query($query);
confirm_query($subject_set);

return $subject_set;

}
}
// Medicine all category data find active
if(!function_exists('find_all_mcategory_active')){

function find_all_mcategory_active(){
global $database;
$user_id = $_SESSION['user_id'];
$query  = "SELECT * ";
$query .= "FROM mcategory ";
$query .= "WHERE mcat_status = 'active' ";
/*$query .= "ORDER BY cat_name ASC";*/
$subject_set = $database->query($query);
confirm_query($subject_set);

return $subject_set;

}
}

// System all category data find
if(!function_exists('find_all_system')){
function find_all_system(){
global $database;
$user_id = $_SESSION['user_id'];
$query  = "SELECT * ";
$query .= "FROM system ";
$query .= "WHERE user_id = {$user_id} ";
/*$query .= "ORDER BY cat_name ASC";*/
$subject_set = $database->query($query);
confirm_query($subject_set);

return $subject_set;

}
}

//  Add Medicine Query
if(!function_exists('addMedicine')){
function addMedicine(){
	global $database;
	if(isset($_POST['addMedicine'])){
	$med_name = $_POST['med_name'];
	$mcat_id = $_POST['mcat_id'];
	$med_price = $_POST['med_price'];
	$med_qty = $_POST['med_qty'];
	$med_generic = $_POST['med_generic'];
	$med_company = $_POST['med_company'];
	$med_effect = $_POST['med_effect'];
	$user_id = $_SESSION['user_id'];
	$addMedicine = "INSERT INTO `medicine` (med_name,mcat_id,med_price,med_qty,med_generic,med_company,med_effect,user_id)VALUES ('$med_name',$mcat_id,'$med_price','$med_qty','$med_generic','$med_company','$med_effect','$user_id')";
	$addMedicineResult = $database->query($addMedicine);
	
	if($addMedicineResult){
	// Success
	$_SESSION["message"] = "Medicine created.";
	 redirect_to("view-medicine.php");
}else{
	// Failure
	$_SESSION["message"] = "Medicine  creation failed.";
	redirect_to("view-medicine.php");
	}
	}
	
	}
}

// Medicine all  find
if(!function_exists('find_all_medicine')){
function find_all_medicine(){
global $database;
$user_id = $_SESSION['user_id'];
$query  = "SELECT * ";
$query .= "FROM medicine INNER JOIN mcategory ";
$query .= "ON medicine.mcat_id = mcategory.mcat_id ";
$query .= "ORDER BY mcat_name ASC";
$subject_set =$database->query($query);
confirm_query($subject_set);

return $subject_set;

}
}

if(!function_exists('find_all_slip')){
function find_all_slip(){
global $database;
$user_id = $_SESSION['user_id'];
$query  = "SELECT *  ";
$query .="FROM slip s INNER JOIN doctor doc";
$query .=" ON s.doctor_id = doc.doctor_id";
$query .=" INNER JOIN category cat ON s.cat_id = cat.cat_id";
$subject_set = $database->query($query);
confirm_query($subject_set);

return $subject_set;

}
}
// add slip

if(!function_exists('addSlip')){
	function addSlip(){
		global $database;
		if(isset($_POST['addslip'])){
        $user_id = $_SESSION['user_id'];
        $slip_date = $_POST['slip_date'];
        $slip_department = $_POST['slip_department'];
        $slip_category_id = $_POST['slip_category_id'];
        $slip_doctor = $_POST['slip_doctor'];
        $slip_patient_name = $_POST['slip_patient_name'];
        $slip_wo_bo = $_POST['slip_wo_bo'];
		$fees = $_POST['fees'];
        $slip_note = $_POST['slip_note'];
            
            
            if($slip_category_id == ''){
                echo "<div class=\"form-message warning\">".
                htmlentities('Please Select Category Name')."</div>";
            }if($slip_department == ''){
                echo "<div class=\"form-message warning\">".
                htmlentities('Please Select Department Name')."</div>";
            }if($slip_doctor == ''){
                echo "<div class=\"form-message warning\">".
                htmlentities('Please Select Doctor Name')."</div>";
            }if($slip_patient_name == ''){
                echo "<div class=\"form-message warning\">".
                htmlentities('Please Insert Patient Name')."</div>";
            }if($slip_wo_bo == ''){
                echo "<div class=\"form-message warning\">".
                htmlentities('Please Insert wo/bio')."</div>";
            }if($fees == ''){
               echo "<div class=\"form-message warning\">".
                htmlentities('Please Insert Amount')."</div>";
            }if($slip_note == ''){
                echo "<div class=\"form-message warning\">".
                htmlentities('Please Insert Description')."</div>";
            }
          
        
       
    echo  $addSlip ="INSERT INTO  slip SET
		slip_date = '" . mysql_prep($slip_date) . "',
		cat_id = '" . mysql_prep($slip_category_id) . "',
		department_id = '" . mysql_prep($slip_department) . "',
		doctor_id = '" . mysql_prep($slip_doctor) . "',
        slip_pname = '" . mysql_prep($slip_patient_name) . "',
        slip_wo_bo = '" . mysql_prep($slip_wo_bo) . "',
        slip_note = '" . mysql_prep($slip_note) . "',
        fees = '" . mysql_prep($fees) . "',
		user_id = '" . mysql_prep($user_id) . "'";

            $addSlipResult = $database->query($addSlip);

		
    // If there was a query error
  if($addSlipResult){
      // Success
      $_SESSION['slipId'] = mysqli_insert_id($database);
      //$_SESSION["message"] = "Created";
	redirect_to("print-slip.php");
  }else{
	// Failure
	$_SESSION["message"] = "Slip creation failed.";
	redirect_to("view-slip.php");
	}
		
        
            
            
      }
		
		}
	}

// Slip  all  find
if(!function_exists('find_slip_print')){
function find_slip_print(){
global $database;
$user_id = $_SESSION['user_id'];
if($subject_set  = $database->query("SELECT DATE_FORMAT(s.slip_date, '%D %b %Y') As Date,s.slip_pname As PatientName,s.slip_wo_bo As PatientWoBo,s.fees As Amount,cat.cat_name As Category,dep.department_name As Department,doc.doctor_name As Doctor,sys.system_name As HospitalName,sys.system_phone As Phone,sys.system_email As Email,sys.system_address As Address,sys.system_image As Image FROM `slip` s LEFT JOIN category cat ON s.cat_id = cat.cat_id LEFT JOIN department dep ON s.department_id = dep.department_id LEFT JOIN doctor doc ON s.doctor_id = doc.doctor_id  LEFT JOIN users u ON s.user_id = u.user_id LEFT JOIN system sys ON u.user_id = sys.user_id")){
  echo mysqli_insert_id($database);
}
  
confirm_query($subject_set);

return $subject_set;

}
}

?>