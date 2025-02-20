$(document).ready(function() {
    let fontSize = localStorage.getItem("fontSize") ? parseInt(localStorage.getItem("fontSize")) : 18;
    let serif = localStorage.getItem("fontFamily") ? localStorage.getItem("fontFamily") === "serif" : true;

    function applySettings() {
        $(".mdui-typo p").css({
            "font-size": fontSize + "px",
        });
        $("body").css({
            "font-family": serif ? "'Noto Serif SC', serif" : "sans-serif"
        });
        $("span").css({
            "font-family": serif ? "'Noto Serif SC', serif" : "sans-serif"
        });
        $("a").css({
            "font-family": serif ? "'Noto Serif SC', serif" : "sans-serif"
        });
        $("#fontSize").text(fontSize);
    }

    $("#decrease").click(function() {
        if (fontSize > 12) {
            fontSize--;
            localStorage.setItem("fontSize", fontSize);
            applySettings();
        }
    });

    $("#increase").click(function() {
        if (fontSize < 25) {
            fontSize++;
            localStorage.setItem("fontSize", fontSize);
            applySettings();
        }
    });

    $("#toggleFont").click(function() {
        serif = !serif;
        localStorage.setItem("fontFamily", serif ? "serif" : "sans-serif");
        applySettings();
    });

    applySettings();
});