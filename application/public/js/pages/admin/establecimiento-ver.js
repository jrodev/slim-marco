// Ubigeo selects dependientes
(function(){
    var $departamento_id = $("#departamento_id")
        , $provincia_id  = $("#provincia_id")
        , $distrito_id   = $("#distrito_id")
        , $allDepsSels   = $("#departamento_id,#provincia_id,#distrito_id")
        , select2Options = { width: '100%' }
        , apiUrlProv     =  App.baseUrl + 'ubigeo/prov/dpto/:parentId:'
        , apiUrlDist     =  App.baseUrl + 'ubigeo/dist/prov/:parentId:'
    ;
    $allDepsSels.select2(select2Options);
    var depDptoProv = new Select2Cascade($departamento_id, $provincia_id, apiUrlProv, select2Options);
    var depProvDist = new Select2Cascade($provincia_id   , $distrito_id , apiUrlDist, select2Options);
    depDptoProv.then( function(parent, child, items) { console.log(items); }); // Dump response data
    depProvDist.then( function(parent, child, items) { console.log(items); }); // Dump response data
})();
