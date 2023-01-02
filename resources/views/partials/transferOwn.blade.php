<div id="transferOwnershipModal" class="modal fade">
    <div class="modal-dialog modal-confirm">
        <div class="modal-content"  style="width: 50rem; left: -10rem;">
            <div class="modal-header flex-column">
                <div class="icon-box">
                    <i class="fa fa-user"></i>
                </div>
                <h4 class="modal-title w-100"> Transfer Ownership </h4>

                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">

                <div class="single-post-content">
                    <input type="text" class="form-controller" id="search-attendees-teste" name="search" placeholder="Search for the user.."></input>
                    <table class="events-list" style="margin-top: 2rem;">

                        <thead>
                            <tr>
                                <th>UserID</th>
                                <th>Username</th>
                                <th>Email</th>
                                <th> </th>
                            </tr>
                        </thead>
                        <tbody id="search-attendees-response">
                        </tbody>
                    </table>


                    <button id = "submitTOwn" type="button" class="btn btn-success btn-block"> Confirm </button>

                </div>

            </div>
        </div>
    </div>
</div>
