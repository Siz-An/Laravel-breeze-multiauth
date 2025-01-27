import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();


document.addEventListener('livewire:navigating', () => {
    // Show a loading spinner
    document.getElementById('loading-spinner').style.display = 'block';
});

document.addEventListener('livewire:navigated', () => {
    // Hide the loading spinner
    document.getElementById('loading-spinner').style.display = 'none';
});