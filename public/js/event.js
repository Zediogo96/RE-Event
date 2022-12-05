document.querySelector('#outroDiv > button').addEventListener('click', function () {
    let d = document.getElementById('outroDiv');
    d.classList.add("animate-out");
    setTimeout(function () {
        d.classList.remove("animate-out");
    }, 500);
    setTimeout(function () {
        d.style.display = "none";
    }, 450);
})

const list = document.querySelectorAll('.list')

function activeLink() {
    list.forEach((item) => item.classList.remove('active'))
    this.classList.add('active')
}

list.forEach((item) => item.addEventListener('click', activeLink))

function showUserDiv() {
    document.getElementById("info-navbar-container").querySelectorAll('#info-navbar-container > div').forEach(n => n.style.display = 'none');
    let d = document.getElementById('userDiv');
    d.classList.add("animate");
    setTimeout(function () {
        d.classList.remove("animate");
    }, 500);
    d.style.display = "block";
}

function showOutroDiv() {
    document.getElementById("info-navbar-container").querySelectorAll('#info-navbar-container > div').forEach(n => n.style.display = 'none');
    let d = document.getElementById('outroDiv');
    d.classList.add("animate");
    setTimeout(function () {
        d.classList.remove("animate");
    }, 500);
    d.style.display = "block";
}

function showInviteDiv() {
    document.getElementById("info-navbar-container").querySelectorAll('#info-navbar-container > div').forEach(n => n.style.display = 'none');
    let d = document.getElementById('inviteDiv');
    d.classList.add("animate");
    setTimeout(function () {
        d.classList.remove("animate");
    }, 500);
    d.style.display = "block";
}
document.querySelector('#userDiv > button').addEventListener('click', function () {

    let d = document.getElementById('userDiv');
    d.classList.add("animate-out");
    setTimeout(function () {
        d.classList.remove("animate-out");
    }, 500);
    setTimeout(function () {
        d.style.display = "none";
    }, 500);
})
document.querySelector('#inviteDiv > .skrr').addEventListener('click', function () {
    let d = document.getElementById('inviteDiv');
    d.classList.add("animate-out");
    setTimeout(function () {
        d.classList.remove("animate-out");
    }, 500);
    setTimeout(function () {
        d.style.display = "none";
    }, 500);
})