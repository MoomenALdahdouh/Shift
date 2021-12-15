(function a(x) {
    // The following condition
    // is the base case.
    if (!x) {
        return;
    }
    a(--x);
})(10);


$(function () {
    let event_type = 0;
    //const csrfToken = document.head.querySelector("[name=csrf-token][content]").content
    let data_external_type = $('#data-external-type');
    let data_internal_type = $('#data-internal-type');
    let data_external_type_update = $('#modal-update-event #data-external-type');
    let data_internal_type_update = $('#modal-update-event #data-internal-type');
    let calendarEl = document.getElementById('calendar');
    let calendar;

    $(document).ready(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        prepareCalender();
        selectEventType();
        selectEventTypeUpdate();
        $('#create_event').click(function () {
            createEvent(calendar);
        });
    });

    function prepareCalender() {
        calendar = new FullCalendar.Calendar((calendarEl), {
            selectable: true,
            //height: 660,
            headerToolbar: {
                left: 'prev next today',
                center: 'title',
                right: 'dayGridMonth dayGridWeek dayGridDay listMonth'
            },
            initialView: 'dayGridMonth',
            displayEventTime: true,
            eventSources: [
                {
                    url: 'events/fetch',
                }
            ],
            dateClick: function (info) {
                // $('#modal-add-event').modal('show');
                createEvent(calendar);
            },
            eventClick: function (info) {
                //console.log('Event: ' + info.event.title);
                showEvent(calendar, info);
            },
            /*select: function (date) {
                $('#modal-alert').modal('show');
                let eventTitle = "New Event";
                let eventStart = date.startStr;
                let eventEnd = date.endStr;
                //let ff = prompt('add new title');
                fetch('events/create', {
                    method: 'post',
                    body: JSON.stringify({eventTitle, eventStart,eventEnd}),
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': csrfToken,
                    },
                }).then(e=>{
                    //console.log('success')
                    calendar.refetchEvents();
                })
            }*/
        });
        calendar.render();
    }

    function createEvent(calendar) {
        $('#modal-add-event').modal('show');
        /*Data*/
        let event_external_link_input = $('#url');
        let organizer_ar_name_input = $('#organizer-ar-name');
        let organizer_en_name_input = $('#organizer-en-name');
        let organizer_phone_input = $('#organizer-phone');
        let organizer_email_input = $('#organizer-email');
        let organizer_website_name_input = $('#organizer-website-name');
        let organizer_website_url_input = $('#organizer-website-url');
        let manager_ar_name_input = $('#manager-ar-name');
        let manager_en_name_input = $('#manager-en-name');
        let manager_phone_input = $('#manager-phone');
        let manager_email_input = $('#manager-email');
        let sponsors_image_input = $('#sponsors-image');
        let details_image_input = $('#details-image');
        let photo_image_input = $('#photo-image');
        let video_image_input = $('#video-image');
        /*Errors*/
        let title_ar_error = $('#title_ar_error');
        let title_en_error = $('#title_en_error');
        let description_en_error = $('#description_en_error');
        let description_ar_error = $('#description_ar_error');
        let start_error = $('#start_error');
        let end_error = $('#end_error');
        let location_error = $('#location_error');
        let category_error = $('#category_error');
        let type_error = $('#type_error');
        let url_error = $('#url_error');
        let organizer_ar_name_error = $('#organizer_ar_name_error');
        let organizer_en_name_error = $('#organizer_en_name_error');
        let organizer_phone_error = $('#organizer_phone_error');
        let organizer_email_error = $('#organizer_email_error');
        let organizer_website_name_error = $('#organizer_website_name_error');
        let organizer_website_url_error = $('#organizer_website_url_error');
        let manager_ar_name_error = $('#manager_ar_name_error');
        let manager_en_name_error = $('#manager_en_name_error');
        let manager_phone_error = $('#manager_phone_error');
        let manager_email_error = $('#manager_email_error');
        let sponsors_image_upload_error = $('#sponsors_image_upload_error');
        let details_image_upload_error = $('#details_image_upload_error');
        let photo_gallery_upload_error = $('#photo_gallery_upload_error');
        let video_gallery_upload_error = $('#video_gallery_upload_error');
        $('#submit_event').click(function () {
            /*Input field*/
            let title_en = $('#title_en').val();
            let title_ar = $('#title_ar').val();
            let description_en = $('#description_en').val();
            let description_ar = $('#description_ar').val();
            let event_start = $('#start').val();
            let event_end = $('#end').val();
            let location = $('#location').val();
            let category = $('#category').val();
            let event_key = title_en + title_ar + description_en + description_ar + event_start + event_end;
            $('#event_key').val(event_key)
            event_type = $('#event_type').val();
            let event_external_link = "";
            let organizer_ar_name = "";
            let organizer_en_name = "";
            let organizer_phone = "";
            let organizer_email = "";
            let organizer_website_name = "";
            let organizer_website_url = "";
            let manager_ar_name = "";
            let manager_en_name = "";
            let manager_phone = "";
            let manager_email = "";
            let sponsors_image = "";
            let details_image = "";
            let photo_image = "";
            let video_image = "";

            switch (event_type) {
                case "0":
                    event_external_link = event_external_link_input.val();
                    break;
                case "1":
                    organizer_ar_name = organizer_ar_name_input.val();
                    organizer_en_name = organizer_en_name_input.val();
                    organizer_phone = organizer_phone_input.val();
                    organizer_email = organizer_email_input.val();
                    organizer_website_name = organizer_website_name_input.val();
                    organizer_website_url = organizer_website_url_input.val();
                    manager_ar_name = manager_ar_name_input.val();
                    manager_en_name = manager_en_name_input.val();
                    manager_phone = manager_phone_input.val();
                    manager_email = manager_email_input.val();
                    sponsors_image = sponsors_image_input.val();
                    details_image = details_image_input.val();
                    photo_image = photo_image_input.val();
                    video_image = video_image_input.val();
                    break;
            }
            $.ajax({
                type: "POST",
                url: "events/create",
                data: {
                    _token: $("input[name=_token]").val(),
                    action: "create",
                    event_key: event_key,
                    title_en: title_en,
                    title_ar: title_ar,
                    event_start: event_start,
                    event_end: event_end,
                    description_en: description_en,
                    description_ar: description_ar,
                    location: location,
                    category: category,
                    event_type: event_type,
                    sponsors_image: sponsors_image,
                    details_image: details_image,
                    photo_image: photo_image,
                    video_image: video_image,
                    event_external_link: event_external_link,
                    organizer_ar_name: organizer_ar_name,
                    organizer_en_name: organizer_en_name,
                    organizer_phone: organizer_phone,
                    organizer_email: organizer_email,
                    organizer_website_name: organizer_website_name,
                    organizer_website_url: organizer_website_url,
                    manager_ar_name: manager_ar_name,
                    manager_en_name: manager_en_name,
                    manager_phone: manager_phone,
                    manager_email: manager_email,
                },
                success: function (response) {
                    /*Reset values*/
                    if (response['error']) {
                        printErrorMsg(response.error);
                    } else if (response['success']) {
                        title_ar_error.css('display', 'none');
                        $('#successfully-modal').modal('show');
                        $('#title_en').val("");
                        $('#title_ar').val("");
                        $('#description_en').val("");
                        $('#description_ar').val("");
                        $('#start').val("");
                        $('#end').val("");
                        $('#location').val("");
                        $('#category').val(0);
                        $('#event_type').val(0);
                        event_external_link_input.val("");
                        organizer_ar_name_input.val("");
                        organizer_en_name_input.val("");
                        organizer_phone_input.val("");
                        organizer_email_input.val("");
                        organizer_website_name_input.val("");
                        organizer_website_url_input.val("");
                        manager_ar_name_input.val("");
                        manager_en_name_input.val("");
                        manager_phone_input.val("");
                        manager_email_input.val("");
                        sponsors_image_input.val("");
                        details_image_input.val("");
                        photo_image_input.val("");
                        video_image_input.val("");
                        title_en = "";
                        title_ar = "";
                        event_start = "";
                        event_end = "";
                        description_en = "";
                        description_ar = "";
                        location = "";
                        category = "";
                        event_type = "";
                        event_external_link = "";
                        organizer_ar_name = "";
                        organizer_en_name = "";
                        organizer_phone = "";
                        organizer_email = "";
                        organizer_website_name = "";
                        organizer_website_url = "";
                        manager_ar_name = "";
                        manager_en_name = "";
                        manager_phone = "";
                        manager_email = "";
                        sponsors_image = "";
                        details_image = "";
                        photo_image = "";
                        video_image = "";
                        console.log(response['success']);
                        console.log(response['event_fk_id']);
                        console.log(response['event']);
                        $('#modal-add-event').modal('toggle');
                        calendar.refetchEvents();
                    }
                    //prepareCalender();
                    //calendarEl.calendar('removeEvents');
                    /*if ($.isEmptyObject(data.error)) {
                        title_ar_error.css('display', 'none');
                        description_error.css('display', 'none');
                        createForm(data.activity_fk_id, worker, subproject);

                    } else {
                        printErrorMsg(data.error);
                    }*/
                }

            });

            function printErrorMsg(msg) {
                if (msg['title_ar']) {
                    title_ar_error.html(msg['title_ar']);
                    title_ar_error.css('display', 'block');
                } else {
                    title_ar_error.css('display', 'none');
                }
                /*if (msg['description']) {
                    $('#description_error').html(msg['description']);
                    description_error.css('display', 'block');
                } else {
                    description_error.css('display', 'none');
                }*/
            }
        });
    }

    function showEvent(calendar, info) {
        console.log(info.event.id);
        $('#modal-update-event').modal('show');
        /*Input*/
        let title_ar_input = $('#modal-update-event #title_ar');
        let title_en_input = $('#modal-update-event #title_en');
        let description_ar_input = $('#modal-update-event #description_ar');
        let description_en_input = $('#modal-update-event #description_en');
        let location_input = $('#modal-update-event #location');
        let category_input = $('#modal-update-event #category_input');
        let start_input = $('#modal-update-event #start');
        let end_input = $('#modal-update-event #end');
        let event_type_input = $('#modal-update-event #event_type');

        let sponsors_image_input = $('#modal-update-event #sponsors-image');
        let details_image_input = $('#modal-update-event #details-image');
        let photo_image_input = $('#modal-update-event #photo-image');
        let video_image_input = $('#modal-update-event #video-image');

        let event_external_link_input = $('#modal-update-event #url');
        let organizer_ar_name_input = $('#modal-update-event #organizer-ar-name');
        let organizer_en_name_input = $('#modal-update-event #organizer-en-name');
        let organizer_phone_input = $('#modal-update-event #organizer-phone');
        let organizer_email_input = $('#modal-update-event #organizer-email');
        let organizer_website_name_input = $('#modal-update-event #organizer-website-name');
        let organizer_website_url_input = $('#modal-update-event #organizer-website-url');
        let manager_ar_name_input = $('#modal-update-event #manager-ar-name');
        let manager_en_name_input = $('#modal-update-event #manager-en-name');
        let manager_phone_input = $('#modal-update-event #manager-phone');
        let manager_email_input = $('#modal-update-event #manager-email');

        /*Fill data*/
        //getEventData(id)
        $.ajax({
            method: "get",
            url: "events/show/" + info.event.id,
            data: {
                _token: $("input[name=_token]").val(),
            },
            success: function (event) {
                //console.log(event.event_user);
                title_ar_input.val(event.title);
                title_en_input.val(event.title);
                description_ar_input.val(event.description);
                description_en_input.val(event.description);
                location_input.val(event.location);
                category_input.val(event.category);
                start_input.val(moment(event.start).format("YYYY-MM-DDTkk:mm"));
                end_input.val(moment(event.end).format("YYYY-MM-DDTkk:mm"));
                // end_input.val(event.end);
                event_type_input.val(event.type);
                sponsors_image_input.val(event.sponsors_image);
                details_image_input.val(event.details_image);
                photo_image_input.val(event.photo_image);
                video_image_input.val(event.video_image);
                event_external_link_input.val(event.url);
                /*Get event user data*/
                /*organizer_ar_name_input.val(event.event_user.name);
                organizer_en_name_input.val(event.event_user.name);
                organizer_phone_input.val(event.event_user.name);
                organizer_email_input.val(event.event_user.name);
                organizer_website_name_input.val(event.event_user.name);
                organizer_website_url_input.val(event.event_user.name);
                manager_ar_name_input.val(event.event_user.name);
                manager_en_name_input.val(event.event_user.name);
                manager_phone_input.val(event.event_user.phone);
                manager_email_input.val(event.event_user.email);*/
                /*  $.ajax({
                      method: "get",
                      url: "events/show/" + event.user,
                      data: {
                          _token: $("input[name=_token]").val(),
                      },
                      success: function (user) {



                      }
                  });*/
            }
        });


        /*event_external_link_input.val(info.event.event_external_link);
        organizer_ar_name_input.val(info.event.event_user.name);
        organizer_en_name_input.val(info.event.event_user.name);
        organizer_phone_input.val(info.event.event_user.name);
        organizer_email_input.val(info.event.event_user.name);
        organizer_website_name_input.val(info.event.event_user.name);
        organizer_website_url_input.val(info.event.event_user.name);
        manager_ar_name_input.val(info.event.event_user.name);
        manager_en_name_input.val(info.event.event_user.name);
        manager_phone_input.val(info.event.event_user.phone);
        manager_email_input.val(info.event.event_user.email);
        sponsors_image_input.val(info.event.sponsors_image);
        details_image_input.val(info.event.details_image);
        photo_image_input.val(info.event.photo_image);
        video_image_input.val(info.event.video_image);*/

        /*Errors*/
        let title_ar_error = $('#modal-update-event #title_ar_error');
        let title_en_error = $('#modal-update-event #title_en_error');
        let description_en_error = $('#modal-update-event #description_en_error');
        let description_ar_error = $('#modal-update-event #description_ar_error');
        let start_error = $('#modal-update-event #start_error');
        let end_error = $('#modal-update-event #end_error');
        let location_error = $('#modal-update-event #location_error');
        let category_error = $('#modal-update-event #category_error');
        let type_error = $('#modal-update-event #type_error');
        let url_error = $('#modal-update-event #url_error');
        let organizer_ar_name_error = $('#modal-update-event #organizer_ar_name_error');
        let organizer_en_name_error = $('#modal-update-event #organizer_en_name_error');
        let organizer_phone_error = $('#modal-update-event #organizer_phone_error');
        let organizer_email_error = $('#modal-update-event #organizer_email_error');
        let organizer_website_name_error = $('#modal-update-event #organizer_website_name_error');
        let organizer_website_url_error = $('#modal-update-event #organizer_website_url_error');
        let manager_ar_name_error = $('#modal-update-event #manager_ar_name_error');
        let manager_en_name_error = $('#modal-update-event #manager_en_name_error');
        let manager_phone_error = $('#modal-update-event #manager_phone_error');
        let manager_email_error = $('#modal-update-event #manager_email_error');
        let sponsors_image_upload_error = $('#modal-update-event #sponsors_image_upload_error');
        let details_image_upload_error = $('#modal-update-event #details_image_upload_error');
        let photo_gallery_upload_error = $('#modal-update-event #photo_gallery_upload_error');
        let video_gallery_upload_error = $('#modal-update-event #video_gallery_upload_error');
        $('#update_event').click(function () {
            /*Input field*/
            let title_en = title_en_input.val();
            let title_ar = title_ar_input.val();
            let description_en = description_en_input.val();
            let description_ar = description_ar_input.val();
            let event_start = start_input.val();
            let event_end = end_input.val();
            let location = location_input.val();
            let category = category_input.val();
            event_type = event_type_input.val();
            let event_external_link = "";
            let organizer_ar_name = "";
            let organizer_en_name = "";
            let organizer_phone = "";
            let organizer_email = "";
            let organizer_website_name = "";
            let organizer_website_url = "";
            let manager_ar_name = "";
            let manager_en_name = "";
            let manager_phone = "";
            let manager_email = "";
            let sponsors_image = "";
            let details_image = "";
            let photo_image = "";
            let video_image = "";

            switch (event_type) {
                case "0":
                    event_external_link = event_external_link_input.val();
                    break;
                case "1":
                    organizer_ar_name = organizer_ar_name_input.val();
                    organizer_en_name = organizer_en_name_input.val();
                    organizer_phone = organizer_phone_input.val();
                    organizer_email = organizer_email_input.val();
                    organizer_website_name = organizer_website_name_input.val();
                    organizer_website_url = organizer_website_url_input.val();
                    manager_ar_name = manager_ar_name_input.val();
                    manager_en_name = manager_en_name_input.val();
                    manager_phone = manager_phone_input.val();
                    manager_email = manager_email_input.val();
                    sponsors_image = sponsors_image_input.val();
                    details_image = details_image_input.val();
                    photo_image = photo_image_input.val();
                    video_image = video_image_input.val();
                    break;
            }
            $.ajax({
                type: "POST",
                url: "events/create",
                data: {
                    _token: $("input[name=_token]").val(),
                    action: "create",
                    title_en: title_en,
                    title_ar: title_ar,
                    event_start: event_start,
                    event_end: event_end,
                    description_en: description_en,
                    description_ar: description_ar,
                    location: location,
                    category: category,
                    event_type: event_type,
                    event_external_link: event_external_link,
                    organizer_ar_name: organizer_ar_name,
                    organizer_en_name: organizer_en_name,
                    organizer_phone: organizer_phone,
                    organizer_email: organizer_email,
                    organizer_website_name: organizer_website_name,
                    organizer_website_url: organizer_website_url,
                    manager_ar_name: manager_ar_name,
                    manager_en_name: manager_en_name,
                    manager_phone: manager_phone,
                    manager_email: manager_email,
                    sponsors_image: sponsors_image,
                    details_image: details_image,
                    photo_image: photo_image,
                    video_image: video_image,
                },
                success: function (response) {
                    /*Reset values*/
                    if (response['error']) {
                        printErrorMsg(response.error);
                    } else if (response['success']) {
                        title_ar_error.css('display', 'none');
                        $('#successfully-modal').modal('show');
                        title_en_input.val("");
                        title_ar_input.val("");
                        description_en_input.val("");
                        description_ar_input.val("");
                        start_input.val("");
                        end_input.val("");
                        location_input.val("");
                        category_input.val(0);
                        event_type_input.val(0);
                        event_external_link_input.val("");
                        organizer_ar_name_input.val("");
                        organizer_en_name_input.val("");
                        organizer_phone_input.val("");
                        organizer_email_input.val("");
                        organizer_website_name_input.val("");
                        organizer_website_url_input.val("");
                        manager_ar_name_input.val("");
                        manager_en_name_input.val("");
                        manager_phone_input.val("");
                        manager_email_input.val("");
                        sponsors_image_input.val("");
                        details_image_input.val("");
                        photo_image_input.val("");
                        video_image_input.val("");
                        title_en = "";
                        title_ar = "";
                        event_start = "";
                        event_end = "";
                        description_en = "";
                        description_ar = "";
                        location = "";
                        category = "";
                        event_type = "";
                        event_external_link = "";
                        organizer_ar_name = "";
                        organizer_en_name = "";
                        organizer_phone = "";
                        organizer_email = "";
                        organizer_website_name = "";
                        organizer_website_url = "";
                        manager_ar_name = "";
                        manager_en_name = "";
                        manager_phone = "";
                        manager_email = "";
                        sponsors_image = "";
                        details_image = "";
                        photo_image = "";
                        video_image = "";
                        console.log(response['success']);
                        console.log(response['event_fk_id']);
                        console.log(response['event']);
                        $('#modal-add-event').modal('toggle');
                        calendar.refetchEvents();

                    }
                    //prepareCalender();
                    //calendarEl.calendar('removeEvents');
                    /*if ($.isEmptyObject(data.error)) {
                        title_ar_error.css('display', 'none');
                        description_error.css('display', 'none');
                        createForm(data.activity_fk_id, worker, subproject);

                    } else {
                        printErrorMsg(data.error);
                    }*/
                }

            });

            function printErrorMsg(msg) {
                if (msg['title_ar']) {
                    title_ar_error.html(msg['title_ar']);
                    title_ar_error.css('display', 'block');
                } else {
                    title_ar_error.css('display', 'none');
                }
                /*if (msg['description']) {
                    $('#description_error').html(msg['description']);
                    description_error.css('display', 'block');
                } else {
                    description_error.css('display', 'none');
                }*/
            }
        });
    }

    function selectEventType() {
        $('#event_type').click(function () {
            event_type = $('#event_type').val().toString();
            switch (event_type) {
                case "0":
                    data_internal_type.hide();
                    data_external_type.attr('style', 'display:block !important');
                    break;
                case "1":
                    data_internal_type.attr('style', 'display:block !important');
                    data_external_type.hide();
                    break;
            }
        });
    }

    function selectEventTypeUpdate() {
        $('#modal-update-event #event_type').click(function () {
            event_type = $('#modal-update-event #event_type').val().toString();
            switch (event_type) {
                case "0":
                    data_internal_type_update.hide();
                    data_external_type_update.attr('style', 'display:block !important');
                    break;
                case "1":
                    data_internal_type_update.attr('style', 'display:block !important');
                    data_external_type_update.hide();
                    break;
            }
        });
    }


    function getDaysOfWeek(calendar) {
        let startDayWeek = calendar.view.activeStart;
        let endDayWeek = calendar.view.activeEnd;

        var firstDay = new Date(startDayWeek);
        var lastDay = new Date(endDayWeek);

        dayStartWeek = firstDay.toISOString().substring(0, 10);
        dayEndWeek = lastDay.toISOString().substring(0, 10);
        console.log(dayStartWeek)
        console.log(dayEndWeek)
    }

});
