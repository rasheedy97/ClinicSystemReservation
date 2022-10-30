import React from "react";
import ReactDOM from "react-dom";
import AdminTable from "./components/AdminTable";
import PatientTable from "./components/PatientTable";
function App(props) {
    if (props.is_admins) {
        return <AdminTable user_id={props.user_id} />;
    }
    return <PatientTable user_id={props.user_id} />;
}

if (document.getElementById("index")) {
    const element = document.getElementById("index");
    const is_admin = element.attributes.getNamedItem("is_admin").value;
    const user_id = element.attributes.getNamedItem("user_id").value;
    ReactDOM.render(
        <React.StrictMode>
            <App is_admin={is_admin} user_id={user_id} />
        </React.StrictMode>,
        element
    );
}
