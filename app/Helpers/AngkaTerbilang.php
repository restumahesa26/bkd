<?php
    function terbilang($angka) {
        $kalimat = str_split($angka);
        $terbilang = "";

        foreach ($kalimat as $value) {
            if ($value == 0) {
                $terbilang .= " Nol";
            }elseif ($value == 1) {
                $terbilang .= " Satu";
            }elseif ($value == 2) {
                $terbilang .= " Dua";
            }elseif ($value == 3) {
                $terbilang .= " Tiga";
            }elseif ($value == 4) {
                $terbilang .= " Empat";
            }elseif ($value == 5) {
                $terbilang .= " Lima";
            }elseif ($value == 6) {
                $terbilang .= " Enam";
            }elseif ($value == 7) {
                $terbilang .= " Tujuh";
            }elseif ($value == 8) {
                $terbilang .= " Delapan";
            }elseif ($value == 9) {
                $terbilang .= " Sembilan";
            }elseif ($value == '.') {
                $terbilang .= " Koma";
            }
        }

        return $terbilang;
    }
