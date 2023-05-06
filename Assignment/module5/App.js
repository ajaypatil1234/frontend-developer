import React from 'react'
import { BrowserRouter, Route, Routes } from 'react-router-dom'
import Index from './WD Bootstrap/Pages/index'
import Header from './WD Bootstrap/Header'
import Footer from './WD Bootstrap/Footer'
import About from './WD Bootstrap/Pages/About'
import Service from './WD Bootstrap/Pages/Service'
import Contact from './WD Bootstrap/Pages/Contact'
import Login from './WD Bootstrap/Pages/Login'

function App() {
  return (
    <>
      <BrowserRouter>
        <Header />
        <Routes>
          <Route path='/' element={<Index />} />
          <Route path='/about' element={<About />} />
          <Route path='/Service' element={<Service />} />
          <Route path='/contact' element={<Contact />} />
          <Route path='/Login' element={<Login />} />
        </Routes>
        <Footer />
      </BrowserRouter>
    </>
  )
}

export default App