import React from 'react'
import './Pages/style.css'
function Footer() {
    return (
        <>
            <section
                className="footer mt-5"
                style={{ background: "rgb(36, 35, 35)", color: "white" }}
            >
                <div className="container py-4">
                    <div
                        className="row border border-1 border-top-0 border-start-0 border-end-0"
                    >
                        <div className="col-lg-9 col-md-6 col-sm-12 col-auto">
                            <h1>
                                <a href="" className="text-white"
                                >Clean<span style={{ color: "orangered" }}>Freshly</span></a
                                >
                            </h1>
                        </div>
                        <div className="col-lg-3 col-md-6 col-sm-12 col-auto">
                            <div className="row py-3">
                                <div className="col-auto"></div>
                                <div className="col-auto">
                                    <span className="fa-brands fa-facebook-f"></span>
                                </div>
                                <div className="col-auto">
                                    <span className="fa-brands fa-twitter"></span>
                                </div>
                                <div className="col-auto">
                                    <span className="fa-brands fa-google-plus-g"></span>
                                </div>
                                <div className="col-auto">
                                    <span className="fa-brands fa-linkedin-in"></span>
                                </div>
                                <div className="col-auto">
                                    <span className="fa-brands fa-instagram"></span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div className="row py-3">
                        <div className="col-lg-2 col-md-6 col-sm-12 col-auto">
                            <h4 className="pb-3">Extra Links</h4>
                            <ul className="list-unstyled">
                                <li>About Company</li>
                                <li>Our Services</li>
                                <li>Recent Projects List</li>
                                <li>Latest News Blog</li>
                            </ul>
                        </div>
                        <div className="col-lg-6 col-md-6 col-sm-12 col-auto">
                            <h4 className="pb-3">List Of Services</h4>
                            <div className="row">
                                <div className="col-lg-6 col-md-6 col-sm-12 col-auto">
                                    <ul className="list-unstyled">
                                        <li>About Company</li>
                                        <li>Our Services</li>
                                        <li>Recent Projects List</li>
                                        <li>Latest News Blog</li>
                                    </ul>
                                </div>
                                <div className="col-lg-6 col-md-6 col-sm-12 col-auto">
                                    <ul className="list-unstyled">
                                        <li>About Company</li>
                                        <li>Our Services</li>
                                        <li>Recent Projects List</li>
                                        <li>Latest News Blog</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div className="col-lg-2 col-md-6 col-sm-12 col-auto">
                            <h4 className="pb-3">Support</h4>
                            <ul className="list-unstyled">
                                <li>About Company</li>
                                <li>Our Services</li>
                                <li>Recent Projects List</li>
                                <li>Latest News Blog</li>
                            </ul>
                        </div>
                        <div className="col-lg-2 col-md-6 col-sm-12 col-auto">
                            <h4 className="pb-3">Working Hours</h4>
                            <ul className="list-unstyled">
                                <li>  Monday : 8AM - 6AM</li>
                                <li> Tuesday: 8AM - 6AM</li>
                                <li>
                                    Wednesday : 8AM - 6AM
                                </li>
                                <li>
                                    Friday : 8AM - 6AM
                                </li>
                                <li>
                                    Sunday : Closed
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <hr />
                <div className="text-center pb-3">
                    <span className=""
                    >© 2022 Cleanfreshly. All rights reserved | Designed by
                        AJ PATIL</span
                    >
                </div>
            </section>
        </>

    )
}

export default Footer