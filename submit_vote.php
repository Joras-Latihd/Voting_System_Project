<?php
// Prevent browser caching
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Pragma: no-cache");

include "config/db.php";

// Stop direct access
if (!isset($_POST['voter_db_id']) || !isset($_POST['candidate'])) {
    header("Location: voter_form.php");
    exit();
}

$voter_id = (int) $_POST['voter_db_id'];
$candidate = (int) $_POST['candidate'];

// Check if voter exists and voting status
$check = mysqli_query($conn, "SELECT has_voted FROM voters WHERE id = $voter_id");

if (mysqli_num_rows($check) == 0) {
    die("Invalid voter.");
}

$row = mysqli_fetch_assoc($check);

// Block re-voting
if ($row['has_voted'] == 1) {
    die("You have already voted.");
}

// Insert vote and mark voter as voted
mysqli_query($conn, "INSERT INTO votes (voter_id, candidate_no) VALUES ($voter_id, $candidate)");
mysqli_query($conn, "UPDATE voters SET has_voted = 1 WHERE id = $voter_id");

// Redirect to success page
header("Location: success.php");
exit();
