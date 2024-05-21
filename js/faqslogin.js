// Swiper js
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
  
    // Nav link indicator starts here
  
    const sections = document.querySelectorAll('section[id]');
    sections.forEach(section =>{
      const sectionHeight = section.offsetHeight,
            sectionTop = section.offsetTop - 100;
  
            let navId = document.querySelector(`.menu-content a[href='#${section.id}']`);
            if(scrollY > sectionTop && scrollY <=  sectionTop + sectionHeight){
              navId.classList.add("active-navlink");           
            }else{
              navId.classList.remove("navlink");     
            }
            // nav manu bottom
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
//scroll Reveal starts here
ScrollReveal({ 
  reset: true,
  distance:'60px',
  duration:2500,
  delay:400
  });

/*footer starts here*/
ScrollReveal().reveal('.footerLinks-title', { delay: 500, origin:'right' });
ScrollReveal().reveal('.footer-link', { delay: 500, origin:'right', interval:100});
ScrollReveal().reveal('.footer-copyRight', { delay: 600, origin:'buttom'});
ScrollReveal().reveal('.footer-content, .location-text', { delay: 600, origin:'bottom'});
/*footer ends here*/
ScrollReveal().reveal('.media-icons', { delay: 600, origin:'left', interval:100});

/*about starts here*/
ScrollReveal().reveal('.about-lists', { delay: 600, origin:'right'});
ScrollReveal().reveal('.about-buttons', { delay: 600, origin:'left'});
ScrollReveal().reveal('.about-imageContent', { delay: 600, origin:'left' });
/*about ends here*/
//scroll Reveal ends here