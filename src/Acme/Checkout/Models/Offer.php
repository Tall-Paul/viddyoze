<?php
    namespace Acme\Checkout\Models {
        class Offer {
            public int $id; //db identifier
            public string $product_code; //which product does this offer apply to?
            public int $qty; //how many of this product required to trigger the offer?
            public float $reduction; //how much to reduce subtotal by when offer triggered
        }
    }