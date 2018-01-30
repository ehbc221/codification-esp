/*
    HANDLE ALERTS (SUCCESS + ERROR)
 */
function handleAlerts(has_alert, type, message) {
    message = (message) ? message : ((type === 'success') ? 'Succès' : 'Erreur');
    if (has_alert) {
        if (type === 'success') {
            swal(
                'Succès',
                message,
                'success'
            );
        }
        else if (type === 'error') {
            swal(
                'Erreur',
                message,
                'error'
            );
        }
    }
}

/*
    HANDLE THE DELETE FORM
 */
function handleDeleteForm(form_delete, button_delete, title, text) {
    button_delete.addEventListener('click', function () {
        title = (title) ? title : 'Êtes-vous sûr de vouloir supprimer cet élément?';
        text = (text) ? text : 'Vous ne pourrez plus le récuperer!';
        swal({
            title: title,
            text: text,
            type: 'error',
            showCancelButton: true,
            confirmButtonColor: '#FF464F',
            cancelButtonColor: '#2B91EB',
            confirmButtonText: 'Oui',
            cancelButtonText: 'Non',
            confirmButtonClass: 'btn btn-danger',
            cancelButtonClass: 'btn btn-info',
            reverseButtons: true
        }).then(function(result) {
            if(result.value) {
                form_delete.submit();
            }
        });
    });
}

/*
    HANDLE THE DELETE FORM
 */
function handleLogoutForm(logout_form, logout_link, title, text) {
    logout_link.addEventListener('click', function () {
        event.preventDefault();
        title = (title) ? title : 'Déconnexion';
        text = (text) ? text : 'Êtes-vous sûr de vouloir vous déconnecter?';
        swal({
            title: title,
            text: text,
            type: 'error',
            showCancelButton: true,
            confirmButtonColor: '#FF464F',
            cancelButtonColor: '#2B91EB',
            confirmButtonText: 'Oui',
            cancelButtonText: 'Non',
            confirmButtonClass: 'btn btn-danger',
            cancelButtonClass: 'btn btn-info',
            reverseButtons: true
        }).then(function(result) {
            if(result.value) {
                logout_form.submit();
            }
        });
    });
}
