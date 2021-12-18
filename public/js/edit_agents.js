/*start Project Setting and edit*/
$(function () {
    let status = $('.toggle-class').prop('checked') === true ? 1 : 0;
    const user_id = document.getElementById('user-id').value;
    $(document).ready(function () {
        /*Project settings*/
        $('#update-agents').click(function () {
            edit_user();
        });

        $('.toggle-class').change(function () {
            status = $(this).prop('checked') === true ? 1 : 0;
        })

        $('#remove-agents').click(function () {
            delete_user()
        });
    })

    function edit_user() {
        var name = document.getElementById('name').value;
        var phone = document.getElementById('phone').value;
        var email = document.getElementById('email').value;
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
                email: email,
                phone: phone,
                status: status
            },
            success: function (response) {
                if (response['success']) {
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
                    setTimeout(function () {
                        location.href = "/customusers/agents/0";
                    }, 1000);
                    //table.DataTable().ajax.reload();
                } else if (response['error']) {
                    $('#something-wrong').modal('show');
                    $('#something-wrong #message').html(response['error']);
                }
            }
        });
    }

});
