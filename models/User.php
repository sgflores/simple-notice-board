<?php

    require_once( realpath(dirname(__FILE__) . '/BaseModel.php') );

    class User extends BaseModel{

        public function __construct()
        {
            parent::__construct('users');
        }

        public function login($email, $pword){

            try{

                $result = parent::all(['*'], ['email' => $email, 'pword' => md5($pword)]);

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
