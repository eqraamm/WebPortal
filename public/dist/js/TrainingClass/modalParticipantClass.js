function parseDataToInput(data) {
    for (var key in data[0]) {
        if ($('#' + key).attr('type') == 'checkbox') {
            if (data[0][key] == true || data[0][key] == $('#' + key).val()) {
                document.getElementById(key).checked = true;
            } else {
                if (typeof $('#' + key).attr('disabled') == undefined || $('#' + key).attr('disabled') == '') {
                    document.getElementById(key).checked = false;
                }
            }
        } else if ($('#' + key).is('select')) {
            if ($('#' + key).val() != data[0][key]) {
                for (i = 0; i < document.querySelectorAll('#' + key).length; i++) {
                    document.querySelectorAll('#' + key)[i].value = data[0][key];
                }
                $('#' + key).trigger('change');
            }
        } else {
            $('#' + key).val(data[0][key]);
        }
    }
}

$('#datetraining').datetimepicker({
   format: 'L'
});

parseDataToInput(data);

document.getElementById("date").readOnly = true;