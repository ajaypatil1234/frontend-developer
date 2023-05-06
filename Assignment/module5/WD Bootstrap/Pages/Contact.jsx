import React from 'react'
import './style.css'

function Contact() {

    return (
        <>
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d30766386.36390355!2d60.97916846389906!3d19.726992365742042!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30635ff06b92b791%3A0xd78c4fa1854213a6!2sIndia!5e0!3m2!1sen!2sin!4v1683265881855!5m2!1sen!2sin" width="100%" height="600" style={{ border: "0" }} allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" className='frame'></iframe>



            <div className="cont-details w-25" style={{ background: '#EAF2FB' }}>
                <h1 style={{ fontWeight: '700' }}>Opening hours</h1> <br /><br />

                <div className="opening-info-day">
                    <span className="opening-left d-flex ms-5 ">Monday <div className="opening-right" style={{ marginLeft: '50px', fontWeight: '700' }}>8AM - 6AM</div></span> <br /><br />
                </div>
                <div className="opening-info-day  ">
                    <span className="opening-left d-flex ms-5">Tuesday<div style={{ marginLeft: '50px', fontWeight: '700' }} className="opening-right">8AM - 6AM</div> </span><br /><br />
                </div>
                <div className="opening-info-day">
                    <span className="opening-left d-flex ms-5">Wednesday<div style={{ marginLeft: '30px', fontWeight: '700' }} className="opening-right">8AM - 6AM</div></span><br /><br />
                </div>
                <div className="opening-info-day">
                    <span className="opening-left d-flex ms-5">Thursday <div style={{ marginLeft: '50px', fontWeight: '700' }} className="opening-right">8AM - 6AM</div></span><br /><br />
                </div>
                <div className="opening-info-day">
                    <span className="opening-left d-flex ms-5">Friday <div style={{ marginLeft: '70px', fontWeight: '700' }} className="opening-right">8AM - 6AM</div></span><br /><br />
                </div>
                <div className="opening-info-day">
                    <span className="opening-left d-flex ms-5">Saturday<div style={{ marginLeft: '50px', fontWeight: '700' }} className="opening-right">8AM - 6AM</div></span><br /><br />
                </div>
                <div className="opening-info-day">
                    <span className="opening-left d-flex ms-5">Sunday<div style={{ marginLeft: '70px', fontWeight: '700' }} className="opening-right">Closed</div></span>
                </div>

            </div>



            <div className="container">
                <div className="row mt-5">
                    <div className="col-md-6">

                        <div className="location">
                            <span className='fa fa-map-marker'></span>
                            <span className='ms-3' style={{ fontSize: '25px', fontWeight: '600' }}>Address</span>
                            <div className='ms-5' style={{ color: 'gray' }}>Dolor sit, #PTH, 55080, 8800 Honey Street <br /> <br />

                                sed at ipsum, #9436 Apt Pro towers <br /><br />

                                United kingdom, UK.</div>
                        </div> <br />

                        <div className="mail">
                            <span className=' icon  fa fa-envelope'></span>
                            <span className='ms-3' style={{ fontSize: '25px ', fontWeight: '600' }}>How any Question ?</span>
                            <div className='ms-5' style={{ fontSize: '20px', color: 'gray' }}>Ajpatil@examplemail.com</div>
                        </div><br /><br />

                        <div className="telephone">
                            <span className=' phone fa fa-phone'></span>
                            <span className='ms-3' style={{ fontSize: '25px ', fontWeight: '600' }}>Phone Number</span>
                            <div className='ms-5' style={{ fontSize: '20px', color: 'gray' }}>(123) 456-78-90</div>
                        </div>

                    </div>
                    <div className="col-md-6">
                        <div className="form mt-5">
                            <input type="text" placeholder='Full Name' className='form-control w-100 rounded-5' />
                            <input type="Email" placeholder='your Email' className='form-control w-100 rounded-5' />
                            <input type="text" placeholder='Subject' className='form-control w-100 rounded-5' />
                            <input type="Number" placeholder='Phone Number' className='form-control w-100 rounded-5' />
                        </div> <br />
                        <textarea placeholder='Type Your message here' className='form-control w-100 rounded-4'></textarea> <br /><br />
                        <button className='messabtn w-50 p-2 rounded-5'>Send Message</button>
                    </div>
                </div>
            </div>

        </>

    )
}

export default Contact