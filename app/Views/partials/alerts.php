<style>
    
    .alert-danger {
        margin: 0 0 0;
        font-size: 15px;
        color: red;
        background: none;
        border: none;
        margin-bottom: 0;
        margin-top: 0;
        margin-left: 0;
        margin-right: 0;
        display: absolute;
        flex-direction: column;
        align-items: left;
        text-align: left;
        justify-content: lefcentert;
    }

</style>

<?php if (session()->getFlashdata('success')): ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <?= session()->getFlashdata('success') ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php endif; ?>

<?php if (session()->getFlashdata('error')): ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <?= session()->getFlashdata('error') ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php endif; ?>