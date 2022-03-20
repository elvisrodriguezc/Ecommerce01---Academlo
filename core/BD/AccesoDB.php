<?php
require_once __DIR__.'/../util/util.php';
ini_set('date.timezone','America/Lima');
ini_set("max_execution_time", 0);
ini_set("memory_limit", "800M");
ini_set('max_execution_time', 600);
class AccesoDB
{
  // Variable que representa la conexión con el servidor
  private $cn = null;
  // Implementación del patrón Singleton
  private static  $instancia = null;

  public static function getInstancia() {

    if( self::$instancia == null ) {
      self::$instancia = new AccesoDB();
    }
    return self::$instancia;
  }

  // Método privado que retorna la conexión con el servidor
  private function getConnection(){
    // Datos de conexión
    $parametros = parse_ini_file("./conf/conexion.ini");
    $server = $parametros["01"];
    $user = $parametros["02"];
    $pass=$parametros["03"];
    $db=$parametros["04"];
    if($this->cn == null)
    {
      try
      {
        $this->cn = mysqli_connect($server,$user,$pass,$db);
        //Codificacion utf-8
        mysqli_set_charset($this->cn, "utf8");
        if($this->cn)
        {
          //                    echo 'ok';
        }
        else
        {
          throw new Exception("No se tiene acceso al servidor o la Base de datos no existe.");
        }
      }
      catch( Exception $e )
      {
        throw $e;
      }
    }
    return $this->cn;
  }

  // Ejecuta una consulta y retorna el resultado como un arreglo
  public function executeQuery($query){
    try {
      $cn = $this->getConnection();

      $rs = mysqli_query($cn,$query);

      //mysql_query("SET NAMES 'utf8'");
      if(mysqli_errno($cn)) {
        throw new Exception(mysqli_error($cn));
      }
      $lista = array();
      while ($row = mysqli_fetch_assoc($rs))
      {
        $lista[] = $row;
      }
      mysqli_free_result($rs);
      //agrego esta linea para que pueda realizar
      //dos consultas a la vez en la BD
      mysqli_next_result($this->cn);
      //            mysqli_close();
      return $lista;
    } catch( Exception $e ) {
      Util::save_log( $e, $query );
      throw $e;
    }
  }


  // Ejecuta una consulta y retorna el resultado como un arreglo
  public function executeQueryCommand($query){
    try {
      $cn = $this->getConnection();

      mysqli_query($cn,$query);

      //mysql_query("SET NAMES 'utf8'");
      if(mysqli_errno($cn)) {
        throw new Exception(mysqli_error($cn));
      }
      return 0;
    } catch( Exception $e ) {
      Util::save_log( $e, $query );
      throw $e;
    }
  }
}

//$basedatos = AccesoDB::getInstancia();
//$basedatos = new AccesoDB();
//$resultado =  $basedatos->executeQuery("select insumo_id from insumo where serie='0002949'");
//$var = $resultado[0]['insumo_id'];
//echo $var;

//$basedatos = AccesoDB::getInstancia();
//$basedatos = new AccesoDB();
//$resultado =  $basedatos->executeQuery("insert into marca values(default,'PERU','')");
//print_r($resultado);
