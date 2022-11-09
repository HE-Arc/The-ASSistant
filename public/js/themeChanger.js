let colorThemes = document.querySelectorAll('[name="theme"]');

// store theme
const storeTheme = function (theme) {
    setCookie("theme", theme, 1)
};

// set theme when visitor returns
const setTheme = function () {
    console.log("Set theme")
    const activeTheme = getCookie("theme")
    colorThemes.forEach((themeOption) => {
        if (themeOption.id === activeTheme) {
            themeOption.checked = true;
        }
    });
    // fallback for no :has() support
    document.documentElement.className = activeTheme;
};

window.addEventListener("DOMContentLoaded", (event) => {
    console.log("DOM loaded");
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

