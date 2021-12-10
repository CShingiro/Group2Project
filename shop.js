"use strict";

$(() => {
    $("a").click(e => {
      $src_backup = "images/shop1.png";
      e.preventDefault();
      let src = $(this).closest('figure').find('img').attr('src');
      localStorage.setItem("useImage", src);
      console.log('src', src);
      // now that we got it stored, allow the link to go through
      window.location.href=$(this).attr('href');
    })
  });

//on next page

$(() => {
    if (!localStorage.getItem($src_backup)) return;
    $("a").click(e => {
      e.preventDefault();
      let img = $('<img />', {
        src: localStorage.getItem("useImage"),
      });
      img.addClass("storageImage").appendTo($('#product'));
    })
  });

