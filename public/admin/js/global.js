$(function() {
    var Catogories = $("nav.navbar.navbar-default > div.container > div.collapse.navbar-collapse.navbar-ex1-collapse > ul.nav.navbar-nav").eq(0);

    function setActiveMenu(element) {
        for (var i = 0; i < Catogories.find("li").length; i++) {
            $(Catogories.find("li")[i]).removeClass("active");
        }
        element.addClass("active");
    }
    Catogories.find("li").eq(0).click(function() {
        if ($(this).find("a").text() === "Claim") {
            setActiveMenu($(this));
            $.get(url + "claim", function(viewClaim) {
                $("div#page_container").empty().append(viewClaim);
            });
        }
    });
    Catogories.find("li").eq(1).click(function() {
        if ($(this).find("a").text() === "Docket") {
            setActiveMenu($(this));
            $.get(url + "docket", function(viewDocket) {
                $("div#page_container").empty().append(viewDocket);
            });
        }
    });
    Catogories.find("li").eq(4).click(function() {
        if ($(this).find("a").text() === "Employee") {
            setActiveMenu($(this));
            $.get(url + "employee", function(viewEmployee) {
                $("div#page_container").empty().append(viewEmployee);
            });
        }
    });
    Catogories.find("li").eq(2).click(function() {
        if ($(this).find("a").text() === "Trial Fee") {
            setActiveMenu($(this));
            $.get(url + "trialFee", function(viewEmployee) {
                $("div#page_container").empty().append(viewEmployee);
            });
        }
    });
    Catogories.find("li").eq(3).click(function() {
        if ($(this).find("a").text() === "Invoice") {
            setActiveMenu($(this));
            $.get(url + "invoice", function(viewInvoice) {
                $("div#page_container").empty().append(viewInvoice);
            });
        }
    });
    Catogories.find("li").eq(5).click(function() {
        if ($(this).find("a").text() === "Report Claim") {
            setActiveMenu($(this));
            $.get(url + "report", function(viewReport) {
                $("div#page_container").empty().append(viewReport);
            });
        }
    });
    Catogories.find("li").eq(6).click(function() {
        if ($(this).find("a").text() === "Report Docket") {
            setActiveMenu($(this));
            $.get(url + "reportTask", function(viewReportTask) {
                $("div#page_container").empty().append(viewReportTask);
            });
        }
    });
    Catogories.find("li").eq(7).click(function() {
        if ($(this).find("a").text() === "Change Password") {
            setActiveMenu($(this));
            $.get(url + "changePassword", function(viewChangePassword) {
                $("div#page_container").empty().append(viewChangePassword);
            });
        }
    });
});