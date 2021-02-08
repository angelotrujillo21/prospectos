<!DOCTYPE html>
<html class="no-js h-100" lang="es">

<head>
    <?php extend_view(['empleado/common/head'], $data) ?>
</head>

<body>

    <div class="page-loader">
        <div class="loader-dual-ring"></div>
    </div>

    <div id="chat-box">
    </div>

    <form id="frmChat">
        <input type="text" name="chat-user" id="chat-user">
        <input type="text" name="chat-message" id="chat-message">
        <button type="submit">send</button>
    </form>


</body>

<?php extend_view(['empleado/common/scripts'], $data) ?>
<!--
<script>
    var FancyWebSocket = function(url) {
        var callbacks = {};
        var ws_url = url;
        var conn;

        this.bind = function(event_name, callback) {
            callbacks[event_name] = callbacks[event_name] || [];
            callbacks[event_name].push(callback);
            return this; // chainable
        };

        this.send = function(event_name, event_data) {
            this.conn.send(event_data);
            return this;
        };

        this.connect = function() {
            if (typeof(MozWebSocket) == 'function')
                this.conn = new MozWebSocket(url);
            else
                this.conn = new WebSocket(url);

            // dispatch to the right handlers
            this.conn.onmessage = function(evt) {
                dispatch('message', evt.data);
            };

            this.conn.onclose = function() {
                dispatch('close', null)
            }
            this.conn.onopen = function() {
                dispatch('open', null)
            }
        };

        this.disconnect = function() {
            this.conn.close();
        };

        var dispatch = function(event_name, message) {
            var chain = callbacks[event_name];
            if (typeof chain == 'undefined') return; // no callbacks for this event
            // for (var i = 0; i < chain.length; i++) {
            //     chain[i](message)
            // }
            console.log(message);
        }
    };

    window.server;

    $(document).ready(function() {

        server = new FancyWebSocket(socket_server);

        server.bind('open', function() {

        });

        server.bind('close', function() {

        });


        server.bind('message', function(payload) {
            console.log(payload);
        });

        server.connect();
    });
</script>
-->

<script>
    function showMessage(messageHTML) {
        $('#chat-box').append(messageHTML);
    }

</script>

</html>