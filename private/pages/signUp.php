<?php 

?>
<!DOCTYPE html>
<html lang="en" class="h-full bg-white">

    <?php require_once 'private/components/head.php';?>

<body class="h-full">
<!-- I AM USING TAILWIND-->
<div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
    <?php require_once 'private/components/imgIcon.php' ?>
    <h2 class="mt-5 text-center text-3xl/9 font-bold tracking-tight text-gray-900">SIGN UP</h2>

    <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
      
      <form class="space-y-6" action="private/includes/pages_inc/signUp.inc.php" method="POST">
          <?php require_once 'private/components/nameInput.php' ?>
          <?php require_once 'private/components/emailInput.php' ?>
          <?php require_once 'private/components/passwordInput.php' ?>
          <?php require_once 'private/components/roleInput.php' ?>
          <?php require_once 'private/components/submitInput.php' ?>
      </form>

      <p class="mt-10 text-center text-sm/6 text-gray-500">
        YOU ALREADY HAVE AN ACCOUNT?
        <a href="signIn" class="font-semibold text-red-800 hover:text-red-600">Sign in!</a>
      </p>

    </div>

</div>

</body>
</html>
