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
});

/*document.addEventListener('DOMContentLoaded', function(){
    let connexionButton = document.getElementById("Menu");
    
    connexionButton.addEventListener('click', async function(){
        // permet de renvoyer une data de la connexion
        // fonction asynchrone avec await, rappelé avec async function
        // await permet d'afficher autre chose à côté en attendant le chargement
        let data = await fetch(*url php connexion*) 
    });
});

document.addEventListener('DOMContentLoaded', function(){
    let inscriptionButton = document.getElementById("Menu");
    
    inscriptionButton.addEventListener('click', async function(){
        let data = await fetch(*url php inscription*) 

    });
});*/