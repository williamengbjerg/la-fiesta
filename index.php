<?php

include __DIR__.'/Classes/Button.php';

use Classes\Button\Button;

echo (new Button())
    ->setName("https://engbjerg.dk")
    ->setUrl("https://engbjerg.dk")
    ->setCssClasses([
        'test_link','test_link1','test_link2','test_link3'
    ]);

echo "<hr>";

echo (new Button())
    ->setName("Magento Tool")
    ->setUrl("https://magentotool.com")
    ->setTarget(true);

echo "<hr>";

echo (new Button("https://websnack.dk", "Websnack.dk", true))
    ->setCssClasses('text-blue-500');

echo "<hr>";

echo (new Button("https://profesionalmente.com.gt", "Profesionalmente.com.gt"));

