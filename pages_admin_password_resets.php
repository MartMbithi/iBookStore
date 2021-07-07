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
//Delete Password Reset
if (isset($_GET['delete'])) {
    $id = intval($_GET['delete']);
    $adn = "DELETE FROM  iBookStore_Password_Resets  WHERE  reset_id = ?";
    $stmt = $mysqli->prepare($adn);
    $stmt->bind_param('i', $id);
    $stmt->execute();
    $stmt->close();
    if ($stmt) {
        $success = "Deleted" && header("refresh:1; url=pages_admin_password_resets.php");
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
                                <li class="breadcrumb-item"><a href="javascript:void(0);">Password Resets</a></li>
                                <li class="breadcrumb-item active" aria-current="page"><span>Manage</span></li>
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
                                            <th>Reset Code</th>
                                            <th>Reset Token</th>
                                            <th>Reset Status</th>
                                            <th>Reset Email</th>
                                            <th>Date Requested</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $ret = "SELECT * FROM  iBookStore_Password_Resets";
                                        $stmt = $mysqli->prepare($ret);
                                        $stmt->execute();
                                        $res = $stmt->get_result();
                                        $cnt = 1;
                                        while ($resets = $res->fetch_object()) {
                                        ?>
                                            <tr>
                                                <td><span class="badge outline-badge-primary"><?php echo $resets->reset_code; ?></span></td>
                                                <td><?php echo $resets->reset_token; ?></td>
                                                <td>
                                                    <?php
                                                    if ($resets->reset_status == 'Pending') {
                                                        echo "<span class ='badge outline-badge-danger'>$resets->reset_status</span>";
                                                    } else {
                                                        echo "<span class ='badge outline-badge-success'>$resets->reset_status</span>";
                                                    }
                                                    ?>
                                                </td>
                                                <td><?php echo $resets->reset_email; ?></td>
                                                <td><?php echo date("d M Y - g:i", strtotime($resets->created_at)); ?></td>
                                                <td>
                                                    <?php
                                                    if ($resets->reset_status == 'Pending') {
                                                        echo
                                                        "
                                                                <a href='pages_admin_staff_password_resets.php?email=$resets->reset_email&id=$resets->reset_id&reset_status=Reset' class='badge outline-badge-danger bs-tooltip' data-toggle='tooltip' data-placement='top'>
                                                                    Reset Password
                                                                </a>
                                                            ";
                                                    } else {
                                                        echo
                                                        "
                                                                <a href='mailto:$resets->reset_email?subject=Password Reset&body=Hello $resets->reset_email, This is your new password $resets->reset_code kindly change it after logging in. Session Token $resets->reset_token'
                                                                 class='badge outline-badge-success bs-tooltip' data-toggle='tooltip' data-placement='top'>
                                                                     Send Mail
                                                                </a>

                                                                <a class='outline-badge-success'  data-toggle='tooltip' data-placement='top' href='pages_admin_password_resets.php?delete=$resets->reset_id'>
                                                                    Delete
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