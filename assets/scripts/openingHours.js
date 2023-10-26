$(function () {
    let timeChoice = $("#reservation_time_hour");
    let dateField = $("#reservation_date");
    let closingMessage = $("#closing-message");
    let reservationTime = $("#reservation_time");

    dateField.on("change", function () {
        let date = $(this).val();
        timeChoice.find("option").remove();
        $.ajax({
            type: "GET",
            url: `/reservation/date?date=${date}`,
            dataType: "json",
            success: function (data) {

                let noonOpeningHours = [];
                let eveningOpeningHours = [];

                $.each(data, function (key, value) {
                    if (value != null) {
                        if (value < 16) {
                            noonOpeningHours.push(value);
                        } else {
                            eveningOpeningHours.push(value);
                        }
                    }
                });

                if(!noonOpeningHours.length && !eveningOpeningHours.length) {
                    reservationTime.css("display", "none");
                    closingMessage.text("Le restaurant est fermé, veuillez choisir une autre date");
                } else {
                    reservationTime.css("display", "flex");
                    closingMessage.text("");
                    let options;

                    $.each(noonOpeningHours, function (key, value) {
                        options += '<option value="' + value + '">' + value + "</option>";
                    });
                    $.each(eveningOpeningHours, function (key, value) {
                        options += '<option value="' + value + '">' + value + "</option>";
                    });

                    timeChoice.empty().append(options);
                }

            },
            error: function () {
                alert("Une erreur est survenue");
            },

        });
    });
});
