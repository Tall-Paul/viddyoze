<?php
    namespace Acme\Checkout\Services {
        class TestRules implements RulesInterface {
            private array $rules;

            public function __construct(){
                $this->rules = [];
            }

            public function new_rule(){
                return new \Acme\Checkout\Models\Rule();
            }
            public function add_to_rules($rule){
                $this->rules[] = $rule;
            }

            public function get_rules(){
                return $this->rules;
            }

            public function apply_rules($subTotal){
                foreach($this->rules as $rule){
                    if ($rule->min_total <= $subTotal && $rule->max_total >= $subTotal)
                        return $rule->shipping_cost;
                }
                return -999;
            }
        }
    }