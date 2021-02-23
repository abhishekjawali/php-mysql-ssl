<?php
/* 127.0.0.1 will work if web server and mysql server are on same instance */
/* localhost did not work - details on stackoverflow */

/* https://www.php.net/manual/en/mysqli.real-connect.php */
$ctx = mysqli_init();
echo "processing\n";
$ctx->ssl_set(NULL, NULL, 'rds-ca-2019-root.pem', NULL, NULL);
echo "ctx set\n";
$conn = $ctx->real_connect ('DB-URL', 'USER-NAME', 'PASSWORD', 'DB-NAME', 3306, null, MYSQLI_CLIENT_SSL);
echo "conn set\n";
if (!$conn) {
    die ('Connect error (' . $ctx->connect_errno . '): ' . $ctx->connect_error . "\n");
} else {
    $query = "select AURORA_VERSION()";
    if ($result = $ctx->query($query)) {
        $rows = $result->fetch_array();
        print_r($rows);
    } else {
        echo "Query failed";
    }
}
?>