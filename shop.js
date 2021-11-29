"use strict";

(() => {
    $("a").click(function(){
        localStorage.setItem("image", this.prev().attr('src'));
    });
});

//on next page

(() => {
    if (!localStorage.getItem("useImage")) return;
    let img = $('<img />', {
        src: localStorage.getItem("useImage"),
    });
    img.appendTo($('#product'));
});