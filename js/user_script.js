// Getting elements for the header interactions
let profileDetail = document.querySelector('.profile-detail'); // Profile detail dropdown
let searchForm = document.querySelector('.search-form'); // Search form
let navbar = document.querySelector('.navbar'); // Navbar
let userBtn = document.querySelector('#user-btn'); // User button (Profile)
let searchBtn = document.querySelector('#search-btn'); // Search button
let menuBtn = document.querySelector('#menu-btn'); // Menu button (Hamburger)

// Handle profile toggle
userBtn.onclick = () => {
    // Toggle visibility of profile detail dropdown
    profileDetail.classList.toggle('active');
    
    // Close search form if it's open
    if (searchForm.classList.contains('active')) {
        searchForm.classList.remove('active');
    }
};

// Handle search toggle
searchBtn.onclick = () => {
    // Toggle visibility of search form
    searchForm.classList.toggle('active');
    
    // Close profile detail dropdown if it's open
    if (profileDetail.classList.contains('active')) {
        profileDetail.classList.remove('active');
    }
};

// Handle menu toggle (for mobile)
menuBtn.onclick = () => {
    // Toggle navbar visibility on mobile
    navbar.classList.toggle('active');
};

// Close profile detail or search form if clicked outside
document.addEventListener('click', (event) => {
    // Close profile detail if clicked outside the profile
    if (!profileDetail.contains(event.target) && !userBtn.contains(event.target)) {
        profileDetail.classList.remove('active');
    }

    // Close search form if clicked outside the search form
    if (!searchForm.contains(event.target) && !searchBtn.contains(event.target)) {
        searchForm.classList.remove('active');
    }

    // Close navbar if clicked outside (mobile)
    if (!navbar.contains(event.target) && !menuBtn.contains(event.target)) {
        navbar.classList.remove('active');
    }
});
/*-----------home slider--------*/


document.addEventListener("DOMContentLoaded", () => {
    const slides = document.querySelectorAll('.slideBox');
    let i = 0;

    function nextSlide(){
        slides[i].classList.remove('active');
        i = (i + 1) % slides.length;
        slides[i].classList.add('active');
    }

    function prevSlide(){
        slides[i].classList.remove('active');
        i = (i - 1 + slides.length) % slides.length;
        slides[i].classList.add('active');
    }

    document.querySelector('.next').addEventListener('click', nextSlide);
    document.querySelector('.prev').addEventListener('click', prevSlide);
});




// Get buttons and slide container
const btn = document.getElementsByClassName('btn1');
const slide = document.getElementById('slide');

// Button 1 click
btn[0].onclick = function () {
    slide.style.transform = 'translateX(0px)';  // Corrected the typo from "transfrom" to "transform"
    for (var i = 0; i < 4; i++) {
        btn[i].classList.remove('active');  // Removed extra spaces/dots
    }
    this.classList.add('active');
}

// Button 2 click
btn[1].onclick = function () {
    slide.style.transform = 'translateX(-800px)';
    for (var i = 0; i < 4; i++) {
        btn[i].classList.remove('active');
    }
    this.classList.add('active');
}

// Button 3 click
btn[2].onclick = function () {
    slide.style.transform = 'translateX(-1600px)';
    for (var i = 0; i < 4; i++) {
        btn[i].classList.remove('active');
    }
    this.classList.add('active');
}

// Button 4 click
btn[3].onclick = function () {
    slide.style.transform = 'translateX(-2400px)';
    for (var i = 0; i < 4; i++) {
        btn[i].classList.remove('active');
    }
    this.classList.add('active');
}


