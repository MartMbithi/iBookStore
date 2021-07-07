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
if (isset($_POST['update_staff'])) {
    if (empty($_POST["staff_name"]) || empty($_POST["staff_number"]) || empty($_POST['staff_natid'])) {
        $err = "Blank Values Not Accepted😬!";
    } else {

        $staff_name = $_POST['staff_name'];
        $staff_number = $_POST['staff_number'];
        $staff_natid = $_POST['staff_natid'];
        $staff_phone = $_POST['staff_phone'];
        $staff_email = $_POST['staff_email'];
        $staff_gender = $_POST['staff_gender'];
        $staff_dob = $_POST['staff_dob'];
        $staff_passport = $_FILES["staff_passport"]["name"];
        move_uploaded_file($_FILES["staff_passport"]["tmp_name"], "assets/img/" . $_FILES["staff_passport"]["name"]);
        $staff_bio = $_POST['staff_bio'];
        $staff_adr = $_POST['staff_adr'];
        $update = $_GET['update'];

        //Insert Captured information to a database table
        $postQuery = "UPDATE iBookStore_HRM SET staff_name =?, staff_number =?, staff_natid =?, staff_phone =?, staff_email =?, staff_gender =?, staff_dob =?, staff_passport =?, staff_bio =?, staff_adr =? WHERE staff_id =?";
        $postStmt = $mysqli->prepare($postQuery);
        //bind paramaters
        $rc = $postStmt->bind_param('ssssssssssi', $staff_name, $staff_number, $staff_natid, $staff_phone, $staff_email, $staff_gender, $staff_dob, $staff_passport, $staff_bio, $staff_adr, $update);
        $postStmt->execute();
        //declare a varible which will be passed to alert function
        if ($postStmt) {
            $success = "Staff Updated" && header("refresh:1; url=pages_admin_manage_staff.php");
        } else {
            $err = "Please Try Again Or Try Later";
        }
    }
}
require_once('partials/_head.php');
require_once('partials/_codeGen.php');
?>

<body>
    <!-- BEGIN LOADER -->
    <div id="load_screen">
        <div class="loader">
            <div class="loader-content">
                <div class="spinner-grow align-self-center"></div>
            </div>
        </div>
    </div>
    <!--  END LOADER -->

    <!--  BEGIN NAVBAR  -->
    <?php
    require_once('partials/_nav.php');
    $update = $_GET['update'];
    $ret = "SELECT * FROM  iBookStore_HRM WHERE staff_id = '$update' ";
    $stmt = $mysqli->prepare($ret);
    $stmt->execute();
    $res = $stmt->get_result();
    $cnt = 1;
    while ($staff = $res->fetch_object()) {
    ?>
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
                                    <li class="breadcrumb-item"><a href="pages_admin_dashboard.php">Dashboard</a></li>
                                    <li class="breadcrumb-item"><a href="javascript:void(0);">HRM</a></li>
                                    <li class="breadcrumb-item"><a href="pages_admin_manage_staff.php">Manage Staff</a></li>
                                    <li class="breadcrumb-item active" aria-current="page"><span><?php echo $staff->staff_name; ?></span></li>
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
            <?php require_once('partials/_sidenav.php'); ?>
            <!--  END SIDEBAR  -->
            <!--  BEGIN CONTENT PART  -->
            <div id="content" class="main-content">
                <div class="layout-px-spacing">
                    <div class="row layout-top-spacing">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class=" widget box box-shadow">
                                <div class="widget-header">
                                    <div class="row">
                                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                            <h4>Fill All Required Fields</h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="">
                                    <form method="post" enctype="multipart/form-data">
                                        <div class="form-row mb-4">
                                            <div class="form-group col-md-6">
                                                <label for="inputEmail4">Full Name</label>
                                                <input type="name" name="staff_name" value="<?php echo $staff->staff_name; ?>" class="form-control">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="inputPassword4">Staff Number</label>
                                                <input type="text" name="staff_number" value="<?php echo $staff->staff_number; ?>" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-row mb-4">
                                            <div class="form-group col-md-4">
                                                <label for="inputAddress">Phone Number</label>
                                                <input type="text" name="staff_phone" value="<?php echo $staff->staff_phone; ?>" class="form-control">
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="inputAddress2">National ID Number</label>
                                                <input type="text" name="staff_natid" value="<?php echo $staff->staff_natid; ?>" class="form-control">
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="inputAddress2">Email Address</label>
                                                <input type="email" name="staff_email" value="<?php echo $staff->staff_email; ?>" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-row mb-4">
                                            <div class="form-group col-md-6">
                                                <label for="inputCity">Address</label>
                                                <input type="text" name="staff_adr" value="<?php echo $staff->staff_adr; ?>" class="form-control">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="inputCity">Passport</label>
                                                <input type="file" name="staff_passport" value="<?php echo $staff->staff_passport; ?>" class="form-control">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="inputState">Gender</label>
                                                <select name="staff_gender" class="form-control  basic">
                                                    <option selected="selected"><?php echo $staff->staff_gender; ?></option>
                                                    <option>Female</option>
                                                    <option>Male</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="inputZip">Date Of Birth</label>
                                                <input id="basicFlatpickr" value="<?php echo $staff->staff_dob; ?>" name="staff_dob" class="form-control flatpickr flatpickr-input active" type="text" placeholder="Select Date..">
                                            </div>
                                        </div>
                                        <div class="form-row mb-4">
                                            <div class="form-group col-md-12">
                                                <label for="inputCity">About | Bio </label>
                                                <textarea type="text" rows="5" name="staff_bio" class="form-control"><?php echo $staff->staff_bio; ?></textarea>
                                            </div>
                                        </div>
                                        <button type="submit" name="update_staff" class="btn btn-primary mt-3">Submit</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php require_once('partials/_footer.php');
        } ?>
            </div>
            <!--  END CONTENT PART  -->
        </div>
        <?php require_once('partials/_scripts.php'); ?>
</body>

</html>