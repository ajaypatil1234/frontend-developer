

import React, { useContext, createContext, useState, version } from 'react'
import Gallery from './Pages/Gallery'
import Home from './Pages/Home'
import Header from './Componet/Header'
import { BrowserRouter, Route, Routes } from 'react-router-dom'
import NotFound from './Pages/NotFound'
import Products from './Pages/Products'
import ProductsDetail from './Pages/ProductsDetail'
import Cocktail from './Pages/Cocktail'
import CocktailDetail from './Pages/CocktailDetail'
import Login from './Pages/Login'
import PrivateRoute from './Componet/PrivateRoute'
import Cart from './Pages/Cart'


// new version
// import { RouterProvider, createBrowserRouter } from 'react-router-dom'
// const Myrouter = createBrowserRouter([
//     {
//         path: "/",
//         element: <Home />
//     },
//     {
//         path: "/gallery",
//         element: <Gallery />
//     }
// ])

export const LoginWrapper = createContext();

function getlocalstorage() {

    let islogin = localStorage.getItem('islogin')

    if (islogin) {
        return true
    } else {
        return false
    }

}

//old version 
function App() {

    const [islogin, setislogin] = useState(getlocalstorage())
    const [cart, setcart] = useState([])
    const [showAlert, setshowAlert] = useState(false)

    const RemoveCartData = (dataName) => {
        const cartdata = cart.filter((item) => item.name !== dataName)
        setcart(cartdata)
    }
    return (
        <>
            <BrowserRouter>
                <LoginWrapper.Provider value={{ islogin, setislogin, cart, setcart, showAlert, setshowAlert, RemoveCartData }}>
                    <Header />
                    <Routes>
                        <Route path='/' element={<Home />} />
                        <Route path='/gallery' element={<Gallery />} />
                        <Route path='/products' element={<PrivateRoute> <Products /></PrivateRoute>} />
                        <Route path='/products/:id' element={<ProductsDetail />} />
                        <Route path='/cocktail-drink/' element={<PrivateRoute> <Cocktail /></PrivateRoute>} />
                        <Route path='/cocktail-drink/:id' element={<CocktailDetail />} />
                        <Route path='/cart' element={<Cart />} />
                        <Route path="/login" element={<Login />} />
                        <Route path='*' element={<NotFound />} />
                    </Routes>
                </LoginWrapper.Provider>
            </BrowserRouter>
        </>
    )
}

export default App