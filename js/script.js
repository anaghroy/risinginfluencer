// Swiper js next and preview starts here
var swiper = new Swiper(".mySwiper", {
  slidesPerView: 1,
  // grabCursor: true,
  loop: true,
  pagination: {
    el: ".swiper-pagination",
    clickable: true,
  },
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },
});
// Swiper js next and preview ends here

// Nav open close starts here
const body = document.querySelector('body'),
      navMenu = body.querySelector('.menu-content'),
      navOpenBtn = body.querySelector('.navOpen-btn'),
      navCloseBtn = navMenu.querySelector('.navClose-btn');

if(navMenu && navOpenBtn){
  navOpenBtn.addEventListener("click", () =>{
    navMenu.classList.add("open");
    body.style.overflowY = "hidden";
  })
}

if(navMenu && navCloseBtn){
  navCloseBtn.addEventListener("click", () =>{
    navMenu.classList.remove("open");
    body.style.overflowY = "scroll";
  })
}
// Nav open close ends here

// Change header bg color
window.addEventListener("scroll", () => {
  const scrollY = window.pageYOffset;

  if(scrollY > 5){
    document.querySelector("header").classList.add("header-active");
  }else{
    document.querySelector("header").classList.remove("header-active");
  }

  // Scroll up button starts here
  const scrollUpBtn = document.querySelector('.scrollUp-btn');

  if(scrollY > 250){
    scrollUpBtn.classList.add("scrollUpBtn-active");
  }else{
    scrollUpBtn.classList.remove("scrollUpBtn-active");
  }
  
  // Scroll up button ends here

  // Nav link indicator

  const sections = document.querySelectorAll('section[id]');
  sections.forEach(section =>{
    const sectionHeight = section.offsetHeight,
          sectionTop = section.offsetTop - 100;

          let navId = document.querySelector(`.menu-content a[href='#${section.id}']`);
          if(scrollY > sectionTop && scrollY <=  sectionTop + sectionHeight){
            navId.classList.add("active-navlink");           
          }else{
            navId.classList.remove("active-navlink");     
          }
          
          navId.addEventListener("click", () => {
            navMenu.classList.remove("open");
            body.style.overflowY = "scroll";
          })
  })
})
// Nav link indicator ends here 
 
  

//login page starts here
const wrapper = document.querySelector(".wrapper");
const loginLink = document.querySelector(".login-link");
const registerLink = document.querySelector(".register-link");
const btnPopup = document.querySelector(".btnLogin-popup");
const iconClose = document.querySelector(".icon-close");

registerLink.addEventListener('click', ()=> {
  wrapper.classList.add('active');
});

loginLink.addEventListener('click', ()=> {
  wrapper.classList.remove('active');
});

btnPopup.addEventListener('click', ()=> {
  wrapper.classList.add('active-popup');
});

iconClose.addEventListener('click', ()=> {
  wrapper.classList.remove('active-popup');
});
//login page ends here

//video cursor starts here
var videocon = document.querySelector(`#video-container`)
var playbtn = document.querySelector("#play")
videocon.addEventListener("mouseenter",function(){
  gsap.to(playbtn,{
    scale:1,
    opacity:1
  })
})
videocon.addEventListener("mouseleave",function(){
  gsap.to(playbtn,{
    scale:0,
    opacity:0
  })
})
videocon.addEventListener("mousemove",function(dets){
  gsap.to(playbtn,{
    left:dets.x-50,
    top:dets.y
  })
})

//video cursor ends here

//Animation Counter starts here

function animate(obj, initVal, lastVal, duration) {
  let startTime = null;

//get the current timestamp and assign it to the currentTime variable
let currentTime = Date.now();

//pass the current timestamp to the step function
const step = (currentTime ) => {

//if the start time is null, assign the current time to startTime
if (!startTime) {
  startTime = currentTime ;
}

//calculate the value to be used in calculating the number to be displayed
const progress = Math.min((currentTime - startTime)/ duration, 1);

//calculate what to be displayed using the value gotten above
obj.innerHTML = Math.floor(progress * (lastVal - initVal) + initVal);

//checking to make sure the counter does not exceed the last value (lastVal)
if (progress < 1) {
  window.requestAnimationFrame(step);
} else {
     window.cancelAnimationFrame(window.requestAnimationFrame(step));
  }
};
//start animating
  window.requestAnimationFrame(step);
}
let text1 = document.getElementById('0101'); //ID:0101
let text2 = document.getElementById('0102'); //ID:0102
let text3 = document.getElementById('0103'); //ID:0103
let text4 = document.getElementById('0104'); //ID:0104
const load = () => {
  animate(text1, 0, 511, 7000);
  animate(text2, 0, 232, 7000);
  animate(text3, 100, 25, 7000);
  animate(text4, 100, 25, 7000);
}
//Animation Counter ends here

//scroll Reveal starts here
ScrollReveal({ 
  reset: true,
  distance:'60px',
  duration:2500,
  delay:400
  });
ScrollReveal().reveal('.content-subtitle, .content-title, .content-description', { delay: 500, origin:'buttom'});

ScrollReveal().reveal('.about-imageContent', { delay: 600, origin:'left'});
ScrollReveal().reveal('.meu-text', { delay: 600, origin:'bottom'});
ScrollReveal().reveal('.menu-items', { delay: 600, origin:'bottom'});
ScrollReveal().reveal('.time-table', { delay: 600, origin:'right'});
ScrollReveal().reveal('.section-subtitle', { delay: 600, origin:'right'});
ScrollReveal().reveal('.brand-images', { delay: 500, origin:'bottom'});
ScrollReveal().reveal('.review-text', { delay: 500, origin:'left'});
ScrollReveal().reveal('.footerLinks-title', { delay: 500, origin:'right'});
ScrollReveal().reveal('.footer-link', { delay: 500, origin:'right'});
ScrollReveal().reveal('.footer-copyRight', { delay: 600, origin:'bottom'});
ScrollReveal().reveal('.footer-content, .location-text', { delay: 600, origin:'bottom'});
ScrollReveal().reveal('.section-description', { delay: 600, origin:'left'});
ScrollReveal().reveal('.newsletter-inputBox', { delay: 600, origin:'bottom'});
ScrollReveal().reveal('.media-icons', { delay: 600, origin:'left', interval:100});
ScrollReveal().reveal('.about-lists', { delay: 600, origin:'right'});
ScrollReveal().reveal('.about-buttons', { delay: 600, origin:'left'});


//scroll Reveal ends here