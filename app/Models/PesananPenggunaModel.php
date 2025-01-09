<?php

namespace App\Models;

use CodeIgniter\Model;

class PesananPenggunaModel extends Model
{
    protected $table            = 'pesananpengguna';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'user_id', 
        'jenis_pesanan', 
        'merek_pesanan', 
        'kategori_pesanan', 
        'jumlah_pesanan', 
        'deskripsi_pesanan', 
        'alamat', 
        'whatsapp_number', 
        'ketentuan_servis'
    ];

    protected bool $allowEmptyInserts = false;
    protected bool $updateOnlyChanged = true;

    protected array $casts = [];
    protected array $castHandlers = [];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [
        'user_id' => 'required',
        'jenis_pesanan' => 'required',
        'merek_pesanan' => 'required',
        'kategori_pesanan' => 'required',
        'jumlah_pesanan' => 'required|integer',
        'deskripsi_pesanan' => 'required',
        'alamat' => 'required',
        'whatsapp_number' => 'required',
        'ketentuan_servis' => 'required',
        'tanggal_pesanan' => 'required',
    ];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    public function getPesananWithUserData()
    {
        return $this->select('PesananPengguna.*, users.alamat as user_alamat, users.whatsapp_number as user_whatsapp')
                    ->join('users', 'users.id = PesananPengguna.user_id')
                    ->findAll();
    }
}
