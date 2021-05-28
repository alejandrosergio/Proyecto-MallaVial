let box = document.querySelectorAll('.box_slyder');
box.forEach(popup => popup.addEventListener('click', () => {
    popup.classList.toggle('active_slyder');
}));