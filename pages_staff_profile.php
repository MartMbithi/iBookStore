<?php
/*
 * Created on Wed Jul 07 2021
 *
 * The MIT License (MIT)
 * Copyright (c) 2021 MartDevelopers Inc
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy of this software
 * and associated documentation files (the "Software"), to deal in the Software without restriction,
 * including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense,
 * and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so,
 * subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in all copies or substantial
 * portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED
 * TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL
 * THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT,
 * TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
 */

session_start();
include('config/config.php');
include('config/checklogin.php');
check_login();
//Load profile update logic
//update profile
if (isset($_POST['updateProfile'])) {
    if (empty($_POST["login_user_name"]) || empty($_POST["login_user_email"])) {
        $err = "Empty Fields Not Allowed";
    } else {

        $login_user_name = $_POST['login_user_name'];
        $login_user_email = $_POST['login_user_email'];
        $login_id = $_SESSION['login_id'];

        //Insert Captured information to a database table
        $postQuery = "UPDATE iBookStore_Login SET login_user_name =?, login_user_email =? WHERE login_id =? ";
        $postStmt = $mysqli->prepare($postQuery);
        //bind paramaters
        $rc = $postStmt->bind_param('ssi', $login_user_name, $login_user_email, $login_id);
        $postStmt->execute();
        //declare a varible which will be passed to alert function
        if ($postStmt) {
            $success = "Profile Updated" && header("refresh:1; url=pages_staff_profile.php");
        } else {
            $err = "Please Try Again Or Try Later";
        }
    }
}
if (isset($_POST['changePassword'])) {

    //Change Password
    $error = 0;
    if (isset($_POST['old_password']) && !empty($_POST['old_password'])) {
        $old_password = mysqli_real_escape_string($mysqli, trim(sha1(md5($_POST['old_password']))));
    } else {
        $error = 1;
        $err = "Old Password Cannot Be Empty";
    }
    if (isset($_POST['new_password']) && !empty($_POST['new_password'])) {
        $new_password = mysqli_real_escape_string($mysqli, trim(sha1(md5($_POST['new_password']))));
    } else {
        $error = 1;
        $err = "New Password Cannot Be Empty";
    }
    if (isset($_POST['confirm_password']) && !empty($_POST['confirm_password'])) {
        $confirm_password = mysqli_real_escape_string($mysqli, trim(sha1(md5($_POST['confirm_password']))));
    } else {
        $error = 1;
        $err = "Confirmation Password Cannot Be Empty";
    }

    if (!$error) {
        $sql = "SELECT * FROM  iBookStore_Login WHERE  login_user_password !='$old_password' ";
        $res = mysqli_query($mysqli, $sql);
        if (mysqli_num_rows($res) > 0) {
            $row = mysqli_fetch_assoc($res);
            if ($old_password == $row['login_user_password']) {
                $err =  "Please Enter Correct Old Password";
            } elseif ($new_password != $new_password) {
                $err = "Confirmation Password Does Not Match";
            }

            $login_id = $_SESSION['login_id'];
            $new_password = sha1(md5($_POST['new_password']));
            //Insert Captured information to a database table
            $query = "UPDATE iBookStore_Login SET  login_user_password=? WHERE login_id =?";
            $stmt = $mysqli->prepare($query);
            //bind paramaters
            $rc = $stmt->bind_param('si', $new_password, $login_id);
            $stmt->execute();

            //declare a varible which will be passed to alert function
            if ($stmt) {
                $success = "Password Changed" && header("refresh:1; url=pages_staff_profile.php");
            } else {
                $err = "Please Try Again Or Try Later";
            }
        }
    }
}
require_once('partials/_head.php');
?>

<body>

    <!--  BEGIN NAVBAR  -->
    <?php require_once('partials/_staffNav.php'); ?>
    <!--  END NAVBAR  -->

    <!--  BEGIN NAVBAR  -->
    <div class="sub-header-container">
        <header class="header navbar navbar-expand-sm">
            <a href="javascript:void(0);" class="sidebarCollapse" data-placement="bottom"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-menu">
                    <line x1="3" y1="12" x2="21" y2="12"></line>
                    <line x1="3" y1="6" x2="21" y2="6"></line>
                    <line x1="3" y1="18" x2="21" y2="18"></line>
                </svg></a>

            <ul class="navbar-nav flex-row">
                <li>
                    <div class="page-header">

                        <nav class="breadcrumb-one" aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="pages_staff_dashboard.php">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page"><span>Profile</span></li>
                            </ol>
                        </nav>

                    </div>
                </li>
            </ul>
        </header>
    </div>
    <!--  END NAVBAR  -->

    <!--  BEGIN MAIN CONTAINER  -->
    <div class="main-container" id="container">

        <div class="overlay"></div>
        <div class="search-overlay"></div>

        <!--  BEGIN SIDEBAR  -->
        <?php
        require_once('partials/_staffSideNav.php');

        $login_id = $_SESSION['login_id'];
        $ret = "SELECT * FROM `iBookStore_Login` WHERE login_id =? ";
        $stmt = $mysqli->prepare($ret);
        $stmt->bind_param('i', $login_id);
        $stmt->execute();
        $res = $stmt->get_result();
        while ($logged_user = $res->fetch_object()) {
        ?>
            <!--  END SIDEBAR  -->

            <!--  BEGIN CONTENT AREA  -->
            <div id="content" class="main-content">
                <div class="layout-px-spacing">

                    <div class="row layout-spacing">

                        <!-- Content -->
                        <div class="col-xl-4 col-lg-6 col-md-5 col-sm-12 layout-top-spacing">

                            <div class="user-profile layout-spacing">
                                <div class="widget-content widget-content-area">
                                    <div class="text-center user-info">
                                        <img src="assets/img/admin.jpg" alt="avatar">
                                        <p class=""><?php echo $logged_user->login_user_name; ?></p>
                                        <p><?php echo $logged_user->login_user_email; ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-8 col-lg-6 col-md-7 col-sm-12 layout-top-spacing">
                            <div class="bio layout-spacing ">
                                <div class="widget-content widget-content-area">
                                    <h3 class="">Update Profile</h3>
                                    <form method="post">
                                        <div class="row mb-4">
                                            <div class="col">
                                                <input type="text" class="form-control" name="login_user_email" placeholder="Email" value="<?php echo $logged_user->login_user_email; ?>">
                                            </div>
                                            <div class="col">
                                                <input type="text" class="form-control" name="login_user_name" placeholder="Username" value="<?php echo $logged_user->login_user_name; ?>">
                                            </div>
                                        </div>
                                        <input type="submit" name="updateProfile" value="Update Profile" class="btn btn-primary">
                                    </form>
                                    <hr>
                                </div>
                            </div>
                            <div class="bio layout-spacing ">
                                <div class="widget-content widget-content-area">
                                    <h3 class="">Change Password</h3>
                                    <form method="post">
                                        <div class="row mb-4">
                                            <div class="col">
                                                <input type="password" name="old_password" class="form-control" placeholder="Old Password">
                                            </div>
                                            <div class="col">
                                                <input type="password" name="new_password" class="form-control" placeholder="New Password">
                                            </div>
                                            <div class="col">
                                                <input type="password" name="confirm_password" class="form-control" placeholder="COnfirm New Password">
                                            </div>
                                        </div>
                                        <input type="submit" name="changePassword" value="Change Password" class="btn btn-danger">
                                    </form>
                                    <hr>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php require_once('partials/_footer.php'); ?>
            </div>
            <!--  END CONTENT AREA  -->
    </div>
    <!-- END MAIN CONTAINER -->
<?php require_once('partials/_scripts.php');
        } ?>
</body>

</html>