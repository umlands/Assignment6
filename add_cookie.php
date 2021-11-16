<!DOCTYPE html>
<?php
// Get cookie data

$cookie_name = filter_input(INPUT_POST, 'cookie_name');
$cookie_value = filter_input(INPUT_POST, 'cookie_value');
setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day
?>

<html>
<body>
<?php
if(!isset($_COOKIE[$cookie_name])) 
{
    echo "Cookie named '" . $cookie_name . "' is not set!";
} else 
{
    echo "Cookie '" . $cookie_name . "' is set!<br>";
    echo "Value is: " . $_COOKIE[$cookie_name];
    require_once('database.php');

    // Add comment to the database  
    $query = 'INSERT INTO cookies
                 (Cookie_Name, Cookie_Value)
              VALUES
                 (:Cookie_Name, :Cookie_Value)';
    $statement = $db->prepare($query);
    $statement->bindValue(':Cookie_Name', $cookie_name);
    $statement->bindValue(':Cookie_Value', $_COOKIE[$cookie_name]);
    $statement->execute();
    $statement->closeCursor();

    //Display the Cookies page
    include('cookies.php');
}
?>
    
<p><strong>Note:</strong> You might have to reload the page to see the value of the cookie.</p>

</body>
</html>