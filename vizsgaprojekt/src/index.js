import "./styles.css";
import "bulma/css/bulma.css";
import "bulma-calendar/dist/css/bulma-calendar.min.css";
import bulmaCalendar from "bulma-calendar/dist/js/bulma-calendar.min.js";

document.getElementById("app").innerHTML = `
    <span><input style='border: 1px solid red' type="date"></spa>
`;
const options = {
  type: "date",
  dateFormat: "MMMM d, yyyy",
  showHeader: false,
  color: "success"
};
// Initialize all input of date type.
const calendars = bulmaCalendar.attach('[type="date"]', options);

// Loop on each calendar initilizaed
calendars.forEach(calendar => {
  // Add listener to date:selected event
  calendar.on("date:selected", date => {
    console.log(date);
  });
});

// To access to bulmaCalendar instance of an element
const element = document.querySelector("#my-element");
if (element) {
  // bulmaCalendar instance is available as element.bulmaCalendar
  element.bulmaCalendar.on("select", datepicker => {
    console.log(datepicker.data.value());
  });
}



