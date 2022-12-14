/* Theme selctor largely based off of this Kevin Powell video
    https://www.youtube.com/watch?v=fyuao3G-2qg
    Modified to suit our needs*/
let colorThemes = document.querySelectorAll('[name="theme"]');


/**
 * It takes a theme as an argument, and sets a cookie with the name "theme" and the value
 * of the theme argument
 * @param theme - The theme to store.
 */
const storeTheme = function (theme) {
    setCookie("theme", theme, 1)
};


/**
 * It sets the theme based on the cookie
 */
const setTheme = function () {
    const activeTheme = getCookie("theme")
    colorThemes.forEach((themeOption) => {
        if (themeOption.id === activeTheme) {
            themeOption.checked = true;
        }
    });
    // fallback for no :has() support
    document.documentElement.className = activeTheme;
};

/* Adding an event listener to the window object. */
window.addEventListener("DOMContentLoaded", (event) => {
    // get the themes and try to set the themes only AFTER the DOM has loaded
    colorThemes = document.querySelectorAll('[name="theme"]')

    colorThemes.forEach((themeOption) => {
        themeOption.addEventListener('input', () => {
            storeTheme(themeOption.id);
            // fallback for no :has() support
            document.documentElement.className = themeOption.id;
        });
    });

    setTheme();
});

