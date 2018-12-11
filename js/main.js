function checkDom(dom) {
  return $(dom).length > 0
}

function toggleSidemenu() {
  $('.mobile-menu').on('click', function () {
    $('.side-menu').toggleClass('show');
  });
  $(window).resize(function () {
    $('.side-menu').removeClass('show');
  });
}

function showHomeBg() {
  $('.home .btn-slide').off('mouseenter mouseleave').on({
    mouseenter: function () {
      $(this).parents('.home-section').find('.bg').addClass('show')
    },

    mouseleave: function () {
      $(this).parents('.home-section').find('.bg').removeClass('show')
    }
  })
}

function homeOverlayColor() {
  $('.home .btn-slide').click(function (e) {
    e.preventDefault();
    var className = $(this).attr("class")

    if (className.includes('magenta')) {
      $('.overlay').css('background-color', '#d52063')
    } else if (className.includes('yellow')) {
      $('.overlay').css('background-color', '#eeb11c')
    } else {
      $('.overlay').css('background-color', '#008080')
    }
  });
}

function slideTeam() {
  var slideNumber = 3
  if ($('.slide-team > div').length <= 3) {
    slideNumber = 1
  }
  $('.slide-team').slick({
    centerMode: true,
    centerPadding: '0px',
    slidesToShow: slideNumber,
    infinite: true,
    dots: true,
    responsive: [
      {
        breakpoint: 768,
        settings: {
          arrows: true,
          centerMode: true,
          centerPadding: '40px',
          slidesToShow: 3
        }
      },
      {
        breakpoint: 480,
        settings: {
          arrows: true,
          centerMode: true,
          centerPadding: '40px',
          slidesToShow: 1
        }
      }
    ]
  })
}

function clientsSlide() {
  $('.client-slide').slick({
    dots: false,
    arrows: false,
    infinite: false,
    speed: 300,
    slidesToShow: 5,
    slidesToScroll: 1,
    autoplay: true,
    responsive: [
      {
        breakpoint: 1440,
        settings: {
          slidesToShow: 5,
          slidesToScroll: 1,
          dots: false
        }
      },
      {
        breakpoint: 1024,
        settings: {
          slidesToShow: 3,
          slidesToScroll: 1,
          dots: false
        }
      },
      {
        breakpoint: 780,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1
        }
      }
    ]
  });
}

function slideProblems() {
  $('.slide-problems').slick({
    autoplay: true,
    autoplaySpeed: 3000,
    dots: true,
    arrows: false,
    infinite: true,
    slidesToShow: 1,
    autoplay: true,
    slidesToScroll: 1,
  });
}

function heroSlide() {
  if ($('.hero-slide > div').length > 2) {
    $('.hero-slide').slick({
      dots: true,
      autoplay: true,
      arrows: false,
      infinite: false,
      slidesToShow: 1,
      slidesToScroll: 1,
    });
  }
}

function showHideMenu() {
  // Hide Header on on scroll down
  var didScroll;
  var lastScrollTop = 0;
  var delta = 5;
  var header = $('.top-menu');
  var navbarHeight = header.outerHeight();

  $(window).scroll(function (event) {
    didScroll = true;
  });

  setInterval(function () {
    if (didScroll) {
      hasScrolled();
      didScroll = false;
    }
  }, 250);

  function hasScrolled() {
    var st = $(this).scrollTop();

    // Make sure they scroll more than delta
    if (Math.abs(lastScrollTop - st) <= delta)
      return;

    // If they scrolled down and are past the navbar, add class .nav-up.
    // This is necessary so you never see what is "behind" the navbar.
    if (st > lastScrollTop && st > navbarHeight) {
      // Scroll Down
      $('.top-menu').removeClass('nav-down').addClass('nav-up');
    } else {
      // Scroll Up
      if (st + $(window).height() < $(document).height()) {
        $('.top-menu').removeClass('nav-up').addClass('nav-down');
      }
    }

    lastScrollTop = st;
  }
}

function openSearch() {
  $('.icon-search').on('click', function () {
    $('.top-menu .search').toggleClass('show');
  })
}

function resourceModal() {
  if (checkDom('#modal')) {
    var dimissed = localStorage.getItem('resourcemodal')

    if (dimissed === null) {
    $('.modal-open').click(function (e) {
        e.preventDefault();
        MicroModal.show('modal', {
          onClose: function () {
            localStorage.setItem('resourcemodal', 'true')
            $('#modal').removeClass('is-open')
            $('.modal-open').unbind()
          },
          awaitCloseAnimation: true
        })
      });
    }

  }
}

function startFunctions() {
  // add gravity forms here
  if (checkDom('.top-menu')) {
    showHideMenu()
    toggleSidemenu()
    openSearch()
  }

  if (checkDom('.home')) {
    showHomeBg()
    homeOverlayColor()
  }

  if (checkDom('.client-slide')) {
    if (!$('.client-slide').hasClass('slick-slider')) {
      clientsSlide()
    }
  }

  if (checkDom('.slide-problems')) {
    if (!$('.slide-problems').hasClass('slick-slider')) {
      slideProblems()
    }
  }

  if (checkDom('.client-slide')) {
    if (!$('.client-slide').hasClass('slick-slider')) {
      slideTeam()
    }
  }

  if (checkDom('.hero-slide')) {
    if (!$('.hero-slide').hasClass('slick-slider')) {
      heroSlide()
    }
  }

  if (checkDom('.grid')) {
    masonryFilter()
  }

  AOS.init({
    startEvent: 'DOMContentLoaded',
    once: false
  });

  document.addEventListener('aos:in:slide-team', function (detail) {
    slideTeam()
    AOS.refresh(true)
  });

    $("#secondLine").css({visibility: "hidden"});

  document.addEventListener('aos:in:firstLine', ({detail}) => {
      setTimeout(
          function()
          {
            if ($(detail).hasClass("aos-animate")){ //normal scroll down animation
              $(detail).css({visibility: "hidden"});
              $(detail.nextElementSibling).css({visibility: "visible"});
            }
            else{ //reverse scroll up animation
                $(detail).css({visibility: "visible"});
                $(detail.nextElementSibling).css({visibility: "hidden"});
            }
          }, 400);
  });

    document.addEventListener('aos:in:secondLine', ({detail}) => {
        setTimeout(
            function()
            {
                if ($(detail).hasClass("aos-animate")){ //normal scroll down animation
                    $(detail).css({visibility: "visible"});
                    $(detail.previousElementSibling).css({visibility: "hidden"});
                }
                else{ //reverse scroll up animation
                    $(detail).css({visibility: "hidden"});
                    $(detail.previousElementSibling).css({visibility: "visible"});
                }
            }, 400);
    });

  init();
  animate();
  resourceModal()
}

function masonryFilter() {
  $('.grid').isotope({
    itemSelector: '.grid-item',
    layoutMode: 'packery',
    packery: {
      gutter: 20
    }
  });

  $('.grid').imagesLoaded().progress(function () {
    $('.grid').isotope('layout');
  });

  $('.menu-category button').click(function (e) {
    e.preventDefault();
    var type = '.' + $(this).data('filter')
    $('.grid').isotope({
      filter: type
    })
  });
}

function initBarba() {
  var FadeTransition = Barba.BaseTransition.extend({
    start: function () {
      /**
       * This function is automatically called as soon the Transition starts
       * this.newContainerLoading is a Promise for the loading of the new container
       * (Barba.js also comes with an handy Promise polyfill!)
       */

      // As soon the loading is finished and the old page is faded out, let's fade the new page
      Promise
        .all([this.newContainerLoading, this.fadeOut()])
        .then(this.fadeIn.bind(this));
    },

    fadeOut: function () {
      /**
       * this.oldContainer is the HTMLElement of the old Container
       */
      $(this.oldContainer).find('.overlay').css({ right: 0 })
      return $(this.oldContainer).find('.overlay').animate({ width: '150%' }, 500).promise();
    },

    fadeIn: function () {
      /**
       * this.newContainer is the HTMLElement of the new Container
       * At this stage newContainer is on the DOM (inside our #barba-container and with visibility: hidden)
       * Please note, newContainer is available just after newContainerLoading is resolved!
       */

      var _this = this;
      window.scrollTo(0, 0);
      var $el = $(this.newContainer);

      $(this.oldContainer).hide();
      $el.css({
        visibility: 'visible',
      })
      $el.find('.overlay').css({
        width: '100%',
        left: 0
      });

      $el.find('.overlay').animate({ width: 0 }, 500, function () {
        /**
         * Do not forget to call .done() as soon your transition is finished!
         * .done() will automatically remove from the DOM the old Container
         */
        _this.done();
        $el.find('.overlay').css({ right: 0, left: 'auto' })

      });
    }
  });

  /**
   * Next step, you have to tell Barba to use the new Transition
   */

  Barba.Pjax.getTransition = function () {
    /**
     * Here you can use your own logic!
     * For example you can use different Transition based on the current page or link...
     */

    return FadeTransition;
  };

  var Homepage = Barba.BaseView.extend({
    namespace: 'homepage',
    onEnter: function () {
      // The new Container is ready and attached to the DOM.

    },
    onEnterCompleted: function () {
      startFunctions()
      // The Transition has just finished.
    },
    onLeave: function () {
      // A new Transition toward a new page has just started.
    },
    onLeaveCompleted: function () {
      // The Container has just been removed from the DOM.
    }
  });

  // Don't forget to init the view!
  Homepage.init();

  // Don't forget to init the view!
  Barba.Prefetch.init()
  Barba.Pjax.start()
}

var camera, scene, renderer,
  geometry, material, mesh;

function init() {
  clock = new THREE.Clock();

  renderer = new THREE.WebGLRenderer();
  renderer.setSize(window.innerWidth, window.innerHeight);

  scene = new THREE.Scene();

  camera = new THREE.PerspectiveCamera(75, window.innerWidth / window.innerHeight, 1, 10000);
  camera.position.z = 1000;
  scene.add(camera);

  geometry = new THREE.CubeGeometry(200, 200, 200);
  material = new THREE.MeshLambertMaterial({ color: 0xaa6666, wireframe: false });
  mesh = new THREE.Mesh(geometry, material);
  //scene.add( mesh );
  cubeSineDriver = 0;

  textGeo = new THREE.PlaneGeometry(300, 300);
  THREE.ImageUtils.crossOrigin = ''; //Need this to pull in crossdomain images from AWS

  light = new THREE.DirectionalLight(0xffffff, 0.5);
  light.position.set(-1, 0, 1);
  scene.add(light);

  smokeTexture = THREE.ImageUtils.loadTexture('../images/Smoke-Element.png');
  smokeMaterial = new THREE.MeshLambertMaterial({ color: 0xD52063, map: smokeTexture, transparent: true });
  smokeGeo = new THREE.PlaneGeometry(300, 300);
  smokeParticles = [];


  for (p = 0; p < 150; p++) {
    var particle = new THREE.Mesh(smokeGeo, smokeMaterial);
    particle.position.set(Math.random() * 500 - 250, Math.random() * 500 - 250, Math.random() * 1000 - 100);
    particle.rotation.z = Math.random() * 360;
    scene.add(particle);
    smokeParticles.push(particle);
  }

  document.body.appendChild(renderer.domElement);

}

function animate() {

  // note: three.js includes requestAnimationFrame shim
  delta = clock.getDelta();
  requestAnimationFrame(animate);
  evolveSmoke();
  render();
}

function evolveSmoke() {
  var sp = smokeParticles.length;
  while (sp--) {
    smokeParticles[sp].rotation.z += (delta * 0.2);
  }
}

function render() {
  mesh.rotation.x += 0.005;
  mesh.rotation.y += 0.01;
  cubeSineDriver += .01;
  mesh.position.z = 100 + (Math.sin(cubeSineDriver) * 500);
  renderer.render(scene, camera);
}

$(document).ready(function () {
  initBarba()

});
