import React from 'react'
import './style.css'
// import './media_querry.css'
import Image1 from './image/ab1.jpg'
import Image4 from './image/c4.jpg'

function index() {

  return (
    <div>

      {/* <!-- owl carousel bootstrap --> */}
      < div
        id="carouselExampleIndicators"
        className="carousel slide carousel-fade slide-images"
        databsride="true"
      >
        <div className="carousel-indicators">
          <button
            type="button"
            data-bs-target="#carouselExampleIndicators"
            data-bs-slide-to="0"
            className="active"
            aria-current="true"
            aria-label="Slide 1"
          ></button>
          <button
            type="button"
            data-bs-target="#carouselExampleIndicators"
            data-bs-slide-to="1"
            aria-label="Slide 2"
          ></button>
          <button
            type="button"
            data-bs-target="#carouselExampleIndicators"
            data-bs-slide-to="2"
            aria-label="Slide 3"
          ></button>
        </div>
        <div className="carousel-inner">
          <div className="carousel-item active">
            <div className="img-1 img-fluid"></div>
            <img
              src="Images/banner1.jpg"
              className="d-block w-100 h-75 img-1 img-fluid"
              alt="..."
            />
            <div className="content">
              <p>Fast and Efficient</p>
              <h1>The Superier Choice for Commercial cleaning</h1>
              <button className="btn btn-read">Read more</button>
            </div>
          </div>
          <div className="carousel-item">
            <div className="img-2 img-fluid"></div>
            <img
              src="Images/banner3.jpg"
              className="d-block w-100 h-75 img-1 img-fluid"
              alt="..."
            />
            <div className="content">
              <p>Fast and Efficient</p>
              <h1>Heating, Coolling and plumbing services</h1>
              <button className="btn btn-read">Read More</button>
            </div>
          </div>
          <div className="carousel-item">
            <div className="img-3 img-fluid"></div>
            <img
              src="Images/banner4.jpg"
              className="d-block w-100 h-75 img-1 img-fluid"
              alt="..."
            />
            <div className="content">
              <p>Fast and Efficient</p>
              <h1>Quality Service for Quality Homes</h1>
              <button className="btn btn-read">Read More</button>
            </div>
          </div>
        </div>
        <button
          className="carousel-control-prev"
          type="button"
          data-bs-target="#carouselExampleIndicators"
          data-bs-slide="prev"
        >
          <span className="carousel-control-prev-icon" aria-hidden="true"></span>
          <span className="visually-hidden">Previous</span>
        </button>
        <button
          className="carousel-control-next"
          type="button"
          data-bs-target="#carouselExampleIndicators"
          data-bs-slide="next"
        >
          <span className="carousel-control-next-icon" aria-hidden="true"></span>
          <span className="visually-hidden">Next</span>
        </button>
      </div >

      {/* <!-- carousel information --> */}
      < div className="caro-infor mt-5" >
        <div className="container">
          <div className="row text-center">
            <div
              className="col-lg-4 col-md-12 col-sm-12 col-auto p-5 bg-white best-qua"
            >
              <div className="font-aw bg-primary text-white mx-auto rounded-5 pt-2">
                <span className="fa-solid fa-bath"></span>
              </div>
              <h4 className="pt-2">
                <a href="" className="text-black">Best Quality</a>
              </h4>
              <p className="">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Nostrum
                beatae aut nihil architecto magni
              </p>
            </div>
            <div
              className="col-lg-4 col-md-12 col-sm-12 col-auto p-5 bg-primary exper-ad"
            >
              <div className="font-aw bg-white text-primary mx-auto rounded-5 pt-2">
                <span className="fa-solid fa-gears"></span>
              </div>
              <h4 className="pt-2">
                <a href="" className="text-white">Expert Advise</a>
              </h4>
              <p className="text-white pt-2">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Nostrum
                beatae aut nihil architecto magni
              </p>
            </div>
            <div
              className="col-lg-4 col-md-12 col-sm-12 col-auto p-5 bg-white labour-enter"
            >
              <div className="font-aw bg-primary text-white mx-auto rounded-5 pt-2">
                <span className="fa-solid fa-users"></span>
              </div>
              <h4 className="pt-2">
                <a href="" className="text-black">Labour Enterprise</a>
              </h4>
              <p className="">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Nostrum
                beatae aut nihil architecto magni
              </p>
            </div>
          </div>
        </div>
      </div >

      {/* <!-- about information --> */}
      < section id="#about" className="pt-5" >
        <div className="container py-5">
          <div className="row">
            <div className="col-lg-6 col-md-8 col-sm-12 col-auto">
              <img src={Image1} alt="" className="img-fluid rounded-1" />
            </div>
            <div className="col-lg-6 col-md-12 col-sm-12 col-auto ps-lg-5 pt-3">
              <p className="title-about">WELCOME TO OUR CLEANFRESHLY</p>
              <h1 className="title-head">About Our Company</h1>
              <p className="text-muted">
                Excepteur sint occaecat non proident, sunt in culpa quis.
                Phasellus lacinia id erat eu ullamcorper. Nunc id ipsum fringilla,
                gravida felis vitae. Phasellus lacinia id, sunt in culpa quis.
                Phasellus lacinia
              </p>
              <p className="text-muted">
                Excepteur sint occaecat non proident, sunt in culpa quis.
                Phasellus lacinia id erat eu ullamcorper. Nunc id ipsum fringilla,
                gravida felis vitae. Phasellus lacinia id, sunt in culpa quis.
                Phasellus lacinia
              </p>
              <button className="btn btn-primary rounded-5 btn-read-about">
                Read More
              </button>
            </div>
          </div>
        </div>
      </section >

      {/* <!-- service --> */}
      < section id="service" >
        <div className="container pt-5">
          <div className="row">
            <div className="col-lg-4">
              <h1 className="">We Providing A High Quality Services</h1>
            </div>
            <div className="col-lg-4">
              <p className="text-muted">
                Ea consequuntur illum facere aperiam sequi optio consectetur
                adipisicing elitFuga, suscipit totam animi consequatur saepe
                blanditiis.Lorem ipsum dolor sit amet,Ea consequuntur illum facere
                aperiam sequi optio consectetur adipisicing elit. Fuga, suscipit
                totam animi consequatur saepe blanditiis.
              </p>
            </div>
            <div className="col-lg-4">
              <p className="text-secondary">
                Ea consequuntur illum facere aperiam sequi optio consectetur
                adipisicing elitFuga, suscipit totam animi consequatur saepe
                blanditiis.Lorem ipsum dolor sit amet,Ea consequuntur illum facere
                aperiam sequi optio consectetur adipisicing elit. Fuga, suscipit
                totam animi consequatur saepe blanditiis.
              </p>
            </div>
          </div>
        </div>
        <hr />
        <div className="container p-3">
          <div className="row">
            <div className="col-lg-2 col-md-3 col-sm-6 ser-con p-1">
              <div className="ser">
                <span className="fa-solid fa-plug"></span>
                <p>Electrical Work</p>
              </div>
            </div>
            <div className="col-lg-2 col-md-3 col-sm-6 ser-con p-1">
              <div className="ser">
                <span className="fa-solid fa-paintbrush"></span>
                <p>Painting Work</p>
              </div>
            </div>
            <div className="col-lg-2 col-md-3 col-sm-6 ser-con p-1">
              <div className="ser">
                <span className="fa-solid fa-bed"></span>
                <p>Furniture Work</p>
              </div>
            </div>
            <div className="col-lg-2 col-md-3 col-sm-6 ser-con p-1">
              <div className="ser">
                <span className="fa-solid fa-shield-alt"></span>
                <p>Washing Machine</p>
              </div>
            </div>
            <div className="col-lg-2 col-md-3 col-sm-6 ser-con p-1">
              <div className="ser">
                <span className="fa-solid fa-paragraph"></span>
                <p>Modular Kitchen</p>
              </div>
            </div>
            <div className="col-lg-2 col-md-3 col-sm-6 ser-con p-1">
              <div className="ser">
                <span className="fa-solid fa-unlink"></span>
                <p>Carpet Cleaning</p>
              </div>
            </div>
          </div>
        </div>
      </section >

      {/* <!-- service information --> */}
      < section id="service-details" >
        <div className="container py-5">
          <div className="row text-center">
            <div className="col-lg-3 col-md-6 col-sm-12 col-auto py-2 px-5">
              <div className="details-grid">
                <span className="fa-solid fa-bath"></span>
                <h3><a href="">Plumbing</a></h3>
                <p>
                  Lorem ipsum dolor sit amet,Ea consequuntur illum facere aperiam
                  sequi optio consectetur.
                </p>
              </div>
            </div>
            <div className="col-lg-3 col-md-6 col-sm-12 col-auto py-2 px-5">
              <div className="details-grid">
                <span
                  className="fa-solid fa-american-sign-language-interpreting"
                ></span>
                <h3><a href="">Repairs</a></h3>
                <p>
                  Lorem ipsum dolor sit amet,Ea consequuntur illum facere aperiam
                  sequi optio consectetur.
                </p>
              </div>
            </div>
            <div className="col-lg-3 col-md-6 col-sm-12 col-auto py-2 px-5">
              <div className="details-grid">
                <span className="fa-solid fa-fire-extinguisher"></span>
                <h3><a href="">Spring</a></h3>
                <p>
                  Lorem ipsum dolor sit amet,Ea consequuntur illum facere aperiam
                  sequi optio consectetur.
                </p>
              </div>
            </div>
            <div className="col-lg-3 col-md-6 col-sm-12 col-auto py-2 px-5">
              <div className="details-grid">
                <span className="fa-solid fa-gavel"></span>
                <h3><a href="">Carpenter</a></h3>
                <p>
                  Lorem ipsum dolor sit amet,Ea consequuntur illum facere aperiam
                  sequi optio consectetur.
                </p>
              </div>
            </div>
          </div>
        </div>
      </section >

      {/* service provider */}
      < section className="service-provider" >
        <div className="service-p-bg">
          <div className="container p-5">
            <div className="row py-3">
              <div className="col-lg-8">
                <h1 style={{ fontSize: "3rem" }}>Professional Cleaning Services Provider</h1>
                <p className="py-2 fs-5">
                  Excepteur sint occaecat cupidatat non proident, sunt in culpa
                  qui officia sed deserunt mollit anim id est laborum mollit anim
                  id est nulla.
                </p>
                <div className="row">
                  <div className="col-lg-4 col-md-6 col-sm-12 col-auto p-2">
                    <div className="service-p-info bg-white text-black py-3">
                      <span className="fa-solid fa-phone"></span>
                      <h4>Phone</h4>
                      <p>+142 5897555</p>
                    </div>
                  </div>
                  <div className="col-lg-4 col-md-6 col-sm-12 col-auto p-2">
                    <div className="service-p-info  bg-white text-black py-3">
                      <span className="fa-solid fa-envelope"></span>
                      <h4>Email</h4>
                      <p>xyz@gmail.com</p>
                    </div>
                  </div>
                  <div className="col-lg-4 col-md-6 col-sm-12 col-auto p-2 ">
                    <div className="service-p-info  bg-white text-black py-3">
                      <span className="fa-solid fa-clock"></span>
                      <h4>Opening Hours</h4>
                      <p>10.00 to 6.00 PM</p>
                    </div>
                  </div>
                </div>
              </div>
              <div id='getStart' className="col-lg-4 col-md-12 col-sm-12 col-auto px-4 py-5 rounded-3 ">
                <form action="" className="rounded rounded-3">
                  <div className="form-input-1 py-2">
                    <label for="">First name</label>
                    <input type="text" name="" id="" className="form-control  rounded-5 " />
                  </div>
                  <div className="form-input-1 py-2 ">
                    <label for="">Last name</label>
                    <input type="text" name="" id="" className="form-control rounded-5" />
                  </div>
                  <div className="form-input-1 py-2">
                    <label for="">Password</label>
                    <input type="password" name="" id="" className="form-control rounded-5" />
                  </div>
                  <div className="form-input-1 py-2">
                    <button className="btn btn-primary w-100 rounded-5 get-start">Get Started</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </section >

      {/* <!-- TESTIMONIALS --> */}
      < section className="testi pb-5" >
        <div className="testi-head py-5">
          <div className="headings text-center">
            <h6 style={{ color: "orangered" }}>TESTIMONIALS</h6>
            <h1 style={{ fontWeight: "700" }}>What Our Clients Say</h1>
            <p className="text-muted px-lg-5">
              Lorem ipsum dolor sit amet consectetur adipisicing elit sunt in
              culpa qui officia sed deserunt mollit anim id est laborum mollit
              anim id est nulla.
            </p>
          </div>
        </div>

        {/* <!-- carousal slider --> */}
        <div className="container">
          <div className="bxslider">

            <div className="div1">
              <div className="msg ">
                <p className="p1">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ea sit id
                  accusantium
                  officia quod quasi necessitatibus perspiciatis Harum error provident
                  quibusdam tenetur.
                </p>
                <h4>ABC</h4>
                <p className="p2">globant company</p>
              </div>
              <div className="img1">
                <img src={Image4} className="img-fluid" />
              </div>
            </div>
          </div>
        </div>
      </section >


      {/* <!--footer --> */}
      {/* <section
        className="footer"
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
      </section> */}



    </div>

  )
}
export default index

