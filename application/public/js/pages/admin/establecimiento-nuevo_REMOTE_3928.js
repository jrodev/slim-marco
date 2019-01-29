$(document).ready(function() {

    //$('[data-toggle="tooltip"]').tooltip();
    var $tblAddItem = $(".tbl-add-item")
        // funcionalidad para para los selects de cada row (nuevo o existe)
        , fncSelect = function () {
            console.log(this);
            var thisText = $.trim($(this).find(':selected').text());
            $(this).parent().find('span').html(thisText);
        }
        // funcionalidad para para los inputs de cada row (nuevo o existe)
        , fncInput = function() {
            var thisVal = $.trim($(this).val());
            console.log(thisVal);
            $(this).parent().find('span').html(thisVal);
        }
    ;

    // Tablas con funcionalidad de agregar o quitar items
    $tblAddItem.each(function (i, table) {

        var $table = $(table)
            , $addNew = $table.parent().find(".tbl-add-row")
            //, $tblEspec = $(".tbl-especialidad")
            , $curentRows = $table.find('tbody tr').not('.d-none')
            , $rowTpl = $table.find("tbody tr:first-child") // Row Template
        ;

        // Eventos para los elementos (inputs, selects) dentro de cada Row ya
        // existente, de data que ya existe en la bd (menos el template)
        $curentRows.each(function (i, tr) {
            $(tr).find('select').on("change", fncSelect);
            $(tr).find('input,textarea').on("keyup change click", fncInput);
            // $(tr).find(".add, .edit").toggle();
        });

        // Elements events
        $rowTpl.find('select').on("change", fncSelect);
        $rowTpl.find('input,textarea').on("keyup change click", fncInput);

        // Eventos de add y edit
        $rowTpl.find(".add-row, .edit-row").toggle();

        // Evento para el boton nuevo Item row
        $addNew.on('click', function () {
            $(this).prop("disabled", true);
            var $newRow = $rowTpl.clone(true);
            $table.append($newRow.removeClass('d-none'));
            //$newRow.find('[data-toggle="tooltip"]').tooltip();
        });
    });
    // tooltip event
    //$rowTpl.find('[data-toggle="tooltip"]').tooltip();

    // evento para el boton Add-row de cada nuevo o existen item.
    $(document).on("click", "a.add-row", function () {
        //var empty = false;
        var $thisRow   = $(this).parents('tr:eq(0)')
            , $allInps = $thisRow.find(':input') // todos los inputs (incluido botones type input)
            , $addNew  = $(this).parents('.container-add-item').find(".tbl-add-row")
            , isValid  = true // Suponiendo que todo esta lleno
        ;

        $allInps.each(function (i, ele) {
            var $ele = $(ele)
                ,val = $.trim($(ele).val()) //, isLast = ($allInps.length-1 == i)
            ;
            if (isValid && val=='') {
                $ele.focus();
                isValid = false;
            }
            if (!val) { $ele.addClass("error"); } //if(isLast && isValid){ }
        });

        if (isValid) {
            $allInps.hide();
            $thisRow.find('span').show();
            $thisRow.find(".add-row, .edit-row").toggle();
            $addNew.prop("disabled", false);
        }

        return ;
    });

    // Edit row on edit button click
    $(document).on("click", ".edit-row", function () {
        var $thisRow   = $(this).parents('tr:eq(0)')
            , $allInps = $thisRow.find(':input')
            , $addNew  = $thisRow.parent('.container-add-item').find(".tbl-add-row")
        ;
        $allInps.show();
        $thisRow.find('span').hide();
        $thisRow.find(".add-row, .edit-row").toggle();
        $addNew.prop("disabled", true);
    });

    // Delete row on delete button click
    $(document).on("click", ".delete-row", function() {
        var $addRow  = $(this).parents('.container-add-item').find(".tbl-add-row")
            ,$thisTr = $(this).parents("tr")
        ;
        $thisTr.remove();
        $addRow.removeAttr("disabled");
    });

    /* Validation */
    window.$validator = $("form").validate({
        //debug: true,
        tooltip_options: {
           thefield: { placement: 'top' }
        },
		highlight: function ( element, errorClass, validClass ) {
			$( element ).addClass( "is-invalid" ).removeClass( "is-valid" );
		},
		unhighlight: function (element, errorClass, validClass) {
			$( element ).addClass( "is-valid" ).removeClass( "is-invalid" );
		},
        submitHandler: function (form) {
            // formToJSON -> js/libs/my/serialize.js
            var $tblEstab       = $(form).find('[table-name="establecimiento"]')
                , $tblEsp       = $(form).find('[table-name="personal_especialidad"]')
                , $tblUpssUps   = $(form).find('[table-name="ambiente_upssups"]') // ambiente_upssups
                , $tblAttrEstab = $(form).find('[table-name="atributo_establecimiento"]') // ambiente_upssups
                , $rowNewAttr   = $(form).find('[table-name="atributo"]') // Rows con datos para un atributo nuevo

                , $inpEstab      = $tblEstab.find(':input')
                , $rowsEsp       = $tblEsp.find('tbody tr:not(.d-none)')
                , $rowsUpssUps   = $tblUpssUps.find('tbody tr:not(.d-none)')
                , $rowsAttrEstab = $tblAttrEstab.find('select option[value=""]')
                                                .not(':selected').parents('tr')

                // Convierte un row de tabla con inputs, a un objeto de inputs y value
                , fncRowToJson = function () { return formToJSON( $(this).find(':input') ) }

                // Inputs a enviar por Post
                , oInpEstab     = formToJSON( $inpEstab )
                , aInpEsp       = $rowsEsp.map(fncRowToJson).get()
                , aInpUpssUps   = $rowsUpssUps.map(fncRowToJson).get()
                , aInpAttrEstab = $rowsAttrEstab.map(fncRowToJson).get()
                , aInpAttr      = []
                , oAllRowsPost  = {
                    "establecimiento":oInpEstab,
                    "personal_especialidad":aInpEsp,
                    "ambiente_upssups":aInpUpssUps,
                    "atributo_establecimiento":aInpAttrEstab
                }
            ;

            // Buscando todos los Rows de nuevo atributo, cuyo input de ingreo es visible
            $rowNewAttr.find('input:visible').each(function (i, inp) {
                var $tr = $(inp).parents('tr')
                    thisVal = $.trim($(inp).val())
                ;
                if (thisVal) { aInpAttr.push( formToJSON( $tr.find(':input') ) ); }
            });
            oAllRowsPost["atributo"] = aInpAttr;

            console.log("oAllRowsPost->",oAllRowsPost);
            //return ;
            $('body').loadingModal({text:'Procesando...', 'animation':'wanderingCubes'}).loadingModal('show');
            $.ajax({
                url : App.baseUrl + 'establecimientos', // la URL para la petición
                data : oAllRowsPost, // la información a enviar // (también es posible utilizar una cadena de datos)
                type : 'POST',// especifica si será una petición POST o GET
                dataType : 'json', // el tipo de información que se espera de respuesta
                success : function (json) {
                    //$('<h1/>').text(json.title).appendTo('body');
                    $("#myModalSuccess").modal('show');
                    console.log("resp:",json);
                    $('<pre class="content" />').html(JSON.stringify(json)).appendTo('body');
                },
                error : function (xhr, status) {
                    $("#myModalError").modal('show');
                    //showModal("Se guardo correctamente!");
                    console.log("error:", arguments);
                },
                // código a ejecutar sin importar si la petición falló o no
                complete : function (xhr, status) {
                    $('body').loadingModal('hide');
                    console.log("complete!");
                }
            });
        }
    });

    // Atributos - Funcionalidad Selects y Otro Atributos
    (function(){
        $(".sel-attr").on('change', function () {
            var thisVal = ($.trim($(this).val())!="")
                , $card = $(this).parents('.card')
                , $inpOtherAttr = $card.find("input.inp-other-attr")
                , $btnOtherAttr = $card.find("button.btn-other-attr")
                // Tiene Selects con Value != ""
                , hasSelWithVal = ($card.find('select option[value=""]').not(':selected').length > 0)
                // Todos los Selects estan en value = ""
                , allSelsNoValue = (!thisVal && !hasSelWithVal)
            ;
            console.log("thisVal",thisVal);
            console.log("hasSelWithVal",hasSelWithVal);
            console.log("allSelsNoValue",allSelsNoValue);
            console.log($card.find('select option[value=""]').not(':selected'));
            //$inpOtherAttr[allSelsNoValue?'removeClass':'addClass']('d-none');
            //$inpOtherAttr.prop('disabled', allSelsNoValue);
            $btnOtherAttr.prop('disabled', !allSelsNoValue);
            /**if (allSelsNoValue && !$inpOtherAttr.prop('disabled')) {
                $btnOtherAttr.trigger('click')
            }*/
            if(!thisVal){ $(this).removeClass('is-valid') }
        });

        $(".btn-other-attr").on('click', function () {
            var $trParent = $(this).parents('tr')
                , $card   = $(this).parents('.card')
                , $input  = $trParent.find('input')
                , isDisab = $input.prop('disabled')
            ;
            $card.find('select').prop('disabled', isDisab);
            $(this).text(isDisab ? 'Cancelar' : '¿Otro?');
            $input[isDisab ? 'removeClass' : 'addClass']('d-none');
            $input.prop('disabled', !isDisab);
        });
    })();

    // Listado de UPSS o UPS
    $(".upssups-cat").on('change', function () {

        var thisVal = $(this).val();
        var $rowItem = $(this).parents('tr');

        if (thisVal) {
            var apiUrl = App.baseUrl + 'upssups/cat/' + thisVal + '?format=json';
            $.ajax({
                url : apiUrl, // la URL para la petición
                type : 'GET',// especifica si será una petición POST o GET
                dataType : 'json', // el tipo de información que se espera de respuesta
                success : function(aJson) {
                    //$('<h1/>').text(json.title).appendTo('body');
                    console.log("resp:",aJson);
                    var opts = "<option value=''>-Eleguir-</option>";
                    for (var i in aJson) {
                        opts += "<option value='"+aJson[i].id+"'>" + aJson[i].nombre + "</option>\n";
                    }
                    $rowItem.find('.upssups-nom').html(opts);
                },
                error : function(xhr, status) {
                    console.log("error:",arguments);
                },
                complete : function(xhr, status) {
                    console.log("complete!");
                }
            });
        }
    });

    // Imagenes de establecimientos
    (function () {
        var $button = $('.images .pic');
        var $images = $('.images');
        var count = 0;
        $button.on('click', function() {
            var $uploader = $('<input type="file" name="fime_'+(++count)+'" accept="image/*" class="d-none" />');
            $uploader.on('change', function() {
                $thisUploader = $(this);
                var reader = new FileReader();
                reader.onload = function (event) {
                    $divImg = $(
                        "<div class='img' style='background-image: url(" + event.target.result + ");'>"+
                             "<span>Eliminar</span>"+
                         "</div>"
                    );
                    $divImg.prependTo($images).append($thisUploader);
                }
                reader.readAsDataURL($thisUploader[0].files[0]);
            });
            $uploader.click();
        })



        $images.on('click', '.img', function() {
            $(this).remove();
        })

    })();

    // Trayendo datos para migrar
    (function(){
        var timer = null;

        $('#codigo').tooltip({ boundary: 'window' }); // Hbilitando Tooltip

        $("#codigo").on('keyup', function () {

            $(this).removeClass('is-invalid').addClass('is-valid');

            var thisVal = $(this).val();
            var $viewMigrar = $('.view-migrar');

            clearTimeout(timer);

            if (thisVal) {
                var apiUrl = App.baseUrl + 'establecimientos/migrar?codigo='+thisVal;
                timer = setTimeout(function () {
                    $('body').loadingModal({text:'Procesando...', 'animation':'wanderingCubes'}).loadingModal('show');
                    $.ajax({
                        url : apiUrl, // la URL para la petición
                        type : 'GET',// especifica si será una petición POST o GET
                        dataType : 'json', // el tipo de información que se espera de respuesta
                        success : function (oJson) {
                            //$('<h1/>').text(json.title).appendTo('body');
                            console.log("resp:",oJson);

                            if (oJson.exist == 1) {
                                $("#codigo").removeClass('is-valid').addClass('is-invalid');
                                $("#codigo").attr('title','Codigo ya Existe!').tooltip('show');
                                return ;
                            }

                            $("#codigo").removeAttr('title');

                            var rowMigrate = oJson.data[0];
                            $viewMigrar.each(function (i, ele) {
                                sReadOnly = ((ele.tagName=='SELECT')?'disabled':'readonly');
                                if (oJson.status==1 && oJson.activo==2) {
                                    var colName = $(ele).attr('name');
                                    // Cargando Valores
                                    $(ele).val( rowMigrate[colName] );
                                    $(ele).trigger('blur');
                                    $(ele).prop(sReadOnly,true);
                                } else {
                                    // limpiando valores
                                    $(ele).val('');
                                    $(ele).removeClass('is-valid');
                                    $(ele).prop(sReadOnly,false);
                                }
                            });

                        },
                        error : function(xhr, status) {
                            console.log("error:",arguments);
                        },
                        complete : function(xhr, status) {
                            $('body').loadingModal('hide');
                            console.log("complete!");
                        }
                    });
                }, 800);
            }
        });
    })();

});
