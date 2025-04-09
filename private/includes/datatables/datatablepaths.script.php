<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>  

<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>


<script src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.print.min.js"></script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
<script>
$(document).ready(function() {
    $('#myTable').DataTable({
     
       // ajax: 'private/includes/data/data.inc.php',

       ajax: {
            url: "private/includes/data/data.inc.php",
            dataSrc: "" 
        },
 
        columns: [

            
            {data: "id" },
            {data: "name" },
            {
                data: "image",
                render: function(data, type, row) {return `<img src="${data}"class="ml-26" alt="Student Image" style="width: 80px; height: 80px; object-fit: cover;border-radius: 50px;">`;}
            },
            {data:"birthday"},
            {data:"section"},
            {
                data: null,
                render: function(data, type, row) {
                    return `
                        <div class="flex space-x-2 ml-48">
                            <a href="/updateStudent?id=${row.id}" class="btn btn-warning">
                                <i class="fas fa-edit"></i> Modifier
                            </a>
                            <a href="deleteStudent?id=${row.id}" class="btn btn-danger">
                                <i class="fas fa-trash"></i> Supprimer
                            </a>
                        </div>
                    `;
                }
            }
        ],
        dom: 'Bfrtip', 
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ],
        pageLength: 4 
    });
});
</script>