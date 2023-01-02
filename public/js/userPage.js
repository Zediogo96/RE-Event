let form_del_acc = document.getElementById("del_acc_modal").querySelector("form");

form_del_acc.addEventListener("submit", (event) => {
    event.preventDefault();
    fetch("deleteUser", {
        headers: {
            "Content-Type": "application/json",
            "Accept": "application/json",
            "X-Requested-With": "XMLHttpRequest",
            "X-CSRF-Token": document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
        method: "post",
        credentials: "same-origin",
        body: JSON.stringify({
            userid: document.querySelector('meta[name="auth-check-id"]').getAttribute('content')
        })
    }).then((response) => {
        if (response.status === 200) {
            window.location.href = "/home";
        }
        else if (response.status === 418) {
            Swal.fire({
                title: 'Error!',
                text: 'You are still hosting events. Please delete or transfer their ownership first.',
                icon: 'error',
                confirmButtonText: 'Continue'
              })
        }
    });
});


var trs = document.getElementById('eventsCreatedByMe').getElementsByTagName('tr');

for (var i = 0; i < trs.length; i++) {
    trs[i].addEventListener('click', function (e) {
        let t = e.target.parentNode;
        let id = t.getAttribute('id');
        window.location.href = '/event' + id;
    })

};


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

            document.getElementById("notification_text").innerHTML = "";

            sendAjaxRequest("put", "/api/clearNotifications", null, readHandler);



            break;
        }

        case 4: {
            document.getElementById('usersSearchOption').classList.add('optionSelected');
            document.getElementById('userSearch').classList.remove('submenuSleep');
            document.getElementById('userSearch').classList.add('submenuActive');

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

function handleNameChange(id) {
    const modal = document.getElementById('editModal' + id);
    modal.querySelector('#name').addEventListener("keyup", (event) => {
        modal.querySelector('#preview-name').innerHTML = event.target.value;
    });
}

function handleCapacityChange(id) {
    const modal = document.getElementById('editModal' + id);
    modal.querySelector('#capacity').addEventListener("keyup", (event) => {
        modal.querySelector('#preview-capacity').innerHTML = event.target.value + ' people';
    });
}

function handleLocationChange(id) {
    const modal = document.getElementById('editModal' + id);

    modal.querySelector('#city').addEventListener("keyup", (event) => {
        modal.querySelector('#preview-location').innerHTML = modal.querySelector('#country').value + ', ' + event.target.value;
    });

    modal.querySelector('#country').addEventListener("keyup", (event) => {
        modal.querySelector('#preview-location').innerHTML = event.target.value + ', ' + modal.querySelector('#city').value;
    });
}

function handleAddressChange(id) {
    const modal = document.getElementById('editModal' + id);
    modal.querySelector('#address').addEventListener("keyup", (event) => {
        modal.querySelector('#preview-address').innerHTML = event.target.value;
    });
}

/* CREATE MODAL HANDLING */
const c_modal = document.getElementById('createEventModal');

c_modal.querySelector('#name').addEventListener("keyup", (event) => {
    c_modal.querySelector('#preview-name').innerHTML = event.target.value;
});

c_modal.querySelector('#capacity').addEventListener("keyup", (event) => {
    c_modal.querySelector('#preview-capacity').innerHTML = event.target.value + ' people';
});

c_modal.querySelector('#city').addEventListener("keyup", (event) => {
    c_modal.querySelector('#preview-location').innerHTML = c_modal.querySelector('#country').value + ', ' + event.target.value;
});

c_modal.querySelector('#country').addEventListener("keyup", (event) => {
    c_modal.querySelector('#preview-location').innerHTML = event.target.value + ', ' + c_modal.querySelector('#city').value;
});

c_modal.querySelector('#address').addEventListener("keyup", (event) => {
    c_modal.querySelector('#preview-address').innerHTML = event.target.value;
});

function preview_image() {
    c_modal.querySelector("#preview-image").src = URL.createObjectURL(event.target.files[0]);
}

function readHandler() {
    console.log("result: ", this, this.responseText);
}

document.getElementById("search-attendees-teste").addEventListener("keyup", function (e) {
    fetch("searchUsersAdmin" + "?" + new URLSearchParams({
        search: e.target.value
    }), {
        headers: {
            "Content-Type": "application/json",
            "Accept": "application/json",
            "X-Requested-With": "XMLHttpRequest",
            "X-CSRF-Token": '{{csrf_token()}}'
        },
        method: "get",
        credentials: "same-origin",
    }).then(function (data) {
        return data.json();
    }).then(function (data) {
        let container = document.getElementById("search-attendees-response");
        container.innerHTML = "";
        data.forEach(function (user) {
            let row = document.createElement("tr");
            let name = document.createElement("td");
            let email = document.createElement("td");
            let link = document.createElement("a");
            link.href = "/user/" + user.id;
            link.classList.add("link-dark");
            link.innerHTML = user.name;
            name.appendChild(link);
            email.innerHTML = user.email;
            row.appendChild(name);
            row.appendChild(email);
            container.appendChild(row);
        });

    }).catch(function (error) {
        console.log(error);
    });
});




