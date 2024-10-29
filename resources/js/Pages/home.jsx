import React, { useState, useEffect } from "react";
import { screenSwiper, swipeDown, Refresh, beautyTrack, openSecondPage, closeSecondPage } from "../Components/default.jsx";
import { Products, Profile, Subpage } from "./second_screen.jsx";
import axios from "axios";
import { variables } from "../env";

const asset = (path) => {
    return `/storage/${path}`;
}

const Home = () => {
    const sm = 640;
    const md = 768;
    const lg = 1024;
    const xl = 1536;
    const windowX = window.innerWidth;
    const [isProfile, setProfile] = useState(false);
    const [results, setResults] = useState([]);
    const [isPage, setPage] = useState({
        "title": "",
        "desc": "",
        "katId": ""
    });
    const [isOperator, setOperator] = useState({
        "title": "",
        "desc": "",
        "katId": ""
    });

    // Timeout Function

    let y = 180
    let timeInterval = () => {
        setInterval(() => {
            y -= 1
            if(y < 0) {
                localStorage.removeItem("expiry")
            } else {
                localStorage.setItem("expiry", y);
            }
        }, 1000)
    }

    useEffect(() => {
        timeInterval()
    },[])

    document.addEventListener("touchstart", () => {
        y = 180
    })

    const msisdn = localStorage.getItem("msisdn");
    const expiry = localStorage.getItem("expiry");
    if(msisdn === null || expiry === null) {
        history.pushState(null, null, `${variables("APP_URL")}:${variables("APP_PORT")}/`)
    }

    // End of Timeout Function

    let d = new Date().toLocaleTimeString([], {hour: '2-digit', minute: '2-digit'});
    let hour = new Date().getHours();
    const [number, setNumber] = useState(d);

    const updateTime = (prevTime) => {
        setInterval(() => {
            hour = new Date().getHours();
            d = new Date().toLocaleTimeString([], {hour: '2-digit', minute: '2-digit'});
            if(hour >= 12) {
                setNumber(d.replace("PM", ""));
            } else {
                setNumber(d.replace("AM", ""));
            }
        }, 1000);
    }

    useEffect(() => {
        updateTime();
    }, []);

    if(windowX < md) {
        screenSwiper("second-screen", "first-screen");
        screenSwiper("sub-page", "first-screen");
        swipeDown("bottom-screen", "swipe-down");
        Refresh();
        beautyTrack();

        useEffect(() => {
            document.getElementById("second-screen").style.left = "100%";
            document.getElementById("first-screen").style.left = "0";
            document.getElementById("loading-screen").style.opacity = "0";
            document.getElementById("loading-screen").style.zIndex = "0";
            document.getElementById("loading-screen").style.transition = "opacity 1s, z-index 2s";
        }, []);

        useEffect(() => {
            // Back nav touch
            document.getElementById("back").addEventListener("toucend", () => {
                if(!isProfile) {
                    document.getElementById("footer-button").style.marginBottom = "0";
                    document.getElementById("footer-button").style.transition = "margin-bottom .5s";
                    setTimeout(() => {
                        document.getElementById("title").textContent = "";
                        document.getElementById("description").textContent = "";
                        setProfile(false)
                    },1000);
                }
                if(isProfile) {
                    console.clear();
                    document.getElementById("footer-button").style.marginBottom = "0";
                    document.getElementById("footer-button").style.transition = "margin-bottom .5s";
                    setTimeout(() => {
                        document.getElementById("title").textContent = "";
                        document.getElementById("description").textContent = "";
                        setProfile(false)
                    },1000);
                }
                closeSecondPage();
                setOperator([]);
            })

            // Back nav click
            document.getElementById("back").addEventListener("click", () => {
                if(!isProfile) {
                    document.getElementById("footer-button").style.marginBottom = "0";
                    document.getElementById("footer-button").style.transition = "margin-bottom .5s";
                    setTimeout(() => {
                        setProfile(false)
                    },1000);
                }
                if(isProfile) {
                    console.clear();
                    document.getElementById("footer-button").style.marginBottom = "0";
                    document.getElementById("footer-button").style.transition = "margin-bottom .5s";
                    setTimeout(() => {
                        setProfile(false)
                    },1000);
                }
                closeSecondPage();
                setOperator([]);
            })

            // Profile touch
            document.getElementById("profile").addEventListener("touchend", () => {
                setProfile(true);
                setTimeout(() => {
                    document.getElementById("footer-button").style.marginBottom = "-100px";
                    document.getElementById("footer-button").style.transition = "margin-bottom .5s";
                },100);
                openSecondPage();
            })

            // Profile click
            document.getElementById("profile").addEventListener("click", () => {
                setProfile(true);
                setTimeout(() => {
                    document.getElementById("footer-button").style.marginBottom = "-100px";
                    document.getElementById("footer-button").style.transition = "margin-bottom .5s";
                },100);
                openSecondPage();
            })
        },[]);

        // Back Navigation handle
        history.pushState(null, null, window.top.location.pathname + window.top.location.search);
        window.addEventListener('popstate', (e) => {
            e.preventDefault()

            closeSecondPage()

            history.pushState(null, null, window.top.location.pathname + window.top.location.search);
        })
    } else {
        useEffect(() => {
            // console.log("PC");
            document.getElementById("second-screen").style.left = "100%";
            document.getElementById("first-screen").style.left = "0";
            document.getElementById("loading-screen").style.opacity = "0";
            document.getElementById("loading-screen").style.zIndex = "0";
            document.getElementById("loading-screen").style.transition = "opacity 1s, z-index 2s";

            console.log("%c%s%c%s%c%s%c%s%c%O%c%s%c%s%c%s%c%s%c%s%c%s%c%s%c%O", 
                "font-size:15pt; color:#FFA000", "Warning!\n", 
                "","if you read this, you might have known that we are ", 
                "color: red; font-weight: bold", "NOT ALLOWING ", 
                "", "you or anyone (as user) to open the console nor element inspector in order to:", 
                "", {1: "Attempting hack to our system", 2: "Joining LGBTQ++ (or any of that) bcoz we no liberal", 3: "Injecting malicious file(s)/data into our system", 4: "Watching anime as you (user) licking the screen when a beauty-sexy character comes in"}, 
                "font-style: italic", "\n\nif ",
                "", "you (as user) caught doing this ", 
                "font-weight: bold", "intolerance behaviour ", 
                "", "above, we (as PinNet team) will ",
                "color: red; font-weight: bold", "DO NOTHING ",
                "", "to you as we don't have any rights to response your action.\n\n",
                "font-size: 20pt; font-style: italic; font-family: comic-sans", "Mr. SulChan\n",
                "",{Note: ["Congrats! you've just found a common Pinster Egg. Please take your reward, enjoy yourself.", {Info: "Paste the reward code below into the reward input in Profile > Rewards", Reward: "CONSO1EB4MB0OZL3DME"}]}
            );
        }, []);
    }

    // Getting user's detail
    const fetchUser = axios.get(`${variables("APP_URL")}:${variables("APP_PORT")}/user/profile/${localStorage.getItem("msisdn")}`, {
        headers: { Authorization: btoa(localStorage.getItem("msisdn")) }
    });

    useEffect(() => {
        fetchUser.then((success) => {
            const currency = new Intl.NumberFormat('id', {
                style: 'currency',
                currency: "IDR"
            });
            document.getElementById("saldo").innerText = currency.format(success.data.saldo).replace(/(\.|,)00$/g, '');
            document.getElementById("point").innerText = success.data.point+" pts";
        });
    },[]);

    const getBarang = async () => {
        axios.get(`${variables("APP_URL")}:${variables("APP_PORT")}/kategori/barang`, {
            headers: {
                Authorization: btoa(localStorage.getItem("msisdn"))
            }
        }).then((data) => {
            // console.log(data.data)
            var datalist = data.data.map((list, key) => {
                var nama = (JSON.parse([list][0]).nama).toLowerCase();
                setTimeout(() => {
                    document.getElementById(nama).addEventListener("touchend", () => {
                        setProfile(false)
                        setPage({
                            title: JSON.parse([list][0]).nama,
                            desc: JSON.parse([list][0]).desc,
                            katId: JSON.parse([list][0]).id
                        });
                        openSecondPage()
                    })
                },100)

                // JSON.parse([list][0]).nama
                return (
                <div className="p-2" id={`${(JSON.parse([list][0]).nama).toLowerCase()}`} key={`key${key}`}>
                    <div className="w-full flex flex-row justify-center">
                        <img src={`data:image/png;base64,${JSON.parse([list][0]).icon}`} />
                    </div>
                    <span className="flex flex-row justify-center text-center text-sm">{JSON.parse([list][0]).nama}</span>
                </div>)
            })

            setResults(datalist)
        })
    }

    useEffect(() => {
        getBarang();
    }, [])

    if('serviceWorker' in navigator) {
        navigator.serviceWorker.register(`${asset("service-worker.js")}`).then(
            reg => {
                return
            }, err => {
                console.error(`Something went wrong ${err}`)
            }
        )
    } else {
        console.log("Not supported")
    }

    return (
        <>
            <div id="refresher" className="md:hidden flex flex-row justify-center align-start w-full h-[100px] absolute -top-[80px] z-50">
                <img src="https://img.icons8.com/?size=100&id=ZpFMAFqTRpM7&format=png&color=000000" className="h-[80px]" />
            </div>
            <div className="w-screen h-screen overflow-hidden fixed top-0 left-0 z-50 flex flex-row justify-center items-center bg-white" id="loading-screen">
                <h2>Loading...</h2>
            </div>
            <div className="w-screen h-screen overflow-hidden fixed md:overflow-y-auto md:block">
                <div className="w-full h-screen z-10 absolute mb-24 inset-0 overflow-y-auto pb-[150px] md:relative md:pb-0 md:min-h-[730px] lg:min-h-[850px] md:max-h-[730px] md:overflow-hidden md:grid md:grid-cols-2 md:grid-rows-1 md:gap-10 md:px-10 xl:px-24 lg:grid-cols-3" id="first-screen">
                    <div className="hidden md:block h-[100px] w-full bg-gradient-to-b from-transparent to-purple-100 to-90% fixed bottom-0 right-0 z-40"></div>
                    <div className="hidden md:block absolute w-full">
                        <div className="h-96 bg-[#7a78ff] opacity-95"></div>
                        <img src={asset("background/decor-line-lg-preset2.png")} className="w-full h-[130px]" />
                    </div>
                    <div className="hidden md:block absolute top-0 w-full">
                        <div className="w-full h-[30px] bg-violet-600 absolute flex flex-row justify-between flex flex-row justify-between items-center px-10">
                            <div className="flex flex-row">
                                <span className="text-lg text-violet-950 mx-5 hover:text-indigo-400 hover:cursor-pointer">Keluhan Pelanggan: <a href="tel:6281213085680">+62 812-1308-5680</a></span>
                                <span className="text-lg text-violet-950 mx-5 hover:text-indigo-400 hover:cursor-pointer">Periksa Status Pembelian</span>
                            </div>
                            <div className="flex flex-row">
                                <span className="text-lg text-violet-950 mx-5 hover:text-indigo-400 hover:cursor-pointer">Syarat & Ketentuan</span>
                                <span className="text-lg text-violet-950 mx-5 hover:text-indigo-400 hover:cursor-pointer">Kebijakan Pribadi</span>
                            </div>
                        </div>
                        <div className="w-full mt-[30px] py-3 flex flex-row justify-between md:px-10 xl:px-24">
                            <div>
                                Hello World
                            </div>
                            <div className="flex flex-row items-center">
                                <span className="text-lg px-5 text-violet-700 font-bold hover:text-indigo-200 hover:cursor-pointer">Login</span>
                                <button className="text-lg text-white font-bold px-5 py-2 bg-gradient-from-tl bg-gradient-to-br from-pink-500 from-10% to-fuchsia-500 rounded-full hover:brightness-105">Sign Up</button>
                            </div>
                        </div>
                    </div>
                    <div className="hidden md:block w-full relative top-[105px] lg:col-span-2">
                        <div className="grid xl:grid-cols-2 gap-10">
                            <div className="block">
                                <div className="flex flex-row">
                                    <img src="https://img.icons8.com/?size=16&id=85638&format=png&color=6B21A8" className="w-[24px] h-[24px] mr-3" />
                                    <h3 className="font-bold mb-5 text-purple-800">Rekomen Buat Kamu</h3>
                                </div>
                                <div className="w-full h-[45vh] min-h-[300px] relative justify-items-center items-center grid grid-cols-5 grid-rows-3 lg:h-[60vh] lg:grid-cols-6 lg:grid-rows-3 xl:grid-cols-4 xl:grid-rows-4 gap-3">
                                    <div className="w-full h-full group/free-fire">
                                        <div className="h-[calc(100%-30px)] flex flex-row justify-center">
                                            <img src={asset("games/free-fire.jpeg")} className="rounded-3xl group/img group-hover/free-fire:brightness-125 group-hover/free-fire:cursor-pointer" />
                                        </div>
                                        <div className="text-purple-800 w-full h-30px font-bold text-lg text-center leading-5 pt-1 group/txt group-hover/free-fire:text-violet-700">Free Fire</div>
                                    </div>
                                    <div className="w-full h-full">
                                        <div className="h-[calc(100%-30px)] flex flex-row justify-center">
                                            <img src={asset("games/genshin-impact.webp")} className="rounded-3xl" />
                                        </div>
                                        <div className="text-purple-800 w-full h-30px font-bold text-lg text-center leading-5 pt-1">Genshin Impact</div>
                                    </div>
                                    <div className="w-full h-full">
                                        <div className="h-[calc(100%-30px)] flex flex-row justify-center">
                                            <img src={asset("games/honkai-star-rail.avif")} className="rounded-3xl" />
                                        </div>
                                        <div className="text-purple-800 w-full h-30px font-bold text-lg text-center leading-5 pt-1">Honkai:Star Rail</div>
                                    </div>
                                    <div className="w-full h-full">
                                        <div className="h-[calc(100%-30px)] flex flex-row justify-center">
                                            <img src={asset("games/mobile-legends.jpeg")} className="rounded-3xl" />
                                        </div>
                                        <div className="text-purple-800 w-full h-30px font-bold text-lg text-center leading-5 pt-1">Mobile Legends</div>
                                    </div>
                                    <div className="w-full h-full">
                                        <div className="h-[calc(100%-30px)] flex flex-row justify-center">
                                            <img src={asset("games/pubg_m.png")} className="rounded-3xl" />
                                        </div>
                                        <div className="text-purple-800 w-full h-30px font-bold text-lg text-center leading-5 pt-1">PUBG:Mobile</div>
                                    </div>
                                    <div className="w-full h-full">
                                        <div className="h-[calc(100%-30px)] flex flex-row justify-center">
                                            <img src={asset("games/free-fire.jpeg")} className="rounded-3xl" />
                                        </div>
                                        <div className="text-purple-800 w-full h-30px font-bold text-lg text-center leading-5 pt-1">Free Fire</div>
                                    </div>
                                    <div className="w-full h-full">
                                        <div className="h-[calc(100%-30px)] flex flex-row justify-center">
                                            <img src={asset("games/genshin-impact.webp")} className="rounded-3xl" />
                                        </div>
                                        <div className="text-purple-800 w-full h-30px font-bold text-lg text-center leading-5 pt-1">Genshin Impact</div>
                                    </div>
                                    <div className="w-full h-full">
                                        <div className="h-[calc(100%-30px)] flex flex-row justify-center">
                                            <img src={asset("games/honkai-star-rail.avif")} className="rounded-3xl" />
                                        </div>
                                        <div className="text-purple-800 w-full h-30px font-bold text-lg text-center leading-5 pt-1">Honkai:Star Rail</div>
                                    </div>
                                    <div className="w-full h-full">
                                        <div className="h-[calc(100%-30px)] flex flex-row justify-center">
                                            <img src={asset("games/mobile-legends.jpeg")} className="rounded-3xl" />
                                        </div>
                                        <div className="text-purple-800 w-full h-30px font-bold text-lg text-center leading-5 pt-1">Mobile Legends</div>
                                    </div>
                                    <div className="w-full h-full">
                                        <div className="h-[calc(100%-30px)] flex flex-row justify-center">
                                            <img src={asset("games/pubg_m.png")} className="rounded-3xl" />
                                        </div>
                                        <div className="text-purple-800 w-full h-30px font-bold text-lg text-center leading-5 pt-1">PUBG:Mobile</div>
                                    </div>
                                    <div className="w-full h-full">
                                        <div className="h-[calc(100%-30px)] flex flex-row justify-center">
                                            <img src={asset("games/free-fire.jpeg")} className="rounded-3xl" />
                                        </div>
                                        <div className="text-purple-800 w-full h-30px font-bold text-lg text-center leading-5 pt-1">Free Fire</div>
                                    </div>
                                    <div className="w-full h-full">
                                        <div className="h-[calc(100%-30px)] flex flex-row justify-center">
                                            <img src={asset("games/genshin-impact.webp")} className="rounded-3xl" />
                                        </div>
                                        <div className="text-purple-800 w-full h-30px font-bold text-lg text-center leading-5 pt-1">Genshin Impact</div>
                                    </div>
                                    <div className="w-full h-full">
                                        <div className="h-[calc(100%-30px)] flex flex-row justify-center">
                                            <img src={asset("games/honkai-star-rail.avif")} className="rounded-3xl" />
                                        </div>
                                        <div className="text-purple-800 w-full h-30px font-bold text-lg text-center leading-5 pt-1">Honkai:Star Rail</div>
                                    </div>
                                    <div className="w-full h-full">
                                        <div className="h-[calc(100%-30px)] flex flex-row justify-center">
                                            <img src={asset("games/mobile-legends.jpeg")} className="rounded-3xl" />
                                        </div>
                                        <div className="text-purple-800 w-full h-30px font-bold text-lg text-center leading-5 pt-1">Mobile Legends</div>
                                    </div>
                                    <div className="w-full h-full">
                                        <div className="h-[calc(100%-30px)] flex flex-row justify-center">
                                            <img src={asset("games/pubg_m.png")} className="rounded-3xl" />
                                        </div>
                                        <div className="text-purple-800 w-full h-30px font-bold text-lg text-center leading-5 pt-1">PUBG:Mobile</div>
                                    </div>
                                    <div className="w-full h-full lg:block xl:hidden hidden">
                                        <div className="h-[calc(100%-30px)] flex flex-row justify-center">
                                            <img src={asset("games/free-fire.jpeg")} className="rounded-3xl" />
                                        </div>
                                        <div className="text-purple-800 w-full h-30px font-bold text-lg text-center leading-5 pt-1">Free Fire</div>
                                    </div>
                                    <div className="w-full h-full lg:block xl:hidden hidden">
                                        <div className="h-[calc(100%-30px)] flex flex-row justify-center">
                                            <img src={asset("games/genshin-impact.webp")} className="rounded-3xl" />
                                        </div>
                                        <div className="text-purple-800 w-full h-30px font-bold text-lg text-center leading-5 pt-1">Genshin Impact</div>
                                    </div>
                                    <div className="w-full h-full lg:block xl:hidden hidden">
                                        <div className="h-[calc(100%-30px)] flex flex-row justify-center">
                                            <img src={asset("games/honkai-star-rail.avif")} className="rounded-3xl" />
                                        </div>
                                        <div className="text-purple-800 w-full h-30px font-bold text-lg text-center leading-5 pt-1">Honkai:Star Rail</div>
                                    </div>
                                    <div className="w-full h-full hidden xl:block">
                                        <div className="h-[calc(100%-30px)] flex flex-row justify-center">
                                            <img src={asset("games/pubg_m.png")} className="rounded-3xl" />
                                        </div>
                                        <div className="text-purple-800 w-full h-30px font-bold text-lg text-center leading-5 pt-1">PUBG:Mobile</div>
                                    </div>
                                </div>
                            </div>
                            <div className="hidden xl:block">
                                <div className="flex flex-row pr-2">
                                    <img src="https://img.icons8.com/?size=24&id=yXjcwMi2t2co&format=png&color=6B21A8" className="pr-2 h-[24px]" />
                                    <h3 className="font-bold mb-5 text-purple-800">Lagi Diskon Nih</h3>
                                </div>
                                <div className="w-full h-[45vh] min-h-[300px] relative justify-items-center items-center grid grid-cols-5 grid-rows-3 lg:h-[60vh] lg:grid-cols-6 lg:grid-rows-3 xl:grid-cols-4 xl:grid-rows-4 gap-3">
                                    <div className="w-full h-full">
                                        <div className="h-[calc(100%-30px)] flex flex-row justify-center">
                                            <img src={asset("games/free-fire.jpeg")} className="rounded-3xl" />
                                        </div>
                                        <div className="text-purple-800 w-full h-30px font-bold text-lg text-center leading-5 pt-1">Free Fire</div>
                                    </div>
                                    <div className="w-full h-full">
                                        <div className="h-[calc(100%-30px)] flex flex-row justify-center">
                                            <img src={asset("games/genshin-impact.webp")} className="rounded-3xl" />
                                        </div>
                                        <div className="text-purple-800 w-full h-30px font-bold text-lg text-center leading-5 pt-1">Genshin Impact</div>
                                    </div>
                                    <div className="w-full h-full">
                                        <div className="h-[calc(100%-30px)] flex flex-row justify-center">
                                            <img src={asset("games/honkai-star-rail.avif")} className="rounded-3xl" />
                                        </div>
                                        <div className="text-purple-800 w-full h-30px font-bold text-lg text-center leading-5 pt-1">Honkai:Star Rail</div>
                                    </div>
                                    <div className="w-full h-full">
                                        <div className="h-[calc(100%-30px)] flex flex-row justify-center">
                                            <img src={asset("games/mobile-legends.jpeg")} className="rounded-3xl" />
                                        </div>
                                        <div className="text-purple-800 w-full h-30px font-bold text-lg text-center leading-5 pt-1">Mobile Legends</div>
                                    </div>
                                    <div className="w-full h-full">
                                        <div className="h-[calc(100%-30px)] flex flex-row justify-center">
                                            <img src={asset("games/pubg_m.png")} className="rounded-3xl" />
                                        </div>
                                        <div className="text-purple-800 w-full h-30px font-bold text-lg text-center leading-5 pt-1">PUBG:Mobile</div>
                                    </div>
                                    <div className="w-full h-full">
                                        <div className="h-[calc(100%-30px)] flex flex-row justify-center">
                                            <img src={asset("games/free-fire.jpeg")} className="rounded-3xl" />
                                        </div>
                                        <div className="text-purple-800 w-full h-30px font-bold text-lg text-center leading-5 pt-1">Free Fire</div>
                                    </div>
                                    <div className="w-full h-full">
                                        <div className="h-[calc(100%-30px)] flex flex-row justify-center">
                                            <img src={asset("games/genshin-impact.webp")} className="rounded-3xl" />
                                        </div>
                                        <div className="text-purple-800 w-full h-30px font-bold text-lg text-center leading-5 pt-1">Genshin Impact</div>
                                    </div>
                                    <div className="w-full h-full">
                                        <div className="h-[calc(100%-30px)] flex flex-row justify-center">
                                            <img src={asset("games/honkai-star-rail.avif")} className="rounded-3xl" />
                                        </div>
                                        <div className="text-purple-800 w-full h-30px font-bold text-lg text-center leading-5 pt-1">Honkai:Star Rail</div>
                                    </div>
                                    <div className="w-full h-full">
                                        <div className="h-[calc(100%-30px)] flex flex-row justify-center">
                                            <img src={asset("games/mobile-legends.jpeg")} className="rounded-3xl" />
                                        </div>
                                        <div className="text-purple-800 w-full h-30px font-bold text-lg text-center leading-5 pt-1">Mobile Legends</div>
                                    </div>
                                    <div className="w-full h-full">
                                        <div className="h-[calc(100%-30px)] flex flex-row justify-center">
                                            <img src={asset("games/pubg_m.png")} className="rounded-3xl" />
                                        </div>
                                        <div className="text-purple-800 w-full h-30px font-bold text-lg text-center leading-5 pt-1">PUBG:Mobile</div>
                                    </div>
                                    <div className="w-full h-full">
                                        <div className="h-[calc(100%-30px)] flex flex-row justify-center">
                                            <img src={asset("games/free-fire.jpeg")} className="rounded-3xl" />
                                        </div>
                                        <div className="text-purple-800 w-full h-30px font-bold text-lg text-center leading-5 pt-1">Free Fire</div>
                                    </div>
                                    <div className="w-full h-full">
                                        <div className="h-[calc(100%-30px)] flex flex-row justify-center">
                                            <img src={asset("games/genshin-impact.webp")} className="rounded-3xl" />
                                        </div>
                                        <div className="text-purple-800 w-full h-30px font-bold text-lg text-center leading-5 pt-1">Genshin Impact</div>
                                    </div>
                                    <div className="w-full h-full">
                                        <div className="h-[calc(100%-30px)] flex flex-row justify-center">
                                            <img src={asset("games/honkai-star-rail.avif")} className="rounded-3xl" />
                                        </div>
                                        <div className="text-purple-800 w-full h-30px font-bold text-lg text-center leading-5 pt-1">Honkai:Star Rail</div>
                                    </div>
                                    <div className="w-full h-full">
                                        <div className="h-[calc(100%-30px)] flex flex-row justify-center">
                                            <img src={asset("games/mobile-legends.jpeg")} className="rounded-3xl" />
                                        </div>
                                        <div className="text-purple-800 w-full h-30px font-bold text-lg text-center leading-5 pt-1">Mobile Legends</div>
                                    </div>
                                    <div className="w-full h-full">
                                        <div className="h-[calc(100%-30px)] flex flex-row justify-center">
                                            <img src={asset("games/pubg_m.png")} className="rounded-3xl" />
                                        </div>
                                        <div className="text-purple-800 w-full h-30px font-bold text-lg text-center leading-5 pt-1">PUBG:Mobile</div>
                                    </div>
                                    <div className="w-full h-full lg:block xl:hidden hidden">
                                        <div className="h-[calc(100%-30px)] flex flex-row justify-center">
                                            <img src={asset("games/free-fire.jpeg")} className="rounded-3xl" />
                                        </div>
                                        <div className="text-purple-800 w-full h-30px font-bold text-lg text-center leading-5 pt-1">Free Fire</div>
                                    </div>
                                    <div className="w-full h-full lg:block xl:hidden hidden">
                                        <div className="h-[calc(100%-30px)] flex flex-row justify-center">
                                            <img src={asset("games/genshin-impact.webp")} className="rounded-3xl" />
                                        </div>
                                        <div className="text-purple-800 w-full h-30px font-bold text-lg text-center leading-5 pt-1">Genshin Impact</div>
                                    </div>
                                    <div className="w-full h-full lg:block xl:hidden hidden">
                                        <div className="h-[calc(100%-30px)] flex flex-row justify-center">
                                            <img src={asset("games/honkai-star-rail.avif")} className="rounded-3xl" />
                                        </div>
                                        <div className="text-purple-800 w-full h-30px font-bold text-lg text-center leading-5 pt-1">Honkai:Star Rail</div>
                                    </div>
                                    <div className="w-full h-full hidden xl:block">
                                        <div className="h-[calc(100%-30px)] flex flex-row justify-center">
                                            <img src={asset("games/free-fire.jpeg")} className="rounded-3xl" />
                                        </div>
                                        <div className="text-purple-800 w-full h-30px font-bold text-lg text-center leading-5 pt-1">Free Fire</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div className="hidden md:block w-full h-[300px] relative right-0 pt-5">
                            <h2>Testimonial & Motivations</h2>
                            <div className="grid grid-cols-2 lg:grid-cols-2">
                                <div className="flex flex-row justify-center lg:col-span-2">
                                    <div className="rounded-3xl border-gray-200 border-2 bg-white w-full h-[150px] mt-16 mx-2 px-3 pb-2 lg:block hidden">
                                        <div className="flex flex-row justify-center">
                                            <img src="#" className="w-[82px] h-[82px] border-1 border-gray-200 bg-gray-300 rounded-full -mt-14" />
                                        </div>
                                        <div className="w-full text-center">Gilang Samudera</div>
                                        <div className="w-full text-center text-gray-400 text-sm">YouTuber</div>
                                        <div className="flex flex-row align-center h-full w-full -mt-[70px] pt-[70px]">
                                            <p className="text-center mt-2 w-full line-clamp-3">Situs game terbaik yang pernah saya coba, banyak diskon kaya akan fitur. Semoga semakin sukses deh buat PINNET.</p>
                                        </div>
                                    </div>
                                    <div className="rounded-3xl border-gray-200 border-2 bg-white w-full h-[150px] mt-16 mx-2">
                                        <div className="flex flex-row justify-center">
                                            <img src="#" className="w-[82px] h-[82px] border-1 border-gray-200 bg-gray-300 rounded-full -mt-14" />
                                        </div>
                                        <div className="w-full text-center">Mang Acok</div>
                                        <div className="w-full text-center text-gray-400 text-sm">Hacker</div>
                                        <div className="flex flex-row align-center h-full w-full -mt-[70px] pt-[70px]">
                                            <p className="text-center mt-2 w-full line-clamp-3">Mohon info cara ambil data pinet, soalnya saya gagal terus dari kemarin</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <img src={asset('background/gradient-background.avif')} className="md:hidden h-screen blur-xl fixed" />
                    <div className="w-full flex flex-row justify-center z-30 relative md:hidden">
                        <div className="w-11/12 bg-white top-[10px] flex flex-row justify-between items-center absolute rounded-xl p-2">
                            <p>Hello World</p>
                            <div className="grid grid-cols-2 items-center">
                                <img src="https://img.icons8.com/?size=24&id=4mJGn1D1b2Xr&format=png&color=000000" className="h-[24px] justify-self-center" />
                                <div className="w-[32px] h-[32px] justify-self-end rounded-full bg-slate-300 animate-pulse" id="profile"></div>
                            </div>
                        </div>
                    </div>
                    <div className="w-full flex flex-row justify-center absolute z-20 h-[30vh] md:hidden">
                        <div className="w-11/12 grid grid-cols-2 items-center">
                            <div className="flex flex-row justify-center justify-items-stretch">
                                <div className="bg-transparent text-6xl text-white justify-self-center">{ number }</div>
                                <span className="text-white text-lg self-end">{ hour >= 12 ? "PM" : "AM" }</span>
                            </div>
                            <div className="bg-white justify-self-center p-2 rounded-xl flex flex-row">
                                <div className="pr-3 self-center">
                                    <img src="https://img.icons8.com/?size=32&id=76955&format=png&color=000000" />
                                </div>
                                <div className="grid grid-rows-2">
                                    <span className="font-bold text-lg" id="saldo"></span>
                                    <span className="text-sm text-slate-500" id="point"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div className="block md:hidden w-full h-[30vh] overflow-hidden md:rounded-3xl rounded-b-3xl z-10 relative">
                        <img src={asset('/background/wallpaper.jpg')} className="md:h-full md:w-full" />
                    </div>
                    <div className="w-full flex flex-row justify-center z-30 relative md:left-0 md:top-[150px] md:h-[40vh]">
                        {/* <div className="border-2 border-slate-100 w-full h-[100px] bg-white grid grid-rows-2 grid-cols-4 absolute rounded-3xl md:-bottom-[70px] md:z-20">
                        </div> */}
                        <div className="md:block hidden w-full h-[40vh] min-h-[230px] max-h-[230px] lg:max-h-[300px] overflow-hidden rounded-3xl z-10 relative">
                            <img src={asset('/background/wallpaper.jpg')} className="h-full w-full" />
                        </div>
                        <div id="listBarang" className="border-2 border-slate-200 w-11/12 bg-white -mt-[55px] grid grid-rows-2 grid-cols-4 absolute rounded-3xl md:-bottom-[393px] md:z-20">
                            {results}
                            {/* <div className="p-2">
                                <div className="w-full flex flex-row justify-center">
                                    <img src="https://img.icons8.com/?size=24&id=U58b026iaG3k&format=png&color=000000" />
                                </div>
                                <span className="flex flex-row justify-center text-center text-sm">Pulsa & Data</span>
                            </div>
                            <div className="p-2">
                                <div className="w-full flex flex-row justify-center">
                                    <img src="https://img.icons8.com/?size=24&id=52550&format=png&color=000000" />
                                </div>
                                <span className="flex flex-row justify-center text-center text-sm">Token Listrik</span>
                            </div>
                            <div className="p-2">
                                <div className="w-full flex flex-row justify-center">
                                    <img src="https://img.icons8.com/?size=24&id=43967&format=png&color=000000" />
                                </div>
                                <span className="flex flex-row justify-center text-center text-sm">E Money</span>
                            </div>
                            <div className="p-2 text-center">
                                <div className="w-full flex flex-row justify-center">
                                    <img src="https://img.icons8.com/?size=24&id=TMIV5nMneLUt&format=png&color=000000" />
                                </div>
                                <span className="flex flex-row justify-center text-center text-sm">Nonton</span>
                            </div>
                            <div className="p-2 text-center">F</div>
                            <div className="p-2 text-center">G</div>
                            <div className="p-2 text-center">H</div> */}
                            <div className="hidden md:block p-3 col-span-4">
                                <input type="text" className="w-full py-1 px-5 text-lg placeholder:text-purple-300 rounded-full border border-purple-300 focus:outline-purple-400" placeholder="Telkomsel data bulk 10GB" />
                            </div>
                            <div className="hidden md:grid px-3 pt-5 pb-2 font-bold col-span-4">Direct Top Up</div>
                            <div className="hidden md:grid grid-cols-4 col-span-4 px-3 pb-10 gap-3 mb-5 overflow-y-auto h-[250px] max-h-[250px]">
                                <div className="block">
                                    <img src={asset("games/free-fire.jpeg")} className="rounded-3xl" />
                                    <div className="flex flex-row justify-center text-center leading-5 font-bold">Free Fire</div>
                                </div>
                                <div className="block">
                                    <img src={asset("games/genshin-impact.webp")} className="rounded-3xl" />
                                    <div className="flex flex-row justify-center text-center leading-5 font-bold">Genshin Impact</div>
                                </div>
                                <div className="block">
                                    <img src={asset("games/honkai-star-rail.avif")} className="rounded-3xl" />
                                    <div className="flex flex-row justify-center text-center leading-5 font-bold">Honkai:Star Rail</div>
                                </div>
                                <div className="block">
                                    <img src={asset("games/mobile-legends.jpeg")} className="rounded-3xl" />
                                    <div className="flex flex-row justify-center text-center leading-5 font-bold">Mobile Legends</div>
                                </div>
                                <div className="block">
                                    <img src={asset("games/pubg_m.png")} className="rounded-3xl" />
                                    <div className="flex flex-row justify-center text-center leading-5 font-bold">PUBG: Mobile</div>
                                </div>
                                <div className="block">
                                    <img src={asset("games/free-fire.jpeg")} className="rounded-3xl" />
                                    <div className="flex flex-row justify-center text-center leading-5 font-bold">Free Fire</div>
                                </div>
                                <div className="block">
                                    <img src={asset("games/genshin-impact.webp")} className="rounded-3xl" />
                                    <div className="flex flex-row justify-center text-center leading-5 font-bold">Genshin Impact</div>
                                </div>
                                <div className="block">
                                    <img src={asset("games/honkai-star-rail.avif")} className="rounded-3xl" />
                                    <div className="flex flex-row justify-center text-center leading-5 font-bold">Honkai:Star Rail</div>
                                </div>
                                <div className="block">
                                    <img src={asset("games/mobile-legends.jpeg")} className="rounded-3xl" />
                                    <div className="flex flex-row justify-center text-center leading-5 font-bold">Mobile Legends</div>
                                </div>
                                <div className="block">
                                    <img src={asset("games/pubg_m.png")} className="rounded-3xl" />
                                    <div className="flex flex-row justify-center text-center leading-5 font-bold">PUBG: Mobile</div>
                                </div>
                                <div className="block">
                                    <img src={asset("games/free-fire.jpeg")} className="rounded-3xl" />
                                    <div className="flex flex-row justify-center text-center leading-5 font-bold">Free Fire</div>
                                </div>
                                <div className="block">
                                    <img src={asset("games/genshin-impact.webp")} className="rounded-3xl" />
                                    <div className="flex flex-row justify-center text-center leading-5 font-bold">Genshin Impact</div>
                                </div>
                                <div className="block">
                                    <img src={asset("games/honkai-star-rail.avif")} className="rounded-3xl" />
                                    <div className="flex flex-row justify-center text-center leading-5 font-bold">Honkai:Star Rail</div>
                                </div>
                                <div className="block">
                                    <img src={asset("games/mobile-legends.jpeg")} className="rounded-3xl" />
                                    <div className="flex flex-row justify-center text-center leading-5 font-bold">Mobile Legends</div>
                                </div>
                                <div className="block">
                                    <img src={asset("games/pubg_m.png")} className="rounded-3xl" />
                                    <div className="flex flex-row justify-center text-center leading-5 font-bold">PUBG: Mobile</div>
                                </div>
                                <div className="block">
                                    <img src={asset("games/free-fire.jpeg")} className="rounded-3xl" />
                                    <div className="flex flex-row justify-center text-center leading-5 font-bold">Free Fire</div>
                                </div>
                                <div className="block">
                                    <img src={asset("games/genshin-impact.webp")} className="rounded-3xl" />
                                    <div className="flex flex-row justify-center text-center leading-5 font-bold">Genshin Impact</div>
                                </div>
                                <div className="block">
                                    <img src={asset("games/honkai-star-rail.avif")} className="rounded-3xl" />
                                    <div className="flex flex-row justify-center text-center leading-5 font-bold">Honkai:Star Rail</div>
                                </div>
                                <div className="block">
                                    <img src={asset("games/mobile-legends.jpeg")} className="rounded-3xl" />
                                    <div className="flex flex-row justify-center text-center leading-5 font-bold">Mobile Legends</div>
                                </div>
                                <div className="block">
                                    <img src={asset("games/pubg_m.png")} className="rounded-3xl" />
                                    <div className="flex flex-row justify-center text-center leading-5 font-bold">PUBG: Mobile</div>
                                </div>
                            </div>
                            <div className="hidden md:block absolute w-[99%] h-[30px] z-20 bg-gradient-to-b to-transparent from-white top-[185px]"></div>
                            <div className="hidden md:block absolute w-[99%] h-[30px] z-20 bg-gradient-to-b from-transparent to-white bottom-0 mb-5"></div>
                        </div>
                    </div>
                    <div className="w-full justify-center flex flex-row z-10 relative md:hidden">
                        <div className="w-11/12">
                            <h5 className="mt-[60px] opacity-70 text-purple-500 font-black">Flash Sale</h5>
                        </div>
                    </div>
                    <div className="w-full justify-center flex flex-row z-10 relative mt-2 md:hidden">
                        <div className="w-11/12 h-[60px]">
                            <div className="w-full h-full bg-white rounded-3xl flex flex-row">
                                <div className="bg-slate-300 min-w-[50px] self-center rounded-2xl h-[50px] ml-[5px] animate-pulse"></div>
                                <div className="block w-full p-3">
                                    <div className="animate-pulse w-8/12 h-[12px] bg-slate-300 rounded-full"></div>
                                    <div className="animate-pulse w-full h-[10px] mt-2 bg-slate-300 rounded-full"></div>
                                    <div className="animate-pulse w-10/12 h-[10px] mt-2 bg-slate-300 rounded-full"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div className="w-full justify-center flex flex-row z-10 relative md:hidden">
                        <div className="w-11/12">
                            <h5 className="mt-[20px] opacity-70 text-purple-500 font-black">Berita</h5>
                        </div>
                    </div>
                    <div className="w-full flex flex-row justify-center z-10 relative mt-2 md:hidden">
                        <div className="grid grid-cols-2 gap-6 w-11/12">
                            <div className="bg-white overflow-hidden rounded-3xl w-full">
                                <div className="h-40">
                                    <img src={asset('cache/news-wuthering-waves.jpg')} className="h-full" />
                                </div>
                                <div className="w-full p-2">
                                    <h5 className="line-clamp-2 leading-5 pt-1">Wuthering Waves Vol 1 The beginning</h5>
                                    {/* <button type="button" className="w-full flex flex-row justify-center py-2 bg-slate-200 rounded-full mt-3">Baca Selengkapnya</button> */}
                                    <span className="text-sm text-slate-400">Kuro Games</span>
                                </div>
                            </div>
                            <div className="bg-white overflow-hidden rounded-3xl w-full">
                                <div className="h-40">
                                    <img src={asset('cache/news-wuthering-waves.jpg')} className="h-full" />
                                </div>
                                <div className="w-full p-2">
                                    <h5 className="line-clamp-2 leading-5 pt-1">Wuthering Waves Vol 2 New Comer</h5>
                                    {/* <button type="button" className="w-full flex flex-row justify-center py-2 bg-slate-200 rounded-full mt-3">Baca Selengkapnya</button> */}
                                    <span className="text-sm text-slate-400">Kuro Games</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {/* <div className="hidden md:block w-full h-[80vh] max-h-[500px] min-h-[500px] lg:min-h-[300px] lg:max-h-[350px] relative -mt-[500px] right-0"></div> */}
                <div className="w-full h-screen overflow-x-hidden top-0 left-full absolute z-20 inset-0 bg-slate-100 md:hidden" id="second-screen">
                    <div className="w-[50px] h-screen bg-white absolute left-0 z-30 opacity-0" id="second-screen-swipe"></div>
                    <img src="https://img.freepik.com/free-vector/gradient-pink-blue-blur-phone-wallpaper-vector_53876-169255.jpg" className="h-screen blur-xl absolute" />
                    <div className="w-full my-5 flex flex-row justify-center">
                        <div className="w-11/12">
                            <img id="back" className="relative z-30" src="https://img.icons8.com/?size=24&id=7811&format=png&color=000000" />
                        </div>
                    </div>
                    { isProfile ? (
                        <Profile></Profile>
                    )
                    :
                    (
                        <>
                            <Products page={isPage} />
                            <Subpage operator={isOperator} />
                        </>
                    )}
                </div>
                <div className="w-full py-5 rounded-3xl border-2 border-slate-200 bg-white absolute z-20 top-[100%] md:hidden" id="bottom-screen">
                    <div className="w-full h-[50px] opacity-0 -mt-[20px] absolute" id="swipe-down"></div>
                    <div className="flex flex-row justify-center">
                        <div className="w-[50px] h-[5px] rounded-xl bg-slate-300"></div>
                    </div>
                </div>
                <div id="dark-screen" className="absolute w-full h-screen" style={{ backgroundColor: "#00000000", display: "none", zIndex: "0" }}></div>
                <div id="dropup" className="w-full h-[30vh] bg-white rounded-[30px] border-2 px-3 pt-5 border-secondary absolute z-[50]" style={{ bottom: "-30vh" }}>
                    <div class="flex flex-row justify-center mb-3">
                        <div class="border-2 border-slate-200 w-[80px]"></div>
                    </div>
                    <h3 class="mb-3">Pilih metode pembayaran</h3>
                    <button type="button" id="#" class="bg-gray-100 border border-gray-300 mx-2 p-3 rounded-lg">Bank</button>
                    <button type="button" id="#" class="bg-gray-100 border border-gray-300 mx-2 p-3 rounded-lg">E-Wallet</button>
                    <button type="button" id="#" class="bg-gray-100 border border-gray-300 mx-2 p-3 rounded-lg">Retail</button>
                </div>
            </div>
        </>
    );
}

export default Home;