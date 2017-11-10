var ConsoleApp = {};

(function () {
    ConsoleApp.getConsoles = function () {
        $.get('Consoles/get.json', function (response) {
            $label = $('#incomplete-label');
            $incompleteDiv = $('#incomplete-consoles');
            $incompleteDiv.empty();
            if (response.consoles.length === 0) {
                $label.hide();
                $incompleteDiv.append('<div class="incomplete-console">Empty, add a new console above.</div>');
            } else {
                $label.show();
                $.each(response.consoles, function (key, value) {
                    $incompleteDiv.append('<div class="incomplete-console" id="incomplete-' + value.id + '">' +
                            '<input id="consoleText_' + value.id + '" class="form-control no-border submitButton" value="' + value.name + '" type="text" readonly> ' +
                            '<button id="consoleEdit_' + value.id + '" class="form-control btn-xs editButton" type="button">Edit</button>' +
                            '<input id="console_' + value.id + '" class="console-checked" type="checkbox" />' +
                            '</label><div class="small-done">' + value.created + '</div></div>');
                    $incompleteDiv.show('highlight');
                });
            }
        });
    };

    ConsoleApp.getDone = function () {
        $.get('consoles/get/1.json', function (response) {
            $doneDiv = $('#done');
            $doneDiv.empty();
            $.each(response.consoles, function (key, value) {
                $doneDiv.append('<div class="finished-task"><div class="finshed-task-text">' + value.console + '</div><div class="small">' + value.updated + '</div></div>');
            });
        });
    };

    ConsoleApp.deleteConsole = function (id) {
        $.get('consoles/delete/' + id + '.json',
                function (response) {
                    if (response.response.result == 'success') {
                        $('#incomplete-' + id).hide('explode');
                        $('#incomplete-' + id).remove();
                        ConsoleApp.getConsoles();
                        ConsoleApp.getDone();
                    } else if (response.response.result == 'fail') {
                        console.log('fail');
                    }
                }
        );
    };

    ConsoleApp.editConsole = function (id) {
        var btnLabel = $("#consoleEdit_" + id).html();
        if (btnLabel == "Edit") {
            $("#consoleText_" + id).attr("readOnly", false);
            $("#consoleEdit_" + id).text("Ok");
        } else {
            $("#consoleText_" + id).attr("readOnly", true);
            $("#consoleEdit_" + id).text("Edit");

            console = $("#consoleText_" + id).val();

            var posting = $.post('consoles/edit.json', {
                name: console,
                id: id           
            });
            posting.done(function (response) {
                if (response.response.result == 'success') {
                    $('#incomplete-consoles').empty();
                    $('#inputLarge').val('');
                    ConsoleApp.getConsoles();
                } else if (response.response.result == 'fail') {
                    $('.form-group').addClass('has-error');
                    $('#console-input').append('<div class="error" id="console-error">' + response.response.error.console + '</div>');
                }
            });
        }

    };

})();

(function ($) {
	
	$(document).on('click', '#submitButton', function () {
        $('#console-error').remove();
        $('.form-group').removeClass('has-error');
        var $form = $('#add-console'),
                console = $form.find("input[name='console']").val(),
                url = $form.attr('action');

        var posting = $.post(url, {name: console});
        posting.done(function (response) {
            if (response.response.result == 'success') {
                $('#incomplete-consoles').empty();
                $('#inputLarge').val('');
                ConsoleApp.getConsoles();
            } else if (response.response.result == 'fail') {
                $('.form-group').addClass('has-error');
                $('#console-input').append('<div class="error" id="console-error">' + response.response.error.console + '</div>');
            }
        });
        event.preventDefault();
    });

    $(document).on('click', ':checkbox', function () {
        var id = $(this).attr('id').replace('console_', '');
        ConsoleApp.deleteConsole(id);
    });
    $(document).on('click', '.editButton', function () {
        var id = $(this).attr('id').replace('consoleEdit_', '');
        ConsoleApp.editConsole(id);
    });

    ConsoleApp.getConsoles();
    ConsoleApp.getDone();
})(jQuery);
