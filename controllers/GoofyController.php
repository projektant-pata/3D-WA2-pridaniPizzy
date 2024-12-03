<?php

class GoofyController extends Controller
{
    private $cookiesModel;

    public function __construct()
    {
        $this->cookiesModel = new CookiesModel();
    }
    public function process(array $params): void
    {
        $this->cookiesModel->delete('pizza');
        $this->redirect('cart');
    }
}
