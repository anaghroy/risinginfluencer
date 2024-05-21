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

  //image rotator starts here
const cardsContainer = document.querySelector(".card-carousel");
const cardsController = document.querySelector(".card-carousel + .card-controller")

class DraggingEvent {
  constructor(target = undefined) {
    this.target = target;
  }
  
  event(callback) {
    let handler;
    
    this.target.addEventListener("mousedown", e => {
      e.preventDefault()
      
      handler = callback(e)
      
      window.addEventListener("mousemove", handler)
      
      document.addEventListener("mouseleave", clearDraggingEvent)
      
      window.addEventListener("mouseup", clearDraggingEvent)
      
      function clearDraggingEvent() {
        window.removeEventListener("mousemove", handler)
        window.removeEventListener("mouseup", clearDraggingEvent)
      
        document.removeEventListener("mouseleave", clearDraggingEvent)
        
        handler(null)
      }
    })
    
    this.target.addEventListener("touchstart", e => {
      handler = callback(e)
      
      window.addEventListener("touchmove", handler)
      
      window.addEventListener("touchend", clearDraggingEvent)
      
      document.body.addEventListener("mouseleave", clearDraggingEvent)
      
      function clearDraggingEvent() {
        window.removeEventListener("touchmove", handler)
        window.removeEventListener("touchend", clearDraggingEvent)
        
        handler(null)
      }
    })
  }
  
  // Get the distance that the user has dragged
  getDistance(callback) {
    function distanceInit(e1) {
      let startingX, startingY;
      
      if ("touches" in e1) {
        startingX = e1.touches[0].clientX
        startingY = e1.touches[0].clientY
      } else {
        startingX = e1.clientX
        startingY = e1.clientY
      }
      

      return function(e2) {
        if (e2 === null) {
          return callback(null)
        } else {
          
          if ("touches" in e2) {
            return callback({
              x: e2.touches[0].clientX - startingX,
              y: e2.touches[0].clientY - startingY
            })
          } else {
            return callback({
              x: e2.clientX - startingX,
              y: e2.clientY - startingY
            })
          }
        }
      }
    }
    
    this.event(distanceInit)
  }
}


class CardCarousel extends DraggingEvent {
  constructor(container, controller = undefined) {
    super(container)
    
    // DOM elements
    this.container = container
    this.controllerElement = controller
    this.cards = container.querySelectorAll(".card")
    
    // Carousel data
    this.centerIndex = (this.cards.length - 1) / 2;
    this.cardWidth = this.cards[0].offsetWidth / this.container.offsetWidth * 100
    this.xScale = {};
    
    // Resizing
    window.addEventListener("resize", this.updateCardWidth.bind(this))
    
    if (this.controllerElement) {
      this.controllerElement.addEventListener("keydown", this.controller.bind(this))      
    }

    
    // Initializers
    this.build()
    
    // Bind dragging event
    super.getDistance(this.moveCards.bind(this))
  }
  
  updateCardWidth() {
    this.cardWidth = this.cards[0].offsetWidth / this.container.offsetWidth * 100
    
    this.build()
  }
  
  build(fix = 0) {
    for (let i = 0; i < this.cards.length; i++) {
      const x = i - this.centerIndex;
      const scale = this.calcScale(x)
      const scale2 = this.calcScale2(x)
      const zIndex = -(Math.abs(i - this.centerIndex))
      
      const leftPos = this.calcPos(x, scale2)
     
      
      this.xScale[x] = this.cards[i]
      
      this.updateCards(this.cards[i], {
        x: x,
        scale: scale,
        leftPos: leftPos,
        zIndex: zIndex
      })
    }
  }
  
  
  controller(e) {
    const temp = {...this.xScale};
      
      if (e.keyCode === 39) {
        // Left arrow
        for (let x in this.xScale) {
          const newX = (parseInt(x) - 1 < -this.centerIndex) ? this.centerIndex : parseInt(x) - 1;

          temp[newX] = this.xScale[x]
        }
      }
      
      if (e.keyCode == 37) {
        // Right arrow
        for (let x in this.xScale) {
          const newX = (parseInt(x) + 1 > this.centerIndex) ? -this.centerIndex : parseInt(x) + 1;

          temp[newX] = this.xScale[x]
        }
      }
      
      this.xScale = temp;
      
      for (let x in temp) {
        const scale = this.calcScale(x),
              scale2 = this.calcScale2(x),
              leftPos = this.calcPos(x, scale2),
              zIndex = -Math.abs(x)

        this.updateCards(this.xScale[x], {
          x: x,
          scale: scale,
          leftPos: leftPos,
          zIndex: zIndex
        })
      }
  }
  
  calcPos(x, scale) {
    let formula;
    
    if (x < 0) {
      formula = (scale * 100 - this.cardWidth) / 2
      
      return formula

    } else if (x > 0) {
      formula = 100 - (scale * 100 + this.cardWidth) / 2
      
      return formula
    } else {
      formula = 100 - (scale * 100 + this.cardWidth) / 2
      
      return formula
    }
  }
  
  updateCards(card, data) {
    if (data.x || data.x == 0) {
      card.setAttribute("data-x", data.x)
    }
    
    if (data.scale || data.scale == 0) {
      card.style.transform = `scale(${data.scale})`

      if (data.scale == 0) {
        card.style.opacity = data.scale
      } else {
        card.style.opacity = 1;
      }
    }
   
    if (data.leftPos) {
      card.style.left = `${data.leftPos}%`        
    }
    
    if (data.zIndex || data.zIndex == 0) {
      if (data.zIndex == 0) {
        card.classList.add("highlight")
      } else {
        card.classList.remove("highlight")
      }
      
      card.style.zIndex = data.zIndex  
    }
  }
  
  calcScale2(x) {
    let formula;
   
    if (x <= 0) {
      formula = 1 - -1 / 5 * x
      
      return formula
    } else if (x > 0) {
      formula = 1 - 1 / 5 * x
      
      return formula
    }
  }
  
  calcScale(x) {
    const formula = 1 - 1 / 5 * Math.pow(x, 2)
    
    if (formula <= 0) {
      return 0 
    } else {
      return formula      
    }
  }
  
  checkOrdering(card, x, xDist) {    
    const original = parseInt(card.dataset.x)
    const rounded = Math.round(xDist)
    let newX = x
    
    if (x !== x + rounded) {
      if (x + rounded > original) {
        if (x + rounded > this.centerIndex) {
          
          newX = ((x + rounded - 1) - this.centerIndex) - rounded + -this.centerIndex
        }
      } else if (x + rounded < original) {
        if (x + rounded < -this.centerIndex) {
          
          newX = ((x + rounded + 1) + this.centerIndex) - rounded + this.centerIndex
        }
      }
      
      this.xScale[newX + rounded] = card;
    }
    
    const temp = -Math.abs(newX + rounded)
    
    this.updateCards(card, {zIndex: temp})

    return newX;
  }
  
  moveCards(data) {
    let xDist;
    
    if (data != null) {
      this.container.classList.remove("smooth-return")
      xDist = data.x / 250;
    } else {

      
      this.container.classList.add("smooth-return")
      xDist = 0;

      for (let x in this.xScale) {
        this.updateCards(this.xScale[x], {
          x: x,
          zIndex: Math.abs(Math.abs(x) - this.centerIndex)
        })
      }
    }

    for (let i = 0; i < this.cards.length; i++) {
      const x = this.checkOrdering(this.cards[i], parseInt(this.cards[i].dataset.x), xDist),
            scale = this.calcScale(x + xDist),
            scale2 = this.calcScale2(x + xDist),
            leftPos = this.calcPos(x + xDist, scale2)
      
      
      this.updateCards(this.cards[i], {
        scale: scale,
        leftPos: leftPos
      })
    }
  }
}

const carousel = new CardCarousel(cardsContainer)
//image rotator ends here

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
  ScrollReveal().reveal('.content-subtitle, .content-title, .content-description', { delay: 500, origin:'buttom' });
  
  ScrollReveal().reveal('.about-imageContent', { delay: 600, origin:'left' });
  ScrollReveal().reveal('.meu-text', { delay: 600, origin:'bottom'});
  ScrollReveal().reveal('.menu-items', { delay: 600, origin:'bottom'});
  ScrollReveal().reveal('.time-table', { delay: 600, origin:'right'});
  ScrollReveal().reveal('.section-subtitle', { delay: 600, origin:'right'});
  ScrollReveal().reveal('.brand-images', { delay: 500, origin:'bottom'});
  ScrollReveal().reveal('.review-text', { delay: 500, origin:'left'});
  ScrollReveal().reveal('.footerLinks-title', { delay: 300, origin:'right' });
  ScrollReveal().reveal('.footer-link', { delay: 200, origin:'right'});
  ScrollReveal().reveal('.footer-copyRight', { delay: 600, origin:'bottom'});
  ScrollReveal().reveal('.footer-content, .location-text', { delay: 600, origin:'bottom'});
  ScrollReveal().reveal('.section-description', { delay: 600, origin:'left'});
  ScrollReveal().reveal('.newsletter-inputBox', { delay: 600, origin:'bottom'});
  ScrollReveal().reveal('.media-icons', { delay: 600, origin:'left', interval:100});
  ScrollReveal().reveal('.about-lists', { delay: 600, origin:'right'});
  ScrollReveal().reveal('.about-buttons', { delay: 600, origin:'left'});
  
  
  //scroll Reveal ends here