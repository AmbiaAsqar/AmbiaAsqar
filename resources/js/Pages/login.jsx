import React, { useState, useEffect } from "react";
import axios from "axios";
import { variables } from "../env";

const Login = () => {
    // const [pin, setPin] = useState("");

    document.getElementById('footer-button').style.display = "none";

    const changeHandle = (e) => {
        if(e.target.value.length > 0) {
            const msg = e.target.value.slice(0,1);
            e.target.value = msg
        }
    }

    const clickHandle = (e) => {
        document.getElementById(e.target.id).style.backgroundColor = "rgba(250,250,250,1)";
        setTimeout(() => {
            document.getElementById(e.target.id).style.backgroundColor = "rgba(255,255,255,1)";
            document.getElementById(e.target.id).style.transition = "background-color 0.1s ease-out";
        },100)
    }

    var input = document.getElementsByTagName("input");

    useEffect(() => {
        var msisdn = document.getElementById("msisdn");
        var pinpage = document.getElementById("pinpage");
        var pinbtn = ["first", "second", "third", "forth", "fifth", "sixth", "seventh", "eight", "ninth", "zero"];
        document.getElementById("backspace").addEventListener("touchend", () => {
            var active = document.activeElement;
            if(active.previousSibling === null) {
                setTimeout(() => {
                    return active.focus()
                },100)
                if(active.value.length > 0) {
                    active.removeAttribute("value");
                    setTimeout(() => {
                        return active.focus();
                    },100)
                    return
                }
                return
            }
            if(active.value.length > 0) {
                active.removeAttribute("value");
                setTimeout(() => {
                    return active.previousSibling.focus() ?? "";
                },100)
                return
            }
            active.previousSibling.removeAttribute("value");
            setTimeout(() => {
                active.previousSibling.focus()
            },100)
        })

        pinbtn.forEach(pins => {
            document.getElementById(pins).addEventListener("touchend", (touched) => {
                var active = document.activeElement;
                active.setAttribute('value', touched.target.childNodes[0].nodeValue);
                setTimeout(() => {
                    if(active.nextSibling === null) {
                        // history.pushState(null, null, `${variables("APP_URL")}/home`);
                        // setTimeout(() => {
                        //     location.href="#";
                        // },100)
                        checkNumber(msisdn.value)
                        return active.focus()
                    }
                    return active.nextSibling.focus();
                },100);
            })
        })

        const checkNumber = (value) => {
            var pin = input[1].value+input[2].value+input[3].value+input[4].value+input[5].value+input[6].value;
            var url = `${variables("APP_URL")}:${variables("APP_PORT")}/user/checknumber/${value}/`
            if(localStorage.getItem("msisdn") !== null) {
                var url = `${variables("APP_URL")}:${variables("APP_PORT")}/user/checknumber/${localStorage.getItem("msisdn")}/`
            };
            const getAxios = axios.get(url+pin);
            getAxios.then((res) => {
                if(res.data.status === "2") {
                    var active = document.activeElement;
                    // warn.removeChild(warn.firstChild);
                    // warn.appendChild(document.createTextNode(res.data.message));
                    // warn.setAttribute("class", "text-red-500 block");
                    active.focus();

                    if ("vibrate" in navigator) {
                        // vibration API supported
                        navigator.vibrate(1000);
                    } else {
                        console.log("vibration is not supported")
                    }

                    return
                }

                const custData = [{
                    "username": res.data.detail.username,
                    "msisdn": res.data.detail.msisdn
                }];

                const reqIndexedDB = indexedDB.open("UserData", 3);
                var db;

                reqIndexedDB.onerror = (e) => {
                    console.log("error: "+e);
                    alert("Unable to retrieve data");
                }

                reqIndexedDB.onupgradeneeded = (e) => {
                    db = e.target.result

                    const obj = db.createObjectStore(
                        "user", { keyPath: "msisdn" }
                    );
                    obj.createIndex("username", "username", { unique: false });

                    obj.transaction.oncomplete = () => {
                        const custStore = db.transaction("user", "readwrite").objectStore("user");
                        custData.forEach((customer) => {
                            custStore.add(customer);
                        })
                        custStore.get(res.data.detail.msisdn)
                        .onsuccess = (e) => {
                            // console.log(e.target.result)
                            // resultMsg(e.target.result.msisdn)
                        }
                    }
                }

                if(!res.data) {
                    console.log("Terjadi masalah");
                    msisdn.focus()
                    return
                }

                console.table([{ "username": res.data.detail.username, "msisdn": res.data.detail.msisdn }]);
                localStorage.setItem("msisdn", res.data.detail.msisdn);
                localStorage.setItem("expiry", 180);
                document.location = "/home";
            }).catch(e => {
                // console.group(e)
                indexedDB.deleteDatabase("UserData");
                pinpage.setAttribute("class", "absolute inset-0 left-full top-0 z-10 w-1/2 h-screen overflow-x-hidden transition-all duration-500");
                console.error(e);
                pinbtn.forEach(pin => {
                    document.getElementById(pin).setAttribute("value", "")
                })
                return alert("Terjadi kesalahan!");
            });
        }
    },[]);

    const supported = ('contacts' in navigator && 'ContactsManager' in window);

    const isSupportContact = () => {
        supported ? console.log("Yes, it's supported") : console.log("No, it doesn't support contact picker");

        return
    }

    window.addEventListener("load", isSupportContact);

    useEffect(() => {
        const msisdn = document.getElementById("msisdn");
        const form = document.getElementById("form");
        const reset = document.getElementById("reset");
        const submit = document.getElementById("submit");
        const warn = document.getElementById("warning");
        const pinpage = document.getElementById("pinpage");

        submit.addEventListener("click", () => {
            if(!msisdn.value) {
                msisdn.focus();
                warn.setAttribute("class", "text-red-500 block");
                return
            }

            pinpage.setAttribute("class", "absolute inset-0 left-0 top-0 z-10 w-1/2 h-screen overflow-x-hidden transition-all duration-500");
            input[1].focus();
        })

        const checkDB = async(dbname) => {
            const check = (await window.indexedDB.databases()).map(db => db.name).includes(dbname);

            return checkStatement(check);
        }

        const checkStatement = (ifExists) => {
            if(ifExists) {
                console.log("Yes, database exists");
                pinpage.setAttribute("class", "absolute inset-0 left-0 top-0 z-10 w-1/2 h-screen overflow-x-hidden transition-all duration-500");
            } else {
                console.log("No, database doesn't exists");
            }
        }

        checkDB("UserData");

        // form.addEventListener("submit", (e) => {
        //     e.preventDefault();

        //     if(!msisdn.value) {
        //         msisdn.focus();
        //         warn.setAttribute("class", "text-red-500 block");
        //         return
        //     }

        //     checkNumber(msisdn.value);
        // });

        reset.addEventListener("click", () => {
            msisdn.value = "";
        });

        submit.addEventListener("touchstart", () => {
            submit.setAttribute("class", "rounded-full text-3xl bg-fuchsia-400 text-fuchsia-600 w-full px-3 py-4")
        });

        submit.addEventListener("touchend", () => {
            submit.setAttribute("class", "rounded-full text-3xl bg-fuchsia-300 text-fuchsia-600 w-full px-3 py-4")
        })
    },[]);

    const asset = (path) => {
        return `/storage/${path}`;
    }
    return(
        <div className="overflow-hidden w-[200%] h-screen fixed">
            <div className="w-1/2 h-screen overflow-hidden flex flex-row items-center justify-center bg-slate-100 absolute inset-0 left-0 top-0" id="emailpage">
                <img src={asset('background/gradient-background.avif')} className="h-screen blur-xl fixed" />
                <div className="relative z-10 px-16 w-full">
                    <div className="flex flex-row justify-center mb-5">
                        <h3><label htmlFor="msisdn">Masukkan Nomor Anda</label></h3>
                    </div>
                    <div className="relative">
                        <div className="w-full flex flex-row border-b border-b-black">
                            <div className="w-[70px] h-[40px] block flex flex-row text-2xl items-center justify-center rounded-l-full"><img src="https://img.icons8.com/?size=16&id=lph_obIfg-jT&format=png&color=000000" className="w-[24px] h-[24px] mr-2" />+62</div>
                            <input type="number" name="msisdn" id="msisdn" className="w-[calc(100%-70px)] pl-2 pr-14 py-2 text-2xl bg-transparent outline-0 caret-fuchsia-500"/>
                        </div>
                        <div className="text-red-500 hidden mt-1" id="warning">Silahkan masukkan nomor terlebih dahulu</div>
                        <img src="https://img.icons8.com/?size=24&id=71200&format=png&color=FF0000" id="reset" className="absolute right-0 top-2 rounded-full p-2"/>
                    </div>
                    <div className="flex flex-row justify-center mt-16 mb-5">
                        <button type="submit" id="submit" className="rounded-full text-3xl bg-fuchsia-300 text-fuchsia-600 w-full px-3 py-4">Lanjut</button>
                    </div>
                    <p>Belum punya akun? <a href="#">daftar</a> sekarang!</p>
                </div>
            </div>
            <div className="absolute inset-0 left-1/2 top-0 z-10 w-full h-screen overflow-x-hidden" id="pinpage">
                <div className="w-full h-screen overflow-hidden flex flex-row items-center justify-center bg-slate-100">
                    <img src={asset('background/gradient-background.avif')} className="h-screen blur-xl fixed" />
                    <div className="relative z-10 px-5">
                        <div className="flex flex-row justify-center">
                            <h3>Masukkan PIN Anda</h3>
                        </div>
                        <div className="flex flex-row justify-center">
                            {/* <span className="text-slate-400">Testing = 123456</span> */}
                        </div>
                        <div className="grid grid-cols-6 my-5 h-[50px]">
                            <input type="number" readonly="true" maxLength={1} onChange={changeHandle} autoFocus className="text-center outline-0 border-b border-b-slate-500 text-5xl h-[50px] mx-2 bg-transparent" />
                            <input type="number" readonly="true" maxLength={1} onChange={changeHandle} className="text-center outline-0 border-b border-b-slate-500 text-5xl h-[50px] mx-2 bg-transparent" />
                            <input type="number" readonly="true" maxLength={1} onChange={changeHandle} className="text-center outline-0 border-b border-b-slate-500 text-5xl h-[50px] mx-2 bg-transparent" />
                            <input type="number" readonly="true" maxLength={1} onChange={changeHandle} className="text-center outline-0 border-b border-b-slate-500 text-5xl h-[50px] mx-2 bg-transparent" />
                            <input type="number" readonly="true" maxLength={1} onChange={changeHandle} className="text-center outline-0 border-b border-b-slate-500 text-5xl h-[50px] mx-2 bg-transparent" />
                            <input type="number" readonly="true" maxLength={1} onChange={changeHandle} className="text-center outline-0 border-b border-b-slate-500 text-5xl h-[50px] mx-2 bg-transparent" />
                        </div>
                        <div className="grid grid-cols-3 grid-rows-3 mt-[30px]">
                            <button id="first" onClick={clickHandle} className="bg-white py-5 mx-2 my-2 text-5xl rounded-full">1</button>
                            <button id="second" onClick={clickHandle} className="bg-white py-5 mx-2 my-2 text-5xl rounded-full">2</button>
                            <button id="third" onClick={clickHandle} className="bg-white py-5 mx-2 my-2 text-5xl rounded-full">3</button>
                            <button id="forth" onClick={clickHandle} className="bg-white py-5 mx-2 my-2 text-5xl rounded-full">4</button>
                            <button id="fifth" onClick={clickHandle} className="bg-white py-5 mx-2 my-2 text-5xl rounded-full">5</button>
                            <button id="sixth" onClick={clickHandle} className="bg-white py-5 mx-2 my-2 text-5xl rounded-full">6</button>
                            <button id="seventh" onClick={clickHandle} className="bg-white py-5 mx-2 my-2 text-5xl rounded-full">7</button>
                            <button id="eight" onClick={clickHandle} className="bg-white py-5 mx-2 my-2 text-5xl rounded-full">8</button>
                            <button id="ninth" onClick={clickHandle} className="bg-white py-5 mx-2 my-2 text-5xl rounded-full">9</button>
                            <button id="zero" onClick={clickHandle} className="bg-white py-5 mx-2 my-2 col-start-2 text-5xl rounded-full">0</button>
                            <button id="backspace" onClick={clickHandle} className="bg-white py-5 mx-2 my-2 text-4xl rounded-full">⌫</button>
                        </div>
                        <div className="text-xl mt-[20px]">Belum punya akun? <a href="#">daftar</a> sekarang!</div>
                    </div>
                </div>
            </div>
        </div>
    );
}

export default Login;