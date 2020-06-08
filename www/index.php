<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Hello</title>
</head>
<body>
    <h1>Simple HTML</h1>
<?php
echo "<div class='myclass'>Anything goes here</div>"
?>
<h2>Heading 2</h2>
<?php
    for ($i = 0; $i < 5; $i++) {
        echo "<p>Paragraph No. $i</p>";
    }
?>

<footer>NOT done by PHP</footer>

</body>
</html>
