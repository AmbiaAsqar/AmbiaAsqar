import React from "react";
import { webFunction } from "../Components/web_style";

const webProduct = () => {
    const asset = (path) => {
        return `/storage/${path}`;
    }

    webFunction();

    return (
        <>
            <div className="w-[70px] h-[70px] flex flex-row justify-center items-center rounded-full fixed right-0 bottom-0 mr-5 mb-5 bg-red-500 animate-bounce xl:hidden">
                <img src="https://img.icons8.com/?size=32&id=0DBkCUANmgoQ&format=png&color=FFFFFF" className="w-[32px] h-[32px]" />
            </div>
            <div className="absolute top-0 left-0 w-full h-full" id="bg-wallpaper" style={{ backgroundImage: `url('${asset('background/gradient-background-web.avif')}')`, backgroundRepeat: "repeat", backgroundSize: "cover", filter: "blur(90px)" }}></div>
            <div className="w-full flex flex-row justify-between px-10 py-2 bg-violet-600 relative z-10" id="navbar">
                <div className="flex flex-row">
                    <span className="text-lg text-purple-950 mx-5 hover:text-indigo-300 hover:cursor-pointer">Keluhan Pelanggan: <a href="tel:6281213085680">+62 812-1308-5680</a></span>
                    <span className="text-lg text-purple-950 mx-5 hover:text-indigo-300 hover:cursor-pointer">Periksa Status Pembelian</span>
                </div>
                <div className="flex flex-row">
                    <span className="text-lg text-purple-950 mx-5 hover:text-indigo-300 hover:cursor-pointer">Syarat & Ketentuan</span>
                    <span className="text-lg text-purple-950 mx-5 hover:text-indigo-300 hover:cursor-pointer">Kebijakan Pribadi</span>
                </div>
            </div>
            <div className="hidden w-full mt-[30px] py-3 md:px-10 xl:px-24" id="header">
                <div>
                    Hello World
                </div>
                <div className="flex flex-row items-center">
                    <span className="text-lg px-5 text-violet-700 font-bold hover:text-indigo-200 hover:cursor-pointer">Login</span>
                    <button className="text-lg text-white font-bold px-5 py-2 bg-gradient-from-tl bg-gradient-to-br from-pink-500 from-10% to-fuchsia-500 rounded-full hover:brightness-105">Sign Up</button>
                </div>
            </div>
            <div className="w-[200%] h-[648px] flex flex-row bg-black justify-center items-end flex-wrap rounded-[50%] overflow-hidden relative -left-[50%] -mt-[324px] shadow-inner">
                <img src={asset("tof_saki_banner.png")} alt="Saki Fuwa" className="w-screen h-[324px] bg-slate-300 object-cover relative" style={{objectPosition: "0 25%"}} />
            </div>
            <div className="w-full flex flex-row relative z-10">
                <img src={asset("tof_saki.png")} alt="Saki Fuwa" className="w-[164px] h-[164px] relative -mt-[82px] ml-[100px] rounded-[40px] shadow-lg bg-slate-300 object-cover" />
                <div className="pl-5 pt-5 block">
                    <h2 className="font-bold">Tower of Fantasy</h2>
                    <span className="text-slate-400 text-xl">Hotta Studio • </span><span className="text-yellow-400 text-2xl">★★★★☆</span>
                </div>
            </div>
            <div className="grid grid-cols-3 gap-5 px-36 relative -mt-[82px] z-10 overflow-hidden">
                <div className="w-full h-screen bg-transparent pt-[105px]">
                    <div className="bg-white rounded-3xl py-5 px-10">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?</div>
                </div>
                <div className="w-full bg-transparent xl:pt-8 pt-[105px] col-span-2 xl:col-span-1">
                    <div className="w-full px-10 py-5 bg-white border border-slate-200 rounded-3xl">
                        <h4 className="font-bold mb-5">Detail Pemain</h4>
                        <div className="flex flex-row xl:block">
                            <div className="mr-3">
                                <label htmlFor="uid" className="ml-3 text-md">User ID</label>
                                <input type="text" className="w-full px-5 py-2 text-xl border border-slate-300 rounded-full mb-5 caret-purple-500 text-lg focus:outline placeholder:text-purple-300 outline-purple-500 caret-purple-500 text-purple-500" placeholder="0380162874" />
                            </div>
                            <div>
                                <label htmlFor="uid" className="ml-3 text-md">Zone ID</label>
                                <select className="w-full px-5 py-2 text-xl border border-slate-300 rounded-full caret-purple-500 focus:outline outline-purple-500 text-purple-500" placeholder="Asia" name="zone">
                                    <option>Asia/Hongkong/Eropa/USA</option>
                                    <option value="Asia">Asia</option>
                                    <option value="hk_tw_mo">Hongkong</option>
                                    <option value="Europe">Eropa</option>
                                    <option value="America">USA</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div className="w-full px-10 py-5 bg-white border border-slate-200 rounded-3xl mt-10">
                        <h4 className="font-bold mb-5">Produk</h4>
                        <ul className="flex flex-row">
                            <li className="px-2 hover:text-purple-500">Semua</li>
                            <li className="px-2 hover:text-purple-500">Tanium</li>
                            <li className="px-2 hover:text-purple-500">Berlangganan</li>
                        </ul>
                        <div className="grid md:grid-cols-2 xl:grid-cols-1 gap-3">
                            <div className="w-full h-[100px] mt-5 p-2 rounded-3xl border border-slate-300 flex flex-row hover:outline outline-1 outline-green-500 group">
                                <div className="max-w-[85px] max-h-[85px] rounded-3xl bg-slate-200 flex flex-row justify-center items-center">
                                    <img src="#" onError={({ currentTarget }) => { currentTarget.src='https://static-00.iconduck.com/assets.00/moyai-emoji-380x512-21kscge3.png'; currentTarget.onError = null; }} className="object-center object-contain w-1/2" draggable="false" />
                                </div>
                                <div className="flex flex-col justify-between w-full h-full px-2">
                                    <h6 className="font-bold line-clamp-1">Tanium 60</h6>
                                    <span className="font-bold text-lg text-pink-400">Rp 14.560</span>
                                    {/* <div className="overflow-y-auto w-full h-[30px] line-clamp-3 leading-5 mt-1">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</div> */}
                                    <div className="w-full flex flex-row justify-between">
                                        <div></div>
                                        <div className="flex flex-row h-[40px] w-full justify-between">
                                            <div className="flex flex-row self-end">
                                                <span className="mr-2 text-md text-slate-400"><span className="md:hidden xl:inline-block">Jumlah&nbsp;</span>Qty<sup className="rounded-full px-1 ml-1 bg-black text-white" title="Jumlah pembelian, masukkan jumlah produk yang ingin dibeli. Masuk untuk pembelian >100">?</sup></span>
                                                <input type="number" className="w-20 bg-slate-50 text-slate-400 pl-2 rounded-lg border-2 border-r-slate-100 border-b-slate-100 border-t-slate-200 border-l-slate-200" max="100" />
                                            </div>
                                            <button className="self-end flex flex-row text-white px-3 py-1 rounded-full bg-gradient-to-br from-fuchsia-500 to-violet-300 group-hover:from-green-500 group-hover:to-lime-400">
                                                <img src="https://img.icons8.com/?size=16&id=0DBkCUANmgoQ&format=png&color=FFFFFF" className="pr-2" />
                                                Pesan
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div className="w-full relative bottom-0 mt-5 group">
                                <div className="absolute h-[125px] border rounded-3xl border-slate-300 bg-gradient-to-br from-fuchsia-500 text-white font-bold animate-pulse to-violet-400 w-full pt-[1px] px-[1px] group/animate group-hover:from-green-500 group/animate hover-group:to-lime-500">
                                    <div className="flex flex-col justify-between h-full w-full py-1 content-center items-end px-5">Promo Akhir Bulan
                                        <div className="flex flex-row text-gray-200 items-center">
                                            <span className="pr-3 font-normal group-hover:text-green-500">Detail</span>
                                            <img className="group-hover:hidden bounce-right" src="https://img.icons8.com/?size=16&id=7789&format=png&color=FAFAFA" />
                                            <img className="group-hover:block hidden bounce-right" src="https://img.icons8.com/?size=16&id=7789&format=png&color=00DD00" />
                                        </div>
                                    </div>
                                </div>
                                <div className="flex flex-row justify-center pt-[1.5px] mb-8">
                                    <div className="w-[99%] h-[100px] relative z-10 p-2 rounded-t-3xl border-t border-l bg-white border-r border-slate-300 flex flex-row">
                                        <div className="max-w-[85px] max-h-[85px] rounded-3xl bg-slate-200 flex flex-row justify-center items-center">
                                            <img src="#" onError={({ currentTarget }) => { currentTarget.src='https://static-00.iconduck.com/assets.00/moyai-emoji-380x512-21kscge3.png'; currentTarget.onError = null; }} className="object-center object-contain w-1/2" draggable="false" />
                                        </div>
                                        <div className="flex flex-col justify-between w-full px-2">
                                            <div className="block">
                                                <h6 className="font-bold line-clamp-1">Tanium 180 + 12 Dark Crystal</h6>
                                                <div className="text-sm line-through text-gray-300"> Rp 42.100</div>
                                                <div className="font-bold text-lg slashed-zero text-pink-400">Rp 40.100</div>
                                            </div>
                                            {/* <div className="overflow-y-auto w-full h-[45px] line-clamp-3 leading-5 mt-1">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</div> */}
                                            <div className="flex flex-row w-full justify-between">
                                                <div className="flex flex-row self-end">
                                                    <span className="mr-2 text-md text-slate-400"><span className="md:hidden xl:inline-block">Jumlah&nbsp;</span>Qty<sup className="rounded-full px-1 ml-1 bg-black text-white" title="Jumlah pembelian, masukkan jumlah produk yang ingin dibeli. Masuk untuk pembelian >100">?</sup></span>
                                                    <input type="number" className="w-20 bg-slate-50 text-slate-400 pl-2 rounded-lg border-2 border-r-slate-100 border-b-slate-100 border-t-slate-200 border-l-slate-200" max="100" />
                                                </div>
                                                <button className="self-end flex flex-row text-white px-3 py-1 rounded-full bg-gradient-to-br from-fuchsia-500 to-violet-300 group-hover:from-green-500 group-hover:to-lime-400">
                                                    <img src="https://img.icons8.com/?size=16&id=0DBkCUANmgoQ&format=png&color=FFFFFF" className="pr-2" />
                                                    Pesan
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div className="w-full h-[100px] mt-5 p-2 rounded-3xl border border-slate-300 flex flex-row hover:outline outline-1 outline-green-500 group">
                                <div className="max-w-[85px] max-h-[85px] rounded-3xl bg-slate-200 flex flex-row justify-center items-center">
                                    <img src="#" onError={({ currentTarget }) => { currentTarget.src='https://static-00.iconduck.com/assets.00/moyai-emoji-380x512-21kscge3.png'; currentTarget.onError = null; }} className="object-center object-contain w-1/2" draggable="false" />
                                </div>
                                <div className="flex flex-col justify-between w-full px-2">
                                    <h6 className="font-bold line-clamp-1">Tanium 300 + 20 Dark Crystal</h6>
                                    <span className="font-bold text-lg text-pink-400">Rp 60.300</span>
                                    {/* <div className="overflow-y-auto w-full h-[45px] line-clamp-3 leading-5 mt-1">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</div> */}
                                    <div className="w-full flex flex-row justify-between">
                                        {/* <div className="self-end bg-black rounded-full px-3 flex flex-row items-center">
                                            <span className="text-white text-lg">🎔</span><span className="text-white text-sm ml-1">Terfavorit</span>
                                        </div> */}
                                        <div className="flex flex-row h-[40px] w-full justify-between">
                                            <div className="flex flex-row">
                                                <span className="self-end mr-2 text-md text-slate-400"><span className="md:hidden xl:inline-block">Jumlah&nbsp;</span>Qty<sup className="rounded-full px-1 ml-1 bg-black text-white" title="Jumlah pembelian, masukkan jumlah produk yang ingin dibeli. Masuk untuk pembelian >100">?</sup></span>
                                                <input type="number" className="self-end w-20 bg-slate-100 text-slate-400 pl-2 rounded-lg border-2 border-r-slate-200 border-b-slate-200 border-t-slate-300 border-l-slate-300 disabled:cursor-no-drop" title="Silahkan login terlebih dahulu" max="100" disabled />
                                            </div>
                                            <button className="self-end flex flex-row text-white px-3 py-1 rounded-full bg-gradient-to-br from-fuchsia-500 to-violet-300 group-hover:from-green-500 group-hover:to-lime-400">
                                                <img src="https://img.icons8.com/?size=16&id=0DBkCUANmgoQ&format=png&color=FFFFFF" className="pr-2" />
                                                Pesan
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div className="w-full h-[100px] mt-5 p-2 rounded-3xl border border-slate-300 flex flex-row hover:outline outline-1 outline-green-500 group">
                                <div className="max-w-[85px] max-h-[85px] rounded-3xl bg-slate-200 flex flex-row justify-center items-center">
                                    <img src="#" onError={({ currentTarget }) => { currentTarget.src='https://static-00.iconduck.com/assets.00/moyai-emoji-380x512-21kscge3.png'; currentTarget.onError = null; }} className="object-center object-contain w-1/2" draggable="false" />
                                </div>
                                <div className="flex flex-col justify-between w-full px-2">
                                    <h6 className="font-bold line-clamp-1">Monthly Pass</h6>
                                    <span className="font-bold text-lg text-pink-400">Rp 60.300</span>
                                    {/* <div className="overflow-y-auto w-full h-[45px] line-clamp-3 leading-5 mt-1">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</div> */}
                                    <div className="w-full flex flex-row justify-between">
                                        {/* <div className="self-end bg-black rounded-full px-3 flex flex-row items-center">
                                            <span className="text-white text-lg">🎔</span><span className="text-white text-sm ml-1">Terfavorit</span>
                                        </div> */}
                                        <div className="flex flex-row h-[40px] w-full justify-between">
                                            <div className="flex flex-row">
                                                <span className="self-end mr-2 text-md text-slate-400"><span className="md:hidden xl:inline-block">Jumlah&nbsp;</span>Qty<sup className="rounded-full px-1 ml-1 bg-black text-white" title="Jumlah pembelian, masukkan jumlah produk yang ingin dibeli. Masuk untuk pembelian >100">?</sup></span>
                                                <input type="number" className="self-end w-20 bg-slate-100 text-slate-400 pl-2 rounded-lg border-2 border-r-slate-200 border-b-slate-200 border-t-slate-300 border-l-slate-300 disabled:cursor-no-drop" title="Silahkan login terlebih dahulu" max="100" disabled />
                                            </div>
                                            <button className="self-end flex flex-row text-white px-3 py-1 rounded-full bg-gradient-to-br from-fuchsia-500 to-violet-300 group-hover:from-green-500 group-hover:to-lime-400">
                                                <img src="https://img.icons8.com/?size=16&id=0DBkCUANmgoQ&format=png&color=FFFFFF" className="pr-2" />
                                                Pesan
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div className="w-full px-10 py-5 bg-white border border-slate-200 rounded-3xl my-10">
                        <h4 className="font-bold mb-5">Promo</h4>
                        <div className="flex flex-col w-full rounded-t-3xl border-t border-l border-r border-gray-200 px-5 py-3">
                            <span className="font-bold text-lg">Diskon Mingguan 10%</span>
                            <div className="flex flex-row">
                                <span>Metode: </span>
                                <img src="https://img.icons8.com/?size=16&id=Yo9kOcztQ9xn&format=png&color=000000" className="mx-2" />
                                <img src="https://img.icons8.com/?size=16&id=eVzJ4kKqXKDy&format=png&color=000000" className="mr-2" />
                            </div>
                            <ul className="list-disc pl-5">
                                <li>Diskon 10% untuk satu jenis produk dikalikan jumlah pembelian (max. 3 atau sesuai sisa promo)</li>
                                <li>Jenis promo: Diskon Mingguan</li>
                            </ul>
                        </div>
                        <div className="w-full px-3 py-2 bg-gray-100 rounded-b-3xl flex justify-end">
                            <div className="flex flex-row cursor-pointer group">
                                <span className="mr-2 text-gray-400 group-hover:text-gray-500">Detail</span>
                                <img className="group-hover:hidden bounce-right" src="https://img.icons8.com/?size=16&id=7789&format=png&color=AAAAAA" />
                                <img className="group-hover:inline-block hidden bounce-right" src="https://img.icons8.com/?size=16&id=7789&format=png&color=777777" />
                            </div>
                        </div>
                    </div>
                    <div className="grid grid-cols-2 gap-3 mb-16">
                        <button className="animate-bounce w-full rounded-full py-3 text-xl text-white bg-gradient-to-br from-fuchsia-500 to-violet-300 flex flex-row justify-center relative">
                            <img src="https://img.icons8.com/?size=16&id=8851&format=png&color=FFFFFF" className="mr-2 z-10" />
                            <div className="self-center absolute w-3/5 h-3/4 rounded-full animate-ping bg-gradient-to-br from-fuchsia-500 to-violet-300"></div>
                            <div className="relative z-10">Try My Luck <span className="text-bold text-red-500">x3</span></div>
                        </button>
                        <button className="group w-full rounded-full py-3 text-xl bg-white border border-slate-300 text-slate-400 flex flex-row justify-center hover:bg-gray-50">
                            <span className="m2-3">Checkout</span>
                            <img className="group-hover:bounce-right pl-2 animate-none" src="https://img.icons8.com/?size=20&id=7789&format=png&color=AAAAAA" />
                        </button>
                    </div>
                </div>
                <div className="w-full bg-transparent pt-8 hidden xl:block">
                    <div className="bg-white rounded-3xl py-5 px-10 top-0 sticky top-0">
                        <h3>Dalam Keranjang</h3>
                        <table className="w-full mt-3">
                            <thead>
                                <tr className="border-b-2 border-gray-300">
                                    <th className="text-left px-2 py-1">QTY</th>
                                    <th className="text-left px-2 py-1">Barang</th>
                                    <th className="text-right px-2 py-1">Harga</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr className="odd:bg-slate-100">
                                    <td className="proportional-nums px-2 py-1">x10</td>
                                    <td className="px-2 py-1">Tanium 60</td>
                                    <td className="proportional-nums text-right px-2 py-1">14.560</td>
                                </tr>
                                <tr className="odd:bg-slate-100">
                                    <td className="proportional-nums px-2 py-1">x1</td>
                                    <td className="px-2 py-1">Monthly Pass</td>
                                    <td className="proportional-nums text-right px-2 py-1">60.300</td>
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr className="odd:bg-slate-200 border-t-1 border-gray-300">
                                    <td className="font-bold px-2 py-1 text-left" colSpan="2">Sub Total</td>
                                    <td className="font-bold tabular-nums px-2 py-1 text-right">74.960</td>
                                </tr>
                                <tr className="odd:bg-slate-200 border-t-1 border-gray-300">
                                    <td className="w-full font-bold tabular-nums px-2 py-1 text-left" colSpan="3">
                                        <table className="w-full">
                                            <tbody>
                                                <tr>
                                                    <td>Promo</td>
                                                    <td className="text-right">-12.496</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <table className="w-full">
                                            <tbody>
                                                <tr>
                                                    <td className="font-normal pl-3">Diskon 10%</td>
                                                    <td className="font-normal text-right tabular-nums">-7.496</td>
                                                </tr>
                                                <tr>
                                                    <td className="font-normal pl-3">Super Voucher</td>
                                                    <td className="font-normal text-right tabular-nums">-5.000</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                                <tr className="odd:bg-slate-200 border-t-1 border-gray-300">
                                    <td className="font-bold px-2 py-1 text-left" colSpan="2">Total</td>
                                    <td className="font-bold proportional-nums px-2 py-1 text-right">62.464</td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </>
    )
}

export default webProduct;