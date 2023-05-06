import React from 'react'
import Service1 from './image/service1.jpg'
import Service2 from './image/service2.jpg'
import Service3 from './image/Service3.jpg'
import Service4 from './image/banner3.jpg'
import './style.css'

function Service() {
    return (
        <>
            <div className="container">

                {/* first row */}
                <div className="row mt-5">
                    <div className="col-md-6">
                        <img src={Service2} className='img-fluid' style={{ height: "400px" }} />
                    </div>
                    <div className="col-md-6">
                        <h3 style={{ color: "orange" }}>Service For you</h3>
                        <h1 style={{ fontWeight: "700" }}>House Cleaning</h1><br />
                        <h4 className='ssser'> <span className='fa fa-check'></span> Well trained technician.</h4><br />
                        <h4 className="ssser"> <span className='fa fa-check'></span> A hassle free Service</h4><br />
                        <h4 className="ssser"><span className='fa fa-check'></span> Using Best Quality tools.</h4><br />
                        <h4 className="ssser"><span className='fa fa-check'></span>  Money is on safe Hand</h4><br />
                        <button className='servi-btn rounded-5 w-25' >Read More</button>
                    </div>
                </div>
                <hr style={{ color: "lightblue" }} />


                {/* second row */}
                <div className="row mt-5">

                    <div className="col-md-6">
                        <h3 style={{ color: "orange" }}>Service For you</h3>
                        <h1 style={{ fontWeight: "700" }}>Replacement, Repairs.</h1><br />
                        <h4 className='ssser'> <span className='fa fa-check'></span> Well trained technician.</h4><br />
                        <h4 className="ssser"> <span className='fa fa-check'></span> A hassle free Service</h4><br />
                        <h4 className="ssser"><span className='fa fa-check'></span> Using Best Quality tools.</h4><br />
                        <h4 className="ssser"><span className='fa fa-check'></span>  Money is on safe Hand</h4><br />
                        <button className='servi-btn rounded-5 w-25' >Read More</button>
                    </div>
                    <div className="col-md-6">
                        <img src={Service1} className='img-fluid' style={{ height: "400px" }} />
                    </div>
                </div>
                <hr style={{ color: "lightblue" }} />

                {/* third row  */}
                <div className="row mt-5">
                    <div className="col-md-6">
                        <img src={Service3} className='img-fluid' style={{ height: "400px" }} />
                    </div>
                    <div className="col-md-6">
                        <h3 style={{ color: "orange" }}>Service For you</h3>
                        <h1 style={{ fontWeight: "700" }}>Sump And Tank Cleaning</h1><br />
                        <h4 className='ssser'> <span className='fa fa-check'></span> Well trained technician.</h4><br />
                        <h4 className="ssser"> <span className='fa fa-check'></span> A hassle free Service</h4><br />
                        <h4 className="ssser"><span className='fa fa-check'></span> Using Best Quality tools.</h4><br />
                        <h4 className="ssser"><span className='fa fa-check'></span>  Money is on safe Hand</h4><br />
                        <button className='servi-btn rounded-5 w-25' >Read More</button>
                    </div>
                </div>


                {/* four row */}
                <div className="row mt-5">

                    <div className="col-md-6">
                        <h3 style={{ color: "orange" }}>Service For you</h3>
                        <h1 style={{ fontWeight: "700" }}>Replacement, Repairs.</h1><br />
                        <h4 className='ssser'> <span className='fa fa-check'></span> Well trained technician.</h4><br />
                        <h4 className="ssser"> <span className='fa fa-check'></span> A hassle free Service</h4><br />
                        <h4 className="ssser"><span className='fa fa-check'></span> Using Best Quality tools.</h4><br />
                        <h4 className="ssser"><span className='fa fa-check'></span>  Money is on safe Hand</h4><br />
                        <button className='servi-btn rounded-5 w-25' >Read More</button>
                    </div>
                    <div className="col-md-6">
                        <img src={Service4} className='img-fluid' style={{ height: "400px" }} />
                    </div>
                </div>


                <div className="row mt-5" style={{ textAlign: 'center' }}>
                    <h3 style={{ color: "orange" }}>AVAILABLE PACKAGES</h3>
                    <h1 style={{ fontWeight: "700" }}>Pricing Plans</h1>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Et, molestias praesentium quidem recusandae debitis ullam quae! Nesciunt </p>

                    <div className="col-md-4 mt-5">
                        <div className='box p-5'  >
                            <h5 style={{ color: 'orange' }}>Basic</h5>
                            <h1 style={{ fontWeight: '700' }}>$100</h1><br />
                            <h4 style={{ color: 'gray' }}>Monthly</h4>
                            <hr />
                            <div>Lorem ipsum dolor <span className='ms-5' style={{ backgroundColor: "lightgreen", borderRadius: "80%" }}>
                                <a className='fa fa-check ' style={{ fontSize: "20px", padding: '10px', height: "45px" }} ></a>
                            </span></div><br />
                            <div>Lorem ipsum dolor <span className='ms-5' style={{ backgroundColor: "lightgreen", borderRadius: "80%" }}>
                                <a className='fa fa-check ' style={{ fontSize: "20px", padding: '10px', height: "45px" }} ></a>
                            </span></div><br />
                            <div>Lorem ipsum dolor <span className='ms-5' style={{ backgroundColor: "#ffc0cb", borderRadius: "80%" }}>
                                <a className='fa fa-close ' style={{ fontSize: "20px", padding: '10px', height: "45px" }} ></a>
                            </span></div><br />
                            <div>Lorem ipsum dolor <span className='ms-5' style={{ backgroundColor: "#ffc0cb", borderRadius: "80%" }}>
                                <a className='fa fa-close ' style={{ fontSize: "20px", padding: '10px', height: "45px" }} ></a>
                            </span></div><br />
                        </div>
                    </div>

                    <div className="col-md-4 mt-5">
                        <div className='box' style={{ boxShadow: " 0px 40px 90px rgb(221, 214, 214)", padding: '50px' }}>
                            <h5 style={{ color: 'orange' }}>Standard</h5>
                            <h1 style={{ fontWeight: '700' }}>$200</h1><br />
                            <h4 style={{ color: 'gray' }}>Monthly</h4>
                            <hr />
                            <div>Lorem ipsum dolor <span className='ms-5' style={{ backgroundColor: "lightgreen", borderRadius: "50%" }}>
                                <a className='fa fa-check ' style={{ fontSize: "20px", padding: '10px', height: "45px" }} ></a>
                            </span></div><br />
                            <div>Lorem ipsum dolor <span className='ms-5' style={{ backgroundColor: "lightgreen", borderRadius: "50%" }}>
                                <a className='fa fa-check ' style={{ fontSize: "20px", padding: '10px', height: "45px" }} ></a>
                            </span></div><br />
                            <div>Lorem ipsum dolor <span className='ms-5' style={{ backgroundColor: "	#ffc0cb", borderRadius: "50%" }}>
                                <a className='fa fa-close ' style={{ fontSize: "20px", padding: '10px', height: "45px" }} ></a>
                            </span></div><br />
                            <div>Lorem ipsum dolor <span className='ms-5' style={{ backgroundColor: "	#ffc0cb", borderRadius: "50%" }}>
                                <a className='fa fa-close ' style={{ fontSize: "20px", padding: '10px', height: "45px" }} ></a>
                            </span></div><br />
                        </div>
                    </div>

                    <div className="col-md-4 mt-5">
                        <div className='box p-5'>
                            <h5 style={{ color: 'orange' }}>Exclusive</h5>
                            <h1 style={{ fontWeight: '700' }}>$395</h1><br />
                            <h4 style={{ color: 'gray' }}>Monthly</h4>
                            <hr />
                            <div>Lorem ipsum dolor <span className='ms-5' style={{ backgroundColor: "lightgreen", borderRadius: "80%" }}>
                                <a className='fa fa-check ' style={{ fontSize: "20px", padding: '10px', height: "45px" }} ></a>
                            </span></div><br />
                            <div>Lorem ipsum dolor <span className='ms-5' style={{ backgroundColor: "lightgreen", borderRadius: "80%" }}>
                                <a className='fa fa-check ' style={{ fontSize: "20px", padding: '10px', height: "45px" }} ></a>
                            </span></div><br />
                            <div>Lorem ipsum dolor <span className='ms-5' style={{ backgroundColor: "lightgreen", borderRadius: "80%" }}>
                                <a className='fa fa-check ' style={{ fontSize: "20px", padding: '10px', height: "45px" }} ></a>
                            </span></div><br />
                            <div>Lorem ipsum dolor <span className='ms-5' style={{ backgroundColor: "lightgreen", borderRadius: "80%" }}>
                                <a className='fa fa-check ' style={{ fontSize: "20px", padding: '10px', height: "45px" }} ></a>
                            </span></div><br />
                        </div>
                    </div>
                </div>

            </div>
        </>
    )
}

export default Service