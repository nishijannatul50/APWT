import React from 'react';

const Footer = () => {
    return (
        <div className="text-center">
              
                <p style={{ fontSize: "16px", fontWeight:"bold" }}>Copyright © {(new Date()).getFullYear()} || All Rights Reserved by <span style={{ color: "blue", fontWeight: "bold" }}>Nura Jannat Rakhi</span></p>
            </div>
    );
};

export default Footer;