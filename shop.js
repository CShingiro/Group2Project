"use strict";

$(document).ready(function() {
    $("a").click(function(e) {
      e.preventDefault();
      let src = $(this).closest('figure').find('img').attr('src');
      localStorage.setItem("useImage", src);
      console.log('src', src);
      // now that we got it stored, allow the link to go through
      window.location.href=$(this).attr('href');
    })
  });

//on next page

$(document).ready(function() {
    if (!localStorage.getItem("useImage")) return;
    let img = $('<img />', {
      class: localStorage.getItem("useImage"),
      src: localStorage.getItem("useImage"),
    });
    img.appendTo($('#product'));
  });

