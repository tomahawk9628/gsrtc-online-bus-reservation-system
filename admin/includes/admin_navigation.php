<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="dash.php">Bus Ticket System Admin</a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                <li><a href="logout2.php">Home</a></li>
                
            
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fal fa-user-secret"></i> <?php echo ucfirst($_SESSION['s_username']); ?> <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <!--<li>
                            <a href="buses.php?source=add_bus"><i class="fas fa-bus"></i> Add Buses</a>
                        </li>-->
                        <li class="divider"></li>
                        <li>
                            <a href="changepass.php"><i class="fas fa-fw fa-user-secret"></i> Change Password</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="logout.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li>
                        <a href="dash.php"><i class="fal fa-tachometer-alt"></i> Dashboard</a>
                    </li>
                    <li>
                        <a href="sign_in.php"><i class="fal fa-sign-in-alt"></i> Sign Ins</a>
                    </li>
                    <li>
                        <a href="buses.php"><i class="fal fa-bus"></i> Buses</a>
                    </li>
                    <li>
                        <a href="cities.php"><i class="fal fa-city"></i> Cities</a>
                    </li>
                    <li>
                        <a href="registration.php"><i class="fal fa-sack-dollar"></i> Registrations</a>
                    </li>
                    <li>
                        <a href="faq.php" ><i class="fal fa-fw fa-question"></i> FAQs </i></a>
                        <!--<ul id="demo2" class="collapse">
                            <li>
                                <a href="faq.php">All FAQ</a>
                            </li>
                             <li>
                                <a href="includes/add_faq.php">Add FAQ</a>
                            </li> 
                        </ul>-->
                    </li>
                    <li>
                        <a href="categories.php"><i class="fal fa-tasks"></i> Categories</a>
                    </li>
                    <li>
                        <a href="query.php"><i class="fal fa-fw fa-comment"></i> Comments</a>
                    </li>
                    <!--<li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo1"><i class="fa fa-fw fa-arrows-v"></i> Users <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo1" class="collapse">
                            <li>
                                <a href="users.php">All Users</a>
                            </li>
                             <li>
                                <a href="users.php?source=update_user">Edit Buses</a>
                            </li> 
                        </ul>
                    </li>
                    <li>
                        <a href="../profile.php"><i class="fa fa-fw fa-dashboard"></i> Profile</a>
                    </li>-->
                    <li>
                        <a href="report.php"><i class="fal fa-fw fa-book"></i> Reports</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>