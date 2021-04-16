function clearUrl() {
    var url = location.origin + location.pathname;
    window.history.replaceState({}, document.title, url);
}