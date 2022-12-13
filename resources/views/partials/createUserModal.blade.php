<div class="modal fade" id="createUserModal" tabindex="-1" role="dialog" aria-labelledby="createUserModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content" id="edit-modal-content">
            <div class="modal-header">
                <button id="close-modal-button" data-dismiss="modal"></button>
                <h4 class="modal-title" id="editModalLabel">Create New User </h4>
            </div>
            <div class="modal-body">
                <form method='post' action="{{ route('storeUser')}}" enctype="multipart/form-data" id="_formCreateUser">
                    @csrf
                    <div class="form-group mb-3">
                        <label for="name" class="form-label">User Name</label>
                        <input id="name" type="text" name="name" class="input-group form-control">
                        <div class="invalid-feedback"></div>
                    </div>

                    <div class="form-group mb-3 form-inline">
                        <label for="email" class="form-label">Email</label>
                        <input id="email" type="text" name="email" class="input-group form-control">
                        <div class="invalid-feedback"></div>

                    </div>
                    <div class="form-group mb-3">
                        <label for="birthdate" class="form-label">Birthdate</label>
                        <input id="birthdate" type="date" name="birthdate" class="input-group form-control">
                        <div class="invalid-feedback"></div>
                    </div>
                    <div class="form-group mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input id="password" type="password" name="password" value="" class="input-group form-control">
                        <div class="invalid-feedback"></div>
                    </div>
                    <div class="form-group mb-3">
                        <label for="gender" class="form-label">Gender</label>
                        <input id="gender" type="text" name="gender" value="" class="input-group form-control">
                        <div class="invalid-feedback"></div>

                        <!-- <select class="form-select" aria-label="Default select example">
                            <option selected>Open this select menu</option>
                            <option value="M">Male</option>
                            <option value="F">Female</option>
                            <option value="O">Other</option>
                        </select> -->
                    </div>
                    <div class="form-group mb-3">
                        <label for="profilePic" class="form-label">Profile Picture</label>
                        <input id="profilePic" type="file" name="profilePic" value="" class="input-group form-control">
                        <div class="invalid-feedback"></div>
                    </div>
                    <button type="submit" class="input-group btn btn-primary">
                        Submit
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>



<script type="text/javascript" defer>
    function displayError(element, message) {
        element.classList.add('is-invalid');
        element.nextElementSibling.innerHTML = message;
    }

    let form = document.getElementById('_formCreateUser');

    form.addEventListener('submit', function(e) {
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
            return true;
        }
        
    }
</script>