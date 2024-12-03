document.addEventListener('DOMContentLoaded', function() {
    let calendarEl = document.getElementById('calendar');
    let calendar = new FullCalendar.Calendar(calendarEl, {
    initialDate: new Date(), // Posiciona el calendario en el día actual
    locale: 'es', // Configura el idioma en español
    timeZone: 'America/Argentina/Buenos_Aires', // Zona horaria de Buenos Aires
    initialView: 'dayGridMonth',
    headerToolbar: {
        left: 'prev,next today',
        center: 'title',
        right: 'dayGridMonth,timeGridWeek,timeGridDay'
    },
    editable: true,
    events: '../servidor/fullCalendar/reservas.php'
    });
    calendar.render();
});