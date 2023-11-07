
const modeSwitch = document.getElementById('mode-switch');
const customStyle = document.getElementById('custom-style');

const savedMode = localStorage.getItem('mode');
if (savedMode) {
  customStyle.setAttribute('href', savedMode);
  if (savedMode === './assets/css/dark-mode.css') {
    modeSwitch.innerHTML = '<i class="fas fa-sun"></i>'; 
  } else {
    modeSwitch.innerHTML = '<i class="fas fa-moon"></i>'; 
  }
}

modeSwitch.addEventListener('click', () => {
  if (customStyle.getAttribute('href') === './assets/css/style.css') {
    customStyle.setAttribute('href', './assets/css/dark-mode.css');
    modeSwitch.innerHTML = '<i class="fas fa-sun"></i>';
    localStorage.setItem('mode', './assets/css/dark-mode.css');
  } else {
    customStyle.setAttribute('href', './assets/css/style.css');
    modeSwitch.innerHTML = '<i class="fas fa-moon"></i>'; 
    localStorage.setItem('mode', './assets/css/style.css');
  }
});