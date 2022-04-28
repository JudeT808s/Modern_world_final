/**
 * Get Input Fields
 */
let submitBtn = document.getElementById('submit_btn');
let headingInput = document.getElementById('heading');
let titleInput = document.getElementById('title');
let subtitleInput = document.getElementById('subtitle');
let articleInput = document.getElementById('article');
let dateInput = document.getElementById('date');
let timeInput = document.getElementById('time');
let writerInput = document.getElementById('writer');
let genreInput = document.getElementById('genre');


/**
 * Get Error Divs by id
 */
let headingError = document.getElementById('heading_error');
let titleError = document.getElementById('title_error');
let subtitleError = document.getElementById('subtitle_error');
let articleError = document.getElementById('article_error');
let dateError = document.getElementById('date_error');
let timeError = document.getElementById('time_error');
// let writerError = document.getElementById('writer');
// let genreError = document.getElementById('genre');


/**
 * REGEX PATTERNS
 */
const TEXT_REGEX = /^[0-9a-zA-Z-' ]*$/;
const DATE_REGEX = /^(0?[1-9]|[12][0-9]|3[01])[\/\-](0?[1-9]|1[012])[\/\-]\d{4}$/;
const TIME_REGEX = /^([01]?[0-9]|2[0-3]):[0-5][0-9]$/;





submitBtn.addEventListener('click', onSubmitForm);

let errorExists = false;

function showError(errorField, errorMessage) {

    errorExists = true;
    errorField.innerHTML = errorMessage;
}

function regexValid(regex, str) {
    return regex.test(str);
}

function isSelected(inputField) {
    let selected = false;
    for (let i = 0; i != inputField.length; i++) {
        if (!inputField[i].checked) {
            selected = true;
            break;
        }
    }
    return selected;
}

function resetValues() {
    errorExists = false;
    headingError.innerHTML = "";
    titleError.innerHTML = "";
    subtitleError.innerHTML = "";
    articleError.innerHTML = "";
    dateError.innerHTML = "";
    timeError.innerHTML = "";
    // writerError.innerHTML = "";
    // genreError.innerHTML = "";
}

function onSubmitForm(evt) {
    evt.preventDefault();
    resetValues();


    // Validate Name
    if (headingInput.value === "") {
        showError(headingError, "The heading field is required js");
    } else if (!regexValid(TEXT_REGEX, firstNameInput.value)) {
        showError(headingError, "Only letters and spaces are allowed js");
    }
    if (titleInput.value === "") {
        showError(titleError, "The title field is required js");
    } else if (!regexValid(TEXT_REGEX, titleInput.value)) {
        showError(titleError, "Only letters and spaces are allowed js");
    }
    if (subtitleInput.value === "") {
        showError(subtitleError, "The subtitle field is required js");
    } else if (!regexValid(TEXT_REGEX, subtitleInput.value)) {
        showError(subtitleError, "Only letters and spaces are allowed js");
    }
    if (articleInput.value === "") {
        showError(articleError, "The article field is required js");
    } else if (!regexValid(TEXT_REGEX, articleInput.value)) {
        showError(articleError, "Only letters and spaces are allowed js");
    }
    if (dateInput.value === "") {
        showError(dateError, "The date field is required js");
    } else if (!regexValid(DATE_REGEX, dateInput.value)) {
        showError(dateError, "Only letters and spaces are allowed js");
    }
    if (timeInput.value === "") {
        showError(timeError, "The time field is required js");
    } else if (!regexValid(TIME_REGEX, timeInput.value)) {
        showError(timeError, "Only letters and spaces are allowed js");
    }
    // if (writerInput.value === "") {
    //     showError(writerError, "The writer field is required js");
    // }
    // if (genreInput.value === "") {
    //     showError(genreError, "The genre field is required js");
    // }


    if (errorExists) {
        evt.preventDefault();
    }
}