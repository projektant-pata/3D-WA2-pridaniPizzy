<?php

class CookiesModel
{
    public function set($key, $value, $expiry)
    {
        session_start(); 
        $sessionId = session_id(); 
        $_SESSION[$key] = $value;  
        
        if ($expiry > 0) {
            setcookie($key, $sessionId, time() + $expiry, "/");
        } else {
            setcookie($key, $sessionId, 0, "/"); // Cookie platná jen během session
        }    }

    public function get($key)
    {
        session_start();
        
        if (isset($_COOKIE[$key]) && session_id() === $_COOKIE[$key]) {
            return $_SESSION[$key] ?? []; 
        }
        return [];
    }

    public function delete($key)
    {
        session_start();
        
        if (isset($_COOKIE[$key]) && session_id() === $_COOKIE[$key]) {
            unset($_SESSION[$key]); 
        }
        
        setcookie($key, '', time() - 3600, "/"); 
    }

    public function addToCart($pizza, $expiry)
    {
        $cart = [
            'base' => $pizza->getBase(),
            'ingredients' => $pizza->getIngredients()
        ];
        $this->set('pizza', $cart, $expiry);
    }
}
