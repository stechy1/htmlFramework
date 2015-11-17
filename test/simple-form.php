html<!doctype html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>

<?php

use stechy1\html\element\DivElement;
use stechy1\html\element\form\control\input\CheckBoxInput;
use stechy1\html\element\form\control\input\html5\EmailInput;
use stechy1\html\element\form\control\input\html5\NumberInput;
use stechy1\html\element\form\control\input\html5\UrlInput;
use stechy1\html\element\form\control\input\RadioInput;
use stechy1\html\element\form\control\input\SubmitInput;
use stechy1\html\element\form\control\input\TextInput;
use stechy1\html\element\form\control\LabelControl;
use stechy1\html\element\form\control\SelectControl;
use stechy1\html\element\form\FormElement;
use stechy1\html\element\form\rule\EmailRule;
use stechy1\html\element\form\rule\RequiredRule;
use stechy1\html\element\LineBreakElement;
use stechy1\html\element\OrderedList;

spl_autoload_extensions(".php");
spl_autoload_register(function($class) {
    $dir = str_replace("test", "", __DIR__) . "src/";
    require $dir . $class . ".php";
});

$form = new FormElement("frm");
$form->addContent([
    (new NumberInput("vek"))->setLabel(new LabelControl("Vek"))->setMinValue(-10)->setMaxValue(0),
    (new LineBreakElement()),
    (new TextInput("mail"))->addRule(new EmailRule())->setLabel("E-mail"),
    (new SubmitInput("submit")),
    (new DivElement([
        (new CheckBoxInput('ch1', 'check1', 'CheckBox1')),
        (new CheckBoxInput('ch2', 'check2', 'CheckBox2')),
        (new CheckBoxInput('ch3', 'check3', 'CheckBox3'))
    ])),
    (new DivElement([
        (new RadioInput('rad1', 'radio1', 'RadioInput1')),
        (new RadioInput('rad2', 'radio2', 'RadioInput2')),
        (new RadioInput('rad3', 'radio3', 'RadioInput3'))
    ])),
    (new LineBreakElement()),
    (new TextInput("non-empty"))->addRule(new RequiredRule())->setLabel("Neprazdna hodnota"),
    (new LineBreakElement()),
    (new SelectControl("selection",["jedna" => "prvni", "dva" => "druhy"])),
    (new LineBreakElement()),
    (new UrlInput("url", "Url adresa seznamu"))
]);

echo $form->render();
var_dump($form->getData());

if ($form->isPostBack())
    if ($form->isValid())
        echo 'Formular byl odeslan a je validni';
    else var_dump($form->getErrors());
else
    echo "Formular nebyl odeslan";

?>

</body>
</html>