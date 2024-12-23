<?= $this->include('components/alerts')?>
<!-- Modal Verify Email -->
<?php if (isset($user['email_verified']) == 0): ?>
<button type="button" class="btn btn-success mt-2" data-bs-toggle="modal" data-bs-target="#verifyEmailModal">
    <i class="bi bi-pencil"></i>Verify Email
</button>
<div class="modal fade" id="verifyEmailModal" data-bs-backdrop="verivyemail" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="verifyEmailModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="verifyEmailModalLabel">Verify Email</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Harap verifikasi email Anda dengan mengklik link verifikasi yang dikirimkan ke alamat email Anda.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<?php endif; ?>