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
require_once('partials/_head.php');
?>

<body>

    <!--  BEGIN NAVBAR  -->
    <?php
    require_once('partials/_nav.php');
    $receipt = $_GET['receipt'];
    $ret = "SELECT * FROM  iBookStore_Sales WHERE s_code = '$receipt' ";
    $stmt = $mysqli->prepare($ret);
    $stmt->execute();
    $res = $stmt->get_result();
    $cnt = 1;
    while ($sales = $res->fetch_object()) {
        $total_amt = $sales->s_amt * $sales->s_copies;
        $tax = 0.14 * $total_amt;
        $taxable = $total_amt - $tax;

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
                                    <li class="breadcrumb-item"><a href="pages_admin_accounting.php">Accounting</a></li>
                                    <li class="breadcrumb-item active" aria-current="page"><span><?php echo $sales->s_code; ?></span></li>
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
                    <div class="row invoice layout-top-spacing">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="app-hamburger-container">
                                <div class="hamburger"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-menu chat-menu d-xl-none">
                                        <line x1="3" y1="12" x2="21" y2="12"></line>
                                        <line x1="3" y1="6" x2="21" y2="6"></line>
                                        <line x1="3" y1="18" x2="21" y2="18"></line>
                                    </svg></div>
                            </div>
                            <div class="doc-container">
                                <div class="tab-title">
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12 col-12">
                                            <div class="search">
                                                <input type="text" class="form-control" placeholder="Search...">
                                            </div>
                                            <ul class="nav nav-pills inv-list-container d-block" id="pills-tab" role="tablist">
                                                <li class="nav-item">
                                                    <div class="nav-link list-actions" id="invoice-00001" data-invoice-id="00001">
                                                        <div class="f-m-body">
                                                            <div class="f-head">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-dollar-sign">
                                                                    <line x1="12" y1="1" x2="12" y2="23"></line>
                                                                    <path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path>
                                                                </svg>
                                                            </div>
                                                            <div class="f-body">
                                                                <p class="invoice-number">Receipt #<?php echo $sales->s_code; ?></p>
                                                                <p class="invoice-generated-date">Date: <?php echo date("d M Y ", strtotime($sales->created_at)); ?></p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>

                                <div class="invoice-container">
                                    <div class="invoice-inbox">

                                        <div class="inv-not-selected">
                                            <p>Open Any Receipt From The List.</p>
                                        </div>

                                        <div class="invoice-header-section">
                                            <h4 class="inv-number"></h4>
                                            <div class="invoice-action">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-printer action-print" data-toggle="tooltip" data-placement="top" data-original-title="Print">
                                                    <polyline points="6 9 6 2 18 2 18 9"></polyline>
                                                    <path d="M6 18H4a2 2 0 0 1-2-2v-5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2h-2"></path>
                                                    <rect x="6" y="14" width="12" height="8"></rect>
                                                </svg>
                                            </div>
                                        </div>

                                        <div id="ct" class="">
                                            <div class="invoice-00001">
                                                <div class="content-section  animated animatedFadeInUp fadeInUp">

                                                    <div class="row inv--head-section">

                                                        <div class="col-sm-6 col-12">
                                                            <h3 class="in-heading">Sale Receipt</h3>
                                                        </div>
                                                        <div class="col-sm-6 col-12 align-self-center text-sm-right">
                                                            <div class="company-info">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-hexagon">
                                                                    <path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path>
                                                                </svg>
                                                                <h5 class="inv-brand-name">iBookStore</h5>
                                                            </div>
                                                        </div>

                                                    </div>

                                                    <div class="row inv--detail-section">

                                                        <div class="col-sm-7 align-self-center">
                                                            <p class="inv-to">Purchase Of:</p>
                                                        </div>
                                                        <div class="col-sm-5 align-self-center  text-sm-right order-sm-0 order-1">
                                                            <p class="inv-detail-title"><?php echo $sales->b_title; ?></p>
                                                        </div>

                                                        <div class="col-sm-7 align-self-center">
                                                            <p class="inv-customer-name">ISBN: <?php echo $sales->b_isbn; ?></p>
                                                        </div>
                                                        <div class="col-sm-5 align-self-center  text-sm-right order-2">
                                                            <p class="inv-created-date"><span class="inv-title">Purchase Date : </span><?php echo date("d M Y ", strtotime($sales->created_at)); ?><span class="inv-date"></span></p>
                                                        </div>
                                                    </div>

                                                    <div class="row inv--product-table-section">
                                                        <div class="col-12">
                                                            <div class="table-responsive">
                                                                <table class="table">
                                                                    <thead class="">
                                                                        <tr>
                                                                            <th scope="col">S.No</th>
                                                                            <th scope="col">Items</th>
                                                                            <th class="text-right" scope="col">Qty</th>
                                                                            <th class="text-right" scope="col">Unit Price</th>
                                                                            <th class="text-right" scope="col">Amount</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <tr>
                                                                            <td><?php echo $sales->s_code; ?></td>
                                                                            <td><?php echo $sales->b_title; ?></td>
                                                                            <td class="text-right"><?php echo $sales->s_copies; ?></td>
                                                                            <td class="text-right">Ksh <?php echo $sales->s_amt; ?></td>
                                                                            <td class="text-right">Ksh <?php echo $total_amt; ?></td>
                                                                        </tr>

                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row mt-4">
                                                        <div class="col-sm-5 col-12 order-sm-0 order-1">
                                                            <div class="inv--payment-info">

                                                            </div>
                                                        </div>
                                                        <div class="col-sm-7 col-12 order-sm-1 order-0">
                                                            <div class="inv--total-amounts text-sm-right">
                                                                <div class="row">
                                                                    <div class="col-sm-8 col-7">
                                                                        <p class="">Sub Total: </p>
                                                                    </div>
                                                                    <div class="col-sm-4 col-5">
                                                                        <p class="">Ksh <?php echo $total_amt; ?></p>
                                                                    </div>
                                                                    <div class="col-sm-8 col-7">
                                                                        <p class="">Tax Amount: </p>
                                                                    </div>
                                                                    <div class="col-sm-4 col-5">
                                                                        <p class="">14%</p>
                                                                    </div>
                                                                    <div class="col-sm-8 col-7">
                                                                        <p class="">Tax Addition </p>
                                                                    </div>
                                                                    <div class="col-sm-4 col-5">
                                                                        <p class="">Ksh <?php echo $tax; ?></p>
                                                                    </div>
                                                                    <div class="col-sm-8 col-7 grand-total-title">
                                                                        <h4 class="">Grand Total : </h4>
                                                                    </div>
                                                                    <div class="col-sm-4 col-5 grand-total-amount">
                                                                        <h4 class="">Ksh <?php echo $taxable; ?></h4>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>


                                    </div>

                                    <div class="inv--thankYou">
                                        <div class="row">
                                            <div class="col-sm-12 col-12">
                                                <p class="">Thank you for doing Business with us.</p>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            <?php require_once('partials/_footer.php');
        } ?>
            </div>
            <!--  END CONTENT AREA  -->

        </div>
        <!-- END MAIN CONTAINER -->
        <?php require_once('partials/_scripts.php'); ?>
</body>

</html>