import React, { useContext } from 'react'
import { LoginWrapper } from '../App'
import { Navigate } from 'react-router-dom'

// the Component default one props children
function PrivateRoute({ children }) {
    const { islogin } = useContext(LoginWrapper)

    if (islogin) {
        return <div>{children}</div>
    } else {
        return <Navigate to='/login' />
    }
}


export default PrivateRoute
