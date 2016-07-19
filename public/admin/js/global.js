$(function () {
    var Catogories = $("nav.navbar.navbar-default > div.container > div.collapse.navbar-collapse.navbar-ex1-collapse > ul.nav.navbar-nav").eq(0);
    Catogories.find("li").eq(0).click(function () {
        if($(this).find("a").text() === "Claim"){
            $.get(url + "claim",function (viewClaim) {
                $("div#page_container").empty().append(viewClaim);
            });
        }
    });
});