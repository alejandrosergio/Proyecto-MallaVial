<?php 

	class Connection
	{

		private $server;
		private $username;
		private $password;
		private $databasename;
		protected $conection;
		
		function __construct()
		{
			$this->SetDataConnection();
			$this->establishConnection();
		}

        protected function SetDataConnection()
        {

			require('DataConnection.php');
			$this->server=$server;
			$this->username=$username;
			$this->password=$password;
			$this->databasename=$databasename;

		}

        protected function establishConnection()
        {

			$this->conection = mysqli_connect($this->server,$this->username,$this->password,$this->databasename);

            if (!$this->conection)
            {
                exit('Error con la conexion a la base de datos');
			}else{
				//echo("Se conecto exitosamente <br>");
			}
			return $this->conection;
			
		}
    }
?>