<?php
namespace App\Models\ATM\Accounts;

class RekeningDeposito extends RekeningDasar
{
    protected int $jangkaWaktuBulan;
    protected float $bungaTahunan;
    protected string $tanggalJatuhTempo;

    public function __construct(
        int $nomorRekening,
        string $namaNasabah,
        float $saldoAwal,
        int $jangkaWaktuBulan,
        float $bungaTahunan
    ) {
        parent::__construct($nomorRekening, $namaNasabah, $saldoAwal);
        $this->jangkaWaktuBulan = $jangkaWaktuBulan;
        $this->bungaTahunan = $bungaTahunan;
        $this->tanggalJatuhTempo = now()
            ->setTimezone('Asia/Jakarta')
            ->addMonths($jangkaWaktuBulan)
            ->format('Y-m-d');
    }

    public function tarik(float $jumlah): bool
    {
        $hariIni = now()->setTimezone('Asia/Jakarta')->format('Y-m-d');

        if ($hariIni < $this->tanggalJatuhTempo) {
            $this->tambahLog("GAGAL tarik: deposito belum jatuh tempo ({$this->tanggalJatuhTempo})");
            return false;
        }

        if ($jumlah > $this->saldo) {
            $this->tambahLog("Gagal tarik: saldo tidak cukup");
            return false;
        }

        $this->saldo -= $jumlah;
        $this->tambahLog("Tarik Rp " . number_format($jumlah));
        return true;
    }

    public function getJenisRekening(): string
    {
        return 'Deposito';
    }

    public function hitungBunga(): float
    {
        return $this->saldo * ($this->bungaTahunan / 100);
    }
}