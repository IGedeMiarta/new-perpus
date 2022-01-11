<!DOCTYPE html>
<html>

<head>
    <title>Cetak Laporan - SMK Muhammadiyah Mlati, Sleman</title>
    <link rel="shortcut icon" href="<?php echo base_url() . 'assets/images/sleman.png' ?>">
    <table class="table table-borderless table-condensed table-hover" width="100%">
        <tr>
            <td width="13%" align="center"><img src="<?= base_url() . 'assets/images/sleman.png' ?>"></td>
            <td width="74%" align="center">
                <p class="kecil">
                    <font size="5" face="times new roman"><b>SMK MUHAMMADIYAH MLATI, SLEMAN<br><br></b></font>
                    <font size="4" face="times new roman">
                        NPSN. 20401319<br><br>
                        Jl. Kaliurang Jl. Timor Tim. No.KM 6,5, Purwosari, Sinduadi, Kec. Mlati<br><br> Kabupaten Sleman, Daerah Istimewa Yogyakarta 55284
                    </font>
                </p>
            </td>
            <td width="13%" align="center"><img src="<?php echo base_url() . 'assets/images/Logo.png' ?>"></td>
        </tr>
    </table>


</head>

<body>

    <style type="text/css">
        table {
            font-family: Arial, Helvetica, sans-serif;
            color: #666;
            text-shadow: 1px 1px 0px #fff;
            background: #ffffff;
            border: #ccc 1px solid;
            border-collapse: collapse;
        }

        table th {
            padding: 15px 35px;
            border-left: 1px solid #e0e0e0;
            border-bottom: 1px solid #e0e0e0;
            background: #c4c4c4;
        }

        table th:first-child {
            border-left: none;
        }

        table tr {
            text-align: center;
            padding-left: 20px;
        }

        table td:first-child {
            text-align: left;
            padding-left: 20px;
            border-left: 0;
        }

        table td {
            padding: 15px 35px;
            border-top: 1px solid #ffffff;
            border-bottom: 1px solid #e0e0e0;
            border-left: 1px solid #e0e0e0;
            background: #fafafa;
            background: -webkit-gradient(linear, left top, left bottom, from(#fbfbfb), to(#fafafa));
            background: -moz-linear-gradient(top, #fbfbfb, #fafafa);
        }

        table tr:last-child td {
            border-bottom: 0;
        }

        table tr:last-child td:first-child {
            -moz-border-radius-bottomleft: 3px;
            -webkit-border-bottom-left-radius: 3px;
            border-bottom-left-radius: 3px;
        }

        table tr:last-child td:last-child {
            -moz-border-radius-bottomright: 3px;
            -webkit-border-bottom-right-radius: 3px;
            border-bottom-right-radius: 3px;
        }

        table tr:hover td {
            background: #f2f2f2;
            background: -webkit-gradient(linear, left top, left bottom, from(#f2f2f2), to(#f0f0f0));
            background: -moz-linear-gradient(top, #f2f2f2, #f0f0f0);
        }

        .table-borderless td,
        .table-berderless th {
            border: 0;
        }

        img {
            width: 75px;
            -webkit-filter: grayscale(100%);
            filter: grayscale(100%);
        }

        img.kiri {
            float: left;
            margin: 5px;
        }

        img.kanan {
            float: right;
            margin: 5px;
        }

        p.kecil {
            line-height: 70%;
        }
    </style>

    <center>
        <br><br>
        <font size="4" face="times new roman"><b><?= $title ?><br><br></b></font>
    </center>
