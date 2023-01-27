import './bootstrap';
import Swal from 'sweetalert2';
import Alpine from 'alpinejs';

window.Alpine = Alpine;
window.confirmChanges = function(formId)
{
    Swal.fire({
        icon: 'warning',
        text: 'Do you want to confirm changes?',
        showCancelButton: true,
        confirmButtonText: 'Confirm',
        confirmButtonColor: '#e3342f',
    }).then((result) => {
        if (result.isConfirmed) {
            document.getElementById(formId).submit();
        }
    });
}
window.confirmSave = function(formId)
{
    Swal.fire({
        icon: 'warning',
        title: 'Are you sure you want to save changes?',
        text: 'Changing the current school year will reset all the data on it if you continue. Make sure you backup all the necessary data before changing.',
        showCancelButton: true,
        confirmButtonText: 'Confirm',
        confirmButtonColor: '#e3342f',
    }).then((result) => {
        if (result.isConfirmed) {
            document.getElementById(formId).submit();
        }
    });
}
Alpine.start();
