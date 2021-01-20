const header = document.querySelector('header');
const sectionOne = document.querySelector('.sectionOne');

const faders = document.querySelectorAll('.fade-in');
const sliders = document.querySelectorAll('.slider');

const sectionOneOptions = {
    rootMargin: "-500px 0px 0px 0px"
};

const sectionOneObserver = new IntersectionObserver(function(entries, sectionOneObserver) {
    entries.forEach(entry => {
        if(!entry.isIntersecting) {
            header.classList.add('nav-scrolled');
        }
        else {
            header.classList.remove('nav-scrolled');
        }
    });
}, sectionOneOptions);

sectionOneObserver.observe(sectionOne);


const fadeOptions = {
    threshold: 0,
    rootMargin: '0px 0px -200px 0px'
};

const fadeOnScroll = new IntersectionObserver(function(entries, fadeOnScroll) {
    entries.forEach(entry => {
        if(!entry.isIntersecting) {
            return;
        }
        else {
            entry.target.classList.add('appear');
            fadeOnScroll.unobserve(entry.target);
        }
    });
}, fadeOptions);

faders.forEach(fader => {
    fadeOnScroll.observe(fader);
});



sliders.forEach(slider => {
    fadeOnScroll.observe(slider);
});