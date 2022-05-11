<?php
namespace App;
class Cart{
    public $products = null;
    public $totalPrice = 0;
    public $totalQuantity = 0;
    public function __construct($cart){
        if($cart){
            $this->products = $cart->products;
            $this->totalPrice = $cart->totalPrice;
            $this->totalQuantity = $cart->totalQuantity;
        }
    }
    public function addCart($product,$id){
        $add_product = ['price'=>$product->price, 'quantity'=>0,'infoProduct'=>$product];
        if($this->products){
            if(array_key_exists($id,$this->products)){
                $add_product = $this->products[$id];
            }
        }
        $add_product['quantity']++;
        $add_product['price'] = $product->price * $add_product['quantity']; 
        $this->products[$id] = $add_product;
        $this->totalPrice += $product->price;
        $this->totalQuantity++;
    }
    public function delCart($id){
        $this->totalPrice -= $this->products[$id]['price'];
        $this->totalQuantity -= $this->products[$id]['quantity'];
        unset($this->products[$id]);
  
    }
    public function updateCart($id, $quantity){
        
        $this->totalPrice -= $this->products[$id]['price'];
        $this->totalQuantity -= $this->products[$id]['quantity'];
        
        $this->products[$id]['quantity'] = $quantity; 
        $this->products[$id]['price'] = $quantity * $this->products[$id]['infoProduct']->price ;

        $this->totalPrice += $this->products[$id]['price'];
        $this->totalQuantity += $this->products[$id]['quantity'];
    }


}    
?>
