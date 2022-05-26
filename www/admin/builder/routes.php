<?php
$router->get('login', 'LoginController@index');
$router->post('login', 'LoginController@login');
$router->get('logout', 'LoginController@logout');
$router->get('forgotpassword', 'LoginController@forgotpassword');
$router->post('forgotpassword', 'LoginController@forgotAction');
$router->get('resetpassword', 'LoginController@resetpassword');
$router->post('resetpassword', 'LoginController@resetpasswordAction');
$router->get('profile', 'ProfileController@index');
$router->post('profile', 'ProfileController@indexAction');
$router->post('profile/password', 'ProfileController@indexPassword');
$router->get('dashboard', 'DashboardController@index');
$router->get('dashbaordappointment', 'DashboardController@getDashbaordAppointment');
$router->get('info', 'SettingController@index');
$router->post('info', 'SettingController@indexAction');
$router->get('customization', 'SettingController@customization');
$router->post('customization', 'SettingController@customizationAction');
$router->get('request', 'RequestController@index');
$router->get('request/view', 'RequestController@indexView');
$router->get('request/add', 'RequestController@indexAdd');
$router->post('request/add', 'RequestController@indexAction');
$router->get('request/edit', 'RequestController@indexEdit');
$router->post('request/edit', 'RequestController@indexAction');
$router->post('request/delete', 'RequestController@indexDelete');
$router->post('request/sendmail', 'RequestController@indexMail');
$router->get('patients', 'PatientController@index');
$router->get('patient/view', 'PatientController@indexView');
$router->get('patient/add', 'PatientController@indexAdd');
$router->post('patient/add', 'PatientController@indexAction');
$router->get('patient/edit', 'PatientController@indexEdit');
$router->post('patient/edit', 'PatientController@indexAction');
$router->post('patient/delete', 'PatientController@indexDelete');
$router->post('patient/sendmail', 'PatientController@indexMail'); // 
$router->get('patient/search', 'PatientController@searchPatient');
$router->get('gppractices/search', 'PatientController@searchGpPractices');
$router->get('notes', 'NotesController@index');
$router->post('note/add', 'NotesController@indexAction');
$router->post('note/edit', 'NotesController@indexAction');
$router->post('note/delete', 'NotesController@indexDelete');
$router->get('notes/search', 'NotesController@indexSearch');
$router->get('users', 'UserController@index');
$router->get('user/add', 'UserController@indexAdd');
$router->post('user/add', 'UserController@indexAction');
$router->get('user/edit', 'UserController@indexEdit');
$router->post('user/edit', 'UserController@indexAction');
$router->post('user/delete', 'UserController@indexDelete');
$router->get('role', 'UserController@userRole');
$router->get('role/add', 'UserController@userRoleAdd');
$router->post('role/add', 'UserController@userRoleAction');
$router->get('role/edit', 'UserController@userRoleEdit');
$router->post('role/edit', 'UserController@userRoleAction');
$router->post('role/delete', 'UserController@userRoleDelete');
$router->get('appointments', 'AppointmentController@index');
$router->get('appointment/view', 'AppointmentController@indexView');
$router->get('appointment/letters', 'AppointmentController@AppointmentLetters');
$router->post('appointment/add', 'AppointmentController@appointmentSidebar');
$router->get('appointment/edit', 'AppointmentController@indexEdit');
$router->post('appointment/edit', 'AppointmentController@indexAction');
$router->post('appointment/delete', 'AppointmentController@indexDelete');
$router->post('appointment/makeanappointment', 'AppointmentController@indexAppointment');
$router->post('appointment/sendmail', 'AppointmentController@indexMail');
$router->get('records/pdf', 'AppointmentController@pdfRecords');
$router->post('report/reportUpload', 'AppointmentController@documentUpload');
$router->post('report/removeReport', 'AppointmentController@documentRemove');
$router->get('prescriptions', 'PrescriptionController@index');
$router->get('prescription/view', 'PrescriptionController@indexView');
$router->get('prescription/pdf', 'PrescriptionController@indexPdf');
$router->get('prescription/add', 'PrescriptionController@indexAdd');
$router->get('prescription/edit', 'PrescriptionController@indexEdit');
$router->post('prescription/add', 'PrescriptionController@indexAction');
$router->post('prescription/edit', 'PrescriptionController@indexAction');
$router->post('prescription/delete', 'PrescriptionController@indexDelete');
$router->get('medicines', 'MedicineController@index');
$router->get('medicine/view', 'MedicineController@indexView');
$router->get('medicine/add', 'MedicineController@indexAdd');
$router->post('medicine/add', 'MedicineController@indexAction');
$router->get('medicine/edit', 'MedicineController@indexEdit');
$router->post('medicine/edit', 'MedicineController@indexAction');
$router->post('medicine/delete', 'MedicineController@indexDelete');
$router->get('getmedicine', 'MedicineController@getMedicine');
$router->post('medicine/upload', 'MedicineController@medicineUpload');
$router->get('medicine/sample', 'MedicineController@medicineSampleDownload');
$router->get('medicine/purchase', 'MedicineController@medicinePurchaseList');
$router->get('medicine/purchase/view', 'MedicineController@medicinePurchaseView');
$router->get('medicine/purchase/pdf', 'MedicineController@medicinePurchasePdf');
$router->get('medicine/purchase/add', 'MedicineController@medicinePurchaseAdd');
$router->post('medicine/purchase/add', 'MedicineController@medicinePurchaseAction');
$router->get('medicine/purchase/edit', 'MedicineController@medicinePurchaseEdit');
$router->post('medicine/purchase/edit', 'MedicineController@medicinePurchaseAction');
$router->post('medicine/purchase/delete', 'MedicineController@medicinePurchaseDelete');
$router->get('medicine/stock', 'MedicineController@stockList');
$router->post('medicine/stock', 'MedicineController@stockUpdate');
$router->post('medicine/stock/delete', 'MedicineController@stockDelete');
$router->get('medicine/billing', 'MedicineController@medicineBilling');
$router->get('medicine/billing/view', 'MedicineController@medicineBillingView');
$router->get('medicine/billing/pdf', 'MedicineController@medicineBillingPdf');
$router->get('medicine/billing/add', 'MedicineController@medicineBillingAdd');
$router->post('medicine/billing/add', 'MedicineController@medicineBillingAction');
$router->get('medicine/billing/edit', 'MedicineController@medicineBillingEdit');
$router->post('medicine/billing/edit', 'MedicineController@medicineBillingAction');
$router->post('medicine/billing/delete', 'MedicineController@medicineBillingDelete');
$router->post('getbatch', 'MedicineController@medicineBillingBatch');
$router->post('getbatchdata', 'MedicineController@medicineBillingBatchData');
$router->get('suppliers', 'SettingController@suppliers');
$router->post('supplier/add', 'SettingController@supplierAction');
$router->post('supplier/edit', 'SettingController@supplierAction');
$router->post('supplier/delete', 'SettingController@supplierDelete');
$router->get('medicine/category', 'MedicineController@mCategory');
$router->post('medicine/category/add', 'MedicineController@mCategoryAction');
$router->post('medicine/category/edit', 'MedicineController@mCategoryAction');
$router->post('medicine/category/delete', 'MedicineController@mCategoryDelete');
$router->get('salarytemplate', 'SalarytemplateController@index');
$router->get('salarytemplate/add', 'SalarytemplateController@indexAdd');
$router->post('salarytemplate/add', 'SalarytemplateController@indexAction');
$router->get('salarytemplate/edit', 'SalarytemplateController@indexEdit');
$router->post('salarytemplate/edit', 'SalarytemplateController@indexAction');
$router->post('salarytemplate/delete', 'SalarytemplateController@indexDelete');
$router->get('managesalary', 'ManagesalaryController@index');
$router->get('managesalary/view', 'ManagesalaryController@indexView');
$router->get('managesalary/add', 'ManagesalaryController@indexAdd');
$router->post('managesalary/add', 'ManagesalaryController@indexAction');
$router->get('managesalary/edit', 'ManagesalaryController@indexEdit');
$router->post('managesalary/edit', 'ManagesalaryController@indexAction');
$router->get('managesalary/history', 'ManagesalaryController@history');
$router->get('managesalary/history/view', 'ManagesalaryController@historyView');
$router->get('managesalary/history/pdf', 'ManagesalaryController@historyPdf');
$router->post('managesalary/history/delete', 'ManagesalaryController@historyDelete');
$router->get('makepayment', 'ManagesalaryController@makepayment');
$router->get('makepayment/add', 'ManagesalaryController@makepaymentAdd');
$router->post('makepayment/add', 'ManagesalaryController@makepaymentAction');
$router->post('checkstaffsalary', 'ManagesalaryController@checkStaffSalary');
$router->get('invoices', 'InvoiceController@index');
$router->get('invoice/view', 'InvoiceController@indexView');
$router->get('invoice/pdf', 'InvoiceController@indexPdf');
$router->post('invoice/sentmail', 'InvoiceController@indexMail');
$router->get('invoice/add', 'InvoiceController@indexAdd');
$router->post('invoice/add', 'InvoiceController@indexAction');
$router->get('invoice/edit', 'InvoiceController@indexEdit');
$router->post('invoice/edit', 'InvoiceController@indexAction');
$router->post('invoice/delete', 'InvoiceController@indexDelete');
//To send invoice in mail added on 16-04-2022
$router->get('invoice/sendinvoice', 'InvoiceController@invoiceMail');
$router->post('invoice/sendpreviewinvoice', 'InvoiceController@invoicePreviewMail');

$router->get('invoice/reminderemailpdf', 'InvoiceController@reminderEmailPdf');
//To send invoice in mail

$router->post('addpayment', 'InvoiceController@invoicePayment');
$router->get('autogenrateinvoice', 'InvoiceController@autoGenrateInvoice');
$router->get('expenses', 'ExpenseController@index');
$router->get('expense/add', 'ExpenseController@indexAdd');
$router->post('expense/add', 'ExpenseController@indexAction');
$router->get('expense/edit', 'ExpenseController@indexEdit');
$router->post('expense/edit', 'ExpenseController@indexAction');
$router->post('expense/delete', 'ExpenseController@indexDelete');
$router->get('subscribers', 'SubscriberController@index');
$router->get('subscriber/add', 'SubscriberController@indexAdd');
$router->post('subscriber/add', 'SubscriberController@indexAction');
$router->get('subscriber/edit', 'SubscriberController@indexEdit');
$router->post('subscriber/edit', 'SubscriberController@indexAction');
$router->post('subscriber/delete', 'SubscriberController@indexDelete');
$router->get('birthrecords', 'BirthdeathrecordController@birthList');
$router->get('birthrecord/view', 'BirthdeathrecordController@birthView');
$router->get('birthrecord/pdf', 'BirthdeathrecordController@birthPdf');
$router->get('birthrecord/add', 'BirthdeathrecordController@birthAdd');
$router->post('birthrecord/add', 'BirthdeathrecordController@birthAction');
$router->get('birthrecord/edit', 'BirthdeathrecordController@birthEdit');
$router->post('birthrecord/edit', 'BirthdeathrecordController@birthAction');
$router->post('birthrecord/delete', 'BirthdeathrecordController@birthDelete');
$router->get('deathrecords', 'BirthdeathrecordController@deathList');
$router->get('deathrecord/view', 'BirthdeathrecordController@deathView');
$router->get('deathrecord/pdf', 'BirthdeathrecordController@deathPdf');
$router->get('deathrecord/add', 'BirthdeathrecordController@deathAdd');
$router->post('deathrecord/add', 'BirthdeathrecordController@deathAction');
$router->get('deathrecord/edit', 'BirthdeathrecordController@deathEdit');
$router->post('deathrecord/edit', 'BirthdeathrecordController@deathAction');
$router->post('deathrecord/delete', 'BirthdeathrecordController@deathDelete');
$router->get('blogs', 'BlogController@index');
$router->get('blog/add', 'BlogController@indexAdd');
$router->post('blog/add', 'BlogController@indexAction');
$router->get('blog/edit', 'BlogController@indexEdit');
$router->post('blog/edit', 'BlogController@indexAction');
$router->post('blog/delete', 'BlogController@indexDelete');
$router->get('noticeboard', 'NoticeboardController@index');
$router->get('noticeboard/view', 'NoticeboardController@indexView');
$router->get('noticeboard/add', 'NoticeboardController@indexAdd');
$router->post('noticeboard/add', 'NoticeboardController@indexAction');
$router->get('noticeboard/edit', 'NoticeboardController@indexEdit');
$router->post('noticeboard/edit', 'NoticeboardController@indexAction');
$router->post('noticeboard/delete', 'NoticeboardController@indexDelete');
$router->get('comment', 'CommentController@index');
$router->get('comment/edit', 'CommentController@indexEdit');
$router->post('comment/edit', 'CommentController@indexAction');
$router->post('comment/delete', 'CommentController@indexDelete');
$router->get('category', 'CategoryController@index');
$router->get('category/edit', 'CategoryController@indexEdit');
$router->post('category/add', 'CategoryController@indexAction');
$router->post('category/edit', 'CategoryController@indexAction');
$router->post('category/delete', 'CategoryController@indexDelete');
$router->get('reviews', 'ReviewController@index');
$router->get('review/edit', 'ReviewController@indexEdit');
$router->post('review/edit', 'ReviewController@indexAction');
$router->post('review/delete', 'ReviewController@indexDelete');
$router->get('departments', 'DepartmentController@index');
$router->get('department/add', 'DepartmentController@indexAdd');
$router->post('department/add', 'DepartmentController@indexAction');
$router->get('department/edit', 'DepartmentController@indexEdit');
$router->post('department/edit', 'DepartmentController@indexAction');
$router->post('department/delete', 'DepartmentController@indexDelete');
$router->get('doctors', 'DoctorController@index');
$router->get('doctor/add', 'DoctorController@indexAdd');
$router->post('doctor/add', 'DoctorController@indexAction');
$router->get('doctor/edit', 'DoctorController@indexEdit');
$router->post('doctor/edit', 'DoctorController@indexAction');
$router->post('doctor/delete', 'DoctorController@indexDelete');
$router->get('doctor/search', 'DoctorController@searchDoctor');
$router->post('doctor/updateAddress', 'DoctorController@updateAddress');
$router->get('staffattendance', 'StaffattendanceController@index');
$router->get('staffattendance/view', 'StaffattendanceController@indexView');
$router->get('staffattendance/add', 'StaffattendanceController@indexAdd');
$router->post('staffattendance/add', 'StaffattendanceController@indexAction');
$router->get('facility', 'FacilityController@index');
$router->get('facility/add', 'FacilityController@indexAdd');
$router->post('facility/add', 'FacilityController@indexAction');
$router->get('facility/edit', 'FacilityController@indexEdit');
$router->post('facility/edit', 'FacilityController@indexAction');
$router->post('facility/delete', 'FacilityController@indexDelete');
$router->get('services', 'ServiceController@index');
$router->get('service/add', 'ServiceController@indexAdd');
$router->post('service/add', 'ServiceController@indexAction');
$router->get('service/edit', 'ServiceController@indexEdit');
$router->post('service/edit', 'ServiceController@indexAction');
$router->post('service/delete', 'ServiceController@indexDelete');
$router->get('testimonials', 'TestimonialController@index');
$router->get('testimonial/add', 'TestimonialController@indexAdd');
$router->post('testimonial/add', 'TestimonialController@indexAction');
$router->get('testimonial/edit', 'TestimonialController@indexEdit');
$router->post('testimonial/edit', 'TestimonialController@indexAction');
$router->post('testimonial/delete', 'TestimonialController@indexDelete');
$router->get('pages', 'PagesController@index');
$router->get('page/add', 'PagesController@indexAdd');
$router->post('page/add', 'PagesController@indexAction');
$router->get('page/edit', 'PagesController@indexEdit');
$router->post('page/edit', 'PagesController@indexAction');
$router->post('page/delete', 'PagesController@indexDelete');
$router->get('page/menu', 'PagesController@indexMenu');
$router->post('page/menu', 'PagesController@indexMenuAction');
$router->get('page/footer', 'PagesController@indexFooter');
$router->post('page/footer', 'PagesController@indexFooterAction');
$router->get('page/theme', 'PagesController@indexTheme');
$router->post('page/theme', 'PagesController@indexThemeAction');
$router->post('getmenupages', 'PagesController@getPageHeaderPages');
$router->post('getmenulink', 'PagesController@getPageHeaderLink');
$router->get('page/settings', 'PagesController@indexSettings');
$router->post('page/settings', 'PagesController@indexSettingsAction');
$router->get('icons', 'PagesController@iconsPage');
$router->get('items', 'ItemsController@index');
$router->post('item/add', 'ItemsController@indexAction');
$router->post('item/edit', 'ItemsController@indexAction');
$router->post('item/delete', 'ItemsController@indexDelete');
$router->get('item/search', 'ItemsController@indexSearch');
$router->get('expensetype', 'TypesController@expenseType');
$router->post('expensetype/add', 'TypesController@expenseTypeAction');
$router->post('expensetype/edit', 'TypesController@expenseTypeAction');
$router->post('expensetype/delete', 'TypesController@expenseTypeDelete');
$router->get('send/email', 'SenderController@indexMail');
$router->post('send/email', 'SenderController@indexMailAction');
$router->get('sendbulk/email', 'SenderController@indexBulkMail');
$router->post('sendbulk/email', 'SenderController@indexBulkMailAction');
$router->post('get/receiver', 'SenderController@indexUsers');
$router->get('emaillogs', 'SenderController@indexEmailLog');
$router->get('paymentmethod', 'FinanceController@paymentMethod');
$router->post('paymentmethod/add', 'FinanceController@paymentMethodAction');
$router->post('paymentmethod/edit', 'FinanceController@paymentMethodAction');
$router->post('paymentmethod/delete', 'FinanceController@paymentMethodDelete');
$router->get('tax', 'FinanceController@tax');
$router->post('tax/add', 'FinanceController@taxAction');
$router->post('tax/edit', 'FinanceController@taxAction');
$router->post('tax/delete', 'FinanceController@taxDelete');
$router->get('paymentgateway', 'FinanceController@paymentGateway');
$router->post('paymentgateway', 'FinanceController@paymentGatewayAction');
$router->get('emailtemplate', 'EmailtemplateController@emailTemplate');
$router->post('emailtemplate', 'EmailtemplateController@emailTemplateAction');
$router->get('emailsetting', 'EmailtemplateController@emailSetting');
$router->post('emailsetting', 'EmailtemplateController@emailSettingAction');
$router->post('attach/documents', 'UploadController@attachDocuments');
$router->post('attach/documents/delete', 'UploadController@attachDocumentsDelete');
$router->get('get/media', 'UploadController@getMedia');
$router->post('media/upload', 'UploadController@uploadMedia');
$router->post('media/delete', 'UploadController@mediaDelete');
$router->post('upload/gallery', 'UploadController@indexGallery');
$router->post('gallery/delete', 'UploadController@indexGalleryDelete');

$router->get('forms', 'FormController@index');
$router->get('form/add', 'FormController@indexAdd');
$router->post('form/add', 'FormController@indexAction');
$router->get('form/edit', 'FormController@indexEdit');
$router->post('form/edit', 'FormController@indexAction');

$router->get('appointment/reportsExport', 'AppointmentController@reportsExport');
$router->get('appointment/imagesExport', 'AppointmentController@imagesExport');
$router->post('appointment/moveImageToReport', 'AppointmentController@moveImageToReport');
$router->get('appointment/videoConsultation', 'AppointmentController@startVideoConsultation');
$router->post('appointment/clinicalNoteUpdate', 'AppointmentController@clinicalNoteUpdate');
$router->post('appointment/prescriptionUpdate', 'AppointmentController@PrescriptionUpdate');
//Appointment ajax route added
$router->post('appointment/updateAppintmentInfo','AppointmentController@UpdateAppintmentInfo');


$router->get('optician-referral', 'OpticianReferralController@index');
$router->get('optician-referral/add', 'OpticianReferralController@indexAdd');
$router->get('optician-referral/view', 'OpticianReferralController@indexView');
$router->post('optician-referral/add', 'OpticianReferralController@indexAction');
$router->get('optician-referral/edit', 'OpticianReferralController@indexEdit');
$router->post('optician-referral/edit', 'OpticianReferralController@indexAction');
$router->post('optician-referral/delete', 'OpticianReferralController@indexDelete');

//Leaflets
$router->get('leaflets', 'LeafletsController@index');
$router->get('leaflets/add', 'LeafletsController@indexAdd');
$router->get('leaflets/view', 'LeafletsController@indexView');
$router->post('leaflets/add', 'LeafletsController@indexAction');
$router->get('leaflets/edit', 'LeafletsController@indexEdit');
$router->post('leaflets/edit', 'LeafletsController@indexAction');
$router->post('leaflets/delete', 'LeafletsController@indexDelete');

$router->get('follow-up', 'FollowupController@index');
$router->get('follow-up/add', 'FollowupController@indexAdd');
$router->get('follow-up/view', 'FollowupController@indexView');
$router->post('follow-up/add', 'FollowupController@indexAction');
$router->get('follow-up/edit', 'FollowupController@indexEdit');
$router->post('follow-up/edit', 'FollowupController@indexAction');
$router->post('follow-up/delete', 'FollowupController@indexDelete');
$router->get('follow-up/status', 'FollowupController@statusChange');
$router->post('follow-up/report/reportUpload', 'FollowupController@documentUpload');
$router->post('follow-up/report/removeReport', 'FollowupController@documentRemove');

$router->post('optician-referral/report/reportUpload', 'OpticianReferralController@documentUpload');
$router->post('optician-referral/report/removeReport', 'OpticianReferralController@documentRemove');
$router->get('optician-referral/report/reportsExport', 'OpticianReferralController@reportsExport');


$router->get('optician-invoices', 'OpticianInvoiceController@index');
$router->get('optician/invoice/view', 'OpticianInvoiceController@indexView');
$router->get('optician/invoice/pdf', 'OpticianInvoiceController@indexPdf');
$router->post('optician/invoice/sentmail', 'OpticianInvoiceController@indexMail');
$router->get('optician/invoice/add', 'OpticianInvoiceController@indexAdd');
$router->post('optician/invoice/add', 'OpticianInvoiceController@indexAction');
$router->get('optician/invoice/edit', 'OpticianInvoiceController@indexEdit');
$router->post('optician/invoice/edit', 'OpticianInvoiceController@indexAction');
$router->post('optician/invoice/delete', 'OpticianInvoiceController@indexDelete');
$router->post('optician/addpayment', 'OpticianInvoiceController@invoicePayment');
$router->get('optician/autogenrateinvoice', 'OpticianInvoiceController@autoGenrateInvoice');
//Get diagnosis list
$router->get('getdiagnosis', 'AppointmentController@getDiagnosis');