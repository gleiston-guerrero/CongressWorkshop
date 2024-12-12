<?PHP
$json=array();
	if(isset($_GET["Usuario"])&&isset($_GET["Clave"])){
		$usuario=$_GET['Usuario'];
		$clave=$_GET['Clave'];
		
		$con= pg_connect("host='localhost' dbname=DispensadorMedico port=5432 user=postgres password=12345") or 
		die("Error de Conexion".pg_last_error());	
		$consulta="SELECT *from sp_listapacientes('$usuario','$clave')";
		if($consulta!=null){
			$resultado=pg_query($con,$consulta);
			while(($registro=pg_fetch_array($resultado))){
				$json['Datos'][]=$registro;
			}
			pg_close($con);
			echo json_encode($json);
		}else{
			$resulta["Mensaje"]='No hay pacientes';
			$json['usuario'][]=$resulta;
			pg_close($con);
			echo json_encode($json);
			
		}
	}else{
			$resulta["Mensaje"]='Ws No Rtorna';
			$json['usuario'][]=$resulta;
			echo json_encode($json);
			
	}

?>