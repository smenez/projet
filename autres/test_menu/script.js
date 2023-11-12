document.addEventListener('DOMContentLoaded', function () {
    var toggleButton = document.getElementById('toggleMenu');
    var mainMenu = document.getElementById('mainMenu');
  
    toggleButton.addEventListener('click', function () {
        if (mainMenu.style.display === 'block') {
        mainMenu.style.display = 'none';
        } else {
        mainMenu.style.display = 'block';
        }
    });
  });