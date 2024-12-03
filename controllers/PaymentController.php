<?php

class PaymentController extends Controller
{
    private $cookiesModel;

    public function __construct()
    {
        $this->cookiesModel = new CookiesModel();
    }

    public function process(array $params): void
    {
        $this->view = "payment";

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $mail = $_POST['mail'];
            $street = $_POST['street'];
            $city = $_POST['city'];
            $psc = $_POST['psc'];


            $streetRegex = '/^[\p{L} ]+ [0-9]+[\/]?[0-9]*$/u';
            $cityRegex = '/^[\p{L} ]+$/u';
            $pscRegex = '/^\d{5}$/';

            if (
                filter_var($mail, FILTER_VALIDATE_EMAIL) &&
                preg_match($streetRegex, $street) &&
                preg_match($cityRegex, $city) &&
                preg_match($pscRegex, $psc)
            ) {
                echo '<script>alert("Objednávka byla úspěšná");</script>';
                $this->redirect("goofy");
            } else {
                echo '<script>alert("Špatné údaje");</script>';
            }
        }
    }
}
