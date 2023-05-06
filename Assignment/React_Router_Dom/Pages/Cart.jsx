import React, { useContext, useState } from 'react'
import { LoginWrapper } from '../App'

function Cart() {
    const { cart, setcart, RemoveCartData } = useContext(LoginWrapper)


    // function removecart(id) {
    //     const newlist = cart.filter((item) => item.id !== id)
    //     setcart(newlist)
    // }



    return (
        <div className="container py-5">
            <div className="mb-3"> Your Bags </div>
            {cart.length === 0 && <h3>Your  Bags Empty</h3>}
            {
                cart.map((item) => {
                    const { image, name, } = item
                    return (

                        <div className='d-flex gap-5 align-item-center mb-4'>
                            <img src={image} width="50px" /> <h3>{name}</h3>  <button className='btn btn-danger ms-4' onClick={() => RemoveCartData(name, image)}>remove</button>
                        </div>

                    )
                })
            }

        </div >

    )
}

export default Cart