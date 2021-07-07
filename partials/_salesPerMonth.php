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

//1. Get all kindergern books sold in january
$query = "SELECT SUM(s_copies) FROM `iBookStore_Sales` WHERE b_cat = 'Kindergarten Books' AND s_month = 'Jan'  ";
$stmt = $mysqli->prepare($query);
$stmt->execute();
$stmt->bind_result($Kindergarten_jan);
$stmt->fetch();
$stmt->close();

//1. Get all kindergern books sold in Feb
$query = "SELECT SUM(s_copies) FROM `iBookStore_Sales` WHERE b_cat = 'Kindergarten Books' AND s_month = 'Feb'  ";
$stmt = $mysqli->prepare($query);
$stmt->execute();
$stmt->bind_result($Kindergarten_feb);
$stmt->fetch();
$stmt->close();

//1. Get all kindergern books sold in March
$query = "SELECT SUM(s_copies) FROM `iBookStore_Sales` WHERE b_cat = 'Kindergarten Books' AND s_month = 'Mar'  ";
$stmt = $mysqli->prepare($query);
$stmt->execute();
$stmt->bind_result($Kindergarten_mar);
$stmt->fetch();
$stmt->close();

//1. Get all kindergern books sold in April
$query = "SELECT SUM(s_copies) FROM `iBookStore_Sales` WHERE b_cat = 'Kindergarten Books' AND s_month = 'Apr'  ";
$stmt = $mysqli->prepare($query);
$stmt->execute();
$stmt->bind_result($Kindergarten_apr);
$stmt->fetch();
$stmt->close();

//1. Get all kindergern books sold in May
$query = "SELECT SUM(s_copies) FROM `iBookStore_Sales` WHERE b_cat = 'Kindergarten Books' AND s_month = 'May'  ";
$stmt = $mysqli->prepare($query);
$stmt->execute();
$stmt->bind_result($Kindergarten_may);
$stmt->fetch();
$stmt->close();

//1. Get all kindergern books sold in JUn
$query = "SELECT SUM(s_copies) FROM `iBookStore_Sales` WHERE b_cat = 'Kindergarten Books' AND s_month = 'Jun'  ";
$stmt = $mysqli->prepare($query);
$stmt->execute();
$stmt->bind_result($Kindergarten_jun);
$stmt->fetch();
$stmt->close();

//1. Get all kindergern books sold in July
$query = "SELECT SUM(s_copies) FROM `iBookStore_Sales` WHERE b_cat = 'Kindergarten Books' AND s_month = 'Jul'  ";
$stmt = $mysqli->prepare($query);
$stmt->execute();
$stmt->bind_result($Kindergarten_jul);
$stmt->fetch();
$stmt->close();

//1. Get all kindergern books sold in Aug
$query = "SELECT SUM(s_copies) FROM `iBookStore_Sales` WHERE b_cat = 'Kindergarten Books' AND s_month = 'Aug'  ";
$stmt = $mysqli->prepare($query);
$stmt->execute();
$stmt->bind_result($Kindergarten_aug);
$stmt->fetch();
$stmt->close();

//1. Get all kindergern books sold in Aug
$query = "SELECT SUM(s_copies) FROM `iBookStore_Sales` WHERE b_cat = 'Kindergarten Books' AND s_month = 'Sep'  ";
$stmt = $mysqli->prepare($query);
$stmt->execute();
$stmt->bind_result($Kindergarten_sep);
$stmt->fetch();
$stmt->close();

//1. Get all kindergern books sold in Oct
$query = "SELECT SUM(s_copies) FROM `iBookStore_Sales` WHERE b_cat = 'Kindergarten Books' AND s_month = 'Oct'  ";
$stmt = $mysqli->prepare($query);
$stmt->execute();
$stmt->bind_result($Kindergarten_oct);
$stmt->fetch();
$stmt->close();

//1. Get all kindergern books sold in Nov
$query = "SELECT SUM(s_copies) FROM `iBookStore_Sales` WHERE b_cat = 'Kindergarten Books' AND s_month = 'Nov'  ";
$stmt = $mysqli->prepare($query);
$stmt->execute();
$stmt->bind_result($Kindergarten_nov);
$stmt->fetch();
$stmt->close();

//1. Get all kindergern books sold in Dec
$query = "SELECT SUM(s_copies) FROM `iBookStore_Sales` WHERE b_cat = 'Kindergarten Books' AND s_month = 'Dec'  ";
$stmt = $mysqli->prepare($query);
$stmt->execute();
$stmt->bind_result($Kindergarten_dec);
$stmt->fetch();
$stmt->close();




//2. Get all Primary school books sold jan
$query = "SELECT SUM(s_copies) FROM `iBookStore_Sales` WHERE b_cat = 'Primary School Books' AND s_month='Jan' ";
$stmt = $mysqli->prepare($query);
$stmt->execute();
$stmt->bind_result($Primary_School_jan);
$stmt->fetch();
$stmt->close();

//2. Get all Primary school books sold Feb
$query = "SELECT SUM(s_copies) FROM `iBookStore_Sales` WHERE b_cat = 'Primary School Books' AND s_month='Feb' ";
$stmt = $mysqli->prepare($query);
$stmt->execute();
$stmt->bind_result($Primary_School_feb);
$stmt->fetch();
$stmt->close();

//2. Get all Primary school books sold Mar
$query = "SELECT SUM(s_copies) FROM `iBookStore_Sales` WHERE b_cat = 'Primary School Books' AND s_month='Mar' ";
$stmt = $mysqli->prepare($query);
$stmt->execute();
$stmt->bind_result($Primary_School_mar);
$stmt->fetch();
$stmt->close();

//2. Get all Primary school books sold Apr
$query = "SELECT SUM(s_copies) FROM `iBookStore_Sales` WHERE b_cat = 'Primary School Books' AND s_month='Apr' ";
$stmt = $mysqli->prepare($query);
$stmt->execute();
$stmt->bind_result($Primary_School_Apr);
$stmt->fetch();
$stmt->close();

//2. Get all Primary school books sold may
$query = "SELECT SUM(s_copies) FROM `iBookStore_Sales` WHERE b_cat = 'Primary School Books' AND s_month='May' ";
$stmt = $mysqli->prepare($query);
$stmt->execute();
$stmt->bind_result($Primary_School_may);
$stmt->fetch();
$stmt->close();

//2. Get all Primary school books sold jun
$query = "SELECT SUM(s_copies) FROM `iBookStore_Sales` WHERE b_cat = 'Primary School Books' AND s_month='Jun' ";
$stmt = $mysqli->prepare($query);
$stmt->execute();
$stmt->bind_result($Primary_School_jun);
$stmt->fetch();
$stmt->close();

//2. Get all Primary school books sold Jul
$query = "SELECT SUM(s_copies) FROM `iBookStore_Sales` WHERE b_cat = 'Primary School Books' AND s_month='Jul' ";
$stmt = $mysqli->prepare($query);
$stmt->execute();
$stmt->bind_result($Primary_School_jul);
$stmt->fetch();
$stmt->close();

//2. Get all Primary school books sold Aug
$query = "SELECT SUM(s_copies) FROM `iBookStore_Sales` WHERE b_cat = 'Primary School Books' AND s_month='Aug' ";
$stmt = $mysqli->prepare($query);
$stmt->execute();
$stmt->bind_result($Primary_School_aug);
$stmt->fetch();
$stmt->close();

//2. Get all Primary school books sold Sep
$query = "SELECT SUM(s_copies) FROM `iBookStore_Sales` WHERE b_cat = 'Primary School Books' AND s_month='Sep' ";
$stmt = $mysqli->prepare($query);
$stmt->execute();
$stmt->bind_result($Primary_School_Sep);
$stmt->fetch();
$stmt->close();

//2. Get all Primary school books sold Oct
$query = "SELECT SUM(s_copies) FROM `iBookStore_Sales` WHERE b_cat = 'Primary School Books' AND s_month='Oct' ";
$stmt = $mysqli->prepare($query);
$stmt->execute();
$stmt->bind_result($Primary_School_oct);
$stmt->fetch();
$stmt->close();

//2. Get all Primary school books sold Nov
$query = "SELECT SUM(s_copies) FROM `iBookStore_Sales` WHERE b_cat = 'Primary School Books' AND s_month='Nov' ";
$stmt = $mysqli->prepare($query);
$stmt->execute();
$stmt->bind_result($Primary_School_nov);
$stmt->fetch();
$stmt->close();

//2. Get all Primary school books sold Dec
$query = "SELECT SUM(s_copies) FROM `iBookStore_Sales` WHERE b_cat = 'Primary School Books' AND s_month='Dec' ";
$stmt = $mysqli->prepare($query);
$stmt->execute();
$stmt->bind_result($Primary_School_Dec);
$stmt->fetch();
$stmt->close();


//--------------------------------------------------------------------------------------------------------------------//

//3.  Get all secondary school books sold jan
$query = "SELECT SUM(s_copies) FROM `iBookStore_Sales` WHERE b_cat = 'Secondary School Books' AND s_month ='Jan' ";
$stmt = $mysqli->prepare($query);
$stmt->execute();
$stmt->bind_result($Secondary_School_jan);
$stmt->fetch();
$stmt->close();

//3.  Get all secondary school books sold Feb
$query = "SELECT SUM(s_copies) FROM `iBookStore_Sales` WHERE b_cat = 'Secondary School Books' AND s_month ='Feb' ";
$stmt = $mysqli->prepare($query);
$stmt->execute();
$stmt->bind_result($Secondary_School_Feb);
$stmt->fetch();
$stmt->close();

//3.  Get all secondary school books sold mar
$query = "SELECT SUM(s_copies) FROM `iBookStore_Sales` WHERE b_cat = 'Secondary School Books' AND s_month ='Mar' ";
$stmt = $mysqli->prepare($query);
$stmt->execute();
$stmt->bind_result($Secondary_School_mar);
$stmt->fetch();
$stmt->close();

//3.  Get all secondary school books sold Apr
$query = "SELECT SUM(s_copies) FROM `iBookStore_Sales` WHERE b_cat = 'Secondary School Books' AND s_month ='Apr' ";
$stmt = $mysqli->prepare($query);
$stmt->execute();
$stmt->bind_result($Secondary_School_apr);
$stmt->fetch();
$stmt->close();

//3.  Get all secondary school books sold May
$query = "SELECT SUM(s_copies) FROM `iBookStore_Sales` WHERE b_cat = 'Secondary School Books' AND s_month ='May' ";
$stmt = $mysqli->prepare($query);
$stmt->execute();
$stmt->bind_result($Secondary_School_may);
$stmt->fetch();
$stmt->close();

//3.  Get all secondary school books sold jun
$query = "SELECT SUM(s_copies) FROM `iBookStore_Sales` WHERE b_cat = 'Secondary School Books' AND s_month ='Jun' ";
$stmt = $mysqli->prepare($query);
$stmt->execute();
$stmt->bind_result($Secondary_School_jun);
$stmt->fetch();
$stmt->close();

//3.  Get all secondary school books sold jul
$query = "SELECT SUM(s_copies) FROM `iBookStore_Sales` WHERE b_cat = 'Secondary School Books' AND s_month ='Jul' ";
$stmt = $mysqli->prepare($query);
$stmt->execute();
$stmt->bind_result($Secondary_School_jul);
$stmt->fetch();
$stmt->close();

//3.  Get all secondary school books sold aug
$query = "SELECT SUM(s_copies) FROM `iBookStore_Sales` WHERE b_cat = 'Secondary School Books' AND s_month ='Aug' ";
$stmt = $mysqli->prepare($query);
$stmt->execute();
$stmt->bind_result($Secondary_School_aug);
$stmt->fetch();
$stmt->close();

//3.  Get all secondary school books sold Sep
$query = "SELECT SUM(s_copies) FROM `iBookStore_Sales` WHERE b_cat = 'Secondary School Books' AND s_month ='Sep' ";
$stmt = $mysqli->prepare($query);
$stmt->execute();
$stmt->bind_result($Secondary_School_sep);
$stmt->fetch();
$stmt->close();

//3.  Get all secondary school books sold oct
$query = "SELECT SUM(s_copies) FROM `iBookStore_Sales` WHERE b_cat = 'Secondary School Books' AND s_month ='Oct' ";
$stmt = $mysqli->prepare($query);
$stmt->execute();
$stmt->bind_result($Secondary_School_oct);
$stmt->fetch();
$stmt->close();

//3.  Get all secondary school books sold Nov
$query = "SELECT SUM(s_copies) FROM `iBookStore_Sales` WHERE b_cat = 'Secondary School Books' AND s_month ='Nov' ";
$stmt = $mysqli->prepare($query);
$stmt->execute();
$stmt->bind_result($Secondary_School_nov);
$stmt->fetch();
$stmt->close();

//3.  Get all secondary school books sold Dec
$query = "SELECT SUM(s_copies) FROM `iBookStore_Sales` WHERE b_cat = 'Secondary School Books' AND s_month ='Dec' ";
$stmt = $mysqli->prepare($query);
$stmt->execute();
$stmt->bind_result($Secondary_School_dec);
$stmt->fetch();
$stmt->close();


//-------------------------------------------------------------------------------------------------------//
//4.  Get all tertiary books jan
$query = "SELECT SUM(s_copies) FROM `iBookStore_Sales` WHERE b_cat = 'Tertiary Books' AND s_month = 'Jan' ";
$stmt = $mysqli->prepare($query);
$stmt->execute();
$stmt->bind_result($Tertiary_jan);
$stmt->fetch();
$stmt->close();

//4.  Get all tertiary books Feb
$query = "SELECT SUM(s_copies) FROM `iBookStore_Sales` WHERE b_cat = 'Tertiary Books' AND s_month = 'Feb' ";
$stmt = $mysqli->prepare($query);
$stmt->execute();
$stmt->bind_result($Tertiary_feb);
$stmt->fetch();
$stmt->close();

//4.  Get all tertiary books Mar
$query = "SELECT SUM(s_copies) FROM `iBookStore_Sales` WHERE b_cat = 'Tertiary Books' AND s_month = 'Mar' ";
$stmt = $mysqli->prepare($query);
$stmt->execute();
$stmt->bind_result($Tertiary_mar);
$stmt->fetch();
$stmt->close();

//4.  Get all tertiary books April
$query = "SELECT SUM(s_copies) FROM `iBookStore_Sales` WHERE b_cat = 'Tertiary Books' AND s_month = 'Apr' ";
$stmt = $mysqli->prepare($query);
$stmt->execute();
$stmt->bind_result($Tertiary_Apr);
$stmt->fetch();
$stmt->close();

//4.  Get all tertiary books May
$query = "SELECT SUM(s_copies) FROM `iBookStore_Sales` WHERE b_cat = 'Tertiary Books' AND s_month = 'May' ";
$stmt = $mysqli->prepare($query);
$stmt->execute();
$stmt->bind_result($Tertiary_may);
$stmt->fetch();
$stmt->close();

//4.  Get all tertiary books Jun
$query = "SELECT SUM(s_copies) FROM `iBookStore_Sales` WHERE b_cat = 'Tertiary Books' AND s_month = 'Jun' ";
$stmt = $mysqli->prepare($query);
$stmt->execute();
$stmt->bind_result($Tertiary_Jun);
$stmt->fetch();
$stmt->close();

//4.  Get all tertiary books jul
$query = "SELECT SUM(s_copies) FROM `iBookStore_Sales` WHERE b_cat = 'Tertiary Books' AND s_month = 'Jul' ";
$stmt = $mysqli->prepare($query);
$stmt->execute();
$stmt->bind_result($Tertiary_jul);
$stmt->fetch();
$stmt->close();

//4.  Get all tertiary books Aug
$query = "SELECT SUM(s_copies) FROM `iBookStore_Sales` WHERE b_cat = 'Tertiary Books' AND s_month = 'Aug' ";
$stmt = $mysqli->prepare($query);
$stmt->execute();
$stmt->bind_result($Tertiary_aug);
$stmt->fetch();
$stmt->close();

//4.  Get all tertiary books Sep
$query = "SELECT SUM(s_copies) FROM `iBookStore_Sales` WHERE b_cat = 'Tertiary Books' AND s_month = 'Sep' ";
$stmt = $mysqli->prepare($query);
$stmt->execute();
$stmt->bind_result($Tertiary_sep);
$stmt->fetch();
$stmt->close();

//4.  Get all tertiary books Oct
$query = "SELECT SUM(s_copies) FROM `iBookStore_Sales` WHERE b_cat = 'Tertiary Books' AND s_month = 'Oct' ";
$stmt = $mysqli->prepare($query);
$stmt->execute();
$stmt->bind_result($Tertiary_oct);
$stmt->fetch();
$stmt->close();

//4.  Get all tertiary books Nov
$query = "SELECT SUM(s_copies) FROM `iBookStore_Sales` WHERE b_cat = 'Tertiary Books' AND s_month = 'Nov' ";
$stmt = $mysqli->prepare($query);
$stmt->execute();
$stmt->bind_result($Tertiary_nov);
$stmt->fetch();
$stmt->close();

//4.  Get all tertiary books Dec
$query = "SELECT SUM(s_copies) FROM `iBookStore_Sales` WHERE b_cat = 'Tertiary Books' AND s_month = 'Dec' ";
$stmt = $mysqli->prepare($query);
$stmt->execute();
$stmt->bind_result($Tertiary_dec);
$stmt->fetch();
$stmt->close();


//---------------------------------------------------------------------------------------------------------//

//5.  Get all Novels books jan
$query = "SELECT SUM(s_copies) FROM `iBookStore_Sales` WHERE b_cat = 'Novels' AND s_month = 'Jan' ";
$stmt = $mysqli->prepare($query);
$stmt->execute();
$stmt->bind_result($Novels_jan);
$stmt->fetch();
$stmt->close();

//5.  Get all Novels books Feb
$query = "SELECT SUM(s_copies) FROM `iBookStore_Sales` WHERE b_cat = 'Novels' AND s_month = 'Feb' ";
$stmt = $mysqli->prepare($query);
$stmt->execute();
$stmt->bind_result($Novels_feb);
$stmt->fetch();
$stmt->close();

//5.  Get all Novels books March
$query = "SELECT SUM(s_copies) FROM `iBookStore_Sales` WHERE b_cat = 'Novels' AND s_month = 'Mar' ";
$stmt = $mysqli->prepare($query);
$stmt->execute();
$stmt->bind_result($Novels_mar);
$stmt->fetch();
$stmt->close();

//5.  Get all Novels books April
$query = "SELECT SUM(s_copies) FROM `iBookStore_Sales` WHERE b_cat = 'Novels' AND s_month = 'Apr' ";
$stmt = $mysqli->prepare($query);
$stmt->execute();
$stmt->bind_result($Novels_apr);
$stmt->fetch();
$stmt->close();

//5.  Get all Novels books May
$query = "SELECT SUM(s_copies) FROM `iBookStore_Sales` WHERE b_cat = 'Novels' AND s_month = 'May' ";
$stmt = $mysqli->prepare($query);
$stmt->execute();
$stmt->bind_result($Novels_may);
$stmt->fetch();
$stmt->close();

//5.  Get all Novels books June
$query = "SELECT SUM(s_copies) FROM `iBookStore_Sales` WHERE b_cat = 'Novels' AND s_month = 'Jun' ";
$stmt = $mysqli->prepare($query);
$stmt->execute();
$stmt->bind_result($Novels_jun);
$stmt->fetch();
$stmt->close();

//5.  Get all Novels books July
$query = "SELECT SUM(s_copies) FROM `iBookStore_Sales` WHERE b_cat = 'Novels' AND s_month = 'July' ";
$stmt = $mysqli->prepare($query);
$stmt->execute();
$stmt->bind_result($Novels_july);
$stmt->fetch();
$stmt->close();

//5.  Get all Novels books Aug
$query = "SELECT SUM(s_copies) FROM `iBookStore_Sales` WHERE b_cat = 'Novels' AND s_month = 'Aug' ";
$stmt = $mysqli->prepare($query);
$stmt->execute();
$stmt->bind_result($Novels_aug);
$stmt->fetch();
$stmt->close();

//5.  Get all Novels books Sep
$query = "SELECT SUM(s_copies) FROM `iBookStore_Sales` WHERE b_cat = 'Novels' AND s_month = 'Sep' ";
$stmt = $mysqli->prepare($query);
$stmt->execute();
$stmt->bind_result($Novels_sep);
$stmt->fetch();
$stmt->close();

//5.  Get all Novels books Oct
$query = "SELECT SUM(s_copies) FROM `iBookStore_Sales` WHERE b_cat = 'Novels' AND s_month = 'Oct' ";
$stmt = $mysqli->prepare($query);
$stmt->execute();
$stmt->bind_result($Novels_Oct);
$stmt->fetch();
$stmt->close();

//5.  Get all Novels books  nOV
$query = "SELECT SUM(s_copies) FROM `iBookStore_Sales` WHERE b_cat = 'Novels' AND s_month = 'Nov' ";
$stmt = $mysqli->prepare($query);
$stmt->execute();
$stmt->bind_result($Novels_Nov);
$stmt->fetch();
$stmt->close();

//5.  Get all Novels books  Dec
$query = "SELECT SUM(s_copies) FROM `iBookStore_Sales` WHERE b_cat = 'Novels' AND s_month = 'Dec' ";
$stmt = $mysqli->prepare($query);
$stmt->execute();
$stmt->bind_result($Novels_Dec);
$stmt->fetch();
$stmt->close();

//---------------------------------------------------------------------------------------------//

//6.  Get all Magazines Jan
$query = "SELECT SUM(s_copies) FROM `iBookStore_Sales` WHERE b_cat = 'Magazines' AND s_month ='Jan' ";
$stmt = $mysqli->prepare($query);
$stmt->execute();
$stmt->bind_result($Magazines_jan);
$stmt->fetch();
$stmt->close();

//6.  Get all Magazines Feb
$query = "SELECT SUM(s_copies) FROM `iBookStore_Sales` WHERE b_cat = 'Magazines' AND s_month ='Feb' ";
$stmt = $mysqli->prepare($query);
$stmt->execute();
$stmt->bind_result($Magazines_feb);
$stmt->fetch();
$stmt->close();

//6.  Get all Magazines March
$query = "SELECT SUM(s_copies) FROM `iBookStore_Sales` WHERE b_cat = 'Magazines' AND s_month ='Mar' ";
$stmt = $mysqli->prepare($query);
$stmt->execute();
$stmt->bind_result($Magazines_mar);
$stmt->fetch();
$stmt->close();

//6.  Get all Magazines April
$query = "SELECT SUM(s_copies) FROM `iBookStore_Sales` WHERE b_cat = 'Magazines' AND s_month ='Apr' ";
$stmt = $mysqli->prepare($query);
$stmt->execute();
$stmt->bind_result($Magazines_apr);
$stmt->fetch();
$stmt->close();

//6.  Get all Magazines May
$query = "SELECT SUM(s_copies) FROM `iBookStore_Sales` WHERE b_cat = 'Magazines' AND s_month ='May' ";
$stmt = $mysqli->prepare($query);
$stmt->execute();
$stmt->bind_result($Magazines_may);
$stmt->fetch();
$stmt->close();

//6.  Get all Magazines jun
$query = "SELECT SUM(s_copies) FROM `iBookStore_Sales` WHERE b_cat = 'Magazines' AND s_month ='Jun' ";
$stmt = $mysqli->prepare($query);
$stmt->execute();
$stmt->bind_result($Magazines_jun);
$stmt->fetch();
$stmt->close();

//6.  Get all Magazines July
$query = "SELECT SUM(s_copies) FROM `iBookStore_Sales` WHERE b_cat = 'Magazines' AND s_month ='Jul' ";
$stmt = $mysqli->prepare($query);
$stmt->execute();
$stmt->bind_result($Magazines_Jul);
$stmt->fetch();
$stmt->close();

//6.  Get all Magazines Aug
$query = "SELECT SUM(s_copies) FROM `iBookStore_Sales` WHERE b_cat = 'Magazines' AND s_month ='Aug' ";
$stmt = $mysqli->prepare($query);
$stmt->execute();
$stmt->bind_result($Magazines_aug);
$stmt->fetch();
$stmt->close();

//6.  Get all Magazines Sep
$query = "SELECT SUM(s_copies) FROM `iBookStore_Sales` WHERE b_cat = 'Magazines' AND s_month ='Sep' ";
$stmt = $mysqli->prepare($query);
$stmt->execute();
$stmt->bind_result($Magazines_sep);
$stmt->fetch();
$stmt->close();


//6.  Get all Magazines Oct
$query = "SELECT SUM(s_copies) FROM `iBookStore_Sales` WHERE b_cat = 'Magazines' AND s_month ='Oct' ";
$stmt = $mysqli->prepare($query);
$stmt->execute();
$stmt->bind_result($Magazines_oct);
$stmt->fetch();
$stmt->close();

//6.  Get all Magazines Nov
$query = "SELECT SUM(s_copies) FROM `iBookStore_Sales` WHERE b_cat = 'Magazines' AND s_month ='Nov' ";
$stmt = $mysqli->prepare($query);
$stmt->execute();
$stmt->bind_result($Magazines_nov);
$stmt->fetch();
$stmt->close();

//6.  Get all Magazines Dec
$query = "SELECT SUM(s_copies) FROM `iBookStore_Sales` WHERE b_cat = 'Magazines' AND s_month ='Dec' ";
$stmt = $mysqli->prepare($query);
$stmt->execute();
$stmt->bind_result($Magazines_dec);
$stmt->fetch();
$stmt->close();

?>
<script>
  var options1 = {
    chart: {
      fontFamily: 'Nunito, sans-serif',
      height: 365,
      type: 'area',
      zoom: {
        enabled: false
      },
      dropShadow: {
        enabled: true,
        opacity: 0.3,
        blur: 5,
        left: -7,
        top: 22
      },
      toolbar: {
        show: false
      },
      events: {
        mounted: function(ctx, config) {
          const highest1 = ctx.getHighestValueInSeries(0);
          const highest2 = ctx.getHighestValueInSeries(1);

          ctx.addPointAnnotation({
            x: new Date(ctx.w.globals.seriesX[0][ctx.w.globals.series[0].indexOf(highest1)]).getTime(),
            y: highest1,
            label: {
              style: {
                cssClass: 'd-none'
              }
            },
            customSVG: {
              SVG: '<svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24" fill="#1b55e2" stroke="#fff" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" class="feather feather-circle"><circle cx="12" cy="12" r="10"></circle></svg>',
              cssClass: undefined,
              offsetX: -8,
              offsetY: 5
            }
          })

          ctx.addPointAnnotation({
            x: new Date(ctx.w.globals.seriesX[1][ctx.w.globals.series[1].indexOf(highest2)]).getTime(),
            y: highest2,
            label: {
              style: {
                cssClass: 'd-none'
              }
            },
            customSVG: {
              SVG: '<svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24" fill="#e7515a" stroke="#fff" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" class="feather feather-circle"><circle cx="12" cy="12" r="10"></circle></svg>',
              cssClass: undefined,
              offsetX: -8,
              offsetY: 5
            }
          })
        },
      }
    },
    colors: ['#1b55e2', '#e7515a', '#1be21e', '#e21bb4', '#e2d51b'],
    dataLabels: {
      enabled: false
    },
    markers: {
      discrete: [{
        seriesIndex: 0,
        dataPointIndex: 7,
        fillColor: '#000',
        strokeColor: '#000',
        size: 5
      }, {
        seriesIndex: 2,
        dataPointIndex: 11,
        fillColor: '#000',
        strokeColor: '#000',
        size: 4
      }]
    },
    subtitle: {
      text: 'Book Sales Numbers',
      align: 'left',
      margin: 0,
      offsetX: -10,
      offsetY: 35,
      floating: false,
      style: {
        fontSize: '14px',
        color: '#888ea8'
      }
    },
    title: {
      text: '1000',
      align: 'left',
      margin: 0,
      offsetX: -10,
      offsetY: 0,
      floating: false,
      style: {
        fontSize: '25px',
        color: '#0e1726'
      },
    },
    stroke: {
      show: true,
      curve: 'smooth',
      width: 2,
      lineCap: 'square'
    },
    series: [{
        name: 'Kindergarten',
        data: [<?php echo $Kindergarten_jan; ?>, <?php echo $Kindergarten_feb; ?>, <?php echo $Kindergarten_mar; ?>, <?php echo $Kindergarten_apr; ?>, <?php echo $Kindergarten_may; ?>, <?php echo $Kindergarten_jun; ?>, <?php echo $Kindergarten_jul; ?>, <?php echo $Kindergarten_aug; ?>, <?php echo $Kindergarten_sep; ?>, <?php echo $Kindergarten_oct; ?>, <?php echo $Kindergarten_nov; ?>, <?php echo $Kindergarten_dec; ?>]
      }, {
        name: 'Primary School',
        data: [<?php echo $Primary_School_jan; ?>, <?php echo $Primary_School_feb; ?>, <?php echo $Primary_School_mar; ?>, <?php echo $Primary_School_Apr; ?>, <?php echo $Primary_School_may; ?>, <?php echo $Primary_School_jun; ?>, <?php echo $Primary_School_jul; ?>, <?php echo $Primary_School_aug; ?>, <?php echo $Primary_School_Sep; ?>, <?php echo $Primary_School_oct; ?>, <?php echo $Primary_School_nov; ?>, <?php echo $Primary_School_Dec; ?>]
      },
      {
        name: 'Secondary School',
        data: [<?php echo $Secondary_School_jan; ?>, <?php echo $Secondary_School_Feb; ?>, <?php echo $Secondary_School_mar; ?>, <?php echo $Secondary_School_apr; ?>, <?php echo $Secondary_School_may; ?>, <?php echo $Secondary_School_jun; ?>, <?php echo $Secondary_School_jul; ?>, <?php echo $Secondary_School_aug; ?>, <?php echo $Secondary_School_sep; ?>, <?php echo $Secondary_School_oct; ?>, <?php echo $Secondary_School_nov; ?>, <?php echo $Secondary_School_dec; ?>]
      },
      {
        name: 'Tertiary',
        data: [<?php echo $Tertiary_jan; ?>, <?php echo $Tertiary_feb; ?>, <?php echo $Tertiary_mar; ?>, <?php echo $Tertiary_Apr; ?>, <?php echo $Tertiary_may; ?>, <?php echo $Tertiary_Jun; ?>, <?php echo $Tertiary_jul; ?>, <?php echo $Tertiary_aug; ?>, <?php echo $Tertiary_sep; ?>, <?php echo $Tertiary_oct; ?>, <?php echo $Tertiary_nov; ?>, <?php echo $Tertiary_dec; ?>]
      },
      {
        name: 'Novels',
        data: [<?php echo $Novels_jan; ?>, <?php echo $Novels_feb; ?>, <?php echo $Novels_mar; ?>, <?php echo $Novels_apr; ?>, <?php echo $Novels_may; ?>, <?php echo $Novels_jun; ?>, <?php echo $Novels_july; ?>, <?php echo $Novels_aug; ?>, <?php echo $Novels_sep; ?>, <?php echo $Novels_Oct; ?>, <?php echo $Novels_Nov; ?>, <?php echo $Novels_Dec; ?>]
      },
      {
        name: 'Magazines',
        data: [<?php echo $Magazines_jan; ?>, <?php echo $Magazines_feb; ?>, <?php echo $Magazines_mar; ?>, <?php echo $Magazines_apr; ?>, <?php echo $Magazines_may; ?>, <?php echo $Magazines_jun; ?>, <?php echo $Magazines_Jul; ?>, <?php echo $Magazines_aug; ?>, <?php echo $Magazines_sep; ?>, <?php echo $Magazines_oct; ?>, <?php echo $Magazines_nov; ?>, <?php echo $Magazines_dec; ?>]
      },
    ],

    labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
    xaxis: {
      axisBorder: {
        show: false
      },
      axisTicks: {
        show: false
      },
      crosshairs: {
        show: true
      },
      labels: {
        offsetX: 0,
        offsetY: 5,
        style: {
          fontSize: '12px',
          fontFamily: 'Nunito, sans-serif',
          cssClass: 'apexcharts-xaxis-title',
        },
      }
    },
    yaxis: {
      labels: {
        formatter: function(value, index) {
          return (value / 1000) + 'K'
        },
        offsetX: -22,
        offsetY: 0,
        style: {
          fontSize: '12px',
          fontFamily: 'Nunito, sans-serif',
          cssClass: 'apexcharts-yaxis-title',
        },
      }
    },
    grid: {
      borderColor: '#e0e6ed',
      strokeDashArray: 5,
      xaxis: {
        lines: {
          show: true
        }
      },
      yaxis: {
        lines: {
          show: false,
        }
      },
      padding: {
        top: 0,
        right: 0,
        bottom: 0,
        left: -10
      },
    },
    legend: {
      position: 'top',
      horizontalAlign: 'right',
      offsetY: -50,
      fontSize: '16px',
      fontFamily: 'Nunito, sans-serif',
      markers: {
        width: 10,
        height: 10,
        strokeWidth: 0,
        strokeColor: '#fff',
        fillColors: undefined,
        radius: 12,
        onClick: undefined,
        offsetX: 0,
        offsetY: 0
      },
      itemMargin: {
        horizontal: 0,
        vertical: 20
      }
    },
    tooltip: {
      theme: 'dark',
      marker: {
        show: true,
      },
      x: {
        show: false,
      }
    },
    fill: {
      type: "gradient",
      gradient: {
        type: "vertical",
        shadeIntensity: 1,
        inverseColors: !1,
        opacityFrom: .28,
        opacityTo: .05,
        stops: [45, 100]
      }
    },
    responsive: [{
      breakpoint: 575,
      options: {
        legend: {
          offsetY: -30,
        },
      },
    }]
  }

  var chart1 = new ApexCharts(
    document.querySelector("#salesPerMonth"),
    options1
  );

  chart1.render();
</script>