$(document).ready(function() {

    //$('[data-toggle="tooltip"]').tooltip();

    var $tblAddItem = $(".tbl-add-item")
        //, $addNew = $(".add-new")
        //, $tblEspec = $(".tbl-especialidad")
        //, $curentRows = $tblEspec.find('tbody tr').not('.d-none')
        // Row Template
        //, $rowTpl = $("table tbody tr:first-child")

        , fncSelect = function () {
            console.log(this);
            var thisText = $.trim($(this).find(':selected').text());
            $(this).parent().find('span').html(thisText);
        }

        , fncInput = function() {
            var thisVal = $.trim($(this).val());
            console.log(thisVal);
            $(this).parent().find('span').html(thisVal);
        }
    ;

    $tblAddItem.each(function (i, table) {

        var $table = $(table)
            , $addNew = $table.parent().find(".tbl-add-row")
            //, $tblEspec = $(".tbl-especialidad")
            , $curentRows = $table.find('tbody tr').not('.d-none')
            , $rowTpl = $table.find("tbody tr:first-child") // Row Template
        ;

        // Eventos para los Rows existentes
        $curentRows.each(function (i, tr) {
            // Elements events
            $(tr).find('select').on("change", fncSelect);
            $(tr).find('input,textarea').on("keyup change click", fncInput);
            // Eventos de add y edit
            // $(tr).find(".add, .edit").toggle();
        });

        // Elements events
        $rowTpl.find('select').on("change", fncSelect);
        $rowTpl.find('input,textarea').on("keyup change click", fncInput);

        // Eventos de add y edit
        $rowTpl.find(".add-row, .edit-row").toggle();

        // Append table with add row form on add new button click
        $addNew.on('click', function () {
            $(this).prop("disabled", true);
            var $newRow = $rowTpl.clone(true);
            $table.append($newRow.removeClass('d-none'));
            //$newRow.find('[data-toggle="tooltip"]').tooltip();
        });

    });

    // tooltip event
    //$rowTpl.find('[data-toggle="tooltip"]').tooltip();

    // Add row on add button click
    $(document).on("click", "a.add-row", function () {
        //var empty = false;
        var $thisRow   = $(this).parents('tr:eq(0)')
            , $allInps = $thisRow.find(':input') // todos los inputs (incluido botones type input)
            , $addNew  = $(this).parents('.container-add-item').find(".tbl-add-row")
            , isValid  = true // Suponiendo que todo esta lleno
        ;

        $allInps.each(function (i, ele) {
            var $ele = $(ele)
                ,val = $.trim($(ele).val())
                //, isLast = ($allInps.length-1 == i)
            ;
            if (isValid && val=='') {
                $ele.focus();
                isValid = false;
            }
            if (!val) { $ele.addClass("error"); }
            //if(isLast && isValid){ }
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
    $(document).on("click", ".edit-row", function() {
        var $thisRow = $(this).parents('tr:eq(0)')
            ,$allInps = $thisRow.find(':input')
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

    /******/
    var formToJson = function ($form) {
        if(!$form.is('form')) { return ; }
        var o = {};
        var a = $form.serializeArray();
        $.each(a, function () {
            if (o[this.name]) {
                if (!o[this.name].push) {
                    o[this.name] = [o[this.name]];
                }
                o[this.name].push(this.value || '');
            } else {
                o[this.name] = this.value || '';
            }
        });
        return o;
    };

    /*
    Validation
    */
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
            //var data = $(form).serialize();
            //console.log(data);
            //var oForm = formToJson($(form));
            var oForm = formToJSON($(form, ".establecimiento").find(':input'));
            console.log(oForm);

            $.ajax({
                url : App.baseUrl+'establecimientos', // la URL para la petición
                data : oForm, // la información a enviar // (también es posible utilizar una cadena de datos)
                type : 'POST',// especifica si será una petición POST o GET
                dataType : 'json', // el tipo de información que se espera de respuesta

                // código a ejecutar si la petición es satisfactoria;
                // la respuesta es pasada como argumento a la función
                success : function(json) {
                    //$('<h1/>').text(json.title).appendTo('body');
                    console.log("resp:",json);
                    $('<pre class="content"/>').html(JSON.stringify(json)).appendTo('body');
                },

                // código a ejecutar si la petición falla;
                // son pasados como argumentos a la función
                // el objeto de la petición en crudo y código de estatus de la petición
                error : function(xhr, status) {
                    console.log("error:",arguments);
                },

                // código a ejecutar sin importar si la petición falló o no
                complete : function(xhr, status) {
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

    /* DataTables Plugin*/
    $('#tblEstablecimiento').DataTable({
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json"
        }
    });

    // Listado de UPSS o UPS
    $(".upssups-cat").on('change', function () {

        var thisVal = $(this).val();
        var $addItem = $(this).parents('.container-add-item');

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
                    $addItem.find('.upssups-nom').html(opts);
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

});
