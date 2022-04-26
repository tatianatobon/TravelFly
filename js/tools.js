function fireClickEvent(element) {
    var evt = new window.MouseEvent(
        'click', {
        view: window,
        bubbles: true,
        cancelable: true
    }
    );
    element.dispatchEvent(evt);
}

function openurl_newWindow(url) {
    var a = document.createElement('a');
    a.href = url;
    a.target = '_blank';
    fireClickEvent(a);
}

function openurl(url) {
    var a = document.createElement('a');
    a.href = url;
    fireClickEvent(a);
}