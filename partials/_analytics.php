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

/*
    Perform all analytics here
*/

//1. Staffs
$query = "SELECT COUNT(*) FROM `iBookStore_HRM` ";
$stmt = $mysqli->prepare($query);
$stmt->execute();
$stmt->bind_result($staff);
$stmt->fetch();
$stmt->close();

//2. Book Categories
$query = "SELECT COUNT(*) FROM `iBookStore_book_categories` ";
$stmt = $mysqli->prepare($query);
$stmt->execute();
$stmt->bind_result($BookCategories);
$stmt->fetch();
$stmt->close();

//3. Total Books
$query = "SELECT SUM(b_count) FROM `iBookStore_books` ";
$stmt = $mysqli->prepare($query);
$stmt->execute();
$stmt->bind_result($Books);
$stmt->fetch();
$stmt->close();

//4. Allowed Login Staffs
$query = "SELECT COUNT(*) FROM `iBookStore_HRM` WHERE allow_login = '1' ";
$stmt = $mysqli->prepare($query);
$stmt->execute();
$stmt->bind_result($staffwithlogin);
$stmt->fetch();
$stmt->close();


//5. Pending Password Resets
$query = "SELECT COUNT(*) FROM `iBookStore_Password_Resets` WHERE reset_status = 'Pending' ";
$stmt = $mysqli->prepare($query);
$stmt->execute();
$stmt->bind_result($pendingResets);
$stmt->fetch();
$stmt->close();


//6. Total Sales This one has a bug
$query = "SELECT SUM(s_copies) FROM `iBookStore_Sales` ";
$stmt = $mysqli->prepare($query);
$stmt->execute();
$stmt->bind_result($sales);
$stmt->fetch();
$stmt->close();
