// Optional: Smooth scroll with JavaScript (not required if CSS 'scroll-behavior' is used)
document.querySelectorAll('.navbar a').forEach(anchor => {
  anchor.addEventListener('click', function (e) {
    e.preventDefault();

    const targetId = this.getAttribute('href').substring(1);
    const targetSection = document.getElementById(targetId);

    if (targetSection) {
      window.scrollTo({
        top: targetSection.offsetTop - 60, // adjust offset for navbar
        behavior: 'smooth'
      });
    }
  });
});
