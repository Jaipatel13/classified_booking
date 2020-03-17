<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| Display Debug backtrace
|--------------------------------------------------------------------------
|
| If set to TRUE, a backtrace will be displayed along with php errors. If
| error_reporting is disabled, the backtrace will not display, regardless
| of this setting
|
*/
defined('SHOW_DEBUG_BACKTRACE') OR define('SHOW_DEBUG_BACKTRACE', TRUE);

/*
|--------------------------------------------------------------------------
| File and Directory Modes
|--------------------------------------------------------------------------
|
| These prefs are used when checking and setting modes when working
| with the file system.  The defaults are fine on servers with proper
| security, but you may wish (or even need) to change the values in
| certain environments (Apache running a separate process for each
| user, PHP under CGI with Apache suEXEC, etc.).  Octal values should
| always be used to set the mode correctly.
|
*/
defined('FILE_READ_MODE')  OR define('FILE_READ_MODE', 0644);
defined('FILE_WRITE_MODE') OR define('FILE_WRITE_MODE', 0666);
defined('DIR_READ_MODE')   OR define('DIR_READ_MODE', 0755);
defined('DIR_WRITE_MODE')  OR define('DIR_WRITE_MODE', 0755);

/*
|--------------------------------------------------------------------------
| File Stream Modes
|--------------------------------------------------------------------------
|
| These modes are used when working with fopen()/popen()
|
*/
defined('FOPEN_READ')                           OR define('FOPEN_READ', 'rb');
defined('FOPEN_READ_WRITE')                     OR define('FOPEN_READ_WRITE', 'r+b');
defined('FOPEN_WRITE_CREATE_DESTRUCTIVE')       OR define('FOPEN_WRITE_CREATE_DESTRUCTIVE', 'wb'); // truncates existing file data, use with care
defined('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE')  OR define('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE', 'w+b'); // truncates existing file data, use with care
defined('FOPEN_WRITE_CREATE')                   OR define('FOPEN_WRITE_CREATE', 'ab');
defined('FOPEN_READ_WRITE_CREATE')              OR define('FOPEN_READ_WRITE_CREATE', 'a+b');
defined('FOPEN_WRITE_CREATE_STRICT')            OR define('FOPEN_WRITE_CREATE_STRICT', 'xb');
defined('FOPEN_READ_WRITE_CREATE_STRICT')       OR define('FOPEN_READ_WRITE_CREATE_STRICT', 'x+b');

/*
|--------------------------------------------------------------------------
| Exit Status Codes
|--------------------------------------------------------------------------
|
| Used to indicate the conditions under which the script is exit()ing.
| While there is no universal standard for error codes, there are some
| broad conventions.  Three such conventions are mentioned below, for
| those who wish to make use of them.  The CodeIgniter defaults were
| chosen for the least overlap with these conventions, while still
| leaving room for others to be defined in future versions and user
| applications.
|
| The three main conventions used for determining exit status codes
| are as follows:
|
|    Standard C/C++ Library (stdlibc):
|       http://www.gnu.org/software/libc/manual/html_node/Exit-Status.html
|       (This link also contains other GNU-specific conventions)
|    BSD sysexits.h:
|       http://www.gsp.com/cgi-bin/man.cgi?section=3&topic=sysexits
|    Bash scripting:
|       http://tldp.org/LDP/abs/html/exitcodes.html
|
*/
defined('EXIT_SUCCESS')        OR define('EXIT_SUCCESS', 0); // no errors
defined('EXIT_ERROR')          OR define('EXIT_ERROR', 1); // generic error
defined('EXIT_CONFIG')         OR define('EXIT_CONFIG', 3); // configuration error
defined('EXIT_UNKNOWN_FILE')   OR define('EXIT_UNKNOWN_FILE', 4); // file not found
defined('EXIT_UNKNOWN_CLASS')  OR define('EXIT_UNKNOWN_CLASS', 5); // unknown class
defined('EXIT_UNKNOWN_METHOD') OR define('EXIT_UNKNOWN_METHOD', 6); // unknown class member
defined('EXIT_USER_INPUT')     OR define('EXIT_USER_INPUT', 7); // invalid user input
defined('EXIT_DATABASE')       OR define('EXIT_DATABASE', 8); // database error
defined('EXIT__AUTO_MIN')      OR define('EXIT__AUTO_MIN', 9); // lowest automatically-assigned error code
defined('EXIT__AUTO_MAX')      OR define('EXIT__AUTO_MAX', 125); // highest automatically-assigned error code


/* START: Constants for getting data from database with selected data types
*/
	defined('QRT_ARRAY')      			 OR define('QRT_ARRAY', 'ARRAY');
	defined('QRT_OBJECT')     			 OR define('QRT_OBJECT', 'OBJECT');
	defined('QRT_ROW_OBJECT')      		 OR define('QRT_ROW_OBJECT', 'ROW_OBJECT');
	defined('QRT_FIRST_ROW_OBJECT')      OR define('QRT_FIRST_ROW_OBJECT', 'FIRST_ROW_OBJECT');
	defined('QRT_SECOND_ROW_OBJECT')     OR define('QRT_SECOND_ROW_OBJECT', 'SECOND_ROW_OBJECT');
	defined('QRT_NEXT_ROW_OBJECT')       OR define('QRT_NEXT_ROW_OBJECT', 'NEXT_ROW_OBJECT');
	defined('QRT_PREVIOUS_ROW_OBJECT')   OR define('QRT_PREVIOUS_ROW_OBJECT', 'PREVIOUS_ROW_OBJECT');
	defined('QRT_ROW_ARRAY')      		 OR define('QRT_ROW_ARRAY', 'ROW_ARRAY');
	defined('QRT_FIRST_ROW_ARRAY')       OR define('QRT_FIRST_ROW_ARRAY', 'FIRST_ROW_ARRAY');
	defined('QRT_SECOND_ROW_ARRAY')      OR define('QRT_SECOND_ROW_ARRAY', 'SECOND_ROW_ARRAY');
	defined('QRT_NEXT_ROW_ARRAY')      	 OR define('QRT_NEXT_ROW_ARRAY', 'NEXT_ROW_ARRAY');
	defined('QRT_PREVIOUS_ROW_ARRAY')    OR define('QRT_PREVIOUS_ROW_ARRAY', 'PREVIOUS_ROW_ARRAY');
	defined('QRT_UNBUFFERED_ROW_OBJECT') OR define('QRT_UNBUFFERED_ROW_OBJECT', 'UNBUFFERED_ROW_OBJECT');
	defined('QRT_UNBUFFERED_ROW_ARRAY')  OR define('QRT_UNBUFFERED_ROW_ARRAY', 'UNBUFFERED_ROW_ARRAY');
/* END: Constants for getting data from database with selected data types
*/

/* START: Constants for base path
*/
	defined('ROOT_PATH')  OR define('ROOT_PATH', $_SERVER['DOCUMENT_ROOT']."/classified_booking/");
/* END: Constants for base path
*/

/* START: Constants for Database Table Names
*/
	defined('DB_USERS')  OR define('DB_USERS', 'users');
	defined('DB_COUNTRY')  OR define('DB_COUNTRY', 'country');
	defined('DB_STATE')  OR define('DB_STATE', 'state');
	defined('DB_CITY')  OR define('DB_CITY', 'city');
	defined('DB_NEWSPAPER')  OR define('DB_NEWSPAPER', 'newspaper');
	defined('DB_PAYMENT_DETAILS')  OR define('DB_PAYMENT_DETAILS', 'payment_details');
	defined('DB_BOOKING_DETAILS')  OR define('DB_BOOKING_DETAILS', 'booking_details');
	defined('DB_ADVERTIESMENT_DETAILS')  OR define('DB_ADVERTIESMENT_DETAILS', 'advertiesment_details');
/* END: Constants for Database Table Names
*/

/* START: Constants for displaying dates with selected date format
*/
	defined('DATE_FORMAT_1')  OR define('DATE_FORMAT_1', 'Y-m-d');
	defined('DATETIME_FORMAT_1')  OR define('DATETIME_FORMAT_1', 'Y-m-d H:i:s');
/* END: Constants for displaying dates with selected date format
*/

/* START: Constants for User Profile Status
*/
	defined('UPS_ACTIVE_INACTIVE_FIELD')  OR define('UPS_ACTIVE_INACTIVE_FIELD', 'profile_status');
	defined('UPS_ACTIVE')  OR define('UPS_ACTIVE', 'active');
	defined('UPS_INACTIVE')  OR define('UPS_INACTIVE', 'inactive');	
/* END: Constants for User Profile Status
*/

/* START: Constants for Notification Status
*/
	defined('NOTI_IS_VIEWED_FIELD')  OR define('NOTI_IS_VIEWED_FIELD', 'is_viewed');
	defined('NOTI_VIEWED')  OR define('NOTI_VIEWED', 1);
	defined('NOTI_UNVIEWED')  OR define('NOTI_UNVIEWED', 0);
/* END: Constants for Notification Status
*/

/* START: Constants for Customer Order Status
*/	
	defined('COS_APPROVAL_PENDING')  OR define('COS_APPROVAL_PENDING', 'approval_pending');
	defined('COS_APPROVAL_PENDING_TEXT')  OR define('COS_APPROVAL_PENDING_TEXT', 'Approval Pending');
	defined('COS_APPROVED')  OR define('COS_APPROVED', 'approved');
	defined('COS_APPROVED_TEXT')  OR define('COS_APPROVED_TEXT', 'Approved');
	defined('COS_DISAPPROVED')  OR define('COS_DISAPPROVED', 'disapproved');
	defined('COS_DISAPPROVED_TEXT')  OR define('COS_DISAPPROVED_TEXT', 'Disapproved');
	defined('COS_PICKEDUP')  OR define('COS_PICKEDUP', 'pickedup');
	defined('COS_PICKEDUP_TEXT')  OR define('COS_PICKEDUP_TEXT', 'Pickedup');
	defined('COS_DELIVERED')  OR define('COS_DELIVERED', 'delivered');
	defined('COS_DELIVERED_TEXT')  OR define('COS_DELIVERED_TEXT', 'Delivered');
/* END: Constants for Customer Order Status

/* START: Constants for Customer Payment Type
*/	
	defined('CPT_PAYPAL')  OR define('CPT_PAYPAL', 'paypal');
	defined('CPT_PAYPAL_TEXT')  OR define('CPT_PAYPAL_TEXT', 'Paypal');
	defined('CPT_CREDIT_DEBIT_CARD')  OR define('CPT_CREDIT_DEBIT_CARD', 'credit_debit_card');
	defined('CPT_CREDIT_DEBIT_CARD_TEXT')  OR define('CPT_CREDIT_DEBIT_CARD_TEXT', 'Credit/Debit Card');
/* END: Constants for Customer Payment Type

/* START: Constants for Customer Payment Status
*/	
	defined('CPS_PAID')  OR define('CPS_PAID', 'paid');
	defined('CPS_PAID_TEXT')  OR define('CPS_PAID_TEXT', 'Paid');
	defined('CPS_UNPAID')  OR define('CPS_UNPAID', 'unpaid');
	defined('CPS_UNPAID_TEXT')  OR define('CPS_UNPAID_TEXT', 'Unpaid');
/* END: Constants for Customer Payment Status

/* START: Constants for checking whether Orders Shared with Transporters or not
*/	
	defined('COSWT_SHARED')  OR define('COSWT_SHARED', 'shared');
	defined('COSWT_SHARED_TEXT')  OR define('COSWT_SHARED_TEXT', 'Shared');
	defined('COSWT_UNSHARED')  OR define('COSWT_UNSHARED', 'unshared');
	defined('COSWT_UNSHARED_TEXT')  OR define('COSWT_UNSHARED_TEXT', 'Unshared');
/* END: Constants for checking whether Orders Shared with Transporters or not

/* START: Constants for Transporters Orders Requests Status */
	defined('TORS_APPROVAL_PENDING')  OR define('TORS_APPROVAL_PENDING', 'approval_pending');
	defined('TORS_APPROVAL_PENDING_TEXT')  OR define('TORS_APPROVAL_PENDING_TEXT', 'Approval Pending');
	defined('TORS_APPROVED')  OR define('TORS_APPROVED', 'approved');
	defined('TORS_APPROVED_TEXT')  OR define('TORS_APPROVED_TEXT', 'Approved');
/* END: Constants for Transporters Orders Requests Status */

/* START: Constants for Transporters Documents Approval Status */
	defined('TDAS_APPROVAL_PENDING')  OR define('TDAS_APPROVAL_PENDING', 'approval_pending');
	defined('TDAS_APPROVAL_PENDING_TEXT')  OR define('TDAS_APPROVAL_PENDING_TEXT', 'Approval Pending');
	defined('TDAS_APPROVED')  OR define('TDAS_APPROVED', 'approved');	
	defined('TDAS_APPROVED_TEXT')  OR define('TDAS_APPROVED_TEXT', 'Approved');
	defined('TDAS_APPROVED_FORM_TEXT')  OR define('TDAS_APPROVED_FORM_TEXT', 'Approve');
	defined('TDAS_DISAPPROVED')  OR define('TDAS_DISAPPROVED', 'disapproved');
	defined('TDAS_DISAPPROVED_TEXT')  OR define('TDAS_DISAPPROVED_TEXT', 'Disapproved');
	defined('TDAS_DISAPPROVED_FORM_TEXT')  OR define('TDAS_DISAPPROVED_FORM_TEXT', 'Disapprove');
/* END: Constants for Transporters Documents Approval Status */

/* START: Constants for Site Title
*/
	defined('SITE_TITLE')  OR define('SITE_TITLE', 'Classified Booking');
/* END: Constants for Site Title
*/
/* START: Constants for Site Configuration
*/
	defined('SITE_EMAIL')  OR define('SITE_EMAIL', "parikh.rashmi1999@gmail.com");
	defined('SITE_EMAIL_PASSWORD')  OR define('SITE_EMAIL_PASSWORD', "anilparikh27599");
	$set = '123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $code = substr(str_shuffle($set), 0, 12);
    defined('SITE_EMAIL_CODE')  OR define('SITE_EMAIL_CODE', $code);

    defined('SITE_EMAIL_PROTOCOL')  OR define('SITE_EMAIL_PROTOCOL', "smtp");
    defined('SITE_EMAIL_SMTP_HOST')  OR define('SITE_EMAIL_SMTP_HOST', "ssl://smtp.googlemail.com");
    defined('SITE_EMAIL_SMTP_PORT')  OR define('SITE_EMAIL_SMTP_PORT', "465");
    defined('SITE_EMAIL_MAILTYPE')  OR define('SITE_EMAIL_MAILTYPE', "html");
    defined('SITE_EMAIL_CHARSET')  OR define('SITE_EMAIL_CHARSET', "utf-8");
    defined('SITE_EMAIL_NEWLINE')  OR define('SITE_EMAIL_NEWLINE', "\r\n");
    defined('SITE_EMAIL_WORDWRAP')  OR define('SITE_EMAIL_WORDWRAP', TRUE);

    defined('SITE_COUNTRY')  OR define('SITE_COUNTRY', 'USA');
    defined('SITE_COUNTRY_CODE')  OR define('SITE_COUNTRY_CODE', 'US');
    defined('SITE_CURRENCY')  OR define('SITE_CURRENCY', 'USD');
/* END: Constants for Site Configuration
*/

/* START: Constants for User Types
*/
	defined('DB_RECORD_USER_TYPE_FIELD')  OR define('DB_RECORD_USER_TYPE_FIELD', 'user_type');
	defined('USER_TYPE_CUSTOMER')  OR define('USER_TYPE_CUSTOMER', 'customer');
	defined('USER_TYPE_TRANSPORTER')  OR define('USER_TYPE_TRANSPORTER', 'transporter');
	defined('USER_TYPE_ADMIN')  OR define('USER_TYPE_ADMIN', 'admin');
/* END: Constants for User Types
*/

/* START: Constants for Category Types
*/
	defined('DB_RECORD_CATEGORY_TYPE_FIELD')  OR define('DB_RECORD_CATEGORY_TYPE_FIELD', 'category_type');
	defined('CATEGORY_TYPE_TEXT')  OR define('CATEGORY_TYPE_TEXT', 'text');
	defined('CATEGORY_TYPE_DISPLAY')  OR define('CATEGORY_TYPE_DISPLAY', 'display');
/* END: Constants for Category Types
*/

/* START: Constants for Active and Inactive Records
*/
	defined('DB_RECORD_ACTIVE_INACTIVE_FIELD')  OR define('DB_RECORD_ACTIVE_INACTIVE_FIELD', 'is_active');
	defined('DB_RECORD_ACTIVE')  OR define('DB_RECORD_ACTIVE', 1);
	defined('DB_RECORD_INACTIVE')  OR define('DB_RECORD_INACTIVE', 0);
/* END: Constants for Active and Inactive Records
*/

/* START: Constants for Ascending and Descending Records
*/
	defined('DB_RECORD_ORDER_BY_TEXT')  OR define('DB_RECORD_ORDER_BY_TEXT', 'order by');
	defined('DB_RECORD_ORDER_BY_ASC')  OR define('DB_RECORD_ORDER_BY_ASC', 'asc');
	defined('DB_RECORD_ORDER_BY_DESC')  OR define('DB_RECORD_ORDER_BY_DESC', 'desc');
/* END: Constants for Ascending and Descending Records
*/

/* START: Constants for Transport Vehicle Types
*/
	defined('TRANSPORT_VEHICLE_TYPE_CAR')  OR define('TRANSPORT_VEHICLE_TYPE_CAR', 'car');
	defined('TRANSPORT_VEHICLE_TYPE_VAN')  OR define('TRANSPORT_VEHICLE_TYPE_VAN', 'van');
	defined('TRANSPORT_VEHICLE_TYPE_HEAVY_WEIGHT')  OR define('TRANSPORT_VEHICLE_TYPE_HEAVY_WEIGHT', 'heavy_weight');
/* END: Constants for Transport Vehicle Types
*/

/* START: Transporters Documents Upload Path
*/
	defined('TRANSPORTERS_DOCS_UPLOAD_PATH')  OR define('TRANSPORTERS_DOCS_UPLOAD_PATH', ROOT_PATH."frontend_assets/uploads/transporters_docs/");	
/* END: Transporters Documents Upload Path
*/

/* START: Orders Documents Upload Path
*/
defined('ORDERS_DOCS_UPLOAD_PATH')  OR define('ORDERS_DOCS_UPLOAD_PATH', ROOT_PATH."frontend_assets/uploads/orders_docs/");
/* END: Orders Documents Upload Path
*/

/* START: Constants for Unique Code Prefix
*/
	defined('ORDER_UNIQUE_CODE_PREFIX')  OR define('ORDER_UNIQUE_CODE_PREFIX', 'U4u');
	defined('ORDER_AMOUNT_CURRENCY_SYMBOL')  OR define('ORDER_AMOUNT_CURRENCY_SYMBOL', '&#x20B9;');
/* END: Constants for Unique Code Prefix
*/

/* START: Order Pickup Time Additional Hours
*/
	defined('ORDER_PICKUP_TIME_ADDITIONAL_HOURS')  OR define('ORDER_PICKUP_TIME_ADDITIONAL_HOURS', 3); // Time in Hours
/* END: Order Pickup Time Additional Hours
*/