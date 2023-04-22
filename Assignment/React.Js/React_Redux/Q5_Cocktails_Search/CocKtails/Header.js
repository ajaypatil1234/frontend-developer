import { useContext } from "react";
import { CocktailWrapper } from "./App";

function header() {

  // let internalCSSObject = {
  //   backgroundColor: 'black'
  // }
  const { drinkName, setDrinkName } = useContext(CocktailWrapper)
  return (
    <>

      <nav className="navbar bg-body-tertiary">
        <div className="container-fluid">
          <a className="navbar-brand">Navbar</a>
          <form className="d-flex" role="search">
            <input value={drinkName} className="form-control me-2" type="search" placeholder="Search" aria-label="Search" onChange={(e) => setDrinkName(e.target.value)} />
            <button className="btn btn-outline-success" type="submit">Search</button>
          </form>
        </div>
      </nav>
    </>
  )
}

export default header;