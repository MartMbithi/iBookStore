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
require_once('partials/_codeGen.php');

if (isset($_POST['reset_pwd'])) {
    if (!filter_var($_POST['reset_email'], FILTER_VALIDATE_EMAIL)) {
        $err = 'Invalid Email';
    }
    $checkEmail = mysqli_query($mysqli, "SELECT `login_user_email` FROM `iBookStore_Login` WHERE `login_user_email` = '" . $_POST['reset_email'] . "'") or exit(mysqli_error($mysqli));
    if (mysqli_num_rows($checkEmail) > 0) {
        //exit('This email is already being used');
        //Reset Password
        $reset_code = $_POST['reset_code'];
        $reset_token = sha1(md5($_POST['reset_token']));
        $reset_status = $_POST['reset_status'];
        $reset_email = $_POST['reset_email'];
        $query = "INSERT INTO iBookStore_Password_Resets (reset_email, reset_code, reset_token, reset_status) VALUES (?,?,?,?)";
        $reset = $mysqli->prepare($query);
        $rc = $reset->bind_param('ssss', $reset_email, $reset_code, $reset_token, $reset_status);
        $reset->execute();
        if ($reset) {
            $success = "Password Reset Instructions Sent To Your Email";
            // && header("refresh:1; url=index.php");
        } else {
            $err = "Please Try Again Or Try Later";
        }
    } else {
        $err = "No account with that email";
    }
}

require_once('partials/_head.php');
?>

<body class="form no-image-content">


    <div class="form-container outer">
        <div class="form-form">
            <div class="form-form-wrap">
                <div class="form-container">
                    <div class="form-content">

                        <h1 class="">Password Recovery</h1>
                        <p class="signup-link recovery">Enter your email and instructions will sent to you!</p>
                        <form method="post" class="text-left">
                            <div class="form">

                                <div id="email-field" class="field-wrapper input">
                                    <div class="d-flex justify-content-between">
                                        <label for="email">Email</label>
                                    </div>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-at-sign">
                                        <circle cx="12" cy="12" r="4"></circle>
                                        <path d="M16 8v5a3 3 0 0 0 6 0v-1a10 10 0 1 0-3.92 7.94"></path>
                                    </svg>
                                    <input id="email" name="reset_email" type="text" class="form-control" value="" placeholder="Email">
                                </div>

                                <div style="display:none">
                                    <input type="text" value="<?php echo $tk; ?>" name="reset_token">
                                    <input type="text" value="<?php echo $rc; ?>" name="reset_code">
                                    <input type="text" value="Pending" name="reset_status">
                                </div>

                                <div class="d-sm-flex justify-content-between">

                                    <div class="field-wrapper">
                                        <button type="submit" name="reset_pwd" class="btn btn-primary" value="">Reset</button>
                                    </div>
                                </div>

                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php require_once('partials/_scripts.php'); ?>

</body>

</html>