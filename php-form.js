const alertGo = document.querySelector('.alert');

function clearAlert() {
    if (alertGo) {
        alertGo.style.display ="none"
    }
}

setTimeout(clearAlert, 5000);

const emailField = document.querySelectorAll('.email-form');
const submitButton = document.querySelectorAll('.email-button');
function clearField() {
    if (alertGo.classList.contains('alert-success')) {
        emailField.value="";
    }
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
      }
}

submitButton.addEventListener('submit', clearField());
