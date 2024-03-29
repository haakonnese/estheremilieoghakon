<!DOCTYPE html>
<html lang="no">

<head>
    <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1">
    <title>EE&H 26.06.2021</title>
    <script src="jquery-3.5.1.min.js"></script>
    <link href="background-images/logo.png" rel="icon" type="image/png">
    <link href="https://fonts.googleapis.com/css?family=Lora:400,700|Montserrat:400" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/site-specific.css">
    <link rel="stylesheet" type="text/css" href="css/stil.css">
    <link rel="stylesheet" type="text/css" href="css/contact-form.css">
    <link rel="stylesheet" type="text/css" href="css/container.css">
    <link rel="stylesheet" type="text/css" href="css/ceremony.css">
    <link rel="stylesheet" type="text/css" href="css/toastmaster.css">
    <link rel="stylesheet" type="text/css" href="css/giftlist.css">
    <link rel="stylesheet" type="text/css" href="css/travel.css?ver=1.1">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

</head>

<body onload="setTop()">
    <div id="nav" class="closed">
        <ul>
            <li><a class="info a" onclick="scrollToPage(1)" style="color: khaki;">Til toppen</a></li>
            <li><a class="info a" onclick="scrollToPage(2)">Korona</a></li>
            <li><a class="info a" onclick="scrollToPage(3)">Vielse</a></li>
            <li><a class="info a" onclick="scrollToPage(4)">Fest</a></li>
            <li><a class="info a" onclick="scrollToPage(5)">Registrer</a></li>
            <li><a class="info a" onclick="scrollToPage(6)">Toastmaster</a></li>
            <li><a class="info a" onclick="scrollToPage(7)">Reise og overnatting</a></li>
            <li><a class="info a" onclick="scrollToPage(8)">Ønskeliste</a></li>
            <li><a class="info a" href="bilder">Bilder</a></li>
        </ul>
        <a id="ham" class="hamClass a" onclick="openNav(false)"><i class="material-icons">menu</i></a>
    </div>
    <div class="page" id="page1">
        <br>
        <div id="marry">

            <h3>Vi gifter oss!</h3>
            <h2>Esther-Emilie & Håkon</h2>
            <h3>26.06.2021</h3>
            <h3 id="countDown"></h3>
            <i class="arrow updown" id="arrow1"></i>
        </div>
    </div>
    <div class="page fade" id="page2">
        <div class="container" id="corona">
            <h2>Koronainformasjon</h2>
            <p>Det ser ut til at koronasituasjonen også i år setter en begrensing for bryllupsfeiringer.
                Slik situasjonen er i dag, og ut i fra de signalene regjeringen har gitt, ser det ut til at det vil være
                en begrensning på 50 personer under bryllupsfesten. Vi tar foreløpig utgangspunkt i dette.</p>
            <p>Selv om det skulle være en begrensning på 50 personer, ønsker vi å gjennomføre feiringen så normalt som
                mulig, innenfor de retningslinjene som er satt.
                Vi setter derfor STOR pris på om du ønsker å komme og feire dagen sammen med oss, og registrer dette.
            </p>
            <!-- <p>

                <a style="cursor: pointer; text-decoration: underline;
  color: blue;" onclick="scrollToPage(5)">her</a>. 
            </p> -->
            <p>
                Etter svarfristen vil vi, dersom det blir nødvendig, gjøre en prioritering. Dersom du har gitt
                beskjed at du vil
                komme, vil du få beskjed innen 5. mai om det er plass til deg eller ikke.
            </p>
            <p>Vi skjønner at mye er usikkert, og at det kan være vanskelig å bestille flybilletter når alt er såpass
                usikkert som det er nå. Vi har derfor kommet opp med en alternativ løsning dersom man kun kan være 20
                stk inne. Feiringen vil da enten gjennomføres ute dersom været og koronarestriksjonene
                tillater det eller så vil vi gjennomføre to feiringer, en på lørdag til opprinnelig tid, og en
                på søndag kl 12:00. </p>
            <p>Dersom regjeringen kommer med mer og sikrere informasjon vil dette bli lagt ut her, samt at alle påmeldte
                vil få en melding med informasjon. </p>
        </div>
        <i class="arrow blackarrow" id="arrow2"></i>
    </div>
    <div class="page fade" id="page3">
        <div id="page3img" class="pageimg"></div>
        <div class="container map-container" id="ceremony">
            <div id="ceremony-info" class="map-info">
                <h2>Vielse</h2>
                <h3>13:30</h3>
                <h3>Lenvik kirke</h3>
                <h4>Bjorelvnes, Senja kommune</h4>
            </div>
            <div id="ceremony-map" class="container-info map">
                <iframe class="iframeMap"
                    src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d126676.19675221508!2d17.81700339631823!3d69.25660064707294!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x45db48dbd0c4d4f1%3A0xff715b332978ebc9!2sLenvik%20kirke!5e0!3m2!1sno!2sus!4v1595196145854!5m2!1sno!2sus"
                    frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                <i class="arrow blackarrow" id="arrow3"></i>
            </div>
        </div>
    </div>
    <div class="page fade" id="page4">
        <div id="page4img" class="pageimg"></div>
        <div class="container map-container" id="dinner">
            <div id="dinner-info" class="map-info">
                <h2>Fest</h2>
                <h3>17:00</h3>
                <h3>Skoghus leirsted</h3>
                <h4>Senja</h3>
            </div>
            <div id="dinner-map" class="container-info map">
                <iframe class="iframeMap"
                    src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d54813.494225025825!2d17.97606152424422!3d69.25975139488655!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x45db4420e30e7569%3A0xb8028c1b421dab08!2sSkoghus%20Leirsted!5e0!3m2!1sno!2sno!4v1595330309238!5m2!1sno!2sno"
                    frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                <i class="arrow blackarrow" id="arrow4"></i>
            </div>
        </div>
        <div class="page fade" id="page5">
            <div id="page5img" class="pageimg"></div>
            <div class="container" id="registration">
                <div class="container-info" id="form">
                    <h2>Registrer om du kommer eller ikke</h2>
                    <h3>Er dere flere, registrer individuelt for hver person</h3>
                    <form id="contact-form" onsubmit="return sendRSVP()" method="post">
                        <div>
                            <input type="text" name="name" required>
                            <label class="infoLabel">Navn</label>
                        </div>
                        <div>
                            <input id="phoneNumber" type="number" placeholder="Telefonnummer" name="phoneNumber"
                                required>
                            <label class="infoLabel">Telefonnummer</label>
                        </div>
                        <div>
                            <input id="allergier" type="text" placeholder="Allergi" name="allergier">
                            <label class="infoLabel">Allergier</label>
                        </div>
                        <div>
                            <div class="radioDiv">
                                <input id="can" type="radio" name="rsvp" value="Kan komme" required
                                    class="radio-button">
                                <label for="can" class="radioLabel">Jeg kan komme</label>
                            </div>
                            <div class="radioDiv">
                                <input id="cannot" type="radio" name="rsvp" value="Kan IKKE komme" required
                                    class="radio-button">
                                <label for="cannot" class="radioLabel">Jeg kan <b>IKKE</b> komme</label>
                            </div>
                        </div>
                        <div>
                            <div class="radioDiv">
                                <input id="fridayDinner" type="checkbox" name="dinnerResponse" value="DinnerFriday">
                                <label for="fridayDinner" class="checkLabel">Ønsker middag (grilling) fredag</label>
                            </div>
                        </div>

                        <div>
                            <input type="submit" name="submit" id="registrationButton" value="Send">
                        </div>
                    </form>
                </div>

                <div class="container-info" id="submitted-form" style="display:none">
                    <h2>Takk for svaret</h2>
                    <br>
                    <button id="sendNew" onclick="sendNew()">Registrer en person til</button>
                </div>
                <div class="container-info" id="unsubmitted-form" style="display:none">
                    <h2>Det skjedde en feil. Venligst kontakt 48075305 for å si i fra at du kommer.</h2>
                </div>
                <i class="arrow blackarrow" id="arrow5"></i>

            </div>
        </div>
        <div class="page fade" id="page6">
            <div id="toastmaster" class="container">
                <h2>Toastmastere</h2>
                <div id="toastmaster-table">
                    <div class="toastmaster-info" id="toastmaster-left">
                        <div class="toastmaster-img" id="toastmastermale"></div>
                        <div class="toastmaster-name">
                            <p><b>Navn:</b> Torleiv Fjalestad<br>
                                <b>Kjenner brudeparet fra:</b> Soltun og Trondheim. Bor med Håkon.
                            </p>
                        </div>
                    </div>
                    <div class="toastmaster-info" id="toastmaster-right">
                        <div class="toastmaster-img" id="toastmasterfemale"></div>
                        <div class="toastmaster-name">
                            <p><b>Navn:</b> Kristin Ramsli Søyland<br>
                                <b>Kjenner brudeparet fra:</b> Fjellheim/NN-team og Trondheim. Bor med
                                Esther-Emilie.
                            </p>
                        </div>
                    </div>
                </div>
                <button id="toastmaster-contact-button" onclick="setContactForm(true)">Kontakt oss</button>

                <div id="overlay"></div>
                <div id="toastmaster-contact-form">
                    <h2>Send inn her om du skal gjøre noe</h2>
                    <form id="contact-form-toastmaster" onsubmit="return sendToastmaster()" method="post">
                        <div>
                            <input type="text" name="nameToast" required />
                            <label class="infoLabel">Navn</label>
                        </div>
                        <div>
                            <input type="email" name="emailToast" required />
                            <label class="infoLabel">Email</label>
                        </div>
                        <div>
                            <input type="text" name="whatToast" required />
                            <label class="infoLabel">Hva du skal gjøre</label>
                        </div>
                        <div>
                            <input type="text" name="relationshipToast" required />
                            <label class="infoLabel">Relasjon til brudeparet</label>
                        </div>
                        <div>
                            <input type="number" name="minutesToast" min="0" oninput="validity.valid||(value='');"
                                required />
                            <label class="infoLabel">Antall minutt</label>
                        </div>
                        <div>
                            <input type="text" name="equipmentToast" placeholder="Telefonnummer" />
                            <label class="infoLabel">Hva trenger du av utstyr (valgfri)</label>
                        </div>

                        <div id="submitDivToastmaster">
                            <input type="submit" name="submit" class="makeButtonSpin" id="toastmasterSpin" value="Send">
                        </div>
                    </form>
                </div>
                <div class="popup" id="popupToastmaster"></div>
                <i class="arrow blackarrow" id="arrow6"></i>
            </div>

        </div>
        <div class="page fade" id="page7">
            <div class="container" id="travel">
                <h2>Reisemuligheter</h2>
                <p>Det er mulig å fly til Bardufoss (kun sas), Tromsø og Evenes. <br><br>
                    Fra Bardufoss flyplass tar det 40 min med bil, eventuelt litt lengre tid med flybuss. <br>
                    Fra Tromsø og Evenes tar det 2,5 timer å kjøre. Herfra er det også mulig å komme seg til
                    Finnsnes
                    ved
                    hjelp av buss og hurtigbåt.
                    Sjekk <a class="link" href="https://tromskortet.no" target="_blank">tromskortet.no</a> for
                    reiseruter og
                    priser (fly og buss/båt korresponderer ikke nødvendigvis godt).<br><br>
                    Det er mulig å leie bil på alle flyplassene. Ettersom det er 25 minutters kjøring mellom vielse
                    og
                    festlokale kan dette anbefales. Da vil det også være mulig å være litt turist på Senja, noe som
                    kan
                    anbefales hvis du ikke har vært her før.
                </p>
                <h2>Overnatting</h2>
                <p>Vi foreslår Skoghus som overnatting, hvor festen også er.</p>
                <div id="bilderskoghus">
                    <img class="skoghusimages" src="background-images/skoghusgrillhytta.jpg" alt="Grillhytte skoghus">
                    <img class="skoghusimages" src="background-images/skoghusutsikt.jpg" alt="Skoghus utsikt">
                </div>
                <h3>Kapasitet</h3>
                <p>Skoghus har ca. 50 sengeplasser. De har ett rom med 6 sengeplasser, to med 5, to med 4, og resten
                    er
                    1, 2
                    eller 3 sengsrom.</p>
                <h3>Priser per natt</h3>
                <p>Enmannsrom: 650,-<br>
                    Tomannsrom: 800,- <br>
                    Utover to pers, koster hver person 200,- ekstra på samme rom.<br>
                    Rommene har oppredde senger og håndklær. Dersom du ønsker å ta med håndklær og sengetøy selv,
                    blir
                    prisen noe redusert.
                </p>
                <h3>Bestill rom</h3>
                <p style="margin-bottom: 0px">Send mail til <a href="mailto: skoghus@nlm.no">skoghus@nlm.no</a> med
                    emne:
                    EEH, overnatting, "Ditt eget
                    navn".<br><br>
                    Andre mulige overnattingsplasser er Finnsnes hotell, Senja Gaard, Soltun Soldatheim (en time å
                    kjøre)
                    med flere. <br><br>
                    For mer informasjon om Senja, turmuligheter og alternative overnattinger besøk <a
                        href="https://visitsenja.no">visitsenja.no</a>
                </p>
                <i class="arrow blackarrow" id="arrow7"></i>



            </div>
        </div>
        <div class="page fade" id="page8">
            <div class="container" id="giftlistContainer">
                <h2>Ønskeliste</h2>
                <input type="checkbox" id="showZeroRemaining" checked><label>Vis kjøpte &#9;</label>
                <select id="sortGiftList">
                    <option value="store ASC">Butikk</option>
                    <option value="gjenstaende ASC">Gjenstående stigende</option>
                    <option value="gjenstaende DESC">Gjenstående synkende</option>
                    <option value="price ASC">Pris stigende</option>
                    <option value="price DESC">Pris synkende</option>

                </select>
                <div id="giftlist"></div>
            </div>
            <div class="popup" id="popup"></div>
        </div>
        <script src="js/functions.js"></script>
        <script>
        const appearOptions = {
            threshold: 0.5
        };
        // fade in pages when scrolling for the first time
        const faders = document.querySelectorAll(".fade");
        const appearOnScroll = new IntersectionObserver(function(entries, appearOnScroll) {
            entries.forEach(entry => {
                if (!entry.isIntersecting) {
                    return;
                } else {
                    entry.target.classList.add("appear");
                    appearOnScroll.unobserve(entry.target);
                }
            })
        }, appearOptions);
        faders.forEach(fader => {
            appearOnScroll.observe(fader);
        });

        function countDown() {
            var countDownDate = new Date("Jun 26, 2021 13:30:00").getTime();

            // Update the count down every 1 second
            var x = setInterval(function() {

                // Get today's date and time
                var now = new Date().getTime();

                // Find the distance between now and the count down date
                var distance = countDownDate - now;

                // Time calculations for days, hours, minutes and seconds
                var days = Math.floor(distance / (1000 * 60 * 60 * 24));
                var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                var seconds = Math.floor((distance % (1000 * 60)) / 1000);
                // Display the result in the element with id="demo"
                var dager = " dager, ";
                var timer = " timer,</br>";
                var minutter = " min og ";
                var sekunder = " sek";
                if (days == 1) {
                    dager = " dag, ";
                }
                if (hours == 1) {
                    timer = " time,</br>";
                }
                if (days > 0) {
                    document.getElementById("countDown").innerHTML = days + dager + hours + timer +
                        minutes +
                        minutter + seconds + sekunder;
                } else if (hours > 0) {
                    document.getElementById("countDown").innerHTML = hours + timer + minutes + minutter +
                        seconds +
                        sekunder;
                } else if (minutes > 0) {
                    document.getElementById("countDown").innerHTML = minutes + minutter + seconds +
                        sekunder;
                } else {
                    document.getElementById("countDown").innerHTML = seconds + sekunder;
                }
                // If the count down is finished, write some text
                if (distance > 0) {
                    clearInterval(x);
                    document.getElementById("countDown").innerHTML =
                        "<a style='color: white;' href='https://estheremilieoghakon.no/lastopp'>Last opp bilder fra dagen her</a>";
                }
            }, 1000);
        }
        var page = 1;
        const PERCENTAGE = 0.1;
        var positionY = 0;
        var deltaYvar = 0;
        var scrolled = false;
        var ctrl = false;
        var shift = false;
        var scrollDiv = true;
        const navEl = document.getElementById("nav");
        const pagesEl = document.querySelectorAll(".page");
        var WINDOWHEIGHT = window.innerHeight;
        var topp = false;
        var bottom = false;
        var clicked = false;
        var scrolledTimeOut;
        const webadress = "toastmaster@estheremilieoghakon.no";
        var scrollTime = 0.5;
        var scrollingDelay = 200;
        if (window.innerWidth > 1279) {
            scrollTime = 0.8;
            var scrollingDelay = 500;
        }

        // says that navbar is closed when page is clicked
        pagesEl.forEach(pageEventListener => {
            pageEventListener.addEventListener("click", () => {
                if (navEl.classList.contains("opened")) {
                    openNav(false);
                }

            });
        });
        // toggle get or not of non-remaining items in giftlist
        $("#showZeroRemaining").on("change", giftList);
        $("#sortGiftList").on("change", giftList);

        // scroll to the next page when arrow-down is clicked
        $('#arrow1').on("click", () => {
            scrollToPage(2);
            document.getElementById("arrow1").style.animation = "none";
        });
        $('#arrow2').on("click", () => {
            scrollToPage(3);
        });
        $('#arrow3').on("click", () => {
            scrollToPage(4);
        });
        $('#arrow4').on("click", () => {
            scrollToPage(5);
        });
        $('#arrow5').on("click", () => {
            scrollToPage(6);
        });
        $('#arrow6').on("click", () => {
            scrollToPage(7);
        });
        $('#arrow7').on("click", () => {
            scrollToPage(8);
        });

        // runs when body is loaded
        function setTop() {
            countDown();

            // nav-bar color. Selected page is highlighted
            setColor();

            // get the giftlist from database
            giftList();

            // set offset from top to the pages so that scrolling feels natural 
            for (var i = 0; i < pagesEl.length; i++) {
                pagesEl[i].style.top = (i - page + 1) * 100 + "%";
            }

            // open link to giftlist-item in a new window
            const rows = document.querySelectorAll("td[data-href]");
            rows.forEach(row => {
                row.addEventListener("click", () => {
                    window.open(row.dataset.href);
                });
            });

            // remove # in url
            checkURL();
        }

        // set color of navbar. If mobile use different color than pc
        function setColor() {
            var infoEl = document.querySelectorAll(".info");
            for (var i = 0; i < infoEl.length; i++) {

                if (window.innerWidth <= 1279) {
                    infoEl[i].style.color = "black";
                } else {
                    infoEl[i].style.color = "whitesmoke";
                }
                if (page - 1 == i) {
                    infoEl[i].style.color = "rgb(248, 227, 42)";
                }
            }
        }

        // close toastmastercontact-form
        function setContactFormFalse() {
            setContactForm(false);
        }

        // opens or closes contact-form for toastmaster
        function setContactForm(open) {
            var page5El = document.getElementById("page5");
            var buttonEl = document.getElementById("toastmaster-contact-button");
            var toastmasterFormEl = document.getElementById("toastmaster-contact-form");
            var overlayEl = document.getElementById("overlay");

            if (open) {
                buttonEl.style.setProperty('display', 'none', 'important');
                toastmasterFormEl.style.setProperty('display', 'block', 'important');
                overlayEl.style.background = "rgba(0,0,0,0.6)";
                overlayEl.style.setProperty('z-index', 3);
                overlayEl.addEventListener("click", setContactFormFalse, false);
                setOverlayHeight(toastmasterFormEl.clientHeight + 100);
                page5.scrollTop = 0;

            } else {
                buttonEl.style.setProperty('display', 'block', 'important');
                toastmasterFormEl.style.setProperty('display', 'none', 'important');
                overlayEl.removeEventListener("click", setContactFormFalse, false);
                overlayEl.style.background = "none";
                overlayEl.style.setProperty('z-index', -3);
                setOverlayHeight(0);
            }
        }

        // makes phonenumber not required when one can not come
        $('input[name="rsvp"]').change(function(e) {
            // console.log($(this).val());
            if ($(this).val() == "Kan IKKE komme") {

                document.querySelector('#phoneNumber').required = false;
            } else {
                document.querySelector('#phoneNumber').required = true;
            }
        });

        // send to db and mail that one can or cannot come to the wedding
        function sendRSVP() {
            var buttonEl = document.getElementById("submit");
            var name = document.querySelector('input[name="name"]').value;
            var phoneNumber = document.querySelector('input[name="phoneNumber"]').value;
            var allergier = document.querySelector('input[name="allergier"]').value;
            var rsvp = document.querySelector('input[name="rsvp"]:checked').value;
            const spinEl = document.getElementById("registrationButton");
            var dinnerFriday = document.querySelector('input[name="dinnerResponse"]').checked;
            if (dinnerFriday) {
                dinnerFriday = 1;
            } else {
                dinnerFriday = 0;
            }

            // loading button while waitng for response
            spinEl.classList.add("loading");
            spinEl.disabled = true;
            // post data to db and mail
            $.ajax({
                type: "post",
                url: "submitted",
                data: "name=" + name + "&phoneNumber=" + phoneNumber + "&allergier=" + allergier +
                    "&rsvp=" +
                    rsvp +
                    "&dinner=" + dinnerFriday,

                success: function(data) {
                    spinEl.classList.remove("loading");
                    spinEl.disabled = false;
                    if (data == '1') {
                        document.getElementById("form").style.display = "none";
                        document.getElementById("submitted-form").style.display = "block";
                    } else {
                        document.getElementById("form").style.display = "none";
                        document.getElementById("unsubmitted-form").style.display = "block";
                    }
                },
                error: function(data) {
                    spinEl.disabled = false;
                    spinEl.classList.remove("loading");
                    document.getElementById("form").style.display = "none";
                    document.getElementById("unsubmitted-form").style.display = "block";
                }
            });
            return false;
        }

        // reset rsvp-form
        function sendNew() {
            document.getElementById("contact-form").reset();
            document.getElementById("form").style.display = "block";
            document.getElementById("submitted-form").style.display = "none";
        }

        // post data from user to the toastmaster-db
        function sendToastmaster() {
            var name = document.querySelector('input[name="nameToast"]').value;
            var email = document.querySelector('input[name="emailToast"]').value;
            var relationship = document.querySelector('input[name="relationshipToast"]').value;
            var what = document.querySelector('input[name="whatToast"]').value;
            var minutes = document.querySelector('input[name="minutesToast"]').value;
            var equipment = document.querySelector('input[name="equipmentToast"]').value;
            var popupEl = document.getElementById("popupToastmaster");
            const spinEl = document.getElementById("toastmasterSpin");
            const divPaddingEl = document.getElementById("submitDivToastmaster");
            spinEl.classList.add("loading");
            divPaddingEl.classList.add("paddingLoading");
            $.ajax({
                type: "post",
                url: "submittedToastmaster",
                data: "name=" + name + "&email=" + email + "&what=" + what + "&relationship=" +
                    relationship +
                    "&minutes=" + minutes + "&equipment=" + equipment,
                success: function(data) {
                    divPaddingEl.classList.remove("paddingLoading");
                    spinEl.classList.remove("loading");
                    if (data == '1') {
                        setTimeout(() => {
                            popupEl.style.display = "block ";
                            popupEl.innerHTML = "<h2>Takk for at du deltar</h2>";
                            setContactForm(false);
                            document.getElementById("contact-form-toastmaster").reset();
                            setTimeout(() => {
                                popupEl.style.display = "none ";
                            }, 8000);
                        }, 200);
                    } else {
                        setTimeout(() => {
                            popupEl.style.display = "block";
                            setContactForm(false);
                            document.getElementById("contact-form-toastmaster").reset();
                            popupEl.innerHTML =
                                "<p>Det skjedde en feil. Ta kontakt på <a href='mailto: skoghus@nlm.no'>" +
                                webadress + "</a>" +
                                "</p>";
                            document.getElementById("toastmaster-contact-button").style
                                .display =
                                "none";
                        }, 200);
                    }

                },
                error: function(data) {
                    divPaddingEl.classList.remove("paddingLoading");
                    spinEl.classList.remove("loading");
                    setTimeout(() => {
                        popupEl.style.display = "block";
                        setContactForm(false);
                        document.getElementById("contact-form-toastmaster").reset();
                        popupEl.innerHTML =
                            "<p>Det skjedde en feil. Ta kontakt på <a href='mailto: skoghus@nlm.no'>" +
                            webadress + "</a>" +
                            "</p>";
                        document.getElementById("toastmaster-contact-button").style.display =
                            "none";

                    }, 200);
                }
            });
            return false;
        }

        // register that an item is bought, and how many
        function kjop(id) {
            var number = document.getElementById("number" + id);
            var popupEl = document.getElementById("popup");
            var nameEl = document.getElementById("name" + id);
            var bought = number.value;
            if (bought == "")
                bought = 0;

            if (bought > 0 && !clicked) {
                clicked = true;
                $.ajax({
                    type: "post",
                    url: "updateGiftList",
                    data: "id=" + id + "&bought=" + bought,
                    success: function(data) {
                        setTimeout(() => {
                            clicked = false;
                        }, 2000);
                        popupEl.style.top = "calc(50% + " +
                            document.getElementById('page' + page.toString()).scrollTop + "px)";
                        console.log(document.getElementById('page' + page.toString()).scrollTop);
                        if (data == "1") {
                            setTimeout(() => {
                                giftList();
                                popupEl.style.display = "block";
                                popupEl.innerHTML = "<p>Du har nå registrert at du har kjøpt " +
                                    bought +
                                    " stk " + nameEl
                                    .innerHTML.toLowerCase() + ". Takk for gaven</p>";
                                setTimeout(() => {
                                    popupEl.style.display = "none";
                                }, 15000);
                            }, 200);
                        } else if (data == "2") {
                            setTimeout(() => {
                                giftList();
                                popupEl.style.display = "block";
                                popupEl.innerHTML =
                                    "<p>Noen andre kjøpte akkurat denne gaven</p>";
                                setTimeout(() => {
                                    popupEl.style.display = "none";
                                }, 15000);
                            }, 200);
                        } else {
                            setTimeout(() => {
                                giftList();
                                popupEl.style.display = "block";
                                popupEl.innerHTML =
                                    "<p>Det skjedde en feil. Prøv igjen og kontakt 48075305 dersom feilen gjentar seg</p>";
                                setTimeout(() => {
                                    popupEl.style.display = "none";
                                }, 15000);
                            }, 200);
                        }
                    },
                    error: function(data) {
                        setTimeout(() => {
                            clicked = false;
                        }, 2000);
                        setTimeout(() => {
                            giftList();
                            popupEl.style.display = "block";
                            popupEl.innerHTML =
                                "<p>Det skjedde en feil. Prøv igjen og kontakt 48075305 dersom feilen gjentar seg</p>";
                            setTimeout(() => {
                                popupEl.style.display = "none";
                            }, 15000);
                        }, 200);
                    }
                })

            }
        }

        window.addEventListener("resize", event => {
            setColor();
            WINDOWHEIGHT = window.innerHeight;
            if (window.innerWidth > 1279) {
                scrollTime = 0.8;
                scrollingDelay = 500;
                var iconEl = document.querySelector("#nav");
                if (iconEl.classList.contains("opened")) {
                    iconEl.classList.add("closed");
                    iconEl.classList.remove("opened");
                    document.querySelector(".material-icons").innerHTML = "menu";
                }
            } else {
                scrollTime = 0.5;
                scrollingDelay = 200;
            }
        });

        window.addEventListener("wheel", scrollDelta);
        window.addEventListener("touchstart", touchStart);
        window.addEventListener("touchmove", touchMove);
        window.addEventListener("touchend", touchEnd);
        window.addEventListener("keydown", keyDown);
        window.addEventListener("keyup", keyUp);

        function scrollToPage(pageNumber) {
            page = pageNumber;
            var navEl = document.getElementById("nav");
            openNav(true);
            scrollElement();
        }

        // restrict scrolling when ctrl or shift is pressed down
        function keyDown(e) {

            if (e.keyCode == 17)
                ctrl = true;
            else if (e.keyCode == 16)
                shift = true;
        }

        function keyUp(e) {
            if (e.keyCode == 17) {
                ctrl = false;
            } else if (e.keyCode == 16)
                shift = false;
        }

        // check how much one scrolls and runs scroll-function
        function scrollDelta(e) {
            deltaYvar = -e.deltaY * WINDOWHEIGHT;
            scroll();
        }

        // checks if user is (alomst) at top or bottom of page or something in between
        function checkScroll() {
            var e = document.getElementById("page" + page.toString());
            if ((Math.abs(e.scrollHeight - e.scrollTop - e.clientHeight) > 3.0) && deltaYvar < 0) {
                scrolled = true;
                clearTimeout(scrolledTimeOut);
                scrolledTimeOut = setTimeout(() => {
                    scrolled = false;
                }, scrollingDelay);
                return false;
            } else if (Math.abs(e.scrollTop) > 3.0 && deltaYvar > 0) {
                scrolled = true;
                clearTimeout(scrolledTimeOut);
                scrolledTimeOut = setTimeout(() => {
                    scrolled = false;
                }, scrollingDelay);
                return false;
            }
            return true;
        }

        // check if user is at top or bottom of webpage
        function topBottom() {
            var e = document.getElementById("page" + page.toString());
            if (Math.abs(e.scrollHeight - e.scrollTop - e.clientHeight) <= 3.0)
                bottom = true;
            else
                bottom = false;
            if (Math.abs(e.scrollTop) <= 3.0)
                topp = true;
            else
                topp = false;
        }

        // scrolling function. Many checks to see if the scroll is legal to prevent unwanted scrolling
        function scroll() {

            var scrollDiv = checkScroll();
            if (!scrolled && !ctrl && !shift && navEl.classList.contains("closed") && scrollDiv) {
                if (deltaYvar < -WINDOWHEIGHT * PERCENTAGE) {
                    if (page + 1 <= pagesEl.length) {
                        page++;
                        document.getElementById("arrow1").style.animation = "none";
                    }
                } else if (deltaYvar > WINDOWHEIGHT * PERCENTAGE) {
                    if (page >= 2)
                        page--;
                }
                scrolled = true;
                clearTimeout(scrolledTimeOut);
                scrolledTimeOut = setTimeout(() => {
                    scrolled = false;
                }, 1000);

            }

            scrollElement();
        }

        // scrolling to the new page
        function scrollElement() {
            for (var i = 0; i < pagesEl.length; i++) {
                pagesEl[i].style.transition = scrollTime + "s ease";
                pagesEl[i].style.top = ((i + 1) - page) * 100 + "%";
            }
            setColor();
            var bodyEl = document.querySelector("body");
            if (page == 1) {
                bodyEl.style['overscroll-behavior'] = "none";
            } else {
                bodyEl.style['overscroll-behavior'] = "contain";
            }
            var pageEl = document.getElementById("page" + page.toString());
            pageEl.style.height = "100%";

            var navEl = document.getElementById("nav");
            if (page == 1) {
                navEl.classList.remove("scrolled");
            } else
                navEl.classList.add("scrolled");
        }

        // check where user is at start of scrolling
        function touchStart(e) {
            positionY = e.touches[0].clientY;
            topBottom();
        }

        // scrolling to the place where it is natural
        // for the scroll to be when finger is pressed down on the screen
        function touchMove(e) {
            if (!scrolled && navEl.classList.contains("closed")) {
                deltaYvar = e.changedTouches[0].clientY - positionY;
                var percentage = deltaYvar / WINDOWHEIGHT;
                // if the user tries to scroll up or down and is at top or bottom of the page then allow scroll
                if (deltaYvar < 0 && bottom || deltaYvar > 0 && topp) {
                    for (var i = 0; i < pagesEl.length; i++) {
                        // not on top or bottom when trying to scroll up or down
                        if (!((page == 1 && percentage > 0) || (page == pagesEl.length && percentage < 0))) {
                            pagesEl[i].style.transition = "none";
                            pagesEl[i].style.top = ((i + 1) - page + percentage) * 100 + "%";
                        }
                    }
                }
            }
        }

        // release of finger. Scroll to next/previous page if user should be able to scroll,
        // else scroll back to where user was before starting to scroll
        function touchEnd(e) {
            deltaYvar = e.changedTouches[0].clientY - positionY;
            if (deltaYvar < 0 && bottom || deltaYvar > 0 && topp)
                scroll();
            else scrollElement();

        }

        // get the items on the giftlist and show them to the user
        function giftList() {
            $.ajax({
                type: "get",
                url: "giftlist",
                data: "zero=" + $("#showZeroRemaining").is(":checked") + "&order=" + document
                    .getElementById(
                        "sortGiftList").value,
                dataType: "json",
                success: function(data) {
                    var giftListEl = document.getElementById("giftlist");
                    var streng = "<table> \
                                    <tr id='giftListHeader'> \
                                    <th></th> \
                                    <th>Navn</th> \
                                    <th>Pris</th> \
                                    <th>Butikk</th> \
                                    <th>Ønsket</th> \
                                    <th>Kjøpt</th> \
                                    <th>Gjenstår</th> \
                                    <th>Antall</th> \
                                    </tr>";
                    if (data != '0') {
                        try {
                            for (var i = 0; i < data.length; i++) {
                                var obj = JSON.parse(data[i]);

                                if (i % 2 == 0) {
                                    streng += "<tr id='gift" + obj.id +
                                        "' style='background-color:rgba(0, 0, 0, 0.1);'>";
                                } else {
                                    streng += "<tr id='gift" + obj.id +
                                        "'style='background-color:rgba(0, 0, 0, 0.04);'>";
                                }
                                streng +=
                                    "<td class='giftPicture giftlistElement'> <img class='giftlistImg' src='images/giftlist/" +
                                    obj.picture + "'/>";
                                streng += "<td class='giftName giftlistElement' id='name" + obj.id +
                                    "' onclick=\"window.open('" + obj.link + "')\" >" + obj.navn + "</td> \
                                        <td class='giftlistPrice giftlistElement'>" + obj.price +
                                    "</td><td class='giftlistStore giftlistElement'>" + obj.store + "</td> \
                                        <td class='giftlistWish giftlistElement'>" + obj.antall + "</td> \
                                        <td class='giftlistBought giftlistElement' id='alreadyBought" + obj.id + "'>" +
                                    obj.kjopt + "</td> \
                                        <td class='giftlistRemaining giftlistElement' id='remaining" + obj.id + "'>" +
                                    obj.gjenstaende + "</td>";
                                if (obj.gjenstaende != "0") {
                                    streng +=
                                        "<td class='giftlistNumber giftlistElement'><input class='giftlistNumberInput' id='number" +
                                        obj.id + "' type='number' min='0' max=" + obj.gjenstaende +
                                        " oninput=validity.valid||(value='');></td> \
                                        <td class='giftlistBuy giftlistElement'><button class='giftlistRegistrerButton' onclick='kjop(" +
                                        obj.id +
                                        ")'>Registrer kjøpt</button></td>";
                                }
                                streng += "</tr>";
                            }
                        } catch (error) {

                        } finally {
                            streng += "</table>";
                            giftListEl.innerHTML = streng;
                        }
                    }
                },
            })
        }

        // check url scroll to page and remove #(number) from url
        function checkURL() {
            var word = window.location.href;
            if (word.lastIndexOf("#") > 0) {
                var letter = word.substr(word.lastIndexOf("#") + 1);
                console.log(letter === "onskeliste");
                if (letter === "onskeliste") {
                    letter = "7";
                }
                if (!isNaN(letter) && letter.length > 0) {
                    setTimeout(() => {
                        letter = parseInt(letter);
                        if (letter > pagesEl.length)
                            letter = 1;
                        scrollToPage(parseInt(letter));
                    }, 200);
                }
                window.history.replaceState({},
                    document.title, word.substr(0, word.lastIndexOf("#")));
            }

        }

        // set the hight of the overlay to the toastmaster-contact-form. 
        // This is needed because the contact-form may be larger than the original page
        function setOverlayHeight(height) {
            var toastmasterEl = document.getElementById("toastmaster");
            var overlayEl = document.getElementById("overlay");
            if (height > window.innerHeight) {
                toastmasterEl.style.height = height + "px";
                overlayEl.style.height = height + "px";
            } else {
                toastmasterEl.style.height = "100%";
                overlayEl.style.height = "100%";
            }

        }
        </script>
</body>

</html>