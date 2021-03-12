<?php
    $database_password = getenv('DATABASE_PASSWORD');
    $database_user = getenv('DATABASE_USER');

    if (!$database_password || !$database_user) {
        die("Error: Could not fetch database credentials");
    }

    try {
        $db = new PDO("mysql:host=db;dbname=app_data;", $database_user, $database_password);
    } catch(PDOException $e) {
        die("Error: " . $e->getMessage());
    }

    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
?>
<html>
    <head>
        <title>Hello title</title>
    </head>

    <body>
        <p>Database content:</p>
        <ul>
        <?php
            $stmt = $db->prepare("Select name From data");
            $stmt->execute();

            while ($record = $stmt->fetch(PDO::FETCH_ASSOC))  {
                echo "<li> Name: $record[name]</li>";
            }
        ?>
        </ul>
    </body>
</html>
