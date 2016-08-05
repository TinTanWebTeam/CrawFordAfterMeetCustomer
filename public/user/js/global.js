$(function() {
    var Catogories = $("nav.navbar.navbar-default > div.container > div.collapse.navbar-collapse.navbar-ex1-collapse > ul.nav.navbar-nav").eq(0);

    function setActiveMenu(element) {
        for (var i = 0; i < Catogories.find("li").length; i++) {
            $(Catogories.find("li")[i]).removeClass("active");
        }
        element.addClass("active");
    }
    Catogories.find("li").eq(0).click(function() {
        if ($(this).find("a").text() === "Profile") {
            setActiveMenu($(this));
            $.get(url + "user/profile", function(viewProfileUser) {
                $("div#page_container").empty().append(viewProfileUser);
            });
        }
    });
    Catogories.find("li").eq(1).click(function() {
        if ($(this).find("a").text() === "Task") {
            setActiveMenu($(this));
            $.get(url + "user/task", function(viewTaskUser) {
                $("div#page_container").empty().append(viewTaskUser);
            });
        }

    });

});