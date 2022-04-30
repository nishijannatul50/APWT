import React from 'react';
import NavBar from './NavBar';

const Contact = () => {
    return (
        <div>
        <NavBar />
        <div className="d-flex justify-content-center align-items-center" style={{ height: "90vh",background:"#574d50"}}>
               <div>
                   <h1>Contact Route</h1>
               </div>
           </div>
        </div>
    );
};

export default Contact;