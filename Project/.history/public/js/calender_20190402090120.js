$(document).ready(function () {

    $('#calendar').fullCalendar({
        themeSystem: 'bootstrap4',
        defaultView: 'month',
        header: {
            left: 'prev,next today',
            center: 'title',
            right: 'month,agendaWeek,agendaDay,listMonth'
        },
        weekNumbers: true,
        eventLimit: true,
    });

});

var showModal = () => {
  
}