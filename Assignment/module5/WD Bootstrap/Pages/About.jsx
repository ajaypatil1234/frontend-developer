import React from 'react'
import About1 from './image/About1.jpg'
import About2 from './image/About2.jpg'
import Team1 from './image/team1.jpg'
import Team2 from './image/team2.jpg'
import Team3 from './image/team3.jpg'
import Team4 from './image/team4.jpg'

function About() {
    return (
        <>
            {/* // info  */}
            <div className="container">
                <div className="row mt-5">
                    <div className=" col-sm-12 col-md-6 mt-5 ">
                        <h3 style={{ color: "orange" }}>Welcome To Our ClenFreshly</h3>
                        <h1 style={{ fontWeight: '700   ' }}>About Our Company</h1>
                        <p style={{ color: "gray" }}>
                            Lorem ipsum dolor, sit amet consectetur adipisicing elit. Molestiae modi totam dolore recusandae sit omnis iure ipsa quaerat debitis id incidunt sapiente sed voluptas fugit reiciendis ab, neque molestias ut.
                        </p>
                        <p style={{ color: "gray" }}>
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Iure possimus atque a mollitia ad sint excepturi. Amet beatae eligendi, placeat voluptates doloremque, debitis velit labore impedit reiciendis, exercitationem ducimus repudiandae.
                        </p>
                    </div>
                    <div className="col-sm-12 col-md-6">
                        <img src={About1} alt="" />
                    </div>


                    <div className="row mt-5">
                        <div className="col-sm-12 col-md-6">
                            <img src={About2} alt="" className='img-fluid' />
                        </div>

                        <div className="col-sm-12 col-md-6 mt-5 " style={{ paddingLeft: "50px" }}>
                            <h3 style={{ color: "orange" }}>Simple Text</h3>
                            <h1 style={{ fontWeight: '700' }}>Why Choose Us</h1>
                            <p style={{ color: "gray" }}>
                                Lorem ipsum dolor, sit amet consectetur adipisicing elit. Molestiae modi totam dolore recusandae sit omnis iure ipsa quaerat debitis id incidunt sapiente sed voluptas fugit reiciendis ab, neque molestias ut.
                            </p>
                            <p style={{ color: "gray" }}>
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Iure possimus atque a mollitia ad sint excepturi. Amet beatae eligendi, placeat voluptates doloremque, debitis velit labore impedit reiciendis, exercitationem ducimus repudiandae.
                            </p>


                        </div>
                    </div>

                </div>
            </div>

            {/* progessing  */}
            <div className="" style={{ backgroundColor: "#EAF2FB" }}>
                <div className="row mt-5 p-5">
                    <div className=" col-sm-12 col-md-6 mt-5">
                        <h2 style={{ color: "orange" }}>Simple Text</h2>
                        <h1 style={{ fontWeight: "700" }}>We Have 17+ Years Of Professional Experience</h1>
                        <p style={{ color: "grey" }}>Lorem ipsum dolor sit amet consectetur adipisicing elit sunt in culpa qui officia sed deserunt mollit anim</p>
                    </div> <br />
                    <div className="col-sm-12 col-md-6">
                        <h5 style={{ fontWeight: "700" }}>Plumbing</h5>
                        <div className="progress">
                            <div className="progress-bar " style={{ width: "70%" }} role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                        </div> <br />
                        <h5 style={{ fontWeight: "700" }}>Office Cleaning</h5>
                        <div className="progress">
                            <div className="progress-bar " style={{ width: "80%" }} role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                        </div> <br />
                        <h5 style={{ fontWeight: "700" }}>Spring Cleaning</h5>
                        <div className="progress">
                            <div className="progress-bar " style={{ width: "95%" }} role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                        </div> <br />
                        <h5 style={{ fontWeight: "700" }}>Customer Satisfaction</h5>
                        <div className="progress">
                            <div className="progress-bar" style={{ width: "95%" }} role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                        </div> <br />
                    </div>
                </div>
            </div>


            {/* Amazing team  */}
            <div className="container">
                <div className="row  p-5">
                    <div className="team col-md-12 " style={{ textAlign: 'center' }}>
                        <h3 className='ms-5 ' style={{ color: "orange" }}>Meet our</h3>
                        <h1 className='ms-5'>Amazing Team</h1>
                        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quod dolores error sed,<br /> consequatur eum dolorem itaque voluptatem veritatis.</p>
                    </div> <br />
                </div> <br />


                <div className="row">
                    <div className="col-sm-12 col-md-3">
                        <div className="card" style={{ width: "18rem" }}>
                            <img className="" src={Team1} alt="Card image cap" />
                            <div className="card-body">
                                <h3 className="card-title">Mickel Zaman</h3 >
                                <p className="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                <span className="fa-brands fa-facebook-f" style={{ color: "#F45D01" }}></span>
                                <span className="fa-brands fa-instagram ms-5" style={{ color: "#F45D01" }}></span>
                                <span className="fa-brands fa-linkedin-in ms-5" style={{ color: "#F45D01" }}></span>
                                <span className="fa-solid fa-phone ms-5" style={{ color: "#F45D01" }}></span>
                            </div>
                        </div>
                    </div>
                    <div className=" col-sm-12 col-md-3">
                        <div className="card" style={{ width: "18rem" }}>
                            <img className="" src={Team2} alt="Card image cap" />
                            <div className="card-body">
                                <h3 className="card-title">Paul Croves</h3 >
                                <p className="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                <span className="fa-brands fa-facebook-f" style={{ color: "#F45D01" }}></span>
                                <span className="fa-brands fa-instagram ms-5" style={{ color: "#F45D01" }}></span>
                                <span className="fa-brands fa-linkedin-in ms-5" style={{ color: "#F45D01" }}></span>
                                <span className="fa-solid fa-phone ms-5" style={{ color: "#F45D01" }}></span>
                            </div>
                        </div>
                    </div>
                    <div className="col-sm-12 col-md-3">
                        <div className="card" style={{ width: "18rem" }}>
                            <img className="" src={Team3} alt="Card image cap" />
                            <div className="card-body">
                                <h3 className="card-title">Ricardo Spencer</h3 >
                                <p className="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                <span className="fa-brands fa-facebook-f" style={{ color: "#F45D01" }}></span>
                                <span className="fa-brands fa-instagram ms-5" style={{ color: "#F45D01" }}></span>
                                <span className="fa-brands fa-linkedin-in ms-5" style={{ color: "#F45D01" }}></span>
                                <span className="fa-solid fa-phone ms-5" style={{ color: "#F45D01" }}></span>
                            </div>
                        </div>
                    </div>
                    <div className=" col-sm-12 col-md-3">
                        <div className="card" style={{ width: "18rem" }}>
                            <img className="" src={Team4} alt="Card image cap" />
                            <div className="card-body">
                                <h3 className="card-title">Marko Dugonji</h3 >
                                <p className="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                <span className="fa-brands fa-facebook-f" style={{ color: "#F45D01" }}></span>
                                <span className="fa-brands fa-instagram ms-5" style={{ color: "#F45D01" }}></span>
                                <span className="fa-brands fa-linkedin-in ms-5" style={{ color: "#F45D01" }}></span>
                                <span className="fa-solid fa-phone ms-5" style={{ color: "#F45D01" }}></span>
                            </div>
                        </div>
                    </div>
                </div>



            </div>

        </>

    )
}

export default About