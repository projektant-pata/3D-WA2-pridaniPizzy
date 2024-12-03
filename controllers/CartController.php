<?php


class CartController extends Controller {
    private $cookiesModel;

    public function __construct() {
        $this->cookiesModel = new CookiesModel();
    }

    public function process(array $params): void
    {
        $this->data['pizza'] = $this->cookiesModel->get('pizza');

        $this->view = 'cart';
    }
}