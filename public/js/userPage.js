const selectOption = function(option) {
    switch (option) {
        case 1: {
            document.getElementById('myProfileOption').classList.add('optionSelected');
            document.getElementById('myEventsOption').classList.remove('optionSelected');
            document.getElementById('myInvitesOption').classList.remove('optionSelected');

            document.getElementById('myProfileDetails').classList.remove('optionDetailsHidden');
            document.getElementById('myEventsDetails').classList.add('optionDetailsHidden');
            document.getElementById('myInvitesDetails').classList.add('optionDetailsHidden');

            /*a parte de escolher submenus e esconder */
            document.getElementById('myEventsSubmenu').classList.remove('submenuActive');
            document.getElementById('myEventsSubmenu').classList.add('submenuSleep');

            document.getElementById('myInvitesSubmenu').classList.remove('submenuActive');
            document.getElementById('myInvitesSubmenu').classList.add('submenuSleep');

            break;
        }
        case 2: {
            /*a parte de escolher profile, invite, submenu* e meter bold */
            document.getElementById('myProfileOption').classList.remove('optionSelected');
            document.getElementById('myEventsOption').classList.add('optionSelected');
            document.getElementById('myInvitesOption').classList.remove('optionSelected');

            /*a parte de dar display à option no lado direito */
            document.getElementById('myProfileDetails').classList.add('optionDetailsHidden');
            document.getElementById('myEventsDetails').classList.remove('optionDetailsHidden');
            document.getElementById('myInvitesDetails').classList.add('optionDetailsHidden');

            /*a parte de escolher submenus e esconder */
            document.getElementById('myEventsSubmenu').classList.add('submenuActive');
            document.getElementById('myEventsSubmenu').classList.remove('submenuSleep');

            document.getElementById('myInvitesSubmenu').classList.remove('submenuActive');
            document.getElementById('myInvitesSubmenu').classList.add('submenuSleep');

            document.getElementById('pastEvents').classList.add('submenuActive');
            document.getElementById('pastEvents').classList.remove('submenuSleep');

            break;
        }
        case 3: {
            document.getElementById('myProfileOption').classList.remove('optionSelected');
            document.getElementById('myEventsOption').classList.remove('optionSelected');
            document.getElementById('myInvitesOption').classList.add('optionSelected');

            document.getElementById('myProfileDetails').classList.add('optionDetailsHidden');
            document.getElementById('myEventsDetails').classList.add('optionDetailsHidden');
            document.getElementById('myInvitesDetails').classList.remove('optionDetailsHidden');

            /*a parte de escolher submenus e esconder */
            document.getElementById('myEventsSubmenu').classList.remove('submenuActive');
            document.getElementById('myEventsSubmenu').classList.add('submenuSleep');

            document.getElementById('myInvitesSubmenu').classList.add('submenuActive');
            document.getElementById('myInvitesSubmenu').classList.remove('submenuSleep');

            document.getElementById('receivedInvites').classList.add('submenuActive');
            document.getElementById('receivedInvites').classList.remove('submenuSleep');

            break;
        }
    }
}

const showSubmenu = function(option){

    switch(option){
       case 1: {
            document.getElementById('pastEvents').classList.add('submenuActive');
            document.getElementById('pastEvents').classList.remove('submenuSleep');

            document.getElementById('futureEvents').classList.remove('submenuActive');
            document.getElementById('futureEvents').classList.add('submenuSleep');

            document.getElementById('eventsCreatedByMe').classList.remove('submenuActive');
            document.getElementById('eventsCreatedByMe').classList.add('submenuSleep');

            document.getElementById('receivedInvites').classList.remove('submenuActive');
            document.getElementById('receivedInvites').classList.add('submenuSleep');

            document.getElementById('sentInvites').classList.remove('submenuActive');
            document.getElementById('sentInvites').classList.add('submenuSleep');

            break;
        }
        case 2: {
            document.getElementById('pastEvents').classList.remove('submenuActive');
            document.getElementById('pastEvents').classList.add('submenuSleep');

            document.getElementById('futureEvents').classList.add('submenuActive');
            document.getElementById('futureEvents').classList.remove('submenuSleep');

            document.getElementById('eventsCreatedByMe').classList.remove('submenuActive');
            document.getElementById('eventsCreatedByMe').classList.add('submenuSleep');

            document.getElementById('receivedInvites').classList.remove('submenuActive');
            document.getElementById('receivedInvites').classList.add('submenuSleep');

            document.getElementById('sentInvites').classList.remove('submenuActive');
            document.getElementById('sentInvites').classList.add('submenuSleep');
            break;
        } 
        case 3: {
            document.getElementById('pastEvents').classList.remove('submenuActive');
            document.getElementById('pastEvents').classList.add('submenuSleep');

            document.getElementById('futureEvents').classList.remove('submenuActive');
            document.getElementById('futureEvents').classList.add('submenuSleep');

            document.getElementById('eventsCreatedByMe').classList.add('submenuActive');
            document.getElementById('eventsCreatedByMe').classList.remove('submenuSleep');

            document.getElementById('receivedInvites').classList.remove('submenuActive');
            document.getElementById('receivedInvites').classList.add('submenuSleep');

            document.getElementById('sentInvites').classList.remove('submenuActive');
            document.getElementById('sentInvites').classList.add('submenuSleep');
            break;
        } 
        case 4: {
            document.getElementById('pastEvents').classList.remove('submenuActive');
            document.getElementById('pastEvents').classList.add('submenuSleep');

            document.getElementById('futureEvents').classList.remove('submenuActive');
            document.getElementById('futureEvents').classList.add('submenuSleep');

            document.getElementById('eventsCreatedByMe').classList.remove('submenuActive');
            document.getElementById('eventsCreatedByMe').classList.add('submenuSleep');

            document.getElementById('receivedInvites').classList.add('submenuActive');
            document.getElementById('receivedInvites').classList.remove('submenuSleep');

            document.getElementById('sentInvites').classList.remove('submenuActive');
            document.getElementById('sentInvites').classList.add('submenuSleep');
            break;
        }
        case 5: {
            document.getElementById('pastEvents').classList.remove('submenuActive');
            document.getElementById('pastEvents').classList.add('submenuSleep');

            document.getElementById('futureEvents').classList.remove('submenuActive');
            document.getElementById('futureEvents').classList.add('submenuSleep');

            document.getElementById('eventsCreatedByMe').classList.remove('submenuActive');
            document.getElementById('eventsCreatedByMe').classList.add('submenuSleep');

            document.getElementById('receivedInvites').classList.remove('submenuActive');
            document.getElementById('receivedInvites').classList.add('submenuSleep');

            document.getElementById('sentInvites').classList.add('submenuActive');
            document.getElementById('sentInvites').classList.remove('submenuSleep');
            break;
        }  
    }
    
}