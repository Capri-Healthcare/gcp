<?php
/*This name will represent title in auto generated mail*/
define('NAME', ENV_APPLICATION_NAME);
/*Domain name like www.yourdomain.com*/
define('URL', ENV_APPLICATION_URL);
define('URL_ADMIN', URL . 'admin/');


/*Application Address*/
define('DIR_ROUTE', 'index.php?route=');
define('DIR', ENV_APPLICATION_DIR);
define('DIR_ADMIN', DIR . 'admin/');
define('DIR_APP', DIR_ADMIN . 'app/');
define('DIR_VIEW', DIR_APP . 'views/');
define('DIR_BUILDER', DIR_ADMIN . 'builder/');
define('DIR_IMAGE', DIR_ADMIN . 'public/images/');
define('DIR_UPLOADS', DIR_ADMIN . 'public/uploads/');
define('DIR_STORAGE', DIR_BUILDER . 'storage/');
define('DIR_LIBRARY', DIR_BUILDER . 'library/');
define('DIR_LANGUAGE', DIR_APP . 'language/');


/** MySQL settings - You can get this info from your web host **/
/*MySQL database host*/
define('DB_HOSTNAME', ENV_DB_HOSTNAME);
/*MySQL database username*/
define('DB_USERNAME', ENV_DB_USERNAME);
/*MySQL database password*/
define('DB_PASSWORD', ENV_DB_PASSWORD);
/*MySQL database Name*/
define('DB_DATABASE', ENV_DB_DATABASE);
/*Table Prefix*/
define('DB_PREFIX', ENV_DB_PREFIX);

define('AUTH_KEY', 'c&G)p{yCt<EQ3tL0qGm#Zc|5Lt)w907U*DgltlBOadOZM(J6yew7;Pt9>(?CBdW<');
define('LOGGED_IN_SALT', 'Xdb54;55S#CJ33cFq}VdvQvS7O6dfk~uj}C-A>gmie~b9zXI|oO*70Z|~#ewOI}W');
define('TOKEN', 'oQ913wsl6{WBlk#5jV5%VYExlFaIomj&75ZZ~(W3GREN#n)(jJp2QY7gugD))3L{');
define('TOKEN_SALT', 'rg(uyO0?I9uq5mx-hh4>V-XCPQ?Dx80{n7|?K?pU;-2WldDIOElXOvzT>p9P1zvN');

define('USER_ROLE', ['Med. Secretary', 'Admin', 'MERCSecretary', 'Doctor']);
define('USER_FOLLOWUP_MED_ROLE', ['Med. Secretary', 'Admin', 'Optometrist', 'Doctor']);
define('USER_FOLLOWUP_MERC_ROLE', ['Admin', 'MERCSecretary', 'Doctor']);
define('DASHBOARD_NOT_SHOW', ['Med. Secretary', 'Optometrist', 'MERCSecretary']);
define('USER_ROLE_OPTOMETRIST', 'Optometrist');
define('USER_ROLE_MED', 'Med. Secretary');
define('USER_ROLE_MERC', 'MERCSecretary');
define('USER_ROLE_DOCTOR', 'Doctor');
define('USER_ROLE_ADMIN', 'Admin');

define('STATUS', ['NEW' => 'New', 'ACCEPTED' => 'Accepted', 'REJECTED' => 'Not suitable', 'DRAFT' => 'Draft']);
define('STATUS_NEW', 'NEW');
define('STATUS_ACCEPTED', 'ACCEPTED');
define('STATUS_DRAFT', 'DRAFT');

define('STATUS_MED_ROLE', ['NEW' => 'New', 'ACCEPTED' => 'Accepted', 'REJECTED' => 'Not suitable']);

define('FOLLOWUP_DOCUMENT_NAME', ['Referral letter' => 'Referral letter', 'Visual fields - Right eye' => 'Visual fields - Right eye', 'Visual fields - Left eye' => 'Visual fields - Left eye', 'OCT - Right eye' => 'OCT - Right eye', 'OCT - Left eye' => 'OCT - Left eye', 'Fundus - Right eye' => 'Fundus - Right eye', 'Fundus - Left eye' => 'Fundus - Left eye']);

define('USER_ROLE_ID', ['Med. Secretary' => '7', 'MERCSecretary' => '11', 'Optician' => '9', 'Doctor' => '3']);
define('CC', 'chetanthumar@gmail.com,sanjay.makwana@tiez.nl');
define('MERC_REQUIRE', ['YES' => 'Yes', 'NO' => 'No', 'OFFER' => 'Offered']);


//define('HOSPITAL_LIST','',true);

$conn = mysqli_connect(ENV_DB_HOSTNAME, ENV_DB_USERNAME, ENV_DB_PASSWORD, ENV_DB_DATABASE);
$query = $conn->query("SELECT d.id,ds.* FROM `" . DB_PREFIX . "doctors` As d INNER JOIN `" . DB_PREFIX . "doctor_address` as ds ON  d.id = ds.doctor_id");
$conn->close();

$hospital_list = [];

while ($row = $query->fetch_assoc()) {
    $hospital_list[$row['id']]['name'] = $row['title'];
    $hospital_list[$row['id']]['mobile'] = $row['contact_number'];
    $hospital_list[$row['id']]['address'] = $row['address'] . " " . $row['city'] . " " . $row['pincode'];
    $hospital_list[$row['id']]['email'] = $row['email'];
    $hospital_list[$row['id']]['web'] = $row['website'];
}

define('HOSPITAL_LIST', $hospital_list);

define('OCULAR_EXAMINATION_DROP_DOWNS', [
    'ALLERGY' => [
        'PRESERVATIVES' => 'Preservatives',
        'BRIMONIDINE' => 'Brimonidine',
        'BRINZOLAMIDE' => 'Brinzolamide',
        'DORZOLAMIDE' => 'Dorzolamide',
        'TIMOLOL' => 'Timolol',
        'APRACLONIDIBE' => 'Apraclonidibe',
        'BITAMATOPROST' => 'Bitamatoprost',
        'LATANOPROST' => 'Latanoprost',
        'TRAVOPROST' => 'Travoprost',
        'NONE_ALLERGY' => 'None Allergy'
    ],
    'VISUAL_ACUITY' => [
        '1' => '6/4',
        '2' => '6/5',
        '3' => '6/6',
        '4' => '6/9',
        '5' => '6/12',
        '6' => '6/18',
        '7' => '6/24',
        '8' => '6/36',
        '9' => '6/60',
        '10' => 'CF',
        '11' => 'HM',
        '12' => 'PL',
        '13' => 'NPL',
    ],
    'CCT' => [
        '1' => '1',
        '2' => '2',
        '3' => '3',
        '4' => '4',
        '5' => '5',
        '6' => '6',
        '7' => '7',
    ],
    'INTRAOCULAR_PRESSURE' => [
        '1' => '1',
        '2' => '2',
        '3' => '3',
        '4' => '4',
        '5' => '5',
        '6' => '6',
        '7' => '7',
        '8' => '8',
        '9' => '9',
        '10' => '10',
        '11' => '11',
        '12' => '12',
        '13' => '13',
        '14' => '14',
        '15' => '15',
        '16' => '16',
        '17' => '17',
        '18' => '18',
        '19' => '19',
        '20' => '20',
        '21' => '21',
        '22' => '22',
        '23' => '23',
        '24' => '24',
        '25' => '25',
        '26' => '26',
        '27' => '27',
        '28' => '28',
        '29' => '29',
        '30' => '30',
        '31' => '31',
        '32' => '32',
        '33' => '33',
        '34' => '34',
        '35' => '35',
        '36' => '36',
        '37' => '37',
        '38' => '38',
        '39' => '39',
        '40' => '40',
        '41' => '41',
        '42' => '42',
        '43' => '43',
        '44' => '44',
        '45' => '45',
        '46' => '46',
        '47' => '47',
        '48' => '48',
        '49' => '49',
        '50' => '50',
        '51' => '51',
        '52' => '52',
        '53' => '53',
        '54' => '54',
        '55' => '55',
        '56' => '56',
        '57' => '57',
        '58' => '58',
        '59' => '59',
        '60' => '60',
    ],
    'DIAGNOSIS' => [
        'PRIMARY_OPEN_ANGLE_GLAUCOMA' => 'Primary Open angle Glaucoma',
        'PRIMARY_ANGLE_CLOSURE_GLAUCOMA' => 'Primary Angle closure Glaucoma',
        'OCULAR_HYPERTENSION' => 'Ocular Hypertension',
        'GLAUCOMA_SUSPECT' => 'Glaucoma Suspect',
        'SECONDARY_GLAUCOMA_STEROID_INDUCED' => 'Secondary Glaucoma - Steroid induced',
        'SECONDARY_GLAUCOMA_UVEITIC' => 'Secondary Glaucoma - Uveitic',
        'SECONDARY_GLAUCOMA_PSEUDOEXFOLIATION' => 'Secondary Glaucoma - Pseudoexfoliation',
        'SECONDARY_GLAUCOMA_PIGMENT_DISPERSION' => 'Secondary Glaucoma - Pigment Dispersion',
        'SECONDARY_GLAUCOMA_TRAUMA' => 'Secondary Glaucoma - Trauma',
        'SECONDARY_GLAUCOMA_PREV_VR_SURGERY' => 'Secondary Glaucoma - Prev VR Surgery',
        'BLEPHRITIS' => 'Blephritis',
        'OCULAR_SURFACE_DISORDER' => 'Ocular surface disorder',
        'CATARACT' => 'Cataract',
        'PSEUDOPHAKOS' => 'Pseudophakos',
        'NO_EVIDENCE_OF_GLAUCOMA' => 'No evidence of glaucoma',
        'NORMAL_TENSION_GLAUCOMA' => 'Normal Tension Glaucoma',
        'INTOLERANCE_TO_PRESERVATIVES' => 'Intolerance to Preservatives',
        'INTOLERANCE_TO_BETABLOCKERS' => 'Intolerance to betablockers',
        'CENTRAL_RETINAL_VEIN_OCCLUSSION' => 'Central Retinal vein Occlussion',
        'BRANCH_RETINAL_VIEN_OCCLUSION' => 'Branch Retinal vien occlusion',
        'DIABETIC_RETINOPATHY' => 'Diabetic Retinopathy',
        'AGE_RELATED_MACULAR_DEGENERATION_DRY_TYPE' => 'Age related macular degeneration-Dry type',
        'AGE_RELATED_MACULAR_DEGENERATION_WET_TYPE' => 'Age related macular degeneration-Wet type',

    ],
    'ANTERIOR_CHAMBER' => [
        'FULLY_OPEN_ANGLE' => 'Fully Open angle',
        'NARROW_BUT_NOT_OCCLUDABLE_ANGLE' => 'Narrow but not occludable angle',
        'OCCLUDABLE_ANGLE' => 'Occludable angle',
        'CLOSED_ANGLE' => 'Closed angle',
        'APPOSITIONAL_CLOSURE_OF_ANGLE' => 'Appositional closure of angle',
        'SYNAECHIAL_CLOSURE_OF_ANGLE' => 'Synaechial closure of angle'
    ],
    'OUTCOME' => [
        'STABLE' => 'Stable: review with visual fields',
        'UNSTABLE' => 'Unstable',
        'UNSTABLE_NEED_CHANGE_IN_TREATMENT' => 'Unstable - Need change in treatment- change medication above',
        'UNSTABLE_BOOK_FOR_LASER' => 'Book for laser',
        'UNSTABLE_BOOK_FOR_SURGERY' => 'Book for Surgery',
        'DISCHARGE' => 'Discharge',
        'VIRTUAL_REVIEW' => 'Virtual review'
    ],
    'FOLLOW_UP_OR_NEXT_APPOINTMENT' => [
        '0' => ['name' => 'No follow up required', 'intervalrime' => 'days', 'value' => '0'],
        //'1' => ['name' => '1 days after change in treatment to see the effect', 'intervalrime' => 'days', 'value' => '1'],
        //'2' => ['name' => '2 months after change in treatment to see the effect', 'intervalrime' => 'months', 'value' => '2'],
        //'3' => ['name' => '2 months after laser appointment', 'intervalrime' => 'months', 'value' => '2'],
        '15' => ['name' => '1 week', 'intervalrime' => 'weeks', 'value' => '1'],
        '16' => ['name' => '2 weeks', 'intervalrime' => 'weeks', 'value' => '2'],
        '17' => ['name' => '3 weeks', 'intervalrime' => 'weeks', 'value' => '3'],
        '1' => ['name' => '4 weeks', 'intervalrime' => 'weeks', 'value' => '4'],
        '8' => ['name' => '6 weeks', 'intervalrime' => 'weeks', 'value' => '6'],
        '2' => ['name' => '2 months', 'intervalrime' => 'months', 'value' => '2'],
        '9' => ['name' => '3 months', 'intervalrime' => 'months', 'value' => '3'],
        '4' => ['name' => '4 months', 'intervalrime' => 'months', 'value' => '4'],
        '10' => ['name' => '5 months', 'intervalrime' => 'months', 'value' => '5'],
        '5' => ['name' => '6 months', 'intervalrime' => 'months', 'value' => '6'],
        '11' => ['name' => '7 months', 'intervalrime' => 'months', 'value' => '7'],
        '12' => ['name' => '8 months', 'intervalrime' => 'months', 'value' => '8'],
        '7' => ['name' => '9 months', 'intervalrime' => 'months', 'value' => '9'],
        '13' => ['name' => '10 months', 'intervalrime' => 'months', 'value' => '10'],
        '14' => ['name' => '11 months', 'intervalrime' => 'months', 'value' => '11'],
        '6' => ['name' => '12 months', 'intervalrime' => 'months', 'value' => '12'],
        
    ],
    'GLAUCOMA_CARE_PLAN_REQUIRED' => [
        'YES' => 'Yes',
        'YES_STANDARD_12_MONTHLY' => 'Yes - standard 12 monthly',
        'YES_EXTRA_6_MONTHLY' => 'Yes - extra 6 monthly',
        'NO' => 'No'
    ],
    'DIAGNOSIS_EYE' => [
        'RE' => 'Right',
        'LE' => 'Left',
        'BOTH' => 'Bilateral',
    ],
    'FAMILY_HISTORY_OF_GLAUCOMA' => [
        'YES' => 'Yes',
        'NO' => 'No',
    ],
    'FAMILY_MEMBER' => [
        '1' => 'Father',
        '2' => 'Mother',
        '3' => 'Siblings',
        '4' => 'Uncle',
        '5' => 'Aunt',
        '6' => 'Grand parents',
    ],
    'VISUAL_FIELD_PROGRESSION' => [
        'STABLE' => 'Stable',
        'SLOW_PROGRESSION' => 'Slow progression',
        'FAST_PROGRESSION' => 'Fast progression',
    ],

]);

define('PRESCRIPTION_DROP_DOWNS', ['PRESCRIPTION_EYE' => [
    'RE' => 'Right',
    'LE' => 'Left',
    'BOTH' => 'Bilateral',
    'OTHER' => 'Other',
]]);

define('INVOICE_REPORT_TYPE', [
    'VISUAL_FIELDS' => ['name' => 'Visual fields', 'price' => '40'],
    'OCT' => ['name' => 'OCT', 'price' => '40'],
    'VISUAL_FIELDS_AND_OCT' => ['name' => 'Visual fields and OCT', 'price' => '80'],
]);

define('INVOICE_ITEM', [
    'ITEM_1' => ['name' => 'New consult', 'price' => '250'],
    'ITEM_2' => ['name' => 'Follow up', 'price' => '150'],
    'ITEM_3' => ['name' => 'CCT/OCT', 'price' => '0.00'],
    'ITEM_4' => ['name' => 'Phacoemulsification', 'price' => '869'],
    'ITEM_5' => ['name' => 'SLT Unilateral-C6111', 'price' => '325'],
    'ITEM_6' => ['name' => 'SLT Bilateral-C6110', 'price' => '408'],
    'ITEM_7' => ['name' => 'YAG PIC6230 Unilateral', 'price' => '335'],
    'ITEM_8' => ['name' => 'YAG PC Unilateral-7340', 'price' => '188'],
    'ITEM_9' => ['name' => 'YAGPC Bilateral-C7341', 'price' => '235'],
    'ITEM_10' => ['name' => 'Stent-6120', 'price' => '1200'],
    'ITEM_11' => ['name' => 'Trab-6010', 'price' => '1400'],
    'ITEM_12' => ['name' => 'Others', 'price' => '0.00'],
]);

define('PAYMENT_INFO', [
    "LINE_NAME" => "Sharma Vision",
    "LINE_ADDRESS_1" => "105 Fitz Roy Avenue, Harborne",
    "LINE_ADDRESS_2" => "Birmingham, B17 8RG",
    "LINE_ACCOUNT_ENQUIRIES" => "07758057733",
    "LINE_EMAIL" => "secretaryoj@gmail.com",
]);

define('INVOICE_TERMS_NOTE', "There may be a separate charge for any tests, procedures, drugs, x-rays etc");
define('INVOICE_TERMS', "Mr Sharma reserves the right to charge interest and a collection fee of £20 or 10% of the invoice value (whichever is the greater) on all accounts, which are overdue for payment.
<!-- <br><span style='font-size: 12px;'>Tarun Sharma & Sushma Sharma are Directors of Sharma Vision, Company number-8932399.</span> -->");
//Changes made on 01-02-2022

define('INVOICE_DOCTOR_DETAIL', [
    "NAME" => 'Mr. Tarun Sharma',
    "DEGREE" => 'MBBS, MD(Glaucoma), FRCS Ed',
    "POSITION" => 'Regional Specialist in Glaucoma & Cataract Surgery',
]);
/* define('APPOINTMENT_SIDE_BAR',"
<table  border=0 cellspacing='0' style='padding:0px'> 
    <tr><td colspan='2'><b>Upload Referral/Investigation</b></td></tr>
    <tr><td colspan='2'>Communicate via <b>PORTAL</b></td></tr>
    <tr><td colspan='2'><span style='font-size:15px; color:#151c56'><b>My Eye Record & Care</b></span></td></tr>
    <tr><td colspan='2'>www.worcesterglaucoma.co.uk</td></tr>
    <tr><td colspan='2'><b>For Appointments:</b></td></tr>
    <tr><td width='115px'>Spire South Bank:</td><td width='35px' align='right'>01905362033</td></tr>
    <tr><td>Spire Clinic Droitwich:</td><td align='right'>01905799116</td></tr>
    <tr><td>Droitwich Spa Hospital:</td><td align='right'>01905793333</td></tr>
    <tr><td colspan='2'><b>Private Practice Manager</b></td></tr>
    <tr><td colspan='2'>Ms Neve Fairless</td></tr>
    <tr><td colspan='2'>Email: secretaryoj@gmail.com</td></tr>
    <tr><td><b>Accounts Enquiries</b>:</td><td align='right'>07758057733</td></tr></table>"); */

define('APPOINTMENT_SIDE_BAR',"
        <div style='line-height: 17px;'><b>Upload Referral/Investigation</b><br>
        Communicate via <b>PORTAL</b><br>
        <span style='font-size:15px; color:#151c56'><b>My Eye Record & Care</b></span><br>
        www.worcesterglaucoma.co.uk<br>
        <b>For Appointments:</b><br>
        Spire South Bank: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 01905362033<br>
        Spire Clinic Droitwich: &nbsp; 01905799116<br>
        Droitwich Spa Hospital: 01905793333<br>
        <b>Admin & account</b><br>
        Email: secretaryoj@gmail.com<br>
        <b>Accounts Enquiries</b>: &nbsp; 07758057733</div>");

define('FOOTER_LINE_1','<b>Award Winner: International Glaucoma Association: BEST GLAUCOMA SERVICE UK 2014/2015</b>');
define('FOOTER_LINE_2','<b>‘FOR PROVIDING AN OUTSTANDING SERVICE TO PATIENTS’</b>');
define('FOOTER_LINE_3','Tarun Sharma is the Director of Sharma Vision Ltd, Company number 8932399');
define('FOOTER_LINE_4','Office Address-105 Fitz Roy Avenue, Birmingham, B17 8RG');

//Changes made on 01-02-2022
define('MY_EYE_RECORD_CARE','<b>M</b>y<br/><b>E</b>ye <br/><b>R</b>ecord & <br/><b>C</b>are');
//Changes made on 22-08-2022
define('PATIENT_GP_EMAIL_GREETING',"Dear #PATIENT_FIRST_NAME,"."<br><br><br>");
define('PATIENT_GP_EMAIL_FOOTER_GREETING','<br><br><br><br><br>Best wishes,<br><br>Admin Team<br>on Behalf of <br>Mr Tarun Sharma<br>Consultant Ophthalmologist');

define('PATIENT_GP_EMAIL_BODY',"Dear #PATIENT_FIRST_NAME,"."<br><br><br>".
"Please find the clinic letter attached. We have sent the email to your optometrist and GP surgery as well."."<br><br>".

"If you have any query, please email secretaryoj@gmail.com.");
define('THIRD_PARTY_EMAIL_BODY', "Dear #THIRD_PARTY_NAME,"."<br><br><br>".
"Please find enclosed the clinic letter for our mutual patient following a recent clinic visit. "."<br><br>".
"Thank you for your ongoing support and help in sharing the ophthalmic care.");

define('STATUS_FOLLOWUP_OPTICIAN', 'OPTICIAN_REVIEWED');
define('STATUS_FOLLOWUP_ACCEPTED', 'ACCEPTED');
define('STATUS_FOLLOWUP_NEW', 'NEW');
define('STATUS_FOLLOWUP_IN_QUEUE', 'IN_QUEUE');
define('STATUS_PAYMENT_UNPAID', 'UNPAID');
define('STATUS_PAYMENT_PAID', 'PAID');
define('STATUS_PAYMENT_INVOIVE', [
        'PAID' => 'Paid',
        'UNPAID' => 'Unpaid',
        'Partially Paid' => 'Partially Paid',
        'Pending' => 'Pending',
        'In Process' => 'In Process',
        'Cancelled' => 'Cancelled',
        'Other' => 'Other',
        'Unknown' => 'Unknown',
    ]
);

define('PRESCRIPTION_FREQUENCY', [
    'Once a day' => 'Once a day',
    'Twice a day' => 'Twice a day',
    'Three times a day' => 'Three times a day',
    '4x a day' => '4x a day',
    '6x a day' => '6x a day ',
    'Every 2 hourly' => 'Every 2 hourly',
    'Every 1 hourly' => 'Every 1 hourly',
]
);

define('PAYMENT_STATUS_FILTER_INVOIVE', [
        'ALL' => 'ALL',
        'Paid' => 'Paid',
        'Unpaid' => 'Unpaid',
        'Partially Paid' => 'Partially Paid',
        /* 'Pending' => 'Pending',
        'In Process' => 'In Process', */
        'Cancelled' => 'Cancelled',
        /* 'Other' => 'Other',
        'Unknown' => 'Unknown', */
    ]
);
define('PAYMENT_STATUS_FILTER_UNPAID', 'Unpaid');

define('STATUS_PAYMENT', ['ALL' => 'All', 'PAID' => 'Paid', 'UNPAID' => 'Unpaid', 'NOT_SUITABLE' => 'Not suitable']);
define('STATUS_FOLLOWUP', ['ALL' => 'All', 'NEW' => 'New', 'OPTICIAN_REVIEWED' => 'Optician Reviewed', 'ACCEPTED' => 'Accepted', 'NOT_SUITABLE' => 'Not suitable', 'NON_MERC_FOLLOWUP' => 'Non gcp followup','APPOINTMENT_CREATED'=>'Appointment Created']);
define('STATUS_DOCTOR_FOLLOWUP', ['ALL' => 'All', 'NEW' => 'New', 'ACCEPTED' => 'Accepted', 'APPOINTMENT_CREATED'=>'Appointment Created']);


define('FOLLOWUP_MED_SEC_STATUS', ['ALL' => 'All', 'OPTICIAN_REVIEWED' => 'Optician Reviewed', 'ACCEPTED' => 'Accepted', 'NOT_SUITABLE' => 'Not suitable', 'NON_MERC_FOLLOWUP' => 'Non gcp followup']);
//define('FOLLOWUP_OPTICIAN_STATUS', ['ALL' => 'All', 'NEW' => 'New', 'OPTICIAN_REVIEWED' => 'Optician Reviewed', 'ACCEPTED' => 'Accepted', 'NOT_SUITABLE' => 'Not suitable']);
define('FOLLOWUP_OPTICIAN_STATUS', ['ALL' => 'All', 'NEW' => 'New', 'ACCEPTED' => 'Accepted', 'NOT_SUITABLE' => 'Not suitable']);
define('REFERRAL_OPTICIAN_STATUS', ['ALL' => 'ALL', 'NEW' => 'New', 'ACCEPTED' => 'Accepted', 'REJECTED' => 'Not suitable', 'DRAFT' => 'Draft']);
define('REFERRAL_MED_SEC_STATUS', ['ALL' => 'ALL', 'NEW' => 'New', 'ACCEPTED' => 'Accepted', 'REJECTED' => 'Not suitable']);
define('STATUS_ALL', 'ALL');

define('INVOICE_REMINDER_EMAIL_TEMPLATE', "
Dear #PATIENT_FIRST_NAME<br><br>
<center><strong><u>Outstanding Invoice</u></strong></center><br><br>
Our computer records show that the following invoice/s are showing as outstanding. The details are as follows:<br>
Invoice Number: #INVOICE_NUMBER <br>
Invoice Date: #INVOICE_DATE <br>
Event Date: #INVOICE_TREATMENT_DATE <br>
Invoice Total: #INVOICE_TOTAL <br>
Balance Outstanding: #INVOICE_DUE <br><br>

If you have medical insurance could you please follow this up with your insurance company or alternatively if
you have no insurance could you please settle this overdue amount promptly. Please note this refers only to
the invoice stated, if other monies are outstanding under a different invoice number a separate reminder will
follow in due course. <br><br>
We apologize if this letter should cross in the post with any payment due to Mr Sharma. Should you have any
queries please contact us on 07758057733or by email, secretaryoj@gmail.com. If this invoice has been paid
directly to Spire eye centre please leave a message for us stating the invoice number along with your name
and we will ensure that the records are updated. Please makes cheques payable to: Mr Tarun Sharma.
Thank you for your assistance in this matter. <br><br>
Yours sincerely <br>
<strong>Accounts Team</strong> <br>
<strong>Sharma Vision</strong> <br><br>
Enc Invoice #INVOICE_NUMBER
");

define('INVOICE_REMINDER_LETTER_TEMPLATE', "
#TODAY_DATE<br>
#PATIENT_FULLNAME
#PATIENT_ADDRESS<br><br>
Dear #PATIENT_TITLE_LAST_NAME<br><br>
<center><strong><u>Outstanding Invoice</u></strong></center><br><br>
Our computer records show that the following invoice/s are showing as outstanding. The details are as follows:<br>
Invoice Number: #INVOICE_NUMBER <br>
Invoice Date: #INVOICE_DATE <br>
Event Date: #INVOICE_TREATMENT_DATE <br>
Invoice Total: #INVOICE_TOTAL <br>
Balance Outstanding: #INVOICE_DUE <br><br>

If you have medical insurance could you please follow this up with your insurance company or alternatively if
you have no insurance could you please settle this overdue amount promptly. Please note this refers only to
the invoice stated, if other monies are outstanding under a different invoice number a separate reminder will
follow in due course. <br><br>
We apologize if this letter should cross in the post with any payment due to Mr Sharma. Should you have any
queries please contact us on 07758057733or by email, secretaryoj@gmail.com. If this invoice has been paid
directly to Spire eye centre please leave a message for us stating the invoice number along with your name
and we will ensure that the records are updated. Please makes cheques payable to: Mr Tarun Sharma.
Thank you for your assistance in this matter. <br><br>
Yours sincerely <br>
<strong>Accounts Team</strong> <br>
<strong>Sharma Vision</strong> <br><br>
Enc Invoice #INVOICE_NUMBER
");