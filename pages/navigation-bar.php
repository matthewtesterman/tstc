    <header>
        <div id="banner" class="container ">
        <nav id="" class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span> 
                </button>
                <a class="navbar-brand" href="#"><img src="../assets/images/tstc-logo.png" alt="" height="20" width="47"></a>

            </div>
            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav">
                    <li class="mainMenuItem"><a href="index.php"><i class="fa fa-home"></i> <span class="menuText">Home</span></a></li>
                    <li class="dropdown mainMenuItem">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#"> <i class="fa fa-suitcase"></i> <span class="menuText">Documents</span>
                            <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="documents-search.php"><span class="menuText">Browse/Search Documents</a></li>
                            <li><a href="documents-upload.php"><span class="menuText">Create Document</span></a></li>                               
                        </ul>
                    </li>
                    <li class="mainMenuItem"><a  href="user-management.php"><i class="fa fa-users"></i>  <span class="menuText">User Management</span></a></li>
                </ul>

                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#"> <i class="fa fa-user"></i> Account
                            <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="#">Change Email</a></li>
                            <li><a href="logout.php">Sign Out ($user_name)</a></li> 
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    </div>
    </header>