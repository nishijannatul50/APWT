import React from 'react';
import { Link } from 'react-router-dom';

const NavBar = () => {
    return (
        <div style={{ marginBottom: "56px" }}>
            <nav className="navbar navbar-expand-lg navbar-light fixed-top" style={{ background: "darkgreen", height: "70px" }}>
                <div className="container-fluid container">
                    <h3 className="text-black">Student Management</h3>
                    <div className="navbar-nav font-weight-bold ms-auto ">
                        <Link className="nav-link px-3 text-black fw-bold" to="/">Home</Link>
                        <Link className="nav-link px-3 text-black fw-bold" to="/contact">Contacts</Link>
                        <Link className="nav-link px-3 text-black fw-bold" to="/studentList">Student List</Link>
                    </div>
                </div>
            </nav>
        </div>
    );
};
export default NavBar;