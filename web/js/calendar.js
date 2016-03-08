
var calendar;

var myEvent = {
    title: "my new event",
    start: '2016-02-08T10:30:00',
    end: '2016-02-08T12:30:00'
};


function initCalendar(json) {
    
    calendar = $('#calendar').fullCalendar({
        header: {
            left: 'prev,next today',
            center: 'title',
            right: 'month,agendaWeek,agendaDay'
        },
        weekends: true,
        //defaultDate: '2014-06-12',
        nowIndicator:true, 
        firstDay: 1,
        defaultView: 'agendaWeek',
        editable: false,
        allDaySlot: false,
        minTime: '08:00:00',
        maxTime: '20:00:00',
        scrollTime: '08:00:00',
        slotLabelInterval: '01:00:00',
        slotDuration: '00:15:00',
        businessHours: json.businessHours,
        dayClick: function (date, jsEvent, view) {

            openDialog(date);

//        myEvent.start = date.format();
//        myEvent.end = date.add(60 , 'm').format();
//        calendar.fullCalendar( 'renderEvent', myEvent );
        },
        events: [
            {
                id: 999,
                title: 'Repeating Event',
                start: '2014-06-09T16:00:00'
            },
            {
                id: 999,
                title: 'Repeating Event',
                start: '2014-06-16T16:00:00'
            },
            {
                title: 'Meeting',
                start: '2014-06-12T10:30:00',
                end: '2014-06-12T12:30:00'
            },
            {
                title: 'Lunch',
                start: '2014-06-12T12:00:00'
            },
            {
                title: 'Birthday Party',
                start: '2014-06-13T07:00:00'
            },
            {
                title: 'Click for Google',
                url: 'http://google.com/',
                start: '2014-06-28'
            }
        ]
    });
}

function openDialog(date) {

    var name = $("#name");
    var iniDate = $("#initDate");
    var duration = $("#duration");

    name.val("");
    duration.val(30);

    iniDate.text(date.format());
    $("#dialog").dialog({
        autoOpen: false,
        modal: true,
        width: 400,
        buttons: {
            "Aceptar": function () {
                myEvent.title = name.val();
                myEvent.start = date.format();
                myEvent.end = date.add(duration.val(), 'm').format();
                calendar.fullCalendar('renderEvent', myEvent);
                $(this).dialog("close");
            },
            "Cerrar": function () {
                $(this).dialog("close");
            }
        }
    });

    $("#dialog").dialog("open");

}





  