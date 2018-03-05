<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Configuracoesmodel extends CI_Model {
	// variavels
	public $nome_base = null; 
	public $caminho_backup = null;
	public $caminho_logs = null;

	public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->dbutil();
    }

    public function VerificaTabela() {
    	if(!$this->dbutil->database_exists('automation')) {
    		$this->db->query('CREATE DATABASE IF NOT EXISTS automation');
    		$sql = "CREATE TABLE IF NOT EXISTS `automation`.`config` (
						`id` INT NOT NULL AUTO_INCREMENT,
						`nome_base` VARCHAR(15) NULL,
						`caminho_backup` VARCHAR(120) NULL,
						`caminho_logs` VARCHAR(120) NULL,
						PRIMARY KEY(`id`)
    				)";

    		$this->db->query($sql);

    		return 1;
    	}else {
    		return 0;
    	}
    }

    public function CriaArquivo() {
        $dados = $this->CarregaConfig();

        $arquivo = fopen($dados[0]->caminho_backup."/".$dados[0]->nome_base.".sql",'wb');

        if(!$arquivo) {

        }else{
            fwrite($arquivo, trim("-- Criação do DataBase"."\r\nCREATE DATABASE " .$dados[0]->nome_base.";"));
            fwrite($arquivo,"\r\n\r\n-- Usando o ".$dados[0]->nome_base."\r\nUSE ".$dados[0]->nome_base.";");
            fclose($arquivo);
        }
    }

    public function GravaArquivo() {
        $dados = $this->CarregaConfig();

        $data = array(
                    'nameTable' => $this->input->post('nameTable'),
                    'nameAtributeType' => $this->input->post('nameAtributeType')
                );


        $nameAtributeType = $data['nameAtributeType'];
        $implode = str_replace("\r\n",",\r\n",$nameAtributeType);

        $arquivo = fopen($dados[0]->caminho_backup."/".$dados[0]->nome_base.".sql",'a');
        
        if(!$arquivo) {

        }else{
            fwrite($arquivo,"\r\n\r\n-- Criação da tabela ".$data['nameTable']."\r\nCREATE TABLE ".$data['nameTable']."(\r\nid".$data['nameTable']." int not null auto_increment".",\r\n".$implode.",\r\nPRIMARY KEY(id".$data['nameTable'].")"."\r\n);");
            fclose($arquivo);
        }
    }

    public function LigaForeign() {
        $dados = $this->CarregaConfig();

        $data = array(
                'nameTable' => $this->input->post('nameTable'),
                'Key' => $this->input->post('Key'),
                'tableReferences' => $this->input->post('tableReferences'),
                'keyReference' => $this->input->post('keyReference')
            );

        $arquivo = fopen($dados[0]->caminho_backup."/".$dados[0]->nome_base.".sql",'a');

        if(!$arquivo) {

        }else{
            fwrite($arquivo, "\r\n\r\n-- Ligando a Foreign key e Constraint \r\nALTER TABLE ".$data['nameTable']. " ADD CONSTRAINT FK_id_".$data['nameTable']." FOREIGN KEY(".$data['Key'].") REFERENCES ".$data['tableReferences']."(".$data['keyReference'].");");
            fclose($arquivo);
        }
    }

    public function gravaConfig() {
    	$config = array(
    				'nome_base' => $this->input->post('nome_base'),
    				'caminho_backup' => $this->input->post('caminho_backup'),
    				'caminho_logs' => $this->input->post('caminho_logs')
    			);
    	$this->db->insert('automation.config', $config);
    }

    public function atualizaConfig() {
    	$config = array(
    				'nome_base' => $this->input->post('nome_base'),
    				'caminho_backup' => $this->input->post('caminho_backup'),
    				'caminho_logs' => $this->input->post('caminho_logs')
    			);
    	$this->db->update('automation.config', $config);
    }

    public function CarregaConfig() {
    	$sql = "SELECT * FROM automation.config";
    	return $this->db->query($sql)->result();
    }

    public function CriaFuncao() {
        $sql = "
        CREATE PROCEDURE mysql.rename_db(IN old_db VARCHAR(100), IN new_db VARCHAR(100))
        BEGIN
            DECLARE current_table VARCHAR(100);
            DECLARE done INT DEFAULT 0;
            DECLARE old_tables CURSOR FOR select table_name from information_schema.tables where table_schema = old_db;
            DECLARE CONTINUE HANDLER FOR NOT FOUND SET done = 1;

            SET @output = CONCAT('DROP SCHEMA IF EXISTS ', new_db, ';'); 
            PREPARE stmt FROM @output;
            EXECUTE stmt;

            SET @output = CONCAT('CREATE SCHEMA IF NOT EXISTS ', new_db, ';');
            PREPARE stmt FROM @output;
            EXECUTE stmt;

            OPEN old_tables;
            REPEAT
                FETCH old_tables INTO current_table;
                IF NOT done THEN
                SET @output = CONCAT('alter table ', old_db, '.', current_table, ' rename ', new_db, '.', current_table, ';');
                PREPARE stmt FROM @output;
                EXECUTE stmt;

                END IF;
            UNTIL done END REPEAT;

            CLOSE old_tables;
        END
        ";

        $this->db->query("DROP PROCEDURE IF EXISTS mysql.rename_db");

        $this->db->query($sql);
    }

}
?>