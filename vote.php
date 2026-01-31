<?php
// Prevent browser caching
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Pragma: no-cache");

include "config/db.php";

// Stop direct access
if (!isset($_POST['dob'])) {
    header("Location: voter_form.php");
    exit();
}

// Age validation
$dob = $_POST['dob'];
$age = date_diff(date_create($dob), date_create('today'))->y;

if ($age < 18) {
    die("You are under 18. You are not eligible to vote.");
}

// Upload citizenship images
$front = "uploads/citizenship/" . time() . "_" . $_FILES['cit_front']['name'];
$back  = "uploads/citizenship/" . time() . "_" . $_FILES['cit_back']['name'];

move_uploaded_file($_FILES['cit_front']['tmp_name'], $front);
move_uploaded_file($_FILES['cit_back']['tmp_name'], $back);

// Insert voter details
$query = "INSERT INTO voters 
(name, citizenship_id, dob, citizenship_type, temp_address, perm_address, phone, citizenship_front, citizenship_back, voter_id)
VALUES (
'$_POST[name]',
'$_POST[citizenship_id]',
'$_POST[dob]',
'$_POST[citizenship_type]',
'$_POST[temp_address]',
'$_POST[perm_address]',
'$_POST[phone]',
'$front',
'$back',
'$_POST[voter_id]'
)";

mysqli_query($conn, $query);

// Get voter database ID
$voter_db_id = mysqli_insert_id($conn);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Cast Vote</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">
    <h2>Select Candidate</h2>

    <form action="submit_vote.php" method="POST">
        <input type="hidden" name="voter_db_id" value="<?php echo $voter_db_id; ?>">

        <label>Select Candidate</label>
        <select name="candidate" required>
            <?php
            for ($i = 1; $i <= 30; $i++) {
                echo "<option value='$i'>Candidate $i</option>";
            }
            ?>
        </select>

        <label>
            <input type="checkbox" required>
            I confirm my vote and understand that I cannot vote again.
        </label>

        <button type="submit">Confirm Vote</button>
    </form>
</div>

</body>
</html>

