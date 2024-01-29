window.addEventListener('scroll', function() {
    var header = document.getElementById('header');
    header.classList.toggle('scrolled', window.scrollY > 0);
});
