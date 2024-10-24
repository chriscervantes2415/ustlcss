<header class="main-header">
<nav class="navbar navbar-static-top">
  <div class="container">
    <div class="navbar-header" style="padding-left:20px">
      <a href="http://localhost/schedulings/pages/home.php">
        <img class="img-ceafalogo" src="../dist/img/My project.png" alt="ceafa logo" width="75" height="75" style="position:relative; right:160px; bottom:2px;">
      </a>
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false">
        <i class="fa fa-bars"></i>
      </button>
    </div>

    <!-- Collapsible content for mobile -->
    <div class="collapse navbar-collapse" id="navbar-collapse">
      <ul class="nav navbar-nav navbar-right" style="margin-left: 150px; margin-top: 10px;">
        <!-- Scheduling Link -->
        <li>
          <a href="home.php" style="font-size:14px; color:#E3BC9A"><i class="glyphicon glyphicon-list-alt"></i> Scheduling</a>
        </li>

        <!-- Data Entry Dropdown Menu -->
        <li class="dropdown notifications-menu">
          <a href="#" class="dropdown-toggle" style="color:#E3BC9A" data-toggle="dropdown">
            <i class="glyphicon glyphicon-pencil"></i> Data Entry
          </a>
          <ul class="dropdown-menu">
            <li>
              <ul class="menu">
                <li><a href="class.php"><i class="glyphicon glyphicon-user"></i> Class</a></li>
                <li><a href="room.php"><i class="glyphicon glyphicon-scale"></i> Room</a></li>
                <li><a href="subject.php"><i class="glyphicon glyphicon-user"></i> Subject</a></li>
                <li><a href="teacher.php"><i class="glyphicon glyphicon-user"></i> Teacher</a></li>
              </ul>
            </li>
          </ul>
        </li>

        <!-- Maintenance Dropdown Menu -->
        <li class="dropdown notifications-menu">
          <a href="#" class="dropdown-toggle" style="color:#E3BC9A" data-toggle="dropdown">
            <i class="glyphicon glyphicon-wrench"></i> Maintenance
          </a>
          <ul class="dropdown-menu">
            <li>
              <ul class="menu">
                <li><a href="program.php"><i class="glyphicon glyphicon-book"></i> Program</a></li>
                <li><a href="salut.php"><i class="glyphicon glyphicon-user"></i> Salutation</a></li>
                <li><a href="time.php"><i class="glyphicon glyphicon-time"></i> Time</a></li>
              </ul>
            </li>
          </ul>
        </li>

        <!-- Profile Link -->
        <li>
          <a href="profile.php" style="color:#E3BC9A;">
            <i class="glyphicon glyphicon-info-sign"></i> <?php echo $_SESSION['name'];?>
          </a>
        </li>

        <!-- Logout Link -->
        <li>
          <a href="logout.php" style="color:#E3BC9A;">
            <i class="glyphicon glyphicon-off"></i> Logout
          </a>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container -->
</nav>

      </header>