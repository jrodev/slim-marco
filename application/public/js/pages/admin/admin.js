// Funciones para todas las paginas de Admin

/*
var showModal = function (sMsg, fLoad, fClose, iType) {
    if(sMsg) $("#mi-modal").html(sMsg);

    $("#mi-modal").modal('show');
};*/

var $myModalSuccess = $("#myModalSuccess")
    , $myModalError = $("#myModalError")
;

//$myModalSuccess.modal({backdrop:'static', keyboard:false});
//$myModalError.modal({backdrop:'static', keyboard:false});

$myModalSuccess.on('hidden.bs.modal', function (e) {
    location.reload();
});

$myModalError.on('hidden.bs.modal', function (e) {
    //console.log("----->",a,b);
});

//$('#myModal').on('hidden.bs.modal', fClose );

// ---
$(".modal-btn-ok").on("click", function () {
    $myModalSuccess.modal('hide');
    $myModalError.modal('hide');
});
