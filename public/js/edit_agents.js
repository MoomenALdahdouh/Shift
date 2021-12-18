/*start Project Setting and edit*/
$(function () {
    let status = $('.toggle-class').prop('checked') === true ? 1 : 0;
    const user_id = document.getElementById('user-id').value;
    let removed = false;
    $(document).ready(function () {
        /*Project settings*/
        $('#update-agents').click(function () {

            edit_user();
        });

        $('.toggle-class').change(function () {
            status = $(this).prop('checked') === true ? 1 : 0;
        })

        $('#remove-agents').click(function () {
            console.log("ass");
            removed = false;
            delete_user()
            setTimeout(function () {
                if (removed)
                    location.href = "/customusers/agents/0";
            }, 2000);
        });
        create_user();
    })

    function edit_user() {
        var name = document.getElementById('name').value;
        var phone = document.getElementById('phone').value;
        var id = document.getElementById('user-id').value;
        console.log(id, name, phone, status)
        $.ajax({
            method: "POST",
            url: "/customusers/update/" + id,
            data: {
                _token: $("input[name=_token]").val(),
                action: "update",
                id: id,
                name: name,
                phone: phone,
                status: status
            },
            success: function (response) {
                if (response['success']) {
                    console.log(response['success']);
                    $('#successfully-save #message').html(response['success']);
                    $('#successfully-save').modal('show');
                } else {
                    $('#something-wrong #message').html(response['error']);
                    $('#something-wrong').modal('show');
                }
            }
        });
    }

    function delete_user() {
        $.ajax({
            type: "DELETE",
            url: "/customusers/delete/" + user_id,
            data: {
                _token: $("input[name=_token]").val()
            },
            success: function (response) {
                if (response['success']) {
                    $('#successfully-remove').modal('show');
                    $('#successfully-remove #message').html(response['success']);
                    removed = true;
                    //table.DataTable().ajax.reload();
                } else if (response['error']) {
                    $('#something-wrong').modal('show');
                    $('#something-wrong #message').html(response['error']);
                }
            }
        });
    }

    function create_user() {
        const name_error = $('#name_error');
        const email_error = $('#email_error');
        const phone_error = $('#phone_error');
        name_error.css('display', 'none');
        email_error.css('display', 'none');
        phone_error.css('display', 'none');

        $('#create_user').click(function () {
            const name = $('#name').val();
            const phone = $('#phone').val();
            const email = $('#email').val();
            const type = $('#type').val();
            const status = $('#flexSwitchCheckChecked').val();
            //console.log(name, phone, email, type, status)
            $.ajax({
                type: "POST",
                url: "/users/create",
                data: {
                    _token: $("input[name=_token]").val(),
                    action: "create",
                    name: name,
                    email: email,
                    phone: phone,
                    type: type,
                    status: status,
                },
                success: function (data) {
                    if ($.isEmptyObject(data.error)) {
                        name_error.css('display', 'none');
                        email_error.css('display', 'none');
                        phone_error.css('display', 'none');
                        $('#name').val("");
                        $('#phone').val("");
                        $('#email').val("");
                        $('#successfully-creat').modal('show');
                        in_user_type.val(4);
                        table.DataTable().ajax.reload();
                    } else {
                        printErrorMsg(data.error);
                    }
                }
            });

            function printErrorMsg(msg) {
                if (msg['name']) {
                    name_error.html(msg['name']);
                    name_error.css('display', 'block');
                } else {
                    name_error.css('display', 'none');
                }
                if (msg['email']) {
                    $('#email_error').html(msg['email']);
                    email_error.css('display', 'block');
                } else {
                    email_error.css('display', 'none');
                }
                if (msg['phone']) {
                    $('#phone_error').html(msg['phone']);
                    phone_error.css('display', 'block');
                } else {
                    phone_error.css('display', 'none');
                }
            }
        });

    }
});
