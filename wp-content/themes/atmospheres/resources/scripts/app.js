import {domReady} from '@roots/sage/client';
import {gsap} from 'gsap';
import {ScrollTrigger} from 'gsap/ScrollTrigger';
import {Draggable} from 'gsap/Draggable';
import Flip from 'gsap/Flip';

gsap.registerPlugin(ScrollTrigger, Flip, Draggable);

/**
 * app.main
 */
const main = async (err) => {
  if (err) {
    // handle hmr errors
    console.error(err);
  }

  window.addEventListener('load', () => {
    exhibits.classList.add('loaded');
  });

  const menuButton = document.querySelector('.banner .menu-button');
  const navigation = document.querySelector('.nav-primary');

  if (menuButton && navigation) {
    menuButton.addEventListener('click', toggleNavVisibility);
  }

  function toggleNavVisibility() {
    let navState = navigation.getAttribute('status');

    if (navState === 'visible') {
      navigation.setAttribute('status', 'hidden');
      menuButton.setAttribute('aria-expanded', 'false');
      menuButton.innerHTML = 'menu';
    } else {
      navigation.setAttribute('status', 'visible');
      menuButton.setAttribute('aria-expanded', 'true');
      menuButton.innerHTML = 'close';
    }
  }

  /**
   * Countdown
   */
  if (document.querySelector('.wp-block-intro-info__countdown')) {
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
  }

  /**
   * Gsap Intro reveal
   */
  if (document.querySelector('.wp-block-intro')) {
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
      scale: 2.5,
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
  }

  /**
   * Filter
   */
  const allButton = document.querySelector('#all');
  const filters = gsap.utils.toArray('.major-list__item:not(#all)');
  const items = gsap.utils.toArray('.students-list .student');

  function updateProjectFilter() {
    const startHeight = gsap.getProperty('.students-list', 'height');
    const state = Flip.getState(items);
    const classes = filters
      .filter((button) => button.classList.contains('is-active'))
      .map((button) => '.has-major-' + button.id);
    const matches = classes.length
      ? gsap.utils.toArray(classes.join(', '))
      : classes;

    items.forEach(
      (item) =>
        (item.style.display = matches.indexOf(item) === -1 ? 'none' : 'block'),
    );

    const endHeight = gsap.getProperty('.students-list', 'height');
    const flip = Flip.from(state, {
      duration: 0.7,
      scale: true,
      ease: 'power1.inOut',
      stagger: 0.08,
      absolute: true,
      onEnter: (elements) =>
        gsap.fromTo(elements, {opacity: 0}, {opacity: 1, duration: 0.4}),
      onLeave: (elements) => gsap.to(elements, {opacity: 0, duration: 0.4}),
    });

    flip.fromTo(
      '.students-list',
      {
        height: startHeight,
      },
      {
        height: endHeight,
        clearProps: 'height',
        duration: flip.duration(),
      },
      0,
    );
  }

  if (filters) {
    filters.forEach(function (categoryButton) {
      categoryButton.addEventListener('click', function () {
        let siblings = getSiblings(this);

        siblings.forEach(function (sibling) {
          sibling.classList.remove('is-active');
          sibling.classList.remove('has-underline');
        });

        if (allButton.classList.contains('has-underline')) {
          allButton.classList.remove('has-underline');
        }

        this.classList.add('has-underline');
        this.classList.add('is-active');

        updateProjectFilter();
      });
    });
  }

  if (allButton) {
    allButton.classList.add('has-underline');

    allButton.addEventListener('click', function () {
      //filters.forEach(filter => filter.classList.add('is-active'));
      filters.forEach(function (filter) {
        filter.classList.add('is-active');
        filter.classList.remove('has-underline');
      });
      if (!this.classList.contains('has-underline')) {
        this.classList.add('has-underline');
      }
      updateProjectFilter();
    });
  }

  let getSiblings = function (e) {
    // for collecting siblings
    let siblings = [];
    // if no parent, return no sibling
    if (!e.parentNode) {
      return siblings;
    }
    // first child of the parent node
    let sibling = e.parentNode.firstChild;
    // collecting siblings
    while (sibling) {
      if (sibling.nodeType === 1 && sibling !== e) {
        siblings.push(sibling);
      }
      sibling = sibling.nextSibling;
    }
    return siblings;
  };

  const exhibitsContainer = document.querySelector(
    '.post-type-archive-ca_exhibit .exhibits-container',
  );
  const exhibits = document.querySelector(
    '.post-type-archive-ca_exhibit .exhibits',
  );

  if (exhibits) {
    document.body.classList.add('layout-grid');
  }

  let dragNavigation;

  function dragContainer() {
    let exhibitsPosX = -exhibits.clientWidth / 4;
    let exhibitsPosY = -exhibits.clientHeight / 4;

    dragNavigation = Draggable.create(exhibits, {
      type: 'x,y',
      bounds: exhibitsContainer,
      edgeResistance: 1,
      dragResistance: 0.1,
      zIndexBoost: false,
      onDrag: function () {
        gsap.to(exhibits, {
          left: this.x,
          top: this.y,
        });
      },
    });

    gsap.set(exhibits, {
      left: exhibitsPosX,
      top: exhibitsPosY,
      x: exhibitsPosX,
      y: exhibitsPosY,
    });
  }

  if (exhibits) {
    dragContainer();
    window.addEventListener('resize', dragContainer);

    const buttonGrid = document.getElementById('switch-grid');
    const buttonList = document.getElementById('switch-list');

    if (buttonGrid && buttonList) {
      buttonGrid.addEventListener('click', () => {
        if (!buttonGrid.classList.contains('is-active')) {
          document.body.classList.add('layout-grid');
          buttonGrid.classList.add('is-active');

          dragContainer();
        }

        if (buttonList.classList.contains('is-active')) {
          buttonList.classList.remove('is-active');
          document.body.classList.remove('layout-list');
        }
      });

      buttonList.addEventListener('click', () => {
        if (!buttonList.classList.contains('is-active')) {
          dragNavigation[0].disable();
          buttonList.classList.add('is-active');
          document.body.classList.add('layout-list');
        }

        if (buttonGrid.classList.contains('is-active')) {
          buttonGrid.classList.remove('is-active');
          document.body.classList.remove('layout-grid');
        }
      });
    }
  }
};

/**
 * Initialize
 *
 * @see https://webpack.js.org/api/hot-module-replacement
 */
domReady(main);
import.meta.webpackHot?.accept(main);
