<!DOCTYPE html>
<html>

<!-- the head section -->
<head>
    <title>Comment Error</title>
    <link rel="stylesheet" type="text/css" href="main.css" />
</head>

<!-- the body section -->
<body>
    <header><h1>Comments</h1></header>

    <main>
        <h2 class="top">Error</h2>
        <p><?php echo $error; ?></p>
        <form action="add_comment.php" method="post"> 
            <fieldset>
                <textarea name="comment" rows="4" cols="50"></textarea>   
            </fieldset>
            <input type="submit" value="Submit Comment">
            <br>
        </form> 
    </main>
</body>
</html>