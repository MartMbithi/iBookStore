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

include('config/pdoconfig.php');

if (!empty($_POST["bookISBN"])) {
    $id = $_POST['bookISBN'];
    $stmt = $DB_con->prepare("SELECT * FROM  iBookStore_books WHERE b_isbn = :id");
    $stmt->execute(array(':id' => $id));
?>
<?php
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
?>
<?php echo htmlentities($row['b_id']); ?>
<?php
    }
}


if (!empty($_POST["book_ID"])) {
    $id = $_POST['book_ID'];
    $stmt = $DB_con->prepare("SELECT * FROM  iBookStore_books WHERE b_isbn = :id");
    $stmt->execute(array(':id' => $id));
?>
<?php
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
?>
<?php echo htmlentities($row['b_price']); ?>
<?php
    }
}

if (!empty($_POST["bookPrice"])) {
    $id = $_POST['bookPrice'];
    $stmt = $DB_con->prepare("SELECT * FROM  iBookStore_books WHERE b_isbn = :id");
    $stmt->execute(array(':id' => $id));
?>
<?php
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
?>
<?php echo htmlentities($row['b_title']); ?>
<?php
    }
}



if (!empty($_POST["bookTitle"])) {
    $id = $_POST['bookTitle'];
    $stmt = $DB_con->prepare("SELECT * FROM  iBookStore_books WHERE b_isbn = :id");
    $stmt->execute(array(':id' => $id));
?>
<?php
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
?>
<?php echo htmlentities($row['cat_name']); ?>
<?php
    }
}
