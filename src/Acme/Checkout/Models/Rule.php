<?php
    namespace Acme\Checkout\Models {
        class Rule {
            public int $id; //db identifer
            public float $min_total;
            public float $max_total;
            public float $shipping_cost;
        }
    }