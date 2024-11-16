<?php include '../inc/navbar.php'; ?>
<?php

$id=$_GET['qid'];
if($_SERVER['REQUEST_METHOD']=="POST"){
    $id=$_GET['qid'];
    $password=trim($_POST['password']);
    $hashedpassword=password_hash($password,PASSWORD_ARGON2I);
    $stmt=$conn->prepare("SELECT id FROM exams WHERE id = ? ");
    $stmt->bind_param('i',$id);
    $stmt->execute();
    $stmt->store_result();
    if($stmt->num_rows>0){
        echo '<div class=" alert alert-danger">Exam password is already set.</div> ';
    }else{
    $stmt=$conn->prepare('INSERT INTO exams (id,password)VALUES(?, ?)');
    $stmt->bind_param("is",$id,$hashedpassword);

    if($stmt->execute()){
        echo '<div class=" alert textalign alert-success">Exam password is set Successfully !</div> ';
    }else{
        echo ' <div class=" alert alert-danger">Error! </div> '.$stmt->error;
    }
}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="bootstrap/bootstrap.css">
</head>
<body>
<div class="container mt-3">
        <h1 class=" textcenter">Quiz Password</h1>
        <?php if (isset($error)): ?>
        <p style="color: red;"><?php echo $error; ?></p>
        <?php endif; ?>
        <form method="POST" class="form-control aligncenter mb-3">
        <h4>Set the Quiz's Password</h4>
        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password" required><br><br>
        <button type="submit" class="btn btn-outline-primary btn-info">Set Password</button>
        </form>
    </div>
</body>
</html>