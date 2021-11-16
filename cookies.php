<?php
require('database.php');

// Get comments.
$queryCookies = 'SELECT * FROM cookies
                  ORDER BY Cookie_Name';
$statement = $db->prepare($queryCookies);
$statement->execute();
$allCookies = $statement->fetchAll();
$statement->closeCursor();
?>
<!DOCTYPE html>
<html>

<!-- the head section -->
<head>
    <title>User Cookies</title>
    <link rel="stylesheet" type="text/css" href="main.css" />
</head>

<!-- the body section -->
<body>
<header><h1>Past Cookies</h1></header>
<main>
    <?php foreach ($allCookies as $allCookie) : ?>
        <form> 
            <fieldset>
                <label> Cookie Name:</label>
                <label><?php echo $allCookie['Cookie_Name']; ?></label>
                <br>
                <label>Cookie Value:</label>
                <textarea name="cookie_value" rows="4" cols="100"><?php echo $allCookie['Cookie_Value']; ?></textarea>   
            </fieldset>
        </form>
        <br>
    </form> 
    <?php endforeach; ?>
    <a href="index.php"><H1>Set Cookie</H1></a>
</main>
</body>
</html>