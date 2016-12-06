<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8">

    <link rel="stylesheet" href="form-mini.css">
    <script type="text/javascript" src="for-mini.js"></script>
</head>
<body>
<?php if (!empty($the_last_record)) {
    echo "The last record from the database:\n";
    showArray($the_last_record);
} ?>
<form class="form-mini" method="post" action="index.php">
    <div class="form-row">
        <input type="text" name="name" placeholder="Your Name">
    </div>

    <div class="form-row">
        <input type="text" name="favorite" placeholder="Your Favorite Name">
    </div>
    <div class="form-row">
        <input type="text" name="order_number" placeholder="Enter your number">
    </div>
    <div class="form-row form-last-row">
        <button type="submit">Submit Form</button>
    </div>
</form>

<footer>
    <?php if (!empty($prepared_array)) {
        echo "Here is a set of all the records we have got: \n";
        showArray($prepared_array);
    } ?>
</footer>

</body>

</html>
