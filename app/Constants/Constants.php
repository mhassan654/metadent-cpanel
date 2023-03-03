<?php

if (!defined('NO')) define('NO', 0);

if (!defined('YES')) define('YES', 1);

if(!defined('OPEN')) define('OPEN', 'open');

if(!defined('CLOSED')) define('CLOSED', 'closed');

if(!defined('MULTIPLE')) define('MULTIPLE', 'multiple');

if(!defined('INBOX')) define('INBOX', 'INBOX');

if(!defined('DRAFT')) define('DRAFT', 'Drafts');

if(!defined('JUNK')) define('JUNK', 'Junk');

if(!defined('TRASH')) define('TRASH', 'Trash');

if(!defined('SENT')) define('SENT', 'Sent');

if(!defined('APPOINTMENT_CONFIRMED')) define('APPOINTMENT_CONFIRMED', 1);

if(!defined('APPOINTMENT_PENDING')) define('APPOINTMENT_PENDING', 2);

if(!defined('APPOINTMENT_WAITING')) define('APPOINTMENT_WAITING', 3);

if(!defined('APPOINTMENT_CLOSED')) define('APPOINTMENT_CLOSED', 4);

if(!defined('APPOINTMENT_CANCELED')) define('APPOINTMENT_CANCELED', 5);

if(!defined('APPOINTMENT_MISSED')) define('APPOINTMENT_MISSED', 6);

if(!defined('APPOINTMENT_SERVING')) define('APPOINTMENT_SERVING', 7);

//// file paths

if(!defined('COMMON_FILE_PATH')) define('COMMON_FILE_PATH', "/uploads/images/");

/// 2fa Login method
if(!defined('LOGIN_WITH_EMAIL')) define('LOGIN_WITH_EMAIL', 'email');

if(!defined('LOGIN_WITH_SMS')) define('LOGIN_WITH_SMS', 'sms');

if(!defined('LOGIN_WITH_APP')) define('LOGIN_WITH_APP', 'mfa');
