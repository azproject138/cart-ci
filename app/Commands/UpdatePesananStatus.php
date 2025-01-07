<?php

namespace App\Commands;

use CodeIgniter\CLI\BaseCommand;
use CodeIgniter\CLI\CLI;
use App\Models\PesananPenggunaModel;

class UpdatePesananStatus extends BaseCommand
{
    /**
     * The Command's Group
     *
     * @var string
     */
    protected $group = 'Pesanan';

    /**
     * The Command's Name
     *
     * @var string
     */
    protected $name = 'pesanan:update-status';

    /**
     * The Command's Description
     *
     * @var string
     */
    protected $description = 'Update status pesanan berdasarkan estimasi waktu';

    /**
     * The Command's Usage
     *
     * @var string
     */
    protected $usage = 'command:name [arguments] [options]';

    /**
     * The Command's Arguments
     *
     * @var array
     */
    protected $arguments = [];

    /**
     * The Command's Options
     *
     * @var array
     */
    protected $options = [];

    /**
     * Actually execute a command.
     *
     * @param array $params
     */
    public function run(array $params)
    {
        //
    }

    public function updateStatus()
    {
        $currentDate = date('Y-m-d H:i:s');

        // Cari pesanan dengan estimasi waktu yang telah lewat
        $pesananModel = new PesananPenggunaModel();
        $expiredOrders = $pesananModel->where('estimasi_waktu <=', $currentDate)
                                    ->where('status', 'Proses')
                                    ->findAll();

        // Update status pesanan menjadi 'Selesai'
        foreach ($expiredOrders as $order) {
            $order['status'] = 'Selesai';
            $pesananModel->save($order);
        }

        echo "Status pesanan telah diperbarui.\n";
    }
}
