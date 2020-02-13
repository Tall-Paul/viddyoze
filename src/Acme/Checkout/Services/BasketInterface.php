<?php
    namespace Acme\Checkout\Services {
        interface BasketInterface {
            public function new_basket(\Acme\Checkout\Services\CatalogueInterface $_catalogueService, \Acme\Checkout\Services\RulesInterface $_rulesService, \Acme\Checkout\Services\OffersInterface $_offersService);                        
            public function save_basket(\Acme\Checkout\Models\BasketInterface $basket);
            public function get_basket(guid $basketId);
        }
    }