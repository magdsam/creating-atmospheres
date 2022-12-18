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
    trigger: '.banner',
    scrub: 1,
    pin: '.wp-block-intro',
    pinSpacing: false,
    endTrigger: '.wp-block-intro-info',
    end: 'bottom bottom',
  });

  /**
   * Gsap Tagline Fade In/Out
   */
  const taglines = document.querySelectorAll(
    '.wp-block-intro-info__tagline, .wp-block-intro-info__countdown',
  );

  if (taglines) {
    taglines.forEach((tagline) => {
      gsap.from(tagline, {
        y: 100,
        ease: 'power4.out',
        skewY: 7,
        opacity: 0,
        stagger: {
          amount: 0.3,
        },
        duration: 1.8,
        scrollTrigger: {
          trigger: tagline,
          start: 'top bottom',
        },
      });
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
