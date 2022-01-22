$(".chosen").val(1).select2({
    matcher: function(params, data) {
        if (data.id === "0") { // <-- option value of "Other", always appears in results
            return data;
        } else {
            return $.fn.select2.defaults.defaults.matcher.apply(this, arguments);
        }
    },
});