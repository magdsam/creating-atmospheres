import {domReady} from '@roots/sage/client';

/**
 * app.main
 */
const main = async (err) => {
  if (err) {
    // handle hmr errors
    console.error(err);
  }

  // Set the date we're counting down to
  var countDownDate = new Date('Jan 25, 2023 19:00:00').getTime();

  // Update the count down every 1 second
  var x = setInterval(function () {
    // Get today's date and time
    var now = new Date().getTime();

    // Find the distance between now and the count down date
    var distance = countDownDate - now;

    // Time calculations for days, hours, minutes and seconds
    var days = Math.floor(distance / (1000 * 60 * 60 * 24));
    var hours = Math.floor(
      (distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60),
    );
    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    var seconds = Math.floor((distance % (1000 * 60)) / 1000);

    // Display the result in the element with id="demo"
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

    // If the count down is finished, write some text
    if (distance < 0) {
      clearInterval(x);
      document.querySelector('.wp-block-intro-info__countdown').innerHTML =
        'We are open!';
    }
  }, 1000);
};

/**
 * Initialize
 *
 * @see https://webpack.js.org/api/hot-module-replacement
 */
domReady(main);
import.meta.webpackHot?.accept(main);
