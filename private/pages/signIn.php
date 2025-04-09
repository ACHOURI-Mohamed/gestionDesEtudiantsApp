<?php
require_once __DIR__ . '/../includes/logOut.inc.php';


?> 

<!DOCTYPE html>
<html lang="en" class="h-full bg-white">
    <?php require_once __DIR__ . '/../components/head.php'?>
<body class="h-full">
<!-- I AM USING TAILWIND-->
<div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
    <?php require_once __DIR__ . '/../components/imgIcon.php' ?>
    <h2 class="mt-5 text-center text-3xl/9 font-bold tracking-tight text-gray-900">SIGN IN</h2>

    <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
      
      <form class="space-y-6" action="/private/includes/pages_inc/signIn.inc.php" method="POST">
          <?php require_once __DIR__ . '/../components/nameInput.php' ?>
          <?php require_once __DIR__ . '/../components/passwordInput.php' ?>
          <?php require_once __DIR__ . '/../components/submitInput.php' ?>
      </form>

      <p class="mt-10 text-center text-sm/6 text-gray-500">
        Not a member?
        <a href="signUp" class="font-semibold text-red-800 hover:text-red-600">Sign up!</a>
      </p>

    </div>

</div>

</body>
</html>
