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
define('USER_FOLLOWUP_MED_ROLE', ['Med. Secretary', 'Admin', 'Optometrist']);
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
        '30' => '30'
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
    ],
    'FOLLOW_UP_OR_NEXT_APPOINTMENT' => [
        '0' => ['name' => 'No follow up required', 'intervalrime' => 'days', 'value' => '0'],
        //'1' => ['name' => '1 days after change in treatment to see the effect', 'intervalrime' => 'days', 'value' => '1'],
        '2' => ['name' => '2 months after change in treatment to see the effect', 'intervalrime' => 'months', 'value' => '2'],
        '3' => ['name' => '2 months after laser appointment', 'intervalrime' => 'months', 'value' => '2'],
        '4' => ['name' => '4 months', 'intervalrime' => 'months', 'value' => '4'],
        '5' => ['name' => '6 months', 'intervalrime' => 'months', 'value' => '6'],
        '6' => ['name' => '12 months', 'intervalrime' => 'months', 'value' => '12'],
    ],
    'GLAUCOMA_CARE_PLAN_REQUIRED' => [
        'YES' => 'Yes',
        'YES_STANDARD_12_MONTHLY' => 'Yes - standard 12 monthly',
        'YES_EXTRA_6_MONTHLY' => 'Yes - extra 6 monthly',
        'NO' => 'No'
    ],
    'DIAGNOSIS_EYE' => [
        'RE' => 'Right eye',
        'LE' => 'Left eye',
        'BOTH' => 'Both eyes',
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
    'RE' => 'Right eye',
    'LE' => 'Left eye',
    'BOTH' => 'Both eyes',
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
    'ITEM_4' => ['name' => 'Phaco Emulsifycation', 'price' => '869'],
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
    "NAME" => 'Tarun Sharma',
    "DEGREE" => 'MBBS MD FRCS (Ed)',
    "POSITION" => 'Consultant Ophthalmic Surgeon',
]);
define('APPOINTMENT_SIDE_BAR','<b>Upload Referral/Investigation</b><br>
Communicate via <b>PORTAL</b><br> 
<b>My Eye Record & Care</b><br>
www.worcesterglaucoma.co.uk<br>
<b>For Appointments:</b><br>
Spire South Bank:           01905362033<br>
Spire Clinic Droitwich:   01905799116<br>
Droitwich Spa Hospital: 01905793333<br>
<b>Private Practice Manager</b><br>
Ms Neve Fairless <br>
Email:secretaryoj@gmail.com<br>
Phone: 07437533520 <br>
<b>Accounts Enquiries</b>: 07758057733');

define('FOOTER_LINE_1','<b>Award Winner: International Glaucoma Association: BEST GLAUCOMA SERVICE UK 2014/2015</b>');
define('FOOTER_LINE_2','<b>‘FOR PROVIDING AN OUSTANDING SERVICE TO PATIENTS’</b>');
define('FOOTER_LINE_3','<b>Tarun Sharma is the Director of Sharma Vision Ltd, Company number 8932399</b>');
define('FOOTER_LINE_4','<b>Office Address-105 Fitz Roy Avenue, Birmingham, B17 8RG</b>');

//Changes made on 01-02-2022
define('MY_EYE_RECORD_CARE','<b>M</b>y<br/><b>E</b>ye <br/><b>R</b>ecord & <br/><b>C</b>are');

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

define('PAYMENT_STATUS_FILTER_INVOIVE', [
        'ALL' => 'ALL',
        'Paid' => 'Paid',
        'Unpaid' => 'Unpaid',
        'Partially Paid' => 'Partially Paid',
        'Pending' => 'Pending',
        'In Process' => 'In Process',
        'Cancelled' => 'Cancelled',
        'Other' => 'Other',
        'Unknown' => 'Unknown',
    ]
);
define('PAYMENT_STATUS_FILTER_UNPAID', 'Unpaid');

define('STATUS_PAYMENT', ['ALL' => 'All', 'PAID' => 'Paid', 'UNPAID' => 'Unpaid', 'NOT_SUITABLE' => 'Not suitable']);
define('STATUS_FOLLOWUP', ['ALL' => 'All', 'NEW' => 'New', 'OPTICIAN_REVIEWED' => 'Optician Reviewed', 'ACCEPTED' => 'Accepted', 'NOT_SUITABLE' => 'Not suitable', 'NON_MERC_FOLLOWUP' => 'Non gcp followup']);

define('FOLLOWUP_MED_SEC_STATUS', ['ALL' => 'All', 'OPTICIAN_REVIEWED' => 'Optician Reviewed', 'ACCEPTED' => 'Accepted', 'NOT_SUITABLE' => 'Not suitable', 'NON_MERC_FOLLOWUP' => 'Non gcp followup']);
define('FOLLOWUP_OPTICIAN_STATUS', ['ALL' => 'All', 'NEW' => 'New', 'OPTICIAN_REVIEWED' => 'Optician Reviewed', 'ACCEPTED' => 'Accepted', 'NOT_SUITABLE' => 'Not suitable']);
define('REFERRAL_OPTICIAN_STATUS', ['ALL' => 'ALL', 'NEW' => 'New', 'ACCEPTED' => 'Accepted', 'REJECTED' => 'Not suitable', 'DRAFT' => 'Draft']);
define('REFERRAL_MED_SEC_STATUS', ['ALL' => 'ALL', 'NEW' => 'New', 'ACCEPTED' => 'Accepted', 'REJECTED' => 'Not suitable']);
define('STATUS_ALL', 'ALL');
