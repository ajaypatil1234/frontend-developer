import React from 'react'
import { ProductsList } from '../ProductsList'
import { Link, useNavigate } from 'react-router-dom'
function Products() {
    const navigate = useNavigate()
    return (
        <>
            <h1 className='container mt-3'>Products</h1>
            <hr />
            {
                ProductsList.map((item) => {
                    const { id, name, price, desp } = item
                    return (
                        <div key={id} className='container p-3 mb-4 shadow border-1 rounded-5 d-flex justify-content-between'>
                            <h4>{name}</h4>
                            <button className='btn btn-priimary' onClick={() => navigate(`/products/${id}`, { state: item })}>View detail</button>
                            {/* <Link to={`/products/${id}`}> view detail </Link> */}
                        </div >

                    )
                })
            }
        </>
    )
}

export default Products