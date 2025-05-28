let date = new Date();
let year = date.getFullYear();
let month = date.getMonth();

const day = document.querySelector(".calendar-dates");

const currdate = document
    .querySelector(".calendar-current-date");

const prenexIcons = document
    .querySelectorAll(".calendar-navigation span");


const months = [
    "Styczeń",
    "Luty",
    "Marzec",
    "Kwiecień",
    "Maj",
    "Czerwiec",
    "Lipiec",
    "Sierpień",
    "Wrzesień",
    "Październik",
    "Listopad",
    "Grudzień"
];

const manipulate = () => {


    let dayone = new Date(year, month, 1).getDay();


    let lastdate = new Date(year, month + 1, 0).getDate();

    let dayend = new Date(year, month, lastdate).getDay();

    let monthlastdate = new Date(year, month, 0).getDate();

    let lit = "";


    for (let i = dayone; i > 0; i--) {
        lit +=
            `<li class="inactive">${monthlastdate - i + 1}</li>`;
    }


    for (let i = 1; i <= lastdate; i++) {

        // Check if the current date is today
        let isToday = i === date.getDate()
            && month === new Date().getMonth()
            && year === new Date().getFullYear()
            ? "active"
            : "";
        lit += `<li class="${isToday}">${i}</li>`;
    }


    for (let i = dayend; i < 6; i++) {
        lit += `<li class="inactive">${i - dayend + 1}</li>`
    }


    currdate.innerText = `${months[month]} ${year}`;

    day.innerHTML = lit;
}

manipulate();

prenexIcons.forEach(icon => {
    icon.addEventListener("click", () => {
        if (icon.id === "calendar-prev") {
            month = month - 1;
            if (month < 0) {
                month = 11;
                year = year - 1;
            }
        } else if (icon.id === "calendar-next") {
            month = month + 1;
            if (month > 11) {
                month = 0;
                year = year + 1;
            }
        }
        manipulate();
    });
});