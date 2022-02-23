<?php


// Twilio account details
define('TWILIO_ACCOUNT_SID', ENV_TWILIO_ACCOUNT_SID);
define('TWILIO_AUTH_TOKEN', ENV_TWILIO_AUTH_TOKEN);
define('TWILIO_NUMBER', ENV_TWILIO_NUMBER);

// Tokbox details
define('TOKBOX_APIKEY', ENV_TOKBOX_APIKEY);
define('TOKBOX_APISECRET', ENV_TOKBOX_APISECRET);

define('CONSULTATION_TYPE', [
								'face_to_face' => 'Face to Face',
								'video_consultation' => 'Video consultation',
								'telephone_consultation' => 'Telephone consultation',
							]);
define('APPOINTMENT_STATUS', [
								'1' => 'In Process',
								'3' => 'Confirmed',
								'5' => 'Completed',
								'6' => 'Cancelled',
							]);
// Medicale insurance companies
define('MEDICALE_INSURANCE_COMPANIES', ['BUPA' => 'Bupa',
										'AXA' => 'AXA',
										'VITALITY' => 'Vitality',
										'WPA' => 'WPA',
										'AVIVA' => 'Aviva',
										'BENEDON' => 'Benedon',
										'OTHER' => 'Other']);

define('CONFIRMED_APPOINTMENT_STATUS_ID', 3);
define('COMPLETED_APPOINTMENT_STATUS_ID', 5);
define('APPOINTMENT_VIDEO_CONSULTATION_TYPE', 'video_consultation');

define('DEFAULT_COUNTRY_CODE', '+44');

// Text message
define('TEXT_MSG_APPOINTMENT_BOOKING_CONFIRMATION', "Dear {patient_name},\r\n\r\nYour appointment with Dr Tarun Sharma has been booked on {appointment_time}. Click the link for the location details https://www.worcesterglaucoma.co.uk/private-consultations-with-mr-tarun-sharma \r\n\r\nRegards,\r\n" . NAME);
define('TEXT_MSG_APPOINTMENT_BOOKING_CONFIRMATION_WITH_HOSTPITAL', "Dear {patient_name},\r\n\r\nYour appointment with Dr Tarun Sharma has been booked on {appointment_time} at {hospital_name}. Check your email for more details. For queries call {hospital_phone_number}. Click the link for the location details https://www.worcesterglaucoma.co.uk/private-consultations-with-mr-tarun-sharma\r\n\r\nRegards,\r\n" . NAME);
define('TEXT_MSG_APPOINTMENT_STATUS_UPDATE', 'Dear {patient_name}, Your appointment status update with ' . NAME . '.');
define('TEXT_MSG_APPOINTMENT_REMINDER', 'Dear {patient_name}, This is a reminder from ' . NAME . ' about your appointment on {appointment_time}' . '.');
define('TEXT_MSG_OPEN_CALL_INVITATION', 'Hello, This is {doctor_name}. Join me on video call: {video_consultation_link}');

//Used to reduce image file quality in percentage
define('FILE_QLT_REDUCE_PERCENT',  [
										// size of img file in mb => quality reduce in percentage(max 100)
										'10' => '50',
										'4'  => '40',
										'2'  => '30',
									]);

// Direct Debit Form Originator’s Identification Number
define('IDENTIFICATION_NUMBER',[
    '0'=>'1',
    '1'=>'2',
    '2'=>'3',
    '3'=>'4',
    '4'=>'5',
    '5'=>'6',
]);

define("DOCTOR_COMMENT", "It was a pleasure to see you in my private clinic today. I am sending a copy of this letter to Practice Manager. so that you can get glaucoma medications on the repeat prescription. Please watch the video on introduction to eye drops on https://www.worcesterglaucoma.co.uk. This website will help you to get an up to date education material on glaucoma and use the eye drops with correct drop technique. I shall see you again on your next visit. I am happy for you to get OCT of optic disc and threshold visual fields done at optician if available. Please arrange these test with your optician or at hospital before your next visit and bring the results with you on the next visit.");

define("OPTICIAN_COMMENT", "Thank you for your kind referral for PATIENT_NAME to my private Complex Glaucoma/ Cataract clinic.");

?>