// REQUEST USED FOR THE AUTHENTICATED USER TO BE ABLE TO COMMENT IN A EVENT (IN THE EVENT PAGE)
document.querySelector('#new-comment button').addEventListener('click', function(e) {
    e.preventDefault();

    var comment = document.querySelector('#my-comment');

    if (comment.value == '') {
        let error = document.querySelector('#new-comment label');
        error.innerHTML = 'Error: Comment cannot be empty';
        error.style.color = 'red';
        document.querySelector('#new-comment form').classList.add("apply-shake");
        setTimeout(function() {
            document.querySelector('#new-comment form').classList.remove("apply-shake");
        }, 500);
        return;
    } else {
        fetch("{{route('storeComment')}}", {
            headers: {
                "Content-Type": "application/json",
                "Accept": "application/json",
                "X-Requested-With": "XMLHttpRequest",
                "X-CSRF-Token": document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            method: "post",
            credentials: "same-origin",
            body: JSON.stringify({
                userid: "{{Auth::user()->userid}}",
                eventid: "{{$event->eventid}}",
                text: document.querySelector('#my-comment').value,
            })
        }).then(function(data) {
            getComments('{{$event->eventid}}', true);
            showAlert("newcomment");

        }).catch(function(error) {
            console.log(error);
        });
    }
});
