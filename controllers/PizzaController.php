<?php


class PizzaController extends Controller {
    private $cookiesModel;

    public function __construct() {
        $this->cookiesModel = new CookiesModel();
    }

    public function process(array $params): void
    {
        $this->view = "add-pizza";

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $base = $_POST['base'];  
            $ingredients = $_POST['ingredients'];
            $remember = $_POST['remember'];

            $pizza = new Pizza($base, $ingredients, $remember);
            if($remember == 1)
                $remember = 20 * 365 * 24 * 60 * 60;
            else 
                $remember = 0;
            $this->cookiesModel->addToCart($pizza, $remember);

            $this->redirect("cart");
        }
    }

}