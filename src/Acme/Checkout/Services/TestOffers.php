<?php
    namespace Acme\Checkout\Services {
        class TestOffers implements OffersInterface {
            private array $offers;

            public function __construct(){
                $this->offers = [];
            }

            public function new_offer(){
                return new \Acme\Checkout\Models\Offer();
            }
            public function add_to_offers(\Acme\Checkout\Models\Offer $offer){
                $this->offers[] = $offer;
            }
            public function get_offers(){
                return $this->offers;
            }
            /**
             * loop through each offer, see if our list of products matches, if it does return the reduction to apply            
             * 
             */
            public function apply_offers(array $products){                
                $reduction = 0;
                foreach($this->offers as $offer){
                    $matching_products = 0;
                    foreach($products as $product){
                        if ($product->code == $offer->product_code)
                            $matching_products++;
                    }
                    if ($matching_products >= $offer->qty)
                        $reduction += $offer->reduction;
                }
                return $reduction;
            }
        }
    }