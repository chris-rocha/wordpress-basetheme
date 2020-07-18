import $ from "jquery";
$(window).ready(function() {
  window.cookieconsent.initialise({
    "palette": {
      "popup": {
        "background": "#4b4b4b",
        "text": "#ffffff"
      },
    },
    "content": {
      "message": "We serve cookies to analyze traffic and customize content on this site.<br><a href='/privacy-policy' class='cc-link'>Privacy Policy</a> | ",
      "dismiss": "Got It!",
      "link": "GDPR FAQs",
      "href": "/gdpr-faq"
    },
    "elements": {
      "dismiss": '<button aria-label="dismiss cookie message" tabindex="0" class="cc-btn cc-dismiss button full-width">{{dismiss}}</button>',
    },
    "position": "bottom-right",
    // "law": {
    //   "regionalLaw": false,
    //   "countryCode": countryCode
    // }
  });
});
