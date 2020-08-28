<!DOCTYPE html>
<html lang="no">
<head>
    <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1"> 
    <title>EE&H 26.06.2021</title>
    <script src="jquery-3.5.1.min.js"></script>
    
    <link href="https://fonts.googleapis.com/css?family=Lora:400,700|Montserrat:300" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/site-specific.css">
    <link rel="stylesheet" type="text/css" href="css/stil.css">
    <link rel="stylesheet" type="text/css" href="css/contact-form.css">
    <link rel="stylesheet" type="text/css" href="css/container.css">
    <link rel="stylesheet" type="text/css" href="css/ceremony.css">
    <link rel="stylesheet" type="text/css" href="css/toastmaster.css">
    <link rel="stylesheet" type="text/css" href="css/giftlist.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    
</head>

<body onload="setTop()">
    <div id="nav" class="closed">
        <ul>
            <li><a class="info" onclick="scrollToPage(1)" >Til toppen</a></li>
            <li><a class="info" onclick="scrollToPage(2)">Vielse</a></li>
            <li><a class="info" onclick="scrollToPage(3)">Fest</a></li>
            <li><a class="info" onclick="scrollToPage(4)">Registrer</a></li>
            <li><a class="info" onclick="scrollToPage(5)">Toastmaster</a></li>
            <li><a class="info" onclick="scrollToPage(6)">Reise og overnatting</a></li>
            <li><a class="info" onclick="scrollToPage(7)">Gaveliste</a></li>
            <li><a class="info" href="bilder">Bilder</a></li>
        </ul>
        <a id="ham" class="hamClass" onclick="openNav(false)"><i class="material-icons">menu</i></a>
    </div>
    <div class="page" id="page1">
        <br>
        <div id="marry">
            <h2 >Vi gifter oss!</h2>
            <h1>Esther-Emilie & Håkon</h1>
            <h2>26.06.2021</h2>
        </div>
    </div>
    
    <div class="page" id="page2">
        <div id="page2img" class="pageimg"></div>
        <div class="container map-container" id="ceremony">
            <div id="ceremony-info" class="map-info">
                <h1>Vielse</h1>
                <h2>13:30</h2>
                <h2>Lenvik kirke</h2>
                <h3>Bjorelvnes, Senja kommune</h3>
            </div>
            <div id="ceremony-map" class="container-info map">
                <iframe class="iframeMap" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d126676.19675221508!2d17.81700339631823!3d69.25660064707294!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x45db48dbd0c4d4f1%3A0xff715b332978ebc9!2sLenvik%20kirke!5e0!3m2!1sno!2sus!4v1595196145854!5m2!1sno!2sus"  frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
            </div>
        </div>
    </div>
    <div class="page" id="page3">
        <div id="page3img" class="pageimg"></div>
        <div class="container map-container" id="dinner">
            <div id="dinner-info" class="map-info">
                <h1>Fest</h1>
                <h2>17:00</h2>
                <h2>Skoghus leirsted</h2>
                <h3>Senja</h3>
            </div>
            <div id="dinner-map" class="container-info map">
                <iframe class="iframeMap" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d54813.494225025825!2d17.97606152424422!3d69.25975139488655!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x45db4420e30e7569%3A0xb8028c1b421dab08!2sSkoghus%20Leirsted!5e0!3m2!1sno!2sno!4v1595330309238!5m2!1sno!2sno"  frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
            </div>
        </div>
    </div>
    <div class="page" id="page4">
    <div  id="page4img" class="pageimg"></div>
    <div class="container" id="registration">
        
           
            <div class="container-info" id="form">
            <h1>Registrer om du/dere kommer eller ikke</h1>
            <form id="contact-form" onsubmit="return sendRSVP()" method="post"> 
            <div>
                <input type="text" name="name" required>
                <label class="infoLabel">Navn</label>
            </div>
            <div>
                <input type="email" name="email" required>
                <label class="infoLabel">Email</label>
            </div>
            <div>
                <div class="radioDiv">
                    <input id="can" type="radio" name="rsvp" value="Kan komme" required class="radio-button">
                    <label for="can" class="radioLabel">Jeg/Vi kan komme</label>
                </div>
                <div class="radioDiv">                    
                    <input id="cannot" type="radio" name="rsvp" value="Kan IKKE komme" required class="radio-button">
                    <label for="cannot" class="radioLabel">Jeg/Vi kan <b>IKKE</b> komme</label>
                </div>
            </div>
           
            <div>
            <input type="submit" name="submit" value="Send">
            </div>
            </form>
            </div>
            
            <div class="container-info" id="submitted-form" style="display:none">
                <h1>Takk for svaret</h1>
            </div>
            <div class="container-info" id="unsubmitted-form" style="display:none">
                <h1>Det skjedde en feil. Venligst kontakt 48075305 for å si i fra at du kommer.</h1>
            </div>
            

        </div>
    </div>
    <div class="page" id="page5">
        <div id="toastmaster" class="container">
            <h1>Toastmastere</h1>
            <div id="toastmaster-table">
                <div class="toastmaster-info" id="toastmaster-left">
                    <div class="toastmaster-img" id="toastmastermale"></div>
                    <div class="toastmaster-name">
                        <p>Navn: Torleiv Fjalestad<br>
                        Kjenner brudeparet fra: Soltun og Trondheim. Bor med Håkon.
                        </p>
                    </div>
                </div>
                <div class="toastmaster-info" id="toastmaster-right">
                    <div class="toastmaster-img" id="toastmasterfemale"></div>
                    <div class="toastmaster-name">
                        <p>Navn: Kristin Ramsli Søyland<br>
                        Kjenner brudeparet fra: Fjellheim/NN-team og Trondheim. Bor med Esther-Emilie.
                        </p>
                    </div>
                </div>
            </div>
            <button id="toastmaster-contact-button" onclick="setContactForm(true)">Kontakt oss</button>
                    
            <div id="overlay"></div>
            <div id="toastmaster-contact-form">
                <h1>Send inn her om du skal gjøre noe</h1>
                <form id="contact-form-toastmaster" onsubmit="return sendToastmaster()" method="post"> 
                    <div>
                        <input type="text" name="name" required/>
                        <label class="infoLabel">Navn</label>
                    </div>
                    <div>
                        <input type="email" name="email" required/>
                        <label class="infoLabel">Email</label>
                    </div>
                    <div>
                        <input type="text" name="what" required/>
                        <label class="infoLabel">Hva du skal gjøre</label>
                    </div>
                    <div>
                        <input type="text" name="relationship" required/>
                        <label class="infoLabel">Hvordan kjenner du brudeparet</label>
                    </div>
                    <div>
                        <input type="number" name="minutes" min="0" oninput="validity.valid||(value='');" required/>
                        <label class="infoLabel">Antall minutt</label>
                    </div>
                    
                    <div>
                        <input type="submit" name="submit" value="Send">
                    </div>
                </form>
            </div>

        </div>

    </div>
    <div class="page" id="page6">
        <div class="container" id="travel">
            <h1>Reise</h1>
                <h2>Alternativer</h2>
                <p>Fly til Bardufoss + flybuss/leiebil<br>
                Fly til Tromsø + hurtigbåt/leiebil<br>
                Fly til Evenes + taxi eller buss og hurtigbåt/leiebil</p>
        </div>
    </div>
    <div class="page" id="page7">
        <div class="container" id="giftlistContainer">
        <h1>Gaveliste</h1>
            <input type="checkbox" id="showZeroRemaining" checked><label>Vis kjøpte</label>
            <select id="sortGiftList">
                <option id="sortInitial" value="id">Sorter</option>
                <option value="gjenstaende ASC">Gjenstående stigende</option>
                <option value="gjenstaende DESC">Gjenstående synkende</option>
                <option value="price ASC">Pris stigende</option>
                <option value="price DESC">Pris synkende</option>
                <option value="store DESC">Butikk</option>
            </select>
            <div id="giftlist"></div>
        </div>
        <div id="popup"></div>
    </div>
<script src="js/functions.js"></script>
<script>
    var page = 1;
    const PERCENTAGE = 0.15;
    var positionY = 0;
    var deltaYvar = 0;
    var scrolled = false;
    var ctrl = false;
    var shift = false;
    var scrollDiv = true;
    const navEl = document.getElementById("nav");
    const pagesEl = document.querySelectorAll(".page");
    var WINDOWHEIGHT = window.innerHeight;
    $("#showZeroRemaining").on("change", giftList);
    $("#sortGiftList").on("change",updateSort);
    function updateSort(){
        giftList();
        $("#sortInitial").css("display","none");
    }
    function setTop(){
        setColor();
        giftList();
        
        for (var i = 0; i < pagesEl.length; i++){
            pagesEl[i].style.top = (i-page+1)*100+"%";
            pagesEl[i].style.transition = "1s ease";
        } 
        const rows = document.querySelectorAll("td[data-href]");
        rows.forEach(row =>{
            row.addEventListener("click", () =>{
                window.open(row.dataset.href);
            });
        });
        checkURL();
    }

    function setColor(){
        var infoEl = document.querySelectorAll(".info");
        for (var i = 0; i < infoEl.length; i++){
            if(page-1==i){
                infoEl[i].style.color = "khaki";
            }
            else if(window.innerWidth>1279)
                infoEl[i].style.color = "white";
            else
                infoEl[i].style.color = "black";
        }
    }
    function setContactFormFalse(){
        setContactForm(false);
    }
    function setContactForm(open){
        var page5El= document.getElementById("page5");
        var buttonEl = document.getElementById("toastmaster-contact-button");
        var toastmasterFormEl = document.getElementById("toastmaster-contact-form");
        var overlayEl = document.getElementById("overlay");
        
        if(open){
            buttonEl.style.setProperty('display', 'none', 'important');
            toastmasterFormEl.style.setProperty('display', 'block', 'important');
            overlayEl.style.background = "rgba(0,0,0,0.6)";
            overlayEl.style.setProperty('z-index', 3);
            overlayEl.addEventListener("click", setContactFormFalse, false);
            
            setOverlayHeight(toastmasterFormEl.clientHeight+100);
            
        }
        else{
            buttonEl.style.setProperty('display', 'block', 'important');
            toastmasterFormEl.style.setProperty('display', 'none', 'important');
            overlayEl.removeEventListener("click", setContactFormFalse, false);
            overlayEl.style.background = "none";
            overlayEl.style.setProperty('z-index', -3);
            setOverlayHeight(0);
        } 
    }
    function sendRSVP(){
        var buttonEl = document.getElementById("submit");
        var name = document.querySelector('input[name="name"]').value;
        var email = document.querySelector('input[name="email"]').value;
        var rsvp = document.querySelector('input[name="rsvp"]:checked').value;
        
        $.ajax({
            type:"post",
            url:"submitted",
            data: "name="+name+"&email="+email+"&rsvp="+rsvp,
            success: function(data){
               
                if (data=='1'){
                    document.getElementById("form").style.display = "none";
                    document.getElementById("submitted-form").style.display = "block";
                }
                else{
                    document.getElementById("form").style.display = "none";
                    document.getElementById("unsubmitted-form").style.display = "block";  
                }
            },
            error: function(data){
                document.getElementById("form").style.display = "none";
                document.getElementById("usubmitted-form").style.display = "block";

            }
        });
        return false;
    }
   
    function kjop(id){
        var number = document.getElementById("number"+id);
        var popupEl = document.getElementById("popup");
        var nameEl = document.getElementById("name"+id);
        var bought = number.value;
        if (bought=="")
            bought = 0;
        if(bought>0){
            $.ajax({
                type: "post",
                url: "updateGiftList",
                data: "id="+id+"&bought="+bought,
                success: function(data){
                    if (data){
                        console.log(data);
                    }
                    else
                        console.log("FEIL\n"+data);
                }
            })
            setTimeout(() =>{
                giftList();
                popupEl.style.display = "block";
                popupEl.innerHTML ="<h1>Du har nå registrert at du har kjøpt " +bought+ " stk " +nameEl.innerHTML.toLowerCase()+".<br>Takk for gaven</h1>";
                setTimeout(() =>{
                    popupEl.style.display = "none";
                },8000);
                
            },200);
        }
        
    }
    
    window.addEventListener("resize", event =>{
        setColor();
        WINDOWHEIGHT = window.innerHeight;
        if(window.innerWidth>1279){
            var iconEl = document.querySelector("#nav");
            if(iconEl.classList.contains("opened")){
                iconEl.classList.add("closed");
                iconEl.classList.remove("opened");
                document.querySelector(".material-icons").innerHTML="menu";
            }
        }
    });
    
    
   
    window.addEventListener("wheel", scrollDelta);
    window.addEventListener("touchstart",touchStart);
    window.addEventListener("touchmove", touchMove);
    window.addEventListener("touchend",touchEnd);
    window.addEventListener("keydown", keyDown);
    window.addEventListener("keyup",keyUp);
 
    function scrollToPage(pageNumber){
        page = pageNumber;
        
        var navEl = document.getElementById("nav");
        openNav(true);
        scrollElement();
        
    }
    function keyDown(e){
        
        if(e.keyCode==17)
            ctrl = true;
        else if (e.keyCode==16)
            shift = true;
    }
    function keyUp(e){
        if(e.keyCode==17){
            ctrl = false;
            
        }
        else if (e.keyCode==16)
            shift = false;
    }
    function scrollDelta(e){
        
        deltaYvar = -e.deltaY*WINDOWHEIGHT;
       
        scroll();
    }
    function checkScroll(){
        
        var e = document.getElementById("page"+ page.toString());
       
        if ((e.scrollHeight - e.scrollTop != e.clientHeight)&&deltaYvar<0){
            scrolled = true;
            
            setTimeout(() => {
                scrolled=false;
               
            }, 500);
            return false;
        }
            
        else if (e.scrollTop!=0&&deltaYvar>0){
            scrolled = true;
            setTimeout(() => {
                scrolled=false;
                
            }, 500);
            return false;
            
        }
            
        return true;
        
        
    }
    function scroll(){
        var scrollDiv = checkScroll();
        
        if (!scrolled && !ctrl && !shift &&navEl.classList.contains("closed")&&scrollDiv){
            if (deltaYvar<-WINDOWHEIGHT*PERCENTAGE){ 
                if(page+1<=pagesEl.length){
                    page++;
                }
            } 
            else if(deltaYvar>WINDOWHEIGHT*PERCENTAGE){
                if(page>=2)
                    page--;
            }
            scrollElement();
        }
    }

    function scrollElement(){
        for (var i = 0; i < pagesEl.length; i++){
            pagesEl[i].style.transition = "1s ease";
            pagesEl[i].style.top = ((i+1)-page)*100+"%";
        }
        setColor();
        var bodyEl = document.querySelector("body");
        if(page==1){
                bodyEl.style['overscroll-behavior'] = "none";
        }
        else{
            bodyEl.style['overscroll-behavior'] = "contain";
        }
        var pageEl = document.getElementById("page"+page.toString());
        pageEl.style.height = "100%";
        scrolled = true;
        var navEl = document.getElementById("nav");
        if(page==1){
            navEl.classList.remove("scrolled");
        }
        else
            navEl.classList.add("scrolled");
        setTimeout(() => {
            scrolled=false;
        }, 1000);
    }
    function touchStart(e){
        positionY = e.touches[0].clientY;
        
        scrollDiv = checkScroll();
       

    }
    function touchMove(e){
        if(!scrolled&&scrollDiv&&navEl.classList.contains("closed")){
            deltaYvar = e.changedTouches[0].clientY -positionY;
            var percentage = deltaYvar/WINDOWHEIGHT;
            for (var i = 0; i < pagesEl.length; i++){
                //ikke på topp eller bunn og prøve å scrolle opp eller ned
                if(!((page==1&&percentage>0)||(page==pagesEl.length&&percentage<0))){
                    pagesEl[i].style.transition = "none";
                    pagesEl[i].style.top = ((i+1)-page+percentage)*100+"%";
                }
            }
        }
    }

    function touchEnd(e){
        deltaYvar = e.changedTouches[0].clientY -positionY;
        if(scrollDiv)
            scroll();
       
    }
    
    function giftList(){
        $('#giftlist').load("giftlist", {'order': document.getElementById("sortGiftList").value, 'zero': $("#showZeroRemaining").is(":checked")});         
    }
    
    function checkURL(){
        var word = window.location.href;
        if(word.lastIndexOf("#")>0){
            var letter = word.substr(word.lastIndexOf("#")+1);
            if(!isNaN(letter)&&letter.length>0){
                setTimeout(()=>{
                    letter=parseInt(letter);
                    if (letter>pagesEl.length)
                        letter=1;
                    scrollToPage(parseInt(letter));
                },200);
            }
            window.history.replaceState({},
            document.title, word.substr(0,word.lastIndexOf("#")));
        }
        
    }
    function setOverlayHeight(height){
        var toastmasterEl = document.getElementById("toastmaster")
        if(height>window.innerHeight)
            toastmasterEl.style.height= height+"px";
        else
            toastmasterEl.style.height = "100%";
        
    }
</script>
</body>
</html>