<?= $this->include('components/alerts')?>
<?php $session = session(); ?>
<!-- Email -->
<form action="/settings/update-email-pengguna" method="post">
    <?= csrf_field() ?>
    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" name="email" id="email" class="form-control" value="<?= isset($user['username']) ?>" disabled>
    </div>
    <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#updateEmailModal">Update Email</button>
</form>

<!-- Modal Edit Email -->
<div class="modal fade" id="editEmailModal" tabindex="-1" role="dialog" aria-labelledby="editEmailModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="/settings/update-email-pengguna" method="post">
                <div class="modal-header">
                    <h5 class="modal-title" id="editEmailModalLabel">Edit Email</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="email" class="form-control" name="email" value="<?= isset($user['username']) ?>" required>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>