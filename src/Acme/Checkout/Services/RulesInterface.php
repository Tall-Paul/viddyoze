<?php
    namespace Acme\Checkout\Services {
        interface RulesInterface {

            public function new_rule();
            public function add_to_rules(\Acme\Checkout\Models\Rule $rule);
            public function get_rules();
            public function apply_rules(float $subtotal);
        }
    }