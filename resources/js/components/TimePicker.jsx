import * as React from 'react';
import dayjs from 'dayjs';
import TextField from '@mui/material/TextField';
import { AdapterDayjs } from '@mui/x-date-pickers/AdapterDayjs';
import { LocalizationProvider } from '@mui/x-date-pickers/LocalizationProvider';
import { DateTimePicker } from '@mui/x-date-pickers/DateTimePicker';

 function BasicDateTimePicker({handleDate}) {
  const [value, setValue] = React.useState(dayjs());

  return (
    <LocalizationProvider dateAdapter={AdapterDayjs}>
      <DateTimePicker
        renderInput={(props) => <TextField {...props} />}
        label="DateTimePicker"
        value={value}
        onChange={(newValue) => {
          setValue(newValue);
          handleDate(newValue.format('YYYY-MM-DD HH:mm:ss'));
        }}
      
        minDate={dayjs(dayjs())}
        minTime={dayjs('2022-02-14T12:00')}
        maxTime={dayjs('2022-02-14T21:00')}

      />
    </LocalizationProvider>
  );
}


export default BasicDateTimePicker


