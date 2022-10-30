import React from "react";

function PatientTable(props) {
    const [error, setError] = React.useState(null);
    const [isLoaded, setIsLoaded] = React.useState(false);
    const [items, setItems] = React.useState([]);

    const options = {
        headers: { "Access-Control-Allow-Origin": "*" },
    };
    React.useEffect(() => {
        fetch(
            `http://localhost:8000/api/v1/users/${props.user_id}/appointments`,
            options
        )
            .then((res) => res.json())
            .then(
                (result) => {
                    setIsLoaded(true);
                    setItems(result);
                },
                // Note: it's important to handle errors here
                // instead of a catch() block so that we don't swallow
                // exceptions from actual bugs in components.
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
            <ul>
                {items.map((item) => (
                    <li key={item.id}>
                        {item.user_id} {item.speciality_id}
                    </li>
                ))}
            </ul>
        );
    }
}

export default PatientTable;
