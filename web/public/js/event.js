$('.js_allDay').on('change', function() {
    if (this.checked) {
       $('#appbundle_event_start_time').hide();
       $('#appbundle_event_end_time').hide();
    }else{
        $('#appbundle_event_start_time').show();
        $('#appbundle_event_end_time').show();
    }
});