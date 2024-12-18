// script.js
document.addEventListener("DOMContentLoaded", () => {
    const themeToggleButton = document.getElementById('theme-toggle');
    const body = document.body;

    // Check for dark mode in localStorage
    if (localStorage.getItem('theme') === 'dark') {
        body.classList.add('dark-mode');
    }

    // Toggle dark mode on button click
    themeToggleButton.addEventListener('click', () => {
        body.classList.toggle('dark-mode');
        // Save the theme preference to localStorage
        if (body.classList.contains('dark-mode')) {
            localStorage.setItem('theme', 'dark');
        } else {
            localStorage.setItem('theme', 'light');
        }
    });
});
