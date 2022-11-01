import React from "react";
import "./styles.css";
import BasicDateTimePicker from "./TimePicker";
import dayjs from "dayjs";

function BookingBtn({ user_id }) {
    const [error, setError] = React.useState(null);
    const [isLoaded, setIsLoaded] = React.useState(false);
    const [items, setItems] = React.useState([]);
    const [dateAndTime, setDateAndTime] = React.useState({});

    function handleDate(dateValue) {
        setDateAndTime(dateValue);
    }

    function handleClick(e) {
        const specialityId = e.currentTarget.id;
        const specialityName = e.currentTarget.value;
        console.log(specialityId, user_id);
        console.log(dateAndTime);

        fetch("/api/v1/appointments/", {
            method: "POST",
            headers: { "Content-Type": "application/json" },
            body: JSON.stringify({
                start_time: dateAndTime,
                user_id: user_id,
                specialty_id: specialityId,
            }),
        })
            .then((response) => response.text())
            .then(
                (result) => {
                    console.log(result);
                    alert(result);
                },
                (error) => {
                    console.log("error", error);
                }
            );
    }

    function handleBook() {
        fetch(`/api/v1/specialties`)
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
    }

    if (error) {
        return <div>Error: {error.message}</div>;
    }
    const specialtiesElements = items.map((item) => {
        return (
            <div>
                <button
                    onClick={handleClick}
                    className="specialtyBtn"
                    value={item.name}
                    id={item.id}
                    key={item.id}
                >
                    {item.name}
                </button>
            </div>
        );
    });

    if (items.length > 0) {
        return (
            <div className="bokingContainer">
                <div className="btnsContainer">{specialtiesElements}</div>
                <BasicDateTimePicker handleDate={handleDate} />
            </div>
        );
    } else {
        return (
            <button onClick={handleBook} className="btnBook" type="submit">
                Book a clinic now!
            </button>
        );
    }
}

export default BookingBtn;
