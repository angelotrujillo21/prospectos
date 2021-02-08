
window.websocket;

$(document).ready(function () {

    websocket = new WebSocket("ws://localhost:8090/");

    websocket.onopen = function (event) {
        console.log('Connection is established!');
    }
    websocket.onmessage = function (event) {
        var aryData = JSON.parse(event.data);

        switch (aryData.type) {
            case "NOTIFICACION_VALIDACION_PROSPECTO":
                if (!is_admin && ($("body").data("nidempleado") == aryData.message.nIdEmpleado)) {
                    var message = aryData.message;
                    alert("Se aprobo el prospecto " + message.nIdProspectoFormat + " - Cliente:" + message.sCliente);
                }
                break;
        }
        console.log(aryData);
    };

    websocket.onerror = function (event) {
        console.error('error en socket ', event);
    };

    websocket.onclose = function (event) {
        console.error('Connection Closed ');
    };
});