<?php
    namespace Acme\Checkout\Services {
        interface OffersInterface {
            
            public function new_offer();
            public function add_to_offers(\Acme\Checkout\Models\Offer $offer);
            public function get_offers();
            public function apply_offers(array $products);
        }
    }