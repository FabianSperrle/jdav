$(document).foundation({    abide: {        live_validate : true,        validate_on_blur : true,        focus_on_invalid : true,        patterns: {            names: /^[^0-9!"§$%&/()=]*$/        }    }});function collage() {    $('.collage').css('background-color', 'transparent');    $('.collage').collagePlus({        'targetHeight': 180,        'effect': 'default'    });}collage();var resizeTimer = null;$(window).bind('resize', function () {    $('.collage img').css('opacity', 0);    $('.collage').css('background-color', '#dedede');    if (resizeTimer) clearTimeout(resizeTimer);    resizeTimer = setTimeout(collage, 200);});