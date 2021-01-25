<?php
 
class Latihan
{
    private $DISKON = 50000;

    //Jumlah diskon karena 10%;
    private $JUMLAH_DISKON = 0.1;
 

    function filterStruk($arrBelanjaan){
        $arrBelanjaan= $this->filterStrukYangLayakDapatDiskon($arrBelanjaan);
        return array_map(array($this, "hasilDiskon"), $arrBelanjaan);
    }
    /**
     * Memilah elemen array yang layak dapat diskon sesuai kriteria yang
diterapkan pada function strukDiskon
     * Parameter: $arrBelanjaan
     * Return: array 
     */
    function filterStrukYangLayakDapatDiskon($arrBelanjaan)
    {
        return array_filter($arrBelanjaan, array($this, "strukDiskon"));
    }
 
    /**
     * Rule pemilahan elemen array yang layak dapat diskon
     * Parameter: $arrBelanjaan
     * Return: array
     */
    protected function strukDiskon($arrBelanjaan)
    {
        if ($arrBelanjaan['jumlahBelanja'] > $this->DISKON) {
            return $arrBelanjaan;
        }   
    }

    function hasilDiskon($arrBelanjaan){
         $totalDiskon = $arrBelanjaan['jumlahBelanja'] * $this->JUMLAH_DISKON;
         $arrBelanjaan['diskon'] = $totalDiskon;
        return ($arrBelanjaan);
    }
}
 
$arrBelanjaan = array(
    array('nomorStruk' => 1, 'jumlahBelanja' => 77400),
    array('nomorStruk' => 2, 'jumlahBelanja' => 19000),
    array('nomorStruk' => 3, 'jumlahBelanja' => 49890),
    array('nomorStruk' => 4, 'jumlahBelanja' => 109000),
    array('nomorStruk' => 5, 'jumlahBelanja' => 56000),  
);
 
$coba = new Latihan;
print_r($coba->filterStruk($arrBelanjaan));