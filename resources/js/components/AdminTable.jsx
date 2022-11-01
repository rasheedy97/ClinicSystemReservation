import React from "react";
import TableViewer from "./TableViewer";
import "bootstrap/dist/css/bootstrap.min.css";
import { Container } from "reactstrap";

function AdminTable() {
    const [error, setError] = React.useState(null);
    const [isLoaded, setIsLoaded] = React.useState(false);
    const [items, setItems] = React.useState([]);
    let today = new Date().toISOString().slice(0, 10);

    const columns = React.useMemo(
        () => [
            {
                Header: "Date and Time",
                accessor: "start_time",
            },
            {
                Header: "Patient's name",
                accessor: "user",
            },
            {
                Header: "Clinic",
                accessor: "speciality",
            },
        ],
        []
    );

    React.useEffect(() => {
        fetch(`/api/v1/appointments/show`)
            .then((res) => res.json())
            .then(
                (result) => {
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
            <Container style={{ marginTop: 25 }}>
                <TableViewer columns={columns} data={items} />
            </Container>
        );
    }
}

export default AdminTable;
