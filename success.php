<?php
// Prevent browser caching
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Pragma: no-cache");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Vote Successful</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">
    <h2>Vote Successfully Casted</h2>
    <p>Your vote has been recorded securely.</p>
    <p>Thank you for participating in the voting process.</p>

    <p>
        <a href="voter_form.php">Exit</a>
    </p>
</div>

<script>
    history.pushState(null, null, location.href);
    window.onpopstate = function () {
        history.go(1);
    };
</script>

</body>
</html>
