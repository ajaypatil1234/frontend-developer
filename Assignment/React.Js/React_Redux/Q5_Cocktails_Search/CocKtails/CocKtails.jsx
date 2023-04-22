import React, { useContext, useState } from 'react'
import { CocktailWrapper } from './App'

function CocKtails() {

    const { Loading, CocKtailList } = useContext(CocktailWrapper)

    console.log(CocKtailList);

    if (Loading) {
        return <h1 className='container'> Loading...............</h1>
    }

    return (

        <div className="container">
            <h4>Cocktails</h4>
            <div className="row">
                {CocKtailList.map((item) => {
                    console.log("item", item);

                    const { strDrink, strDrinkThumb } = item;

                    return (
                        <div className="col-md-4 mb-5 col-6">
                            <div className="card shadow">
                                <img src={strDrinkThumb} />
                                <div className="card-body">
                                    <h5>{strDrink}</h5>
                                </div>
                            </div>
                        </div>
                    );
                })}
            </div>
        </div>
    );
}
export default CocKtails