<?php
    namespace Acme\Checkout\Services {

        class TestCatalogue implements CatalogueInterface {
            private Array $catalogue;

            public function new_product(){
                return new \Acme\Checkout\Models\Product();
            }

            public function get_catalogue(){
                return $this->catalogue;
            }

            public function get_product_by_code(string $product_code){
                return $this->catalogue[$product_code];
            }            

            public function add_to_catalogue(\Acme\Checkout\Models\Product $product){
                $this->catalogue[$product->code] = $product;
            }
        }
    }