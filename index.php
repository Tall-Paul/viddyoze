<?php
    echo "<pre>";
    require "autoloader.php";

   

    echo "Running Tests \n";

    echo "test1 (B01, G01): ";
    $basketTest = new Acme\Checkout\Tests\BasketTest();
    echo $basketTest->runTest(["B01","G01"],37.85);
    echo "\n";

    echo "test2 (R01, R01): ";
    $basketTest = new Acme\Checkout\Tests\BasketTest();
    echo $basketTest->runTest(["R01","R01"],54.37);
    echo "\n";

    echo "test3 (R01, G01): ";
    $basketTest = new Acme\Checkout\Tests\BasketTest();
    echo $basketTest->runTest(["R01","G01"],60.85);
    echo "\n";

    echo "test4 (B01, B01, R01, R01, R01): ";
    $basketTest = new Acme\Checkout\Tests\BasketTest();
    echo $basketTest->runTest(["B01","B01","R01","R01","R01"],98.27);
    echo "\n";


