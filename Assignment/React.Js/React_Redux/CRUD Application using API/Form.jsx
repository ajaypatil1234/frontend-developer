import React, { useContext, useState } from "react";
import { WrapperContext } from "./App";

function Form() {
    const {
        firstName,
        setFirstName,
        lastName,
        setLastName,
        city,
        setCity,
        isEdit,
        handleEdit,
        handleSubmit,
    } = useContext(WrapperContext);

    return (
        <div className="container">
            <div className="row">
                <div className="col-md-6 offset-md-3 shadow my-5 p-5">
                    <form action="">
                        <div className="mb-3">
                            <label>First Name</label>
                            <input
                                type="text"
                                value={firstName}
                                onChange={(e) => setFirstName(e.target.value)}
                                className="form-control"
                            />
                        </div>
                        <div className="mb-3">
                            <label>Last Name</label>
                            <input
                                type="text"
                                value={lastName}
                                onChange={(e) => setLastName(e.target.value)}
                                className="form-control"
                            />
                        </div>
                        <div className="mb-3">
                            <label>City</label>
                            <input
                                type="text"
                                value={city}
                                onChange={(e) => setCity(e.target.value)}
                                className="form-control"
                            />
                        </div>
                        {isEdit ? (
                            <button className="btn btn-warning" onClick={handleEdit}>
                                Edit
                            </button>
                        ) : (
                            <button className="btn btn-primary" onClick={handleSubmit}>
                                Add
                            </button>
                        )}
                    </form>
                </div>
            </div>
        </div>
    );
}

export default Form;