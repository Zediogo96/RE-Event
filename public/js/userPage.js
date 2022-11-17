const selectOption = function(option) {

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

const showDetails = function(option){
    
    Array.from(document.getElementsByClassName('details')).forEach((element) => {
        element.classList.remove('optionSelected');
        element.classList.add('submenuSleep');
        element.classList.remove('submenuActive');

    });

    Array.from(document.getElementsByClassName('subOption')).forEach((element) => {
        element.classList.remove('optionSelected');
    });

    switch(option){
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