<?php

namespace App;

use Illuminate\Support\Facades\Session;
use App\san_pham;

class Cart
{
    public $product = null;
    public $totalQty = 0;
    public $totalPrice = 0;

    public function __construct($Cart)
    {
        if ($Cart) {
            $this->product = $Cart->product;
            $this->totalQty = $Cart->totalQty;
            $this->totalPrice = $Cart->totalPrice;
        }
    }
    //them
    public function AddCart($product, $id)
    {

        $newproduct = ['qty' => 0, 'price' => $product->GIA_BAN, 'proinfo' => $product];
        if ($this->product) {
            if (array_key_exists($id, $this->product)) {
                $newproduct = $this->product[$id];
            }
        }
        $newproduct['qty']++;
        $newproduct['price'] =  $newproduct['qty'] * $product->GIA_BAN;
        $this->product[$id] = $newproduct;
        $this->totalQty++;
        $this->totalPrice += $product->GIA_BAN;
    }

    //xoa1
    public function reduceByOne($id)
    {
        $this->product[$id]['qty']--;
        $this->product[$id]['price'] -= $this->product[$id]['product']['price'];
        $this->totalQty--;
        $this->totalPrice -= $this->product[$id]['product']['price'];
        if ($this->product[$id]['qty'] <= 0) {
            unset($this->product[$id]);
        }
    }
    //xoa nhieu
    public function removeItem($id)
    {
        $this->totalQty -= $this->product[$id]['qty'];
        $this->totalPrice -= $this->product[$id]['price'];
        unset($this->product[$id]);
    }
   
}
