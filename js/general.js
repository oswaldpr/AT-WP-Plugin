(function ($) {
    $(document).ready(function () {
        const $body = $("body");
        $body.on('click', ".additionalPostText", toogleAdditionalTextColor);

    });
}(jQuery));

function toogleAdditionalTextColor() {
    const $this = $(this);
    const hasClass = $this.hasClass('text-success');
    $this.toggleClass("text-success", !hasClass);
    $this.toggleClass("box", hasClass);
}