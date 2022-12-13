<div class="modal fade" id="createUserModal" tabindex="-1" role="dialog" aria-labelledby="createUserModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content" id="edit-modal-content" style="height: 85vh">
            <div class="modal-header">
                <button id="close-modal-button" data-dismiss="modal"></button>
                <h4 class="modal-title" id="editModalLabel">Create New User </h4>
            </div>
            <div class="modal-body">
                <form method='post' action="{{ route('storeUser')}}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    @csrf
                    <div class="form-group mb-3">
                        <label for="name" class="form-label">User Name</label>
                        <input id="name" type="text" name="name" class="input-group form-control">
                    </div>
                    <div class="form-group mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input id="email" type="text" name="email" class="input-group form-control">
                    </div>
                    <div class="form-group mb-3">
                        <label for="birthdate" class="form-label">Birthdate</label>
                        <input id="birthdate" type="datetime-local" name="birthdate" value="" class="input-group form-control">
                    </div>
                    <div class="form-group mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input id="password" type="password" name="password" value="" class="input-group form-control">
                    </div>
                    <div class="form-group mb-3">
                        <label for="gender" class="form-label">Gender</label>
                        <input id="gender" type="text" name="gender" value="" class="input-group form-control">
                    </div>
                    <div class="form-group mb-3">
                        <label for="profilePic" class="form-label">Profile Picture</label>
                        <input id="profilePic" type="file" name="profilePic" value="" class="input-group form-control">
                    </div>
                    <button type="submit" class="input-group btn btn-primary">
                        Submit
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>