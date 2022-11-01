import React from "react";
import TableViewer from "./TableViewer";
import "bootstrap/dist/css/bootstrap.min.css";
import BookingBtn from "./BookingBtn";

import { Container } from "reactstrap";

function PatientTable({ user_id }) {
    const [error, setError] = React.useState(null);
    const [isLoaded, setIsLoaded] = React.useState(false);
    const [items, setItems] = React.useState([]);

    const columns = React.useMemo(
        () => [
            {
                Header: "Date",
                accessor: "start_time",
            },

            {
                Header: "Specialty",
                accessor: "speciality",
            },
        ],
        []
    );

    React.useEffect(() => {
        fetch(`/api/v1/appointments/patients/${user_id}`)
            .then((res) => res.json())
            .then(
                (result) => {
                    console.log(result);
                    setIsLoaded(true);
                    setItems(result);
                },
                (error) => {
                    setIsLoaded(true);
                    setError(error);
                }
            );
    }, []);
    if (error) {
        return <div>Error: {error.message}</div>;
    } else if (!isLoaded) {
        return <div>Loading...</div>;
    } else {
        return (
            <Container style={{ display: "flex", flexDirection: "column" }}>
                <TableViewer columns={columns} data={items} />
                <BookingBtn user_id={user_id} />
            </Container>
        );
    }
}

export default PatientTable;
