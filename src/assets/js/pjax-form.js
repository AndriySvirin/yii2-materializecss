/**
 * Form js.
 * @type type
 */

$(document).on('pjax:complete', function (data) {
    $('form', this).triggerFieldPlaceholder();
});

/**
 * On forms with pjax fix placeholder element.
 * @returns {undefined}
 */
$.fn.triggerFieldPlaceholder = function () {
    $('input', this).each(function () {
        if (this.value) {
            $(this).siblings('label').addClass('active');
        }
    });
};
