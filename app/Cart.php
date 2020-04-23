<?php


namespace App;


class Cart
{
    public $items=null;
    public $totalQty = 0;
    public $totalPrice = 0;

    public function __construct($oldCart)
    {
//        if the old cart is passed
        if(isset($oldCart))
        {
           $this->items = $oldCart->items;
           $this->totalQty = $oldCart->totalQty;
           $this->totalPrice = $oldCart->totalPrice;
        }
    }

    public function add($item, $id)
    {
        $storedItem = ['qty' => 0, 'price' => $item->price, 'item' => $item];

        if ($this->items) {
            if (array_key_exists($id, $this->items)) {
                $storedItem = $this->items[$id];
            }
        }
        $storedItem['qty']++;
        $storedItem['price'] = $item->price * $storedItem['qty'];
        $this->items[$id] = $storedItem;
        $this->totalQty++;
        $this->totalPrice += $item->price;
    }

    public function decrease($product)
    {
        $this->items[$product]['qty']--;

        $this->items[$product]['price'] -= $this->items[$product]['item']['price'];
        $this->totalQty--;
        $this->totalPrice -= $this->items[$product]['item']['price'];

        if ($this->items[$product]['qty'] <= 0){
            unset($this->items[$product]);
        }
    }

    public function increase($product)
    {
        $this->items[$product]['qty']++;

        $this->items[$product]['price'] += $this->items[$product]['item']['price'];
        $this->totalQty++;
        $this->totalPrice += $this->items[$product]['item']['price'];

        if ($this->items[$product]['qty'] <= 0){
            unset($this->items[$product]);
        }
    }

    public function remove($product)
    {
        $this->totalQty -= $this->items[$product]['qty'];
        $this->totalPrice -= $this->items[$product]['price'];
        unset($this->items[$product]);
    }

}
