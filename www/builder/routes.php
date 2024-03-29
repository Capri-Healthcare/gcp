<?php
$router->get('color', 'CommonController@setColor');
$router->get('shortcodes', 'CommonController@shortCodes');
$router->get('comingsoon', 'CommonController@comingSoon');
$router->get('maintenance', 'CommonController@maintenanceMode');
$router->get('home', 'HomeController@index');
$router->get('services', 'ServiceController@index');
$router->get('service', 'ServiceController@singleService');
$router->get('doctors', 'DoctorController@index');
$router->get('blogs', 'BlogController@index');
$router->get('blog', 'BlogController@singleBlog');
$router->get('category', 'BlogController@categoryBlog');
$router->get('about', 'AboutController@index');
$router->get('contact', 'ContactController@index');
$router->post('contact', 'ContactController@indexAction');
$router->get('gallery', 'GalleryController@index');
$router->get('privacy-policy', 'PrivacyController@index');
$router->get('terms-condition', 'TcController@index');
$router->get('faq', 'FaqController@index');
$router->get('login', 'LoginController@index');
$router->post('login', 'LoginController@login');
$router->get('register', 'RegisterController@index');
$router->post('register', 'RegisterController@register');
$router->get('forgot', 'ForgotController@index');
$router->post('forgot', 'ForgotController@forgot');
$router->get('profile/changepassword', 'ForgotController@passwordResetPage');
$router->post('profile/changepassword', 'ForgotController@passwordReset');
$router->get('register/verify', 'RegisterController@userVerfiy');
$router->get('register/user', 'RegisterController@checkUserExists');
$router->get('logout', 'LogoutController@index');
$router->get('user/dashboard', 'UserController@dashboard');
$router->get('user/appointments', 'UserController@getAppointments');
$router->get('user/appointment', 'UserController@getAppointment');
$router->get('user/prescription', 'UserController@getPrescription');
$router->get('user/request', 'UserController@request');
$router->get('user/profile', 'UserController@profile');
$router->get('evaluation-report', 'RegisterController@getEvaluationReport');

$router->get('user/glaucoma', 'UserController@glaucomacarplan');
$router->post('user/glaucoma/documentUpload', 'UserController@documentUpload');
$router->post('user/glaucoma/documentremove', 'UserController@deletePatientDDIDocument');
$router->get('pdf-demo', 'UserController@demoPdf');
$router->get('download-direct-debit-form', 'UserController@downloadDirectDebitForm');

$router->post('user/profile', 'UserController@profileUpdate');
$router->get('user/profile/password', 'UserController@changePassword');
$router->post('user/profile/password', 'UserController@profileUpdatePassword');
$router->get('user/invoices', 'UserController@getInvoices');
$router->get('user/invoice', 'UserController@invoice');
$router->get('user/invoice/pdf', 'UserController@invoicePdf');
$router->get('user/records', 'UserController@records');
$router->get('user/records/print', 'UserController@recordsPrint');
$router->get('makeanappointment', 'AppointmentController@index');
$router->post('gettimeslot', 'AppointmentController@getTimeSlot');
$router->post('maekanappointment', 'AppointmentController@indexAction');

$router->post('subscribe', 'CommonController@subscriber');
$router->post('comment', 'BlogController@commentAction');
$router->post('review', 'ServiceController@reviewAction');

$router->get('invoice/paynow', 'PaymentController@index');
$router->get('invoice/cancelpay', 'PaymentController@indexCancel');
$router->get('invoice/successpay', 'PaymentController@indexSuccess');
$router->get('payment/success', 'PaymentController@indexSuccessShow');
$router->get('payment/cancel', 'PaymentController@indexCancelShow');


// $router->get('invoice/stripe', 'PaymentController@indexStripe');
// $router->post('invoice/stripe', 'PaymentController@indexStripeAction');
// $router->get('invoice/stripe/success', 'PaymentController@indexStripeSuccess');


$router->post('images/appointmentImagesUpload', 'AppointmentController@appointmentImageUpload');
$router->post('images/appointmentImageRemove', 'AppointmentController@appointmentImageRemove');
$router->post('form/savePreConsultationForm', 'AppointmentController@savePreConsultationForm');
$router->get('appointment/videoConsultation', 'AppointmentController@startVideoConsultation');
$router->get('video-consultation', 'AppointmentController@startVideoConsultation');

$router->get('cronjobs/reminderBeforeAppointment', 'CronJobController@reminderBeforeAppointment');
$router->get('cronjobs/follow-up-reminder', 'CronJobController@followupReminder');

$router->get('test/tokbox', 'TestTokbox@index');
$router->get('test/checkDocuSign', 'DocusignController@index');
$router->get('test/signWithDocuSign', 'DocusignController@createController');
$router->get('test/downloadDocuSignDoc', 'DocusignController@downloadDocuSignDoc');
$router->get('test/checkDocuSignReturn', 'DocusignController@checkDocuSignReturn');
$router->get('test/document', 'TestTokbox@testDocument');
$router->get('test/pdf', 'TestTokbox@testPDF');

