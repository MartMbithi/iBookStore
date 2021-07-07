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
require_once('config/config.php');
//handle unlock
if (isset($_POST['unlock'])) {
    $login_user_email = $_POST['login_user_email'];
    $login_user_password = sha1(md5($_POST['login_user_password'])); //double encrypt to increase security
    $stmt = $mysqli->prepare("SELECT login_user_email, login_user_password  FROM iBookStore_Login  WHERE login_user_email =? AND login_user_password =?"); //sql to log in user
    $stmt->bind_param('ss',  $login_user_email, $login_user_password); //bind fetched parameters
    $stmt->execute(); //execute bind 
    $stmt->bind_result($login_user_email, $login_user_password); //bind result
    $rs = $stmt->fetch();
    if ($rs) {
        //if its sucessfull
        header("location:pages_admin_dashboard.php");
    } else {
        $err = "Incorrect Password";
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
                        <?php
                        //Load Logged in User Session
                        $login_id = $_SESSION['login_id'];
                        $ret = "SELECT * FROM `iBookStore_Login` WHERE login_id =? ";
                        $stmt = $mysqli->prepare($ret);
                        $stmt->bind_param('i', $login_id);
                        $stmt->execute();
                        $res = $stmt->get_result();
                        $cnt = 1;
                        while ($logged_user = $res->fetch_object()) {

                        ?>
                            <div class="d-flex user-meta">
                                <img src="assets/img/admin.jpg" class="usr-profile" alt="avatar">
                                <div class="">
                                    <p class=""><?php echo $logged_user->login_user_name; ?></p>
                                </div>
                            </div>
                            <form method="post" class="text-left">
                                <div class="form">
                                    <div id="password-field" class="field-wrapper input mb-2">
                                        <div class="d-flex justify-content-between">
                                            <label for="password">PASSWORD</label>
                                            <a href="pages_staff_logout.php" class="forgot-pass-link">Log Out?</a>
                                        </div>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-lock">
                                            <rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect>
                                            <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
                                        </svg>
                                        <input required id="password" name="login_user_password" type="password" class="form-control" placeholder="Password">
                                        <input id="email" style="display:none" name="login_user_email" value="<?php echo $logged_user->login_user_email; ?>" type="email" class="form-control">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" id="toggle-password" class="feather feather-eye">
                                            <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                            <circle cx="12" cy="12" r="3"></circle>
                                        </svg>
                                    </div>
                                    <div class="d-sm-flex justify-content-between">
                                        <div class="field-wrapper">
                                            <button type="submit" name="unlock" class="btn btn-primary" value="">Unlock</button>
                                        </div>
                                    </div>

                                </div>
                            </form>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php require_once('partials/_scripts.php'); ?>
    <script type="text/javascript">
        //Prevent use of back arrow after locking screen
        var path = 'pages_staff_lock_screen.php';
        history.pushState(null, null, path + window.location.search);
        window.addEventListener('popstate', function(event) {
            history.pushState(null, null, path + window.location.search);
        });
    </script>
</body>

</html>