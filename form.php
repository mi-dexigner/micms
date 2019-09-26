<?php 

if(is_file("include/inc_head.php")){
require_once("include/inc_head.php");
}else{
  echo "please check the configure files"; 
}
 ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Bootstrap 101 Template</title>
    <!-- Normalize -->
    <link href="<?php echo BASE_URL; ?>/assets/css/normalize.css" rel="stylesheet">
    <!-- Bootstrap -->
    <link href="<?php echo BASE_URL; ?>/assets/css/bootstrap.min.css" rel="stylesheet">
   <!--  jquery ui-->
  <!--  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">  -->
    <!-- Style -->
    <link href="<?php echo BASE_URL; ?>/assets/css/style.css" rel="stylesheet"> 

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>

<div class="container">

<!-- // being heading -->
  <div class="row ">

   <div class="col-md-12"> <h2 class="text-md-center display-4">Add BLRequest Form</h2><hr></div>
   
    </div>
<!-- // end heading -->

  <div class="row">
    
    <div class="col-md-12">
      <form id="needs-validation" novalidate>
        <!-- // being shipper -->
       <fieldset class="shipper">  
  <div class="row">
   <legend>Shipper:</legend>
    <div class="col-md-6 mb-3">
      <label for="shippername">Name<span>*</span>:</label>
      <input type="text" class="form-control" id="shippername" name="shippername" placeholder="Shipper Name"  required>
    <div class="invalid-feedback">
        Please provide a Shipper Name.
      </div>
    </div>
    <div class="col-md-6 mb-3">
      <label for="shipperaddressone">Address:<span>*</span></label>
      <textarea class="form-control" id="shipperaddressone" name="shipperaddressone" placeholder="Shipper Address"  rows="2" required></textarea>
    <div class="invalid-feedback">
        Please provide a Shipper Address.
      </div>
    </div>

  </div>

  <div class="row">
     <div class="col-md-6 mb-3">
      <label for="shipperaddresstwo">Address 2:</label>
      <textarea class="form-control" id="shipperaddresstwo" name="shipperaddresstwo" placeholder="Shipper Address 2"  rows="2"></textarea>
    </div>
     <div class="col-md-6 mb-3">
      <label for="shipperaddressthree">Address 3:</label>
      <textarea class="form-control" id="shipperaddressthree" name="shipperaddressthree" placeholder="Shipper Address 3"  rows="2"></textarea>
   
    </div>
    
  </div>
  </fieldset>
  <!-- // end shipper -->

  <!-- // being consignee -->
       <fieldset class="consignee">  
  <div class="row">
  <legend>Consignee:</legend>
    <div class="col-md-6 mb-3">
      <label for="consigneename">Name<span>*</span>:</label>
      <input type="text" class="form-control" id="consigneename" name="consigneename" placeholder="Consignee Name"  required>
    <div class="invalid-feedback">
        Please provide a Consignee Name.
      </div>
    </div>
    <div class="col-md-6 mb-3">
      <label for="consigneeaddressone">Address:<span>*</span></label>
      <textarea class="form-control" id="consigneeaddressone" name="consigneeaddressone" placeholder="Consignee Address"  rows="2" required></textarea>
    <div class="invalid-feedback">
        Please provide a Consignee Address.
      </div>
    </div>

  </div>

  <div class="row">
     <div class="col-md-6 mb-3">
      <label for="consigneeaddresstwo">Address 2:</label>
      <textarea class="form-control" id="consigneeaddresstwo" name="consigneeaddresstwo" placeholder="Consignee Address 2"  rows="2"></textarea>
    </div>
     <div class="col-md-6 mb-3">
      <label for="consigneeaddressthree">Address 3:</label>
      <textarea class="form-control" id="consigneeaddressthree" name="consigneeaddressthree" placeholder="Consignee Address 3"  rows="2"></textarea>
   
    </div>
    
  </div>
  </fieldset>
  <!-- // end consignee -->
  <!-- // being notify -->
       <fieldset class="notify">  
  <div class="row">
  <legend>Notify:</legend>
    <div class="col-md-6 mb-3">
      <label for="notifyname">Name<span>*</span>:</label>
      <input type="text" class="form-control" id="notifyname" name="notifyname" placeholder="Notify Name"  required>
    <div class="invalid-feedback">
        Please provide a Notify Name.
      </div>
    </div>
    <div class="col-md-6 mb-3">
      <label for="notifyaddressone">Address:<span>*</span></label>
      <textarea class="form-control" id="notifyaddressone" name="notifyaddressone" placeholder="Notify Address"  rows="2" required></textarea>
    <div class="invalid-feedback">
        Please provide a Notify Address.
      </div>
    </div>

  </div>

  <div class="row">
     <div class="col-md-6 mb-3">
      <label for="notifyaddresstwo">Address 2:</label>
      <textarea class="form-control" id="notifyaddresstwo" name="notifyaddresstwo" placeholder="Consignee Address 2"  rows="2"></textarea>
    </div>
     <div class="col-md-6 mb-3">
      <label for="notifyaddressthree">Address 3:</label>
      <textarea class="form-control" id="notifyaddressthree" name="notifyaddressthree" placeholder="Consignee Address 3"  rows="2"></textarea>
   
    </div>
    
  </div>
  </fieldset>
  <!-- // end notify -->
  <!-- // being form detail -->
       <fieldset class="formdetail">  
  <div class="row">
  <legend>Form Detail:</legend>
    <div class="col-md-6 mb-3">
      <label for="formeno">Form E No<span>*</span>:</label>
      <input type="text" class="form-control" id="formeno" name="formeno" placeholder="Form E No"  required>
    <div class="invalid-feedback">
        Please provide a Form E No.
      </div>
    </div>
    <div class="col-md-6 mb-3">
      <label for="formedate">Form E Date:<span>*</span></label>
      <input type="text" class="form-control" id="formedate" name="formedate" placeholder="Form E Date"  required>
    <div class="invalid-feedback">
        Please provide a Form E Date.
      </div>
    </div>

  </div>

  </fieldset>
  <!-- // end form detail -->

    <!-- // being Voyage -->
       <fieldset class="formdetail">  
  <div class="row">
  <legend>Voyage:</legend>
    <div class="col-md-3 mb-3">
      <label for="vessel">Vessel<span>*</span>:</label>
      <input type="text" class="form-control" id="vessel" name="vessel" placeholder="Vessel"  required>
    <div class="invalid-feedback">
        Please provide a Vessel.
      </div>
    </div>
    <div class="col-md-3 mb-3">
      <label for="voyageno">Voyage No:<span>*</span></label>
      <input type="text" class="form-control" id="voyageno" name="voyageno" placeholder="Voyage No"  required>
    <div class="invalid-feedback">
        Please provide a Voyage No.
      </div>
    </div>

     <div class="col-md-3 mb-3">
      <label for="FreightType">Freight:<span>*</span></label>
      <select class="form-control custom-select d-block" id="FreightType" name="FreightType" required>
  <option value="">please Select Freight</option>
  <option value="Prepaid At">Prepaid At</option>
  <option value="Collect At">Collect At</option>

</select>
    <div class="invalid-feedback">
        Please provide a Freight.
      </div>
    </div>
    <div class="col-md-3 mb-3">
      <label for="other">other</label>
      <input type="text" class="form-control" id="other" name="other" placeholder="other">
    </div>

  </div>

  </fieldset>
  <!-- // end Voyage -->

  <button class="btn btn-primary" type="submit">Preview BL</button>
</form>



    </div>
   
  </div>
</div>



    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="<?php echo  get_template_directory_uri(); ?>/assets/js/jquery-3.2.1.slim.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="<?php echo  get_template_directory_uri(); ?>/assets/js/bootstrap.min.js"></script>
 <!--    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script> -->
    <script src="<?php echo  get_template_directory_uri(); ?>/assets/js/main.js"></script>

    <script>
// Example starter JavaScript for disabling form submissions if there are invalid fields
(function() {
  "use strict";
  window.addEventListener("load", function() {
    var form = document.getElementById("needs-validation");
    form.addEventListener("submit", function(event) {
      if (form.checkValidity() == false) {
        event.preventDefault();
        event.stopPropagation();
      }
      form.classList.add("was-validated");
    }, false);
  }, false);
}());
</script>
  </body>
</html>