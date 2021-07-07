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

if (isset($_POST['add_sale'])) {
    if (empty($_POST["s_code"]) || empty($_POST["b_isbn"]) || empty($_POST['s_amt']) || empty($_POST['b_title']) || empty($_POST['s_date'])) {
        $err = "Blank Values Not Accepted😬!";
    } else {
        $b_title = $_POST['b_title'];
        $b_isbn = $_POST['b_isbn'];
        $s_code = $_POST['s_code'];
        $s_amt =  $_POST['s_amt'];
        $b_id = $_POST['b_id'];
        $s_month = $_POST['s_month'];
        $s_date = $_POST['s_date'];
        $s_year = $_POST['s_year'];
        $s_copies = $_POST['s_copies'];

        //Create a log 
        $log_content = $_POST['log_content'];

        //Insert Captured information to a database table
        $postQuery = "INSERT INTO iBookStore_Sales (s_copies, b_title, b_isbn, s_code, s_amt, b_id, s_month, s_date, s_year) VALUES (?,?,?,?,?,?,?,?,?)";
        $logQry = "INSERT INTO iBookStore_logs (log_code, log_content) VALUE (?,?)";
        $postStmt = $mysqli->prepare($postQuery);
        $logStmt = $mysqli->prepare($logQry);
        //bind paramaters
        $rc = $postStmt->bind_param('sssssssss', $s_copies, $b_title, $b_isbn, $s_code, $s_amt, $b_id, $s_month, $s_date, $s_year);
        $rc = $logStmt->bind_param('ss', $s_code, $log_content);
        $postStmt->execute();
        $logStmt->execute();
        //declare a varible which will be passed to alert function
        if ($postStmt  && $logStmt) {
            $success = "Book Sold" && header("refresh:1; url=pages_staff_add_sale_record.php");
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
                                <li class="breadcrumb-item"><a href="pages_staff_add_sale_record.php">Sales</a></li>
                                <li class="breadcrumb-item active" aria-current="page"><span>Add Sale Record</span></li>
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
                                        <div class="form-group col-md-4">
                                            <label for="inputEmail4">Sale Code | Number</label>
                                            <input type="name" name="s_code" value="<?php echo $alpha; ?>-<?php echo $beta; ?>" class="form-control">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="inputEmail4">Copies Sold</label>
                                            <input type="name" name="s_copies" id="copies" class="form-control">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="inputState">Book ISBN Number</label>
                                            <select name="b_isbn" id="bookISBN" onChange="getBookDetails(this.value)" class="form-control  basic">
                                                <option selected="selected">Select ISBN Number</option>
                                                <?php
                                                $ret = "SELECT * FROM  iBookStore_books";
                                                $stmt = $mysqli->prepare($ret);
                                                $stmt->execute();
                                                $res = $stmt->get_result();
                                                $cnt = 1;
                                                while ($books = $res->fetch_object()) {

                                                ?>
                                                    <option><?php echo $books->b_isbn; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-row mb-4">
                                        <div class="form-group col-md-6">
                                            <label for="inputEmail4">Price Per Book (Ksh)</label>
                                            <input type="text" name="s_amt" readonly id="bookPrice" class="form-control">
                                        </div>
                                        <div class="form-group col-md-6" style="display:none">
                                            <label for="inputEmail4">Log Messange</label>
                                            <input type="text" name="log_content" readonly value="Book Sold" class="form-control">
                                        </div>
                                        <div class="form-group col-md-6" style="display:none">
                                            <label for="inputEmail4">Book ID</label>
                                            <input type="text" name="b_id" id="book_ID" class="form-control">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="inputPassword4">Book Title</label>
                                            <input type="text" name="b_title" readonly id="bookTitle" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-row mb-4" style="display:none">
                                        <div class="form-group col-md-4">
                                            <label for="inputEmail4">Date</label>
                                            <input type="text" readonly name="s_date" value="<?php echo date('d'); ?>" class="form-control">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="inputPassword4">Month</label>
                                            <input type="text" readonly name="s_month" value="<?php echo date('M'); ?>" class="form-control">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="inputPassword4">Year</label>
                                            <input type="text" readonly name="s_year" value="<?php echo date('Y'); ?>" class="form-control">
                                        </div>
                                    </div>
                                    <button type="submit" name="add_sale" class="btn btn-primary mt-3">Save</button>
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
    <?php require_once('partials/_scripts.php'); ?>
</body>

</html>