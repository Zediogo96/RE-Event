// GENERIC FUNCTION TO DISPLAY ERROR MESSAGE
function displayError(element, message) {

    element.classList.add('is-invalid');
    element.nextElementSibling.innerHTML = message;
}

// VALIDATION FOR USER CREATE FORM

let form = document.getElementById('_formCreateUser');

form.addEventListener('submit', function (e) {
    e.preventDefault();
    let name = form.querySelector('#name');
    let email = form.querySelector('#email');
    let birthdate = form.querySelector('#birthdate');
    let password = form.querySelector('#password');
    console.log(password, password.value)

    /*
    MUST BE CALLED LIKE THIS OTHERWISE THEY ARE ONLY CALLED IN A SEQUENCIAL FASHION:
    MEANING THAT IF NAME AND PASSWORD ARE NOT VALID, ONLY NAME WILL BE DISPLAYED AS INVALID!
    */

    let validName = validateName(name);
    let validEmail = validateEmail(email);
    let validBirthdate = validateBirthdate(birthdate);
    let validPassword = validatePassword(password);

    if (validName && validEmail && validBirthdate && validPassword) {
        form.submit();
    }

});

function validateName(name) {
    if (name.value.length < 8 || name.value.length > 15) {
        displayError(name, 'Name must be at least 8 characters long and no more than 15 characters');
        return false;
    } /* check if name has atleast one uppercase */
    else if (!/[A-Z]/.test(name.value)) {
        displayError(name, 'Name must contain at least one uppercase letter');
        return false;
    } else if (!/[a-z]/.test(name.value)) {
        displayError(name, 'Name must contain at least one lowercase letter');
        return false;
    } else {
        name.classList.remove('is-invalid');
        name.classList.add('is-valid');
        return true;
    }
}

function validateEmail(email) {
    if (email.value === '') {
        displayError(email, 'Email is required');
        return false;
    } else if (!/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/.test(email.value)) {
        displayError(email, 'Please enter a valid email address');
        return false;
    } else {
        email.classList.remove('is-invalid');
        email.classList.add('is-valid');
        return true;
    }
}

function validateBirthdate(birthdate) {
    if (birthdate.value === '') {
        displayError(birthdate, 'Birthdate is required');
        return false;
    } /* check if birthdate value is not greater than current date */
    else if (new Date(birthdate.value) > new Date()) {
        displayError(birthdate, 'Are you from the future? ;)');
        return false;
    } else {
        birthdate.classList.remove('is-invalid');
        birthdate.classList.add('is-valid');
        return true;
    }
}

function validatePassword(password) {
    if (password.value === '') {
        displayError(password, 'Password is required');
        return false;
    } else if (password.value.length < 8) {
        displayError(password, 'Password must be at least 8 characters long');
        return false;
    } else if (!/[A-Z]/.test(password.value)) {
        displayError(password, 'Password must contain at least one uppercase letter');
        return false;
    } else if (!/[a-z]/.test(password.value)) {
        displayError(password, 'Password must contain at least one lowercase letter');
        return false;
    } else if (!/[0-9]/.test(password.value)) {
        displayError(password, 'Password must contain at least one number');
        return false;
    } else if (!/[!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?]/.test(password.value)) {
        displayError(password, 'Password must contain at least one special character');
        return false;
    } else {
        password.classList.remove('is-invalid');
        password.classList.add('is-valid');
        return true;
    }

}

// VALIDATION FOR EVENT CREATE FORM

let createEventModal = document.getElementById('createEventModal');
let formEvent = createEventModal.querySelector('form');


formEvent.addEventListener('submit', function (e) {
    e.preventDefault();

    let e_name = formEvent.querySelector('#name');
    let e_desc = formEvent.querySelector('#description');
    let e_date = formEvent.querySelector('#date');
    let e_capacity = formEvent.querySelector('#capacity');
    let e_city = formEvent.querySelector('#city');
    let e_country = formEvent.querySelector('#country');
    let e_price = formEvent.querySelector('#price');
    let e_address = formEvent.querySelector('#address');
    let e_tag = formEvent.querySelector('#tag');
    let e_image = formEvent.querySelector('#img');

    let val_e_name = validateEventName(e_name);
    let val_e_desc = validateEventDesc(e_desc);
    let val_e_date = validateEventDate(e_date);
    let val_e_capacity = validateEventCapacity(e_capacity);
    let val_e_city = validateEventCity(e_city);
    let val_e_country = validateEventCountry(e_country);
    let val_e_price = validateEventPrice(e_price);
    let val_e_address = validateEventAddress(e_address);
    let val_e_tag = validateEventTag(e_tag);
    let val_e_image = validateEventPhoto(e_image);

    if (val_e_name && val_e_desc && val_e_date && val_e_capacity && val_e_city && val_e_country && val_e_price && val_e_address && val_e_tag && val_e_image) {
        formEvent.submit();
    }
});

function validateEventName(name) {
    if (name.value.length == 0) {
        displayError(name, 'Field name cannot be empty');
        return false;
    }
    else if (name.value.length < 8 || name.value.length > 25) {
        displayError(name, 'Name must be at least 8 characters long and no more than 25 characters');
        return false;
    } /* check if the first character of name is uppercase */
    else if (!/^[A-Z]/.test(name.value)) {
        displayError(name, 'Name must start with an uppercase letter');
        return false;
    } else {
        name.classList.remove('is-invalid');
        name.classList.add('is-valid');
        return true;
    }
}

function validateEventDesc(desc) {
    if (desc.value.length == 0) {
        displayError(desc, 'Field name cannot be empty');
        return false;
    }
    else if (desc.value.length < 15 || desc.value.length > 100) {
        displayError(desc, 'Name must be at least 15 characters long and no more than 100 characters');
        return false;
    }
    else {
        desc.classList.remove('is-invalid');
        desc.classList.add('is-valid');
        return true;
    }
}

function validateEventDate(date) {
    if (date.value === '') {
        displayError(date, 'Date is required');
        return false;
    }
    else if (new Date(date.value) < new Date()) {
        displayError(date, 'Do you wanna travel back in time? ;)');
        return false;
    } else {
        date.classList.remove('is-invalid');
        date.classList.add('is-valid');
        return true;
    }
}

function validateEventCapacity(capacity) {
    if (capacity.value === '') {
        displayError(capacity, 'Capacity is required');
        return false;
    } else if (capacity.value < 5 || capacity.value > 100000) {
        displayError(capacity, 'Capacity must be greater than 5 and less than 100000');
        return false;
    } else {
        capacity.classList.remove('is-invalid');
        capacity.classList.add('is-valid');
        return true;
    }
}


function validateEventCity(city) {
    if (city.value === '') {
        displayError(city, 'City is required');
        return false;
    } /* REGEX FOR CITY NAME */
    else if (!/^[a-zA-Z]+(?:[\s-][a-zA-Z]+)*$/.test(city.value)) {
        displayError(city, 'Please enter a valid city name');
        return false;
    } else {
        city.classList.remove('is-invalid');
        city.classList.add('is-valid');
        return true;
    }
}

function validateEventCountry(country) {
    if (country.value === '') {
        displayError(country, 'Country is required');
        return false;
    } else if (!/^[a-zA-Z]+(?:[\s-][a-zA-Z]+)*$/.test(country.value)) {
        displayError(country, 'Please enter a valid country name');
        return false;
    } else {
        country.classList.remove('is-invalid');
        country.classList.add('is-valid');
        return true;
    }
}

function validateEventPrice(price) {
    if (price.value === '') {
        displayError(price, 'Price is required');
        return false;
    } else if (price.value < 0 || price.value > 100000) {
        displayError(price, 'Price must be greater than 0 and less than 100000');
        return false;
    } else {
        price.classList.remove('is-invalid');
        price.classList.add('is-valid');
        return true;
    }
}

function validateEventAddress(address) {
    if (address.value === '') {
        displayError(address, 'Address is required');
        return false;
    }
    else if (!/^[a-zA-Z0-9\s,'-]*$/.test(address.value)) {
        displayError(address, 'Please enter a valid address');
        return false;
    }
    else {
        address.classList.remove('is-invalid');
        address.classList.add('is-valid');
        return true;
    }
}

function validateEventTag(tag) {
    if (tag.value === '') {
        displayError(tag, 'Tag is required');
        return false;
    }
    else if (!/^(sports|music|family|tech)$/.test(tag.value)) {
        displayError(tag, 'Please choose a valid tag');
        return false;
    }
    else {
        tag.classList.remove('is-invalid');
        tag.classList.add('is-valid');
        return true;
    }
}

function validateEventPhoto(photoFile) {
    if (photoFile.value === '') {
        displayError(photoFile, 'Photo is required');
        return false;
    } /* validate if photo format is good */
    else if (!/(\.jpg|\.jpeg|\.png|\.gif)$/i.test(photoFile.value)) {
        displayError(photoFile, 'Please choose a valid photo format');
        return false;
    }
    else {
        photoFile.classList.remove('is-invalid');
        photoFile.classList.add('is-valid');
        return true;
    }
}






