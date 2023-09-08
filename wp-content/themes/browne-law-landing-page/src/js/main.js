document.addEventListener("DOMContentLoaded", function() {
  
  /* Global
  -------------------------------------------------------------- */
  let navHeight = jQuery('nav').outerHeight();
  
  jQuery(".smooth-scroll").click(function(event) {
    event.preventDefault();
    jQuery('html,body').animate( { 
      scrollTop:jQuery(this.hash).offset().top - navHeight
    } , 1500);
  });
  
  /* Header
  -------------------------------------------------------------- */
  jQuery('header').addClass('zoom-out');
  
  ScrollTrigger.create({
    trigger: "main",
    start: function() {
      return `top-=${navHeight} top`;
    },
    endTrigger: "html",
    end: "bottom top",
    onEnter: function() {
      jQuery('body').addClass('focus-footer');
      jQuery("nav").addClass("pop");
    },
    onLeaveBack: function() {
      jQuery('body').removeClass('focus-footer');
      jQuery("nav").removeClass("pop");
    }
  });

  /* Single testimonial
  -------------------------------------------------------------- */
  // Initialize GSAP ScrollTrigger
  gsap.registerPlugin(ScrollTrigger);
  
  const customEase = "cubic-bezier(0.17, 0.66, 0.34, 0.98)";
  
  // Pinning #single-testimonial when scrolled into view
  ScrollTrigger.create({
    trigger: "#single-testimonial",
    start: function() {
      let navHeight = jQuery('nav').outerHeight();
      return `top-=${navHeight} top`;
    },
    endTrigger: "#single-testimonial",
    end: "bottom top",
    pin: true,
    scrub: 1,
    ease: customEase
  });
  
  // Animate .expanding-container while #single-testimonial is pinned
  gsap.to("#single-testimonial .expanding-container", {
    scrollTrigger: {
      trigger: "#single-testimonial",
      start: "top center+=25%",
      endTrigger: "#single-testimonial",
      end: "top center",
      scrub: 1
    },
    width: "100%",
    borderRadius: "0",
    ease: customEase
  });
  
  // Create a timeline for revealing the content
  const tl = gsap.timeline({
    scrollTrigger: {
      trigger: "#single-testimonial",
      start: "top center",
      end: "bottom top",
      scrub: 1
    },
    ease: customEase
  });
  
  // Animate specific elements inside .content, and add easing
  const contentElems = document.querySelectorAll('#single-testimonial .content p, #single-testimonial .content img, #single-testimonial .content div.author'); 
  const duration = 1; // Duration of each fade-in in seconds
  const overlap = 0.75; // Overlap duration in seconds
  
  contentElems.forEach((elem, index) => {
    tl.fromTo(elem,
      { opacity: 0 },
      { opacity: 1, translateY: 0, duration: duration, ease: customEase },
      index * (duration - overlap) // This is where the overlap happens
    );
  });

/* FAQs
-------------------------------------------------------------- */
  jQuery(".faq").on('click', function(){
    jQuery(this).children('.faq-answer').slideToggle(500);
    jQuery(this).find('svg').toggleClass('open');
  });

});

/* Contact form
-------------------------------------------------------------- */
jQuery(document).on('gform_confirmation_loaded', function(event, formId) {
  // Make sure the form that's being submitted is the one you're interested in
  if (formId === 1) {
    // Animate the scroll
    jQuery('html, body').animate({
      scrollTop: jQuery('#contact-form').offset().top
    }, 1000);  // Scroll duration of 1 second
  }
});
