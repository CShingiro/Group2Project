"use strict";

(() => {
    $("a").click(function(){
        localStorage.setItem("image", this.prev().attr('src'));
    });
});

//on next page

(() => {
    if (!localStorage.getItem("image")) return;
    let img = $('<img />', {
        src: localStorage.getItem("image"),
    });
    img.appendTo($('#product'));
});