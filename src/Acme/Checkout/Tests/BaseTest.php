<?php
namespace Acme\Checkout\Tests {
    class BaseTest {
        protected $basketService;
        protected $catalogueService;
        protected $rulesService;
        protected $offersService;

        public function __construct(){
            $this->basketService = new \Acme\Checkout\Services\TestBasket;
            $this->catalogueService = new \Acme\Checkout\Services\TestCatalogue;
            $this->rulesService = new \Acme\Checkout\Services\TestRules;
            $this->offersService = new \Acme\Checkout\Services\TestOffers;
            $this->initialise_data();
        }

        protected function initialise_offers(){
            $offer1 = $this->offersService->new_offer();
            $offer1->product_code = "R01";
            $offer1->qty = 2;
            $offer1->reduction = 16.48;

            $this->offersService->add_to_offers($offer1);
        }

        protected function initialise_rules(){
            $rule1 = $this->rulesService->new_rule();
            $rule1->min_total = 0.00;
            $rule1->max_total = 49.99;
            $rule1->shipping_cost = 4.95;

            $rule2 = $this->rulesService->new_rule();
            $rule2->min_total = 50.00;
            $rule2->max_total = 89.99;
            $rule2->shipping_cost = 2.95;

            $rule3 = $this->rulesService->new_rule();
            $rule3->min_total = 90.00;
            $rule3->max_total = PHP_FLOAT_MAX;
            $rule3->shipping_cost = 0.00;

            $this->rulesService->add_to_rules($rule1);
            $this->rulesService->add_to_rules($rule2);
            $this->rulesService->add_to_rules($rule3);

        }

        protected function initialise_catalogue(){
             //add products to catalogue
             $redWidget = $this->catalogueService->new_product();
             $redWidget->code = "R01";
             $redWidget->name = "Red Widget";
             $redWidget->price = 32.95;
 
             $greenWidget = $this->catalogueService->new_product();
             $greenWidget->code = "G01";
             $greenWidget->name = "Green Widget";
             $greenWidget->price = 24.95;
 
             $blueWidget = $this->catalogueService->new_product();
             $blueWidget->code = "B01";
             $blueWidget->name = "Blue Widget";
             $blueWidget->price = 7.95;

             $this->catalogueService->add_to_catalogue($redWidget);
             $this->catalogueService->add_to_catalogue($greenWidget);
             $this->catalogueService->add_to_catalogue($blueWidget);
        }

        protected function initialise_data(){
            $this->initialise_catalogue();
            $this->initialise_rules();
            $this->initialise_offers();
        }

        
    }
}