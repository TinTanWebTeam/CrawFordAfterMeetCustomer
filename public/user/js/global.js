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
    Catogories.find("li").eq(4).click(function() {
        if ($(this).find("a").text() === "Employee") {
            setActiveMenu($(this));
            $.get(url + "employee", function(viewEmployee) {
                $("div#page_container").empty().append(viewEmployee);
            });
        }
    });

});