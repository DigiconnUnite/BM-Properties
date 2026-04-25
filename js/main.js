/**
 * RetinaLogo
 * Contact Form
 * Header Fixed
 * alert box
 */

(function ($) {
  "use strict";

  var themesflatTheme = {
    // Main init function
    init: function () {
      this.config();
      this.events();
    },

    // Define vars for caching
    config: function () {
      this.config = {
        $window: $(window),
        $document: $(document),
      };
    },

    // Events
    events: function () {
      var self = this;

      // Run on document ready
      self.config.$document.on("ready", function () {
        // Retina Logos
        self.retinaLogo();
      });

      // Run on Window Load
      self.config.$window.on("load", function () {});
    },
  }; // end themesflatTheme

  // Start things up
  themesflatTheme.init();

  /* RetinaLogo
  ------------------------------------------------------------------------------------- */
  var retinaLogos = function () {
    var retina = window.devicePixelRatio > 1 ? true : false;
    if (retina) {
      $("#site-logo-inner").find("img").attr({
        src: "assets/images/logo/logo@2x.png",
        width: "197",
        height: "48",
      });

      $("#logo-footer.style").find("img").attr({
        src: "assets/images/logo/logo-footer@2x.png",
        width: "197",
        height: "48",
      });
      $("#logo-footer.style2").find("img").attr({
        src: "assets/images/logo/logo@2x.png",
        width: "197",
        height: "48",
      });
    }
  };

  /* Contact Form
  ------------------------------------------------------------------------------------- */
  var bindAjaxForm = function (selector) {
    $(selector).each(function () {
      var $form = $(this);
      if ($form.data("ajax-bound")) return;
      $form.data("ajax-bound", true);

      var $submit = $form.find('button[type="submit"], input[type="submit"]').first();
      var submitText = $submit.data("submit-text") || $submit.text() || "Send Message";
      var sendingText = $submit.data("sending-text") || "Sending...";

      var showAlert = function (ok, message) {
        var cls = ok ? "alert-success" : "alert-danger";
        var $alert = $(
          '<div class="alert ' +
            cls +
            ' ajax-form-alert" role="alert" style="margin-top:12px;"></div>',
        ).text(message || (ok ? "Sent successfully." : "Something went wrong."));

        $form.find(".ajax-form-alert").remove();
        $form.prepend($alert);

        setTimeout(function () {
          $alert.fadeOut(200, function () {
            $(this).remove();
          });
        }, 5000);
      };

      $form.on("submit", function (e) {
        e.preventDefault();

        if ($submit.prop("disabled")) return;
        $submit.prop("disabled", true);
        if ($submit.is("button")) $submit.text(sendingText);
        if ($submit.is("input")) $submit.val(sendingText);

        $.ajax({
          type: "POST",
          url: $form.attr("action") || window.location.href,
          data: $form.serialize(),
          dataType: "json",
          success: function (res) {
            var ok = !!(res && res.ok);
            var msg = res && res.message ? res.message : "";
            showAlert(ok, msg);
            if (ok) {
              $form.find(":input")
                .not('[type="hidden"], button, input[type="submit"]')
                .val("");
            }
          },
          error: function () {
            showAlert(false, "Error sending message. Please try again.");
          },
          complete: function () {
            $submit.prop("disabled", false);
            if ($submit.is("button")) $submit.text(submitText);
            if ($submit.is("input")) $submit.val(submitText);
          },
        });
      });
    });
  };

  var ajaxContactForm = function () {
    bindAjaxForm("#contactform-main");
  };
  /* Header Fixed
  ------------------------------------------------------------------------------------- */
  var headerFixed = function () {
    if ($("header").hasClass("header-fixed")) {
      var nav = $("#header");
      if (nav.length) {
        var offsetTop = nav.offset().top,
          headerHeight = nav.height(),
          injectSpace = $("<div>", {
            height: headerHeight,
          });
        injectSpace.hide();

        $(window).on("load scroll", function () {
          if ($(window).scrollTop() > 0) {
            nav.addClass("is-fixed");
            injectSpace.show();
            $("#trans-logo").attr("src", "images/logo/logo@2x.png");
          } else {
            nav.removeClass("is-fixed");
            injectSpace.hide();
            $("#trans-logo").attr("src", "images/logo/logo@2x-white.png");
          }
        });
      }
    }
  };

  $("#showlogo").prepend(
    '<a href="index.html"><img id="theImg" src="assets/images/logo/logo2.png" /></a>',
  );

  // =========NICE SELECT=========
  $(".select_js").niceSelect();

  new WOW().init();

  //Submenu Dropdown Toggle
  if ($(".main-header li.dropdown2 ul").length) {
    $(".main-header li.dropdown2").append('<div class="dropdown2-btn"></div>');

    //Dropdown Button
    $(".main-header li.dropdown2 .dropdown2-btn").on("click", function () {
      $(this).prev("ul").slideToggle(500);
    });

    //Disable dropdown parent link
    $(".navigation li.dropdown2 > a").on("click", function (e) {
      e.preventDefault();
    });

    //Disable dropdown parent link
    $(
      ".main-header .navigation li.dropdown2 > a,.hidden-bar .side-menu li.dropdown2 > a",
    ).on("click", function (e) {
      e.preventDefault();
    });

    $(".price-block .features .arrow").on("click", function (e) {
      $(e.target.offsetParent.offsetParent.offsetParent).toggleClass(
        "active-show-hidden",
      );
    });
  }

  // Mobile Nav Hide Show
  if ($(".mobile-menu").length) {
    //$('.mobile-menu .menu-box').mCustomScrollbar();

    var mobileMenuContent = $(".main-header .nav-outer .main-menu").html();
    $(".mobile-menu .menu-box .menu-outer").append(mobileMenuContent);
    $(".sticky-header .main-menu").append(mobileMenuContent);

    //Hide / Show Submenu
    $(".mobile-menu .navigation > li.dropdown2 > .dropdown2-btn").on(
      "click",
      function (e) {
        e.preventDefault();
        var target = $(this).parent("li").children("ul");
        var args = { duration: 300 };
        if ($(target).is(":visible")) {
          $(this).parent("li").removeClass("open");
          $(target).slideUp(args);
          $(this)
            .parents(".navigation")
            .children("li.dropdown2")
            .removeClass("open");
          $(this)
            .parents(".navigation")
            .children("li.dropdown2 > ul")
            .slideUp(args);
          return false;
        } else {
          $(this)
            .parents(".navigation")
            .children("li.dropdown2")
            .removeClass("open");
          $(this)
            .parents(".navigation")
            .children("li.dropdown2")
            .children("ul")
            .slideUp(args);
          $(this).parent("li").toggleClass("open");
          $(this).parent("li").children("ul").slideToggle(args);
        }
      },
    );

    //3rd Level Nav
    $(
      ".mobile-menu .navigation > li.dropdown2 > ul  > li.dropdown2 > .dropdown2-btn",
    ).on("click", function (e) {
      e.preventDefault();
      var targetInner = $(this).parent("li").children("ul");

      if ($(targetInner).is(":visible")) {
        $(this).parent("li").removeClass("open");
        $(targetInner).slideUp(500);
        $(this)
          .parents(".navigation > ul")
          .find("li.dropdown2")
          .removeClass("open");
        $(this)
          .parents(".navigation > ul")
          .find("li.dropdown > ul")
          .slideUp(500);
        return false;
      } else {
        $(this)
          .parents(".navigation > ul")
          .find("li.dropdown2")
          .removeClass("open");
        $(this)
          .parents(".navigation > ul")
          .find("li.dropdown2 > ul")
          .slideUp(500);
        $(this).parent("li").toggleClass("open");
        $(this).parent("li").children("ul").slideToggle(500);
      }
    });

    //Menu Toggle Btn
    $(".mobile-nav-toggler").on("click", function () {
      $("body").addClass("mobile-menu-visible");
    });

    //Menu Toggle Btn
    $(".mobile-menu .menu-backdrop, .close-btn").on("click", function () {
      $("body").removeClass("mobile-menu-visible");
      $(".mobile-menu .navigation > li").removeClass("open");
      $(".mobile-menu .navigation li ul").slideUp(0);
    });

    $(document).keydown(function (e) {
      if (e.keyCode === 27) {
        $("body").removeClass("mobile-menu-visible");
        $(".mobile-menu .navigation > li").removeClass("open");
        $(".mobile-menu .navigation li ul").slideUp(0);
      }
    });
  }

  var ajaxSubscribe = {
    obj: {
      subscribeEmail: $("#subscribe-email"),
      subscribeButton: $("#subscribe-button"),
      subscribeMsg: $("#subscribe-msg"),
      subscribeContent: $("#subscribe-content"),
      dataMailchimp: $("#subscribe-form").attr("data-mailchimp"),
      success_message:
        '<div class="notification_ok">Thank you for joining our mailing list! Please check your email for a confirmation link.</div>',
      failure_message:
        '<div class="notification_error">Error! <strong>There was a problem processing your submission.</strong></div>',
      noticeError: '<div class="notification_error">{msg}</div>',
      noticeInfo: '<div class="notification_error">{msg}</div>',
      basicAction: "mail/subscribe.php",
      mailChimpAction: "mail/subscribe-mailchimp.php",
    },

    eventLoad: function () {
      var objUse = ajaxSubscribe.obj;

      $(objUse.subscribeButton).on("click", function () {
        if (window.ajaxCalling) return;
        var isMailchimp = objUse.dataMailchimp === "true";

        if (isMailchimp) {
          ajaxSubscribe.ajaxCall(objUse.mailChimpAction);
        } else {
          ajaxSubscribe.ajaxCall(objUse.basicAction);
        }
      });
    },

    ajaxCall: function (action) {
      window.ajaxCalling = true;
      var objUse = ajaxSubscribe.obj;
      var messageDiv = objUse.subscribeMsg.html("").hide();
      $.ajax({
        url: action,
        type: "POST",
        dataType: "json",
        data: {
          subscribeEmail: objUse.subscribeEmail.val(),
        },
        success: function (responseData, textStatus, jqXHR) {
          if (responseData.status) {
            objUse.subscribeContent.fadeOut(500, function () {
              messageDiv.html(objUse.success_message).fadeIn(500);
            });
          } else {
            switch (responseData.msg) {
              case "email-required":
                messageDiv.html(
                  objUse.noticeError.replace(
                    "{msg}",
                    "Error! <strong>Email is required.</strong>",
                  ),
                );
                break;
              case "email-err":
                messageDiv.html(
                  objUse.noticeError.replace(
                    "{msg}",
                    "Error! <strong>Email invalid.</strong>",
                  ),
                );
                break;
              case "duplicate":
                messageDiv.html(
                  objUse.noticeError.replace(
                    "{msg}",
                    "Error! <strong>Email is duplicate.</strong>",
                  ),
                );
                break;
              case "filewrite":
                messageDiv.html(
                  objUse.noticeInfo.replace(
                    "{msg}",
                    "Error! <strong>Mail list file is open.</strong>",
                  ),
                );
                break;
              case "undefined":
                messageDiv.html(
                  objUse.noticeInfo.replace(
                    "{msg}",
                    "Error! <strong>undefined error.</strong>",
                  ),
                );
                break;
              case "api-error":
                objUse.subscribeContent.fadeOut(500, function () {
                  messageDiv.html(objUse.failure_message);
                });
            }
            messageDiv.fadeIn(500);
          }
        },
        error: function (jqXHR, textStatus, errorThrown) {
          alert("Connection error");
        },
        complete: function (data) {
          window.ajaxCalling = false;
        },
      });
    },
  };

  /* alert box
  ------------------------------------------------------------------------------------- */
  var alertBox = function () {
    $(document).on("click", ".close", function (e) {
      $(this).closest(".flat-alert").remove();
      e.preventDefault();
    });
  };

  /* footer accordion
  -------------------------------------------------------------------------*/
  var handleFooter = function () {
    var footerAccordion = function () {
      var args = { duration: 250 };
      $(".footer-heading-mobile").on("click", function () {
        $(this).parent(".footer-col-block").toggleClass("open");
        if (!$(this).parent(".footer-col-block").is(".open")) {
          $(this).next().slideUp(args);
        } else {
          $(this).next().slideDown(args);
        }
      });
    };
    function handleAccordion() {
      if (matchMedia("only screen and (max-width: 767px)").matches) {
        if (!$(".footer-heading-mobile").data("accordion-initialized")) {
          footerAccordion();
          $(".footer-heading-mobile").data("accordion-initialized", true);
        }
      } else {
        $(".footer-heading-mobile").off("click");
        $(".footer-heading-mobile")
          .parent(".footer-col-block")
          .removeClass("open");
        $(".footer-heading-mobile").next().removeAttr("style");
        $(".footer-heading-mobile").data("accordion-initialized", false);
      }
    }
    handleAccordion();
    window.addEventListener("resize", function () {
      handleAccordion();
    });
  };

  var configureFancybox = function () {
    if (!$.fancybox || !$.fancybox.defaults) {
      return;
    }

    $.extend($.fancybox.defaults, {
      buttons: ["close"],
      smallBtn: true,
      clickContent: "close",
      clickSlide: "close",
      clickOutside: "close",
    });
  };

  var enquiryModal = function () {
    var $modal = $("#enquiryModal");
    if (!$modal.length) {
      return;
    }

    var openModal = function () {
      $modal.addClass("is-visible").attr("aria-hidden", "false");
      $("body").addClass("enquiry-open");
    };

    var closeModal = function () {
      $modal.removeClass("is-visible").attr("aria-hidden", "true");
      $("body").removeClass("enquiry-open");
    };

    $(document).on("click", "[data-enquiry-open]", function () {
      openModal();
    });

    $(document).on("click", "[data-enquiry-close]", function () {
      closeModal();
    });

    $(document).on("keydown", function (e) {
      if (e.key === "Escape") {
        closeModal();
      }
    });
  };

  var globalNoticePopup = function () {
    var $notice = $(".global-popup-notice");
    if (!$notice.length) {
      return;
    }

    setTimeout(function () {
      $notice.addClass("is-visible");
    }, 120);

    setTimeout(function () {
      $notice.removeClass("is-visible");
    }, 4500);
  };

  // Dom Ready
  $(function () {
    $(window).on("load resize", function () {
      retinaLogos();
    });
    headerFixed();
    ajaxContactForm();
    bindAjaxForm("#enquiryModal form.enquiry-form-grid");
    ajaxSubscribe.eventLoad();
    alertBox();
    configureFancybox();
    enquiryModal();
    globalNoticePopup();
  });
})(jQuery);
