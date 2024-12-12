<?PHP
require 'SQLGlobal.php';

if($_SERVER['REQUEST_METHOD']=='GET'){
	try{

		$idpaciente = $_GET["IdPaciente"]; // obtener parametros GET
		$idcuidador = $_GET["IdCuidador"]; // obtener parametros GET
		$respuesta = SQLGlobal::selectArrayFiltro("select *from sp_listahorarios(?,?)",
			array($idcuidador,$idpaciente)
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