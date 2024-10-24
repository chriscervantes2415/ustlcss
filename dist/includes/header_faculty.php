<header class="main-header">
        <nav class="navbar navbar-static-top">
          <div class="container">
            <div  class="navbar-header" style="padding-left:20px">
           
            <img class="img-ceafalogo" src="../dist/img/My project.png" alt="ceafa logo" width="75" height="75" style = "position:relative; right:160px; bottom:2px;> 
            style = "position:relative; left:350px; top:2px;>
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
                <i class="fa fa-bars"></i>
              </button>
            </div>

            <!-- Navbar Right Menu -->
              <div style = "position:relative; left:150px; top:10px; class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                  <!-- Tasks Menu -->
                 <li class="">
                    <!-- Menu Toggle Button -->
                    <a href="faculty_home.php" class="" style="font-size:14px; color:#E3BC9A"><i class="glyphicon glyphicon-list-alt"></i> Scheduling</a>

                  </li>
                  <!-- Tasks Menu -->
                  
				   <li class="dropdown notifications-menu">
                    <!-- Menu toggle button -->
                    <a href="#" class="dropdown-toggle" style=" color:#E3BC9A" data-toggle="dropdown">
                      <i class="glyphicon glyphicon-pencil"></i> Data Entry
                      
                    </a>
                    <ul class="dropdown-menu">
                      <li>
                        <!-- Inner Menu: contains the notifications -->
                        <ul class="menu">
						  
                          <li><!-- start notification -->
                            <a href="teacher1.php">
                              <i class="glyphicon glyphicon-user text"></i> User
                            </a>
                          </li><!-- end notification -->
						  
                        </ul>
                      </li>
                     
                    </ul>
                  </li>
				  <!-- Tasks Menu -->
				   <li class="dropdown notifications-menu">
                    <!-- Menu toggle button -->
                    <a href="#" class="dropdown-toggle" style=" color:#E3BC9A" data-toggle="dropdown">
                      <i class="glyphicon glyphicon-wrench"></i> Maintenance
                      
                    </a>
                    <ul class="dropdown-menu">
                      <li>
                        <!-- Inner Menu: contains the notifications -->
                        <ul class="menu">
						  
						 
             
						 
						
                         
						  
						  
						  <li><!-- start notification -->
                            <a href="sy.php">
                              <i class="	glyphicon glyphicon-education"></i> Add School Year
                            </a>
                          </li><!-- end notification -->

                          <li><!-- start notification -->
                            <a href="settings.php">
                              <i class="	glyphicon glyphicon-education"></i> Set School Year
                            </a>
                          </li><!-- end notification -->

                         
                        
						  
						
                        </ul>
                      </li>
                     
                    </ul>
                  </li>
                 
                  <!-- Tasks Menu -->
				  <li class="">
                    <!-- Menu Toggle Button -->
                    <a href="profile.php" class="dropdown-toggle" style=" color:#E3BC9A">
                      <i class="glyphicon glyphicon-info-sign"></i>
                      <?php echo $_SESSION['name'];?>
                    </a>
                  </li>
                  <li class="">
                    <!-- Menu Toggle Button -->
                    <a href="logout.php" class="dropdown-toggle" style="color:#E3BC9A;">
                      <i class="glyphicon glyphicon-off text-#E3BC9A"></i> Logout                    
                      
                    </a>
                  </li>
                  
                </ul>
              </div><!-- /.navbar-custom-menu -->
          </div><!-- /.container-fluid -->
        </nav>
      </header>