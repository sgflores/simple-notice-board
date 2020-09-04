<?php

	require_once( realpath(dirname(__FILE__) . '/../dbconfig.php') );
	
	class BaseModel {

		protected $db;

		protected $table;

		public function __construct($table)
		{
			$this->table = $table;
			$this->db = DBConfig::DB();

		}
		
        public function all($columns = ['*'], $params = [], $orderBy = ['id' => 'desc']){

            try{

				$columns = implode(',', $columns);

				$sql = "SELECT {$columns} FROM {$this->table} ";
				
				$whereClause = [];

				if (count($params) > 0) {
			
					foreach($params as $key => $val) {
						$whereClause [] = $key . ' = ?'; // column1 = ?
					}
					$whereClause = implode(' and ', $whereClause); // column1 = ? and column2 = ?, etc...
					$sql = $sql . " WHERE {$whereClause} ";

				}

				$orderClause = [];
				foreach($orderBy as $key => $val) {
					$orderClause [] = $key . ' ' . $val; // id desc
				}
				$orderClause = implode(', ', $orderClause); // id desc, name desc, etc...

				$sql = $sql . " ORDER BY {$orderClause} ";

                $cmd = $this->db->prepare($sql);

                $cmd->execute(array_values($params));

                $result = $cmd->fetchAll(PDO::FETCH_ASSOC);

                return $result;

            }catch(Exception $ex){
                return $ex;
            }

		}
		
		
        public function save($params = []){

            try{

				if (count($params) == 0) {
					return 'error';
				}

				$columns = implode(', ', array_keys($params)); // name, content, etc...
				$fillable = implode(', ', array_fill_keys(array_keys($params), '?')); // ?, ?, ?

				$sql = "INSERT INTO  {$this->table} ( {$columns} ) VALUES ( {$fillable} )";
				   
				$cmd = $this->db->prepare($sql);

                $cmd->execute(array_values($params));

                $cmd->fetchAll(PDO::FETCH_ASSOC);
                
                $id = $this->db->lastInsertId();

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