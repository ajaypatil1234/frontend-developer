import React, { createContext, useContext, useEffect, useState } from 'react'
import CocKtails from './CocKtails'
import Header from "./Header"

export const CocktailWrapper = createContext()

function App() {

    const [CocKtailList, setCocktailList] = useState([])
    const [Loading, setLoading] = useState(true)
    const [drinkName, setDrinkName] = useState(``)


    useEffect(() => {
        fetch(`https://www.thecocktaildb.com/api/json/v1/1/search.php?s=${drinkName}`)
            .then((resp) => resp.json())
            .then((data) => {
                setCocktailList(data.drinks)
                setLoading(false)
            })
            .catch((e) => console.log("e", e));
    }, [drinkName]);
    return (
        <>
            <CocktailWrapper.Provider value={{ CocKtailList, Loading, drinkName, setDrinkName }}>

                <Header />
                <CocKtails />

            </CocktailWrapper.Provider>
        </>
    )
}

export default App   