<?PHP
$json=array();
	if(isset($_GET["Nombre"])&&isset($_GET["Apellido"])&&isset($_GET["Edad"])&&isset($_GET["Correo"])&&isset($_GET["Usuario"])&&isset($_GET["Clave"])){

		$nombre=$_GET['Nombre'];
		$apellido=$_GET['Apellido'];
		$edad=$_GET['Edad'];
		$correo=$_GET['Correo'];
		$usuario=$_GET['Usuario'];
		$clave=$_GET['Clave'];
		
		$con= pg_connect("host='localhost' dbname=DispensadorMedico port=5432 user=postgres password=12345") or 
		die("Error de Conexion".pg_last_error());	
		$consulta="SELECT sp_registrarcuidador('$nombre','$apellido','$edad','$correo','$usuario','$clave');";
		if($consulta!=null){
			$resultado=pg_query($con,$consulta);
			while(($registro=pg_fetch_array($resultado))){
				$json['usuario'][]=$registro;
			}
			pg_close($con);
			echo json_encode($json);
		}else{
			$resulta["Mensaje"]='faltan llenar campos';
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