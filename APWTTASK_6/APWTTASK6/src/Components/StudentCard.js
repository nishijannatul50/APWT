import React from 'react';
import { useHistory } from 'react-router';

const StudentCard = (props) => {
    const { id, name, department,studentId } = props.studentDetails;

    const history = useHistory();
    const handelClick = (id) => {
        const url = `/studentDetails/${id}`;
        history.push(url);
    }
    return (
        <div className="col-6 row no-gutters mb-3">
        <div className="card-group">
            <div className="card">
               
                <div class="card-body">
                    <div class="">
                        <h5 hidden class="card-title text-success">{id}</h5>
                        <h5  class="card-title text-success">{studentId}</h5>
                        <h6 class="card-title ms-auto mt-1">{name}</h6>
                    </div>
                    <span></span>
                    <div class="d-flex">
                        <p class="card-text"><small class="text-danger fw-bold">Department:
                            {department}</small></p>
                           
                    </div>
                    <button className="btn btn-sm btn-success mt-4" onClick={() => handelClick(id)}>Details</button>
                </div>
            </div>
        </div>
    </div>
    );
};

export default StudentCard;