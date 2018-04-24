$(document).ready(function () {
    init();
});

function init() {
    makeDataTables();
    showModal();
}

function showModal() {
    $("[data-hover='tooltip']").tooltip();

    $('*[data-toggle="modal"]').click(function (event) {
        if ($(this).data("action") === "refresh") {
            var refresh = true;
        }

        event.preventDefault();
        event.stopPropagation();

        $('#modal .modal-content').load($(this).attr("data-remote"), function () {

            $('#modal').modal('show');

            // initSubmitButtons();
            // submitModalForm(refresh);
        });
    });
}

function makeDataTables() {
    $("#users-table, #financial-table").dataTable({
        "autoWidth": false,
        "bStateSave": true,
        "aoColumnDefs": [
            {'bSortable': false, 'aTargets': [-1]},
            {'bSearchable': false, 'aTargets': [-1]}
        ]
    });
}