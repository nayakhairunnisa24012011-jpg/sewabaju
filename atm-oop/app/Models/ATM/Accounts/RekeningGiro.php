<?php
namespace App\Models\ATM\Accounts;

use App\Models\ATM\Contracts\Printable;

class RekeningGiro extends RekeningDasar implements Printable
{
    protected float $limitOverdraft;

    public function __construct(int $nomorRekening, string $namaNasabah, float $saldoAwal = 0, float $limitOverdraft = 5000000)
    {
        parent::__construct($nomorRekening, $namaNasabah, $saldoAwal);
        $this->limitOverdraft = $limitOverdraft;
    }

    public function tarik(float $jumlah): bool
    {
        if (($this->saldo - $jumlah) < -$this->limitOverdraft) {
            $this->tambahLog("GAGAL tarik Rp " . number_format($jumlah, 0, ',', '.') . " | Melebihi limit overdraft Rp " . number_format($this->limitOverdraft, 0, ',', '.'));
            return false;
        }
        $this->saldo -= $jumlah;
        $status = $this->saldo < 0 ? " OVERDRAFT" : "";
        $this->tambahLog("TARIK Rp " . number_format($jumlah, 0, ',', '.') . " | Saldo: Rp " . number_format($this->saldo, 0, ',', '.') . $status);
        return true;
    }

    public function getJenisRekening(): string
    {
        return 'Giro';
    }

    public function cetakStruk(): string
    {
        return "--- STRUK GIRO ---<br>"
            . "No. Rek  : {$this->nomorRekening}<br>"
            . "Nama     : {$this->namaNasabah}<br>"
            . "Saldo    : Rp " . number_format($this->saldo, 0, ',', '.') . "<br>"
            . "Overdraft: Rp " . number_format($this->limitOverdraft, 0, ',', '.') . "<br>"
            . "---------------------------------<br>";
    }
}
?>