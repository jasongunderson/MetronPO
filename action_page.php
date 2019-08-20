<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">

<?php

$link = ldap_connect('metronihs.com'); // Your domain or domain server

if(! $link) {
    // Could not connect to server - handle error appropriately
}

ldap_set_option($link, LDAP_OPT_PROTOCOL_VERSION, 3); // Recommended for AD

// Now try to authenticate with credentials provided by user
if (! ldap_bind($link, 'ldap@metronihs.com', 'metron')) {
    // Invalid credentials! Handle error appropriately
}

?>

</head>
<body>
Hello World!
</body>
</html>