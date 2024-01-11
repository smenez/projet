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

    const del_message = document.querySelector('.modifier')
    del_message.addEventListener('click', function(){
        
    })
});

document.querySelector('header > button').addEventListener('click', function() {
    const nav = document.querySelector('nav');
    nav.classList.toggle('show');
  })