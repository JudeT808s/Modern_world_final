/**
 * Get Input Fields
 */
let submitBtn = document.getElementById('submit_btn');
let firstNameInput = document.getElementById('first_name');
let lastNameInput = document.getElementById('last_name');
let linkInput = document.getElementById('link');


/**
 * Get Error Divs by id
 */
let firstNameError = document.getElementById('first_name_error');
let lastNameError = document.getElementById('last_name_error');
let linkError = document.getElementById('link_error');


/**
 * REGEX PATTERNS
 */
const NAME_REGEX = /^[a-zA-Z-' ]*$/;
const LINK_REGEX = / ^ ((ftp | http | https): \/\/)?(www.)?(?!.*(ftp|http|https|www.))[a-zA-Z0-9_-]+(\.[a-zA-Z]+)+((\/)[\w#]+)*(\/\w+\?[a-zA-Z0-9_]+=\w+(&[a-zA-Z0-9_]+=\w+)*)?$/gm;


submitBtn.addEventListener('click', onSubmitForm);

let errorExists = false;

function showError(errorField, errorMessage) {
    errorExists = true;
    errorField.innerHTML = errorMessage;
}

function regexValid(regex, str) {
    return regex.test(str);
}

/* function isSelected(inputField) {
    let selected = false;
    for (let i = 0; i != inputField.length; i++) {
        if (!inputField[i].checked) {
            selected = true;
            break;
        }
    }
    return selected;
} */

function resetValues() {
    errorExists = false;
    firstNameError.innerHTML = "";
    lastNameError.innerHTML = "";
    linkError.innerHTML = "";
}

function onSubmitForm(evt) {
    //evt.preventDefault();
    resetValues();


    // Validate Name
    if (firstNameInput.value === "") {
        showError(firstNameError, "The name field is required");
    } 
    else if (!regexValid(NAME_REGEX, firstNameInput.value)) {
        showError(firstNameError, "Only letters and spaces are allowed");
    }
    if (lastNameInput.value === "") {
        showError(lastNameError, "The name field is required");
    } 
    else if (!regexValid(NAME_REGEX, lastNameInput.value)) {
        showError(lastNameError, "Only letters and spaces are allowed");
    }
    if (linkInput.value === "") {
        showError(linkError, "The link field is required");
    } 
    else if (!regexValid(LINK_REGEX, linkInput.value)) {
        showError(linkError, "Invalid website link");
    }


    if (errorExists) {
        evt.preventDefault();
    }
}