<x-layouts.app>

    <form action="{{route('solicitudes.store')}}" enctype="multipart/form-data"  method="POST">
        @csrf
        <x-layouts.registro>
        </x-layouts.registro>
    <div class="image-icon">
        <div class="col-md-9 mr-auto" style="padding-left:8.5%">
        <span class="breadcrumb govco-icon govco-icon-shortr-arrow" style="height: 22px;"></span>
        <p class="ml-3 ml-md-0 text-miga" style="color: #004884; font-size:14px;">
            <strong> 2. Datos de la solicitud </strong>
            </p>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-4 mt-4" style="padding-left:10%">
            <label for="" class="">Modalidad de publicidad<span aria-required="true">*</span></label>
              <select class="form-control" id="modalidadpublicidad" name="tipo" onchange="modalidadpublicidad()">
                <option value="vallas">Vallas</option>
              </select>
            </div>
    </div>


    <div class="row">
    <div class="col-sm-4 mt-4" style="padding-left:10%" >
      <label for="" class="">Tipo Solicitud<span aria-required="true">*</span></label>
      <select class="form-control" id="tiposolicitud" name="tipo_solicitud" onchange="mostrartiposolicitud()">
        <option disabled selected>Seleccione</option>
        <option value="Primera Vez">Primera Vez</option>
        <option value="Renovacion">Renovación</option>
      </select>
    </div>

    <div class="col-sm-3" style="padding-left:3%; padding-top: 1.2%"; id="razon-social-div">
      <div class="entradas-de-texto-govco">
        <label for="razon-social-id">Fecha de instalación*</label>
        <input type="date" id="fecha_de_instalacion" name="fecha_de_instalacion" placeholder="Ejemplo: Campo de texto"/>
      </div>
    </div>

    <div class="col-sm-3" style="padding-left:3%; padding-top: 1.2%" id="razon-social-div">
        <div class="entradas-de-texto-govco">
          <label for="razon-social-id">Fecha de retiro*</label>
          <input type="date" id="fecha_de_retiro" name="fecha_de_retiro" placeholder="Ejemplo: Campo de texto"/>
        </div>
      </div>

  </div>
  <div class="row">
    <div class="col-sm-4 mt-4" style="padding-left:10%" >
      <label for="" class="">Tipo valla<span aria-required="true">*</span></label>
      <select class="form-control" id="tipo_valla" name="tipo_valla" onchange="()">
        <option disabled selected>Seleccione</option>
        <option value="Convencional">Convencional</option>
        <option value="Tubular">Tubular</option>
      </select>
    </div>

    <div class="col-sm-3" style="padding-left:3%; padding-top: 1.2%">
        <div class="entradas-de-texto-govco">
          <label for="razon-social-id">Direccion
           </label>
          <input class=form-control type="string" id="direccion" name="direccion" placeholder="Ejemplo: Campo de texto"/>
        </div>
      </div>
  </div>


  <div class="row" style="padding-left:9.5% ;">
  <div class="col-sm-2" style=" padding-top: 0.8%">
    <label for="" class="">Número de caras<span aria-required="true">*</span></label>
    <select class="form-control" id="Numero_de_caras" name="Numero_de_caras" onchange="calcularAreaTotal()">
      <option disabled selected>Seleccione</option>
      <option value="1">1</option>
      <option value="2">2</option>
    </select>
  </div>

  <div class="col-sm-2">
    <div class="entradas-de-texto-govco">
      <label for="razon-social-id">Ancho(m)*</label>
      <input class="form-control" type="number" id="Ancho" name="Ancho" placeholder="Ejemplo: Campo de texto" oninput="calcularAreaTotal()" />
    </div>
  </div>

  <div class="col-sm-2" style="padding-left:1%;">
    <div class="entradas-de-texto-govco">
      <label for="razon-social-id">Alto(m)*</label>
      <input class="form-control" type="number" id="Alto" name="Alto" placeholder="Ejemplo: Campo de texto" oninput="calcularAreaTotal()" />
    </div>
  </div>

  <div class="col-sm-2" style="padding-left:1%;">
    <div class="entradas-de-texto-govco">
      <label for="razon-social-id">Área total(mts^2):</label>
      <input class="form-control" type="text" id="Area_total" name="Area_total" placeholder="Ejemplo: Campo de texto" readonly />
    </div>
  </div>
</div>

<script>
  function calcularAreaTotal() {
    // Obtener los valores ingresados por el usuario
    var ancho = parseFloat(document.getElementById("Ancho").value);
    var alto = parseFloat(document.getElementById("Alto").value);
    var numeroDeCaras = parseInt(document.getElementById("Numero_de_caras").value);

    // Verificar si los valores son números válidos
    if (isNaN(ancho) || isNaN(alto)) {
      // Al menos uno de los valores no es un número válido
      document.getElementById("Area_total").value = "Valores inválidos";
    } else {
      // Calcular el área total según el número de caras seleccionado
      var areaTotal = ancho * alto * numeroDeCaras;

      // Asignar el resultado al campo de texto del área total
      document.getElementById("Area_total").value = areaTotal;
    }
  }
</script>



  <div class="image-icon">
    <div class="col-md-9 mr-auto" style="padding-left:8.5%">
    <span class="breadcrumb govco-icon govco-icon-shortr-arrow" style="height: 22px;"></span>
    <p class="ml-3 ml-md-0 text-miga" style="color: #004884; font-size:14px;">
        <strong> 3. Documentos de la solicitud </strong>
        </p>
    </div>
</div>

<div class="row" style="padding-left:10% ;">
    <div class="container-carga-de-archivo-govco">
        <div class="loader-carga-de-archivo-govco">
          <div class="all-input-carga-de-archivo-govco">
            <input type="file" name="fotomontaje" id="inputFile" class="input-carga-de-archivo-govco active" data-error="0" data-action="uploadFile" data-action-delete="deleteFile" multiple/>
            <label for="inputFile" class="label-carga-de-archivo-govco">Foto montaje o plano digitalizado*</label>
            <label for="inputFile" class="container-input-carga-de-archivo-govco">
              <span class="button-file-carga-de-archivo-govco">Seleccionar archivo</span>
              <span class="file-name-carga-de-archivo-govco">Sin archivo seleccionado</span>
            </label>
            <span class="text-validation-carga-de-archivo-govco">Cualquier tipo de archivo. Peso máximo: 2 MB</span>
          </div>
         <div class="load-button-carga-de-archivo-govco">
         
          <div class="load-carga-de-archivo-govco">
              <!-- indicador de carga -->
              <div class="spinner-indicador-de-carga-govco" style="width: 32px; height: 32px; border-width: 6px;" role="status">
                <span class="visually-hidden">Cargando...</span>
              </div>
              <!-- end indicador de carga -->
            </div>
           <!-- <button class="button-loader-carga-de-archivo-govco" disabled>Cargar archivo</button>
          -->
          </div>
        </div>

        <div class="container-detail-carga-de-archivo-govco">
          <span class="alert-carga-de-archivo-govco visually-hidden"></span>
          <div class="attached-files-carga-de-archivo-govco"></div>
        </div>
      </div>
</div>
<div class="row" style="padding-left:10% ;">
    <div class="container-carga-de-archivo-govco">
        <div class="loader-carga-de-archivo-govco">
          <div class="all-input-carga-de-archivo-govco">
            <input type="file" name="Camara_de_comercio" id="inputFile" class="input-carga-de-archivo-govco active" data-error="0" data-action="uploadFile" data-action-delete="deleteFile" multiple/>
            <label for="inputFile" class="label-carga-de-archivo-govco">Camará de comercio ó <br> Registro único tributario - RUT *</label>
            <label for="inputFile" class="container-input-carga-de-archivo-govco">
              <span class="button-file-carga-de-archivo-govco">Seleccionar archivo</span>
              <span class="file-name-carga-de-archivo-govco">Sin archivo seleccionado</span>
            </label>
            <span class="text-validation-carga-de-archivo-govco">Cualquier tipo de archivo. Peso máximo: 2 MB</span>
          </div>
          <div class="load-button-carga-de-archivo-govco">
            <div class="load-carga-de-archivo-govco">
              <!-- indicador de carga -->
              <div class="spinner-indicador-de-carga-govco" style="width: 32px; height: 32px; border-width: 6px;" role="status">
                <span class="visually-hidden">Cargando...</span>
              </div>
              <!-- end indicador de carga -->
            </div>
           <!-- <button class="button-loader-carga-de-archivo-govco" disabled>Cargar archivo</button>
          -->
          </div>
        </div>

        <div class="container-detail-carga-de-archivo-govco">
          <span class="alert-carga-de-archivo-govco visually-hidden"></span>
          <div class="attached-files-carga-de-archivo-govco"></div>
        </div>
      </div>
</div>
<div class="row" style="padding-left:10% ;">
    <div class="container-carga-de-archivo-govco">
        <div class="loader-carga-de-archivo-govco">
          <div class="all-input-carga-de-archivo-govco">
            <input type="file" name="Certificado_de_libertad" id="inputFile" class="input-carga-de-archivo-govco active" data-error="0" data-action="uploadFile" data-action-delete="deleteFile" multiple/>
            <label for="inputFile" class="label-carga-de-archivo-govco">Certificado de libertad *</label>
            <label for="inputFile" class="container-input-carga-de-archivo-govco">
              <span class="button-file-carga-de-archivo-govco">Seleccionar archivo</span>
              <span class="file-name-carga-de-archivo-govco">Sin archivo seleccionado</span>
            </label>
            <span class="text-validation-carga-de-archivo-govco">Cualquier tipo de archivo. Peso máximo: 2 MB</span>
          </div>
          <div class="load-button-carga-de-archivo-govco">
            <div class="load-carga-de-archivo-govco">
              <!-- indicador de carga -->
              <div class="spinner-indicador-de-carga-govco" style="width: 32px; height: 32px; border-width: 6px;" role="status">
                <span class="visually-hidden">Cargando...</span>
              </div>
              <!-- end indicador de carga -->
            </div>
          <!-- <button class="button-loader-carga-de-archivo-govco" disabled>Cargar archivo</button>
          -->
          </div>
        </div>

        <div class="container-detail-carga-de-archivo-govco">
          <span class="alert-carga-de-archivo-govco visually-hidden"></span>
          <div class="attached-files-carga-de-archivo-govco"></div>
        </div>
      </div>
</div>
<div class="row" style="padding-left:10% ;">
    <div class="container-carga-de-archivo-govco">
        <div class="loader-carga-de-archivo-govco">
          <div class="all-input-carga-de-archivo-govco">
            <input type="file" name="Autorizacion" id="inputFile" class="input-carga-de-archivo-govco active" data-error="0" data-action="uploadFile" data-action-delete="deleteFile" multiple/>
            <label for="inputFile" class="label-carga-de-archivo-govco">Autorización del propietario del predio*</label>
            <label for="inputFile" class="container-input-carga-de-archivo-govco">
              <span class="button-file-carga-de-archivo-govco">Seleccionar archivo</span>
              <span class="file-name-carga-de-archivo-govco">Sin archivo seleccionado</span>
            </label>
            <span class="text-validation-carga-de-archivo-govco">Cualquier tipo de archivo. Peso máximo: 2 MB</span>
          </div>
          <div class="load-button-carga-de-archivo-govco">
            <div class="load-carga-de-archivo-govco">
              <!-- indicador de carga -->
              <div class="spinner-indicador-de-carga-govco" style="width: 32px; height: 32px; border-width: 6px;" role="status">
                <span class="visually-hidden">Cargando...</span>
              </div>
              <!-- end indicador de carga -->
            </div>
          <!-- <button class="button-loader-carga-de-archivo-govco" disabled>Cargar archivo</button>
          -->
          </div>
        </div>

        <div class="container-detail-carga-de-archivo-govco">
          <span class="alert-carga-de-archivo-govco visually-hidden"></span>
          <div class="attached-files-carga-de-archivo-govco"></div>
        </div>
      </div>
</div>
<div class="row" style="padding-left:10% ;">
    <div class="container-carga-de-archivo-govco">
        <div class="loader-carga-de-archivo-govco">
          <div class="all-input-carga-de-archivo-govco">
            <input type="file" name="Carta_escrita_de_solicitud" id="inputFile" class="input-carga-de-archivo-govco active" data-error="0" data-action="uploadFile" data-action-delete="deleteFile" multiple/>
            <label for="inputFile" class="label-carga-de-archivo-govco">Carta escrita de solicitud*</label>
            <label for="inputFile" class="container-input-carga-de-archivo-govco">
              <span class="button-file-carga-de-archivo-govco">Seleccionar archivo</span>
              <span class="file-name-carga-de-archivo-govco">Sin archivo seleccionado</span>
            </label>
            <span class="text-validation-carga-de-archivo-govco">Cualquier tipo de archivo. Peso máximo: 2 MB</span>
          </div>
          <div class="load-button-carga-de-archivo-govco">
            <div class="load-carga-de-archivo-govco">
              <!-- indicador de carga -->
              <div class="spinner-indicador-de-carga-govco" style="width: 32px; height: 32px; border-width: 6px;" role="status">
                <span class="visually-hidden">Cargando...</span>
              </div>
              <!-- end indicador de carga -->
            </div>
          <!-- <button class="button-loader-carga-de-archivo-govco" disabled>Cargar archivo</button>
          -->
          </div>
        </div>

        <div class="container-detail-carga-de-archivo-govco">
          <span class="alert-carga-de-archivo-govco visually-hidden"></span>
          <div class="attached-files-carga-de-archivo-govco"></div>
        </div>
      </div>
</div>



<div id="resolucionanterior1"  >
    <div class="row" style="padding-left:10% ">
        <div class="container-carga-de-archivo-govco">
            <div class="loader-carga-de-archivo-govco" style="flex">
              <div class="all-input-carga-de-archivo-govco">
                <input type="file" name="permiso_anterior" id="inputFile" class="input-carga-de-archivo-govco active" data-error="0" data-action="uploadFile" data-action-delete="deleteFile" multiple/>
                <label for="inputFile" class="label-carga-de-archivo-govco">Resolución de vigencia, permiso anterior*</label>
                <label for="inputFile" class="container-input-carga-de-archivo-govco">
                  <span class="button-file-carga-de-archivo-govco">Seleccionar archivo</span>
                  <span class="file-name-carga-de-archivo-govco">Sin archivo seleccionado</span>
                </label>
                <span class="text-validation-carga-de-archivo-govco">Cualquier tipo de archivo. Peso máximo: 2 MB</span>
              </div>
              <div class="load-button-carga-de-archivo-govco">
                <div class="load-carga-de-archivo-govco">
                  <!-- indicador de carga -->
                  <div class="spinner-indicador-de-carga-govco" style="width: 30px; height: 32px; border-width: 6px;" role="status">
                    <span class="visually-hidden">Cargando...</span>
                  </div>
                  <!-- end indicador de carga -->
                </div>
              <!-- <button class="button-loader-carga-de-archivo-govco" disabled>Cargar archivo</button>
              -->
              </div>
            </div>

            <div class="container-detail-carga-de-archivo-govco">
              <span class="alert-carga-de-archivo-govco visually-hidden"></span>
              <div class="attached-files-carga-de-archivo-govco"></div>
            </div>
          </div>
    </div>

    <x-layouts.capcha>
     </x-layouts.capcha>
    </div>
    <div class="row" style="padding-left:11%; padding-top:1%" >
    
    <button type="submit" class="btn-govco outline-btn-govco" style="width: 165px; height: 42px;">Enviar Solicitud</button>

    </div>
    
  </form>
<script>

    function mostrartiposolicitud() {

      var x = document.getElementById("tiposolicitud").value;
      if (x == "Renovacion") {
        document.getElementById("resolucionanterior1").style.display = "block";
      } if (x == "Primera Vez"){
        document.getElementById("resolucionanterior1").style.display = "none";
      }
    }
</script>


</x-layouts.app>
