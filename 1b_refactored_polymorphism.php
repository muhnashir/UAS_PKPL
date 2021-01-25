<?php

interface LingkaranInterface
{
    public function hitungLingkaran($jarijari);

}

class Luas implements LingkaranInterface
{
    public function hitungLingkaran($jarijari)
    {
        $phi = 3.14;
        Echo "Luas Lingkaran adalah : ". $phi*$jarijari*$jarijari;
    }
}

class Keliling implements LingkaranInterface
{
    public function hitungLingkaran($jarijari)
    {
        $phi = 3.14;
        Echo "Keliling Lingkaran adalah : ". 2*$phi*$jarijari;
    }
}

class Diameter implements LingkaranInterface
{
    public function hitungLingkaran($jarijari)
    {
        Echo "Diameter Lingkaran adalah : ". 2*$jarijari;
    }
}


class NoHitungLingkaran implements LingkaranInterface
{
    public function hitungLingkaran($jarijari)
    {
        echo 'Anda tidak memilih.';
    }
}

class LingkaranPilihan
{
    public static function hitungLingkaranUntuk($hitungLingkaran)
    {
        switch ($hitungLingkaran) {
            case 'luas':
                return new Luas;
                break;
            case 'keliling':
                return new Keliling;
                break;
            case "diameter":
                return new Diameter;
                break;
            default:
                return new NoHitungLingkara;
        }
    }
}

$jarijari = 14;

LingkaranPilihan::hitungLingkaranUntuk('luas')->hitungLingkaran($jarijari);
echo '<br>';
LingkaranPilihan::hitungLingkaranUntuk('keliling')->hitungLingkaran($jarijari);
echo '<br>';
LingkaranPilihan::hitungLingkaranUntuk('diameter')->hitungLingkaran($jarijari);

?>