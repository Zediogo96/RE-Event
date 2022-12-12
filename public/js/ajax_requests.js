// USED FOR THE LIVE SEARCH FUNCTIONALITY IN THE SEARCH BAR ACROSS ALL APPLICATION
document.getElementById("searchInput").addEventListener("keyup", function (e) {
    fetch("search" + "?" + new URLSearchParams({
        search: e.target.value
    }), {
        headers: {
            "Content-Type": "application/json",
            "Accept": "application/json",
            "X-Requested-With": "XMLHttpRequest",
            "X-CSRF-Token": document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
        method: "get",
        credentials: "same-origin",
    }).then(function (data) {
        return data.json();
    }).then(function (data) {
        console.log(data);
        let container = document.getElementById("table-res");
        container.innerHTML = "";
        data.forEach(function (event) {
            let row = document.createElement("tr");
            let name = document.createElement("td");
            let city = document.createElement("td");
            let link = document.createElement("a");
            link.href = "/event" + event.eventid;
            link.classList.add("link-dark");
            link.innerHTML = event.name;
            name.appendChild(link);
            city.innerHTML = event.city_name;
            row.appendChild(name);
            row.appendChild(city);
            container.appendChild(row);
        });

    }).catch(function (error) {
        console.log(error);
    });
});

// REQUEST USED FOR THE USER TO BE ABLE TO LEAVE AN EVENT BY HIMSELF IN THE EVENT PAGE
function ajax_selfRemoveUser(userid, eventid) {
    fetch("selfRemoveUser", {
        headers: {
            "Content-Type": "application/json",
            "Accept": "application/json",
            "X-Requested-With": "XMLHttpRequest",
            "X-CSRF-Token": document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
        method: "post",
        credentials: "same-origin",
        body: JSON.stringify({
            userid: userid,
            eventid: eventid
        })
    }).then(function (data) {
        document.querySelector('#event-content button').remove();

        let button = document.createElement('button');
        button.setAttribute('class', 'btn btn-info');

        let a = document.createElement('a');
        let i = document.createElement('i');
        button.appendChild(a);

        a.innerHTML = 'Please Wait...';
        i.setAttribute('class', 'fa fa-layer-group fa-fw')
        a.parentElement.insertBefore(i, a);

        button.setAttribute('disabled', true);
        showAlert("leave");
        // button.onClick = ajax_selfRemoveUser(userid, eventid);
        setTimeout(function () {
            button.removeAttribute('disabled');
            button.addEventListener('click', function () {
                ajax_selfAddUser(userid, eventid);
            });
            a.innerHTML = 'Enroll Event';
        }, 5000);



        document.querySelector('#event-content').appendChild(button);
    }).catch(function (error) {
        console.log(error);
    });
};

// REQUEST USED FOR THE USER TO BE ABLE TO ENROLL AN EVENT BY HIMSELF IN THE EVENT PAGE
function ajax_selfAddUser(userid, eventid) {
    fetch("{{route('selfAddUser')}}", {
        headers: {
            "Content-Type": "application/json",
            "Accept": "application/json",
            "X-Requested-With": "XMLHttpRequest",
            "X-CSRF-Token": document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
        method: "post",
        credentials: "same-origin",
        body: JSON.stringify({
            userid: userid,
            eventid: eventid
        })
    }).then(function (data) {
        document.querySelector('#event-content button').remove();

        let button = document.createElement('button');
        button.setAttribute('class', 'btn btn-danger');

        let a = document.createElement('a');
        let i = document.createElement('i');
        button.appendChild(a);

        a.innerHTML = 'Please Wait...';
        i.setAttribute('class', 'fa fa-layer-group fa-fw')
        a.parentElement.insertBefore(i, a);

        button.setAttribute('disabled', true);
        showAlert("enroll");

        // button.onClick = ajax_selfRemoveUser(userid, eventid);
        setTimeout(function () {
            button.removeAttribute('disabled');
            button.addEventListener('click', function () {
                ajax_selfRemoveUser(userid, eventid);
            });
            a.innerHTML = 'Leave Event';
        }, 5000);

        document.querySelector('#event-content').appendChild(button);
    }).catch(function (error) {
        console.log(error);
    });
};

// REQUEST USED FOR THE HOST TO BE ABLE TO ADD USERS TO HIS EVENT (IN THE EVENT PAGE)
function ajax_addUser(userid, eventid) {
    fetch("addEventUsers", {
        headers: {
            "Content-Type": "application/json",
            "Accept": "application/json",
            "X-Requested-With": "XMLHttpRequest",
            "X-CSRF-Token": document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
        method: "post",
        credentials: "same-origin",
        body: JSON.stringify({
            userid: userid,
            eventid: eventid
        })
    }).then(function (data) {
        refreshDiv();
    }).catch(function (error) {
        console.log(error);
    });
};
// REQUEST USED FOR THE HOST TO BE ABLE TO REMOVE USERS TO HIS EVENT (IN THE EVENT PAGE)
function ajax_remUser(userid, eventid) {
    fetch("removeEventUsers", {
        headers: {
            "Content-Type": "application/json",
            "Accept": "application/json",
            "X-Requested-With": "XMLHttpRequest",
            "X-CSRF-Token": document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
        method: "post",
        credentials: "same-origin",
        body: JSON.stringify({
            userid: userid,
            eventid: eventid
        })
    }).then(function (data) {
        refreshDiv();
    }).catch(function (error) {
        console.log(error);
    });
};

// REQUESTS USED TO GET THE 
function getComments(id) {
    fetch("getComments" + "?" + new URLSearchParams({
        event_id: id
    }), {
        headers: {
            "Content-Type": "application/json",
            "Accept": "application/json",
            "X-Requested-With": "XMLHttpRequest",
            "X-CSRF-Token": document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
        method: "get",
        credentials: "same-origin",
    }).then(function (data) {
        return data.json();
    }).then(function (data) {
        let container = document.querySelector("#new-comments-container");
        container.innerHTML = '';
        data.forEach(function (comment) {
            let div = document.createElement('div');
            div.setAttribute('class', 'd-flex comment');
            let img = document.createElement('img');
            img.setAttribute('class', 'rounded-circle comment-img');
            img.src = comment.user.profilepic;
            let div2 = document.createElement('div');
            div2.setAttribute('class', 'flex-grow-1 ms-3');
            let div3 = document.createElement('div');
            div3.classList.add('mb-1');
            let a = document.createElement('a');
            a.setAttribute('class', 'fw-bold link-dark me-1');
            a.innerHTML = comment.user.name;
            let span = document.createElement('span');
            span.setAttribute('class', 'text-muted text-nowrap');
            span.innerHTML = comment.date;
            let div4 = document.createElement('div');
            div4.classList.add('mb-2');
            div4.innerHTML = comment.text;
            let div5 = document.createElement('div');
            div5.setAttribute('class', 'hstack align-items-center mb-2');
            let a2 = document.createElement('a');
            a2.setAttribute('class', 'link-primary me-2');
            let i = document.createElement('i');
            i.setAttribute('class', 'icon-comments');
            if (comment.upvoted) {
                i.setAttribute('onclick', 'removeUpvote(' + comment.user.userid +','+ comment.id + ', )')
                i.id = 'like-full';
            }
            else {
                i.setAttribute('onclick', 'addUpvote(' + comment.user.userid +','+ comment.id + ', )')
                i.id = 'like';
            }
            let span2 = document.createElement('span');
            span2.setAttribute('class', 'me-3 small');
            span2.innerHTML = '55';
            let a3 = document.createElement('a');
            a3.setAttribute('class', 'link-danger small ms-3');
            a3.innerHTML = 'delete';
            let a4 = document.createElement('a');
            a4.setAttribute('class', 'link-danger small ms-3');
            a4.innerHTML = 'report';

            div5.appendChild(a2);
            a2.appendChild(i);
            div5.appendChild(span2);
            div5.appendChild(a3);
            div5.appendChild(a4);
            div4.appendChild(div5);
            div3.appendChild(a);
            div3.appendChild(span);
            div2.appendChild(div3);
            div2.appendChild(div4);
            div.appendChild(img);
            div.appendChild(div2);
            container.appendChild(div);

            document.querySelector("#new-comments-container").lastElementChild.scrollIntoView();
        });

    }).catch(function (error) {
        console.log(error);
    });
}

// REQUEST FOR ADMIN TO BE ABLE TO SEARCH FOR USERS
document.getElementById("search-users-admin").addEventListener("keyup", function(e) {

    if (e.target.value == "") return;

    fetch("searchUsersAdmin" + "?" + new URLSearchParams({
        search: e.target.value
    }), {
        headers: {
            "Content-Type": "application/json",
            "Accept": "application/json",
            "X-Requested-With": "XMLHttpRequest",
            "X-CSRF-Token": document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
        method: "get",
        credentials: "same-origin",
    }).then(function(data) {
        return data.json();
    }).then(function(data) {
        let container = document.getElementById("search-admin-users-res");
        container.innerHTML = "";
        data.forEach(function(user) {

            let tr = document.createElement("tr");
            let td1 = document.createElement("td");
            let td2 = document.createElement("td");
            let td3 = document.createElement("td");
            let td4 = document.createElement("td");
            td4.style.textAlign = "center";
            let btn = document.createElement("button");
            btn.setAttribute("class", "btn btn-success");
            btn.innerHTML = "View Page";
            btn.addEventListener("click", function() {
                window.location.href = "user" + user.userid
            });

            td1.innerHTML = user.userid;
            td2.innerHTML = user.name;
            td3.innerHTML = user.email;
            td4.appendChild(btn);

            tr.appendChild(td1);
            tr.appendChild(td2);
            tr.appendChild(td3);
            tr.appendChild(td4);
            container.appendChild(tr);
        });

    }).catch(function(error) {
        console.log(error);
    });
});