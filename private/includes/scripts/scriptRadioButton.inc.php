<script>
    //this part treats the radio buttons in the forms
    // this script is used to create radio buttons dynamically
    // it uses the data from the dataSectionsRadioButton.inc.php file
    // the data is passed to the script using PHP
    // the script creates a radio button for each section
    // the radio button has a label and an input element
document.addEventListener('DOMContentLoaded', function() {
    function createRadioButton(id, designation) {
        const container = document.getElementById('container');
        const label = document.createElement('label');
        label.className = 'inline-flex items-center cursor-pointer mr-8';
        
        const input = document.createElement('input');
        input.type = 'radio';
        input.name = "sectionName";
        input.value = id;
        input.className = 'h-5 w-5 text-blue-600 focus:ring-blue-500 accent-red-700';
        
        const span = document.createElement('span');
        span.className = 'ml-2 text-gray-700';
        span.textContent = designation;
        
        label.appendChild(input);
        label.appendChild(span);
        container.appendChild(label);
    }

    <?php 
    require __DIR__.'/../data/dataSectionsRadioButton.inc.php';
    
    if (isset($sections) && is_array($sections)) : 
    ?>
        const sections = <?php echo json_encode($sections); ?>;
        sections.forEach(section => {
            createRadioButton(section.id, section.designation);
        });
    <?php endif; ?>
});
</script>