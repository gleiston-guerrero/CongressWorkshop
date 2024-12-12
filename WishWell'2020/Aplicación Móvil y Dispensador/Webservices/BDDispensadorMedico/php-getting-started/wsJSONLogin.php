<?PHP
require 'SQLGlobal.php';

if($_SERVER['REQUEST_METHOD']=='GET'){
	try{
		$correo = $_GET["correo"]; // obtener parametros GET
		$clave = $_GET["clave"];
		//$datos = json_decode(file_get_contents("php://input"),true);
		//$correo = $datos["correo"]; // obtener parametros GET
		//$clave = $datos["clave"]; // obtener parametros GET
		$respuesta = SQLGlobal::selectArrayFiltro("select *from public.sp_autentificarse(?,?)",
			array($correo,$clave)
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