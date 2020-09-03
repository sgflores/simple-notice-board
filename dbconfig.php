<?php

	class DBConfig {

	
		//BEGIN DB
		public static function DB(){

			try{	

				//default localhost mysql
                return new PDO("mysql:host=localhost;dbname=notice_board", 'root', '' );


			}catch(PDOException $ex){

				die("<h1> SERVER DOWN!!!!! CONNECTING TO database failed....</h1>".$ex);
			}

		}
		//END DB

	}

?>