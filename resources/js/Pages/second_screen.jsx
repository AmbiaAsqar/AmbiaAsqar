import axios from "axios";
import React, { useEffect, useState, useMemo } from "react";
import { openSecondPage, closeSecondPage } from "../Components/default.jsx";
import { variables } from "../env";

const asset = (path) => {
    return `/storage/${path}`;
}

export const Products = (props) => {
    const [isProfile, setProfile] = useState(false);
    const [isListProduct, setListProduct] = useState([]);
    const subpage = document.getElementById("sub-page");

    // useEffect(() => {
    //     document.getElementById("hsr").addEventListener("click", () => {
    //         document.getElementById("bottom-screen").style.top = "50px";
    //         document.getElementById("bottom-screen").style.setProperty("height", "calc(100vh - 50px)");
    //         document.getElementById("bottom-screen").style.transition = "top 1s ease-in";
    //     })
    // })

    useEffect(() => {
        if(!JSON.parse(sessionStorage.getItem("page_"+(props.page.title).replace(/[^A-Z0-9]+/ig, "").toLowerCase()))) {
            document.addEventListener("DOMContentLoaded", () => {
                setTimeout(() => {
                    document.getElementById("refresh-content").setAttribute("class", "visible")

                    document.getElementById("refresh-content").addEventListener("touchend", () => {
                        sessionStorage.removeItem("page_"+(props.page.title).replace(/[^A-Z0-9]+/ig, "").toLowerCase())
        
                        setTimeout(() => {
                            document.getElementById(" #products").reload();
                        }, 100);
                    });
                },100);
            })
        } else {
            setTimeout(() => {
                if(!document.getElementById("refresh-content")) {
                    return
                } else {
                    document.getElementById("refresh-content").setAttribute("class", "visible")
                }

                document.getElementById("refresh-content").addEventListener("touchend", () => {
                    sessionStorage.removeItem("page_"+(props.page.title).replace(/[^A-Z0-9]+/ig, "").toLowerCase())

                    setTimeout(() => {
                        location.reload();
                    }, 100);
                });
            },100);
        }

        if(!JSON.parse(sessionStorage.getItem("operator"))) {
            return
        } else {
            if(document.getElementById(JSON.parse(sessionStorage.getItem("operator")).operatorName.replace(/[^A-Z0-9]+/ig, "").toLowerCase()) === null) return

            document.getElementById(JSON.parse(sessionStorage.getItem("operator")).operatorName.replace(/[^A-Z0-9]+/ig, "").toLowerCase()).addEventListener("touchend", () => {
                setOperator({
                    "title": JSON.parse(sessionStorage.getItem("operator")).operatorName,
                    "desc": "",
                    "katId": JSON.parse(sessionStorage.getItem("operator")).operatorId
                })

                // openSecondPage()
                return
            })
        }
    });

    useEffect(() => {
        var back = document.getElementById("back");

        back.addEventListener("click", () => {
            setTimeout(() => {
                if(!document.getElementById('title')) {
                    return
                } else {
                    document.getElementById('title').innerText = "";
                    document.getElementById('description').innerText = "";
                    document.getElementById("refresh-content").setAttribute("class", "invisible")
                }
                props.page.title = "";
                setListProduct([])
            }, 1000)

            let skeleton = document.querySelectorAll("#skeleton")
            skeleton.forEach((el) => {
                el.style.display = "none"
            })

            setProfile(false);
            closeSecondPage();
        })
    })

    const storeCache = async () => {
        var page = {
            title : props.page.title,
            desc : props.page.desc,
            product : isListProduct
        }

        sessionStorage.setItem("page_"+(props.page.title).replace(/[^A-Z0-9]+/ig, "").toLowerCase(), JSON.stringify(page))
    }

    const getListProduct = async () => {
        axios.post(`${variables("APP_URL")}:${variables("APP_PORT")}/kategori/operator/`,
        {
            id: props.page.katId
        },
        {
            headers: {
                'Authorization': btoa(localStorage.getItem("msisdn")),
                'X-Requested-With': 'XMLHttpRequest'
            }
        }).then((success) => {
            if(!document.getElementById("title")) {
                return
            } else {
                document.getElementById("title").innerText = props.page.title
                document.getElementById("description").innerText = props.page.desc
                document.getElementById("refresh-content").setAttribute("class", "visible")
            }

            var prodList = success.data.map((list,key) => {
                setTimeout(() => {
                    document.getElementById((JSON.parse([list][0]).nama).replace(/[^A-Z0-9]+/ig, "").toLowerCase()).addEventListener("touchend", () => {
                        setProfile(false);
                        subpage.style.left = "0";
                        subpage.style.transition = "left .5s";
                        document.getElementById("footer-button").style.marginBottom = "-100px";
                        document.getElementById("footer-button").style.transition = "margin-bottom .5s";
                        sessionStorage.setItem("operator", JSON.stringify({
                            operatorId: JSON.parse(list).id,
                            operatorName: JSON.parse(list).nama,
                        }))
                    })
                }, 500)

                return (<div id={`${JSON.parse(list).nama.replace(/[^A-Z0-9]+/ig, "").toLowerCase()}`} dbid={JSON.parse(list).id} key={`id${key}`}>
                    <span className="ribbon"></span>
                    <img src={`data:image/png;base64,${JSON.parse(list).thumbnail}`} className="h-[80px] object-cover object-center w-full rounded-3xl bg-slate-200" />
                    <h6 className="font-bold line-clamp-2 leading-5 mt-2 text-center text-slate-500">{JSON.parse(list).nama}</h6>
                </div>)
            })

            setListProduct(prodList)
        })
    }

    if(props.page.title === "") {
        return
        // console.log("%c%s%c%s", "color: red", "Failed: ", "", "User is not in second page")
    } else {
        if(sessionStorage.getItem("page_"+(props.page.title).replace(/[^A-Z0-9]+/ig, "").toLowerCase()) === null) {
            // console.log("Gathering Data...")
            getListProduct().then(() => {
                if(isListProduct.length < 1) {
                    return
                    // return console.log("Failed to get data")
                }
                // console.log("%s%s%c%s%c%s%c%s%c%s", "Data succesfully created.\n", "Now, storing data of ", "color: #ff0000; font-weight: bold", props.page.title, "", " into Session Storage ", "color: #ff0000; font-weight: bold", `page_${(props.page.title).replace(/[^A-Z0-9]+/ig, "").toLowerCase()}`, "", " as cache")
                storeCache().then(() => {
                    let skeleton = document.querySelectorAll("#skeleton")
                    skeleton.forEach((el) => {
                        el.style.display = "none"
                    })
                    console.log(`%c${JSON.parse(sessionStorage.getItem("page_"+(props.page.title).replace(/[^A-Z0-9]+/ig, "").toLowerCase())).title} stored succesfully.`, "color: #00AAFF")
                    return
                }).catch(err => {
                    console.error("Failed to store data\n", err)
                })
            }).catch(err => {
                var error = new Error();
                console.error("something went wrong at line: " + error.stack + "\n" + err)
            })
        } else {
            setTimeout(() => {
                if(JSON.parse(sessionStorage.getItem("page_"+(props.page.title).replace(/[^A-Z0-9]+/ig, "").toLowerCase())) === null) return

                var prodList = JSON.parse(sessionStorage.getItem("page_"+(props.page.title).replace(/[^A-Z0-9]+/ig, "").toLowerCase())).product.map((list, key) => {
                    setTimeout(() => {
                        if(props.page.title === "" || list.props === null) return

                        if(!document.getElementById((list.props.children[2].props.children).replace(/[^A-Z0-9]+/ig, "").toLowerCase())) {
                            return
                        } else {
                            document.getElementById((list.props.children[2].props.children).replace(/[^A-Z0-9]+/ig, "").toLowerCase()).addEventListener("touchend", () => {
                                setProfile(false);
                                subpage.style.left = "0";
                                subpage.style.transition = "left .5s";
                                document.getElementById("footer-button").style.marginBottom = "-100px";
                                document.getElementById("footer-button").style.transition = "margin-bottom .5s";
                                sessionStorage.setItem("operator", JSON.stringify({
                                    operatorId: list.props.dbid,
                                    operatorName: (list.props.children[2].props.children).replace(/[^A-Z0-9]+/ig, "").toLowerCase()
                                }))
                                return
                            })
                        }
                    }, 500);

                    return (
                        <div id={`${(list.props.children[2].props.children).replace(/[^A-Z0-9]+/ig, "").toLowerCase()}`} dbid={props.page.katId} key={`id${key}`}>
                            <span className="ribbon"></span>
                            <img src={`${list.props.children[1].props.src}`} className={`${list.props.children[1].props.className}`} />
                            <h6 className={`${list.props.children[2].props.className}`}>{list.props.children[2].props.children}</h6>
                        </div>
                    )
                })

                document.getElementById("title").innerText = JSON.parse(sessionStorage.getItem("page_"+(props.page.title).replace(/[^A-Z0-9]+/ig, "").toLowerCase())).title
                document.getElementById("description").innerText = JSON.parse(sessionStorage.getItem("page_"+(props.page.title).replace(/[^A-Z0-9]+/ig, "").toLowerCase())).desc

                setListProduct(prodList)

                let skeleton = document.querySelectorAll("#skeleton")
                skeleton.forEach((el) => {
                    el.style.display = "none"
                })
            },100);
        }
    }

    return(
        <div className="w-full flex flex-row justify-center" id="secondPage-wrapper">
            <div className="w-11/12">
                <div className="w-full p-3 bg-white relative z-10 rounded-3xl">
                    <div className="flex flex-row w-full justify-between items-center">
                        <h3 className="font-bold" id="title"><div className="w-full relative mb-3 bg-slate-300 rounded-full h-[20px] animate-pulse"></div></h3>
                        <img id="refresh-content" className="invisible" src="https://img.icons8.com/?size=24&id=yVXBaH0qYcFo&format=png&color=000000" style={{ width: "16px", height: "16px" }}/>
                    </div>
                    <span className="text-md text-slate-500" id="description"><div className="w-5/4 h-[10px] bg-slate-300 rounded-full relative animate-pulse"></div></span>
                </div>
                <div id="products" className="w-full mt-3 pb-1 bg-white relative z-10 rounded-3xl">
                    <div className="p-3">
                        <input type="search" className="w-full h-[30px] px-5 rounded-full border border-slate-200" placeholder="Cari permainan favoritmu" />
                    </div>
                    <ul className="p-0 list-none flex flex-row">
                        <li className="px-5">Populer</li>
                        <li className="px-5">Terbaru</li>
                        <li className="px-5">Paling Disukai</li>
                        <li className="px-5">Terlaris</li>
                    </ul>
                    <div className="w-100 px-5 my-10 grid grid-cols-4 gap-3" id="productField">
                        { isListProduct }
                        <div id="skeleton">
                            <div className="bg-slate-300 w-full h-[80px] animate-pulse rounded-3xl"></div>
                            <div className="w-full h-[10px] bg-slate-300 animate-pulse mt-2 rounded-full"></div>
                            <div className="w-full justify-center flex flex-row">
                                <div className="w-1/2 h-[10px] bg-slate-300 animate-pulse mt-1 rounded-full"></div>
                            </div>
                        </div>
                        <div id="skeleton">
                            <div className="bg-slate-300 w-full h-[80px] animate-pulse rounded-3xl"></div>
                            <div className="w-full h-[10px] bg-slate-300 animate-pulse mt-2 rounded-full"></div>
                            <div className="w-full justify-center flex flex-row">
                                <div className="w-1/2 h-[10px] bg-slate-300 animate-pulse mt-1 rounded-full"></div>
                            </div>
                        </div>
                        <div id="skeleton">
                            <div className="bg-slate-300 w-full h-[80px] animate-pulse rounded-3xl"></div>
                            <div className="w-full h-[10px] bg-slate-300 animate-pulse mt-2 rounded-full"></div>
                            <div className="w-full justify-center flex flex-row">
                                <div className="w-1/2 h-[10px] bg-slate-300 animate-pulse mt-1 rounded-full"></div>
                            </div>
                        </div>
                        <div id="skeleton">
                            <div className="bg-slate-300 w-full h-[80px] animate-pulse rounded-3xl"></div>
                            <div className="w-full h-[10px] bg-slate-300 animate-pulse mt-2 rounded-full"></div>
                            <div className="w-full justify-center flex flex-row">
                                <div className="w-1/2 h-[10px] bg-slate-300 animate-pulse mt-1 rounded-full"></div>
                            </div>
                        </div>
                        {/* <div id="hsr">
                            <span className="ribbon"></span>
                            <img src={asset('games/honkai-star-rail.avif')} className="h-80px w-full rounded-3xl bg-slate-200" />
                            <h6 className="font-bold line-clamp-2 leading-5 mt-2 text-center text-slate-500">Honkai Star Rail</h6>
                        </div>
                        <div>
                            <img src={asset('games/genshin-impact.webp')} className="h-80px w-full rounded-3xl bg-slate-200" />
                            <h6 className="font-bold line-clamp-2 leading-5 mt-2 text-center text-slate-500">Genshin Impact</h6>
                        </div>
                        <div>
                            <img src={asset('games/mobile-legends.jpeg')} className="h-80px w-full rounded-3xl bg-slate-200" />
                            <h6 className="font-bold line-clamp-2 leading-5 mt-2 text-center text-slate-500">Mobile Legends</h6>
                        </div>
                        <div>
                            <img src={asset('games/free-fire.jpeg')} className="h-80px w-full rounded-3xl bg-slate-200" />
                            <h6 className="font-bold line-clamp-2 leading-5 mt-2 text-center text-slate-500">Free Fire</h6>
                        </div>
                        <div>
                            <img src={asset('games/pubg_m.png')} className="h-80px w-full rounded-3xl bg-slate-200" />
                            <h6 className="font-bold line-clamp-2 leading-5 mt-2 text-center text-slate-500">PUBG Indonesia</h6>
                        </div> */}
                    </div>
                </div>
            </div>
        </div>
    );
}

export const Subpage = (props) => {
    useEffect(() => {
        if(!JSON.parse(sessionStorage.getItem("operator")) || props.operator.title === "") {
            return
        } else {
            const operator = document.getElementById(props.operator.title);
            const back = document.getElementById("sub-back");
            const subpage = document.getElementById("sub-page");
            const product = document.getElementById("tanium-60");

            operator.addEventListener("touchend", () => {
                subpage.style.left = "0";
                subpage.style.transition = "left .5s";
                document.getElementById("footer-button").style.marginBottom = "-100px";
                document.getElementById("footer-button").style.transition = "margin-bottom .5s";
            })

            back.addEventListener("click", () => {
                subpage.style.left = "100%";
                subpage.style.transition = "left .5s";
                document.getElementById("footer-button").style.marginBottom = "0";
                document.getElementById("footer-button").style.transition = "margin-bottom .5s";
            })

            product.addEventListener("click", () => {
                product.style.borderColor = "#3431BF";
            })
        }

        axios.get(`${variables("APP_URL")}:${variables("APP_PORT")}/operator/${props.operator.katId}`).then((success) => {
            console.log(success)
        })
    },[]);

    return(
        <div className="w-full h-screen bg-white absolute top-0 left-full z-30 overflow-y-hidden" id="sub-page">
            <div className="w-[50px] h-screen bg-white absolute left-0 z-[31] opacity-0" id="sub-page-swipe"></div>
            <div className="w-full h-screen absolute top-0 left-0 overflow-y-auto">
                <img src="https://img.icons8.com/?size=24&id=7811&format=png&color=000000" id="sub-back" className="rounded-full bg-white p-3 z-[35] top-[20px] left-[20px] absolute" />
                <img src={asset("tof_saki_banner.png")} className="w-full h-[150px] bg-slate-300 absolute top-0 left-0" />
                <img src={asset("tof_saki.png")} className="w-[110px] h-[110px] bg-slate-300 absolute top-[100px] left-[20px] rounded-3xl" />
                <div className="grid grid-rows-2 absolute top-[155px] left-[140px]">
                    <h3 className="font-bold text-gray-900">Tower of Fantasy</h3>
                    <h5 className="font-bold text-gray-400">Hotta Studio • <span className="text-yellow-500">★★★★☆</span></h5>
                </div>
                <div className="top-[230px] left-0 relative px-8 bg-white">
                    <h5 className="font-bold">Deskripsi Produk</h5>
                    <div className="overflow-y-auto w-full h-[93px] pl-2">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p><br />
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                        <ul className="mt-2">
                            <li>Koneksi via <b>Kontergame.ID</b></li>
                            <li className="text-sm"><b>Dengan membeli produk di bawah, maka pengguna telah menyetujui <a href="#snk">Syarat & Ketentuan</a> yang berlaku</b></li>
                        </ul>
                    </div>
                    <ul>
                        <li className="mt-2">
                            <div className="flex flex-row self-baseline">
                                <label htmlFor="uid" className="text-gray-700 pl-3 mt-2">User ID</label>
                            </div>
                            <input type="text" id="uid" placeholder="Contoh: 17200348910" className="w-full rounded-3xl border border-slate-200 px-5 py-2 text-lg" />
                        </li>
                        <li className="mt-2">
                            <div className="flex flex-row self-baseline">
                                <label htmlFor="zone" className="text-gray-700 pl-3 mt-2">Zone ID</label>
                            </div>
                            <input type="text" id="zone" placeholder="Contoh: Asia" className="w-full rounded-3xl border border-slate-200 px-5 py-2 text-lg" />
                        </li>
                    </ul>
                    <ul className="flex flex-row mt-5">
                        <li className="border border-blue-300 bg-blue-400 text-white rounded-full py-2 px-4 mr-2">Semua</li>
                        <li className="border border-blue-300 bg-blue-400 text-white rounded-full py-2 px-4 mr-2">Credit</li>
                        <li className="border border-blue-300 bg-blue-400 text-white rounded-full py-2 px-4 mr-2">Subscription</li>
                    </ul>
                    <h5 className="mt-5 font-bold">Credit</h5>
                    <ul className="w-full mt-3">
                        <li id="tanium-60" className="border border-slate-200 rounded-2xl mt-3 p-2 bg-blue flex flex-row">
                            <img className="rounded-xl min-w-[72px] h-[72px] bg-gray-200" />
                            <div>
                                <h6 className="font-bold pl-2">Tanium 60</h6>
                                <p className="pl-2 h-[32px] overflow-y-auto">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                                <span className="text-gray-400 text-sm mt-2 pl-2">Rp 12.000</span>
                            </div>
                        </li>
                        <li className="border border-slate-200 rounded-2xl mt-3 p-2 flex bg-blue flex-row">
                            <img className="rounded-xl min-w-[72px] h-[72px] bg-gray-200" />
                            <div>
                                <h6 className="font-bold pl-2">Tanium 180 + Dark Crystal 12</h6>
                                <p className="pl-2 h-[32px] overflow-y-auto">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                                <span className="text-gray-400 text-sm mt-2 pl-2">Rp 36.000</span><span className="text-gray-400 text-sm mt-2 pl-2 line-through">Rp 37.000</span>
                            </div>
                        </li>
                        <li className="border border-slate-200 rounded-2xl mt-3 p-2 flex bg-blue flex-row">
                            <img className="rounded-xl min-w-[72px] h-[72px] bg-gray-200" />
                            <div>
                                <h6 className="font-bold pl-2">Tanium 300 + Dark Crystal 20</h6>
                                <p className="pl-2 h-[32px] overflow-y-auto">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                                <span className="text-gray-400 text-sm mt-2 pl-2">Rp 60.000</span><span className="text-gray-400 text-sm mt-2 pl-2 line-through">Rp 63.000</span>
                            </div>
                        </li>
                    </ul>
                    <div className="flex flex-row items-center mt-5">
                        <img src="https://img.icons8.com/?size=16&id=yXjcwMi2t2co&format=png&color=000000" className="pr-2 h-[16px]" />
                        <h5 className="font-bold">Promo</h5>
                    </div>
                    <div className="w-full py-2 px-3 border-slate-200 border-t border-l border-r rounded-t-2xl mt-3">
                        <h6 className="font-bold">Diskon 30% Maksimal Rp40.000</h6>
                        <div className="flex flex-row mb-3">
                            <span>Metode:</span>
                            <img src="https://img.icons8.com/?size=16&id=Yo9kOcztQ9xn&format=png&color=000000" className="mx-2" />
                            <img src="https://img.icons8.com/?size=16&id=eVzJ4kKqXKDy&format=png&color=000000" className="mr-2" />
                        </div>
                        <ul className="list-disc pl-5">
                            <li>Potongan harga produk game apapun</li>
                            <li>Potongan harga penggunaan metode pembayaran <b>Saldo</b></li>
                        </ul>
                    </div>
                    <div className="w-full py-2 px-5 border-yellow-300 bg-gradient-to-r from-yellow-200 to-orange-500 font-bold text-lg text-white border rounded-b-2xl flex flex-row justify-end"><img src="https://img.icons8.com/?size=16&id=yXjcwMi2t2co&format=png&color=FFFFFF" className="pr-2 h-[16px] self-center flex flex-row" />Cek Promo Lainnya<img src="https://img.icons8.com/?size=16&id=7789&format=png&color=FFFFFF" className="ml-2 bounce-right" /></div>
                    <div className="h-[200px] w-full"></div>
                </div>
                <div className="w-full flex flex-row justify-center">
                    <div className="w-11/12 rounded-full shadow-md border border-blue-500 h-15 fixed z-30 bottom-10 bg-blue-400">
                        <div className="flex-row flex items-center justify-between h-full w-full py-3 px-5">
                            <div className="flex flex-row justify-start items-center">
                                <img src="https://img.icons8.com/?size=16&id=Yo9kOcztQ9xn&format=png&color=000000" className="min-w-[24px] h-[24px] mr-2" />
                                <div className="text-white pl-2">
                                    <h5 className="text-white">Rp 150.000</h5>
                                    <div className="-mt-2">Bayar dengan <b>Saldo</b></div>
                                </div>
                            </div>
                            <h6 className="text-white text-center leading-5">
                                <div className="flex flex-row items-center group/spinner">
                                    <img src="https://img.icons8.com/?size=16&id=35635&format=png&color=FFFFFF" className="group-hover/spinner:animate-spin w-[16px] h-[16px]" />&nbsp;<div>Ubah Metode<br /><b>Pembayaran</b></div>
                                </div>
                            </h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    );
}

export const Profile = () => {
    // Getting user's detail
    const fetchUser = axios.get(`${variables("APP_URL")}:${variables("APP_PORT")}/user/detail/${localStorage.getItem("msisdn")}`,
    {
        headers: {
            Authorization: btoa(localStorage.getItem("msisdn"))
        }
    });

    fetchUser.then((success) => {
        document.getElementById("nama").innerText = success.data.username
        document.getElementById("level").innerText = success.data.level
    });

    return(
        <div className="w-full h-screen absolute top-0 left-0 z-10 bg-white pt-16">
            <div className="w-full flex flex-row justify-center">
                <div className="w-11/12 flex flex-row gap-5">
                    <div className="w-24 h-24 bg-gray-200 rounded-full"></div>
                    <div className="grid grid-rows-2">
                        <h2 id="nama"><div className="w-3/4 h-[25px] rounded-full bg-slate-300 animate-pulse"></div></h2>
                        <h5 className="grid grid-cols-2"><span>Tingkat</span><span className="w-full h-[10px] mt-2 ml-2 flex flex-col justify-center capitalize font-bold" id="level"><span className="w-full h-full bg-slate-300 rounded-full animate-pulse block"></span></span></h5>
                    </div>
                </div>
            </div>
            <div className="w-full flex flex-row justify-center my-3">
                <div className="w-11/12 flex flex-row gap-3">
                    <img src="https://img.icons8.com/?size=22&id=9110&format=png&color=000000" />
                    <h5 className="uppercase font-bold">Setting</h5>
                </div>
            </div>
            <div className="w-full flex flex-row justify-center">
                <div className="w-11/12">
                    <ul>
                        <li className="flex flex-row justify-between py-1 ps-5">
                            <span className="text-xl">Dark Mode</span>
                            <input type="checkbox" />
                        </li>
                        <li className="flex flex-row justify-between py-1 ps-5" >
                            <span className="text-xl">Touch Tracking</span>
                            <input type="checkbox" id="touch-track" />
                        </li>
                        <li className="flex flex-row justify-between py-1 ps-5">
                            <span className="text-xl">Notification</span>
                            <input type="checkbox" />
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    );
}