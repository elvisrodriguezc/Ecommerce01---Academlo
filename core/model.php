<?php
require_once './BD/AccesoDB.php';

class asignar
{
  private $Dato01;
  private $Dato02;
  private $Dato03;
  private $Dato04;
  private $Dato05;
  private $Dato06;
  private $Dato07;
  private $Dato08;
  private $Dato09;
  private $Dato10;
  private $Dato11;
  private $Dato12;
  private $Dato13;
  private $Dato14;
  private $Dato15;
  private $Dato16;
  private $Dato17;
  private $Dato18;
  private $Dato19;
  private $Dato20;
  private $Dato21;
  private $Dato22;
  private $Dato23;

  function getDato23(){ return $this->Dato23; }
  function setDato23($_Dato23) { $this->Dato23 = $_Dato23; }

  function getDato22(){ return $this->Dato22; }
  function setDato22($_Dato22) { $this->Dato22 = $_Dato22; }

  function getDato21(){ return $this->Dato21; }
  function setDato21($_Dato21) { $this->Dato21 = $_Dato21; }

  function getDato20(){ return $this->Dato20; }
  function setDato20($_Dato20) { $this->Dato20 = $_Dato20; }

  function getDato19(){ return $this->Dato19; }
  function setDato19($_Dato19) { $this->Dato19 = $_Dato19; }

  function getDato18(){ return $this->Dato18; }
  function setDato18($_Dato18) { $this->Dato18 = $_Dato18; }

  function getDato17(){ return $this->Dato17; }
  function setDato17($_Dato17) { $this->Dato17 = $_Dato17; }

  function getDato16(){ return $this->Dato16; }
  function setDato16($_Dato16) { $this->Dato16 = $_Dato16; }

  function getDato15(){ return $this->Dato15; }
  function setDato15($_Dato15) { $this->Dato15 = $_Dato15; }

  function getDato14(){ return $this->Dato14; }
  function setDato14($_Dato14) { $this->Dato14 = $_Dato14; }

  function getDato13(){ return $this->Dato13; }
  function setDato13($_Dato13) { $this->Dato13 = $_Dato13; }

  function getDato12(){ return $this->Dato12; }
  function setDato12($_Dato12) { $this->Dato12 = $_Dato12; }

  function getDato11(){ return $this->Dato11; }
  function setDato11($_Dato11) { $this->Dato11 = $_Dato11; }

  function getDato10(){ return $this->Dato10; }
  function setDato10($_Dato10) { $this->Dato10 = $_Dato10; }

  function getDato09(){ return $this->Dato09; }
  function setDato09($_Dato09) { $this->Dato09 = $_Dato09; }

  function getDato08(){ return $this->Dato08; }
  function setDato08($_Dato08) { $this->Dato08 = $_Dato08; }

  function getDato07(){ return $this->Dato07; }
  function setDato07($_Dato07) { $this->Dato07 = $_Dato07; }

  function getDato06(){ return $this->Dato06; }
  function setDato06($_Dato06) { $this->Dato06 = $_Dato06; }

  function getDato05(){ return $this->Dato05; }
  function setDato05($_Dato05) { $this->Dato05 = $_Dato05; }

  function getDato04(){ return $this->Dato04; }
  function setDato04($_Dato04) { $this->Dato04 = $_Dato04; }

  function getDato03(){ return $this->Dato03; }
  function setDato03($_Dato03) { $this->Dato03 = $_Dato03; }

  function getDato02(){ return $this->Dato02; }
  function setDato02($_Dato02) { $this->Dato02 = $_Dato02; }

  function getDato01(){ return $this->Dato01; }
  function setDato01($_Dato01) { $this->Dato01 = $_Dato01; }


  /* NUEVAS  FUNCIONES X*/
  function productos_lista()
  {
    try {
      $Limite = $this->getDato01();
      $query = "call productos_lista('$Limite')";
      $db = AccesoDB::getInstancia();
      $Response = $db->executeQuery($query);
      return $Response;
    } catch (Exception $e) {
      throw $e;
    }
  }
}
