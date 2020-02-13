<?php
    namespace Acme\Checkout\Services {
        interface CatalogueInterface {
            public function new_product();
            public function get_catalogue();
            public function get_product_by_code(string $product_code);
            public function add_to_Catalogue(\Acme\Checkout\Models\Product $product);
        }
    }