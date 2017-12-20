<?php
# @todo
# header: realm username and password
# authenticate

# @todo CURL must send required username and password to open this page

/**
 * @see http://php.net/manual/en/function.header.php
 * @see http://php.net/manual/en/features.http-auth.php
 * @see http://php.net/manual/en/ini.core.php#ini.cgi.rfc2616-headers
 */
header('WWW-Authenticate: Negotiate');
header('WWW-Authenticate: NTLM', false);
