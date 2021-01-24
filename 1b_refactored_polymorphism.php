<?php

interface LingkaranInterface
{
    public function tendensiSentral($jarijari);

}

class Luas implements LingkaranInterface
{
    public function tendensiSentral($jarijari)
    {
        $phi = 3.14;
        Echo "Luas Lingkaran adalah : ". $phi*$jarijari*$jarijari;
    }
}

class Keliling implements LingkaranInterface
{
    public function tendensiSentral($jarijari)
    {
        $phi = 3.14;
        Echo "Keliling Lingkaran adalah : ". 2*$phi*$jarijari;
    }
}

class Diameter implements LingkaranInterface
{
    public function tendensiSentral($jarijari)
    {
        Echo "Diameter Lingkaran adalah : ". 2*$jarijari;
    }
}


class NoTendensiSentral implements LingkaranInterface
{
    public function tendensiSentral($jarijari)
    {
        echo 'Anda tidak memilih.';
    }
}

class LingkaranPilihan
{
    public static function tendensiSentralUntuk($tendensiSentral)
    {
        switch ($tendensiSentral) {
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
                return new NoTendensiSentral;
        }
    }
}

$jarijari = 14;

LingkaranPilihan::tendensiSentralUntuk('luas')->tendensiSentral($jarijari);
echo '<br>';
LingkaranPilihan::tendensiSentralUntuk('keliling')->tendensiSentral($jarijari);
echo '<br>';
LingkaranPilihan::tendensiSentralUntuk('diameter')->tendensiSentral($jarijari);

?>