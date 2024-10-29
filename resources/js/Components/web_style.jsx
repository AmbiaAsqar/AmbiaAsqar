export const webFunction = () => {
    const asset = (path) => {
        return `/storage/${path}`;
    }

    document.addEventListener("scroll", () => {
        const scrollYPos = window.scrollY;
        document.getElementById("navbar").setAttribute("class", "w-full fixed z-30 -top-[30px] flex flex-row justify-between px-10 py-2 bg-violet-600")
        document.getElementById("navbar").setAttribute("style", "transition: top .5 ease-in")
        document.getElementById("header").setAttribute("class", "flex w-full -top-[100px] py-3 bg-white border-b border-slate-300 z-30 fixed flex-row justify-between shadow-md md:px-24 xl:px-24")
        document.getElementById("header").setAttribute("style", "transition: top .5 ease-in")
        if(scrollYPos > 329) {
            document.getElementById("navbar").setAttribute("class", "w-full fixed z-30 top-0 flex flex-row justify-between px-10 py-2 bg-violet-600")
            document.getElementById("navbar").setAttribute("style", "transition: top .5 ease-in")
            document.getElementById("header").setAttribute("class", "flex w-full top-[30px] py-3 bg-white border-b border-slate-300 z-30 fixed flex-row justify-between shadow-md md:px-24 xl:px-24")
            document.getElementById("header").setAttribute("style", "transition: top .5 ease-in")
        };
    
        document.addEventListener("scrollend", () => {
            return lastScroll(window.scrollY);
        }, false);

        const lastScroll = (lastScrolling) => {
            if(lastScrolling > scrollYPos) {
                return "Down";
                // document.getElementById("bg-wallpaper").style.cssText = `position: absolute; top: ${i++*10}%; left: 0; width: 100%; height: 100vh; background-image: url('${asset('background/gradient-background-web.avif')}'); background-repeat: repeat; background-size: cover; filter: blur(90px); transition: top .2s ease-in`;
            } else if(lastScrolling === scrollYPos) {
                return
            } else {
                return "Up";
                // document.getElementById("bg-wallpaper").style.cssText = `position: absolute; top: -${i++*10}%; left: 0; width: 100%; height: 100vh; background-image: url('${asset('background/gradient-background-web.avif')}'); background-repeat: repeat; background-size: cover; filter: blur(90px); transition: top .2s ease-in`;
            }
        }
    })
}