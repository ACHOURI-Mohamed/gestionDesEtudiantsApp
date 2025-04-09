
<?php 

session_start();

if( !isset($_SESSION['username'] ) || $_SESSION['username'] === null) {
    header("Location: /signIn?failure=notLoggedIn");
    die();
    //this is to check if the user is logged in
    //if not, redirect to the sign in page
}

if($_SESSION['role'] === 'user') {
    header("Location: /Home?failure=notAuthorized");
    die();
 }
if(!isset($_SESSION['student_id'])) {
    header("Location: /ListeDesEtudiants?failure=missedId");
    die();
}
?>





<!DOCTYPE html>
<html lang="en">
<?php require_once __DIR__ . '/../../components/head.php';?>
<body>
<?php require_once __DIR__ . '/../../components/navBar.php';?>  
<div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm"> 
            <h1 class="mt-5 text-center text-5xl/10 font-bold tracking-tight text-gray-900">Update Student</h1>
            <h3 class="mt-5 text-center text-3xl/10 font-bold tracking-tight text-gray-900">Modify what you want</h3>
            <form action="updateStudentRequest" method="POST" enctype="multipart/form-data" class="mt-8">

                <label for="name" class="block text-sm/6 font-medium text-gray-900">to change the student name:</label>
                <div class="mt-2">
                    <input type="text" name="name"    class="h-12 block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-red-700 sm:text-sm/6">
                </div>

                <label for="birthday" class="block text-sm/6 font-medium text-gray-900">to change the birthdate:</label>
                <div class="mt-2 mb-2">
                    <input type="date" name="birthday"    class="h-12 block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-red-700 sm:text-sm/6">
                </div>

                <?php require_once __DIR__ . '/../../components/imageUploader.html.php';?>

                <div class="my-4">
                        <label class="block text-sm font-medium text-gray-900 mb-2">To select a Section:</label>
                        <?php require_once __DIR__ . '/../../components/sectionRadioInput.php'; ?>
                </div> 
                <?php 
                require_once __DIR__ . '/../scripts/scriptRadioButton.inc.php'; ?>

                <input type="submit" value="Upload" class="mt-5 h-12 w-full rounded-md bg-red-700 px-3 py-1.5 text-base text-white hover:bg-red-800 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 sm:text-sm/6">
                
            </form>
</div>



</body>
</html>





