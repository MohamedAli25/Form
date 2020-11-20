const first_preference = document.querySelector("#first_preference");
const first_preferences = Array.from(
    document.querySelectorAll("#first_preference option")
);
const second_preference = document.querySelector("#second_preference");
const second_preferences = Array.from(
    document.querySelectorAll("#second_preference option")
);
const workshop = document.querySelector(".workshop");
const avalable_number = document.querySelector("#available_number_id");
const avalable_numbers = Array.from(
    document.querySelectorAll("#available_number_id option")
);
let avalable_numbers_exist = Array.from(
    document.querySelectorAll("#available_number_id option")
);
let selected_first_preference = null;
let selected_second_preference = null;
document.addEventListener("DOMContentLoaded", function() {
    first_preferences.forEach(function(item) {
        if (item.selected == true) {
            selected_first_preference = item;
        }
    });
    second_preferences.forEach(function(item) {
        if (item.selected == true) {
            selected_second_preference = item;
        }
    });
    second_preferences.forEach(function(item) {
        if (item.textContent == selected_first_preference.textContent) {
            item.disabled = true;
        }
    });
    if (
        selected_first_preference.textContent ==
        selected_second_preference.textContent
    ) {
        second_preferences.forEach(function(item) {
            if (item.disabled == false) {
                item.selected = true;
            }
        });
    }
    first_preferences.forEach(function(item) {
        if (item.selected == true) {
            selected_first_preference = item;
        }
    });
    second_preferences.forEach(function(item) {
        if (item.selected == true) {
            selected_second_preference = item;
        }
    });
    if (
        selected_first_preference.textContent === "Academic" ||
        selected_second_preference.textContent === "Academic"
    ) {
        workshop.style.display = "block";
    } else {
        workshop.style.display = "none";
    }
    changeTimeSlots();
});

first_preference.addEventListener("change", function() {
    first_preferences.forEach(function(item) {
        if (item.selected == true) {
            selected_first_preference = item;
        }
    });
    second_preferences.forEach(function(item) {
        if (item.selected == true) {
            selected_second_preference = item;
        }
    });
    second_preferences.forEach(function(item) {
        if (item.textContent == selected_first_preference.textContent) {
            item.disabled = true;
        } else {
            item.disabled = false;
        }
    });
    if (
        selected_first_preference.textContent ==
        selected_second_preference.textContent
    ) {
        second_preferences.forEach(function(item) {
            if (item.disabled == false) {
                item.selected = true;
            }
        });
    }
    if (
        selected_first_preference.textContent === "Academic" ||
        selected_second_preference.textContent === "Academic"
    ) {
        workshop.style.display = "block";
    } else {
        workshop.style.display = "none";
    }
    changeTimeSlots();
});

second_preference.addEventListener("change", function() {
    first_preferences.forEach(function(item) {
        if (item.selected == true) {
            selected_first_preference = item;
        }
    });
    second_preferences.forEach(function(item) {
        if (item.selected == true) {
            selected_second_preference = item;
        }
    });
    if (
        selected_first_preference.textContent === "Academic" ||
        selected_second_preference.textContent === "Academic"
    ) {
        workshop.style.display = "block";
    } else {
        workshop.style.display = "none";
    }
});

function changeTimeSlots() {
    const selected_committee_id = selected_first_preference.value;
    avalable_numbers.forEach(function(item, index) {
        item.remove();
    });
    avalable_numbers.forEach(function(item, index) {
        if (selected_committee_id == item.dataset.committeeId) {
            avalable_number.appendChild(item);
        }
    });
}
