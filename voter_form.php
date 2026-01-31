<!DOCTYPE html>
<html>
<head>
    <title>Voter Registration</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

<div class="container">
    <h2>Voter Details</h2>

    <form action="vote.php" method="POST" enctype="multipart/form-data">

        <label>Name</label>
        <input type="text" name="name" required>

        <label>Citizenship ID</label>
        <input type="text" name="citizenship_id" required>

        <label>Date of Birth</label>
        <input type="date" name="dob" required>

        <label>Citizenship Type</label>
        <select name="citizenship_type" required>
            <option value="By Descent">By Descent</option>
            <option value="By Birth">By Birth</option>
            <option value="By Naturalized">By Naturalized</option>
        </select>

        <label>Temporary Address</label>
        <input type="text" name="temp_address" required>

        <label>Permanent Address</label>
        <input type="text" name="perm_address" required>

        <label>Phone Number</label>
        <input type="text" name="phone" required>

        <label>Citizenship Photo (Front)</label>
        <input type="file" name="cit_front" required>

        <label>Citizenship Photo (Back)</label>
        <input type="file" name="cit_back" required>

        <label>Voter ID</label>
        <input type="text" name="voter_id" required>

        <button type="submit">Proceed to Vote</button>

    </form>
</div>

</body>
</html>
