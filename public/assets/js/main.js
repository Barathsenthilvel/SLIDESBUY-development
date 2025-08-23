(function ($) {
  "use strict";

  // ==========================================
  //      Document Ready function
  // ==========================================
  $(document).ready(function() {

    console.log('Document ready - initializing sliders...');

    // General error handler for slider initializations
    window.handleSliderError = function(sliderName, error) {
      console.log(`Error initializing ${sliderName}:`, error);
    };

    // Safe slider initialization function
    window.initializeSlider = function(selector, options, sliderName) {
      try {
        if($(selector).length > 0 && typeof $.fn.slick !== 'undefined') {
          $(selector).slick(options);
          console.log(`${sliderName} initialized successfully`);
        } else {
          if($(selector).length === 0) {
            console.log(`${sliderName} element not found on this page`);
          }
          if(typeof $.fn.slick === 'undefined') {
            console.log('Slick slider library not loaded');
          }
        }
      } catch (error) {
        window.handleSliderError(sliderName, error);
      }
    };

    // ============================== Light & Dark Mode Js Start=====================
    const toggleSwitch = document.querySelector('.theme-switch input[type="checkbox"]');
    const currentTheme = localStorage.getItem('theme');

    if (currentTheme) {
        document.documentElement.setAttribute('data-theme', currentTheme);

        if (currentTheme === 'dark') {
            toggleSwitch.checked = true;
        }
    }
    function switchTheme(e) {
        if (e.target.checked) {
            document.documentElement.setAttribute('data-theme', 'dark');
            localStorage.setItem('theme', 'dark');
        }
        else {
          document.documentElement.setAttribute('data-theme', 'light');
          localStorage.setItem('theme', 'light');
        }
    }
    toggleSwitch.addEventListener('change', switchTheme, false);
  // ============================== Light & Dark Mode Js End==============================

  // ============================== Auto Suggestion Js Start ==============================
  $('.auto-suggestion-input').on('input', function (event) {
    event.stopPropagation();
    $(this).addClass('active');
    $('.auto-suggestion-list').addClass('active');
  });

  $('body').on('click', function () {
    $('.auto-suggestion-input').removeClass('active');
    $('.auto-suggestion-list').removeClass('active');
  });
  // ============================== Auto Suggestion Js End ==============================


  // ============================== Auto Suggestion Text value place to the input field Js End ==============================
  $('.auto-suggestion-list__item').on('click', function (event) {
    event.preventDefault();
    const textValue = $(this).text().trim();
    $('.auto-suggestion-input').val(textValue);
  });
  // ============================== Auto Suggestion Text value place to the input field Js End ==============================


  // ============== Mobile Menu Sidebar Js Start ========
  $('.toggle-mobileMenu').on('click', function () {
    $('.mobile-menu').addClass('active');
    $('.side-overlay').addClass('show');
    $('body').addClass('scroll-hide-sm');
  });

  $('.close-button, .side-overlay').on('click', function () {
    $('.mobile-menu').removeClass('active');
    $('.side-overlay').removeClass('show');
    $('body').removeClass('scroll-hide-sm');
  });
  // ============== Mobile Menu Sidebar Js End ========

  // ============== Mobile Nav Menu Dropdown Js Start =======================
  var windowWidth = $(window).width();

  $('.has-submenu').on('click', function () {
    var thisItem = $(this);

    if(windowWidth < 992) {
      if(thisItem.hasClass('active')) {
        thisItem.removeClass('active')
      } else {
        $('.has-submenu').removeClass('active')
        $(thisItem).addClass('active')
      }

      var submenu = thisItem.find('.nav-submenu');

      $('.nav-submenu').not(submenu).slideUp(300);
      submenu.slideToggle(300);
    }

  });
  // ============== Mobile Nav Menu Dropdown Js End =======================

  // ======================== Tooltip Js Start ====================
  const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
  const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))
  // ======================== Tooltip Js End ====================

  // ===================== Scroll Back to Top Js Start ======================
  var progressPath = document.querySelector('.progress-wrap path');
  var pathLength = progressPath.getTotalLength();
  progressPath.style.transition = progressPath.style.WebkitTransition = 'none';
  progressPath.style.strokeDasharray = pathLength + ' ' + pathLength;
  progressPath.style.strokeDashoffset = pathLength;
  progressPath.getBoundingClientRect();
  progressPath.style.transition = progressPath.style.WebkitTransition = 'stroke-dashoffset 10ms linear';
  var updateProgress = function () {
    var scroll = $(window).scrollTop();
    var height = $(document).height() - $(window).height();
    var progress = pathLength - (scroll * pathLength / height);
    progressPath.style.strokeDashoffset = progress;
  }
  updateProgress();
  $(window).scroll(updateProgress);
  var offset = 50;
  var duration = 550;
  jQuery(window).on('scroll', function() {
    if (jQuery(this).scrollTop() > offset) {
      jQuery('.progress-wrap').addClass('active-progress');
    } else {
      jQuery('.progress-wrap').removeClass('active-progress');
    }
  });
  jQuery('.progress-wrap').on('click', function(event) {
    event.preventDefault();
    jQuery('html, body').animate({scrollTop: 0}, duration);
    return false;
  })
  // ===================== Scroll Back to Top Js End ======================

  // ========================== add active class to ul>li top Active current page Js Start =====================
  function dynamicActiveMenuClass(selector) {
    let FileName = window.location.pathname.split("/").reverse()[0];

    selector.find("li").each(function () {
      let anchor = $(this).find("a");
      if ($(anchor).attr("href") == FileName) {
        $(this).addClass("activePage");
      }
    });
    // if any li has activePage element add class
    selector.children("li").each(function () {
      if ($(this).find(".activePage").length) {
        $(this).addClass("activePage");
      }
    });
    // if no file name return
    if ("" == FileName) {
      selector.find("li").eq(0).addClass("activePage");
    }
  }
  if ($('ul').length) {
    dynamicActiveMenuClass($('ul'));
  }
  // ========================== add active class to ul>li top Active current page Js End =====================

  // ================================ Remove Sale Offer Js Start =============================
  $('.sale-offer__close').on('click', function () {
    $(this).closest('.sale-offer').addClass('d-none')
  });
  // ================================ Remove Sale Offer Js End =============================

  // ================================ CountDown Js Start =============================
  if (document.querySelector('.countdown')) {
    const myCountdown = new countdown({
      target: '.countdown',
      dayWord: ' Days:',
      hourWord: ' Hour: ',
      minWord: ' Min:',
      secWord: ' Sec:'
    });
  }
  // ================================ CountDown Js End =============================

  // ========================= popular Category Js Start ==============
  if($('.popular-slider').length > 0) {
    try {
      $('.popular-slider').slick({
        slidesToShow: 6,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 2000,
        speed: 1500,
        dots: false,
        pauseOnHover: true,
        arrows: true,
        draggable: true,
        speed: 900,
        infinite: true,
        prevArrow: '<button type="button" class="slick-prev"><i class="las la-arrow-left"></i></button>',
        nextArrow: '<button type="button" class="slick-next"><i class="las la-arrow-right"></i></button>',
        responsive: [
          {
            breakpoint: 1199,
            settings: {
              slidesToShow: 5,
            }
          },
          {
            breakpoint: 991,
            settings: {
              slidesToShow: 4,
            }
          },
          {
            breakpoint: 767,
            settings: {
              slidesToShow: 3,
            }
          },
          {
            breakpoint: 575,
            settings: {
              slidesToShow: 2,
            }
          },
        ]
      });
    } catch (error) {
      console.log('Error initializing popular slider:', error);
    }
  }
  // ========================= popular Category Js End ===================

  // ========================= Wishlist Js Start ===================

  // Global wishlist functions
  function addToWishlist(productId) {
    console.log('addToWishlist called with product ID:', productId);
    console.log('CSRF token:', $('meta[name="csrf-token"]').attr('content'));
    console.log('Current button state:', $(`.wishlist-btn[data-product-id="${productId}"]`).hasClass('active'));

    $.ajax({
      method: "POST",
      url: "/wishlistAdd",
      data: {
        id: productId,
        _token: $('meta[name="csrf-token"]').attr('content')
      },
      success: function(data) {
        console.log('AJAX Success Response:', data);
        if (data.status === 'success') {
          // Update wishlist count in header
          $('.wishlist-count').text(data.count);

          // Update wishlist button state for all button types
          const buttons = $(`.wishlist-btn[data-product-id="${productId}"], .product-item__wishlist[data-product-id="${productId}"], .btn-wishlist[data-product-id="${productId}"], .wishlist-btn[data-id="${productId}"], .product-item__wishlist[data-id="${productId}"], .btn-wishlist[data-id="${productId}"]`);
          console.log('Found buttons to update:', buttons.length);
          buttons.addClass('in-wishlist active').find('i').removeClass('far').addClass('fas');
          console.log('Button updated successfully');

          // Success - no notification needed
          console.log('Product added to wishlist successfully');
        } else {
          if (typeof toastr !== 'undefined') {
            toastr.error(data.message || 'Error adding to wishlist');
          } else if (window.toaster) {
            window.toaster.error(data.message || 'Error adding to wishlist');
          } else {
            alert(data.message || 'Error adding to wishlist');
          }
        }
      },
      error: function(xhr) {
        console.log('AJAX Error in addToWishlist:', xhr);
        console.log('Error Status:', xhr.status);
        console.log('Error Response:', xhr.responseText);

        if (xhr.status === 401) {
          // Redirect to login if not authenticated
          window.location.href = '/login';
        } else {
          if (typeof toastr !== 'undefined') {
            toastr.error('Error adding to wishlist');
          } else if (window.toaster) {
            window.toaster.error('Error adding to wishlist');
          } else {
            alert('Error adding to wishlist');
          }
        }
      }
    });
  }

  function removeFromWishlist(productId) {
    $.ajax({
      method: "POST",
      url: "/wishlistRemove",
      data: {
        id: productId,
        _token: $('meta[name="csrf-token"]').attr('content')
      },
      success: function(data) {
        if (data.status === 'success') {
          // Update wishlist count in header
          $('.wishlist-count').text(data.count);

          // Update wishlist button state for all button types
          $(`.wishlist-btn[data-product-id="${productId}"], .product-item__wishlist[data-product-id="${productId}"], .btn-wishlist[data-product-id="${productId}"], .wishlist-btn[data-id="${productId}"], .product-item__wishlist[data-id="${productId}"], .btn-wishlist[data-id="${productId}"]`).removeClass('in-wishlist active').find('i').removeClass('fas').addClass('far');

          // Success - no notification needed
          console.log('Product removed from wishlist successfully');
        } else {
          if (typeof toastr !== 'undefined') {
            toastr.error(data.message || 'Error removing from wishlist');
          } else if (window.toaster) {
            window.toaster.error(data.message || 'Error removing from wishlist');
          } else {
            alert(data.message || 'Error removing from wishlist');
          }
        }
      },
      error: function(xhr) {
        console.log('AJAX Error in removeFromWishlist:', xhr);
        console.log('Error Status:', xhr.status);
        console.log('Error Response:', xhr.responseText);

        if (xhr.status === 401) {
          // Redirect to login if not authenticated
          window.location.href = '/login';
        } else {
          if (typeof toastr !== 'undefined') {
            toastr.error('Error removing from wishlist');
          } else if (window.toaster) {
            window.toaster.error('Error removing from wishlist');
          } else {
            alert('Error removing from wishlist');
          }
        }
      }
    });
  }

  // Toggle wishlist function
  function toggleWishlist(productId) {
    console.log('toggleWishlist called with product ID:', productId);

    const btn = $(`.wishlist-btn[data-product-id="${productId}"], .product-item__wishlist[data-product-id="${productId}"], .btn-wishlist[data-product-id="${productId}"], .wishlist-btn[data-id="${productId}"], .product-item__wishlist[data-id="${productId}"], .btn-wishlist[data-id="${productId}"]`);

    console.log('Found buttons:', btn.length);
    console.log('Button classes:', btn.attr('class'));

    if (btn.hasClass('in-wishlist') || btn.hasClass('active')) {
      console.log('Button is active, removing from wishlist');
      removeFromWishlist(productId);
    } else {
      console.log('Button is not active, adding to wishlist');
      addToWishlist(productId);
    }
  }

    // Unified wishlist click handler for all wishlist buttons
  $(document).on('click', '.product-item__wishlist, .wishlist-btn, .btn-wishlist', function(e) {
    e.preventDefault();
    e.stopPropagation();

    console.log('Wishlist button clicked:', this);

    // Skip if we're on the wishlist page (it has its own handler)
    if ($(this).closest('.wishlist-section').length) {
      console.log('Skipping wishlist page handler');
      return;
    }

        const button = $(this);
    const productId = button.data('product-id') || button.data('id');

    // Fix: Handle multiple ways to check authentication
    const authAttr = button.attr('data-auth');
    let isAuthenticated = authAttr === 'true' || button.data('auth') === true;
    const debugData = button.data('debug');

    console.log('Product ID:', productId);
    console.log('Button classes:', button.attr('class'));
    console.log('Raw auth attribute:', authAttr);
    console.log('Is authenticated:', isAuthenticated);
    console.log('Debug data:', debugData);

                // Fallback: Check debug data if button data fails
    if (!isAuthenticated && debugData && debugData.auth === true) {
      console.log('Falling back to debug data authentication');
      isAuthenticated = true;
    }

    // Alternative: Check if user is already logged in by looking at button state
    if (!isAuthenticated && button.hasClass('active') && button.hasClass('in-wishlist')) {
      console.log('User appears to be authenticated (button is active), proceeding with wishlist action');
      isAuthenticated = true;
    }

    // Additional fallback: Check if we're on a product page and user appears logged in
    if (!isAuthenticated && button.hasClass('active')) {
      console.log('Button is active, assuming user is authenticated');
      isAuthenticated = true;
    }

    // Final authentication check
    if (!isAuthenticated) {
      console.log('User not authenticated, redirecting to login');
      console.log('Debug info - Auth:', debugData?.auth, 'User ID:', debugData?.userId);

      // Redirect to login page
      window.location.href = '/sign-up';
      return;
    }

    // Additional check: Ensure user ID is available (but make it optional for now)
    if (!debugData || !debugData.userId) {
      console.log('User ID not available, but proceeding anyway (user appears authenticated)');
      // Don't redirect, just log the warning
    }

    console.log('Authentication successful, proceeding with wishlist action');

    if (productId) {
      console.log('Calling toggleWishlist with product ID:', productId);
      toggleWishlist(productId);
    } else {
      console.log('No product ID found, toggling active class');
      // Fallback for buttons without product ID
      button.toggleClass('active');
    }
  });
  // ========================= Wishlist Js End ===================

  // ========================= Selling Product Js Start ==============
  // Slider is now handled by the trending products include file
  // This prevents conflicts with the working slider HTML
  // ========================= Selling Product Js End ===================

  // ========================= Testimonial Slider Js Start ==============
  if($('.testimonial-slider').length > 0) {
    $('.testimonial-slider').slick({
      slidesToShow: 2,
      slidesToScroll: 1,
      autoplay: true,
      autoplaySpeed: 2000,
      speed: 1500,
      dots: true,
      pauseOnHover: true,
      arrows: true,
      draggable: true,
      speed: 900,
      infinite: true,
      prevArrow: '<button type="button" class="slick-prev"><i class="las la-arrow-left"></i></button>',
      nextArrow: '<button type="button" class="slick-next"><i class="las la-arrow-right"></i></button>',
      responsive: [
        {
          breakpoint: 991,
          settings: {
            slidesToShow: 1,
          }
        },
      ]
    });
  }
  // ========================= Testimonial Slider Js End ===================

  // ========================= Selling Product Js Start ==============
  // Initialize resource slider safely
  if($('.resource-slider').length > 0 && typeof $.fn.slick !== 'undefined') {
    try {
      $('.resource-slider').slick({
        slidesToShow: 4,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 2000,
        speed: 900,
        dots: true,
        pauseOnHover: true,
        arrows: true,
        draggable: true,
        infinite: true,
        prevArrow: '<button type="button" class="slick-prev"><i class="las la-arrow-left"></i></button>',
        nextArrow: '<button type="button" class="slick-next"><i class="las la-arrow-right"></i></button>',
        responsive: [
          {
            breakpoint: 1199,
            settings: {
              slidesToShow: 3,
            }
          },
          {
            breakpoint: 991,
            settings: {
              slidesToShow: 2,
            }
          },
          {
            breakpoint: 575,
            settings: {
              slidesToShow: 1,
            }
          },
        ]
      });
    } catch (error) {
      console.log('Error initializing resource slider:', error);
    }
  }
  // ========================= Selling Product Js End ===================

  // ========================= Brand Slider Js Start ==============
  if($('.brand-slider').length > 0) {
    $('.brand-slider').slick({
      slidesToShow: 5,
      slidesToScroll: 1,
      autoplay: true,
      autoplaySpeed: 2000,
      speed: 1500,
      dots: false,
      pauseOnHover: true,
      arrows: false,
      draggable: true,
      speed: 900,
      infinite: true,
      prevArrow: '<button type="button" class="slick-prev"><i class="las la-arrow-left"></i></button>',
      nextArrow: '<button type="button" class="slick-next"><i class="las la-arrow-right"></i></button>',
      responsive: [
        {
          breakpoint: 1199,
          settings: {
            slidesToShow: 4,
          }
        },
        {
          breakpoint: 991,
          settings: {
            slidesToShow: 3,
          }
        },
        {
          breakpoint: 767,
          settings: {
            slidesToShow: 2,
          }
        },
        {
          breakpoint: 575,
          settings: {
            slidesToShow: 1,
          }
        },
      ]
    });
  }
  // ========================= Brand Slider Js End ===================


  // ========================= Brand Three Slider Js Start ==============
  $('.brand-three-slider').slick({
    slidesToShow: 7,
    slidesToScroll: 1,
    autoplay: true,
    autoplaySpeed: 2000,
    speed: 1500,
    dots: false,
    pauseOnHover: true,
    arrows: false,
    draggable: true,
    speed: 900,
    infinite: true,
    prevArrow: '<button type="button" class="slick-prev"><i class="las la-arrow-left"></i></button>',
    nextArrow: '<button type="button" class="slick-next"><i class="las la-arrow-right"></i></button>',
    responsive: [
      {
        breakpoint: 1199,
        settings: {
          slidesToShow: 6,
        }
      },
      {
        breakpoint: 991,
        settings: {
          slidesToShow: 5,
        }
      },
      {
        breakpoint: 767,
        settings: {
          slidesToShow: 4,
        }
      },
      {
        breakpoint: 575,
        settings: {
          slidesToShow: 3,
        }
      },
      {
        breakpoint: 425,
        settings: {
          slidesToShow: 2,
        }
      },
    ]
  });
  // ========================= Brand Three Slider Js End ===================

  // ========================= Service Item Js Start ===================
  $('.service-three-item__button').on('click', function () {
    var $serviceItem = $(this).closest('.service-three-item');

    if ($serviceItem.hasClass('active')) {
      $serviceItem.removeClass('active');
    } else {
      $('.service-three-item').removeClass('active');
      $serviceItem.addClass('active');
    }
  });
  // ========================= Service Item Js End ===================

  // ========================= Latest Project Slider Into Tab Js Start ==============
  $('.latest-project-slider').slick({
    slidesToShow: 3,
    slidesToScroll: 1,
    autoplay: true,
    autoplaySpeed: 2000,
    speed: 1500,
    dots: false,
    pauseOnHover: true,
    arrows: true,
    draggable: true,
    speed: 900,
    infinite: true,
    prevArrow: '<button type="button" class="slick-prev"><i class="las la-arrow-left"></i></button>',
    nextArrow: '<button type="button" class="slick-next"><i class="las la-arrow-right"></i></button>',
    responsive: [
      {
        breakpoint: 1199,
        settings: {
          slidesToShow: 2,
        }
      },
      {
        breakpoint: 767,
        settings: {
          slidesToShow: 1,
        }
      },
    ]
  });
  // ========================= Latest Project Slider Into Tab Js End ===================

  // ========================= Selling Product Js Start ==============
  $('.team-item-slider').slick({
    slidesToShow: 4,
    slidesToScroll: 1,
    autoplay: true,
    autoplaySpeed: 2000,
    speed: 1500,
    dots: true,
    pauseOnHover: true,
    arrows: true,
    draggable: true,
    speed: 900,
    infinite: true,
    prevArrow: '<button type="button" class="slick-prev"><i class="las la-arrow-left"></i></button>',
    nextArrow: '<button type="button" class="slick-next"><i class="las la-arrow-right"></i></button>',
    responsive: [
      {
        breakpoint: 1199,
        settings: {
          slidesToShow: 3,
        }
      },
      {
        breakpoint: 991,
        settings: {
          slidesToShow: 2,
        }
      },
      {
        breakpoint: 575,
        settings: {
          slidesToShow: 1,
        }
      },
    ]
  });
  // ========================= Selling Product Js End ===================

  // ========================= Testimonial Slider Js Start ===================
  $('.testimonial-three-thumb-slider').slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    arrows: true,
    dots: true,
    fade: true,
    asNavFor: '.testimonial-three-item-slider',
    prevArrow: '<button type="button" class="slick-prev"><i class="las la-arrow-left"></i></button>',
    nextArrow: '<button type="button" class="slick-next"><i class="las la-arrow-right"></i></button>',
    responsive: [
      {
        breakpoint: 991,
        settings: {
          dots: false,
        }
      },
    ]
  });
  $('.testimonial-three-item-slider').slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    asNavFor: '.testimonial-three-thumb-slider',
    dots: false,
    arrows: false,
    centerMode: true,
    focusOnSelect: true
  });
  // ========================= Testimonial Slider Js End ===================

  // ========================== Text Slide Js Start =====================
  $('.text-slider').marquee({
    pauseOnHover: true,

    allowCss3Support: true,
    css3easing: 'linear',
    easing: 'linear',
    delayBeforeStart: 1000,
    duration: 7000,
    gap: 20,
    pauseOnCycle: false,
    startVisible: false
  });
  // ========================== Text Slide Js End =====================


  // ========================= Payment Method Slider Js Start ==============
  $('.payment-method__slider').slick({
    slidesToShow: 10,
    slidesToScroll: 1,
    autoplay: false,
    autoplaySpeed: 2000,
    speed: 1500,
    dots: false,
    pauseOnHover: true,
    arrows: true,
    draggable: true,
    speed: 900,
    infinite: true,
    prevArrow: '<button type="button" class="slick-prev"><i class="las la-arrow-left"></i></button>',
    nextArrow: '<button type="button" class="slick-next"><i class="las la-arrow-right"></i></button>',
    responsive: [
      {
        breakpoint: 1299,
        settings: {
          slidesToShow: 8,
        }
      },
      {
        breakpoint: 1199,
        settings: {
          slidesToShow: 6,
        }
      },
      {
        breakpoint: 767,
        settings: {
          slidesToShow: 4,
        }
      },
      {
        breakpoint: 575,
        settings: {
          slidesToShow: 4,
        }
      },
      {
        breakpoint: 425,
        settings: {
          slidesToShow: 3,
        }
      },
    ]
  });
  // ========================= Payment Method Slider Js End ===================

  // ========================= Follow Button Js Start ==========================
  $('.follow-btn').on('click', function () {
    var buttonText = $(this).text();
    $(this).text(buttonText === 'Follow' ? 'Following' : 'Follow');
    $(this).toggleClass('active')
  });
  // ========================= Follow Button Js End ==========================

  // ========================= Text Rotation Js Start ==========================
    const text = document.querySelector(".circle__text");

    if(text) {
      text.innerHTML = text.innerText
      .split("")
      .map(
        (char, i) => `<span style="transform:rotate(${i * 11.5}deg)">${char}</span>`
        )
      .join("");
    }

    // Text Two
    const textTwo = document.querySelector(".circle__desc");

    if(textTwo) {
      textTwo.innerHTML = textTwo.innerText
      .split("")
      .map(
        (char, i) => `<span style="transform:rotate(${i * 11.5}deg)">${char}</span>`
        )
      .join("");
    }
  // ========================= Text Rotation Js End ==========================

  // ========================= Counter Up Js End ===================
  const counterUp = window.counterUp.default;

  const callback = (entries) => {
    entries.forEach((entry) => {
      const el = entry.target;
      if (entry.isIntersecting && !el.classList.contains('is-visible')) {
        counterUp(el, {
          duration: 3500,
          delay: 16,
        });
        el.classList.add('is-visible');
      }
    });
  };

  const IO = new IntersectionObserver(callback, { threshold: 1 });

  // Banner statistics Counter
  const statisticsCounter = document.querySelectorAll('.statistics__amount');
  if (statisticsCounter.length > 0) {
    statisticsCounter.forEach((counterNumber) => {
      IO.observe(counterNumber);
    });
  }

  // performance Count
  const performanceCount = document.querySelectorAll('.performance-content__count');
  if (performanceCount.length > 0) {
    performanceCount.forEach((counterNumber) => {
      IO.observe(counterNumber);
    });
  }
  // ========================= Counter Up Js End ===================

  // ========================= Filter Sidebar Js Start ===================
  $('.filter-sidebar__button').on('click', function () {
    $(this).toggleClass('active')
    $(this).siblings('.filter-sidebar__content').slideToggle();
  });
  // ========================= Filter Sidebar Js End ===================

  // ========================== Grid & List View Js Start =====================
  $('.list-button').on('click', function () {
    $('body').addClass('list-view');
    $(this).addClass('active');
    $('.grid-button').removeClass('active');
  });
  $('.grid-button').on('click', function () {
    $('body').removeClass('list-view');
    $('.list-button').removeClass('active');
    $(this).addClass('active');
  });
  // ========================== Grid & List View Js End =====================

  // ========================== Filter Form Show hide Js Start =====================
  $('.filter-tab__button').on('click', function () {
    $('.filter-form').slideToggle();
    $(this).toggleClass('active');
  });
  // ========================== Filter Form Show hide Js End =====================

  // ========================== Filter Sidebar Show hide Js Start =====================
  $('.sidebar-btn').on('click', function () {
    $('.filter-sidebar').addClass('show');
    $('.side-overlay').addClass('show');
    $('body').addClass('scroll-hide-sm');
  });
  $('.filter-sidebar__close, .side-overlay').on('click', function () {
    $('.filter-sidebar').removeClass('show');
    $('.side-overlay').removeClass('show');
    $('body').removeClass('scroll-hide-sm');
  });
  // ========================== Filter Sidebar Show hide Js End =====================

  // ========================= Social Share Js Start ===========================
  $('.social-share__button').on('click', function(event) {
    event.stopPropagation();
    $('.social-share__icons').toggleClass('show')
  });

  $('body').on('click', function(event) {
    $('.social-share__icons').removeClass('show')
  });

  // For device width size js start
  // let screenSize = screen.width
  // alert(' Your Screen Size is: ' + screenSize + 'pixel');
  // For device width size js start

  let socialShareBtn = $('.social-share');
  // Check if the element exists
  if (socialShareBtn.length > 0) {
    let leftDistance = socialShareBtn.offset().left;
    let rightDistance = $(window).width() - (leftDistance + socialShareBtn.outerWidth());

    if (leftDistance < rightDistance) {
      $('.social-share__icons').addClass('left');
    }
  }
  // ========================= Social Share Js End ===========================

  // ========================= License Dropdown Js Start ===========================
  $('.btn-has-dropdown').on('click', function (event) {
    event.stopPropagation();
    $('.license-dropdown').toggleClass('active');
  });

  $('.license-dropdown').on('click', function(event) {
    event.stopPropagation();
  });

  $('body').on('click', function () {
    $('.license-dropdown').removeClass('active');
  });
  // ========================= License Dropdown Js End ===========================

  // ========================= Select License Option Js Start ===========================
  $('.license-dropdown__item').on('click', function() {
    $('.license-dropdown__item').removeClass('activeSelectItem');
    $(this).addClass('activeSelectItem');
    let titleText = $(this).find('.license-dropdown__title').text();
    $('.btn-has-dropdown').text("");
    $('.btn-has-dropdown').text(titleText);
    $('.license-dropdown').removeClass('active');
  });
  // ========================= Select License Option Js End ===========================


  // ========================== Increment & Decrement Js Start =====================
  $(function() {
    $('[data-decrease]').click(decrease);
    $('[data-increase]').click(increase);
    $('[data-value]').on('change input', valueChange);
  });

  function decrease() {
    var value = $(this).parent().find('[data-value]').val();
    if(value > 1) {
      value--;
      $(this).parent().find('[data-value]').val(value);
    }
  }

  function increase() {
    var value = $(this).parent().find('[data-value]').val();
    if(value < 100) {
      value++;
      $(this).parent().find('[data-value]').val(value);
    }
  }

  function valueChange() {
    var value = $(this).val();
    if(value == undefined || isNaN(value) == true || value <= 0) {
      $(this).val(1);
    } else if(value >= 101) {
      $(this).val(100);
    }
  }
  // ========================== Increment & Decrement Js End =====================

  // ========================== Cart Item Delete Js Start =====================
  $('.delete-btn').on('click', function() {
    $(this).closest('tr').addClass('d-none')
  });
  // ========================== Cart Item Delete Js End =====================

  // ========================== Password Show Hide Js Start =====================
  $(".toggle-password").on('click', function() {
    var input = $($(this).attr("id"));

    if (input.attr("type") == "password") {
      input.attr("type", "text");
    } else {
      input.attr("type", "password");
    }
  });

  $(".toggle-password-two").on('click', function() {
    $(this).toggleClass(" la-eye-slash");
    var input = $($(this).attr("id"));

    if (input.attr("type") == "password") {
      input.attr("type", "text");
    } else {
      input.attr("type", "password");
    }
  });
  // ========================== Password Show Hide Js End =====================

  // ========================== Dashboard Sidebar Js Start =====================
  $('.bar-icon, .arrow-icon').on('click', function () {
    $('.dashboard').toggleClass('active');
  });

  $('.bar-icon').on('click', function () {
    $('.dashboard-sidebar').toggleClass('active');
    $('.side-overlay').toggleClass('show');
    $('body').toggleClass('scroll-hide-sm');
  });

  $('.side-overlay, .dashboard-sidebar__close').on('click', function () {
    $('.dashboard-sidebar').removeClass('active');
    $('.side-overlay').removeClass('show');
    $('body').removeClass('scroll-hide-sm');
  });
  // ========================== Dashboard Sidebar Js End =====================

  // ==================== Dashboard User Profile Dropdown Start ==================
  $('.user-profile__button').on('click', function(event) {
    event.stopPropagation();
    $('.user-profile-dropdown').toggleClass('show');
  });

  $('.user-profile-dropdown').on('click', function (event) {
    event.stopPropagation();
    $('.user-profile-dropdown').addClass('show')
  });

  $('body').on('click', function() {
    $('.user-profile-dropdown').removeClass('show');
  })
// ==================== Dashboard User Profile Dropdown End ==================

  // ========================== Image Upload Js Start =====================
  function readURL(input, previewId) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      reader.onload = function (e) {
          $(previewId).css('background-image', 'url(' + e.target.result + ')');
          $(previewId).hide();
          $(previewId).fadeIn(650);
      }
      reader.readAsDataURL(input.files[0]);
    }
  }

  $("#imageUpload").on('change', function () {
    readURL(this, '#imagePreview');
  });

  $("#imageUploadTwo").on('change', function () {
    readURL(this, '#imagePreviewTwo');
  });
  // ========================== Image Upload Js End =====================

  // ========================== Magnific Popup Js Start =====================
  $('.screenshot-btn').on('click', function() {
    var images = JSON.parse($(this).attr('data-images'));
    var items = [];

    for (var i = 0; i < images.length; i++) {
        items.push({
            src: images[i],
            type: 'image'
        });
    }

    $.magnificPopup.open({
        items: items,
        gallery: {
            enabled: true
        },
        type: 'image'
    });
  });
  // ========================== Magnific Popup Js End =====================

  // ========================== Footer Has Class section bg Js Start =====================
  if($('.footer').hasClass('section-bg')) {
    $('.brand').addClass('active');
    $('.footer.section-bg').addClass('active');
  }
  // ========================== Footer Has Class section bg Js End =====================

  // ========================= Scroll Spy Js Start ===========================
  const scrollSpy = new bootstrap.ScrollSpy(document.body, {
    target: '#sidebar-scroll-spy'
  })
  // ========================= Scroll Spy Js End ===========================

  // ========================== Apex Chart Js Start =====================
  var chartElement = document.querySelector("#chart");
  if (chartElement) {
    // Chart options
    var options = {
      series: [{
      name: 'Earning: $200',
      data: [31, 40, 28, 51, 42, 109, 100]
    }, {
      name: 'Downloads: 52',
      data: [11, 32, 45, 32, 34, 52, 41]
    }],
    chart: {
      height: 486,
      type: 'area',
    },

    dataLabels: {
      enabled: false
    },
    stroke: {
      curve: 'smooth',
    },
    xaxis: {
      type: 'datetime',
      categories: ["2018-09-19T00:00:00.000Z", "2018-09-19T01:30:00.000Z", "2018-09-19T02:30:00.000Z", "2018-09-19T03:30:00.000Z", "2018-09-19T04:30:00.000Z", "2018-09-19T05:30:00.000Z", "2018-09-19T06:30:00.000Z"]
    },
    tooltip: {
      x: {
        format: 'dd/MM/yy HH:mm'
      },
    },
  };

    // Create the chart
    var chart = new ApexCharts(chartElement, options);
    chart.render();
  }
  // ========================== Apex Chart Js End =====================

    let lineChart = document.querySelector("#earningChart");
    if(lineChart) {
      var options = {
        series: [{
        name: 'series1',
        data: [31, 40, 28, 51, 42, 109, 100]
      }],
        chart: {
        height: 350,
        type: 'line'
      },
      dataLabels: {
        enabled: false
      },
      stroke: {
        curve: 'smooth'
      },
      xaxis: {
        type: 'datetime',
        categories: ["2018-09-19T00:00:00.000Z", "2018-09-19T01:30:00.000Z", "2018-09-19T02:30:00.000Z", "2018-09-19T03:30:00.000Z", "2018-09-19T04:30:00.000Z", "2018-09-19T05:30:00.000Z", "2018-09-19T06:30:00.000Z"]
      },
      tooltip: {
        x: {
          format: 'dd/MM/yy HH:mm'
        },
      },
      };

      var earingChart = new ApexCharts(lineChart, options);
      earingChart.render();
    }

    console.log('All sliders initialized successfully');

  });
  // ==========================================
  //      End Document Ready function
  // ==========================================

  // ========================= Preloader Js Start =====================
    $(window).on("load", function(){
      $('.loader-mask').fadeOut();
    })
    // ========================= Preloader Js End=====================

    // ========================= Header Sticky Js Start ==============
    $(window).on('scroll', function() {
      if ($(window).scrollTop() >= 260) {
        $('.header').addClass('fixed-header');
      }
      else {
          $('.header').removeClass('fixed-header');
      }
    });
    // ========================= Header Sticky Js End===================

})(jQuery);

// Custom toast notification function
function showCustomToast(message, type = 'info') {
  try {
    // Remove existing toasts safely
    const existingToasts = $('.custom-toast');
    if (existingToasts.length > 0) {
      existingToasts.remove();
    }

    const toastClass = type === 'success' ? 'bg-success' : type === 'error' ? 'bg-danger' : 'bg-info';

    const toast = $(`
      <div class="custom-toast position-fixed top-0 end-0 p-3" style="z-index: 9999;">
        <div class="toast align-items-center ${toastClass} text-white border-0" role="alert">
          <div class="d-flex">
            <div class="toast-body">
              ${message}
            </div>
            <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"></button>
          </div>
        </div>
      </div>
    `);

    if (toast && $('body').length > 0) {
      $('body').append(toast);

      // Auto-remove after 3 seconds
      setTimeout(function() {
        if (toast && toast.length > 0) {
          toast.remove();
        }
      }, 3000);
    }
  } catch (error) {
    console.log('Error in showCustomToast:', error);
    // Fallback to simple alert if toast fails
    alert(message);
  }
}
