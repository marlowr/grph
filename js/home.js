$(document).ready(function() {
    $('#myTab a').click(function (e) {
        e.preventDefault();
        $(this).tab('show')
    });

    //Shows active first by default.
    $('#allprojects').DataTable( {
        "order": [[ 4, "desc" ]]
    });
    $('#activeprojects').DataTable();
    $('#pendingprojects').DataTable();
    $('#maintenanceprojects').DataTable();
    $('#retiredprojects').DataTable();
});