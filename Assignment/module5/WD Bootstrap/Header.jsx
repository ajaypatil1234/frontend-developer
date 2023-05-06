import React from 'react'
import { Link, NavLink } from 'react-router-dom'
import './Pages/style.css'
function Header() {
    return (
        <>
            < section id="header-title " className='' style={{ background: "#f45d01" }
            }>
                <div className="header-con">
                    <div className="container container-lg container-md container-sm">
                        <div className="row p-3">
                            <div className="col-auto col-sm-12 col-md-12 col-lg-8 hide-con">
                                <div className="list-unstyled d-flex align-items-center">
                                    <li className="p-2">
                                        <a href="" className="text-white text-decoration-none">
                                            <span className="fa-solid fa-clock"></span>
                                            Monday - Friday: 10:00 - 18:00
                                        </a>
                                    </li>
                                    <li className="p-2">
                                        <a href="" className="text-white text-decoration-none">
                                            <span className="fa-solid fa-envelope"></span>
                                            mail@company.com
                                        </a>
                                    </li>
                                    <li className="p-2">
                                        <a href="" className="text-white text-decoration-none">
                                            <span className="fa-solid fa-phone"></span>
                                            +142 5897555
                                        </a>
                                    </li>
                                </div>
                            </div>
                            <div className="col-auto col-sm-12 col-md-12 col-lg-4">
                                <div
                                    className="list-unstyled d-flex align-items-center justify-content-end"
                                >
                                    <li className="p-2">
                                        <a href="" className="text-white">
                                            <span className="fa-brands fa-facebook-f"></span>
                                        </a>
                                    </li>
                                    <li className="p-2">
                                        <a href="" className="text-white">
                                            <span className="fa-brands fa-instagram"></span>
                                        </a>
                                    </li>
                                    <li className="p-2">
                                        <a href="" className="text-white">
                                            <span className="fa-brands fa-twitter"></span>
                                        </a>
                                    </li>
                                    <li className="p-2">
                                        <a href="" className="text-white">
                                            <span className="fa-brands fa-vimeo-v"></span>
                                        </a>
                                    </li>
                                    <li className="p-2">
                                        <a href="" className="text-white">
                                            <span className="fa-brands fa-linkedin-in"></span>
                                        </a>
                                    </li>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section >


            {/* navigation */}
            < nav className="navbar navbar-expand-lg header-nav" >
                <div className="container">
                    <a className="navbar-brand logo" href="#">Clean<span>Freshly</span></a>
                    <button
                        className="navbar-toggler"
                        type="button"
                        data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent"
                        aria-controls="navbarSupportedContent"
                        aria-expanded="false"
                        aria-label="Toggle navigation"
                    >
                        <span className="navbar-toggler-icon"></span>
                    </button>
                    <div className="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul
                            className="navbar-nav me-auto mb-2 mb-lg-0 d-flex justify-content-end w-100"
                        >
                            <li className="nav-item">
                                <NavLink
                                    to='/'
                                    className="nav-link text-black "
                                    aria-current="page"
                                    href="#"

                                >Home</NavLink>
                            </li>
                            <li className="nav-item">
                                <NavLink to='/about' className="nav-link text-black" href="#">About</NavLink>
                            </li>
                            <li className="nav-item">
                                <NavLink to="/Service" className="nav-link text-black" href="#">Service</NavLink>
                            </li>

                            <li className="nav-item">
                                <NavLink to='/contact' className="nav-link text-black">Contact</NavLink>
                            </li>
                            <li>
                                <NavLink to='/Login'><button id='getStart' className="btn-ser" type="submit">Get Started</button></NavLink>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav >
        </>

    )
}

export default Header