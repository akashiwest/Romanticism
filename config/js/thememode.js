 if(localStorage.romanticismTheme)
        document.body.classList.add("mdui-theme-layout-dark");
 
        if(!localStorage.romanticismTheme)
        document.body.classList.add("mdui-theme-layout-light");

    document.getElementById("switch-theme").addEventListener(
        "click",
        () => document.body.classList.toggle("mdui-theme-layout-dark") ?
            (localStorage.romanticismTheme = true) :
            (delete localStorage.romanticismTheme)
        
    );