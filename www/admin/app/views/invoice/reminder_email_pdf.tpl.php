<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Invoice</title>
    <style>
        .invoice_table {
            border: 1px solid #000;
            border-collapse: collapse;
        }

        .invoice_table td,
        .invoice_table th {
            border: 1px solid #000;
            padding: 5px 8px;

        }

        .item_heading {
            font-weight: 600;
            display: block;
        }

        .item_description {
            font-weight: 400;
            display: block;
        }

        H4 {
            margin-bottom: 0px
        }

        @page {
            margin: 40px 80px 60px 80px;
        }

        body {
            font-family: 'Helvetica Neue, Helvetica, Arial, sans-serif';
            font-size: 13px;
        }
    </style>
</head>

<body>
    <table border="0" style="padding:10px !important;">
        <tr>
            <td>
                <?php echo $headerfooter['header']; ?>
            </td>
        </tr>
        <tr>
            <td><br /><br /></td>
        </tr>
        <tr>
            <td><?php echo  $emial_body; ?></td>
        </tr>
        <tr>
            <td><br /><br /></td>
        </tr>
        <tr>
            <td class="font_arial">
                <center><span style="font-size:13px; font-style:italic;"><?php echo $result['note']; ?><br><br></span>
                    <center>
            </td>
        </tr>
        <tr>
            <td class="font_arial">
                <center>
                    <?php echo $headerfooter['footer']; ?>
                </center>
            </td>

        </tr>
    </table>
</body>

</html>