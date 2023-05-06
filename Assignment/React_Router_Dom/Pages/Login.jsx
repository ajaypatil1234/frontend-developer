import React, { useContext } from 'react'
import { LoginWrapper } from '../App'
import { navigate, useNavigate } from 'react-router-dom'

function Login() {
    const { islogin, setislogin } = useContext(LoginWrapper)

    const navigate = useNavigate()

    function handlelogin() {
        setislogin(true)
        localStorage.setItem("islogin", "true");
        navigate('/products')
    }

    return (
        <div className="container py-5" >

            <form action="" className=' form text-align-center p-3 mt-5' style={{ border: "1px solid black", textAlign: "center" }}>
                <h1>Login page</h1><br />
                <label htmlFor="">Username :-  </label>
                <input type="text" name="" id="" />
                <br /><br />
                <label htmlFor="">Password :-</label>
                <input type="password" name="" id="" /> <br /><br />
                <button onClick={handlelogin} className='btn btn-primary text-align-center ms-5'>Login</button>
            </form>

        </div>
    )
}

export default Login