import React from "react";
import { BrowserRouter, HashRouter, Routes, Route, Router } from "react-router-dom";
import { createRoot } from "react-dom/client";
import Home from "./Pages/home";
import ListBarang from "./Components/ListBarang";
import Login from "./Pages/login";
import WebProduct from "./Pages/web_product";

function App() {
    return(
        <BrowserRouter>
            <Routes>
                <Route path="/" element={<Login />} />
                <Route path="/home" element={<Home />} />
                <Route path="/list/barang" element={<ListBarang />} />
                <Route path="/web/product" element={<WebProduct />} />
            </Routes>
        </BrowserRouter>
    )
}

// export default App();
createRoot(document.getElementById('app')).render(<App />);