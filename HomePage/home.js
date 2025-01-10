function toggleTheme() {
    const currentTheme = document.documentElement.getAttribute('data-theme');
    const newTheme = currentTheme === 'dark' ? 'light' : 'dark';
    document.documentElement.setAttribute('data-theme', newTheme);
    localStorage.setItem('theme', newTheme);
    // Notify user about the toggle
    const message = newTheme === 'dark' ? 'Dark mode activated!' : 'Light mode activated!';
    displayHeaderMessage(message);
}

function displayHeaderMessage(message) {
    const header = document.querySelector('header');
    const messageElement = document.createElement('div');
    messageElement.textContent = message;
    messageElement.style.cssText = `
        position: absolute;
        top: 10px;
        right: 20px;
        padding: 5px 10px;
        background: rgba(0, 0, 0, 0.7);
        color: white;
        border-radius: 5px;
        z-index: 1000;
        animation: fadeOut 2s forwards;
    `;
    header.appendChild(messageElement);

    setTimeout(() => {
        messageElement.remove();
    }, 2000);
}
