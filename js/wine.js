window.onload = function () {
    
    var createWineForm = document.getElementById('createWineForm');
    if (createWineForm !== null) {
        createWineForm.addEventListener('submit', validateWineForm);
    }

    function validateWineForm(event) {
        var form = event.target;

        if (!confirm("Is the form data correct?")) {
            event.preventDefault();
        }
    }


    var editWineForm = document.getElementById('editWineForm');
    if (editWineForm !== null) {
        editWineForm.addEventListener('submit', validateWineForm);
    }

 
    var deleteLinks = document.getElementsByClassName('deleteWine');
    for (var i = 0; i !== deleteLinks.length; i++) {
        var link = deleteLinks[i];
        link.addEventListener("click", deleteLink);
    }

    function deleteLink(event) {
        if (!confirm("Are you sure you want to delete this wine?")) {
            event.preventDefault();
        }
    }

};


