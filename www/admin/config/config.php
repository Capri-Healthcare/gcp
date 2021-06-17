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

define('USER_ROLE', ['Med. Secretary', 'Admin', 'GCP Secretary']);
define('USER_FOLLOWUP_MED_ROLE', ['Med. Secretary', 'Admin', 'Optometrist']);
define('USER_FOLLOWUP_GCP_ROLE', ['Admin', 'GCP Secretary']);
define('DASHBOARD_NOT_SHOW', ['Med. Secretary', 'Optometrist', 'GCP Secretary']);
define('USER_ROLE_OPTOMETRIST', 'Optometrist');
define('USER_ROLE_MED', 'Med. Secretary');
define('USER_ROLE_GCP', 'GCP Secretary');
define('USER_ROLE_ADMIN', 'Admin');

define('STATUS', ['NEW' => 'New', 'ACCEPTED' => 'Accepted', 'REJECTED' => 'Not suitable', 'DRAFT' => 'Draft']);
define('STATUS_NEW', 'NEW');
define('STATUS_ACCEPTED', 'ACCEPTED');
define('STATUS_DRAFT', 'DRAFT');

define('STATUS_MED_ROLE', ['NEW' => 'New', 'ACCEPTED' => 'Accepted', 'REJECTED' => 'Not suitable']);

define('FOLLOWUP_DOCUMENT_NAME', ['Referral letter' => 'Referral letter', 'Visual fields - Right eye' => 'Visual fields - Right eye', 'Visual fields - Left eye' => 'Visual fields - Left eye', 'OCT - Right eye' => 'OCT - Right eye', 'OCT - Left eye' => 'OCT - Left eye', 'Fundus - Right eye' => 'Fundus - Right eye', 'Fundus - Left eye' => 'Fundus - Left eye']);

define('USER_ROLE_ID', ['Med. Secretary' => '7', 'GCP Secretary' => '11']);
define('CC', 'chetanthumar@gmail.com,sanjay.makwana@tiez.nl');
define('GCP_REQUIRE', ['YES' => 'Yes', 'NO' => 'No', 'OFFER' => 'Offered']);

define('HOSPITAL_LIST', [
    'SSPBH' => [
        "name" => 'Spire South Bank Hospital',
        "mobile" => '01905350003',
        "address" => '139 Bath Road WORCESTER WR5 3YB',
        "email" => "hospital1@mailinator.com",
        "web" => "http://www.spirehealthcare.com/southbank"
    ],
    'BTDSH' => [
        "name" => 'BMI The Droitwich Spa Hospital',
        "mobile" => '01905 793333',
        "address" => 'St Andrews Road DROITWICH WR9 8DN',
        "email" => "hospital2@mailinator.com",
        "web" => "http://www.bmihealthcare.co.uk"
    ]
]);

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
        'UNSTABLE_BOOK_FOR_LASER' => 'Unstable - Book for laser',
        'UNSTABLE_BOOK_FOR_SURGERY' => 'Unstable - Book for Surgery',
    ],
    'FOLLOW_UP_OR_NEXT_APPOINTMENT' => [
        '1' => '2 months after change in treatment to see the effect',
        '2' => '2 months after laser appointment',
        '4' => '4 months',
        '6' => '6 months',
        '12' => '12 months',
    ],
    'GLAUCOMA_CARE_PLAN_REQUIRED' => [
        'YES' => 'Yes',
        'YES_STANDARD_12_MONTHLY' => 'Yes - standard 12 monthly',
        'YES_EXTRA_6_MONTHLY' => 'Yes - extra 6 monthly',
        'NO' => 'No'
    ],
    'DIAGNOSIS_EYE' => [
        'RE' => 'Re',
        'LE' => 'Le',
        'BOTH' => 'Both',
    ],

]);

define('HOSPITAL', [
    'SSPBH' => 'Spire South Bank Hospital<br/>Mobile:01905350003<br/>Address:139 Bath Road WORCESTER WR5 3YB<br/>Email:hsc@spirehealthcare.com<br>Web:http://www.spirehealthcare.com/southbank',
    'BTDSH' => 'BMI The Droitwich Spa Hospital<br/>Mobile:01905 793333<br/>Address:St Andrews Road DROITWICH WR9 8DN<br/>Email:info@bmihealthcare.co.uk,<br>Web:http://www.bmihealthcare.co.uk'
]);

define('STATUS_PAYMENT', ['PAID' => 'Paid', 'UNPAID' => 'Unpaid', 'NOT_SUITABLE' => 'Not suitable']);
define('STATUS_FOLLOWUP', ['NEW' => 'New', 'OPTICIAN_REVIEWED' => 'Optician Reviewed', 'ACCEPTED' => 'Accepted', 'NOT_SUITABLE' => 'Not suitable']);
define('STATUS_FOLLOWUP_OPTICIAN', 'OPTICIAN_REVIEWED');
define('STATUS_FOLLOWUP_ACCEPTED', 'ACCEPTED');
define('STATUS_FOLLOWUP_NEW', 'NEW');
define('STATUS_PAYMENT_UNPAID', 'UNPAID');
define('STATUS_PAYMENT_PAID', 'PAID');