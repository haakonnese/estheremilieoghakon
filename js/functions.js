function openNav(home){
        var iconEl = document.querySelector("#nav");
        
        if(iconEl.classList.contains("opened")||home){
            iconEl.classList.add("closed");
            iconEl.classList.remove("opened");
            document.querySelector(".material-icons").innerHTML="menu";
        }
        else{
            iconEl.classList.add("opened");
            iconEl.classList.remove("closed");
            document.querySelector(".material-icons").innerHTML="clear";
        }
    }