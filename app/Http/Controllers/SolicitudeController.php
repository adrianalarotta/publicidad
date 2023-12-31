<?php

namespace App\Http\Controllers;

use App\Models\Solicitude;
use Illuminate\Http\Request;
use App\Http\Controllers\Persona;
use App\Http\Controllers\MovileController;
use App\Models\Movile;
use App\Models\Valla;
use App\Models\comerciales;
use App\Models\Inmobiliarios;
use App\Models\Tipocolombina;
use App\Models\Pendones;
use App\Models\Murales;
use App\Models\Pasacalles;
use App\Models\Aerea;

use App\Http\Controllers\vallaController;

class SolicitudeController extends Controller
{
    //
    public function index()
    {
        $solicitudes = Solicitude::all();
        return view('solicitudes.index', compact('solicitudes'));
    }

    public function registro()
    {
        return view('solicitudes.registro');
    }

    public function movil()
    {
        return view('solicitudes.movil');
    }

    public function valla()
    {
        return view('solicitudes.valla');
    }

    public function comerciales()
    {
        return view('solicitudes.comerciales');
    }

    public function inmobiliarios()
    {
        return view('solicitudes.inmobiliarios');
    }

    public function tipocolombina()
    {
        return view('solicitudes.tipocolombina');
    }

    public function pendones()
    {
        return view('solicitudes.pendones');
    }

    public function murales()
    {
        return view('solicitudes.murales');
    }

    public function Pasacalles()
    {
        return view('solicitudes.Pasacalles');
    }

    public function aerea()
    {
        return view('solicitudes.aerea');
    }


    public function store(Request $request)
    {


        $solicitude = new Solicitude;
        $solicitude->nombre = $request->nombre;
        $solicitude->apellido = $request->apellido;
        $solicitude->tipo_documento = $request->tipo_documento;
        $solicitude->numero_documento = $request->documento;
        $solicitude->tipo_persona = $request->tipopersona;
        $solicitude->Razon_Social_Responsable = $request->Razon_Social_Responsable;
        $solicitude->telefono = $request->telefono;
        $solicitude->correo_electronico = $request->correo;
        $solicitude->direccion = $request->direccion;
        $solicitude->save();

        if ($request->tipo == 'movil') {

            $movile = new Movile;
            
            $movile->tipo_solicitud = $request->tipo_solicitud;
            $movile->fecha_de_instalacion = $request->fecha_de_instalacion;
            $movile->numero_de_vehiculos = $request->numero_de_vehiculos;
            $movile->placa = $request->placa;
            $movile->tipo_de_vehiculo = $request->tipo_de_vehiculo;
            $movile->Lateral_izquierdo = $request->Lateral_izquierdo;
            $movile->Lateral_derecho = $request->Lateral_derecho;
            $movile->Posterior = $request->Posterior;
            $movile->Area_Total = $request->Area_Total;
            $movile->persona_id = $solicitude->id;

            $fotomontaje = $request->file('fotomontaje')->storeAs('documentos_puex', 'MONTAJE-' . $solicitude->id . '.pdf');
            $fotomontaje = 'storage/' . $fotomontaje;
            
            $Camara_de_comercio = $request->file('Camara_de_comercio')->storeAs('documentos_puex', 'Camara_de_comercio-' . $solicitude->id . '.pdf');
            $Camara_de_comercio= 'storage/' . $Camara_de_comercio;
            
            $RUT = $request->file('RUT')->storeAs('documentos_puex', 'RUT-' . $solicitude->id . '.pdf');
            $RUT= 'storage/' . $RUT;

            $Tarjeta_de_propiedad = $request->file('Tarjeta_de_propiedad')->storeAs('documentos_puex', 'Tarjeta_de_propiedad-' . $solicitude->id . '.pdf');
            $Tarjeta_de_propiedad= 'storage/' . $Tarjeta_de_propiedad;

            $Carta_escrita_de_solicitud = $request->file('Carta_escrita_de_solicitud')->storeAs('documentos_puex', 'Carta_escrita_de_solicitud-' . $solicitude->id . '.pdf');
            $Carta_escrita_de_solicitud= 'storage/' . $Carta_escrita_de_solicitud;
            
    

            $movile->fotomontaje = $fotomontaje;
            $movile->Camara_de_comercio = $Camara_de_comercio;
            $movile->RUT = $RUT;
            $movile->Tarjeta_de_propiedad = $Tarjeta_de_propiedad;
            $movile->Carta_escrita_de_solicitud = $Carta_escrita_de_solicitud;
            
            
            if ($request->hasFile('permiso_anterior')) {
                $permiso_anterior = $request->file('permiso_anterior')->storeAs('documentos_puex', 'permiso_anterior-' . $solicitude->id . '.pdf');
                $permiso_anterior= 'storage/' . $permiso_anterior;
            
                $movile->permiso_anterior = $permiso_anterior;
            } else {
                // Manejo de error o mensaje indicando que no se seleccionó ningún archivo
                //$mensaje = "no se envio!";
                //dump($mensaje);

            }
            
            $movile->save();
    
        }

        if ($request->tipo == 'vallas') {
            
            $valla = new Valla;
            $valla->tipo_solicitud = $request->tipo_solicitud;
            $valla->fecha_de_instalacion = $request->fecha_de_instalacion;
            $valla->fecha_de_retiro = $request->fecha_de_retiro;
            $valla->tipo_valla = $request->tipo_valla;
            $valla->direccion = $request->direccion;
            $valla->Numero_de_caras = $request->Numero_de_caras;
            $valla->Ancho = $request->Ancho;
            $valla->Alto = $request->Alto;
            $valla->Area_total = $request->Area_total;
            $valla->persona_id = $solicitude->id;

            $fotomontaje = $request->file('fotomontaje')->storeAs('documentos_puex', 'MONTAJE-' . $solicitude->id . '.pdf');
            $fotomontaje = 'storage/' . $fotomontaje;
            
            $Camara_de_comercio = $request->file('Camara_de_comercio')->storeAs('documentos_puex', 'Camara_de_comercio-' . $solicitude->id . '.pdf');
            $Camara_de_comercio= 'storage/' . $Camara_de_comercio;
            
            $Certificado_de_libertad = $request->file('Certificado_de_libertad')->storeAs('documentos_puex', 'Certificado_de_libertad-' . $solicitude->id . '.pdf');
            $Certificado_de_libertad = 'storage/' . $Certificado_de_libertad;

            $Autorizacion = $request->file('Autorizacion')->storeAs('documentos_puex', 'Autorizacion-' . $solicitude->id . '.pdf');
            $Autorizacion= 'storage/' . $Autorizacion;

            $Carta_escrita_de_solicitud = $request->file('Carta_escrita_de_solicitud')->storeAs('documentos_puex', 'Carta_escrita_de_solicitud-' . $solicitude->id . '.pdf');
            $Carta_escrita_de_solicitud= 'storage/' . $Carta_escrita_de_solicitud;
            
           

            $valla->fotomontaje = $fotomontaje;
            $valla->Camara_de_comercio = $Camara_de_comercio;
            $valla->Certificado_de_libertad = $Certificado_de_libertad;
            $valla->Autorizacion = $Autorizacion;
            $valla->Carta_escrita_de_solicitud = $Carta_escrita_de_solicitud;
            

            if ($request->hasFile('permiso_anterior')) {
                $permiso_anterior = $request->file('permiso_anterior')->storeAs('documentos_puex', 'permiso_anterior-' . $solicitude->id . '.pdf');
                $permiso_anterior= 'storage/' . $permiso_anterior;
            
                $valla->permiso_anterior = $permiso_anterior;
            } else {
                // Manejo de error o mensaje indicando que no se seleccionó ningún archivo
                //$mensaje = "no se envio!";
                //dump($mensaje);

            }
            
            
            $valla->save();
        }

        if ($request->tipo == 'comerciales') {
            $comerciales = new Comerciales;
            $comerciales->tipo_solicitud = $request->tipo_solicitud;
            $comerciales->fecha_de_instalacion = $request->fecha_de_instalacion;
            $comerciales->direccion = $request->direccion;
            $comerciales->numero_de_elementos = $request->numero_de_elementos;
            $comerciales->Ancho = $request->Ancho;
            $comerciales->Alto = $request->Alto;
            $comerciales->Area_total = $request->Area_total;
            $comerciales->Ancho_fachada = $request->Ancho_fachada;
            $comerciales->Alto_fachada = $request->Alto_fachada;
            $comerciales->Area_Total_fachada = $request->Area_Total_fachada;
            $comerciales->persona_id = $solicitude->id;

            $fotomontaje = $request->file('fotomontaje')->storeAs('documentos_puex', 'MONTAJE-' . $solicitude->id . '.pdf');
            $fotomontaje = 'storage/' . $fotomontaje;
            
            $Camara_de_comercio = $request->file('Camara_de_comercio')->storeAs('documentos_puex', 'Camara_de_comercio-' . $solicitude->id . '.pdf');
            $Camara_de_comercio= 'storage/' . $Camara_de_comercio;
            

            $Carta_escrita_de_solicitud = $request->file('Carta_escrita_de_solicitud')->storeAs('documentos_puex', 'Carta_escrita_de_solicitud-' . $solicitude->id . '.pdf');
            $Carta_escrita_de_solicitud= 'storage/' . $Carta_escrita_de_solicitud;
            
    

            $comerciales->fotomontaje = $fotomontaje;
            $comerciales->Camara_de_comercio = $Camara_de_comercio;
            $comerciales->Carta_escrita_de_solicitud = $Carta_escrita_de_solicitud;
            
            
            if ($request->hasFile('permiso_anterior')) {
                $permiso_anterior = $request->file('permiso_anterior')->storeAs('documentos_puex', 'permiso_anterior-' . $solicitude->id . '.pdf');
                $permiso_anterior= 'storage/' . $permiso_anterior;
            
                $comerciales->permiso_anterior = $permiso_anterior;
            } else {
                // Manejo de error 
            }
            

            $comerciales->save();


            
        }

        if ($request->tipo == 'inmobiliarios') {

            $inmobiliarios = new Inmobiliarios;
            $inmobiliarios->tipo_solicitud = $request->tipo_solicitud;
            $inmobiliarios->fecha_de_instalacion = $request->fecha_de_instalacion;
            $inmobiliarios->fecha_de_retiro = $request->fecha_de_retiro;
            $inmobiliarios->direccion = $request->direccion;
            $inmobiliarios->Largo_predio = $request->Largo_predio;
            $inmobiliarios->Ancho_predio = $request->Ancho_predio;
            $inmobiliarios->Area_total_predio = $request->Area_total_predio;
            
            
                    $inmobiliarios->numero_de_elemento_valla = $request->numero_de_elemento_valla;
                    $inmobiliarios->Alto_valla = $request->Alto_valla;
                    $inmobiliarios->Ancho_valla = $request->Ancho_valla;
                    $inmobiliarios->Area_total_valla = $request->Area_total_valla;
                    
                    $inmobiliarios->numero_de_elementos_aviso = $request->numero_de_elementos_aviso;
                    $inmobiliarios->alto_aviso = $request->Alto_aviso;
                    $inmobiliarios->ancho_aviso = $request->Ancho_aviso;
                    $inmobiliarios->area_total_aviso = $request->Area_total_aviso;
                   
                    $inmobiliarios->numero_de_encerramiento = $request->numero_de_encerramiento;
                    $inmobiliarios->alto_encerramiento = $request->Alto_encerramiento;
                    $inmobiliarios->ancho_encerramiento = $request->Ancho_encerramiento;
                    $inmobiliarios->area_total_encerramiento = $request->Area_Total_encerramiento;
                    
                    $inmobiliarios->otros = $request->otro;
                    $inmobiliarios->numero_de_elementos_otro = $request->numero_de_elementos_otro;
                    $inmobiliarios->Alto_otro = $request->Alto_otro;
                    $inmobiliarios->ancho_otro = $request->Ancho_otro;
                    $inmobiliarios->area_total_otro = $request->Area_Total_otro;
                    


            $inmobiliarios->persona_id = $solicitude->id;
            $fotomontaje = $request->file('fotomontaje')->storeAs('documentos_puex', 'MONTAJE-' . $solicitude->id . '.pdf');
            $fotomontaje = 'storage/' . $fotomontaje;
            
            $Camara_de_comercio = $request->file('Camara_de_comercio')->storeAs('documentos_puex', 'Camara_de_comercio-' . $solicitude->id . '.pdf');
            $Camara_de_comercio= 'storage/' . $Camara_de_comercio;
            
            $RUT = $request->file('RUT')->storeAs('documentos_puex', 'RUT-' . $solicitude->id . '.pdf');
            $RUT= 'storage/' . $RUT;

            $Licencia_de_construcion = $request->file('Licencia_de_construcion')->storeAs('documentos_puex', 'Licencia_de_construcion-' . $solicitude->id . '.pdf');
            $Licencia_de_construcion= 'storage/' . $Licencia_de_construcion;

            $Carta_escrita_de_solicitud = $request->file('Carta_escrita_de_solicitud')->storeAs('documentos_puex', 'Carta_escrita_de_solicitud-' . $solicitude->id . '.pdf');
            $Carta_escrita_de_solicitud= 'storage/' . $Carta_escrita_de_solicitud;
            
    

            $inmobiliarios->fotomontaje = $fotomontaje;
            $inmobiliarios->Camara_de_comercio = $Camara_de_comercio;
            $inmobiliarios->RUT = $RUT;
            $inmobiliarios->Licencia_de_construcion = $Licencia_de_construcion;
            $inmobiliarios->Carta_escrita_de_solicitud = $Carta_escrita_de_solicitud;
            
            
            if ($request->hasFile('permiso_anterior')) {
                $permiso_anterior = $request->file('permiso_anterior')->storeAs('documentos_puex', 'permiso_anterior-' . $solicitude->id . '.pdf');
                $permiso_anterior= 'storage/' . $permiso_anterior;
            
                $inmobiliarios->permiso_anterior = $permiso_anterior;
            } else {
                // Manejo de error o mensaje indicando que no se seleccionó ningún archivo

            }
            $inmobiliarios->save();
            
        }


        if ($request->tipo == 'tipocolombina') {
            $tipocolombina = new Tipocolombina;
            $tipocolombina->tipo_solicitud = $request->tipo_solicitud;
            $tipocolombina->fecha_de_instalacion = $request->fecha_de_instalacion;
            $tipocolombina->direccion = $request->direccion;
            $tipocolombina->numero_de_elementos = $request->numero_de_elementos;
            $tipocolombina->Ancho = $request->Ancho;
            $tipocolombina->Alto = $request->Alto;
            $tipocolombina->Area_Total = $request->Area_Total;
            $tipocolombina->persona_id = $solicitude->id;

            $fotomontaje = $request->file('fotomontaje')->storeAs('documentos_puex', 'MONTAJE-' . $solicitude->id . '.pdf');
            $fotomontaje = 'storage/' . $fotomontaje;
            
            $Camara_de_comercio = $request->file('Camara_de_comercio')->storeAs('documentos_puex', 'Camara_de_comercio-' . $solicitude->id . '.pdf');
            $Camara_de_comercio= 'storage/' . $Camara_de_comercio;
            

            $Carta_escrita_de_solicitud = $request->file('Carta_escrita_de_solicitud')->storeAs('documentos_puex', 'Carta_escrita_de_solicitud-' . $solicitude->id . '.pdf');
            $Carta_escrita_de_solicitud= 'storage/' . $Carta_escrita_de_solicitud;
            
    

            $tipocolombina->fotomontaje = $fotomontaje;
            $tipocolombina->Camara_de_comercio = $Camara_de_comercio;
            $tipocolombina->Carta_escrita_de_solicitud = $Carta_escrita_de_solicitud;
            
            
            if ($request->hasFile('permiso_anterior')) {
                $permiso_anterior = $request->file('permiso_anterior')->storeAs('documentos_puex', 'permiso_anterior-' . $solicitude->id . '.pdf');
                $permiso_anterior= 'storage/' . $permiso_anterior;
            
                $tipocolombina->permiso_anterior = $permiso_anterior;
            } else {
                // Manejo de error 
            }
            

            $tipocolombina->save();


            
        }


        if ($request->tipo == 'pendones') {

            $pendones = new Pendones;
            // Asignar los valores del formulario a las propiedades del modelo

            $pendones->fecha_de_instalacion = $request->fecha_de_instalacion;
            $pendones->fecha_de_retiro = $request->fecha_de_retiro;
            $pendones->direccion = $request->direccion;
            $pendones->numero_de_elementos = $request->numero_de_elementos;
            $pendones->ancho = $request->Ancho;
            $pendones->alto = $request->Alto;
            $pendones->area_total = $request->Area_Total;
            $pendones->persona_id = $solicitude->id;
            // Guardar el modelo en la base de datos
            $fotomontaje = $request->file('fotomontaje')->storeAs('documentos_puex', 'MONTAJE-' . $solicitude->id . '.pdf');
            $fotomontaje = 'storage/' . $fotomontaje;
            
            $Camara_de_comercio = $request->file('Camara_de_comercio')->storeAs('documentos_puex', 'Camara_de_comercio-' . $solicitude->id . '.pdf');
            $Camara_de_comercio= 'storage/' . $Camara_de_comercio;
            

            $Carta_escrita_de_solicitud = $request->file('Carta_escrita_de_solicitud')->storeAs('documentos_puex', 'Carta_escrita_de_solicitud-' . $solicitude->id . '.pdf');
            $Carta_escrita_de_solicitud= 'storage/' . $Carta_escrita_de_solicitud;
            
    

            $pendones->fotomontaje = $fotomontaje;
            $pendones->Camara_de_comercio = $Camara_de_comercio;
            $pendones->Carta_escrita_de_solicitud = $Carta_escrita_de_solicitud;
            
            
            if ($request->hasFile('permiso_anterior')) {
                $permiso_anterior = $request->file('permiso_anterior')->storeAs('documentos_puex', 'permiso_anterior-' . $solicitude->id . '.pdf');
                $permiso_anterior= 'storage/' . $permiso_anterior;
            
                $pendones->permiso_anterior = $permiso_anterior;
            } else {
                // Manejo de error 
            }
            

            $pendones->save();
            
        }

        if ($request->tipo == 'murales') {
            $murales = new Murales;
            $murales->tipo_solicitud = $request->tipo_solicitud;
            $murales->fecha_de_instalacion = $request->fecha_de_instalacion;
            $murales->direccion = $request->direccion;
            $murales->Ancho = $request->Ancho;
            $murales->Alto = $request->Alto;
            $murales->Area_total = $request->Area_total;
            $murales->persona_id = $solicitude->id;
            
            $fotomontaje = $request->file('fotomontaje')->storeAs('documentos_puex', 'MONTAJE-' . $solicitude->id . '.pdf');
            $fotomontaje = 'storage/' . $fotomontaje;
            
            $Camara_de_comercio = $request->file('Camara_de_comercio')->storeAs('documentos_puex', 'Camara_de_comercio-' . $solicitude->id . '.pdf');
            $Camara_de_comercio= 'storage/' . $Camara_de_comercio;
            
            $Certificado_de_libertad = $request->file('Certificado_de_libertad')->storeAs('documentos_puex', 'Certificado_de_libertad-' . $solicitude->id . '.pdf');
            $Certificado_de_libertad= 'storage/' . $Certificado_de_libertad;

            $Permiso = $request->file('Permiso')->storeAs('documentos_puex', 'Permiso-' . $solicitude->id . '.pdf');
            $Permiso= 'storage/' . $Permiso;

            $Carta_escrita_de_solicitud = $request->file('Carta_escrita_de_solicitud')->storeAs('documentos_puex', 'Carta_escrita_de_solicitud-' . $solicitude->id . '.pdf');
            $Carta_escrita_de_solicitud= 'storage/' . $Carta_escrita_de_solicitud;
            
    

            $murales->fotomontaje = $fotomontaje;
            $murales->Camara_de_comercio = $Camara_de_comercio;
            $murales->Certificado_de_libertad = $Certificado_de_libertad;
            $murales->Permiso = $Permiso;
            $murales->Carta_escrita_de_solicitud = $Carta_escrita_de_solicitud;
            
            
            if ($request->hasFile('permiso_anterior')) {
                $permiso_anterior = $request->file('permiso_anterior')->storeAs('documentos_puex', 'permiso_anterior-' . $solicitude->id . '.pdf');
                $permiso_anterior= 'storage/' . $permiso_anterior;
            
                $murales->permiso_anterior = $permiso_anterior;
            } else {
                // Manejo de error o mensaje indicando que no se seleccionó ningún archivo

            }
            
            $murales->save();
            
        }

        if ($request->tipo == "Pasacalles") {
            $pasacalles = new Pasacalles;
            $pasacalles->tipo_solicitud = $request->tipo_solicitud;
            $pasacalles->fecha_de_instalacion = $request->fecha_de_instalacion;
            $pasacalles->fecha_de_retiro = $request->fecha_de_retiro;
            $pasacalles->numero_de_elementos = $request->numero_de_elementos;
            $pasacalles->Ancho = $request->Ancho;
            $pasacalles->Alto = $request->Alto;
            $pasacalles->direccion = $request->direccion;
            $pasacalles->Area_total = $request->Area_total;
            $pasacalles->persona_id = $solicitude->id;

            $fotomontaje = $request->file('fotomontaje')->storeAs('documentos_puex', 'MONTAJE-' . $solicitude->id . '.pdf');
            $fotomontaje = 'storage/' . $fotomontaje;
            
            $Personeria_juridica = $request->file('Personeria_juridica')->storeAs('documentos_puex', 'Personeria_juridica-' . $solicitude->id . '.pdf');
            $Personeria_juridica= 'storage/' . $Personeria_juridica;
            

            $Carta_escrita_de_solicitud = $request->file('Carta_escrita_de_solicitud')->storeAs('documentos_puex', 'Carta_escrita_de_solicitud-' . $solicitude->id . '.pdf');
            $Carta_escrita_de_solicitud= 'storage/' . $Carta_escrita_de_solicitud;
            
    

            $pasacalles->fotomontaje = $fotomontaje;
            $pasacalles->Personeria_juridica = $Personeria_juridica;
            $pasacalles->Carta_escrita_de_solicitud = $Carta_escrita_de_solicitud;
            
            
            if ($request->hasFile('permiso_anterior')) {
                $permiso_anterior = $request->file('permiso_anterior')->storeAs('documentos_puex', 'permiso_anterior-' . $solicitude->id . '.pdf');
                $permiso_anterior= 'storage/' . $permiso_anterior;
            
                $murales->permiso_anterior = $permiso_anterior;
            } else {
                // Manejo de error o mensaje indicando que no se seleccionó ningún archivo

            }
            
            $pasacalles->save();
        }

        if ($request->tipo == "Aerea") {
            $aerea = new Aerea;
            $aerea->tipo_solicitud = $request->tipo_solicitud;
            $aerea->fecha_de_instalacion = $request->fecha_de_instalacion;
            $aerea->fecha_de_retiro = $request->fecha_de_retiro;
            $aerea->Ancho = $request->Ancho;
            $aerea->Alto = $request->Alto;
            $aerea->direccion = $request->direccion;
            $aerea->Area_total = $request->Area_total;
            $aerea->persona_id = $solicitude->id;
            
            $fotomontaje = $request->file('fotomontaje')->storeAs('documentos_puex', 'MONTAJE-' . $solicitude->id . '.pdf');
            $fotomontaje = 'storage/' . $fotomontaje;
            
            $Camara_de_comercio = $request->file('Camara_de_comercio')->storeAs('documentos_puex', 'Camara_de_comercio-' . $solicitude->id . '.pdf');
            $Camara_de_comercio= 'storage/' . $Camara_de_comercio;
            
        
            $Carta_escrita_de_solicitud = $request->file('Carta_escrita_de_solicitud')->storeAs('documentos_puex', 'Carta_escrita_de_solicitud-' . $solicitude->id . '.pdf');
            $Carta_escrita_de_solicitud= 'storage/' . $Carta_escrita_de_solicitud;
            
    

            $aerea->fotomontaje = $fotomontaje;
            $aerea->Camara_de_comercio = $Camara_de_comercio;
            $aerea->Carta_escrita_de_solicitud = $Carta_escrita_de_solicitud;
            
            
            if ($request->hasFile('permiso_anterior')) {
                $permiso_anterior = $request->file('permiso_anterior')->storeAs('documentos_puex', 'permiso_anterior-' . $solicitude->id . '.pdf');
                $permiso_anterior= 'storage/' . $permiso_anterior;
            
                $murales->permiso_anterior = $permiso_anterior;
            } else {
                // Manejo de error o mensaje indicando que no se seleccionó ningún archivo

            }
            $aerea->save();
            
        }
        return view('solicitudes.guardada', ['radicado' => $solicitude->id]);;
    }
}
