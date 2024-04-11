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
  let profileDropdownList = document.querySelector(".profile-dropdown-list");
  let btn = document.querySelector(".profile-dropdown-btn");
  
  let classList = profileDropdownList.classList;
  
  const toggle = () => classList.toggle("active");
  
  window.addEventListener("click", function (e) {
    if (!btn.contains(e.target)) classList.remove("active");
  });
  //Logout function starts here
function logout() {
  // Here you can put your logout logic
  
  window.location.href = 'logout.html';
}
//login page ends here

//scroll Reveal starts here
  ScrollReveal({ 
    reset: true,
    distance:'60px',
    duration:2500,
    delay:400
    });
    //footer starts here
    ScrollReveal().reveal('.footerLinks-title', { delay: 200, origin:'right' });
    ScrollReveal().reveal('.footer-link', { delay: 200, origin:'right', interval:100});
    ScrollReveal().reveal('.footer-copyRight', { delay: 600, origin:'bottom'});
    ScrollReveal().reveal('.footer-content, .location-text', { delay: 600, origin:'bottom'});
    ScrollReveal().reveal('.section-description', { delay: 600, origin:'left'});
    //footer ends here
    //review starts here
    ScrollReveal().reveal('.brand-images', { delay: 500, origin:'bottom'});
    ScrollReveal().reveal('.review-text', { delay: 500, origin:'left'});
    //review ends here

    //job opportunities starts here
    ScrollReveal().reveal('.jobs-list-container', { delay: 600, origin:'left'});
    ScrollReveal().reveal('.job-search', { delay: 700, origin:'right'});
  
  //job opportunities ends here

  //blog search starts here
  ScrollReveal().reveal('.blog-list-container', { delay: 600, origin:'left'});
    ScrollReveal().reveal('.blog-search', { delay: 700, origin:'right'});
  //blog search end here

  //blog starts here
  ScrollReveal().reveal('.post', { delay: 600, origin:'left'});
    ScrollReveal().reveal('.know', { delay: 700, origin:'bottom'});
  //blog starts here
  //Categories starts here
  ScrollReveal().reveal('.cate', { delay: 600, origin:'right'});
    
  //Categories end here

//scroll Reveal ends here


  