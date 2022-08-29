<html>
    <head>
        <title>Koneksi Database</title>
    </head>
    <body>
        <?php
            $host = "localhost";
            $username = "root";
            $password = "";
            $database = "zoopedia";
            $koneksi = mysqli_connect($host,$username,$password,$database);
            if ($koneksi->connect_error) {
                die("Connection Failed: " . $koneksi->connect_error);
            }
        ?>
    </body>
<html>