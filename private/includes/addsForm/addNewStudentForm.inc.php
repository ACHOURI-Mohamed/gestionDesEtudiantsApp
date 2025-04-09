<div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm"> 
            <h1 class="mt-5 text-center text-5xl/10 font-bold tracking-tight text-gray-900">Add a new student</h1>
            <form action="/uploadStudent" method="POST" enctype="multipart/form-data" class="mt-8">

                <label for="name" class="block text-sm/6 font-medium text-gray-900">Username:</label>
                <div class="mt-2">
                    <input type="text" name="name"   required class="h-12 block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-red-700 sm:text-sm/6">
                </div>

                <label for="birthday" class="block text-sm/6 font-medium text-gray-900">birthdate:</label>
                <div class="mt-2 mb-2">
                    <input type="date" name="birthday"   required class="h-12 block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-red-700 sm:text-sm/6">
                </div>

                <?php require_once __DIR__ . '/../../components/imageUploader.html.php';?>

                <div class="my-4">
                        <label class="block text-sm font-medium text-gray-900 mb-2">Select Section:</label>
                        <?php require_once __DIR__ . '/../../components/sectionRadioInput.php'; ?>
                </div> 
                <?php 
                require_once __DIR__ . '/../scripts/scriptRadioButton.inc.php'; ?>

                <input type="submit" value="Upload" class="mt-5 h-12 w-full rounded-md bg-red-700 px-3 py-1.5 text-base text-white hover:bg-red-800 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 sm:text-sm/6">
                
            </form>
</div>