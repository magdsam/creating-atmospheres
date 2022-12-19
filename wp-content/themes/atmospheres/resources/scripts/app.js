import {domReady} from '@roots/sage/client';
import {gsap} from 'gsap';
import {ScrollTrigger} from 'gsap/ScrollTrigger';

gsap.registerPlugin(ScrollTrigger);

/**
 * app.main
 */
const main = async (err) => {
  if (err) {
    // handle hmr errors
    console.error(err);
  }

  /**
   * Countdown
   */
  var countDownDate = new Date('Jan 25, 2023 19:00:00').getTime();
  var x = setInterval(function () {
    var now = new Date().getTime();
    var distance = countDownDate - now;
    var days = Math.floor(distance / (1000 * 60 * 60 * 24));
    var hours = Math.floor(
      (distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60),
    );
    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    var seconds = Math.floor((distance % (1000 * 60)) / 1000);

    document.querySelector(
      '.wp-block-intro-info__countdown__content .days .number',
    ).innerHTML = days.toString().padStart(2, '0');
    document.querySelector(
      '.wp-block-intro-info__countdown__content .hours .number',
    ).innerHTML = hours.toString().padStart(2, '0');
    document.querySelector(
      '.wp-block-intro-info__countdown__content .minutes .number',
    ).innerHTML = minutes.toString().padStart(2, '0');
    document.querySelector(
      '.wp-block-intro-info__countdown__content .seconds .number',
    ).innerHTML = seconds.toString().padStart(2, '0');

    if (distance < 0) {
      clearInterval(x);
      document.querySelector('.wp-block-intro-info__countdown').innerHTML =
        'We are open!';
    }
  }, 1000);

  /**
   * Gsap Intro reveal
   */
  ScrollTrigger.create({
    scrub: 1,
    pin: '.wp-block-intro',
    pinSpacing: false,
    start: '0px',
    endTrigger: '.wp-block-intro-info',
    end: 'bottom bottom',
  });

  /**
   * Gsap Intro reveal
   */
  gsap.to('.wp-block-intro-info__video', {
    scrollTrigger: {
      trigger: '.wp-block-intro-info__video',
      scrub: 1,
      pin: true,
      pinSpacing: false,
      start: 'bottom bottom',
      endTrigger: 'html',
      end: 'bottom top',
    },
  });

  /**
   * Gsap Intro reveal
   */
  gsap.to('.wp-block-intro-info__video', {
    scale: 2,
    scrollTrigger: {
      scrub: 1,
      start: '0px',
      endTigger: '.wp-block-intro-info__video',
      end: 'bottom bottom',
    },
  });

  gsap.to('.wp-block-intro', {
    opacity: -2,
    scrollTrigger: {
      scrub: 1,
      start: '0px',
      endTigger: '.wp-block-intro-info__video',
      end: 'bottom bottom',
    },
  });

  /**
   * Gsap Tagline Fade In/Out
   */
  const taglines = document.querySelectorAll(
    '.wp-block-intro-info__tagline, .wp-block-intro-info__countdown',
  );

  if (taglines) {
    taglines.forEach((tagline) => {
      let introInfoTl = gsap.timeline({
        scrollTrigger: {
          trigger: tagline,
          start: window.innerHeight / 4 + 'px bottom',
          toggleActions: 'play none none reverse',
        },
      });

      introInfoTl.fromTo(
        tagline,
        {
          y: 100,
          skewY: 7,
          opacity: 0,
        },
        {
          y: 0,
          ease: 'power4.out',
          skewY: 0,
          opacity: 1,
          duration: 1.8,
        },
      );
    });
  }
};

/**
 * Initialize
 *
 * @see https://webpack.js.org/api/hot-module-replacement
 */
domReady(main);
import.meta.webpackHot?.accept(main);
