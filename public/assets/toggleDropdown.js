const dropdownToggle = document.getElementById('dropdownToggle');
const dropdownMenu = document.getElementById('dropdownMenu');
const closeMenu = document.getElementById('closeMenu');

dropdownToggle.addEventListener('click', () => {
    dropdownMenu.classList.add('active');
    dropdownToggle.style.display = 'none';
    closeMenu.style.display = 'inline';
});

closeMenu.addEventListener('click', () => {
    dropdownMenu.classList.remove('active');
    dropdownToggle.style.display = 'inline';
    closeMenu.style.display = 'none';
});
