<!DOCTYPE html>
<html lang="en">
<head>
    <title>Direct Debit</title>
    <link rel="stylesheet" href="<?php echo URL.'public/css/bootstrap.min.css'; ?>" type="text/css">
    <link rel="stylesheet" href="<?php echo URL.'public/css/dd_pdf_style.css'; ?>" type="text/css">
    <link rel="stylesheet" href="<?php echo URL.'public/css/dd_pdf_responsive.css'; ?>" type="text/css">
    <!--link rel="preconnect" href="https://fonts.gstatic.com"-->
    <!--link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,600;0,700;0,800;1,300;1,400;1,600;1,700;1,800&display=swap" rel="stylesheet"-->
</head>
<body>

<section class="wrapper">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-lg-6">
                <a href="javascript:void(0);">
                    <img src="<?php echo URL."public/images/logo.jpg";?>" alt="Unusual & Unique Hotels of the world" title="Unusual & Unique Hotels of the world" />
                </a>
            </div>
            <div class="col-md-12 col-lg-6 logo_right">
                <a href="javascript:void(0);">
                    <img src="<?php echo URL."public/images/logo1.jpg";?>" alt="Direct Debit" title="Direct Debit" />
                </a>
                <h3>Instruction to your Bank or <br/> Building Society to pay by Direct Debit</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 col-lg-6">
                <p>Please fill in the whole form using a ballpoint pen and send it to:</p>
                <div class="address_block">
                    <address>
                        <strong>The Unusual Company Ltd <br/>
                            43 John Bunn Mill <br/>
                            Coxes Lock <br/>
                            Bourneside Road <br/>
                            Addlestone <br/>
                            Surrey <br/>
                            KT15 2JX
                        </strong>
                    </address>
                </div>
                <div class="address_block">
                    <label><strong>
                            Name(s) of Account Holder(s)
                        </strong></label>
                    <input type="text" name="name" value="" placeholder="" class="name_input" />
                </div>
                <div class="code_block">
                    <label><strong>Bank or Building Society account number </strong></label>
                    <input type="text" id="digit-1" name="digit-1" maxlength="1"  />
                    <input type="text" id="digit-2" name="digit-2"  maxlength="1" />
                    <input type="text" id="digit-3" name="digit-3"  maxlength="1" />
                    <input type="text" id="digit-4" name="digit-4"  maxlength="1" />
                    <input type="text" id="digit-5" name="digit-5"  maxlength="1" />
                    <input type="text" id="digit-6" name="digit-6"  maxlength="1" />
                    <input type="text" id="digit-7" name="digit-7"  maxlength="1" />
                    <input type="text" id="digit-8" name="digit-8"  maxlength="1" />
                </div>
                <div class="code_block">
                    <label><strong>Branch Sort Code </strong></label>
                    <input type="text" id="digit-1" name="digit-1" maxlength="1"  />
                    <input type="text" id="digit-2" name="digit-2"  maxlength="1" />
                    <span class="splitter">&ndash;</span>
                    <input type="text" id="digit-3" name="digit-3"  maxlength="1" />
                    <input type="text" id="digit-4" name="digit-4"  maxlength="1" />
                    <span class="splitter">&ndash;</span>
                    <input type="text" id="digit-5" name="digit-5"  maxlength="1" />
                    <input type="text" id="digit-6" name="digit-6"  maxlength="1" />
                </div>
                <label><strong> Name and full postal address of your Bank or Building Society </strong></label>
                <div class="address_block">
                    <p>To The Manager:</p>
                    <input type="text" name="name" value="" placeholder="" class="name_input margin_null" /> Bank/Building Society
                    <br/>
                    Address: <input type="text" name="name" value="" placeholder="" class="name_input margin_null" />
                    <input type="text" name="name" value="" placeholder="" class="full_input" />
                    <input type="text" name="name" value="" placeholder="" class="name_input margin_null" />Postcode <input type="text" name="name" value="" placeholder="" class="name_input margin_null width_auto" />
                </div>
                <div class="code_block reference">
                    <label><strong>Reference Number </strong></label>
                    <input type="text" id="digit-1" name="digit-1" maxlength="1"  />
                    <input type="text" id="digit-2" name="digit-2"  maxlength="1" />
                    <input type="text" id="digit-3" name="digit-3"  maxlength="1" />
                    <input type="text" id="digit-4" name="digit-4"  maxlength="1" />
                    <input type="text" id="digit-5" name="digit-5"  maxlength="1" />
                    <input type="text" id="digit-6" name="digit-6"  maxlength="1" />
                    <input type="text" id="digit-7" name="digit-7"  maxlength="1" />
                    <input type="text" id="digit-8" name="digit-8"  maxlength="1" />
                    <input type="text" id="digit-9" name="digit-9"  maxlength="1" />
                    <input type="text" id="digit-10" name="digit-10"  maxlength="1" />
                    <input type="text" id="digit-11" name="digit-11"  maxlength="1" />
                    <input type="text" id="digit-12" name="digit-12"  maxlength="1" />
                </div>
            </div>
            <div class="col-md-12 col-lg-6">
                <div class="code_block identification_number">
                    <label><strong>Originator’s Identification Number</strong></label>
                    <input type="text" id="digit-1" name="digit-1" maxlength="1"  />
                    <input type="text" id="digit-2" name="digit-2"  maxlength="1" />
                    <input type="text" id="digit-3" name="digit-3"  maxlength="1" />
                    <input type="text" id="digit-4" name="digit-4"  maxlength="1" />
                    <input type="text" id="digit-5" name="digit-5"  maxlength="1" />
                    <input type="text" id="digit-6" name="digit-6"  maxlength="1" />
                </div>
                <div class="address_block">
                    <p class="mb-0"><strong>For FastPay Ltd Re The Unusual Company Ltd Official Use Only</strong></p>
                    <p>This is not part of the instruction to your Bank or Building Society </p>
                    <div class="payment_box">
                        <label>First Payment Amount</label>
                        <div class="input_symbol">
                            &#163;<input type="text" name="name" value="" placeholder="" class="name_input margin_null width_auto" />
                        </div>
                    </div>
                    <div class="payment_box">
                        <label>Regular Payment Amount </label>
                        <div class="input_symbol">
                            &#163;<input type="text" name="name" value="" placeholder="" class="name_input margin_null width_auto" />
                        </div>
                    </div>
                    <p>Please Note: Our collection will normally take place on or after the 15th day of each calendar month.</p>
                    <div class="payment_box">
                        <label>Date of First Payment</label>
                        <div class="input_symbol">
                            <input type="text" name="name" value="" placeholder="" class="name_input" />
                        </div>
                    </div>
                </div>
                <label><strong>Instruction to your Bank or Building Society </strong></label>
                <p>Please pay FastPay Ltd Re The Unusual Company Ltd Direct Debits from the account detailed in this instruction subject to the safeguards assured by the Direct Debit Guarantee. </p>
                <p class="mb-3">I understand that this instruction may remain with FastPay Ltd Re The Unusual Company Ltd and, if so, details will be passed electronically to my Bank/Building Society.</p>
                <div class="address_block">
                    <p>Signature(s)</p>
                    <input type="text" name="name" value="" placeholder="" class="full_input" />
                    <input type="text" name="name" value="" placeholder="" class="full_input" /><br/>
                    Date
                </div>
                <p class="text-center"><small>Banks and Building Societies may not accept Direct Debit instructions <br/> for some types of account.</small></p>
            </div>
        </div>
        <img src="images/cut.jpg" alt="Cut" title="Cut" width="100%" />
        <label class="text-center"><strong>This Guarantee should be detached and retained by the payer. </strong></label>
        <div class="address_block">
            <div class="row">
                <div class="col-md-6 col-lg-6 left_sec">
                    <label class="mb-0"><strong>The Direct Debit Guarantee</strong></label>
                </div>
                <div class="col-md-6 col-lg-6 logo_right">
                    <a href="javascript:void(0);">
                        <img src="images/logo1.jpg" alt="Direct Debit" title="Direct Debit" />
                    </a>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <ul class="list_block">
                        <li>
                            This Guarantee is offered by all Banks and Building Societies that accept instructions to pay Direct Debits.
                        </li>
                        <li>
                            If there are any changes to the amount, date or frequency of your Direct Debit, FastPay Ltd re The Unusual Company Ltd will
                            notify you five working days in advance of your account being debited or as otherwise agreed. If you request FastPay Ltd re The
                            Unusual Company Ltd to collect a payment, confirmation of the amount and date will be given to you at the time of the request.
                        </li>
                        <li>
                            If an error is made in the payment of your Direct Debit by FastPay Ltd Re The Unusual Company Ltd or your Bank or Building Society, you are entitled to a full and immediate refund of the amount paid from your bank or building society.
                            <br/>
                            – If you receive a refund you are not entitled to, you must pay it back when FastPay Ltd re The Unusual Company Ltd asks you to.
                        </li>
                        <li>
                            You can cancel a Direct Debit at any time by simply contacting your Bank or Building Society. Written confirmation may be required. Please also notify us. </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<!--script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script-->
<!--script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script-->
<!--script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script-->
</body>
</html>
