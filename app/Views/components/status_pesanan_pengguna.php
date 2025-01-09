<style>
    .card {
    display: flex;
    position: relative;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    transition: 0.3s;
    margin: 0 auto;
    margin-bottom: 20px;
    margin-top: 20px;
    border-radius: 10px;
    overflow: hidden;
    width: 100%;
    max-width: 400px;
    background-color: #ffffff;
    border: none;
    text-align: center;
    padding: 20px;
    color: #333333;
    font-size: 14px;
    font-weight: 500;
    line-height: 1.5;
}
</style>
<div class="col-md-6">
    <div class="card text-white bg-primary mb-3">
        <div class="card-header">Total Pesanan</div>
        <div class="card-body">
            <h5 class="card-title"><?= $totalPesanan ?></h5>
        </div>
    </div>
</div>
<div class="col-md-6">
    <div class="card text-white bg-warning mb-3">
        <div class="card-header">Pesanan Menunggu</div>
        <div class="card-body">
            <h5 class="card-title"><?= $pesananMenunggu ?></h5>
        </div>
    </div>
</div>