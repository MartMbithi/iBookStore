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
//Deny LOgin
if (isset($_GET['deny_login'])) {
    $id = intval($_GET['deny_login']);
    $email = $_GET['email'];
    $allow_login = 0;
    $delete = "DELETE FROM  iBookStore_Login  WHERE  login_user_email = ?";
    $update = "UPDATE iBookStore_HRM SET allow_login= ? WHERE staff_id =? ";
    $deletestmt = $mysqli->prepare($delete);
    $updatestmt = $mysqli->prepare($update);
    $deletestmt->bind_param('s', $email);
    $updatestmt->bind_param('ii', $allow_login, $id);
    $deletestmt->execute();
    $updatestmt->execute();
    $deletestmt->close();
    $updatestmt->close();
    if ($deletestmt && $updatestmt) {
        $success = "Denied Login Permission" && header("refresh:1; url=pages_admin_login_permissions.php");
    } else {
        $err = "Try Again Later";
    }
}
require_once('partials/_head.php');
?>

<body>

    <!--  BEGIN NAVBAR  -->
    <?php require_once('partials/_nav.php'); ?>
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
                                <li class="breadcrumb-item active" aria-current="page"><span>Manage Staff</span></li>
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

        <!--  BEGIN CONTENT AREA  -->
        <div id="content" class="main-content">
            <div class="layout-px-spacing">

                <div class="row layout-top-spacing">

                    <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                        <div class="widget-content widget-content-area br-6">
                            <div class="table-responsive mb-4 mt-4">
                                <table id="html5-extension" class="table table-hover non-hover" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Number</th>
                                            <th>ID No</th>
                                            <th>DOB</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>Gender</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        //Fetch all Staff In created_at.Desc
                                        $ret = "SELECT * FROM  iBookStore_HRM";
                                        $stmt = $mysqli->prepare($ret);
                                        $stmt->execute();
                                        $res = $stmt->get_result();
                                        $cnt = 1;
                                        while ($staff = $res->fetch_object()) {
                                        ?>
                                            <tr>
                                                <td><?php echo $staff->staff_name; ?></td>
                                                <td><?php echo $staff->staff_number; ?></td>
                                                <td><?php echo $staff->staff_natid; ?></td>
                                                <td><?php echo $staff->staff_dob; ?></td>
                                                <td><?php echo $staff->staff_email; ?></td>
                                                <td><?php echo $staff->staff_phone; ?></td>
                                                <td><?php echo $staff->staff_gender; ?></td>
                                                <td>
                                                    <?php
                                                    if ($staff->allow_login == '0') {
                                                        echo
                                                        "
                                                                <a href='pages_admin_allow_login.php?email=$staff->staff_email&id=$staff->staff_id&allow_login=1' class='badge outline-badge-success bs-tooltip' data-toggle='tooltip' data-placement='top' data-original-title='Give $staff->staff_name Login Permissions'>
                                                                    Allow Login
                                                                    <svg xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2' stroke-linecap='round' stroke-linejoin='round' class='feather feather-activity'><path d='M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2'></path><circle cx='8.5' cy='7' r='4'></circle><polyline points='17 11 19 13 23 9'></polyline></svg>                                                                 </a>
                                                            ";
                                                    } else {
                                                        echo
                                                        "
                                                                <a href='pages_admin_login_permissions.php?deny_login=$staff->staff_id&email=$staff->staff_email&id=$staff->staff_id' class='badge outline-badge-danger bs-tooltip' data-toggle='tooltip' data-placement='top' data-original-title='Deny $staff->staff_name Login Permissions'>
                                                                     Deny Login
                                                                    <svg xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2' stroke-linecap='round' stroke-linejoin='round' class='feather feather-activity'><path d='M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2'></path><circle cx='8.5' cy='7' r='4'></circle><line x1='18' y1='8' x2='23' y2='13'></line><line x1='23' y1='8' x2='18' y2='13'></line></svg> 
                                                                    <svg xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2' stroke-linecap='round' stroke-linejoin='round' class='feather feather-activity'><path d='M14 22h5a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2h-5'></path><polyline points='11 16 15 12 11 8'></polyline><line x1='15' y1='12' x2='3' y2='12'></line></svg> 
                                                                </a>
                                                            ";
                                                    }
                                                    ?>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
            <?php require_once('partials/_footer.php'); ?>
        </div>
        <!--  END CONTENT AREA  -->
    </div>
    <?php require_once('partials/_scripts.php'); ?>


    </html>