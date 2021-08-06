<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Invoice</title>
<!--    <link rel="stylesheet" href="--><?php //echo URL_ADMIN . 'public/css/inv-pdf.css'; ?><!--" type="text/css">-->
<style>
    .invoice_table{
        border: 1px solid #000;
        border-collapse: collapse;
    }
    .invoice_table td, .invoice_table th{
        border: 1px solid #000;
        padding: 5px 8px;
        font-size: 13px;
    }
    .item_heading{
        font-weight: 600;
        display: block;
    }
    .item_description{
        font-weight: 400;
        display: block;
    }
</style>
</head>
<body>

<table border="0" style="padding:10px !important;">
    <tr>
        <td>
            <table width="100%" style="color:#999">
                <tbody>
                <tr>
                    <td width="60%" style="vertical-align:top">
                        <strong><?php echo constant('INVOICE_DOCTOR_DETAIL')['NAME'];?></strong><br/>
                        <span><?php echo constant('INVOICE_DOCTOR_DETAIL')['DEGREE'];?></span><br/>
                        <span><?php echo constant('INVOICE_DOCTOR_DETAIL')['POSITION'];?></span>
                    </td>
                    <td width="40%">
                        <strong>Please send Payment to this address:</strong><br/>
                        <span><?php echo constant('PAYMENT_INFO')['LINE_NAME'];?></span><br/>
                        <span><?php echo constant('PAYMENT_INFO')['LINE_ADDRESS_1'];?>,</span><br/>
                        <span></span><?php echo constant('PAYMENT_INFO')['LINE_ADDRESS_2'];?></span><br/>
                        <strong>Account Enquiries: <?php echo constant('PAYMENT_INFO')['LINE_ACCOUNT_ENQUIRIES'];?></strong><br/>
                        <span>Email:<?php echo constant('PAYMENT_INFO')['LINE_EMAIL'];?></span>
                    </td>
                </tr>
                </tbody>
            </table>
        </td>
    </tr>
    <tr>
        <td >
            <table border="0" style="margin-top:15px !important;">
                <tbody>
                <tr>
                    <td>
                        <strong>Invoice/Statement: </strong>
                    </td>
                    <td><?php echo $result['info']['invoice_prefix'].str_pad($result['id'], 5, '0', STR_PAD_LEFT); ?></td>
                </tr>
                <tr>
                    <td>
                        <strong>Invoice Date:</strong>
                    </td>
                    <td><?php echo date_format(date_create($result['invoicedate']), $result['info']['date_format']); ?></td>
                </tr>
                <?php if(!is_null($result['treatmentdate']) && $result['treatmentdate'] != '0000-00-00') {?>
                <tr>
                    <td>
                        <strong>Treatment Date:</strong>
                    </td>
                    <td><?php echo date_format(date_create($result['treatmentdate']), $result['info']['date_format']); ?></td>
                </tr>
                <?php }?>
<!--                <tr>-->
<!--                    <td>-->
<!--                        <strong>Invoice Address:</strong>-->
<!--                    </td>-->
<!--                    <td>--><?php //echo $result['info']['address']['address1'].', '.$result['info']['address']['address2'].', '.$result['info']['address']['city'].', '.$result['info']['address']['country'].' - '.$result['info']['address']['postal']; ?><!--</td>-->
<!--                </tr>-->
                </tbody>
            </table>
        </td>
    </tr>
    <tr>
        <td>
            <table border="0" style="margin-top:15px !important;">
                <tbody>
                <tr>
                    <td>
                        <strong>Patient: </strong>
                    </td>
                    <td><?php echo $result['name']; ?></td>
                </tr>
                <tr>
                    <td style="vertical-align: top;">
                        <strong>DOB: </strong>
                    </td>
                    <td>
                        <?php echo date_format(date_create($result['dob']), $result['info']['date_format']);?>
                    </td>
                </tr>
                <tr>
                    <td style="vertical-align: top;">
                        <strong>Address: </strong>
                    </td>
                    <td>

                        <?php echo ($result['address'] != null) ?$result['address']['address1'].", ".$result['address']['address2'].", ".$result['address']['city'].", ".$result['address']['country']."-".$result['address']['postal']:''?>
                    </td>
                </tr>
                </tbody>
            </table>
            <table>
                
            </table>
        </td>
    </tr>
    <tr>
        <td style="margin-top:10px !important;">
            <center><strong><u>Mr. Tarun K Sharma Professional Services</u></strong></center>
        </td>
    </tr>
    <tr>
        <td style="margin-top:10px !important; ">
            <table width="100%" class="invoice_table">
                <thead style="background:#ccc">
                <tr>
                    <th>Item & description</th>
                    <th>Qty</th>
                    <th>Unit Cost</th>
                    <th>Amount</th>
                </tr>
                </thead>
                <tbody>
                <?php if (!empty($result['items'])) { foreach ($result['items'] as $key => $value) { ?>
                    <tr>
                        <td>
                            <span class="item_heading"><?php echo htmlspecialchars_decode($value['name']); ?></span>
                            <span class="item_description"><?php echo htmlspecialchars_decode($value['descr']) . "ettetew"; ?></span>
                        </td>
                        <td><?php echo $value['quantity']; ?></td>
                        <td align="right"><?php echo $result['info']['currency_abbr'].$value['cost']; ?></td>
                        <td align="right"><?php echo $result['info']['currency_abbr'].$value['price']; ?></td>
                    </tr>
                <?php } } ?>
                <tr class="total">
                    <td rowspan="5" colspan="2" class="blank">
                        <?php
                        if (in_array($result['common']['user']['role'], constant('USER_ROLE'))) {
                            if (isset($result['medical_insurers_name']) and !empty($result['medical_insurers_name'])) {
                                echo "<b>Policy details</b>";
                                echo "<br>" . "Medical insurers name: " . $result['medical_insurers_name'];
                                echo "<br>" . "Ploicyholder's name: " . $result['policyholders_name'];
                                echo "<br>" . "Membership number: " . $result['membership_number'];
                                echo "<br>" . "Scheme name: " . $result['scheme_name'];
                                echo "<br>" . "Authorisation number: " . $result['authorisation_number'];
                                echo "<br>" . "Employer: " . $result['employer'];
                            }
                        }
                        ?>
                    </td>
                    <td class="title">Sub Total</td>
                    <td class="value" align="right"><?php echo $result['info']['currency_abbr'].$result['subtotal']; ?></td>
                </tr>
                <tr class="total">
                    <td class="title">Discount</td>
                    <td class="value" align="right"><?php echo $result['info']['currency_abbr'].$result['discount_value']; ?></td>
                </tr>
                <tr class="total">
                    <td class="title">Total</td>
                    <td class="value" align="right"><?php echo $result['info']['currency_abbr'].$result['amount']; ?></td>
                </tr>
                <tr class="total">
                    <td class="title">Paid</td>
                    <td class="value" align="right"><?php echo empty($result['paid']) ? $result['info']['currency_abbr'].$result['paid'].'0':$result['info']['currency_abbr'].$result['paid'] ?></td>
                </tr>
                <tr class="total">
                    <td class="title">Due Amount</td>
                    <td class="value" align="right"><?php echo $result['info']['currency_abbr'].$result['due']; ?></td>
                </tr>
                </tbody>
            </table>
        </td>
    </tr>
    <tr>
     <td ><strong>Payment Instructions:</strong></td>
    </tr>
    <tr>
        <td>
            <ul style="list-style: none;padding: 0px">
                <li>1. Cheques payable to Mr Tarun Sharma.</li>
                <li>2. Bank Transfer : Sort code: 40-11-13 Account: 71764918; Account name: Sharma vision.</li>
                <li>3. Reference : <?php echo $result['info']['invoice_prefix'].str_pad($result['id'], 5, '0', STR_PAD_LEFT); ?></li>
                <li>4. Price revision from 5th April 2021.</li>
            </ul>
        </td>
    </tr>
    <tr>
        <td><center><span style="font-size:13px; font-style:italic;"><?php echo $result['note']; ?><br><br></span><center></td>
    </tr>
    <tr>
        <td>
            <center>
                <?php
                    //$now = strtotime(date('Y-m-d')); // or your date as well
                    $now = strtotime($result['duedate']);
                    $your_date = strtotime($result['invoicedate']);
                    $datediff = $now - $your_date;
                    
                    $due_days = round($datediff / (60 * 60 * 24));
                ?>
                <span>Payment due within <?php echo $due_days; ?> days, thank you.<br/></span>
                <span>
                    <b>Please Note:</b> <?php echo constant('INVOICE_TERMS_NOTE');?><br>
                </span>
                <span>
                    <b><?php echo constant('INVOICE_TERMS');?></b>
                </span>
            </center>
        </td>

    </tr>
</table>
</body>
</html>