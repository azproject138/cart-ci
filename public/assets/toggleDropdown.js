const toggleBtn = document.getElementById('toggleBtn');
const dropdownMenu = document.getElementById('dropdownMenu');
const icon = document.querySelector('.icon');

toggleBtn.addEventListener('click', () => {
    dropdownMenu.style.display = dropdownMenu.style.display === 'block' ? 'none' : 'block';
    icon.classList.toggle('rotate');
});

// Close dropdown when clicking outside
window.addEventListener('click', (e) => {
    if (!toggleBtn.contains(e.target) && !dropdownMenu.contains(e.target)) {
        dropdownMenu.style.display = 'none';
        icon.classList.remove('rotate');
    }
});