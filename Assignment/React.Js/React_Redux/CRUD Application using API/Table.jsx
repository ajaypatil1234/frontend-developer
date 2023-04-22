import React, { useContext } from "react";
import { WrapperContext } from "./App";

function Table() {
    const { tableData, handleDelete, getEditValue } = useContext(WrapperContext);

    return (
        <div className="container">
            <div className="row">
                <table className="table table-primary">
                    <thead>
                        <tr>
                            <th>Sr no</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>City</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        {tableData.map((item, index) => {
                            const { id, firstName, lastName, city } = item;
                            return (
                                <tr key={id}>
                                    <td>{index + 1}</td>
                                    <td>{firstName}</td>
                                    <td>{lastName}</td>
                                    <td>{city}</td>
                                    <td>
                                        <button
                                            className="btn btn-danger"
                                            onClick={() => handleDelete(id)}
                                        >
                                            Delete
                                        </button>
                                        <button
                                            className="btn btn-warning ms-3"
                                            onClick={() => getEditValue(item)}
                                        >
                                            Edit
                                        </button>
                                    </td>
                                </tr>
                            );
                        })}
                    </tbody>
                </table>
            </div>
        </div>
    );
}

export default Table;