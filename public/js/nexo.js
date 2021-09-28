let collapseButton = document.getElementById('collapse-btn');
let collapseHeader = document.getElementById('collapse-header');
let collapseContainer = document.getElementById('collapse-container');
let collapse = document.getElementById('collapse');

collapseButton.onclick = function() {
    if (window.screen.width >= 325 && window.screen.width <= 1024) {
        if (collapse.style.display == 'block') {
            collapseContainer.style.marginTop = '0';
            collapseHeader.style.zIndex = '5';
            collapse.style.display = 'none';
        } else {
            collapse.style.display = 'block';
            collapseHeader.style.zIndex = '20';
            collapseContainer.style.marginTop = '120px';
        }
    }
}
