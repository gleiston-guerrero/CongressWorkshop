<?PHP
require 'SQLGlobal.php';

if($_SERVER['REQUEST_METHOD']=='GET'){
	try{
		$idc= $_GET["Idc"]; // obtener parametros GET
		$idp= $_GET["Idp"];
		$fecha = $_GET["Fecha"];
		$hora = $_GET["Hora"];
		$idpast = $_GET["IdPast"];
		$idisp = $_GET["IdDisp"];
		$respuesta = SQLGlobal::selectArrayFiltro("select *from sp_registrarhorario(?,?,?,?,?,?);",
			array($idc,$idp,$hora,$fecha,$idpast,$idisp)
		);//con filtro ("El tamaño del array debe ser igual a la cantidad de los '?'")
		echo json_encode(array(
			'respuesta'=>'200',
			'estado' => 'Se obtuvieron los datos correctamente',
			'data'=>$respuesta,
			'error'=>''
		));
	}catch(PDOException $e){
		echo json_encode(
			array(
				'respuesta'=>'-1',
				'estado' => 'Ocurrio un error, intentelo mas tarde',
				'data'=>'',
				'error'=>$e->getMessage())
		);
	}
}
?>
