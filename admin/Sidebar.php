<div class="col-md-3 left_col">
          <div class="left_col scroll-view">
          <!--    <div class="navbar nav_title" style="border: 0;">        
                 <a href="index.php" class="site_title"><img src="<?php echo (is_file(DIR_SETTINGS . $rowORG["Photo"]) ? DIR_SETTINGS . $rowORG["Photo"] : 'images/avatar2.png'); ?>" style="height:50px;width:50px;" />" style="height:50px;width:50px;" /> <span><?php echo $rowORG["Name"]; ?></span></a>
         </div>  --> 
            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile">
              <div class="profile_pic">
					<img src="<?php echo (is_file(DIR_ADMINUSERS . $_SESSION['Photo']) ? DIR_ADMINUSERS.$_SESSION["Photo"] : 'images/avatar.png'); ?>" class="img-circle profile_img" alt="<?php echo $_SESSION['UserFullName']; ?>" />
				
              </div>
              <div class="profile_info">
                <span>Welcome,</span>
                <h2><?php echo $_SESSION['UserFullName']; ?> </h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <ul class="nav side-menu">
				  
				  <h3>&emsp;</h3>
				  
				  <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
           <li><a><i class="fa fa-file"></i> CMS <span class="fa fa-chevron-down"></span></a>
             <ul class="nav child_menu">
              <li><a href="posts.php">Posts</a></li>
              <li><a href="pages.php">Pages</a></li>
              <li><a href="sliders.php">Sliders</a></li>
               </ul>
                  </li>
             <li><a><i class="fa fa-file"></i> Pricing <span class="fa fa-chevron-down"></span></a>
             <ul class="nav child_menu">
              <li><a href="head.php">Head</a></li>
              <li><a href="heading.php">Heading</a></li>
              <li><a href="details.php">Details</a></li>
               </ul>
                  </li>
      <li><a href="menu.php"><i class="fa fa-user"></i> Menu</a></li>
         <!--  <li><a href="packages.php"><i class="fa fa-user"></i> Packages</a></li>
           <li><a href="portname.php"><i class="fa fa-user"></i> Port Name</a></li>
				  <li><a href="users.php"><i class="fa fa-user"></i> Admin Users</a></li>
				  <li><a href="ClientUsers.php"><i class="fa fa-users"></i> Client Users</a></li>
				  <li><a href="Locations.php"><i class="fa fa-map-marker"></i> Locations</a></li>
				  <li><a href="Questions.php"><i class="fa fa-question-circle"></i> Questions</a></li>
				  <li><a href="Employees.php"><i class="fa fa-credit-card"></i> Employees</a></li>
				  <li><a href="Feedbacks.php"><i class="fa fa-envelope"></i> Feedbacks</a></li>
				  <li><a href="Reports.php"><i class="fa fa-bar-chart"></i> Reports</a></li> -->
				
				  
                </ul>
              </div>

            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
			  <?php if($_SESSION['RoleID'] == 1){ ?>
			  <a data-toggle="tooltip" data-placement="top" title="Settings" href="Settings.php">
                <span class="fa fa-gear" aria-hidden="true"></span>
              </a>
			  <a data-toggle="tooltip" data-placement="top" title="Database" id="Database" onClick="javascript:doBackup()">
                <span class="fa fa-database" aria-hidden="true"></span>
              </a>
			  <?php }else{ ?>
			  <a data-toggle="tooltip" data-placement="top" title="Settings" onClick="javascript:UnAuthorized()">
                <span class="fa fa-gear" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Database" id="Database" onClick="javascript:UnAuthorized()">
                <span class="fa fa-database" aria-hidden="true"></span>
              </a>
			  <?php } ?>
              <a data-toggle="tooltip" data-placement="top" title="Lock" href="<?php echo ($_SESSION['RoleID'] == 10 ? 'ClientLockNow.php' : 'LockNow.php') ?>">
                <span class="fa fa-eye-slash" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Logout" href="<?php echo ($_SESSION['RoleID'] == 10 ? 'ClientLogout.php' : 'Logout.php') ?>">
                <span class="fa fa-sign-out" aria-hidden="true"></span>
              </a>
            </div>
            <!-- /menu footer buttons -->
          </div>
        </div>
		