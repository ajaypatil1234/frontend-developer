
import React, { useEffect, useState } from 'react'
import { useLocation, useParams } from 'react-router-dom'
import { ProductsList } from '../ProductsList'

function ProductsDetail() {

    // useParams  is get id 
    const MyProductid = useParams();
    const { id } = MyProductid


    const [ProductsDetail, setProductsDetail] = useState([])
    const { name, price, desp } = ProductsDetail

    const data = useLocation()
    const { state } = data

    useEffect(() => {
        // let findProduct = ProductsList.find((item) => item.id === Number(id))
        setProductsDetail(state);
    })


    return (
        <>
            <h1 className='container p-3 '>ProductsDetail {id}</h1>
            <hr />
            <div className="container border-1 shadow mt-4 p-5">
                <h2>Mobile : {name}</h2>
                <h4>Price :  {price}</h4>
                <p> Disp :  {desp}</p>
            </div>

        </>
    )
}

export default ProductsDetail