<?php

namespace App\Controllers;

use App\Models\PersonaModel;
use App\Models\AutoModel;

class ABM extends BaseController
{
    // Atributos
    private $mensajeError;

    // Constructor
    public function __construct()
    {
        $this->mensajeError = "";
    }

    // Observadores
    public function getMensajeError()
    {
        return $this->mensajeError;
    }

    // Modificadores
    public function setMensajeError($mensajeError)
    {
        $this->mensajeError = $mensajeError;
    }
    

    // Función para listar personas
    public function listarPersonas($datos = "")
    {
        $personaModel = new PersonaModel();
        if (!empty($datos)) {
            // Si se pasan datos, filtra por ellos
            $personas = $personaModel->where($datos)->findAll();
        } else {
            // Si no se pasan datos, obtiene todas las personas
            $personas = $personaModel->findAll();
        }
        return view('listaPersonas', ['personas' => $personas]);
    }


    // Función para listar autos
public function listarAutos($datos = "") {
    $autoModel = new AutoModel();

    if (!empty($datos)) {
        $autos = $autoModel->where($datos)->findAll();
    } else {
        $autos = $autoModel->findAll();
    }   
    return $autos;
}


    // Función para listar autos con NOMBRE Y APELLIDO DEL DUEÑO

    public function listarAutosConDuenio($datos = "") {
        $autoModel = new AutoModel();
        $personaModel = new PersonaModel(); // Instancia del modelo PersonaModel
    
        if (!empty($datos)) {
            $autos = $autoModel->where($datos)->findAll();
        } else {
            $autos = $autoModel->findAll();
        }   
    
        // Agrega información del dueño a cada auto
        foreach ($autos as &$auto) {
            $duenio = $personaModel->find($auto['dniDuenio']);
            $auto['duenio'] = $duenio;
        }

        return view('verAutos', ['autos' => $autos]);
    }

    // Función para buscar una persona por DNI
    public function buscarPersona($datos)
    {
        $personaModel = new PersonaModel();
        if (isset($datos['nroDni'])) {
            $persona = $personaModel->where('nroDni', $datos['nroDni'])->first();
            return $persona ? $persona : null;
        }
        return null;
    }


    public function autosPersona()
    {
        $dni = $this->request->getPost('dni');

        if ($dni) {
            $persona = $this->buscarPersona(['nroDni' => $dni]);

            if ($persona) {
                $autosPersona = $this->listarAutos(['dniDuenio' => $dni]);

                return view('autosPersona', [
                    'persona' => $persona,
                    'autos' => $autosPersona, 
                ]);
            } else {
                return view('autosPersona', [
                    'error' => 'El DNI proporcionado no se encuentra registrado.',
                ]);
            }
        } else {
            return view('autosPersona', [
                'error' => 'No se ha enviado un DNI válido.',
            ]);
        }
    }
}
