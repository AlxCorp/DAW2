import React from 'react'

function Header() {
  return (
    <nav>
        <div className="nav-wrapper">
        <a href="#" className="brand-logo">Logo</a>
        <ul id="nav-mobile" className="right hide-on-med-and-down">
            <li><a href="sass.html">Listado</a></li>
            <li><a href="badges.html">Cuenta</a></li>
            <li><a href="collapsible.html">Salir</a></li>
        </ul>
        </div>
    </nav>
  )
}

export default Header