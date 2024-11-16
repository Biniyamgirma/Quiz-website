<?php include '../inc/navbar.php'; ?>
<?php
 $id = $_GET['qid'];
 if ($_SERVER['REQUEST_METHOD'] == 'POST'&& isset($_POST['change_exam_password'])) {
    $id = $_GET['qid'];
    $currentPassword = trim($_POST['current_password']);
    $newPassword = trim($_POST['new_password']);

    if (empty($currentPassword) || empty($newPassword)) {
        echo '<div class=" alert alert-danger">All fields are required !</div> ';
    } elseif (strlen($newPassword) < 4) {
        echo '<div class=" alert alert-danger">New Password must be 4 character long !</div> ';

    } else {

        $stmt = $conn->prepare("SELECT password FROM exams WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $stmt->bind_result($hashedPassword);
        if ($stmt->fetch()) {

            if (password_verify($currentPassword, $hashedPassword)) {
                $stmt->close();
                $hashedNewPassword = password_hash($newPassword, PASSWORD_DEFAULT);
                $stmt = $conn->prepare("UPDATE exams SET password = ? WHERE id = ?");
                $stmt->bind_param("si", $hashedNewPassword, $id);
                if ($stmt->execute()) {
                    echo '<div class=" alert textalign alert-success">Password has been Successfully Changed !</div> ';
                }else {
                echo '<div class=" alert alert-danger">Error Updating Password !</div> ';
                }
            }else{
                    echo '<div class=" alert alert-danger">Incorrect Current Password !</div> ';
                }
            }
        else {
                        echo '<div class=" alert alert-danger">User not found !</div> ';    
        }  
        $stmt->close();
    }

}




?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CHANGE EXAM PASSWORD</title>
    <link rel="stylesheet" href="bootstrap/bootstrap.css">
</head>
<body>
    <div class="container mt-4">
    <div class="jumbotron ">
            <div class="textalign card col-lg-6 inputfield">
            <h2>CHANGE EXAM PASSWORD</h2><br>
            <form method="POST" >
                <label for="currentpassword">Current Password </label><br>
                <input type="password" class="rounded" name="current_password" placeholder="*******" ><br>
                <label for="newpassword">New Password</label><br>
                <input type="password" class="rounded" name="new_password" placeholder="*******" ><br><br>
                <input type="submit" class="btn btn-outline-primary" onClick="return confirm('Are you sure you want to Update?')" name="change_exam_password" value="Update">
                <a href="adminpage.php" class="btn btn-outline-danger">Cancel</a>
                </form><br>
            </div>
    </div>
</body>
</html>