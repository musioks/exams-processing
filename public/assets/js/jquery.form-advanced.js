!function (n) {
    "use strict";
    var e = function () {
        this.$body = n("body"), this.$window = n(window)
    };
    e.prototype.initSelect2 = function () {
        n(".select2").select2(), n(".select2-limiting").select2({maximumSelectionLength: 2})
    }, e.prototype.initMaxLength = function () {
        n("input#defaultconfig").maxlength({
            warningClass: "badge badge-success",
            limitReachedClass: "badge badge-danger"
        }), n("input#thresholdconfig").maxlength({
            threshold: 20,
            warningClass: "badge badge-success",
            limitReachedClass: "badge badge-danger"
        }), n("input#alloptions").maxlength({
            alwaysShow: !0,
            separator: " out of ",
            preText: "You typed ",
            postText: " chars available.",
            validate: !0,
            warningClass: "badge badge-success",
            limitReachedClass: "badge badge-danger"
        }), n("textarea#textarea").maxlength({
            alwaysShow: !0,
            warningClass: "badge badge-success",
            limitReachedClass: "badge badge-danger"
        }), n("input#placement").maxlength({
            alwaysShow: !0,
            placement: "top-left",
            warningClass: "badge badge-success",
            limitReachedClass: "badge badge-danger"
        })
    }, e.prototype.initTimePicker = function () {
        jQuery("#timepicker").timepicker({
            defaultTIme: !1,
            icons: {up: "mdi mdi-chevron-up", down: "mdi mdi-chevron-down"}
        }), jQuery("#timepicker2").timepicker({
            showMeridian: !1,
            icons: {up: "mdi mdi-chevron-up", down: "mdi mdi-chevron-down"}
        }), jQuery("#timepicker3").timepicker({
            minuteStep: 10,
            icons: {up: "mdi mdi-chevron-up", down: "mdi mdi-chevron-down"}
        })
    }, e.prototype.initMask = function () {
        n(".date").mask("00/00/0000"), n(".time").mask("00:00:00"), n(".date_time").mask("00/00/0000 00:00:00"), n(".cep").mask("00000-000"), n(".crazy_cep").mask("0-00-00-00"), n(".phone").mask("0000-0000"), n(".phone_with_ddd").mask("(00) 0000-0000"), n(".phone_us").mask("(000) 000-0000"), n(".mixed").mask("AAA 000-S0S"), n(".cpf").mask("000.000.000-00", {reverse: !0}), n(".cnpj").mask("00.000.000/0000-00", {reverse: !0}), n(".money").mask("000.000.000.000.000,00", {reverse: !0}), n(".money2").mask("#.##0,00", {reverse: !0}), n(".ip_address").mask("099.099.099.099"), n(".percent").mask("##0,00%", {reverse: !0})
    }, e.prototype.initDatePicker = function () {
        jQuery("#datepicker").datepicker(), jQuery("#datepicker-autoclose").datepicker({
            autoclose: !0,
            todayHighlight: !0,
            format: "yyyy-mm-dd"
        }),
      jQuery("#datepicker-inline").datepicker(), jQuery("#datepicker-multiple-date").datepicker({
            format: "yyyy-mm-dd",
            clearBtn: !0,
            multidate: !0,
            multidateSeparator: ","
        }), jQuery("#date-range").datepicker({toggleActive: !0})
    }, e.prototype.initDateRangePicker = function () {
        n(".input-daterange-datepicker").daterangepicker({
            buttonClasses: ["btn", "btn-sm"],
            applyClass: "btn-success",
            cancelClass: "btn-light"
        }), n(".input-daterange-timepicker").daterangepicker({
            timePicker: !0,
            timePickerIncrement: 30,
            locale: {format: "MM/DD/YYYY h:mm A"},
            buttonClasses: ["btn", "btn-sm"],
            applyClass: "btn-success",
            cancelClass: "btn-light"
        }), n(".input-limit-datepicker").daterangepicker({
            format: "MM/DD/YYYY",
            minDate: "06/01/2018",
            maxDate: "06/30/2018",
            buttonClasses: ["btn", "btn-sm"],
            applyClass: "btn-success",
            cancelClass: "btn-light",
            dateLimit: {days: 6}
        }), n("#reportrange span").html(moment().subtract(29, "days").format("MMMM D, YYYY") + " - " + moment().format("MMMM D, YYYY")), n("#reportrange").daterangepicker({
            format: "MM/DD/YYYY",
            startDate: moment().subtract(29, "days"),
            endDate: moment(),
            minDate: "01/01/2017",
            maxDate: "12/31/2020",
            dateLimit: {days: 60},
            showDropdowns: !0,
            showWeekNumbers: !1,
            timePicker: !1,
            timePickerIncrement: 1,
            timePicker12Hour: !0,
            ranges: {
                Today: [moment(), moment()],
                Yesterday: [moment().subtract(1, "days"), moment().subtract(1, "days")],
                "Last 7 Days": [moment().subtract(6, "days"), moment()],
                "Last 30 Days": [moment().subtract(29, "days"), moment()],
                "This Month": [moment().startOf("month"), moment().endOf("month")],
                "Last Month": [moment().subtract(1, "month").startOf("month"), moment().subtract(1, "month").endOf("month")]
            },
            opens: "left",
            drops: "down",
            buttonClasses: ["btn", "btn-sm"],
            applyClass: "btn-success",
            cancelClass: "btn-light",
            separator: " to ",
            locale: {
                applyLabel: "Submit",
                cancelLabel: "Cancel",
                fromLabel: "From",
                toLabel: "To",
                customRangeLabel: "Custom",
                daysOfWeek: ["Su", "Mo", "Tu", "We", "Th", "Fr", "Sa"],
                monthNames: ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"],
                firstDay: 1
            }
        }, function (e, t, a) {
            console.log(e.toISOString(), t.toISOString(), a), n("#reportrange span").html(e.format("MMMM D, YYYY") + " - " + t.format("MMMM D, YYYY"))
        })
    }, e.prototype.init = function () {
        this.initSelect2(), this.initMaxLength(), this.initTimePicker(), this.initMask(), this.initDatePicker(), this.initDateRangePicker()
    }, n.AdvanceFormApp = new e, n.AdvanceFormApp.Constructor = e
}(window.jQuery), function (e) {
    "use strict";
    window.jQuery.AdvanceFormApp.init()
}();