<?php
$db_conn = mysqli_connect('mysql', 'root', 'root', 'sqli');

if (!$db_conn) {
    die('Connection failed: ' . mysqli_connect_error());
}

// SQL to create the table if it doesn't exist
$sql = "CREATE TABLE IF NOT EXISTS pages (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(30) NOT NULL,
    image VARCHAR(200) NOT NULL
)";
$db_conn->query($sql);

$records = [
    ['Kucing ganteng', 'https://png.pngtree.com/png-clipart/20230511/ourmid/pngtree-isolated-cat-on-white-background-png-image_7094927.png'],
    ['Kucing Roti', 'https://i.pinimg.com/564x/fc/b0/b6/fcb0b652cbdf7c7c68d7ddb0ebb9c354.jpg'],
    ['Kucing muter', 'https://i.pinimg.com/originals/30/c2/10/30c210344bbbcde4d5542c02a0cb908b.gif'],
    ['Kucing senam', 'https://i.pinimg.com/originals/3a/0b/93/3a0b93b4bb41b7fffb59c46ef21f2691.gif']
];

$checklength = "SELECT COUNT(*) FROM pages";
$result = $db_conn->query($checklength);
$length = $result->fetch_row()[0];

if ($length == 0) {
    foreach ($records as $record) {
        $name = $db_conn->real_escape_string($record[0]);
        $image = $db_conn->real_escape_string($record[1]);
        $sql = "INSERT INTO pages (name, image) VALUES ('$name', '$image')";
        $db_conn->query($sql);
    }
}
