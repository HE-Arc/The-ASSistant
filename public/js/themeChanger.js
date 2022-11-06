let colorThemes = document.querySelectorAll('[name="theme"]');

// store theme
const storeTheme = function (theme) {
    localStorage.setItem("theme", theme);
};

// set theme when visitor returns
const setTheme = function () {
    console.log("Set theme")
    const activeTheme = localStorage.getItem("theme");
    console.log("Active theme" + activeTheme);
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
    storeTheme("theme-light");
    colorThemes.forEach((themeOption) => {
        themeOption.addEventListener('input', () => {
            storeTheme(themeOption.id);
            // fallback for no :has() support
            document.documentElement.className = themeOption.id;
        });
    });
    setTheme();
});

