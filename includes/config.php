<?php

// Debugging
//error_reporting(-1);

// DATABASE INFORMATION
define('DATABASE_HOST', 'localhost');
define('DATABASE_NAME', 'bismilla_seba');
define('DATABASE_USER', 'bismilla_sa');
define('DATABASE_PASS', '@toskina321*');

// COMPANY INFORMATION
define('COMPANY_LOGO', 'images/logo.png');
define('COMPANY_LOGO_WIDTH', '356');
define('COMPANY_LOGO_HEIGHT', '95');
define('COMPANY_NAME','সেবা মাল্টিপারপাস কো-অপারেটিভ সোসাইটি লিঃ');
define('COMPANY_ADDRESS_1','সফিপুর, কালিয়াকৈর');
define('COMPANY_ADDRESS_2',' গাজীপুর।');
define('COMPANY_ADDRESS_3',' ০১৭১৩৬৮৬৮৮১');
define('COMPANY_COUNTY','বাংলাদেশ');
define('COMPANY_POSTCODE','1304');

define('COMPANY_NUMBER','Company No: 01757994387'); // Company registration number
define('COMPANY_VAT', ''); // Company TAX/VAT number  //Company VAT: xxxxxxxx

// EMAIL DETAILS
define('EMAIL_FROM', 'selim@smcs-bd.com'); // Email address invoice emails will be sent from
define('EMAIL_NAME', 'সেবা মাল্টিপারপাস কো-অপারেটিভ সোসাইটি লিঃ'); // Email from address
define('EMAIL_SUBJECT', 'Invoice subject'); // Invoice email subject
define('EMAIL_BODY', 'Invoice body'); // Invoice email body

// OTHER SETTINFS
define('INVOICE_PREFIX', 'ভাউচার নং'); // Prefix at start of invoice - leave empty '' for no prefix
define('INVOICE_INITIAL_VALUE', '1000'); // Initial invoice order number (start of increment)
define('INVOICE_THEME', '#222222'); // Theme colour, this sets a colour theme for the PDF generate invoice
define('TIMEZONE', 'Dhaka/Bangladesh'); // Timezone - See for list of Timezone's http://php.net/manual/en/function.date-default-timezone-set.php
define('DATE_FORMAT', 'DD/MM/YYYY'); // DD/MM/YYYY or MM/DD/YYYY
define('CURRENCY', ''); // Currency symbol
define('ENABLE_VAT', true); // Enable TAX/VAT
define('VAT_INCLUDED', true); // Is VAT included or excluded?
define('VAT_RATE', '20'); // This is the percentage value
define('AREA_INITIAL_VALUE', '101');
define('MEMBER_INITIAL_VALUE', '1001');

define('PAYMENT_DETAILS', ''); // Bismillah Telecom<br>Sort Code: 00-00-00<br>Account Number: 12345678
define('FOOTER_NOTE', 'http://www.smcs-bd.com/');


define('FOOTER_DEV', 'Developed By Creation Plus');
define('FOOTER_DEV_MOB', 'Cell: +88 01826002496');



// CONNECT TO THE DATABASE
$mysqli = new mysqli(DATABASE_HOST, DATABASE_USER, DATABASE_PASS, DATABASE_NAME);

?>