<form id="backupfrm" method="post" action="<?php echo $self;?>">
<input type="hidden" id="DBbackup" name="DBbackup" value="" />
</form>

<!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav class="" role="navigation">
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
					<?php if($_SESSION['RoleID'] == 10){ ?>
                    <img src="<?php echo (is_file(DIR_CLIENTUSERS . $_SESSION['Photo']) ? DIR_CLIENTUSERS.$_SESSION["Photo"] : 'images/avatar.png'); ?>" class="img-circle" alt="" />
					<?php } else { ?>
					<img src="<?php echo (is_file(DIR_ADMINUSERS . $_SESSION['Photo']) ? DIR_ADMINUSERS.$_SESSION["Photo"] : 'images/avatar.png'); ?>" class="img-circle" alt="" />
					<?php } ?>
					<?php echo $_SESSION['UserFullName']; ?> 
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
					<?php if($_SESSION['RoleID'] == 10){ ?>
                    <li><a href="ClientLockNow.php"><i class="fa fa-eye-slash pull-right"></i> Lock Screen</a></li>
					<li><a href="ClientLogout.php"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
					<?php } else { ?>
					<li><a href="lockNow.php"><i class="fa fa-eye-slash pull-right"></i> Lock Screen</a></li>
					<li><a href="logout.php"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
					<?php } ?>
                  </ul>
                </li>
				
				
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->