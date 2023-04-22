import React, { createContext, useState } from "react";
import Form from "./Form";
import Table from "./Table";

function getLocalStorageData() {
    const userInfo = localStorage.getItem('userInfo')

    if (userInfo) {
        return JSON.parse(localStorage.getItem('userInfo'))
    }

    return []

}

export const WrapperContext = createContext();

function App() {
    const [tableData, setTableData] = useState(getLocalStorageData);
    const [firstName, setFirstName] = useState("");
    const [lastName, setLastName] = useState("");
    const [city, setCity] = useState("");
    const [isEdit, setIsEdit] = useState(false)
    const [itemId, setItemId] = useState(null)

    function handleSubmit(e) {
        e.preventDefault();
        let formValue = {
            id: new Date().getTime().toString(),
            firstName,
            lastName,
            city,
        };
        setTableData([...tableData, formValue]);

        localStorage.setItem("userInfo", JSON.stringify([...tableData, formValue]));

        setFirstName("");
        setLastName("");
        setCity("");
    }

    function handleDelete(itemId) {
        const filterTableData = tableData.filter((item) => item.id !== itemId)
        localStorage.setItem('userInfo', JSON.stringify(filterTableData));
        setTableData(filterTableData)
    }

    function getEditValue(data) {
        const { id, firstName, lastName, city } = data
        setFirstName(firstName)
        setLastName(lastName)
        setCity(city)
        setIsEdit(true)
        setItemId(id)
    }

    function handleEdit(e) {
        e.preventDefault()
        let editTableData = tableData.map((item) => {
            if (item.id === itemId) {
                return { id: item.id, firstName, lastName, city }
            } else {
                return item
            }
        })
        localStorage.setItem('userInfo', JSON.stringify(editTableData))
        setTableData(editTableData)


        setFirstName("")
        setLastName("")
        setCity("")
        setItemId(null)
        setIsEdit(false)
    }

    return (
        <WrapperContext.Provider value={{ setTableData, tableData, handleDelete, firstName, setFirstName, lastName, setLastName, city, setCity, getEditValue, isEdit, handleEdit, handleSubmit }}>
            <div className="container-fluid">
                <Form />
                <Table />
            </div>
        </WrapperContext.Provider>
    );
}

export default App;