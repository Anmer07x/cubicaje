<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
	require_once FCPATH . '/vendor/autoload.php';
	/**
	 * Mongodb class
	 * 
	 */
	class Mongodb
	{
		
		function __construct()
		{
			$this->ci = &get_instance();
			//BUSCAR EL ARCHIVO DE CONFIGURACIÓN
			$this->ci->load->config("mongodb");
			$host = $this->ci->config->item('host');
			$port = $this->ci->config->item('port');
			$username = $this->ci->config->item('username');
			$password = $this->ci->config->item('password');
			$dbname = $this->ci->config->item("database");
			$authenticate = $this->ci->config->item('authenticate');
			try {
				if($authenticate === TRUE) {
					$this->ci->conn = new MongoDB\Client("mongodb://$username:$password@$host:$port/$this->dbname?retryWrites=true&w=majority");
					$this->db = $this->ci->conn->$dbname;
				} else {

					$this->ci->conn = new MongoDB\Client("mongodb://$host:$port/$dbname");
					$this->db = $this->ci->conn->$dbname;

				}
			} catch(MongoDB\Driver\Exception\MongoConnectionException $ex) {
				show_error('No se puede conectar a Mongo:' . $ex->getMessage(), 500);
			}
		}

		function connect() {
			return $this->ci->conn;
		}

		function db(){
			return $this->db;
		}

		public function getObjetId($id){
			return new MongoDB\BSON\ObjectId($id);
		}
	}