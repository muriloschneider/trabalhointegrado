<?php 
  class Database{
    public static function conectar(){
      require_once __DIR__ ."/../../conf/Conexao.php";
      return Conexao::getInstance();
    }

    public static function vincularParametros($stmt, $params=array()){
      foreach ($params as $key=>$value){
        $stmt->bindValue($key, $value);
      }
      return $stmt;
      
    }

    public static function comando($sql, $params=array()){
      $conexao = self::conectar();
      $stmt = $conexao->prepare($sql);
      $stmt = self::vincularParametros($stmt, $params);
    //   try{
        return $stmt->execute();
    //   }catch (Exception $e){
    //     throw new Exception("Erro");
    //   }
    }

    public static function consulta($sql, $params=array()){
      $conexao = self::conectar();
      $stmt = $conexao->prepare($sql);
      $stmt = self::vincularParametros($stmt, $params);
      $stmt->execute();
      try{
        return $stmt->fetchAll();
      }catch (Exception $e){
        throw new Exception("Erro");
      }

    }
  }
?>