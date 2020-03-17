<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'HOME';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

/*
	START: ADMIN MODULES ROUTING
*/

// Login Module
$route['admin']	 				 				 = 'admin_login/index';
$route['admin/login'] 			 				 = 'admin_login/index';
$route['admin/forgot_password']  				 = 'admin_forgot_password/index';
$route['admin/logout'] 			 				 = 'admin_login/logout';
$route['admin/user_profile'] 	 				 = 'admin_user_profile/index';
$route['admin/loginCheck'] 		 				 = 'admin_login/loginCheck'; //Used by Ajax Call Only
$route['admin/forgotPasswordSendEmail'] 		 = 'admin_forgot_password/forgotPasswordSendEmail'; //Used by Ajax Call Only
$route['admin/user_profile/checkEmailExist'] 	 = 'admin_user_profile/checkEmailExist'; //Used by Ajax Call Only
$route['admin/user_profile/userProfileUpdate'] 	 = 'admin_user_profile/userProfileUpdate'; //Used by Ajax Call Only
$route['admin/user_profile/userPasswordReset'] 	 = 'admin_user_profile/userPasswordReset'; //Used by Ajax Call Only

//Dashboard Module
$route['admin/dashboard'] 		 				 = 'admin_dashboard/index';

// Customer Orders Module
$route['admin/customer_orders'] 		 	      = 'admin_customer_orders/index';
$route['admin/customer_orders/updateOrderStatus'] = 'admin_customer_orders/updateOrderStatus'; //Used by Ajax Call Only
$route['admin/customer_orders/deleteOrder'] 	  = 'admin_customer_orders/deleteOrder'; //Used by Ajax Call Only
$route['admin/customer_orders/shareOrder'] 	  	  = 'admin_customer_orders/shareOrder'; //Used by Ajax Call Only
$route['admin/customer_orders/viewTransporters']  = 'admin_customer_orders/viewTransporters'; //Used by Ajax Call Only
$route['admin/customer_orders/selectTransporters']  = 'admin_customer_orders/selectTransporters'; //Used by Ajax Call Only
$route['admin/customer_orders/selectTransportersStatus']  = 'admin_customer_orders/selectTransportersStatus'; //Used by Ajax Call Only
$route['admin/customer_orders/orderDetailsUpdate']  = 'admin_customer_orders/orderDetailsUpdate'; //Used by Ajax Call Only

// Transporter Orders Module
$route['admin/transporter_orders'] 		 	      = 'admin_transporter_orders/index';
$route['admin/transporter_orders/deleteOrder'] 	  = 'admin_transporter_orders/deleteOrder'; //Used by Ajax Call Only	

// Transporter Payments Module
$route['admin/transporter_payments'] 		 	  = 'admin_transporter_payments/index';
$route['admin/transporter_payments/deletePayment'] 	  = 'admin_transporter_payments/deletePayment'; //Used by Ajax Call Only
$route['admin/transporter_payments/addPayment'] 	  = 'admin_transporter_payments/addPayment'; //Used by Ajax Call Only
$route['admin/transporter_payments/transporterAddPaymentFormLoad'] 	  = 'admin_transporter_payments/transporterAddPaymentFormLoad'; //Used by Ajax Call Only
$route['admin/transporter_payments/addPaymentForm'] 	  = 'admin_transporter_payments/addPaymentForm'; //Used by Ajax Call Only
$route['admin/transporter_payments/transporterEditPaymentFormLoad'] 	  = 'admin_transporter_payments/transporterEditPaymentFormLoad'; //Used by Ajax Call Only
$route['admin/transporter_payments/editPaymentForm'] 	  = 'admin_transporter_payments/editPaymentForm'; //Used by Ajax Call Only
$route['admin/transporter_payments/editPayment'] 	  = 'admin_transporter_payments/editPayment'; //Used by Ajax Call Only

// Transporter Payments Requests Module
$route['admin/transporter_payments_requests'] 		 	  = 'admin_transporter_payments_requests/index';
$route['admin/transporter_payments_requests/deletePaymentRequest'] 	  = 'admin_transporter_payments_requests/deletePaymentRequest'; //Used by Ajax Call Only
$route['admin/transporter_payments_requests/transporterEditPaymentRequestFormLoad'] 	  = 'admin_transporter_payments_requests/transporterEditPaymentRequestFormLoad'; //Used by Ajax Call Only
$route['admin/transporter_payments_requests/editPaymentRequestForm'] 	  = 'admin_transporter_payments_requests/editPaymentRequestForm'; //Used by Ajax Call Only
$route['admin/transporter_payments_requests/editPaymentRequest'] 	  = 'admin_transporter_payments_requests/editPaymentRequest'; //Used by Ajax Call Only
$route['admin/transporter_payments_requests/deletePaymentRequest'] 	  = 'admin_transporter_payments_requests/deletePaymentRequest'; //Used by Ajax Call Only

//Country Module
$route['admin/country'] 		 				 = 'admin_country/index';
$route['admin/country/deleteCountry'] 		 	 = 'admin_country/deleteCountry'; //Used by Ajax Call Only
$route['admin/country/updateCountry'] 		 	 = 'admin_country/updateCountry'; //Used by Ajax Call Only
$route['admin/country/addCountryForm'] 		 	 = 'admin_country/addCountryForm'; //Used by Ajax Call Only
$route['admin/country/addCountry'] 		 	 	 = 'admin_country/addCountry'; //Used by Ajax Call Only

//State Module
$route['admin/state'] 		 					 = 'admin_state/index';
$route['admin/state/deleteState'] 		 	 	 = 'admin_state/deleteState'; //Used by Ajax Call Only
$route['admin/state/updateState'] 		 	 	 = 'admin_state/updateState'; //Used by Ajax Call Only
$route['admin/state/addStateForm'] 		 	 	 = 'admin_state/addStateForm'; //Used by Ajax Call Only
$route['admin/state/addState'] 		 	 	 	 = 'admin_state/addState'; //Used by Ajax Call Only
$route['admin/state/selectCountry'] 		 	 = 'admin_state/selectCountry'; //Used by Ajax Call Only
$route['admin/state/updateCountry'] 		 	 = 'admin_state/updateCountry'; //Used by Ajax Call Only

//City Module
$route['admin/city'] 		 					 = 'admin_city/index';
$route['admin/city/deleteCity'] 		 	 	 = 'admin_city/deleteCity'; //Used by Ajax Call Only
$route['admin/city/updateCity'] 		 	 	 = 'admin_city/updateCity'; //Used by Ajax Call Only
$route['admin/city/updateCityNameOnly'] 		 = 'admin_city/updateCityNameOnly'; //Used by Ajax Call Only
$route['admin/city/addCityForm'] 		 	 	 = 'admin_city/addCityForm'; //Used by Ajax Call Only
$route['admin/city/addCity']		 	 	 	 = 'admin_city/addCity'; //Used by Ajax Call Only
$route['admin/city/editCityFormLoad'] 		 	 = 'admin_city/editCityFormLoad'; //Used by Ajax Call Only
$route['admin/city/editCityForm'] 		 	 	 = 'admin_city/editCityForm'; //Used by Ajax Call Only
$route['admin/city/editCity']		 	 	 	 = 'admin_city/editCity'; //Used by Ajax Call Only
$route['admin/city/getStatesByCountry'] 		 = 'admin_city/getStatesByCountry'; //Used by Ajax Call Only
$route['admin/city/getCityByID'] 		 		 = 'admin_city/getCityByID'; //Used by Ajax Call Only
$route['admin/city/datatableCities'] 		 	 = 'admin_city/datatableCities'; //Used by Ajax Call Only

//newspaper Module
$route['admin/newspaper'] 		 				     = 'admin_newspaper/index';
$route['admin/newspaper/deleteNewspaper'] 		 	 = 'admin_newspaper/deleteNewspaper'; //Used by Ajax Call Only
$route['admin/newspaper/updateNewspaper'] 		 	 = 'admin_newspaper/updateNewspaper'; //Used by Ajax Call Only
$route['admin/newspaper/addNewspaperForm'] 		 	 = 'admin_newspaper/addNewspaperForm'; //Used by Ajax Call Only
$route['admin/newspaper/addNewspaper'] 		 	 	 = 'admin_newspaper/addNewspaper'; //Used by Ajax Call Only

//advertiesment Module
$route['admin/advertiesment'] 		 				     = 'admin_advertiesment/index';
$route['admin/advertiesment/deleteAdvertiesment'] 	= 'admin_advertiesment/deleteAdvertiesment'; //Used by Ajax Call Only
$route['admin/advertiesment/updateAdvertiesment'] 	= 'admin_advertiesment/updateAdvertiesment'; //Used by Ajax Call Only
$route['admin/advertiesment/addAdvertiesmentForm'] = 'admin_advertiesment/addAdvertiesmentForm'; //Used by Ajax Call Only
$route['admin/advertiesment/addAdvertiesment']	 = 'admin_advertiesment/addAdvertiesment'; //Used by Ajax Call Only
$route['admin/advertiesment/editAdvertiesmentFormLoad']	= 'admin_advertiesment/editAdvertiesmentFormLoad'; //Used by Ajax Call Only
$route['admin/advertiesment/editAdvertiesmentForm']	 	 = 'admin_advertiesment/editAdvertiesmentForm'; //Used by Ajax Call Only
$route['admin/advertiesment/editAdvertiesment']	 	 	 = 'admin_advertiesment/editAdvertiesment'; //Used by Ajax Call Only

//Booking Module
$route['admin/booking'] 		 				 = 'admin_booking/index';
$route['admin/booking/deleteBooking'] 		 	 = 'admin_booking/deleteBooking'; //Used by Ajax Call Only

//Customers Module
$route['admin/customers'] 		 				 = 'admin_customers/index';
$route['admin/customers/deleteCustomers'] 		 = 'admin_customers/deleteCustomers'; //Used by Ajax Call Only
$route['admin/customers/customerProfileLoad'] 	 = 'admin_customers/customerProfileLoad'; //Used by Ajax Call Only

//Customer Profile
$route['admin/customer_profile'] 	 			 		= 'admin_customer_profile/index';
$route['admin/customer_profile/checkEmailExist'] 	 	= 'admin_customer_profile/checkEmailExist'; //Used by Ajax Call Only
$route['admin/customer_profile/customerProfileUpdate'] 	= 'admin_customer_profile/customerProfileUpdate'; //Used by Ajax Call Only
$route['admin/customer_profile/customerPasswordReset'] 	= 'admin_customer_profile/customerPasswordReset'; //Used by Ajax Call Only
$route['admin/customer_profile/getStatesByCountry'] 	= 'admin_customer_profile/getStatesByCountry'; //Used by Ajax Call Only
$route['admin/customer_profile/getCitiesByState'] 		= 'admin_customer_profile/getCitiesByState'; //Used by Ajax Call Only

//Transporters Module
$route['admin/transporters'] 		 				 	= 'admin_transporters/index';
$route['admin/transporters/deleteTransporters'] 		= 'admin_transporters/deleteTransporters'; //Used by Ajax Call Only
$route['admin/transporters/transporterProfileLoad'] 	= 'admin_transporters/transporterProfileLoad'; //Used by Ajax Call Only
$route['admin/transporters/transporterPaymentLoad'] 	= 'admin_transporters/transporterPaymentLoad'; //Used by Ajax Call Only
$route['admin/transporters/transporterPaymentRequestsLoad'] 	  = 'admin_transporters/transporterPaymentRequestsLoad'; //Used by Ajax Call Only

//Transporter Profile
$route['admin/transporter_profile'] 	 			 	= 'admin_transporter_profile/index';
$route['admin/transporter_profile/checkEmailExist'] 	 	= 'admin_transporter_profile/checkEmailExist'; //Used by Ajax Call Only
$route['admin/transporter_profile/transporterProfileUpdate'] 	= 'admin_transporter_profile/transporterProfileUpdate'; //Used by Ajax Call Only
$route['admin/transporter_profile/transporterDocumentsUpdate'] 	= 'admin_transporter_profile/transporterDocumentsUpdate'; //Used by Ajax Call Only
$route['admin/transporter_profile/transporterPasswordReset'] 	= 'admin_transporter_profile/transporterPasswordReset'; //Used by Ajax Call Only
$route['admin/transporter_profile/getStatesByCountry'] 	= 'admin_transporter_profile/getStatesByCountry'; //Used by Ajax Call Only
$route['admin/transporter_profile/getCitiesByState'] 		= 'admin_transporter_profile/getCitiesByState'; //Used by Ajax Call Only


/*
	END: ADMIN MODULES ROUTING
*/