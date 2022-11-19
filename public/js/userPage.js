const selectOption = function (option) {

    Array.from(document.getElementsByClassName('option')).forEach((element) => {
        element.classList.remove('optionSelected');
    });

    Array.from(document.getElementsByClassName('optionDetails')).forEach((element) => {
        element.classList.add('optionDetailsHidden');
    });

    Array.from(document.getElementsByClassName('submenuActive')).forEach((element) => {
        element.classList.remove('submenuActive');
        element.classList.add('submenuSleep');
    });

    Array.from(document.getElementsByClassName('subOption')).forEach((element) => {
        element.classList.remove('optionSelected');
    });


    switch (option) {
        case 1: {

            document.getElementById('myProfileOption').classList.add('optionSelected');
            document.getElementById('myProfileDetails').classList.remove('optionDetailsHidden');

            break;
        }
        case 2: {

            document.getElementById('myEventsOption').classList.add('optionSelected');
            document.getElementById('myEventsDetails').classList.remove('optionDetailsHidden');

            /*ativar o submenu*/
            document.getElementById('myEventsSubmenu').classList.add('submenuActive');
            document.getElementById('myEventsSubmenu').classList.remove('submenuSleep');

            /*predefenir o pastEvents*/
            document.getElementById('pastEvents').classList.add('submenuActive');
            document.getElementById('pastEvents').classList.remove('submenuSleep');

            document.getElementById('pastEventsOption').classList.add('optionSelected');

            break;
        }
        case 3: {
            document.getElementById('myInvitesOption').classList.add('optionSelected');
            document.getElementById('myInvitesDetails').classList.remove('optionDetailsHidden');

            /*ativar o submenu*/
            document.getElementById('myInvitesSubmenu').classList.add('submenuActive');
            document.getElementById('myInvitesSubmenu').classList.remove('submenuSleep');

            /*predefenir o received Invites*/
            document.getElementById('receivedInvites').classList.add('submenuActive');
            document.getElementById('receivedInvites').classList.remove('submenuSleep');

            document.getElementById('receivedInvitesOption').classList.add('optionSelected');

            break;
        }
    }
}

const showDetails = function (option) {

    Array.from(document.getElementsByClassName('details')).forEach((element) => {
        element.classList.remove('optionSelected');
        element.classList.add('submenuSleep');
        element.classList.remove('submenuActive');

    });

    Array.from(document.getElementsByClassName('subOption')).forEach((element) => {
        element.classList.remove('optionSelected');
    });

    switch (option) {
        case 1: {
            document.getElementById('pastEvents').classList.add('submenuActive');
            document.getElementById('pastEvents').classList.remove('submenuSleep');
            document.getElementById('pastEventsOption').classList.add('optionSelected');
            break;
        }
        case 2: {

            document.getElementById('futureEvents').classList.add('submenuActive');
            document.getElementById('futureEvents').classList.remove('submenuSleep');
            document.getElementById('futureEventsOption').classList.add('optionSelected');

            break;
        }
        case 3: {

            document.getElementById('eventsCreatedByMe').classList.add('submenuActive');
            document.getElementById('eventsCreatedByMe').classList.remove('submenuSleep');
            document.getElementById('eventsCreatedByMeOption').classList.add('optionSelected');


            break;
        }
        case 4: {

            document.getElementById('receivedInvites').classList.add('submenuActive');
            document.getElementById('receivedInvites').classList.remove('submenuSleep');
            document.getElementById('receivedInvitesOption').classList.add('optionSelected');

            break;
        }
        case 5: {

            document.getElementById('sentInvites').classList.add('submenuActive');
            document.getElementById('sentInvites').classList.remove('submenuSleep');
            document.getElementById('sentInvitesOption').classList.add('optionSelected');

            break;
        }
    }
}

/** MODAL EVENT EDIT */

document.getElementById('editModal').querySelector('#name').addEventListener("keyup", (event) => {
    console.log(event.target.value);
    document.getElementById('preview-name').innerHTML = event.target.value;
});

document.getElementById('editModal').querySelector('#capacity').addEventListener("keyup", (event) => {

    document.getElementById('preview-capacity').innerHTML = event.target.value + ' places';
});

// document.getElementById('editModal').querySelector('#date').addEventListener("onSelect", (event) => {
//     console.log(event.target.getDate());
//     document.getElementById('preview-date').innerHTML = event.target.value;
// });

// concat data of #country and #city input on keyup event
document.getElementById('editModal').querySelector('#country').addEventListener("keyup", (event) => {
    document.getElementById('preview-location').innerHTML = event.target.value + ', ' + document.getElementById('editModal').querySelector('#city').value;
});

document.getElementById('editModal').querySelector('#city').addEventListener("keyup", (event) => {
    document.getElementById('preview-location').innerHTML = document.getElementById('editModal').querySelector('#country').value + ', ' + event.target.value;
});

document.getElementById('editModal').querySelector('#address').addEventListener("keyup", (event) => {
    document.getElementById('preview-address').innerHTML = event.target.value;
});

// eventLister for button with class btn-edit-event
Array.from(document.getElementsByClassName('btn-edit-event')).forEach((element) => {
    element.addEventListener("click", (event) => {
        // get input that is brother element to button
        var data = document.getElementById('hidden-data-' + event.target.value);
        document.getElementById('teste-form').action = "updateEvent?eventid=" + event.target.value;
        // get data from object
        document.getElementById('preview-name').innerHTML = data.getAttribute('data-name').valueOf();
        document.getElementById('preview-capacity').innerHTML = data.getAttribute('data-capacity').valueOf();
        document.getElementById('preview-date').innerHTML = data.getAttribute('data-date').valueOf();
        document.getElementById('preview-location').innerHTML = data.getAttribute('data-country').valueOf() + ', ' + data.getAttribute('data-city').valueOf();
        document.getElementById('preview-address').innerHTML = data.getAttribute('data-address').valueOf();
        document.getElementById('preview-image').src = data.getAttribute('data-image').valueOf();


        // set data to input
        document.getElementById('name').value = data.getAttribute('data-name').valueOf();
        document.getElementById('capacity').value = data.getAttribute('data-capacity').valueOf();
        document.getElementById('date').value = data.getAttribute('data-date').valueOf();
        document.getElementById('city').value = data.getAttribute('data-city').valueOf();
        document.getElementById('country').value = data.getAttribute('data-country').valueOf();
        document.getElementById('address').value = data.getAttribute('data-address').valueOf();
        document.getElementById('description').value = data.getAttribute('data-description').valueOf();
        document.getElementById('price').value = data.getAttribute('data-price').valueOf();
        console.log(data.getAttribute('data-tag').valueOf());
        document.getElementById('tag').value = data.getAttribute('data-tag').valueOf();

    });
});
