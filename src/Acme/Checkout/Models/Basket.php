<?php


    namespace Acme\Checkout\Models {
        class Basket {

            //this would really be an ORM model of some description, for brevity I'm just using a simple class
            private float $id; //db identifier
            private array $products; //array of Models\Product
            private float $subTotal;
            private float $shipping;
            private \Acme\Checkout\Services\CatalogueInterface $catalogueService;
            private \Acme\Checkout\Services\RulesInterface $rulesService;
            private \Acme\Checkout\Services\OffersInterface $offersService;

            public function __construct(\Acme\Checkout\Services\CatalogueInterface $_catalogueService, \Acme\Checkout\Services\RulesInterface $_rulesService, \Acme\Checkout\Services\OffersInterface $_offersService)
            {
                $this->catalogueService = $_catalogueService;
                $this->rulesService = $_rulesService;
                $this->offersService = $_offersService;     
                $this->subTotal = 0.00;
                $this->shipping = 0.00;           
            }            

            public function add_product(string $product_code){
                $product = $this->catalogueService->get_product_by_code($product_code);
                $this->products[] = $product;
                $this->calculate_product_totals();
                $this->calculate_shipping();
                return $this->get_total;
            }

            public function get_total(){
                return $this->subTotal + $this->shipping;
            }

            /**
             * 
             * calculates subtotal of order based on total product costs, taking offers into account
             * 
             */
            private function calculate_product_totals(){
                $this->subTotal = 0.00;
                foreach($this->products as $product){
                    $this->subTotal += $product->price;
                }
                $reduction = $this->offersService->apply_offers($this->products);
                $this->subTotal -= $reduction;
            }

            private function calculate_shipping(){                
                $this->shipping = $this->rulesService->apply_rules($this->subTotal);
            }

         


        }
    }