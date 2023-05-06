import React, { useContext, useEffect, useState } from 'react'
import { useLocation, useNavigate, useParams } from 'react-router-dom'
import Loader from '../Componet/Loader'
import { LoginWrapper } from '../App'


function CocktailDetail() {
    const getid = useParams()
    const { id } = getid

    const [CocktailDetail, setcockdetail] = useState([])
    const [IsLoading, setIsLoading] = useState(false)

    const navigate = useNavigate()

    const { state } = useLocation()

    const { cart, setcart, showAlert, setshowAlert } = useContext(LoginWrapper)
    console.log('cart', cart);



    function findsinglecocktail() {
        fetch(`https://www.thecocktaildb.com/api/json/v1/1/lookup.php?i=${id}`)
            .then((resp) => resp.json())
            .then((data) => {
                setcockdetail(data.drinks[0]);
                setIsLoading(false)
            });
    }

    useEffect(() => {
        // findsinglecocktail()
        setcockdetail(state)
    })

    if (IsLoading) {
        return <Loader />
    }
    const {
        strInstructions,
        strInstructionsES,
        strInstructionsDE,
        strIngredient1,
        strIngredient2,
        strIngredient3,
    } = CocktailDetail

    function removeAlert() {
        setTimeout(() => {
            setshowAlert(false)
        }, 3000);
    }

    function handlecart(para) {
        setcart([...cart, para])
        setshowAlert(true)
        removeAlert()
    }


    return (
        <div className="container py-5">
            {
                showAlert && (
                    <div className='alert alert-success' role='alert'>
                        Drinks to Added To You Carts
                    </div>
                )
            }
            <h1>Cocktail details : </h1>
            <button className='btn btn-primary' onClick={() => navigate('/cocktail-drink')}>Back</button>
            <hr />
            <div className="row">
                <div className="col-md-4">
                    <img src={CocktailDetail.strDrinkThumb} className='w-100' alt="" />
                </div>
                <div className="col-md-8">
                    <h1>{CocktailDetail.strDrink}</h1>
                    <p>{strInstructions}</p>
                    <p>{strInstructionsDE}</p>
                    <p>{strInstructionsES}</p>
                    <ul>
                        <li>{strIngredient1}</li>
                        <li>{strIngredient2}</li>
                        {strIngredient3 && <li>{strIngredient3}</li>}
                    </ul>
                    <button className='btn btn-warning' onClick={() => handlecart({
                        image: CocktailDetail.strDrinkThumb, name: CocktailDetail.strDrink
                    })}>Add to Cart</button>
                </div>
            </div>
        </div>
    )
}

export default CocktailDetail