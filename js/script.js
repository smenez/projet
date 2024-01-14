document.addEventListener('DOMContentLoaded', function() {
    const button = document.querySelector('header > button');
    const nav = document.querySelector('nav');

    button.addEventListener('click', function(){
        if (nav.style.display === 'block') {
            nav.style.display = 'none';
        } else {
            nav.style.display = 'block';
        }
    });

// Supprimer message

    const supprimerButtons = document.querySelectorAll('.supprimer');
    const popUp = document.querySelector('.pop_up_del');
    const closeBtn = document.querySelector('.close-btn');
    const deleteForm = document.querySelector('.pop_up_del form');

    supprimerButtons.forEach(function (button) {
        button.addEventListener('click', function () {
            const messageId = this.getAttribute('data-message-id');
            deleteForm.message_id_del.value = messageId; // Met à jour la valeur du champ message_id
            popUp.style.display = 'block';
        })
    })
    
    closeBtn.addEventListener('click', function () {
        popUp.style.display = 'none';
    });

// Modifier message

    const modifyButtons = document.querySelectorAll('.modifier');
    const popUpModify = document.querySelector('.pop_up_modify');
    const closeBtnModify = document.querySelector('.close-btn-modify');
    const modifyForm = document.querySelector('.pop_up_modify form');

    modifyButtons.forEach(function (button) {
        button.addEventListener('click', function () {
            const messageId = this.getAttribute('data-message-id');
            modifyForm.message_id_modify.value = messageId; // Met à jour la valeur du champ message_id
            popUpModify.style.display = 'block';
        })
    })
    
    closeBtnModify.addEventListener('click', function () {
        popUpModify.style.display = 'none';
    });

})