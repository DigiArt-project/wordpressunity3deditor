<?php

class PDBLoader {

    public $_content;
    
    public $CPK = array("h" => array(255, 255, 255), "he" => array(217, 255, 255), "li" => array(204, 128, 255), "be" => array(194, 255, 0), "b" => array(255, 181, 181), "c" => array(144, 144, 144), "n" => array(48, 80, 248), "o" => array(255, 13, 13), "f" => array(144, 224, 80), "ne" => array(179, 227, 245), "na" => array(171, 92, 242), "mg" => array(138, 255, 0), "al" => array(191, 166, 166), "si" => array(240, 200, 160), "p" => array(255, 128, 0), "s" => array(255, 255, 48), "cl" => array(31, 240, 31), "ar" => array(128, 209, 227), "k" => array(143, 64, 212), "ca" => array(61, 255, 0), "sc" => array(230, 230, 230), "ti" => array(191, 194, 199), "v" => array(166, 166, 171), "cr" => array(138, 153, 199), "mn" => array(156, 122, 199), "fe" => array(224, 102, 51), "co" => array(240, 144, 160), "ni" => array(80, 208, 80), "cu" => array(200, 128, 51), "zn" => array(125, 128, 176), "ga" => array(194, 143, 143), "ge" => array(102, 143, 143), "as" => array(189, 128, 227), "se" => array(255, 161, 0), "br" => array(166, 41, 41), "kr" => array(92, 184, 209), "rb" => array(112, 46, 176), "sr" => array(0, 255, 0), "y" => array(148, 255, 255), "zr" => array(148, 224, 224), "nb" => array(115, 194, 201), "mo" => array(84, 181, 181), "tc" => array(59, 158, 158), "ru" => array(36, 143, 143), "rh" => array(10, 125, 140), "pd" => array(0, 105, 133), "ag" => array(192, 192, 192), "cd" => array(255, 217, 143), "in" => array(166, 117, 115), "sn" => array(102, 128, 128), "sb" => array(158, 99, 181), "te" => array(212, 122, 0), "i" => array(148, 0, 148), "xe" => array(66, 158, 176), "cs" => array(87, 23, 143), "ba" => array(0, 201, 0), "la" => array(112, 212, 255), "ce" => array(255, 255, 199), "pr" => array(217, 255, 199), "nd" => array(199, 255, 199), "pm" => array(163, 255, 199), "sm" => array(143, 255, 199), "eu" => array(97, 255, 199), "gd" => array(69, 255, 199), "tb" => array(48, 255, 199), "dy" => array(31, 255, 199), "ho" => array(0, 255, 156), "er" => array(0, 230, 117), "tm" => array(0, 212, 82), "yb" => array(0, 191, 56), "lu" => array(0, 171, 36), "hf" => array(77, 194, 255), "ta" => array(77, 166, 255), "w" => array(33, 148, 214), "re" => array(38, 125, 171), "os" => array(38, 102, 150), "ir" => array(23, 84, 135), "pt" => array(208, 208, 224), "au" => array(255, 209, 35), "hg" => array(184, 184, 208), "tl" => array(166, 84, 77), "pb" => array(87, 89, 97), "bi" => array(158, 79, 181), "po" => array(171, 92, 0), "at" => array(117, 79, 69), "rn" => array(66, 130, 150), "fr" => array(66, 0, 102), "ra" => array(0, 125, 0), "ac" => array(112, 171, 250), "th" => array(0, 186, 255), "pa" => array(0, 161, 255), "u" => array(0, 143, 255), "np" => array(0, 128, 255), "pu" => array(0, 107, 255), "am" => array(84, 92, 242), "cm" => array(120, 92, 227), "bk" => array(138, 79, 227), "cf" => array(161, 54, 212), "es" => array(179, 31, 212), "fm" => array(179, 31, 186), "md" => array(179, 13, 166), "no" => array(189, 13, 135), "lr" => array(199, 0, 102), "rf" => array(204, 0, 89), "db" => array(209, 0, 79), "sg" => array(217, 0, 69), "bh" => array(224, 0, 56), "hs" => array(230, 0, 46), "mt" => array(235, 0, 38), "ds" => array(235, 0, 38), "rg" => array(235, 0, 38), "cn" => array(235, 0, 38), "uut" => array(235, 0, 38), "uuq" => array(235, 0, 38), "uup" => array(235, 0, 38), "uuh" => array(235, 0, 38), "uus" => array(235, 0, 38), "uuo" => array(235, 0, 38));
    
    public function __construct($content){
        $this->_content = $content;
    }
    
    public function trim($text) {
        return preg_replace('/\s\s*$/', '', preg_replace('/^\s\s*/', '', $text, 1), 1);
    }
    
    public function capitalize($text) {
        
        $res = strtoupper($text[0]);
        
        echo $text;
        
        if(strlen($text)>1)
            $res .= strtolower(substr($text,1));
        
        return $res;
    }
    
    public function hash($s, $e) {
        return 's' + min($s, $e) + 'e' + max($s, $e);
    }
    
    
    
    public function buildGeometry($atoms, $bonds) {
    
        $i = null;
        $l = null;
        $verticesAtoms = array();
        $colorsAtoms = array();
        $verticesBonds = array();
    
        for ($i = 0, $l = count($atoms);$i < $l;$i++) {
    
            $atom = $atoms[$i];
            $x = $atom[0];
            $y = $atom[1];
            $z = $atom[2];
    
            array_push($verticesAtoms, $x, $y, $z);
    
            $r = $atom[ 3 ][ 0 ] / 255;
            $g = $atom[ 3 ][ 1 ] / 255;
            $b = $atom[ 3 ][ 1 ] / 255;
    
            array_push($colorsAtoms, $r, $g, $b);
        }
    
        for ($i = 0, $l = count($bonds);$i < $l;$i++) {
    
            $bond = $bonds[$i];
            
            $start = $bond[ 0 ];
            $end = $bond[ 1 ];
    
            array_push($verticesBonds,
                $verticesAtoms[$start*3], $verticesAtoms[$start*3 + 1], $verticesAtoms[$start*3] + 2,
                $verticesAtoms[$end*3], $verticesAtoms[$end*3 + 1], $verticesAtoms[$end*3] + 2 );
        }
    
    
        $build = array(
                            "atoms" => $atoms,
                            "bonds" => $bonds,
                            "verticesAtoms"=>$verticesAtoms,
                            "colorsAtoms" => $colorsAtoms,
                            "verticesBonds"=>$verticesBonds
        );

        return $build;
    }
    
    
    
    public function parser(){
    
        $atoms = array();
        $bonds = array();
        $histogram = array();
        $bhash = array();
        $x = null;
        $y = null;
        $z = null;
        $e = null;
        
        $lines = explode('\n', $this->_content);
       
        
        for ($i = 0; $i < count($lines); $i++) {
            
            if (substr($lines[$i], 0, 4) === 'ATOM' || substr($lines[$i], 0, 6) === 'HETATM') {
    
                $x = floatval(substr($lines[$i], 30, 7));
                $y = floatval(substr($lines[$i], 38, 7));
                $z = floatval(substr($lines[$i], 46, 7));
    
                $e = strtolower($this->trim(substr($lines[$i], 76, 2)));
                
                if ($e === '') {
                    $e = strtolower($this->trim(substr($lines[$i], 12, 2)));
                }

                array_push($atoms, array($x, $y, $z, $this->CPK[$e], $this->capitalize($e)));

                if (!isset($histogram[$e])) {
                    $histogram[$e] = 1;
                } else {
                    $histogram[$e] += 1;
                }

            } else if (substr($lines[$i], 0, 6) === 'CONECT') {

                $satom = intval(substr($lines[$i], 6, 5));
                $eatom = intval(substr($lines[$i], 11, 5));

                if ($eatom) {

                    $h = $this->hash($satom, $eatom);

                    if (!isset($bhash[$h])) {

                        array_push($bonds, array($satom - 1, $eatom - 1, 1));

                        $bhash[$h] = count($bonds) - 1;

                    } else {

                    }
                }

            }
        
        }
        
    
    
        return $this->buildGeometry($atoms, $bonds);
    }

}


$str= "HEADER    water".'\n'.
"COMPND".'\n'.
"TITLE".'\n'.
"SOURCE".'\n'.
"HETATM    1 Cl   HOH     1       9.626   6.787  12.673".'\n'.
"HETATM    2  H   HOH     1       9.626   8.420  12.673".'\n'.
"HETATM    3  O   HOH     1      10.203   7.604  12.673".'\n'.
"CONECT    1    3".'\n'.
"CONECT    2    3".'\n'.
"END";


$pdbloader = new PDBLoader($str);


echo json_encode($pdbloader->parser(), JSON_PRETTY_PRINT);


//print_r();