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

if (isset($_POST['update_category'])) {
    if (empty($_POST["cat_name"]) || empty($_POST["cat_number"]) || empty($_POST['cat_desc'])) {
        $err = "Blank Values Not Accepted😬!";
    } else {
        $cat_name = $_POST['cat_name'];
        $cat_number = $_POST['cat_number'];
        $cat_desc = $_POST['cat_desc'];
        $update = $_GET['update'];

        //Insert Captured information to a database table
        $postQuery = "UPDATE iBookStore_book_categories SET cat_name =?, cat_number =?, cat_desc =? WHERE  cat_id =?";
        $postStmt = $mysqli->prepare($postQuery);
        //bind paramaters
        $rc = $postStmt->bind_param('sssi', $cat_name, $cat_number, $cat_desc, $update);
        $postStmt->execute();
        //declare a varible which will be passed to alert function
        if ($postStmt) {
            $success = "Book Category Updated" && header("refresh:1; url=pages_staff_manage_category.php");
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
    require_once('partials/_staffNav.php');
    $update = $_GET['update'];
    $ret = "SELECT * FROM  iBookStore_book_categories WHERE cat_id ='$update' ";
    $stmt = $mysqli->prepare($ret);
    $stmt->execute();
    $res = $stmt->get_result();
    $cnt = 1;
    while ($categories = $res->fetch_object()) {
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
                                    <li class="breadcrumb-item"><a href="pages_staff_dashboard.php">Dashboard</a></li>
                                    <li class="breadcrumb-item"><a href="javascript:void(0);">Books</a></li>
                                    <li class="breadcrumb-item"><a href="javascript:void(0);">Manage Book Categories</a></li>
                                    <li class="breadcrumb-item active" aria-current="page"><span><?php echo $categories->cat_name; ?></span></li>
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
            <?php require_once('partials/_staffSideNav.php'); ?>
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
                                                <label for="inputEmail4">Book Category Name</label>
                                                <input type="name" name="cat_name" value="<?php echo $categories->cat_name; ?>" class="form-control">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="inputPassword4">Book Category Number</label>
                                                <input type="text" name="cat_number" value="<?php echo $categories->cat_number; ?>" class="form-control">
                                            </div>
                                        </div>

                                        <div class="form-row mb-4">
                                            <div class="form-group col-md-12">
                                                <label for="inputCity">Book Category Description</label>
                                                <textarea type="text" rows="5" name="cat_desc" class="form-control"><?php echo $categories->cat_desc; ?></textarea>
                                            </div>
                                        </div>
                                        <button type="submit" name="update_category" class="btn btn-primary mt-3">Update</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php require_once('partials/_footer.php'); ?>
            </div>
            <!--  END CONTENT PART  -->
        </div>
    <?php require_once('partials/_scripts.php');
    } ?>

</body>

</html>