<?= $this->include('components/alerts')?>
<!-- Modal Verify Email -->
<?php if (isset($user['email_verified']) == 0): ?>
<button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#verifyEmailModal">
    <i class="bi bi-pencil"></i>Verify Email
</button>
<div class="modal fade" id="verifyEmailModal" tabindex="-1" role="dialog" aria-labelledby="verifyEmailModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="verifyEmailModalLabel">Verify Email</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Please verify your email by clicking on the verification link sent to your email address.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<?php endif; ?>