<nav class="navbar navbar-default  main-nav" role="navigation" >
            <div class="container-fluid">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header navbar-left" >
             <a class="navbar-brand"><a href="index.php" style="text-decoration:none;" ><span class="brand-text"></span><img src="../images/logo.png" class="img-responsive pull-left logoimg"  id="logo" alt="logo"/></a>
             </a>
                    <button type="button" class="navbar-toggle collapsed" style="background-color:#06a5e0;" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" >
                        <span class="sr-only" >Toggle Navigation</span>
                        <span class="icon-bar" style="background-color: #00102a" ></span>
                        <span class="icon-bar" style="background-color: #00102a"></span>
                        <span class="icon-bar" style="background-color: #00102a"></span>
                    </button>
                </div>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse " id="bs-example-navbar-collapse-1" >
                    <ul class="nav navbar-nav navbar-right navi nav-pills nav-stacked">
                        <li class="active"><a href="index.php" style="color:#00102a;">Home<span class="sr-only">(current)</span></a></li>
                        <li><a href="#"  style="color:#00102a;">About Us</a></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"  style="color:#00102a;">Add<span class="caret"></span></a>
                            <ul class="dropdown-menu " role="menu">
                                <li><a href="adddoc.php">Add Doctors</a></li>
                                <li class="divider"></li>
                                <li><a href="addNews.php">Add News</a></li>
                                <li class="divider"></li>
                                <li><a href="#">Add Videos</a></li>
                            </ul>
                        </li>
                        <li><a href="#" style="color:#00102a;">Contact Us</a></li>
                         <?php 
                         if(isset($_SESSION['id'])){
                         echo'<li><a href="../logout.php" class="btn-danger" style="color:#fff; font-size:16lopx;">LogOut
                         </a></li>';}
                         else{
                            echo'<li><a href="logreg.php" class="btn-info" style="color:#fff;font-size:16px;">LogIn
                         </a></li>';
                         }
                         ?>
                    </ul>
                </div><!-- navbar collapse end -->
            </div><!-- container-fluid end -->
</nav>
        