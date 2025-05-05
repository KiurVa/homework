<?php
include("include/settings.php"); //Lae seaded
include("include/mysqli.php"); //Lae andmebaasi klass
$db = new Db(); // Loo andmebaasi objekt
if (isset($_GET['success']) && $_GET['success'] == 1) {
    echo "<h3>Aitäh! Teie sõnum on salvestatud.</h3>"; 
    echo "<a href='index.php'>Avalehele</a>";
    exit;
}
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = trim($_POST["name"] ?? '');
    $email = trim($_POST["email"] ?? '');
    $message = trim($_POST["message"] ?? '');

    if ($name && $email && $message) {
        $timestamp = date("Y-m-d H:i:s");
        $name = htmlspecialchars($name);
        $email = htmlspecialchars($email);
        $message = str_replace(["\r", "\n", ";"], " ", htmlspecialchars($message));

        $line = "$timestamp;$name;$email;$message\n";

        file_put_contents("feedback.csv", $line, FILE_APPEND | LOCK_EX);

        $sql = "INSERT INTO feedback (name, email, message) VALUES (
            '" . $db->dbFix($name) . "',
            '" . $db->dbFix($email) . "',
            '" . $db->dbFix($message) . "')";
        
        if ($db->dbQuery($sql)) {
            header("Location: submit_feedback.php?success=1");
        } else {
            echo "<h3 class='text-danger'>Viga andmebaasi salvestamisel!</h3>";
        }
        
    } else {
        echo "<h3>Palun täida kõik väljad.</h3>";
		echo "<a href='javascript:history.back()'>Tagasi</a>";
    }
} else {
    header("Location: contact.html");
    exit;
}
    
