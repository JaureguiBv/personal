<?php
require_once 'models/Paciente.php';

class PacienteController {
    private $model;

    public function __construct($db) {
        $this->model = new Paciente($db);
    }

    public function index() {
        return $this->model->getAll();
    }

    public function store($data) {
        if ($this->model->create($data)) {
            return "Paciente agregado correctamente.";
        } else {
            return "Error al agregar el paciente.";
        }
    }

    public function update($data) {
        if ($this->model->update($data)) {
            return "Paciente actualizado correctamente.";
        } else {
            return "Error al actualizar el paciente.";
        }
    }

    public function destroy($id) {
        if ($this->model->delete($id)) {
            return "Paciente eliminado correctamente.";
        } else {
            return "Error al eliminar el paciente.";
        }
    }
}
