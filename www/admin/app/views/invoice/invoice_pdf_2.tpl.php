<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Invoice</title>
    <!--    <link rel="stylesheet" href="--><?php //echo URL_ADMIN . 'public/css/inv-pdf.css'; 
                                            ?>
    <!--" type="text/css">-->
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

        H4 { margin-bottom: 0px}
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
                <table width="100%" style=" font-size:15px; color:#000" border="0">
                    <tbody>
                        <tr>
                            <td width="35%" class="letter_head" style="vertical-align:top">
                                <div style='text-align:left; color: #333;'>
                                    <div>
                                        <span style='font-size:20px; font-weight:bold;'><?php echo constant('INVOICE_DOCTOR_DETAIL')['NAME']; ?></span><br>
                                        <span style='font-size:12px; font-weight:bold;'><?php echo html_entity_decode(constant('INVOICE_DOCTOR_DETAIL')['DEGREE']); ?></span><br>
                                        <span style='font-size:12px; font-weight:bold;'><?php echo html_entity_decode(constant('INVOICE_DOCTOR_DETAIL')['POSITION']); ?></span>
                                    </div>
                                    <!-- <span style='font-size: 13px;'>" . html_entity_decode($dr_qualification_position_specility) . "</span> -->
                                </div>
                            </td>
                            <td width="25%" style="vertical-align:top">
                                <img src="<?php echo URL_ADMIN . 'public/images/picture1.jpg'; ?>" width="100%" alt="Icon">
                            </td>
                            <!-- <td width="15%" style="vertical-align:center; text-align:start; padding:5px; border:#000 1px solid;">
                                <span><?php //echo constant('MY_EYE_RECORD_CARE'); ?></span>
                            </td> -->
                            <td width="40%" style="border:#000 1px solid; font-size:12px;">
                                <strong>Please send Payment to this address:</strong><br />
                                <span><?php echo constant('PAYMENT_INFO')['LINE_NAME']; ?></span><br />
                                <span><?php echo constant('PAYMENT_INFO')['LINE_ADDRESS_1']; ?>,</span><br />
                                <span></span><?php echo constant('PAYMENT_INFO')['LINE_ADDRESS_2']; ?></span><br />
                                <strong>Account Enquiries: <?php echo constant('PAYMENT_INFO')['LINE_ACCOUNT_ENQUIRIES']; ?></strong><br />
                                <span>Email:<?php echo constant('PAYMENT_INFO')['LINE_EMAIL']; ?></span>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </td>
        </tr>
        <tr>
            <td>
                <table border="0" >
                    <tbody>
                        <tr>
                            <td class="font_arial">
                                <strong>Invoice/Statement: </strong>
                            </td>
                            <td class="font_arial"><strong><?php echo $result['info']['invoice_prefix'] . str_pad($result['id'], 5, '0', STR_PAD_LEFT); ?></strong></td>
                        </tr>
                        <tr>
                            <td width="5%">
                                Date: <?php echo date_format(date_create($result['invoicedate']), $result['info']['date_format']); ?>
                            </td>
                            <td><?php //echo date_format(date_create($result['invoicedate']), $result['info']['date_format']); 
                                ?></td>
                        </tr>
                        <?php if (!is_null($result['treatmentdate']) && $result['treatmentdate'] != '0000-00-00') { ?>
                            <tr>
                                <td>
                                    <strong>Treatment Date:</strong>
                                </td>
                                <td><?php echo date_format(date_create($result['treatmentdate']), $result['info']['date_format']); ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </td>
        </tr>
        <tr>
            <td>
                <table border="0" style="" width="100%">
                    <tbody>
                        <tr>
                            <td valign="top"><?php echo $result['name'].'<br>'; ?>
                            <?php 
                                
                                echo !empty($result['address']['address1']) ? ( $result['address']['address1']) : '';
                                echo !empty($result['address']['address2']) ? ("<br>" . $result['address']['address2']) : '';
                                echo !empty($result['address']['city']) ? ("<br>" . $result['address']['city']) : '';
                                echo !empty($result['address']['country']) ? ("<br>" . $result['address']['country']) : '';
                                echo !empty($result['address']['postal']) ? ("<br>" . $result['address']['postal']) : '';

                            ?></td>
                            <td valign="top">
                                DOB: <?php echo date_format(date_create($result['dob']), 'd-m-Y'); ?>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <table>

                </table>
            </td>
        </tr>
        <tr>
            <td style="margin-top:10px !important;" class="font_arial">
                <center><strong><u>Mr. Tarun K Sharma Professional Services</u></strong></center>
            </td>
        </tr>
        <tr>
            <td style="margin-top:10px !important; ">
                <table width="100%" class="invoice_table font_arial">
                    <thead style="background:#ccc">
                        <tr>
                            <th>Treatment Date</th>
                            <th>Code</th>
                            <th>Description</th>
                            <th>Qty</th>
                            <th>Unit Cost</th>
                            <th>Amount</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($result['items'])) {
                            
                            foreach ($result['items'] as $key => $value) { ?>
                                <tr>
                                    <td><?php 
                                    if($result['treatmentdate'] != '' && $result['treatmentdate'] != '0000-00-00' ){
                                        echo $result['treatmentdate'];
                                    }
                                    ?></td>
                                    <td>
                                        <span class="item_heading"><?php echo htmlspecialchars_decode($value['name']); ?></span>
                                    </td>
                                    <td>
                                        <span class="item_description"><?php echo htmlspecialchars_decode($value['descr']); ?></span>
                                    </td>
                                    <td><?php echo $value['quantity']; ?></td>
                                    <td align="right"><?php echo $result['info']['currency_abbr'] . $value['cost']; ?></td>
                                    <td align="right"><?php echo $result['info']['currency_abbr'] . $value['price']; ?></td>
                                </tr>
                        <?php }
                        } ?>
                        <tr>
                            <td style="border: none !important;" colspan="6"><br /></td>
                        </tr>
                        <tr class="total">
                            <td rowspan="5" colspan="4" class="blank">
                                <?php
                                if (in_array($result['common']['user']['role'], constant('USER_ROLE'))) {
                                    if (isset($result['medical_insurers_name']) and !empty($result['medical_insurers_name'])) {
                                        echo "<b>Policy details</b>";
                                        echo "<br>" . "Medical insurers name: " . $result['medical_insurers_name'];
                                        echo "<br>" . "Policyholder's name: " . $result['policyholders_name'];
                                        echo "<br>" . "Membership number: " . $result['membership_number'];
                                        echo "<br>" . "Scheme name: " . $result['scheme_name'];
                                        echo "<br>" . "Authorisation number: " . $result['authorisation_number'];
                                        echo "<br>" . "Employer: " . $result['employer'];
                                    }
                                }
                                ?>
                            </td>
                            <td class="title">Sub Total</td>
                            <td class="value" align="right"><?php echo $result['info']['currency_abbr'] . $result['subtotal']; ?></td>
                        </tr>
                        <tr class="total">
                            <td class="title">Discount</td>
                            <td class="value" align="right"><?php echo $result['info']['currency_abbr'] . $result['discount_value']; ?></td>
                        </tr>
                        <tr class="total">
                            <td class="title">Total</td>
                            <td class="value" align="right"><?php echo $result['info']['currency_abbr'] . $result['amount']; ?></td>
                        </tr>
                        <tr class="total">
                            <td class="title">Paid</td>
                            <td class="value" align="right"><?php echo empty($result['paid']) ? $result['info']['currency_abbr'] . $result['paid'] . '0' : $result['info']['currency_abbr'] . $result['paid'] ?></td>
                        </tr>
                        <tr class="total">
                            <td class="title">Due Amount</td>
                            <td class="value" align="right"><?php echo $result['info']['currency_abbr'] . $result['due']; ?></td>
                        </tr>
                    </tbody>
                </table>
            </td>
        </tr>
        <tr>
            <td><br /></td>
        </tr>
        <tr>
            <td class="font_arial"><strong>Payment Instructions:</strong></td>
        </tr>
        <tr>
            <td class="font_arial">
                <ul style="list-style: none;padding: 0px">
                    <li>1. Cheques payable to <b>Mr Tarun Sharma</b>.</li>
                    <li>2. <b>Bank Transfer</b> : Sort code: 40-11-13 Account: 71764918; Account name: <u>Sharma vision</u>.</li>
                    <li>3. <b>Reference</b>-<?php echo $result['info']['invoice_prefix'] . str_pad($result['id'], 5, '0', STR_PAD_LEFT); ?></li>
                    <li>4. Price revision from 5<sup>th</sup> April 2021.</li>
                </ul>
            </td>
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
                    <?php
                    //$now = strtotime(date('Y-m-d')); // or your date as well
                    $now = strtotime($result['duedate']);
                    $your_date = strtotime($result['invoicedate']);
                    $datediff = $now - $your_date;

                    $due_days = round($datediff / (60 * 60 * 24));
                    ?>
                    <span>Payment due within <?php echo $due_days; ?> days, thank you.<br /></span>
                    <span>
                        <b>Please Note:</b> <?php echo constant('INVOICE_TERMS_NOTE'); ?><br>
                    </span>
                    <span>
                        <b><?php echo constant('INVOICE_TERMS'); ?></b>
                    </span>
                </center>
            </td>

        </tr>
    </table>
</body>

</html>