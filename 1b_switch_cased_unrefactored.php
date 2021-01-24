<?php
class Lingkaran{
    
    public $phi;

    public function __construct($phi=3.14){
        $this->phi = $phi;
    }

    public function luasLingkaran($jarijari){
        Echo "Luas Lingkaran adalah : ". $this->phi*$jarijari*$jarijari;
    }

    public function kelilingLingkaran($jarijari){
        Echo "Keliling Lingkaran adalah : ". 2*$this->phi*$jarijari;
    }

    public function diameterLingkaran($jarijari){
        Echo "Diameter Lingkaran adalah : ". 2*$jarijari;
    }

    public function noChoice()
    {
        echo 'Anda tidak memilih.';
    }

    public function hitungLingkaranUntuk($hitungLingkaran, $jarijari)
    {
        switch ($tendensiSentral) {
            case 'luas':
                $this->luasLingkaran($jarijari);
                break;
            case 'keliling':
                $this->kelilingLingkaran($jarijari);
                break;
            case "diameter":
                $this->diameterLingkaran($jarijari);
                break;
            default:
            $this->noChoice($jarijari);
        }
    }
}

$jarijari=14;
$hitungLingkaran = new Lingkaran;
$hitungLingkaran->hitungLingkaranUntuk('diameter', $jarijari);


?>