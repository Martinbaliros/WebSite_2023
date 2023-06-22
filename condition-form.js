const myForm = document.querySelector('.container');
const firstNameInput = document.getElementById('nom');
const lastNameInput = document.getElementById('prenom');
const passwordInput = document.getElementById('mdp');
const passwordAgainInput = document.getElementById('mdp-encore');
const msg1 = document.querySelector('.msg1');
const msg2 = document.querySelector('.msg2');
const msg3 = document.querySelector('.msg3');
const msg4 = document.querySelector('.msg4');
const msg5 = document.querySelector('.msg5');



function validation() {
    

    let emailInput = document.getElementById('email').value;
    var patern = /^[^ ]+@[^ ]+\.[a-z]{2,3}$/;


    if (firstNameInput.validity.valueMissing) {
        msg1.textContent ='Un nom est requis'; 
        msg1.classList.add('error')
        
    } 
    else {
        msg1.textContent ='';
        
    }

    if (lastNameInput.validity.valueMissing) {
        msg2.textContent ='Un prénom est requis'; 
        msg2.classList.add('error')
        
    }

    else {
        msg2.textContent ='';
    
    }
    
    if (emailInput.match(patern)) {
        msg3.textContent ="L'email est valide"
        msg3.classList.add("valid");
        msg3.classList.remove("error");
        
        
        
    }
    else {
        msg3.textContent ="L'email est invalide"
        msg3.classList.remove("valid");
        msg3.classList.add("error")
     
    }

    if (passwordInput.validity.valueMissing) {
        msg4.classList.remove('valid')
        msg4.classList.add('error')
        msg4.textContent = 'Le mot de passe doit avoir au minimum 8 caractères'; 
        
    } else if (passwordInput.validity.tooShort) {
        msg4.classList.remove('valid')
        msg4.classList.add('error')
        msg4.textContent = 'Le mot de passe doit avoir au minimum 8 caractères';
        

    } else if (passwordAgainInput.length = 2) {
        msg4.classList.remove('error')
        msg4.classList.add('valid')
        msg4.textContent = 'Mot de passe conforme';
    } else {
        msg4.textContent = '';

    }

    if (passwordAgainInput.value !== passwordInput.value) {
        msg5.classList.add('error');
        msg5.textContent ='Mauvais mot de passe';

    } else {
        msg5.textContent =''
    }

    
}




myForm.addEventListener('submit', onSubmit)


function onSubmit(e) {

    let emailInput = document.getElementById('email').value;
    var patern = /^[^ ]+@[^ ]+\.[a-z]{2,3}$/;

    if (firstNameInput.validity.valueMissing) {
        e.preventDefault();
    } else {

    }
 

    if (lastNameInput.validity.valueMissing) {
        e.preventDefault();
    } 


    if (!emailInput.match(patern)) {
        e.preventDefault();
    } 


    if (passwordInput.validity.valueMissing) {
        e.preventDefault();
    } 

    if (passwordInput.validity.tooShort) {
        e.preventDefault();
    } 


    if (passwordAgainInput.value !== passwordInput.value) {
        msg5.classList.add('error');
        msg5.textContent ='Mauvais mot de passe';
        e.preventDefault();
    } 
 
}