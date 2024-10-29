export function variables(value) {
    if(value === "APP_URL") value = "https://mobile.xkita.com";
    if(value === "APP_PORT") value = "443";

    return value;
}