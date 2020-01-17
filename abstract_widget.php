<?php



interface Observer {
  public function update(Observable $subject);
}


abstract class Widget implements Observer {

  protected $internalData = array();

  abstract public function draw();

  public function update(Observable $subject) {
         $this->internalData = $subject->getData();
  }
}


class BasicWidget extends Widget {

  function __construct() {
  }

  public function draw() {
         $html = "<table border=1 width=130>";
         $html .= "<tr><td colspan=5 bgcolor=#cccccc>
                        <b>Instrument Info<b></td></tr>";

         $numRecords = count($this->internalData[0]);
         for($i = 0; $i < $numRecords; $i++) {
                $instms = $this->internalData[0];
                $prices = $this->internalData[1];
                $years =  $this->internalData[2];
                $html .=  "<tr><td>$instms[$i]</td><td> $prices[$i]</td>
                           <td>$years[$i]</td></tr>";
                }
         $html .= "</table><br>";
         echo $html;
  }
}


class FancyWidget extends Widget {
  
  function __construct() {
  }
  
  public function draw() {
         $html = 
         "<table border=0 cellpadding=5 width=270 bgcolor=#6699BB>
                <tr><td colspan=3 bgcolor=#FF5733>
                <b><span class=blue>Our Latest Prices<span><b>
                </td></tr>
                <tr><td><b>instrument</b></td>
                <td><b>price</b></td><td><b>date issued</b>
                </td></tr>";
         
         $numRecords = count($this->internalData[0]);
         for($i = 0; $i < $numRecords; $i++) {
                $instms = $this->internalData[0];
                $prices = $this->internalData[1];
                $years =  $this->internalData[2];
                
                $html .= 
                "<tr><td>$instms[$i]</td><td> 
                        $prices[$i]</td><td>$years[$i]
                        </td></tr>";
                }
         $html .= "</table><br>";
         echo $html;
  }
}



class AWidget extends Widget {

  function __construct() {
  }

  public function draw() {
         $html = "<table border=0 width=330>";
         $html .= "<tr><td colspan=5 bgcolor=#5EFF33>
                        <b>Fuentes<b></td></tr>";

         $numRecords = count($this->internalData[0]);
         for($i = 0; $i < $numRecords; $i++) {
                $a = $this->internalData[0];
                $b = $this->internalData[1];
                $c =  $this->internalData[2];
                $d = $this->internalData[3];
                $e = $this->internalData[4];

                $html .=  
                "<tr>
                  <td style='color:yellow;'>$a[$i]</td>
                  <td style='color:green;'> $b[$i]</td>
                  <td style='color:gray;'>$c[$i]</td>
                  <td style='color:gray;'>$d[$i]</td>
                  <td> $e[$i]</td>

                </tr>";
                }
         $html .= "</table><br>";
         echo $html;
  }
}

class BWidget extends Widget {

  function __construct() {
  }

  public function draw() {
         $html = "<table border=0 width=370 height=150>";
         $html .= "<tr><td colspan=5 bgcolor=#E033FF>
                        <b>Fuentes<b></td></tr>";

         $numRecords = count($this->internalData[0]);
         for($i = 0; $i < $numRecords; $i++) {
                $a = $this->internalData[0];
                $b = $this->internalData[1];
                $c =  $this->internalData[2];
                $d = $this->internalData[3];
                $e = $this->internalData[4];

                $html .=  
                "<tr style='background-color:orange;'>
                  <td style='background-color:pink;'>$a[$i]</td>
                  <td style='color:gray;'> $b[$i]</td>
                  <td style='color:gray;'>$c[$i]</td>
                  <td style='color:red;'>$d[$i]</td>
                  <td > $e[$i]</td>

                </tr>";
                }
         $html .= "</table><br>";
         echo $html;
  }
}

  class Source extends Observable {

  private $e;
  private $d;
  private $c;
  private $b;
  private $a;

  function __construct() {
         $this->a = array();
         $this->b = array();
         $this->c = array();
         $this->d = array();
         $this->e = array();

  }

  public function addRecord($a, $b, $c, $d, $e) {
         array_push($this->a, $a);
         array_push($this->b, $b);
         array_push($this->c, $c);
         array_push($this->d, $d);
         array_push($this->e, $e);
         $this->notifyObservers();
  }

  public function getData() {
         return array(
                $this->a,
                $this->b,
                $this->c,
                $this->d,
                $this->e
        );
  }
}

?>
