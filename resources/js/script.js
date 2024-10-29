const { ready, get } = require("jquery");


$(document).ready(() => {
    $('#parallax img').before("<div class='w-100 h-100 fading' style='position: absolute; content: \"\"; left: 0; top: 0px'></div>");
})

var scroller = document.getElementById('scroller').scrollTop;
var el = document.getElementById('main').getBoundingClientRect();
var getvalue = el.top;
console.warn(getvalue);
document.getElementById('scroller').addEventListener("scroll", function() {
    //var st = window.pageYOffset || document.documentElement.scrollTop;
    var st = document.getElementById('scroller').scrollTop;
    if (el.top <= 0 || st > getvalue) {
        $('header').attr('color', 'white')
        $('nav').css('opacity', '1')
        $('header').attr('style', 'position: fixed; transition: border-bottom 1s, background-color .5s ease-in, color 1s')
        $('h1.title').attr('style', 'font-size: 18pt; transition: font-size .5s ease-in')
        $('.con-body h1.title').attr('style', 'font-size: 18pt; hyphens: auto; transition: font-size .5s ease-in')

        $('#parallax').attr('style','position: absolute; content: ""; left: 0; top: 180px');
        $('.fading').attr("style", 'position: absolute; content: ""; left: 0; top: '+st/3.5+'px; z-index: 1; background-color: #f8fafc; opacity: 100%');

        if(document.querySelector("body").getAttribute("theme")) {
            $('header').attr("color","black");
            $('.fading').attr("style", 'position: absolute; content: ""; left: 0; top: '+st/3.5+'px; z-index: 1; background-color: #63646a; opacity: 100%');
        }
    } else {
        $('header').attr('color', 'transparent white-md')
        $('header').attr('style', 'color: #ffffff !important; position: fixed; transition: border-bottom .5s ease-out, background-color .5s ease-out, color .5s');
        $('nav').css('opacity', '0')
        $('h1.title').attr('style', 'font-size: 16pt; transition: font-size .5s ease-out')
        $('.con-body h1.title').attr('style', 'font-size: 16pt; hyphens: auto; transition: font-size .5s ease-out')
        
        $('#parallax').attr('style','position: absolute; content: ""; left: 0; top: '+st/2.5+'px');
        $('.fading').attr("style", 'position: absolute; content: ""; left: 0; top: '+st/3.5+'px; z-index: 1; background-color: #f8fafc; opacity: '+st/6+'%'); // Originally 3.6 because 360 / 100 (height / 100% of opacity)
        
        if(document.querySelector("body").getAttribute("theme")) {
            $('.fading').attr("style", 'position: absolute; content: ""; left: 0; top: '+st/3.5+'px; z-index: 1; background-color: #63646a; opacity: '+st/6+'%');
        }
    }

    lastScrollTop = st <= 0 ? 0 : st;

}, false);

window.addEventListener('touchend', () => {
    var elscroll = document.getElementById('main').getBoundingClientRect();
    var elvalue = elscroll.top;
    //console.log(getvalue)
    //console.warn(elvalue)

    // Tarik naik
    if (elvalue < getvalue && elvalue > getvalue/2) {
        document.getElementById('scroller').scrollTo({top: getvalue, behavior: 'smooth'});
        $('#mobileMainDetection').attr('style','padding-top: '+scroller+90+'px; transition: padding-top .3s ease-in')
    }
    // Tarik turun
    if (elvalue < getvalue/2 && elvalue > 0) {
        document.getElementById('scroller').scrollTo({top: 0, behavior: 'smooth'});
        $('#mobileMainDetection').attr('style','padding-top: 0px; transition: padding-top .5s ease-out')
    }
});

$(document).ready(() => {
    document.getElementById('scroller').scrollBy(0,1)
    setTimeout(() => {
        document.getElementById('scroller').scrollTo(0, 0);
    },50);
    $('#rightbar-btn').click(() => {
        $("#rightbar").attr("style","margin-left:0;transition:margin-left .5s ease-in")
    });
    $('#close').click(() => {
        $("#rightbar").attr("style","margin-left:100%;transition:margin-left .5s ease-in")
    });
    $('.soccer-special-icon').text('');
    $('.soccer-special-icon').append('<svg xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" height="18px" viewBox="0 0 24 24" fill="#181717" width="24px"><g><rect fill="none" height="24" width="24"/></g><g><g><path d="M12,2C6.48,2,2,6.48,2,12c0,5.52,4.48,10,10,10s10-4.48,10-10C22,6.48,17.52,2,12,2z M13,5.3l1.35-0.95 c1.82,0.56,3.37,1.76,4.38,3.34l-0.39,1.34l-1.35,0.46L13,6.7V5.3z M9.65,4.35L11,5.3v1.4L7.01,9.49L5.66,9.03L5.27,7.69 C6.28,6.12,7.83,4.92,9.65,4.35z M7.08,17.11l-1.14,0.1C4.73,15.81,4,13.99,4,12c0-0.12,0.01-0.23,0.02-0.35l1-0.73L6.4,11.4 l1.46,4.34L7.08,17.11z M14.5,19.59C13.71,19.85,12.87,20,12,20s-1.71-0.15-2.5-0.41l-0.69-1.49L9.45,17h5.11l0.64,1.11 L14.5,19.59z M14.27,15H9.73l-1.35-4.02L12,8.44l3.63,2.54L14.27,15z M18.06,17.21l-1.14-0.1l-0.79-1.37l1.46-4.34l1.39-0.47 l1,0.73C19.99,11.77,20,11.88,20,12C20,13.99,19.27,15.81,18.06,17.21z"/></g></g></svg>')
    $('#themelbl').click(() => {
        if(document.querySelector('body').getAttribute('theme')) {
            $('body').removeAttr('theme')
            $('header').attr('color', 'white')
            $('.soccer-special-icon').text('');
            $('.soccer-special-icon').append('<svg xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" height="18px" viewBox="0 0 24 24" fill="#181717" width="24px"><g><rect fill="none" height="24" width="24"/></g><g><g><path d="M12,2C6.48,2,2,6.48,2,12c0,5.52,4.48,10,10,10s10-4.48,10-10C22,6.48,17.52,2,12,2z M13,5.3l1.35-0.95 c1.82,0.56,3.37,1.76,4.38,3.34l-0.39,1.34l-1.35,0.46L13,6.7V5.3z M9.65,4.35L11,5.3v1.4L7.01,9.49L5.66,9.03L5.27,7.69 C6.28,6.12,7.83,4.92,9.65,4.35z M7.08,17.11l-1.14,0.1C4.73,15.81,4,13.99,4,12c0-0.12,0.01-0.23,0.02-0.35l1-0.73L6.4,11.4 l1.46,4.34L7.08,17.11z M14.5,19.59C13.71,19.85,12.87,20,12,20s-1.71-0.15-2.5-0.41l-0.69-1.49L9.45,17h5.11l0.64,1.11 L14.5,19.59z M14.27,15H9.73l-1.35-4.02L12,8.44l3.63,2.54L14.27,15z M18.06,17.21l-1.14-0.1l-0.79-1.37l1.46-4.34l1.39-0.47 l1,0.73C19.99,11.77,20,11.88,20,12C20,13.99,19.27,15.81,18.06,17.21z"/></g></g></svg>')
        } else {
            $('body').attr('theme','dark')
            $('header').attr('color','light')
            $('.soccer-special-icon').text('');
            $('.soccer-special-icon').append('<svg xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" height="18px" viewBox="0 0 24 24" fill="#dcdae1" width="24px"><g><rect fill="none" height="24" width="24"/></g><g><g><path d="M12,2C6.48,2,2,6.48,2,12c0,5.52,4.48,10,10,10s10-4.48,10-10C22,6.48,17.52,2,12,2z M13,5.3l1.35-0.95 c1.82,0.56,3.37,1.76,4.38,3.34l-0.39,1.34l-1.35,0.46L13,6.7V5.3z M9.65,4.35L11,5.3v1.4L7.01,9.49L5.66,9.03L5.27,7.69 C6.28,6.12,7.83,4.92,9.65,4.35z M7.08,17.11l-1.14,0.1C4.73,15.81,4,13.99,4,12c0-0.12,0.01-0.23,0.02-0.35l1-0.73L6.4,11.4 l1.46,4.34L7.08,17.11z M14.5,19.59C13.71,19.85,12.87,20,12,20s-1.71-0.15-2.5-0.41l-0.69-1.49L9.45,17h5.11l0.64,1.11 L14.5,19.59z M14.27,15H9.73l-1.35-4.02L12,8.44l3.63,2.54L14.27,15z M18.06,17.21l-1.14-0.1l-0.79-1.37l1.46-4.34l1.39-0.47 l1,0.73C19.99,11.77,20,11.88,20,12C20,13.99,19.27,15.81,18.06,17.21z"/></g></g></svg>')
        }
    });

    $('.skeleton').hide();
    $('.con-head.active').removeClass('active');
    $('.con-head>img').attr('style','object-fit: cover; width: 100%; height: 100%; min-height: 100px;');
    $('span.c, #rightbar p, .hide, small.v').removeAttr('style');
});