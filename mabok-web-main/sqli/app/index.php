<!DOCTYPE html>
<html lang="en">

<?php
include('db.php');
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple Vulnerable WebApp</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f9;
            color: #333;
        }

        .navbar {
            background-color: #333;
            overflow: hidden;
        }

        .navbar a {
            float: left;
            display: block;
            color: white;
            text-align: center;
            padding: 14px 20px;
            text-decoration: none;
        }

        .navbar a:hover {
            background-color: #575757;
            color: white;
        }

        .container {
            display: flex;
            justify-content: space-around;
            padding: 40px;
            flex-wrap: wrap;
        }

        .column {
            text-align: center;
            width: 23%;
            margin-bottom: 20px;
        }

        .column img {
            width: 100%;
            height: auto;
            border-radius: 8px;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
        }

        .column a {
            text-decoration: none;
            color: #333;
            font-weight: bold;
        }

        .column a:hover {
            color: #007BFF;
        }

        .content {
            max-width: 1200px;
            margin: 0 auto;
        }

        footer {
            background-color: #333;
            color: white;
            text-align: center;
            padding: 10px 0;
            position: relative;
            bottom: 0;
            width: 100%;
        }

        footer span {
            color: #e25555;
        }
    </style>
</head>

<body>
    <!-- Navbar -->
    <div class="navbar">
        <a href="/">Home</a>
    </div>

    <!-- Dynamic Content Section -->
    <div class="content">
        <div class="container">
            <?php
            include('db.php');

            function renderPage($pageId, $image, $name)
            {
                echo '<div class="column">';
                echo '<a href="?page=' . $pageId . '">';
                echo '<img src="' . $image . '" alt="' . htmlspecialchars($name) . '">';
                echo '<p>' . htmlspecialchars($name) . '</p>';
                echo '</a>';
                echo '</div>';
            }

            if (isset($_GET['page'])) {
                $page = $_GET['page'];
                $sql = "SELECT * FROM pages WHERE id = $page";
                $result = mysqli_query($db_conn, $sql);
                if ($result && $row = mysqli_fetch_assoc($result)) {
                    renderPage($row['id'], $row['image'], $row['name']);
                }
            } else {
                $sql = "SELECT * FROM pages";
                $result = mysqli_query($db_conn, $sql);
                while ($row = mysqli_fetch_assoc($result)) {
                    renderPage($row['id'], $row['image'], $row['name']);
                }
            }
            ?>

        </div>
    </div>

    <!-- Footer -->
    <footer>
        Made with <span>❤️</span> by 53buahapel
    </footer>
</body>

</html>