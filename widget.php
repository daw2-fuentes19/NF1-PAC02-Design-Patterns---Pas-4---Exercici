<?php
require_once("observable.php");
require_once("abstract_widget.php");

$dat = new DataSource();
$widgetA = new BasicWidget();
$widgetB = new FancyWidget();
$data = new Source();
$widgetC = new AWidget();
$widgetD = new BWidget();

$dat->addObserver($widgetA);
$dat->addObserver($widgetB);

$data->addObserver($widgetC);
$data->addObserver($widgetD);

$dat->addRecord("drum", "$12.95", 1955);
$dat->addRecord("guitar", "$13.95", 2003);
$dat->addRecord("banjo", "$100.95", 1945);
$dat->addRecord("piano", "$120.95", 1999);

$data->addRecord("drum1", "$12.95", 1955,"a", "$12.95");
$data->addRecord("guitar1", "$13.95", 2003,"v", "$12.95");
$data->addRecord("banjo1", "$100.95", 1945,"natsort(array)", "$12.95");
$data->addRecord("piano1", "$120.95", 1999,"n", "$12.95");



$widgetA->draw();
$widgetB->draw();
$widgetC->draw();
$widgetD->draw();
?>
