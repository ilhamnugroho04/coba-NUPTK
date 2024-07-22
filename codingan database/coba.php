<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mencoba menampilkan data</title>
</head>
<body>
<?php 
$serverName = "172.16.100.31";
$connectionInfo = array("Database"=>"ods", "UID"=>"u_ta_ilham", "PWD"=>"hF49Nd");
$conn = sqlsrv_connect($serverName, $connectionInfo);

if ($conn) {
    echo "Koneksi ke SQL Server berhasil.<br />";
} else {
    echo "Koneksi tidak dapat dilakukan.<br />";
    die(print_r(sqlsrv_errors(), true));
}

$query = "SELECT * FROM dbo.ptk;";
$result = sqlsrv_query($conn, $query);

if ($result === false) {
    die(print_r(sqlsrv_errors(), true));
}

while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) {
    echo $row['nama'] . "<br>";
}

// Menutup koneksi
sqlsrv_free_stmt($result);
sqlsrv_close($conn);
?>
</body>
</html>
