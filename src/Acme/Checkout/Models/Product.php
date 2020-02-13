<?php
    namespace Acme\Checkout\Models {
        class Product {
            //this would really be an ORM model of some description, for brevity I'm just using a simple class
            public int $id; //db indentifier
            public string $code;
            public string $name;
            public float $price;            
        }
    }