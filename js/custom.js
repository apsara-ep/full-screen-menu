jQuery(document).ready(function ($) {
  $(document).ready(function () {
    // Handle clicks on menu links
    $(document).on("click", "#site-navigation a", function (e) {
      e.preventDefault();
      var link = $(this).attr("href");
      loadPage(link);
    });

    // Handle browser back/forward buttons
    $(window).on("popstate", function () {
      var link = location.pathname;
      loadPage(link);
    });

    // Load page content via AJAX
    function loadPage(link) {
      $.ajax({
        url: link,
        dataType: "html",
        success: function (response) {
          var menu = $(response).find("#site-navigation");
          $("#site-navigation").replaceWith(menu);
          document.title = $(response).filter("title").text();
          history.pushState(null, "", link);
        },
      });
    }
  });
});

jQuery(document).ready(function ($) {
  $("body").on("click", ".load-page", function (event) {
    event.preventDefault();
    var page_id = $(this).data("page-id");
    $.ajax({
      type: "POST",
      url: my_ajax_object.ajax_url,
      data: {
        action: "load_page_content",
        page_id: page_id,
      },
      success: function (response) {
        $("#page-content").html(response);
        $("title").text(response.title);
      },
      error: function (xhr, status, error) {
        console.log(xhr.responseText);
      },
    });
  });
});

jQuery(document).ready(function ($) {
  // Toggle the menu to full screen
  $(".toggle-menu").click(function () {
    $(".dynamic-menu").toggleClass("full-screen");
  });

  // Hide the menu when clicking outside of it
  $(document).click(function (event) {
    if (
      !$(event.target).closest(".dynamic-menu").length &&
      $(".dynamic-menu").hasClass("full-screen")
    ) {
      $(".dynamic-menu").removeClass("full-screen");
    }
  });
});

jQuery(document).ready(function ($) {
  $("button").on("click", function () {
    $("body").toggleClass("open");
  });
});

const menuItems = document.querySelectorAll(".menu-item");

menuItems.forEach((item) => {
  item.addEventListener("click", () => {
    const menuToggle = document.querySelector(".menu-toggle");
    menuToggle.click();
  });
});
