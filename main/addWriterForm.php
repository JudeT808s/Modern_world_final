<!DOCTYPE html>
<html lang="en">
<head>
<link
        href="https://fonts.googleapis.com/css2?family=Lora:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/grid.css">
    <link rel="stylesheet" href="css/style.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Writer</title>
</head>
<body>
    <div class="width-6">
        <h1>Add a new Writer</h1>
        <form method="POST" action="addWriter.php">
            <div>
            <label>First Name</label><br>
            <input type="text">
    </div>
            <div>
            <label>Last Name</label><br>
            <input type="text">
    </div>
            <div>
            <label>Link</label><br>
            <input type="text">
    </div>
    <a href="index.php">Cancel</a><br>
    <input type="submit">
    </form>
    </div>
    <div class="clear"></div>
</body>
</html>