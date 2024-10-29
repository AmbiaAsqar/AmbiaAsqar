/**
* Swipe Down Slide
*/

var scroller = document.getElementById('scroller').scrollTop,
el = document.getElementById('main').getBoundingClientRect(),
getvalue = el.top;
console.warn(getvalue);

document.getElementById('scroller').addEventListener('scroll', () => {
    var st = document.getElementById('scroller').scrollTop, header = document.querySelector('header'), parallax = document.querySelector('#parallax'), nav = document.querySelector('#nav-desktop'), navmobile = document.querySelector('#nav-mobile');
    if(st > 99) {
        header.setAttribute('class','lite-border')
        header.setAttribute('style','position: fixed; z-index: 100; transition: top 1s, border-bottom 1s, background-color .5s ease-in, color 1s')
        nav.setAttribute('style', 'opacity: 1; transition: opacity 1s')
        navmobile.setAttribute('style', 'opacity: 1; transition: opacity 1s')
        parallax.setAttribute('style','position: absolute; content: ""; left: 0; top: 180px')
        if(document.querySelector("body").getAttribute("theme") == "dark") {
            header.setAttribute('style','height: auto; background-color: #1B1A1A; color: #f8f6f6; overflow: hidden; position: fixed; z-index: 100; transition: border-bottom 1s, background-color .5s ease-in, color 1s')
            // document.querySelector('.fading').setAttribute('style', 'position: absolute; content: ""; left: 0; top: '+st/3.5+'px; z-index: 1; background-color: #63646a; opacity: 100%');
            document.querySelector('.fading').setAttribute('style','position: absolute; content: ""; left: 0; top: '+st/3.5+'px; top: 0; z-index: 1; background-color: #00000083; opacity: 100%')
        } else {
            document.querySelector('.fading').setAttribute('style','position: absolute; content: ""; left: 0; top: '+st/3.5+'px; z-index: 1; background-color: #f8fafc; opacity: 100%')
            header.setAttribute('style','height: auto; border-top: 4px solid #fc2691; background-color: #F9FBFF; color: #1B1A1A; position: fixed; z-index: 100; overflow: hidden; transition: border-bottom 1s, background-color .5s ease-in, color 1s')
        }
    } else {
        header.setAttribute('class','transparent d-flex align-items-end')
        header.setAttribute('style','color: #ffffff !important; z-index: 100; position: fixed; transition: top 1s, border-bottom .5s ease-out, background-color .5s ease-out, color .5s')
        nav.setAttribute('style', 'opacity: 0; transition: opacity 1s')
        navmobile.setAttribute('style', 'opacity: 0; transition: opacity 1s')
        parallax.setAttribute('style','position: absolute; content: ""; left: 0; top: '+st/2.5+'px')
        document.querySelector('.fading').setAttribute('style','position: absolute; content: ""; left: 0; top: '+st/3.5+'px; z-index: 1; background-color: #f8fafc; opacity: '+st/6+'%')
        if(document.querySelector("body").getAttribute("theme") == 'dark') {
            header.setAttribute('style','height: 150px; position: fixed; z-index: 100; overflow: hidden; transition: border-bottom 1s, background-color .5s ease-in, color 1s')
            document.querySelector('.fading').setAttribute("style", 'position: absolute; content: ""; left: 0; top: '+st/3.5+'px; z-index: 1; background-color: #00000083; opacity: '+st/6+'%');
        } else {
            header.setAttribute('style','height: 150px !important; border-top: 4px solid #fc2691; position: fixed; z-index: 100; overflow: hidden; transition: border-bottom 1s, background-color .5s ease-in, color 1s')
        }
    }

    lastScrollTop = st <= 0 ? 0 : st;
}, false);

window.addEventListener('touchend', () => {
    var elscroll = document.getElementById('main').getBoundingClientRect(), elvalue = elscroll.top, mainDetection = document.getElementById('mobileMainDetection');
    // console.log(getvalue)
    //console.warn(elvalue)

    // Tarik naik
    if (elvalue < getvalue && elvalue > getvalue/2) {
        document.getElementById('scroller').scrollTo({top: getvalue, behavior: 'smooth'})
        mainDetection.setAttribute('style','padding-top: '+scroller+90+'px; transition: padding-top .3s ease-in')
    }
    // Tarik turun
    if (elvalue < getvalue/2 && elvalue > 0) {
        document.getElementById('scroller').scrollTo({top: 0, behavior: 'smooth'})
        mainDetection.setAttribute('style','padding-top: 0px; transition: padding-top .5s ease-out')
    }
});