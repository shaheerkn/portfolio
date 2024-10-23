
  var typed5 = new Typed('#typed5', {
    strings: ["I'm Shaheer"],
    typeSpeed: 50,
    backSpeed: 20,
    cursorChar: '_',
    shuffle: true,
    smartBackspace: false,
    // loop: true
});

gsap.registerPlugin(ScrollTrigger);

gsap.to('.shape--center-right', {
  scrollTrigger: {
    trigger: '.shape--center-right',
    scrub: 1,
    start: "top 50%",
    end: "center top",
  },
  transform: "translateY(-400px)",
})

gsap.to('.shape--center', {
  scrollTrigger: {
    trigger: '.shape--center',
    scrub: 1,
    start: "top 10%",
    end: "center top",
  },
  transform: "translateY(-100px)",
})

gsap.to('.shape--bottom-main', {
  scrollTrigger: {
    trigger: '.shape--bottom-main',
    scrub: 1,
    start: "top 60%",
    end: "center top",
  },
  opacity: 0,
  y: -200
})

var swiper = new Swiper(".mySwiper", {
  effect: "cards",
  grabCursor: true,
  loop: true,
  autoplay: {
    delay: 1000,
  }
});