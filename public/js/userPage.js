const selectOption = function(option) {
    console.log(option)
    switch (option) {
        case 1: {
            document.getElementById('myProfileOption').classList.add('optionSelected');
            document.getElementById('myEventsOption').classList.remove('optionSelected');
            document.getElementById('myInvitesOption').classList.remove('optionSelected');

            document.getElementById('myProfileDetails').classList.remove('userProfileDetailsHidden');
            document.getElementById('myEventsDetails').classList.add('userProfileDetailsHidden');
            document.getElementById('myInvitesDetails').classList.add('userProfileDetailsHidden');
            break;
        }
        case 2: {
            document.getElementById('myProfileOption').classList.remove('optionSelected');
            document.getElementById('myEventsOption').classList.add('optionSelected');
            document.getElementById('myInvitesOption').classList.remove('optionSelected');

            document.getElementById('myProfileDetails').classList.add('userProfileDetailsHidden');
            document.getElementById('myEventsDetails').classList.remove('userProfileDetailsHidden');
            document.getElementById('myInvitesDetails').classList.add('userProfileDetailsHidden');
            break;
        }
        case 3: {
            document.getElementById('myProfileOption').classList.remove('optionSelected');
            document.getElementById('myEventsOption').classList.remove('optionSelected');
            document.getElementById('myInvitesOption').classList.add('optionSelected');

            document.getElementById('myProfileDetails').classList.add('userProfileDetailsHidden');
            document.getElementById('myEventsDetails').classList.add('userProfileDetailsHidden');
            document.getElementById('myInvitesDetails').classList.remove('userProfileDetailsHidden');
            break;
        }
    }
}