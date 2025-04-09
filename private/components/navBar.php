<nav class="bg-red-800 p-6 shadow-md">
    <?php 
    function cssRender($path){   
        // Check if the current URL contains the specified path
        // If it does, return the active class
        // Otherwise, return the default class
        // This is to highlight the active link in the navigation bar   
    return (strpos($_SERVER['REQUEST_URI'], $path) !== false)  ? 'text-white font-bold' : 'text-white hover:text-gray-300';}
    ?>
    <div class="container mx-auto flex justify-between items-center">
        <a href="/Home" class="text-white text-2xl font-bold">Students Managment system</a>
        <div class="md:flex space-x-8">
            <a href="/Home" class="<?php echo cssRender('/Home')  ?> "> Home</a>
            <a href="/ListeDesEtudiants" class="<?php echo cssRender('/ListeDesEtudiants')  ?> ">Liste des étudiants</a>
            <a href="/ListeDesSections" class="<?php echo cssRender('/ListeDesSections')  ?>" >Liste des sections</a>
            <a href="/signIn" class='text-white hover:text-gray-300' >Logout</a>
        </div>
    </div>    
</nav>