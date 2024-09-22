<?php
class ShoppingCart
{
    private $items = [];

    public function addItem($productId, $productName, $price, $quantity = 1)
    {
        if (isset($this->items[$productId])) {
            $this->items[$productId]['quantity'] += $quantity;
        } else {
            $this->items[$productId] = [
                'name' => $productName,
                'price' => $price,
                'quantity' => $quantity,
            ];
        }
    }

    public function removeItem($productId)
    {
        if (isset($this->items[$productId])) {
            unset($this->items[$productId]);
        }
    }

    public function updateQuantity($productId, $quantity)
    {
        if (isset($this->items[$productId])) {
            if ($quantity <= 0) {
                $this->removeItem($productId);
            } else {
                $this->items[$productId]['quantity'] = $quantity;
            }
        }
    }

    public function getTotal()
    {
        $total = 0;
        foreach ($this->items as $item) {
            $total += $item['price'] * $item['quantity'];
        }
        return $total;
    }

    public function displayCart()
    {
        if (empty($this->items)) {
            echo "سلة التسوق فارغة.<br>";
            return;
        }

        echo "<h3>محتويات سلة التسوق:</h3>";
        foreach ($this->items as $item) {
            echo "المنتج: " . $item['name'] . ", السعر: " . $item['price'] . " دولار, الكمية: " . $item['quantity'] . "<br>";
        }
        echo "المجموع الكلي: " . $this->getTotal() . " دولار<br>";
    }
}
