<?php
class Paciente {
    private $db;
    private $table = 'pacientes';

    public function __construct($db) {
        $this->db = $db;
    }

    public function getAll() {
        $query = "SELECT * FROM " . $this->table;
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function create($data) {
        $query = "INSERT INTO " . $this->table . " (apellidos, primerNombre, fecha, sexo, peso, altura, vacunado) 
                  VALUES (:apellidos, :primerNombre, :fecha, :sexo, :peso, :altura, :vacunado)";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':apellidos', $data['apellidos']);
        $stmt->bindParam(':primerNombre', $data['primerNombre']);
        $stmt->bindParam(':fecha', $data['fecha']);
        $stmt->bindParam(':sexo', $data['sexo']);
        $stmt->bindParam(':peso', $data['peso']);
        $stmt->bindParam(':altura', $data['altura']);
        $stmt->bindParam(':vacunado', $data['vacunado']);
        return $stmt->execute();
    }

    public function update($data) {
        $query = "UPDATE " . $this->table . " SET apellidos = :apellidos, primerNombre = :primerNombre, fecha = :fecha, 
                  sexo = :sexo, peso = :peso, altura = :altura, vacunado = :vacunado WHERE pacienteID = :pacienteID";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':pacienteID', $data['pacienteID']);
        $stmt->bindParam(':apellidos', $data['apellidos']);
        $stmt->bindParam(':primerNombre', $data['primerNombre']);
        $stmt->bindParam(':fecha', $data['fecha']);
        $stmt->bindParam(':sexo', $data['sexo']);
        $stmt->bindParam(':peso', $data['peso']);
        $stmt->bindParam(':altura', $data['altura']);
        $stmt->bindParam(':vacunado', $data['vacunado']);
        return $stmt->execute();
    }

    public function delete($id) {
        $query = "DELETE FROM " . $this->table . " WHERE pacienteID = :pacienteID";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':pacienteID', $id);
        return $stmt->execute();
    }
}
