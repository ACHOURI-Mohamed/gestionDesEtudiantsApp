
<!DOCTYPE html>
<html lang="en">
<?php require_once __DIR__ . '/../../components/head.php';?>

<body>
<?php require_once __DIR__ . '/../../components/navBar.php';?>  
<h1 class="ml-5 mt-5 text-3xl">Welcome to the home page! <strong><?= $_SESSION['username'] ?></strong>,you are logged in as an admin
</h1>
<br>
<div class="flex flex-row items-center justify-center">
    <?php require __DIR__ . '/../addsForm/addNewStudentForm.inc.php';?>
    <?php require __DIR__ . '/../addsForm/addNewSectionForm.inc.php';?>
</div>

</body>
</html>