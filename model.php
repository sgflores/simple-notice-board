<?php

    require_once( realpath(dirname(__FILE__) . '/dbconfig.php') );
    
	class User {

		public function login($email, $pword){

			try{

                $db = DBConfig::DB();

				$sql = "SELECT id FROM users WHERE email=? and pword=?";

				$cmd = $db->prepare($sql);

				$cmd->execute(array($email, md5($pword)));

                $result = $cmd->fetchAll(PDO::FETCH_ASSOC);
                
				$db = null;

				if( count($result) > 0 ){
					return $result[0]['id'];
				}else{
					return -1;
				}

			}catch(Exception $ex){
				return $ex;
			}


		}

	}

	
	class Story {

		public function all(){

			try{

                $db = DBConfig::DB();

				$sql = "SELECT * FROM stories;";

				$cmd = $db->prepare($sql);

				$cmd->execute(array());

				$result = $cmd->fetchAll(PDO::FETCH_ASSOC);
				
				return $result;

			}catch(Exception $ex){
				return $ex;
			}


		}

		public function save($name, $content){

			try{

                $db = DBConfig::DB();

				$sql = "INSERT INTO stories (name, content) VALUES (?, ?)";

				$cmd = $db->prepare($sql);

				$cmd->execute(array($name, $content));

				$cmd->fetchAll(PDO::FETCH_ASSOC);
				
				$id = $db->lastInsertId();

				$db = null;

				if( $id > 0 ){
					return 'success';
				}else{
					return 'error';
				}

			}catch(Exception $ex){
				return $ex;
			}


		}

	}


?>