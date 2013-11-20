<?php

/*
 +-----------------------------------------------------------------------+
 | Configuration file for vacation module                                |
 |                                                                       |
 | Copyright (C) 2009 Boris HUISGEN <bhuisgen@hbis.fr>                   |
 | Licensed under the GNU GPL                                            |
 +-----------------------------------------------------------------------+
*/

$rcmail_config = array();

// allow vacation start/end dates
$rcmail_config['vacation_gui_vacationdate'] = FALSE;

// allow vacation subject
$rcmail_config['vacation_gui_vacationsubject'] = FALSE;

// allow HTML for vacation message
$rcmail_config['vacation_gui_vacationmessage_html'] = FALSE;

// allow sending message to be keep in inbox
$rcmail_config['vacation_gui_vacationkeepcopyininbox'] = FALSE;

// allow vacation forwarder
$rcmail_config['vacation_gui_vacationforwarder'] = FALSE;

// default vacation subject
$rcmail_config['vacation_subject_default'] = 'Out of office';

// default vacation message
$rcmail_config['vacation_message_default'] = 'I\'m currently out of office.';

// vacation start/end date format
$rcmail_config['vacation_dateformat'] = 'm/d/Y';

// jquery calendar (jqueryui plugin must be enabled)
$rcmail_config['vacation_jquery_calendar'] = FALSE;
$rcmail_config['vacation_jquery_dateformat'] = 'mm/dd/yy';

// add MIME header before the message
$rcmail_config['vacation_message_mime'] = '';

// allow multiple forwarders
$rcmail_config['vacation_forwarder_multiple'] = FALSE;
$rcmail_config['vacation_forwarder_separator'] = ',';

// driver used for backend storage
$rcmail_config['vacation_driver'] = 'sql';


/*
 * SQL driver
 */

// database DSN
$rcmail_config['vacation_sql_dsn'] =
	'mysql://iris:{{mysql_iris_password}}@localhost/mail';

// read data queries
$rcmail_config['vacation_sql_read'] =
	array("SELECT '' AS vacation_subject, vacation_text AS vacation_message, vacation AS vacation_enable FROM accounts WHERE account = %email;");

// write data queries
$rcmail_config['vacation_sql_write'] =
  array("UPDATE accounts set vacation = %vacation_enable, vacation_text = %vacation_message WHERE account = %email;");

/*
 * LDAP driver
 */

// Server hostname
$rcmail_config['vacation_ldap_host'] = '127.0.0.1';

// Server port
$rcmail_config['vacation_ldap_port'] = 389;

// Use TLS flag
$rcmail_config['vacation_ldap_starttls'] = false;

// Protocol version
$rcmail_config['vacation_ldap_version'] = 3;

// Base DN
$rcmail_config['vacation_ldap_basedn'] = 'dc=ldap,dc=my,dc=domain';

// Bind DN
$rcmail_config['vacation_ldap_binddn'] = 'cn=user,dc=ldap,dc=my,dc=domain';

// Bind password
$rcmail_config['vacation_ldap_bindpw'] = 'pa$$w0rd';

// Attribute name to map email address
$rcmail_config['vacation_ldap_attr_email'] = null;

// Attribute name to map email local part
$rcmail_config['vacation_ldap_attr_emaillocal'] = null;

// Attribute name to map email domain
$rcmail_config['vacation_ldap_attr_emaildomain'] = null;

// Attribute name to map vacation flag
$rcmail_config['vacation_ldap_attr_vacationenable'] = 'vacationActive';

// Attribute value for enabled vacation flag
$rcmail_config['vacation_ldap_attr_vacationenable_value_enabled'] = 'TRUE';

// Attribute value for disabled vacation flag
$rcmail_config['vacation_ldap_attr_vacationenable_value_disabled'] = 'FALSE';

// Attribute name to map vacation start
$rcmail_config['vacation_ldap_attr_vacationstart'] = null;

// Attribute name to map vacation end
$rcmail_config['vacation_ldap_attr_vacationend'] = null;

// Attribute name to map vacation subject
$rcmail_config['vacation_ldap_attr_vacationsubject'] = null;

// Attribute name to map vacation message
$rcmail_config['vacation_ldap_attr_vacationmessage'] =
 'vacationInfo';

// Attribute name to map vacation keep copy in inbox flag
$rcmail_config['vacation_ldap_attr_vacationkeepcopyininbox'] = 'vacationKeepCopyInInbox';

// Attribute value for enabled vacation keep copy in inbox flag
$rcmail_config['vacation_ldap_attr_vacationkeepcopyininbox_value_enabled'] = 'TRUE';

// Attribute value for disabled vacation keep copy in inbox flag
$rcmail_config['vacation_ldap_attr_vacationkeepcopyininbox_value_disabled'] = 'FALSE';

// Attribute name to map vacation forwarder
$rcmail_config['vacation_ldap_attr_vacationforwarder'] =
 'vacationForward';

// Search base to read data
$rcmail_config['vacation_ldap_search_base'] =
 'cn=%email_local,ou=Mailboxes,dc=%email_domain,ou=MailServer,dc=ldap,' .
 'dc=my,dc=domain';

// Search filter to read data
$rcmail_config['vacation_ldap_search_filter'] = '(objectClass=mailAccount)';

// Search attributes to read data
$rcmail_config['vacation_ldap_search_attrs'] = array (
												'vacationActive',
												'vacationInfo');

// array of DN to use for modify operations required to write data.
$rcmail_config['vacation_ldap_modify_dns'] = array (
 'cn=%email_local,ou=Mailboxes,dc=%email_domain,ou=MailServer,dc=ldap,dc=my,dc=domain'
);

// array of operations required to write data.
$rcmail_config['vacation_ldap_modify_ops'] = array(
	array ('replace' => array(
			$rcmail_config['vacation_ldap_attr_vacationenable'] => '%vacation_enable',
 			$rcmail_config['vacation_ldap_attr_vacationmessage'] => '%vacation_message',
 			$rcmail_config['vacation_ldap_attr_vacationforwarder'] => '%vacation_forwarder'
 		  )
	)
);

/*
 * Maildrop driver
 */

// path of the maildir folder
$rcmail_config['vacation_maildrop_maildirpath'] = '/var/vmail/%email_domain/%email_local';

// filename of the vacation message when enabled
$rcmail_config['vacation_maildrop_enabled'] = 'vacation.enabled';

// filename of the vacation message when disabled
$rcmail_config['vacation_maildrop_disabled'] = 'vacation.disabled';

// value for enabled vacation flag
$rcmail_config['vacation_maildrop_vactionenable_value_enabled'] = 'enabled';

// value for disabled vacation flag
$rcmail_config['vacation_maildrop_vacationenable_value_disabled'] = 'disabled';

/*
 * Forward vacation driver
 */

// path of the user's forward file readed by the MTA
$rcmail_config['vacation_forward_path'] = '/var/spool/forward/%email_local';

// forward filename
$rcmail_config['vacation_forward_file'] = '.forward';

// create forward path if not exists
$rcmail_config['vacation_forward_create_dir'] = FALSE;

// create forward path with this rights
$rcmail_config['vacation_forward_create_dir_mode'] = 0755;

// vacation message file
$rcmail_config['vacation_forward_message_file'] = '.vacation.msg';

// vacation database file
$rcmail_config['vacation_forward_database_file'] = '.vacation.db';

// vacation database file rights
$rcmail_config['vacation_forward_database_file_mode'] = 0666;

// vacation binary command
$rcmail_config['vacation_forward_vacation_command'] = '/usr/bin/vacation';

// vacation reply interval in days
$rcmail_config['vacation_forward_vacation_reply_interval'] = 0;

// vacation message template
$rcmail_config['vacation_forward_message_template'] =
"From: %email\r\n" .
"Subject: %vacation_subject\r\n" .
"Delivered-By-The-Graces-Of: Vacation\r\n" .
"Precedence: bulk\r\n" .
"\r\n" .
"%vacation_message";

// end vacation config file