document.addEventListener('DOMContentLoaded', function(){
    let Button = document.getElementById("toggleButton");
    let Menu = document.getElementById("Menu");

    Button.addEventListener('click', function(){
        if(Menu.style.display === 'block'){
            Menu.style.display = 'none';
        } else {
            Menu.style.display = 'block';
        }
    });
});
