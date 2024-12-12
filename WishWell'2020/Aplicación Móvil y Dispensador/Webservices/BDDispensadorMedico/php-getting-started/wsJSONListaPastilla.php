<?PHP
require 'SQLGlobal.php';

if($_SERVER['REQUEST_METHOD']=='GET'){
	try{

		//$correo = $_GET["correo"]; // obtener parametros GET
		//$clave = $_GET["clave"]; // obtener parametros GET
		$respuesta = SQLGlobal::selectArray("select *from sp_listapastilla()"
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