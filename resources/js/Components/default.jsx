import { useEffect, useState } from "react";

export function screenSwiper(screenName, firstScreenName) {
    const [isProfile, setProfile] = useState(false);

    useEffect(() => {
        var getScreen = document.getElementById(screenName);
        var getFirstScreen = document.getElementById(firstScreenName);
        const swiperScreen = document.getElementById(screenName+"-swipe");
        const footerButton = document.getElementById("footer-button");
        // console.log(swiperWidth.clientWidth);
        swiperScreen.addEventListener("touchstart", (event) => {
            // const getTouchDown = event.touches[0] || event.changedTouches[0];
            // const touchXDown = getTouchDown.pageX
            // console.log(touchXDown);
            swiperScreen.addEventListener("touchend", (e) => {
                const getTouchUp = e.touches[0] || e.changedTouches[0];
                const touchXUp = getTouchUp.pageX;
                // console.log(touchXUp);
                if(50 < touchXUp) {
                    getScreen.style.left = "100%";
                    getScreen.style.transition = "left .5s ease-out";
                    getFirstScreen.style.left = "0";
                    if(isProfile) {
                        footerButton.style.marginBottom = "0";
                        footerButton.style.transition = "margin-bottom .5s linear";
                        setTimeout(() => {
                            setProfile(false);
                        },100);
                    }
                    if(!isProfile) {
                        footerButton.style.marginBottom = "0";
                        footerButton.style.transition = "margin-bottom .5s linear";
                        setTimeout(() => {
                            setProfile(false);
                        },100);
                    }
                } else {
                    getScreen.style.left = "0";
                    getScreen.style.transition = "left .5s ease-in";
                    getFirstScreen.style.left = "-30%";
                    if(isProfile) {
                        footerButton.style.marginBottom = "-100px";
                        footerButton.style.transition = "margin-bottom .5s linear";
                        setTimeout(() => {
                            setProfile(false);
                        },100);
                    }
                    if(!isProfile) {
                        footerButton.style.marginBottom = "-100px";
                        footerButton.style.transition = "margin-bottom .5s linear";
                        setTimeout(() => {
                            setProfile(false);
                        },100);
                    }
                }
            })
        })
        swiperScreen.addEventListener("touchmove", (e) => {
            const getTouchMove = e.touches[0] || e.changedTouches[0];
            const touchMove = getTouchMove.pageX;
            // console.warn(touchMove);
            getScreen.style.left = touchMove+"px";
            getScreen.style.transition = "left .1s linear"
            getFirstScreen.style.left = -60+(touchMove/6)+"px";
            if(touchMove < 0) {
                getScreen.style.left = "0";
                getScreen.style.transition = "left .1s linear"
                if(!isProfile) {
                    footerButton.style.marginBottom = -touchMove+"px";
                    footerButton.style.transition = "margin-bottom .5s linear";
                    setTimeout(() => {
                        setProfile(false);
                    },100);
                }
            }
        })
    }, []);
}

export function swipeDown(screenName, swiperName) {
    useEffect(() => {
        var screen = document.getElementById(screenName);
        var swiper = document.getElementById(swiperName);
        swiper.addEventListener("touchstart", (e) => {
            const touch = e.touches[0] || e.changedTouches[0];
            const touchDown = touch.pageY || touch.clientY;
            // console.log("screen: "+getScreen+" "+touchDown);
            swiper.addEventListener("touchend", (e) => {
                const touch = e.touches[0] || e.changedTouches[0];
                const touchUp = touch.pageY || touch.clientY;
                if(touchDown < touchUp) {
                    screen.style.top = "100%";
                    screen.style.transition = "top .5s linear";
                }
            })
        });

        swiper.addEventListener("touchmove", (e) => {
            const touch = e.touches[0] || e.changedTouches[0];
            const touchMove = touch.clientY || touch.pageY;
            screen.style.top = touchMove+"px";
            screen.style.transition = "top .1s linear";
            if(touchMove < 50) {
                screen.style.top = "50px";
                screen.style.transition = "top .1s linear";
            }
        })
    });
}

export function Refresh() {
    useEffect(() => {
        var refresher = document.getElementById("refresher");
        var firstScreen = document.getElementById("first-screen");
        refresher.addEventListener("touchend", (e) => {
            const touch = e.touches[0] || e.changedTouches[0];
            const touchUp = touch.pageY || touch.clientY;

            if(touchUp > 20) {
                refresher.style.top = "0";
                refresher.children[0].setAttribute("class", "animate-spin")
                location.reload();
            }
        })
        refresher.addEventListener("touchmove", (e) => {
            const touch = e.touches[0] || e.changedTouches[0];
            const touchMove = touch.pageY || touch.clientY;

            if(touchMove < 20) {
                refresher.style.top = "-80px";
            } else {
                refresher.style.top = -(80-(touchMove/2))+"px";
                refresher.children[0].setAttribute("style", "transform: rotate("+touchMove/100+"turn)")
                refresher.style.transition = "top .1s ease-in"
            }
        })

        // firstScreen.addEventListener("touchstart", (e) => {
        //     const touch = e.changedTouches[0] || e.touches[0];
        //     const getTouchDown = touch.clientY || touch.pageY;
        //     firstScreen.addEventListener("touchmove", (e) => {
        //         const touch = e.changedTouches[0] || e.touches[0];
        //         const getTouchMove = touch.clientY || touch.pageY;
        //         console.log(first);
        //     })
        // })
    })
}

export function beautyTrack(status) {
    useEffect(() => {
        const getCookieValue = (name) => (
            document.cookie.match('(^|;)\\s*' + name + '\\s*=\\s*([^;]+)')?.pop() || ''
        );
        document.addEventListener("touchmove", (e) => {
            if(status) {
                const el = document.createElement("div")
                document.body.appendChild(el)
                const pos = e.touches[0] || e.changedTouches[0];
                const posX = pos.clientX || pos.pageX;
                const posY = pos.clientY || pos.pageY;
                var colors = ["#6631FF","#AA24FF","#3542EA"];
                var time = 1000;
                var size = 30;
                var opacity = .5;
                size -= 10;
                opacity -= .1;
                el.style.width = size+"px";
                el.style.height = size+"px";
                el.style.opacity = opacity;
                el.style.transition = "width "+time+", height "+time+", opacity "+time;
                setTimeout(() => {
                    el.style.width = "0";
                    el.style.height = "0";
                    el.style.opacity = "0";
                    el.style.transition = "width 1s, height 1s, opacity 1s";
                    setTimeout(() => {
                        el.remove();
                    },500);
                }, 100);
                el.style.backgroundColor = colors[Math.floor(Math.random() * 3)].toString();
                el.style.position = "absolute"
                el.style.top = -15+posY+"px";
                el.style.left = -15+posX+"px";
                el.style.zIndex = "90";
                el.style.borderRadius = "100px";
            }
        })
    });
}

export const closeSecondPage = () => {
    document.getElementById("first-screen").style.left = "0";
    document.getElementById("first-screen").style.transition = "left .5s ease-out";
    document.getElementById("second-screen").style.left = "100%";
    document.getElementById("second-screen").style.transition = "left .5s ease-in";
    document.getElementById("bottom-screen").style.top = "100%";
    document.getElementById("bottom-screen").style.transition = "top .5s ease-out";
}

export const openSecondPage = () => {
    document.getElementById("first-screen").style.left = "-30%";
    document.getElementById("first-screen").style.transition = "left .5s ease-out";
    document.getElementById("second-screen").style.left = "0";
    document.getElementById("second-screen").style.transition = "left .5s ease-out";
}

// export const styleJs = () => {
//     document.addEventListener("load", () => {
//         setProfile(false)
//         document.getElementById("second-screen").style.left = "100%";
//         document.getElementById("first-screen").style.left = "0";
//         document.getElementById("loading-screen").style.opacity = "0";
//         document.getElementById("loading-screen").style.zIndex = "0";
//         document.getElementById("loading-screen").style.transition = "opacity 1s, z-index 2s";
//     })

//     var closeSecondPage = () => {
//         document.getElementById("first-screen").style.left = "0";
//         document.getElementById("first-screen").style.transition = "left .5s ease-out";
//         document.getElementById("second-screen").style.left = "100%";
//         document.getElementById("second-screen").style.transition = "left .5s ease-in";
//         document.getElementById("bottom-screen").style.top = "100%";
//         document.getElementById("bottom-screen").style.transition = "top .5s ease-out";
//     }

//     var openSecondPage = () => {
//         document.getElementById("first-screen").style.left = "-30%";
//         document.getElementById("first-screen").style.transition = "left .5s ease-out";
//         document.getElementById("second-screen").style.left = "0";
//         document.getElementById("second-screen").style.transition = "left .5s ease-out";
//     }

//     useEffect(() => {
//         document.getElementById("back").addEventListener("touchend", () => {
//             if(!isProfile) {
//                 document.getElementById("footer-button").style.marginBottom = "0";
//                 document.getElementById("footer-button").style.transition = "margin-bottom .5s";
//                 setTimeout(() => {
//                     setProfile(false)
//                 },1000);
//             }
//             closeSecondPage();
//         })

//         document.getElementById("back").addEventListener("click", () => {
//             if(!isProfile) {
//                 document.getElementById("footer-button").style.marginBottom = "0";
//                 document.getElementById("footer-button").style.transition = "margin-bottom .5s";
//                 setTimeout(() => {
//                     setProfile(false)
//                 },1000);
//             }
//             closeSecondPage();
//         })
        
//         document.getElementById("prodGame").addEventListener("click", () => {
//             setProfile(false);
//             openSecondPage();
//         })
        
//         document.getElementById("profile").addEventListener("click", () => {
//             setProfile(true);
//             if(!isProfile) {
//                 document.getElementById("footer-button").style.marginBottom = "-150px";
//                 document.getElementById("footer-button").style.transition = "margin-bottom .5s";
//             }
//             openSecondPage();
//         })

//         document.getElementById("profile").addEventListener("touchend", () => {
//             setProfile(true);
//             if(!isProfile) {
//                 document.getElementById("footer-button").style.marginBottom = "-150px";
//                 document.getElementById("footer-button").style.transition = "margin-bottom .5s";
//             }
//             openSecondPage();
//         })
//     });

//     history.pushState(null, null, window.top.location.pathname + window.top.location.search);
//     window.addEventListener('popstate', (e) => {
//         e.preventDefault()

//         closeSecondPage()

//         history.pushState(null, null, window.top.location.pathname + window.top.location.search);
//     })

//     screenSwiper("second-screen", "first-screen");
//     screenSwiper("sub-page", "first-screen");
//     swipeDown("bottom-screen", "swipe-down");
//     Refresh();
// }