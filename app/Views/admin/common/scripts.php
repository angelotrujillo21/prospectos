<?php 

load_script([
    'jquery',
    'jquery-ui',
    'popper',
    'bootstrap',
    'admin/custom',
    'admin/functions',
    'moment',
]);

load_script_plugin(
    [
        'toast/toastr.min',
        'select2/select2',
        'bootstrap-table/bootstrap-table',
        'bootstrap-table/bootstrap-table-es-ES',
        'bootstrap-table/export/tableExport/tableExport',
        'bootstrap-table/export/tableExport/html2canvas',
        'bootstrap-table/export/tableExport/jquery.base64',
        'bootstrap-table/export/tableExport/tableExport',
        'bootstrap-table/export/bootstrap-table-export',

    ]
);
?>

<script>
    const web_root = '<?= WEB_ROOT ?>';
    const web_root_resource = '<?= WEB_ROOT_RESOURCE ?>';
    const simbolo_moneda    =  '<?= SIMBOLO_MONEDA ?>';
</script>
