<?php

namespace App\Models;

use CodeIgniter\Model;

class PersonaModel extends Model {
    protected $table = 'persona'; // Nombre de la tabla
    protected $primaryKey = 'nroDni'; // Clave primaria

    // Campos permitidos para inserción y actualización
    protected $allowedFields = [
        'nroDni', 'apellido', 'nombre', 'fechaNacimiento', 'telefono', 'domicilio'
    ];

    // Habilitar el uso de timestamps si es necesario
    // protected $useTimestamps = true;
    
    // Opcionalmente, definir el formato de retorno (array u objeto)
    protected $returnType = 'array';

    // Reglas de validación opcionales
    protected $validationRules = [
        'nroDni' => 'required|max_length[10]',
        'apellido' => 'required|max_length[50]',
        'nombre' => 'required|max_length[50]',
        'fechaNacimiento' => 'required|valid_date',
        'telefono' => 'required|max_length[20]',
        'domicilio' => 'required|max_length[200]'
    ];

    protected $validationMessages = [
        'nroDni' => [
            'required' => 'El número de DNI es obligatorio.',
            'max_length' => 'El número de DNI no puede exceder los 10 caracteres.'
        ],
        // Añadir mensajes personalizados para otros campos si es necesario
    ];
}

