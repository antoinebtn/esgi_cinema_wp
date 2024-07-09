jQuery(document).ready(function($) {
    $('.add-schedule-row').on('click', function(e) {
        e.preventDefault();
        var filmId = $(this).siblings('input[type="hidden"]').val();
        var row = '<div class="schedule-row"><input type="text" name="cinema_schedule[' + filmId + '][]" value="" /><button class="remove-schedule-row button">Supprimer</button></div>';
        $(this).siblings('.schedules').append(row);
    });

    $(document).on('click', '.remove-schedule-row', function(e) {
        e.preventDefault();
        $(this).closest('.schedule-row').remove();
    });
});
