<?php
 
class Latihan
{
    private $DISKON = 50000;
 
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

    function hasilDiskonan($arrBelanjaan){
          $arrDiskon = array(
            array('diskon' => 1000),
            array('diskon' => 200),
            array('diskon' => 300),
            array('diskon' => 400),
            array('diskon' => 500),  
          );
          
        //   $result = array_map(function($arrDiskon,$arrBelanjaan){
        //     //return array('nomorStruk'=>$nomorStruk,'jumlahBelanja'=>$jumlahBelanja,'diskon'=>$diskon);
        //   });
        return array_map("strukDiskon",$arrBelanjaan,$arrDiskon);
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
print_r($coba->hasilDiskonan($arrBelanjaan));