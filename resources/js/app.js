import './bootstrap';

// Dark mode functionality
document.addEventListener('DOMContentLoaded', function() {
    // Check for saved theme preference or default to 'light' mode
    const theme = localStorage.getItem('theme') || 'light';
    
    // Apply theme on page load
    if (theme === 'dark') {
        document.documentElement.classList.add('dark');
    } else {
        document.documentElement.classList.remove('dark');
    }
    
    // Update theme toggle button state if it exists
    const themeToggle = document.getElementById('theme-toggle');
    if (themeToggle) {
        themeToggle.checked = theme === 'dark';
    }
});

// Global theme toggle function
window.toggleTheme = function() {
    const isDark = document.documentElement.classList.contains('dark');
    
    if (isDark) {
        document.documentElement.classList.remove('dark');
        localStorage.setItem('theme', 'light');
    } else {
        document.documentElement.classList.add('dark');
        localStorage.setItem('theme', 'dark');
    }
};
