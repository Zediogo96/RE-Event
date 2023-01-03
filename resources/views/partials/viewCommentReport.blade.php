<div id="view_comment_report" class="modal fade">
    <div class="modal-dialog modal-confirm">
        <div class="modal-content">
            <div class="modal-header flex-column">

                <div class="comment-container">
                    <div class="div1">
                        <img src="" alt="Profile image">
                    </div>
                    <div class="div2">
                        <h4 class="name">John Doe</h4>
                    </div>
                    <div class="div3">
                        <p class="text">This is a great comment!</p>
                    </div>
                </div>

                <form method="POST">
                    @csrf
                    <input type="hidden" name="userid">
                    <button type="submit" class="btn btn-danger" id="confirm-del-btn">Block User </button>
                </form>
            </div>
        </div>
    </div>
</div>
