<script>
    const web_root = '<?= WEB_ROOT ?>';
    const web_root_resource = '<?= WEB_ROOT_RESOURCE ?>';
    const simbolo_moneda    =  '<?= SIMBOLO_MONEDA ?>';
    const is_admin    =   false;
</script>
<?php 

load_script([
    'jquery',
    'jquery-ui',
    'popper',
    'bootstrap',
    'admin/custom',
    'admin/functions',
    'empleados/functions',
    'moment',
    'socket',

]);

load_script_plugin(
    [
        'toast/toastr.min',
        'select2/select2',
        'bootstrap-table/bootstrap-table',
        'bootstrap-table/bootstrap-table-es-ES',
        'push/push.min',
    ]
);
?>

