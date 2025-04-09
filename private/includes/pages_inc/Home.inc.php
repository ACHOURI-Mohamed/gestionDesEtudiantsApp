
<!DOCTYPE html>
<html lang="en">
<?php require_once __DIR__ . '/../../components/head.php';?>
<body>
<?php require_once __DIR__ . '/../../components/navBar.php';?>  

<div class="ml-10 mt-10">

    <h1 class="text-3xl font-bold text-red-800 mb-4">
    Hello <strong class="text-red-900"><?= $_SESSION['username'] ?></strong>, Welcome to the home page!
    </h1>
    <h3 class="text-lg text-gray-800 mb-3">
    You can explore all the information related to students and sections here.<br>However, please note that you don't have permissions to update, delete, or add sections or students.
    </h3>

    <h3 class="text-lg text-gray-900 font-semibold">
    To perform such actions, you must be logged in as an administrator.
    </h3>


</div>



</body>
</html>