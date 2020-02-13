<?php
    namespace Acme\Checkout\Services {
        
        class TestBasket implements BasketInterface {
            private \Acme\Checkout\Services\CatalogueInterface $catalogueService;
            private \Acme\Checkout\Services\RulesInterface $rulesService;
            private \Acme\Checkout\Services\OffersInterface $offersService;            

            public function new_basket(\Acme\Checkout\Services\CatalogueInterface $_catalogueService, \Acme\Checkout\Services\RulesInterface $_rulesService, \Acme\Checkout\Services\OffersInterface $_offersService)
            {
                return new \Acme\Checkout\Models\Basket($_catalogueService, $_rulesService, $_offersService);
            }

            public function save_basket(\Acme\Checkout\Models\BasketInterface $basket){
                throw new Exception('Not implemented');
            }
            public function get_basket(guid $basketId){
                throw new Exception('Not implemented');
            }
            
        }
    }