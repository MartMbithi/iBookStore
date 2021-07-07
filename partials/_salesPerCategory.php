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
        Logic
        1. Get all kindergern books
        2. Get all Primary school books
        3. Get all secondary school books
        4. Get all tertiary books
        5. Get all magazines
        6. Get all Novels
        7. Get others

    */
//1. Get all kindergern books
$query = "SELECT SUM(s_copies) FROM `iBookStore_Sales` WHERE b_cat = 'Kindergarten Books' ";
$stmt = $mysqli->prepare($query);
$stmt->execute();
$stmt->bind_result($Kindergarten);
$stmt->fetch();
$stmt->close();

//2. Get all Primary school books
$query = "SELECT SUM(s_copies) FROM `iBookStore_Sales` WHERE b_cat = 'Primary School Books' ";
$stmt = $mysqli->prepare($query);
$stmt->execute();
$stmt->bind_result($Primary_School);
$stmt->fetch();
$stmt->close();

//3.  Get all secondary school books
$query = "SELECT SUM(s_copies) FROM `iBookStore_Sales` WHERE b_cat = 'Secondary School Books' ";
$stmt = $mysqli->prepare($query);
$stmt->execute();
$stmt->bind_result($Secondary_School);
$stmt->fetch();
$stmt->close();

//4.  Get all tertiary books
$query = "SELECT SUM(s_copies) FROM `iBookStore_Sales` WHERE b_cat = 'Tertiary Books' ";
$stmt = $mysqli->prepare($query);
$stmt->execute();
$stmt->bind_result($Tertiary);
$stmt->fetch();
$stmt->close();

//5.  Get all Novels books
$query = "SELECT SUM(s_copies) FROM `iBookStore_Sales` WHERE b_cat = 'Novels' ";
$stmt = $mysqli->prepare($query);
$stmt->execute();
$stmt->bind_result($Novels);
$stmt->fetch();
$stmt->close();

//6.  Get all Magazines
$query = "SELECT SUM(s_copies) FROM `iBookStore_Sales` WHERE b_cat = 'Magazines' ";
$stmt = $mysqli->prepare($query);
$stmt->execute();
$stmt->bind_result($Magazines);
$stmt->fetch();
$stmt->close();

//7.  Get all Others
$query = "SELECT SUM(s_copies) FROM `iBookStore_Sales` WHERE b_cat = 'Others' ";
$stmt = $mysqli->prepare($query);
$stmt->execute();
$stmt->bind_result($Others);
$stmt->fetch();
$stmt->close();
?>
<script>
    try {

        var d_1options1 = {
            chart: {
                height: 350,
                type: 'bar',
                toolbar: {
                    show: false,
                },
                dropShadow: {
                    enabled: true,
                    top: 1,
                    left: 1,
                    blur: 2,
                    color: '#acb0c3',
                    opacity: 0.7,
                }
            },
            colors: ['#5c1ac3', '#ffbb44'],
            plotOptions: {
                bar: {
                    horizontal: false,
                    columnWidth: '55%',
                    endingShape: 'rounded'
                },
            },
            dataLabels: {
                enabled: false
            },
            legend: {
                position: 'bottom',
                horizontalAlign: 'center',
                fontSize: '14px',
                markers: {
                    width: 10,
                    height: 10,
                },
                itemMargin: {
                    horizontal: 0,
                    vertical: 8
                }
            },
            stroke: {
                show: true,
                width: 2,
                colors: ['transparent']
            },
            series: [{
                name: 'Sales',
                data: [<?php echo $Kindergarten; ?>, <?php echo $Primary_School; ?>, <?php echo $Secondary_School; ?>, <?php echo $Tertiary; ?>, <?php echo $Novels; ?>, <?php echo $Magazines; ?>, <?php echo $Others; ?>]
            }],
            xaxis: {
                categories: ['Kindergarten', 'Primary School', 'Secondary School', 'Tertiary', 'Novels', 'Magazines', 'Others'],
            },
            fill: {
                type: 'gradient',
                gradient: {
                    shade: 'light',
                    type: 'vertical',
                    shadeIntensity: 0.3,
                    inverseColors: false,
                    opacityFrom: 1,
                    opacityTo: 0.8,
                    stops: [0, 100]
                }
            },
            tooltip: {
                y: {
                    formatter: function(val) {
                        return val
                    }
                }
            }
        }

        var d_1C_3 = new ApexCharts(
            document.querySelector("#salesPerBookCategory"),
            d_1options1
        );
        d_1C_3.render();


        const ps = new PerfectScrollbar(document.querySelector('.mt-container'));


    } catch (e) {
        // statements
        console.log(e);
    }

    /*
        =================================
            Revenue Monthly | Options
        =================================
    */
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
        colors: ['#1b55e2', '#e7515a'],
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
            text: 'Total Profit',
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
            text: '$10,840',
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
            name: 'Income',
            data: [16800, 16800, 15500, 17800, 15500, 17000, 19000, 16000, 15000, 17000, 14000, 17000]
        }, {
            name: 'Expenses',
            data: [16500, 17500, 16200, 17300, 16000, 19500, 16000, 17000, 16000, 19000, 18000, 19000]
        }],
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