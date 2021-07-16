<?php

include __DIR__.'/Classes/Button.php';

use Classes\Button\Button;

echo (new Button())
    ->setName("https://engbjerg.dk")
    ->setUrl("https://engbjerg.dk")
    ->setCssClasses([
     'test_link','test_link1','test_link2','test_link3'
    ])
    ->setAttributes(['aria-hidden' => "true"]);

echo "<hr>";

echo (new Button())
    ->setName("Magento Tool")
    ->setUrl("https://magentotool.com")
    ->setTarget(true)
    ->setCssClasses("separate-class")
    ->setAttributes([
        "id"        => 1,
        "data-url"  => "test",
        "class"     => "combine-with-other-class",
    ]);

echo "<hr>";

echo (new Button("https://websnack.dk", "Websnack.dk", true))
    ->setCssClasses('text-blue-500');

echo "<hr>";

echo (new Button("https://profesionalmente.com.gt", "Profesionalmente.com.gt"))
    ->setAttributes([
        'id'        => 'fiesta-123',
        'target'    => '_parent'
    ]);

