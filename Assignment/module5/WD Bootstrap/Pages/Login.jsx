import React from 'react'
import { ErrorMessage, Form, Field, Formik } from 'formik'
import * as Yup from "yup";
import { Navigate, useNavigate } from 'react-router-dom';

const handlevalidate = Yup.object().shape({
    name: Yup.string().required('Please Enter Name !'),
    email: Yup.string().required('please Enter Email !'),
    password: Yup.string().required('Please Enter Password !'),
    discription: Yup.string().required('please Enter Text-area !')
})


const initialValues = {
    name: '',
    email: '',
    password: '',
    discription: ''

}

function Login() {
    const navigate = useNavigate()
    function handleSubmit(values) {
    }
    return (
        <div className="container">
            <div className="row">
                <div className="col-md-6 offset-md-3 p-3 shadow">
                    <h5>Login</h5>
                    <Formik
                        initialValues={initialValues}
                        onSubmit={handleSubmit}
                        validationSchema={handlevalidate}
                    >
                        {({ errors }) => {
                            return (
                                <Form>
                                    <div className="mb-3">
                                        <label htmlFor="">Full Name</label>
                                        <Field type="text" name="name" className={`form-control ${errors.email && "error"}`} placeholder="Enter Name" />
                                        <ErrorMessage
                                            className="text-danger"
                                            name="name"
                                            component="span"
                                        />
                                    </div>

                                    <div className="mb-3">
                                        <label htmlFor="">Email</label>
                                        <Field type="email" name="email" className={`form-control ${errors.email && "error"}`} placeholder="Enter Name" />
                                        <ErrorMessage
                                            className="text-danger"
                                            name="email"
                                            component="span"
                                        />
                                    </div>
                                    <div className="mb-3">
                                        <label htmlFor="">Password</label>
                                        <Field type="password" name="password" className={`form-control ${errors.email && "error"}`} placeholder="Enter Name" />
                                        <ErrorMessage
                                            className="text-danger"
                                            name="password"
                                            component="span"
                                        />
                                    </div>
                                    <div className="mb-3">
                                        <label htmlFor="">Address</label>
                                        <Field type="text" name="discription" className={`form-control ${errors.email && "error"}`} placeholder="Enter Name" />
                                        <ErrorMessage
                                            className="text-danger"
                                            name="discription"
                                            component="span"
                                        />
                                    </div>
                                    <button type='Submit' className='btn btn-primary w-25 rounded-4' onClick={handleSubmit} >Submit</button>
                                </Form>
                            )
                        }}
                    </Formik>
                </div>
            </div>
        </div>
    )
}

export default Login
