

<!DOCTYPE html>
<html lang="en">
<?php require_once __DIR__ . '/../../components/head.php';?>
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css">
<body>
    <?php require_once __DIR__ . '/../../components/navBar.php';?>
    <h1 class="text-2xl font-bold underline mt-5 ml-5">This is the students list page!</h1> <br>
    <link rel="stylesheet" href="private/includes/styles.css">
   
    <table id="myTable" class="display nowrap" style="width:100% ">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nom</th>
            <th>IMAGE</th>
            <th>Birthday</th>
            <th>Section</th>
            <th>Actions</th>
        </tr>
    </thead>
</table>
<?php require __DIR__ . '/../datatables/datatablepaths.script.php';?>
</body>
</html>