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
define('APPOINTMENT_VIDEO_CONSULTATION_TYPE', 'video_consultation');

define('DEFAULT_COUNTRY_CODE', '+44');

// Text message
define('TEXT_MSG_APPOINTMENT_BOOKING_CONFIRMATION', 'Dear {patient_name}, Your appointment has been booked with ' . NAME);
define('TEXT_MSG_APPOINTMENT_STATUS_UPDATE', 'Dear {patient_name}, Your appointment status update with ' . NAME);
define('TEXT_MSG_APPOINTMENT_REMINDER', 'Dear {patient_name}, This is a reminder from ' . NAME . ' about your appointment on {appointment_time}');
define('TEXT_MSG_OPEN_CALL_INVITATION', 'Hello, This is {doctor_name}. Join me on video call: {video_consultation_link}');

//Used to reduce image file quality in percentage
define('FILE_QLT_REDUCE_PERCENT',  [
										// size of img file in mb => quality reduce in percentage(max 100)
										'10' => '50',
										'4'  => '40',
										'2'  => '30',
									]);

?>