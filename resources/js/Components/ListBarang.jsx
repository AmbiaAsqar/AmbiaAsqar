import React, { useEffect } from "react";
import axios from "axios";
import { variables } from "../env";

const FetchData = () => {
    return axios.get(`${variables("APP_URL")}:${variables("APP_PORT")}/kategori/barang`, {
        headers: {
            Authorization: btoa(localStorage.getItem("msisdn"))
        }
    })
}



export default function ListBarang() {
    var object = FetchData().then(success => {
        return success.data;
    })
    
    // var object = [{
    //     id: 1,
    //     name: "Ambia",
    //     age: 25
    // },{
    //     id: 2,
    //     name: "Asqar",
    //     age: 20
    // }]

    var listObj;
    object.then((data) => {
        listObj += [data][0].map((datalist, key) => 
            <li key={`id${key}`}>{JSON.parse(datalist).nama}</li>
        );
        return <ul>{listObj}</ul>
    })
    return listObj
}