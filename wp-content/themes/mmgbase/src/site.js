// eslint-disable-next-line no-unused-vars
import gdpr from "./gdpr.js";

(function ($, Drupal) {
  $.fn.extend({
    toggleText: function(a, b){
        return this.text(this.text() == b ? a : b);
    }
  });

  $(document).ready(function() {
    const agentAdd = document.documentElement;
    agentAdd.setAttribute("data-useragent", navigator.userAgent);
    agentAdd.setAttribute("data-platform", navigator.platform);
    // apple's hack
    document.addEventListener("touchstart", function() {}, false);

    $('#mobile-toggle').on('click', function(ev){
      ev.stopPropagation();
      $(this).toggleClass('open').find('span').toggleText('menu', 'close');
      $('header#header').toggleClass('open');
    });

    $('.trigger','#main-menu').click(function(ev){
      ev.stopPropagation();
      $(this).closest('.menu-item--expanded').toggleClass('show-submenu');
      $(this).closest('.main.menu').toggleClass('has-submenu');
    });
    $('.trigger', '#main-menu').keypress(function(ev){
      if(ev.keyCode === 13 || ev.keyCode === 32) {
        $(this).trigger('click');
      }
    });

    if (localStorage.getItem('hideAnnouncement')) {
      $('#announcement-message').remove();
    }
    else {
      $('#announcement-message-close').on('click', function(){
        localStorage.setItem('hideAnnouncement', true);
        $('#announcement-message').remove();
      });
    }

    $('.paragraph.list-item').each(function(){
      var $this = $(this),
      $button = $this.find('header button');
      $button.on('click', function(e) {
        e.preventDefault();
        $(this).toggleClass('open').parent().next().toggleClass('open');
      });
    });

    $('main table').wrap('<span class="table">');

  }); // document ready
  $(document).ajaxSuccess(function(){});
// eslint-disable-next-line no-undef

// Drupal.behaviors.collierEdo = {
//   attach: function(context, settings) {
//     // moved the menu toggles to docready because it doesn't work when logged in inside this behavior
//   },
// };

  Drupal.behaviors.collierFacets = {
    attach: function (context, settings) {
      "use strict";

      $('.facets-widget-checkbox button').once().on('click', function () {
        var $this = $(this);
        // $others = $('.facets-widget-checkbox button').not($this);
        $this.parent().toggleClass('open');
        // $others.parent().removeClass('open')
      });

      $(document)
        .once()
        .on("keypress", function(e) {
          if (
            e.target.classList.contains("facets-checkbox") &&
            e.keyCode === 13
          ) {
            document.getElementById(e.target.id).click();
          }
      });

      $('.view-property-profiles .view-content aside.filter-bar').once().append('<a href="' + drupalSettings.path.baseUrl +  drupalSettings.path.currentPath + '" class="button reset">Reset</a>');
    }
  };

  Drupal.behaviors.dropdownUI = {
    attach: function(context, settings) {
      $('.facets-widget-checkbox',context).each(function(){
        $dropdown = $(this);
        if($dropdown.find('.facet-item input[type=checkbox]:checked').length > 0) {
          $dropdown.addClass('open');
        }
      });
    }
  }

})(jQuery, Drupal);
