<?php

use stechy1\html\element\DivElement;
use stechy1\html\element\ParagraphElement;
use stechy1\html\HtmlBuilder;

spl_autoload_extensions(".php");
spl_autoload_register(function($class) {
    $dir = str_replace("test", "", __DIR__) . "src/";
    require $dir . $class . ".php";
});

$div = (new DivElement(
    (new ParagraphElement("Odstavec"))
));

$builder = new HtmlBuilder($div);
echo $builder->render();