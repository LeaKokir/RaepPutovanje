<?php
include("konekcija.php");

class PutovanjeHandler {
    public $mysqli;

    public $drzava;
    public $grad;
    public $prevoz;
    public $cena;
    public $mesec;

    public function __construct($mysqli, $drzava, $grad, $prevoz, $cena, $mesec) {
        $this->mysqli = $mysqli;
        $this->drzava = $drzava;
        $this->prevoz = $prevoz;
        $this->cena = $cena;
        $this->grad = $grad;
        $this->mesec = $mesec;
    }

    public function validacijaPodataka($drzava, $grad, $mesec, $cena) {
        $greske = [];

        if (!ctype_alpha($drzava)) {
            $greske[] = "Drzava nije uneta ili sadrzi neispravne karaktere";
        }

        if (!ctype_alpha($grad)) {
            $greske[] = "Grad nije unet ili sadrzi neispravne karaktere";
        }

        if (!ctype_alpha($mesec)) {
            $greske[] = "Mesec nije unet ili sadrzi neispravne karaktere";
        }
        if (!filter_var($cena, FILTER_VALIDATE_INT)) {
            $greske[] = "Cena nije ispravna";
        }
        return $greske;
    }

    public function unesiPodatke($drzava, $grad, $prevoz, $cena, $mesec) {
        $greske = $this->validacijaPodataka($drzava, $grad, $mesec, $cena);

        if (empty($greske)) {
            $sql = "INSERT INTO putovanja(drzava, grad, prevoz, cena, mesec)
                    VALUES ('$drzava', '$grad', '$prevoz', '$cena', '$mesec')";

            if ($this->mysqli->query($sql)) {
                echo "<script>alert('Destinacija i njeni podaci su uspešno uneti');</script>";
            } else {
                echo "<script>alert('Došlo je do greške: " . $this->mysqli->error . "');</script>";
            }
        } else {
            echo "<script>alert('Došlo je do grešaka prilikom unosa podataka:');</script>";
            echo "<ul>";
            foreach ($greske as $greska) {
                echo "<li>$greska</li>";
            }
            echo "</ul>";
        }
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $drzava = $_POST['drzava'];
    $grad = $_POST['grad'];
    $prevoz = $_POST['prevoz'];
    $cena = $_POST['cena'];
    $mesec = $_POST['mesec'];

    $putovanjeHandler = new PutovanjeHandler($mysqli, $drzava, $grad, $prevoz, $cena, $mesec);
    $putovanjeHandler->unesiPodatke($drzava, $grad, $prevoz, $cena, $mesec);
}

class Ispis {
    public $drzava;
    public $grad;
    public $mesec;

    public function __construct($drzava, $grad, $mesec) {
        $this->drzava = $drzava;
        $this->grad = $grad;
        $this->mesec = $mesec;
    }

    public function Ispis1() {
        echo "Izabrali ste:" . $this->drzava . " " . $this->grad . " " . $this->mesec;
    
    }

}

$put = new Ispis($drzava, $grad, $mesec);
$put->Ispis1();
?>
