<?php

namespace App\Models;

use CodeIgniter\Model;

class AutoModel extends Model {
    protected $table = 'auto'; // Nombre de la tabla
    protected $primaryKey = 'patente'; // Clave primaria

    // Campos permitidos para inserción y actualización
    protected $allowedFields = ['patente', 'marca', 'modelo', 'dniDuenio'];

    // Habilitar el uso de timestamps si es necesario
    // protected $useTimestamps = true;
    
    // Opcionalmente, definir el formato de retorno (array u objeto)
    protected $returnType = 'array';

    // Obtener el dueño de un auto
    public function getDuenio($dniDuenio) {
        $personaModel = new PersonaModel();
        return $personaModel->find($dniDuenio); // Retorna la información del dueño
    }

    // Reglas de validación opcionales
    protected $validationRules = [
        'patente' => 'required|max_length[10]',
        'marca' => 'required|max_length[50]',
        'modelo' => 'required|integer',
        'dniDuenio' => 'required|max_length[10]'
    ];

    protected $validationMessages = [
        'patente' => [
            'required' => 'La patente es obligatoria.',
            'max_length' => 'La patente no puede exceder los 10 caracteres.'
        ],
        // Añadir mensajes personalizados para otros campos si es necesario
    ];
}
