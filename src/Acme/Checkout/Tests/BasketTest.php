<?php


namespace Acme\Checkout\Tests {
    class BasketTest extends BaseTest{
        
        public function runTest(array $products, float $expected_total){        
            $basket = $this->basketService->new_basket($this->catalogueService, $this->rulesService, $this->offersService);
            foreach($products as $product){
                $basket->add_product($product);
            }          
            $total = $basket->get_total();
            if (Round($total,2) == Round($expected_total,2)){
                return "SUCCESS";
            } else {
                return "FAILURE (".$total.")";
                
            }                       
        }
    }
}




