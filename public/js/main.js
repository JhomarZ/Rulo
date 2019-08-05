var keyTypeView="typeViewProducts";
// offcanvas menu
$(function () {
	'use strict'
	$('[data-toggle="offcanvas"]').on('click', function () {
	  $('.offcanvas-collapse').toggleClass('open')
	})
})

// Image picker

$(document).ready(function() {


    var readURL = function(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('.profile-pic').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }


    $(".file-upload").on('change', function(){
        readURL(this);
    });

    $(".upload-button").on('click', function() {
       $(".file-upload").click();
    });

});

$("#editarAnuncio").slideReveal({
  trigger: $(".editContent"),
  push: false,
  overlay: true,
  position: "right",
  width: '60%'
});

$(window).resize(function() {
    $("#editarAnuncio").slideReveal({
      trigger: $(".editContent"),
      push: false,
      overlay: true,
      position: "right",
      width: '60%'
    });
});
// slider

$(document).ready(function() {

  $('.dataSlideinfo span').text( $("#totalSlides div").length );
});

$(document).on('ready', function() {
   $('.slider-for').slick({
      slidesToShow: 1,
      slidesToScroll: 1,
      arrows: false,
      fade: true,
      asNavFor: '.slider-nav'
    });

    $('.slider-nav').slick({
      slidesToShow: 3,
      slidesToScroll: 1,
      asNavFor: '.slider-for',
      dots: false,
      centerMode: true,
      focusOnSelect: true,
      prevArrow: '<svg version="1.1"  xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="60px" height="38.66px" style="margin: 0px 10px;" viewBox="0 0 14.769 38.66" enable-background="new 0 0 14.769 38.66" xml:space="preserve"><rect x="-54.982" y="136.746" fill="#9BCA64" width="107.188" height="107.188"/><path fill="#FFFFFF" d="M2.801,219.168c-3.288,0-5.963-2.674-5.963-5.963c0-3.287,2.675-5.961,5.963-5.961c3.286,0,5.959,2.674,5.959,5.961C8.76,216.495,6.087,219.168,2.801,219.168z M-23.357,219.168c-3.286,0-5.961-2.674-5.961-5.963c0-3.287,2.675-5.961,5.961-5.961c3.287,0,5.962,2.674,5.962,5.961C-17.395,216.495-20.07,219.168-23.357,219.168z M9.71,203.29h-38.467l-9.264-17.704h5.858l6.141,11.733l0.205,0.391l0.203,0.389h0.438h0.439H4.722h0.545h0.545l0.152-0.523l0.152-0.523l8.97-30.878h22.935v5.191H20.075H19.53h-0.544l-0.153,0.522l-0.151,0.523L9.71,203.29z M-20.498,190.98c-3.287,0-5.962-2.674-5.962-5.961c0-3.288,2.675-5.962,5.962-5.962c3.286,0,5.961,2.674,5.961,5.962C-14.537,188.306-17.211,190.98-20.498,190.98z M-0.652,190.405c-3.286,0-5.961-2.674-5.961-5.961c0-3.288,2.675-5.962,5.961-5.962c3.287,0,5.963,2.674,5.963,5.962C5.311,187.731,2.635,190.405-0.652,190.405z M-10.43,173.435c-3.288,0-5.962-2.674-5.962-5.961c0-3.287,2.674-5.961,5.962-5.961c3.287,0,5.96,2.674,5.96,5.961C-4.47,170.761-7.143,173.435-10.43,173.435z"/><polygon fill="#4C82AD" points="0,19.33 11.477,0 14.769,1.954 4.775,18.783 4.613,19.058 4.454,19.33 4.614,19.602 4.775,19.875 14.769,36.707 11.477,38.66 "/></svg>',
      nextArrow: '<svg version="1.1"  xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="60" height="38.66px" style="margin: 0px 10px;" viewBox="0 0 14.769 38.66" enable-background="new 0 0 14.769 38.66" xml:space="preserve"> <rect x="-54.982" y="136.746" fill="#9BCA64" width="107.188" height="107.188"/> <path fill="#FFFFFF" d="M2.801,219.168c-3.288,0-5.963-2.674-5.963-5.963c0-3.287,2.675-5.961,5.963-5.961 c3.286,0,5.959,2.674,5.959,5.961C8.76,216.495,6.087,219.168,2.801,219.168z M-23.357,219.168c-3.286,0-5.961-2.674-5.961-5.963 c0-3.287,2.675-5.961,5.961-5.961c3.287,0,5.962,2.674,5.962,5.961C-17.395,216.495-20.07,219.168-23.357,219.168z M9.71,203.29 h-38.467l-9.264-17.704h5.858l6.141,11.733l0.205,0.391l0.203,0.389h0.438h0.439H4.722h0.545h0.545l0.152-0.523l0.152-0.523 l8.97-30.878h22.935v5.191H20.075H19.53h-0.544l-0.153,0.522l-0.151,0.523L9.71,203.29z M-20.498,190.98 c-3.287,0-5.962-2.674-5.962-5.961c0-3.288,2.675-5.962,5.962-5.962c3.286,0,5.961,2.674,5.961,5.962 C-14.537,188.306-17.211,190.98-20.498,190.98z M-0.652,190.405c-3.286,0-5.961-2.674-5.961-5.961c0-3.288,2.675-5.962,5.961-5.962 c3.287,0,5.963,2.674,5.963,5.962C5.311,187.731,2.635,190.405-0.652,190.405z M-10.43,173.435c-3.288,0-5.962-2.674-5.962-5.961 c0-3.287,2.674-5.961,5.962-5.961c3.287,0,5.96,2.674,5.96,5.961C-4.47,170.761-7.143,173.435-10.43,173.435z"/> <polygon fill="#4C82AD" points="14.769,19.33 3.292,38.66 0,36.706 9.995,19.876 10.157,19.601 10.316,19.33 10.156,19.057 9.995,18.785 0,1.953 3.292,0 "/></svg>',
    });

    $('.lazy').slick({
      // lazyLoad: 'ondemand', // ondemand progressive anticipated
      infinite: true,
      focusOnSelect: true,
      arrows: true,
      slidesToShow: 1,
      slidesToScroll: 1,
      centerMode: true,
      dots: false,
      prevArrow: '<svg version="1.1" class="arr-slide prev" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="20px" height="20px" style="margin: 0px 10px; z-index: 5;" viewBox="0 0 14.769 38.66" enable-background="new 0 0 14.769 38.66" xml:space="preserve"><rect x="-54.982" y="136.746" fill="#fff" width="20px" style="z-index:3;" height="20px"/><path fill="#FFFFFF" d="M2.801,219.168c-3.288,0-5.963-2.674-5.963-5.963c0-3.287,2.675-5.961,5.963-5.961c3.286,0,5.959,2.674,5.959,5.961C8.76,216.495,6.087,219.168,2.801,219.168z M-23.357,219.168c-3.286,0-5.961-2.674-5.961-5.963c0-3.287,2.675-5.961,5.961-5.961c3.287,0,5.962,2.674,5.962,5.961C-17.395,216.495-20.07,219.168-23.357,219.168z M9.71,203.29h-38.467l-9.264-17.704h5.858l6.141,11.733l0.205,0.391l0.203,0.389h0.438h0.439H4.722h0.545h0.545l0.152-0.523l0.152-0.523l8.97-30.878h22.935v5.191H20.075H19.53h-0.544l-0.153,0.522l-0.151,0.523L9.71,203.29z M-20.498,190.98c-3.287,0-5.962-2.674-5.962-5.961c0-3.288,2.675-5.962,5.962-5.962c3.286,0,5.961,2.674,5.961,5.962C-14.537,188.306-17.211,190.98-20.498,190.98z M-0.652,190.405c-3.286,0-5.961-2.674-5.961-5.961c0-3.288,2.675-5.962,5.961-5.962c3.287,0,5.963,2.674,5.963,5.962C5.311,187.731,2.635,190.405-0.652,190.405z M-10.43,173.435c-3.288,0-5.962-2.674-5.962-5.961c0-3.287,2.674-5.961,5.962-5.961c3.287,0,5.96,2.674,5.96,5.961C-4.47,170.761-7.143,173.435-10.43,173.435z"/><polygon fill="#fff" points="0,19.33 11.477,0 14.769,1.954 4.775,18.783 4.613,19.058 4.454,19.33 4.614,19.602 4.775,19.875 14.769,36.707 11.477,38.66 "/></svg>',
      nextArrow: '<svg version="1.1" class="arr-slide next" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="20px" height="20px" style="margin: 0px 10px; z-index: 5;" viewBox="0 0 14.769 38.66" enable-background="new 0 0 14.769 38.66" xml:space="preserve"> <rect x="-54.982" y="136.746" fill="#fff" width="20px" style="z-index:3;" height="20px"/> <path fill="#FFFFFF" d="M2.801,219.168c-3.288,0-5.963-2.674-5.963-5.963c0-3.287,2.675-5.961,5.963-5.961 c3.286,0,5.959,2.674,5.959,5.961C8.76,216.495,6.087,219.168,2.801,219.168z M-23.357,219.168c-3.286,0-5.961-2.674-5.961-5.963 c0-3.287,2.675-5.961,5.961-5.961c3.287,0,5.962,2.674,5.962,5.961C-17.395,216.495-20.07,219.168-23.357,219.168z M9.71,203.29 h-38.467l-9.264-17.704h5.858l6.141,11.733l0.205,0.391l0.203,0.389h0.438h0.439H4.722h0.545h0.545l0.152-0.523l0.152-0.523 l8.97-30.878h22.935v5.191H20.075H19.53h-0.544l-0.153,0.522l-0.151,0.523L9.71,203.29z M-20.498,190.98 c-3.287,0-5.962-2.674-5.962-5.961c0-3.288,2.675-5.962,5.962-5.962c3.286,0,5.961,2.674,5.961,5.962 C-14.537,188.306-17.211,190.98-20.498,190.98z M-0.652,190.405c-3.286,0-5.961-2.674-5.961-5.961c0-3.288,2.675-5.962,5.961-5.962 c3.287,0,5.963,2.674,5.963,5.962C5.311,187.731,2.635,190.405-0.652,190.405z M-10.43,173.435c-3.288,0-5.962-2.674-5.962-5.961 c0-3.287,2.674-5.961,5.962-5.961c3.287,0,5.96,2.674,5.96,5.961C-4.47,170.761-7.143,173.435-10.43,173.435z"/> <polygon fill="#fff" points="14.769,19.33 3.292,38.66 0,36.706 9.995,19.876 10.157,19.601 10.316,19.33 10.156,19.057 9.995,18.785 0,1.953 3.292,0 "/></svg>',

    });

    $(".regular").slick({
      focusOnSelect: true,
      infinite: true,
      arrows: true,
      slidesToShow: 3,
      slidesToScroll: 3,
      centerMode: true,
      prevArrow: '<svg version="1.1"  xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="60px" height="38.66px" style="margin: 0px 10px;" viewBox="0 0 14.769 38.66" enable-background="new 0 0 14.769 38.66" xml:space="preserve"><rect x="-54.982" y="136.746" fill="#9BCA64" width="107.188" height="107.188"/><path fill="#FFFFFF" d="M2.801,219.168c-3.288,0-5.963-2.674-5.963-5.963c0-3.287,2.675-5.961,5.963-5.961c3.286,0,5.959,2.674,5.959,5.961C8.76,216.495,6.087,219.168,2.801,219.168z M-23.357,219.168c-3.286,0-5.961-2.674-5.961-5.963c0-3.287,2.675-5.961,5.961-5.961c3.287,0,5.962,2.674,5.962,5.961C-17.395,216.495-20.07,219.168-23.357,219.168z M9.71,203.29h-38.467l-9.264-17.704h5.858l6.141,11.733l0.205,0.391l0.203,0.389h0.438h0.439H4.722h0.545h0.545l0.152-0.523l0.152-0.523l8.97-30.878h22.935v5.191H20.075H19.53h-0.544l-0.153,0.522l-0.151,0.523L9.71,203.29z M-20.498,190.98c-3.287,0-5.962-2.674-5.962-5.961c0-3.288,2.675-5.962,5.962-5.962c3.286,0,5.961,2.674,5.961,5.962C-14.537,188.306-17.211,190.98-20.498,190.98z M-0.652,190.405c-3.286,0-5.961-2.674-5.961-5.961c0-3.288,2.675-5.962,5.961-5.962c3.287,0,5.963,2.674,5.963,5.962C5.311,187.731,2.635,190.405-0.652,190.405z M-10.43,173.435c-3.288,0-5.962-2.674-5.962-5.961c0-3.287,2.674-5.961,5.962-5.961c3.287,0,5.96,2.674,5.96,5.961C-4.47,170.761-7.143,173.435-10.43,173.435z"/><polygon fill="#4C82AD" points="0,19.33 11.477,0 14.769,1.954 4.775,18.783 4.613,19.058 4.454,19.33 4.614,19.602 4.775,19.875 14.769,36.707 11.477,38.66 "/></svg>',
      nextArrow: '<svg version="1.1"  xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="60" height="38.66px" style="margin: 0px 10px;" viewBox="0 0 14.769 38.66" enable-background="new 0 0 14.769 38.66" xml:space="preserve"> <rect x="-54.982" y="136.746" fill="#9BCA64" width="107.188" height="107.188"/> <path fill="#FFFFFF" d="M2.801,219.168c-3.288,0-5.963-2.674-5.963-5.963c0-3.287,2.675-5.961,5.963-5.961 c3.286,0,5.959,2.674,5.959,5.961C8.76,216.495,6.087,219.168,2.801,219.168z M-23.357,219.168c-3.286,0-5.961-2.674-5.961-5.963 c0-3.287,2.675-5.961,5.961-5.961c3.287,0,5.962,2.674,5.962,5.961C-17.395,216.495-20.07,219.168-23.357,219.168z M9.71,203.29 h-38.467l-9.264-17.704h5.858l6.141,11.733l0.205,0.391l0.203,0.389h0.438h0.439H4.722h0.545h0.545l0.152-0.523l0.152-0.523 l8.97-30.878h22.935v5.191H20.075H19.53h-0.544l-0.153,0.522l-0.151,0.523L9.71,203.29z M-20.498,190.98 c-3.287,0-5.962-2.674-5.962-5.961c0-3.288,2.675-5.962,5.962-5.962c3.286,0,5.961,2.674,5.961,5.962 C-14.537,188.306-17.211,190.98-20.498,190.98z M-0.652,190.405c-3.286,0-5.961-2.674-5.961-5.961c0-3.288,2.675-5.962,5.961-5.962 c3.287,0,5.963,2.674,5.963,5.962C5.311,187.731,2.635,190.405-0.652,190.405z M-10.43,173.435c-3.288,0-5.962-2.674-5.962-5.961 c0-3.287,2.674-5.961,5.962-5.961c3.287,0,5.96,2.674,5.96,5.961C-4.47,170.761-7.143,173.435-10.43,173.435z"/> <polygon fill="#4C82AD" points="14.769,19.33 3.292,38.66 0,36.706 9.995,19.876 10.157,19.601 10.316,19.33 10.156,19.057 9.995,18.785 0,1.953 3.292,0 "/></svg>',
      responsive: [
        {
          breakpoint: 1024,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 2,
            infinite: true,
          }
        },
        {
          breakpoint: 600,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 2,
            infinite: true
          }
        },
        {
          breakpoint: 480,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1,
            infinite: true
          }
        }
      ]

    });

});


// Galería
$(document).ready(function(){
  $('.venobox').venobox({
    infinigall: true
    // arrowKeeys: true
  });
});

$('#loadGallery').on('click', function() {
   $('#firstlink').trigger('click');
});

$(function () {
  $('[data-toggle="tooltip"]').tooltip()
})

// CHAT

$(".messages").animate({ scrollTop: $(document).height() }, "fast");

$("#profile-img").click(function() {
  $("#status-options").toggleClass("active");
});

$(".expand-button").click(function() {
  $("#profile").toggleClass("expanded");
  $("#contacts").toggleClass("expanded");
});

$("#status-options ul li").click(function() {
  $("#profile-img").removeClass();
  $("#status-online").removeClass("active");
  $("#status-away").removeClass("active");
  $("#status-busy").removeClass("active");
  $("#status-offline").removeClass("active");
  $(this).addClass("active");

  if($("#status-online").hasClass("active")) {
    $("#profile-img").addClass("online");
  } else if ($("#status-away").hasClass("active")) {
    $("#profile-img").addClass("away");
  } else if ($("#status-busy").hasClass("active")) {
    $("#profile-img").addClass("busy");
  } else if ($("#status-offline").hasClass("active")) {
    $("#profile-img").addClass("offline");
  } else {
    $("#profile-img").removeClass();
  };

  $("#status-options").removeClass("active");
});

function newMessage() {
  message = $(".message-input input").val();
  if($.trim(message) == '') {
    return false;
  }
  $('<li class="replies"><p>' + message + '</p></li>').appendTo($('.messages ul'));
  $('.message-input input').val(null);
  $('.contact.active .preview').html('<span>You: </span>' + message);
  $(".messages").animate({ scrollTop: $(document).height() }, "fast");
};

$('.submit').click(function() {
  newMessage();
});

$(window).on('keydown', function(e) {
  if (e.which == 13) {
    newMessage();
    return false;
  }
});


// js pagination

function getPageList(totalPages, page, maxLength) {
  if (maxLength < 5) throw "maxLength must be at least 5";

  function range(start, end) {
    return Array.from(Array(end - start + 1), (_, i) => i + start);
  }

  var sideWidth = maxLength < 9 ? 1 : 2;
  var leftWidth = (maxLength - sideWidth * 2 - 3) >> 1;
  var rightWidth = (maxLength - sideWidth * 2 - 2) >> 1;
  if (totalPages <= maxLength) {
    // no breaks in list
    return range(1, totalPages);
  }
  if (page <= maxLength - sideWidth - 1 - rightWidth) {
    // no break on left of page
    return range(1, maxLength - sideWidth - 1)
      .concat([0])
      .concat(range(totalPages - sideWidth + 1, totalPages));
  }
  if (page >= totalPages - sideWidth - 1 - rightWidth) {
    // no break on right of page
    return range(1, sideWidth)
      .concat([0])
      .concat(
        range(totalPages - sideWidth - 1 - rightWidth - leftWidth, totalPages)
      );
  }
  // Breaks on both sides
  return range(1, sideWidth)
    .concat([0])
    .concat(range(page - leftWidth, page + rightWidth))
    .concat([0])
    .concat(range(totalPages - sideWidth + 1, totalPages));
}

$(function() {
  // Number of items and limits the number of items per page
  var numberOfItems = $("#jar .content").length;
  var limitPerPage = 8;
  // Total pages rounded upwards
  var totalPages = Math.ceil(numberOfItems / limitPerPage);
  // Number of buttons at the top, not counting prev/next,
  // but including the dotted buttons.
  // Must be at least 5:
  var paginationSize = 7;
  var currentPage;

  function showPage(whichPage) {
    if (whichPage < 1 || whichPage > totalPages) return false;
    currentPage = whichPage;
    $("#jar .content")
      .hide()
      .slice((currentPage - 1) * limitPerPage, currentPage * limitPerPage)
      .show();
    // Replace the navigation items (not prev/next):
    $(".pagination li").slice(1, -1).remove();
    getPageList(totalPages, currentPage, paginationSize).forEach(item => {
      $("<li>")
        .addClass(
          "page-item " +
            (item ? "current-page " : "") +
            (item === currentPage ? "active " : "")
        )
        .append(
          $("<a>")
            .addClass("page-link")
            .attr({
              href: "javascript:void(0)"
            })
            .text(item || "...")
        )
        .insertBefore(".next-page");
    });
    return true;
  }

  // Include the prev/next buttons:
  /* OBS: Comentado por Renzo
  $(".pagination").append(
    $("<li>").addClass("page-item").attr({ class: "previous-page" }).append(
      $("<a>")
        .addClass("page-link")
        .attr({
          href: "javascript:void(0)",

        })
        .text("<")
    ),
    $("<li>").addClass("page-item").attr({ class: "next-page" }).append(
      $("<a>")
        .addClass("page-link")
        .attr({
          href: "javascript:void(0)"
        })
        .text(">")
    )
  );

  */
  // Show the page links
  $("#jar").show();
  // showPage(1); OBS: Comentado por Renzo

  // Use event delegation, as these items are recreated later

  /*$(  OBS: Comentado por Renzo
    document
  ).on("click", ".pagination li.current-page:not(.active)", function() {
      alert("ola");
    return showPage(+$(this).text());
  });
  */
  $(".next-page").on("click", function() {
    return showPage(currentPage + 1);
  });

  $(".previous-page").on("click", function() {
    return showPage(currentPage - 1);
  });
  $(".pagination").on("click", function() {
    $("html,body").animate({ scrollTop: 0 }, 0);
  });
});


$('#btn25').on('click', function(){

  if($("#filtros").hasClass("col-lg-8 col-md-12 col-sm-12")) {
    $("#navbarToggleExternalContent").css("display","none");
    $("#filtros").removeClass("col-lg-8 col-md-12 col-sm-12");
    $("#filtros").addClass("col-lg-12 col-md-12 col-sm-12");
    $("#btn25").html('<span class="fa fa-filter"></span> Ver Filtros');
  } else {
    $("#navbarToggleExternalContent").css("display","block");
    $("#filtros").removeClass("col-lg-12 col-md-12 col-sm-12");
    $("#filtros").addClass("col-lg-8 col-md-12 col-sm-12");
  };
})

$('.blockFilter').on('click', function(){
    localStorage.setItem('typeViewProducts', 'blockFilter');
    if($(".statelist").hasClass("col-md-12 col-sm-12")) {
    // $("#navbarToggleExternalContent").css("display","none");
    $(".statelist").removeClass("col-md-12 col-sm-12");
    $(".statelist").addClass("col-md-6 col-sm-12");
    $(".imageheight").removeClass("col-md-6 col-sm-12");
    $(".imageheight").addClass("col-md-12 col-sm-12");
    $(".containerHeight").removeClass("col-md-6 col-sm-12");
    $(".containerHeight").addClass("col-md-12 col-sm-12");
    $(".imageheight").css("padding-right","10px");
    $(".dataSlideinfo2").css("width","89%");
  }
})


$('.listFilter').on('click', function(){
  localStorage.setItem('typeViewProducts', 'listFilter');

  if($(".statelist").hasClass("col-md-6 col-sm-12")) {
     // $("#navbarToggleExternalContent").css("display","none");
     // $("#navbarToggleExternalContent").css("display","block");
    $(".statelist").removeClass("col-md-6 col-sm-12");
    $(".statelist").addClass("col-md-12 col-sm-12");

    $(".imageheight").removeClass("col-md-12 col-sm-12");
    $(".imageheight").addClass("col-md-6 col-sm-12");
    $(".containerHeight").removeClass("col-md-12 col-sm-12");
    $(".containerHeight").addClass("col-md-6 col-sm-12");
    $(".imageheight").css("padding-right","0px");
    $(".dataSlideinfo2").css("width","94%");
  }
})

$(document).ready(function() {
    console.log("key key key");
    console.log(localStorage.getItem(keyTypeView));
    if(localStorage.getItem(keyTypeView)!=null){
        $("."+localStorage.getItem(keyTypeView)).click();
    }
});
$('.crossChat').on('click', function(){
  if ( $(".crossChat").hasClass("active") ) {
    $(".crossChat").removeClass("active");
    $(".chatFlotante").css("bottom","199px");

  }else{
    $(".crossChat").addClass("active");
    $(".chatFlotante").css("bottom","-121px");
  }
})

