import React, { useContext } from 'react'
import { Link, NavLink, useNavigate } from 'react-router-dom'
import { LoginWrapper } from '../App'

function Header() {
    const { islogin, setislogin, cart } = useContext(LoginWrapper)

    const navigate = useNavigate()

    function handlelogout() {
        setislogin(false)
        localStorage.removeItem("islogin")
        navigate('/')
    }

    return (

        <nav className="navbar navbar-expand-lg bg-body-tertiary">
            <div className="container-fluid bg-gray ">

                <a className="navbar-brand" >Navbar</a>
                <button className="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span className="navbar-toggler-icon"></span>
                </button>

                <div className="collapse navbar-collapse" id="navbarNavDropdown">

                    <ul className="navbar-nav">
                        <li className="nav-item">
                            <NavLink to="/" className="nav-link " aria-current="page" >Home</NavLink>
                        </li>
                        <li className="nav-item">
                            <NavLink to="/gallery" className="nav-link" >Gallery</NavLink>
                        </li>
                        <li className="nav-item">
                            <NavLink to="/products" className="nav-link" >product</NavLink>
                        </li>
                        <li className="nav-item">
                            <NavLink to="/cocktail-drink" className="nav-link" >Drinks</NavLink>
                        </li>
                        <li className="nav-item">
                            <NavLink to="/cart" className="nav-link" >Cart <span className="badge bg-danger">{cart.length}</span>
                            </NavLink>
                        </li>
                    </ul>
                </div>
                {
                    islogin ? <button className='btn btn-danger' onClick={() => handlelogout()}>Logout</button> :
                        <NavLink to={"/login"} className='btn btn-primary'>Login</NavLink>
                }
            </div>
        </nav >
    )
}

export default Header