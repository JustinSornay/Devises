// --+ Envoie du formulaire
function sendForm() {
    let form_type_devise = document.getElementById("form-type-devise");
    form_type_devise.submit();
}

// --+ Initialise le formulaire
function initForm() {
    let form_type_devise = document.getElementById("form-type-devise");
    let list_input = form_type_devise.querySelectorAll("input");
    for (let i = 0; i < list_input.length; i++) 
    {   list_input[i].addEventListener("click", () => {   sendForm();   });   }
}

initForm();