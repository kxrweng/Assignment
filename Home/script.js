window.addEventListener('scroll', function() {
    var footer = document.getElementById('footer');
    var scrollPosition = window.innerHeight + window.pageYOffset;
    var bodyHeight = document.body.offsetHeight;

    if (scrollPosition >= bodyHeight) {
        footer.classList.remove('hidden');
    } else {
        footer.classList.add('hidden');
    }
});
