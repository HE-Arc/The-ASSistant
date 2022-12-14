
/* From https://www.w3schools.com/js/js_cookies.asp */

/**
 * It takes a cookie name as a parameter and returns the value of the cookie.
 * @param cname - The name of the cookie you want to get.
 * @returns The value of the cookie.
 */
function getCookie(cname) {
    let name = cname + "=";
    let decodedCookie = decodeURIComponent(document.cookie);
    let ca = decodedCookie.split(';');
    for (let i = 0; i < ca.length; i++) {
        let c = ca[i];
        while (c.charAt(0) == ' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
        }
    }
    return "";
}

/**
 * This function sets a cookie with the name cname, the value cvalue, and the expiration date exdays.
 * @param cname - The name of the cookie.
 * @param cvalue - The value of the cookie.
 * @param exdays - The number of days you want the cookie to be valid for.
 */
function setCookie(cname, cvalue, exdays) {
    const d = new Date();
    d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
    let expires = "expires=" + d.toUTCString();
    document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/" + "; SameSite=None; Secure";
}
