<?php 
//this to restrict access to the page for simple users
//if the user is not an admin, redirect to the home page    

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
if(!isset($_SESSION['id'])) {
    header("Location: /ListeDesSections?failure=missedId");
    die();
}
?>



<!DOCTYPE html>
<html lang="en">
<?php require_once __DIR__ . '/../../components/head.php';?>
<body>
<?php require_once __DIR__ . '/../../components/navBar.php';?>  
<div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm"> 
            <h1 class="mt-5 text-center text-5xl/10 font-bold tracking-tight text-gray-900">Update Section</h1>
            <h3 class="mt-5 text-center text-3xl/10 font-bold tracking-tight text-gray-900">Modify what you want</h3>
            <form action="updateSectionRequest" method="POST" class="mt-8">

                <label for="name" class="block text-sm/6 font-medium text-gray-900">to change the section designation:</label>
                <div class="mt-2">
                    <input type="text" name="designation"    class="h-12 block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-red-700 sm:text-sm/6">
                </div>


                <label for="name" class="block text-sm/6 font-medium text-gray-900">to change the section description:</label>
                <div class="mt-2">
                    <input type="text" name="description"    class="h-12 block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-red-700 sm:text-sm/6">
                </div>

          

       

                <input type="submit" value="Upload" class="mt-5 h-12 w-full rounded-md bg-red-700 px-3 py-1.5 text-base text-white hover:bg-red-800 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 sm:text-sm/6">
                
            </form>
</div>



</body>
</html>

