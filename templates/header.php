
<header>
    <!-- Start Session for user  -->
    <?php session_start(); ?>
    <!-- NavBar -->
    <nav class="shadow">
        <ul class="nav d-flex align-items-center justify-content-between p-3 h-auto ">
            <li><a href="#"><img src="../assets/images/u.png" alt="logo" width = "50px" class="rounded-5"></a></li>
            <li class=" d-flex w-50  justify-content-evenly nav-search" style="height:40px ">

                        <form action="../function/search.php" method="GET" class="form-inline d-flex g-3">
                            <input type="text" name="search" class="form-control" style="margin-right: 5%; width:300px;">
                            <input type="submit" value="Search" name="srch" class="form-control" style="width:100px">
                        </form>
                        <ul class="list-unstyled profile" >
                            <?php if (isset($_SESSION['user'])) {
                                $user = $_SESSION['user']; ?>
                                <div class="dropdown">
                                    <button class="dropdown-toggle custom-btn" id="userDropdown" type="button" data-toggle="dropdown" aria-expanded="false">
                                   <strong> <?php echo $user; ?></strong>
                                    </button>
                                    <ul class="dropdown-menu custom-dropdown-menu" aria-labelledby="userDropdown">
                                        <li class="nav-item"><a href="../pages/create-blog.php" class="btn btn-primary" class="nav-link">Create</button></a></li>
                                        <li class="nav-item"><a href="../pages/Profile.php" class="btn btn-primary" class="nav-link">Profile</a></li>
                                        <li class="nav-item"><a href="../function/logout.php" class="btn btn-outline-danger">Logout</a></li>
                                    </ul>
                                </div>
                            </ul>
                                </li>
                            <?php } else {
                                echo "<li><button class='btn btn-secondary' ><a class='text-decoration-none text-white' href='../pages/register.php'><small>Register or Log-in</small></a></button></li>";
                            } ?>
                        </ul>
                    </li>
                </div>        
            </li>
        </ul>
    </nav>
</header>