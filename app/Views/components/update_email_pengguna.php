<?= $this->include('components/alerts')?>
<?php $session = session(); ?>
<!-- Email -->
<form action="/settings/updateEmailPengguna" method="post">
    <?= csrf_field() ?>
    <div class="form-group">
        <label for="email">Email</label>
        <div class="input-group">
            <input type="email" name="email" id="email" class="form-control" value="<?= isset($user['username']) ?>" disabled>
            <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#updateEmailModal">
                <i class="bi bi-pencil"></i> Edit
            </button>
        </div>
    </div>
</form>

<!-- Modal Edit Email -->
<div class="modal fade" id="updateEmailModal" data-bs-backdrop="email" data-bs-keyboard="false" tabindex="-1" aria-labelledby="updateEmailModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="/settings/update-email-pengguna" method="post">
                <div class="modal-header">
                    <h5 class="modal-title" id="editEmailModalLabel">Edit Email</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="email" class="form-control" name="email" value="<?= isset($user['username']) ?>" required>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>