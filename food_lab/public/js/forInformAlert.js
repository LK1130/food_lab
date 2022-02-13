/*
 * Create : zayar(03/02/2022)
 * Update :
 * Explain of function : To show customer name search
 * Prarameter : no
 * return :
 */
$(document).ready(function () {
    /*
     * Create : zayar(17/1/2022)
     * Update :
     * Explain of function : To toggle profile alert
     * Prarameter : no
     * return : toggle
     * */

    if (sessionHas) {
        console.log(sessionHas);

        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": jQuery('meta[name="csrf-token"]').attr(
                    "content"
                ),
            },
        });
        console.log(customerid);
        var formdata = { customerId: customerid };

        $.ajax({
            type: "GET",
            url: "searchcustomerdetails",
            data: formdata,
            dataType: "json",
            success: function (data) {
                console.log(data);
                $("#alertCount").text(data["alertcount"]);

                $("#profileAlertBody").prepend(
                    `
                    <div class="d-flex flex-column justify-content-center align-items-center ">
                    <i class="far fa-user-circle fs-1 text-light"></i>
                    <p class="mt-3"><i class="fas fa-coins text-warning fs-1"></i> <span
                            class=" fw-bolder  text-light"> 300</span> </p>
                    <p class="fw-bolder  profileAlertHeader">${data["detail"]["nickname"]}</p>
                    <p class="fw-bolder  profileAlertHeader">${data["detail"]["email"]}</p>
                    <p class="fw-bolder  profileAlertHeader">${data["detail"]["phone"]}</p>
                    <p class="fw-bolder  profileAlertHeader">${data["detail"]["township_name"]} , ${data["detail"]["state_name"]} , ${data["detail"]["address3"]}</p>
                    
                </div>
                        `
                );
                let newscount = data["limitednews"].length;
                var today = new Date();
                var dd = String(today.getDate()).padStart(2, "0");
                var mm = String(today.getMonth() + 1).padStart(2, "0"); //January is 0!
                var yyyy = today.getFullYear();

                today = yyyy + "-" + mm + "-" + dd;
                console.log(today);
                if (newscount == 0) {
                    $(".forMessages").prepend(
                        `
                        <div class="news nocursor d-flex flex-row justify-content-center align-items-center">
                            <p class="fs-6 fw-bolder mt-2 me-auto">No new has left </p>
                        </div>
                        `
                    );
                } else {
                    for (const news of data["limitednews"]) {
                        var oneD = 1000 * 60 * 60 * 24;

                        var sMS = new Date(news.newscreated);
                        var eMS = new Date(today);
                        var date = Math.round(
                            (eMS.getTime() - sMS.getTime()) / oneD
                        );

                        if (date < 3) {
                            $(".forNews").prepend(
                                `
                            <div class="news nocursor d-flex flex-row justify-content-center align-items-center">
                                    <img src="/storage/newsImage/${news.source}" class="my-3 ms-2" alt="">
                                    <p class="fs-6 fw-bolder mt-2 me-5">${news.title}
                                        (${news.detail})</p>
                                        <img src="img/new.png" alt="" class="newsLogo" >
                                </div>
                            `
                            );
                        } else {
                            $(".forNews").prepend(
                                `
                            <div class="news nocursor d-flex flex-row justify-content-center align-items-center">
                                    <img src="/storage/newsImage/${news.source}" class="my-3 ms-2" alt="">
                                    <p class="fs-6 fw-bolder mt-2 me-5">${news.title}
                                        (${news.detail})</p>
                                        <img src="" alt="" class="newsLogo" >
                                </div>
                            `
                            );
                        }
                    }
                }
                let messagecount = data["limitedmessages"].length;
                if (messagecount == 0) {
                    $(".forMessages").prepend(
                        `
                        <div class="news d-flex flex-row justify-content-center align-items-center">
                            <p class="fs-6 fw-bolder mt-2 me-auto">No message has left </p>
                        </div>
                        `
                    );
                } else {
                    for (const messages of data["limitedmessages"]) {
                        $allcolor = ["yellow", "green", "yellow", "red"];
                        $statusMessage = messages.decision_status;
                        $messagecolor = $allcolor[$statusMessage - 1];
                        if (messages.seen == 0) {
                            $(".forMessages").prepend(
                                `
        <div class="messages d-flex flex-row justify-content-center align-items-center " id="${messages.chargeid}">
        
                <p class="fs-6 fw-bolder me-auto ms-3 mt-3">${messages.title}</p>
                <div class="d-flex flex-column me-4">
                    <p class="fs-5 fw-bolder  ms-auto mt-2 rounded ${$messagecolor} text-center">
                    ${messages.status}
                    </p>
                    <p class=" fw-bold  mb-1 ">${messages.messagecreated}</p>
                </div>
                <img src="img/new.png" alt="" class="newsLogo" >
            </div>
        `
                            );
                        } else {
                            $(".forMessages").prepend(
                                `
        <div class="messages d-flex flex-row justify-content-center align-items-center " id="${messages.chargeid}">
        
                <p class="fs-6 fw-bolder me-auto ms-3 mt-3">${messages.title}</p>
                <div class="d-flex flex-column me-4">
                    <p class="fs-5 fw-bolder  ms-auto mt-2 rounded ${$messagecolor} text-center">
                    ${messages.status}
                    </p>
                    <p class=" fw-bold  mb-1 ">${messages.messagecreated}</p>
                </div>
                <img src="" alt="" class="newsLogo" >
            </div>
        `
                            );
                        }
                    }
                    $(".messages").click(function () {
                        $id = $(this).attr("id");
                        window.location.replace("/messageDetail/" + $id);
                    });
                }

                let trackcount = data["limitedtracks"].length;
                if (trackcount == 0) {
                    $(".forTracks").prepend(
                        `
                        <div class="news d-flex flex-row justify-content-center align-items-center">
                                <p class="fs-6 fw-bolder mt-2 me-auto">No track has left </p>
                            </div>
                        `
                    );
                } else {
                    for (const tracks of data["limitedtracks"]) {
                        $allcolor = [
                            "yellow",
                            "red",
                            "green",
                            "red",
                            "green",
                            "green",
                        ];
                        $statusMessage = tracks.order_status;
                        $messagecolor = $allcolor[$statusMessage - 1];
                        $names = tracks.title;
                        $name = $names.split(",");
                        $namesCount = $name.length - 1;
                        console.log($namesCount);
                        $.ajaxSetup({
                            headers: {
                                "X-CSRF-TOKEN": jQuery(
                                    'meta[name="csrf-token"]'
                                ).attr("content"),
                            },
                        });

                        $.ajax({
                            type: "GET",
                            url: "searchcustomerdetails",
                            data: formdata,
                            dataType: "json",
                            success: function (data) {},
                        });
                        if (tracks.seen == 0) {
                            $(".forTracks").prepend(
                                `
                                <div class="tracks d-flex flex-row justify-content-center align-items-center" id="${tracks.id}">
                                
                                <div class="d-flex flex-column w-100 ms-1 mt-2">
                                    <p class=" fw-bolder mb-1">${$name[0]} and ${$namesCount} other</p>
                                    
                                    
                                    <p class=" fw-bold mb-1">${tracks.coin} <i class="coinCalInform fas fa-coins"></i></p>
                                    <p class=" fw-bold mb-1">${tracks.amount} MMK</p>
                                </div>
                                <div class="d-flex flex-column me-3 w-100 mt-4 nomelimited">
                                    <p class="fs-5 fw-bolder rounded ${$messagecolor} text-center">
                                    ${tracks.status} </p>
                                    <p class=" fw-bold  mb-3 ">${tracks.trackscreated} </p>
                                </div>
                                <img src="img/new.png" alt="" class="newsLogo  trackNews" >
                            </div>
                                `
                            );
                        } else {
                            $(".forTracks").prepend(
                                `
                                <div class="tracks d-flex flex-row justify-content-center align-items-center" id="${tracks.id}">
                                
                                <div class="d-flex flex-column w-100 ms-1 mt-2">
                                <p class=" fw-bolder mb-1">${$name[0]} and ${$namesCount} other</p>
                                    
                                    
                                <p class=" fw-bold mb-1">${tracks.coin} <i class="coinCalInform fas fa-coins"></i></p>
                                <p class=" fw-bold mb-1">${tracks.amount} MMK</p>
                                </div>
                                <div class="d-flex flex-column me-3 w-100 mt-4">
                                    <p class="fs-5 fw-bolder rounded ${$messagecolor} text-center">
                                    ${tracks.status} </p>
                                    <p class=" fw-bold  mb-3 ">${tracks.trackscreated} </p>
                                </div>
                                <img src="" alt="" class="newsLogo me-auto trackNews" >
                            </div>
                                `
                            );
                        }
                    }
                    $(".tracks").click(function () {
                        $id = $(this).attr("id");
                        window.location.replace("/trackDetail/" + $id);
                    });
                }
            },
        });

        document
            .getElementById("profileButton")
            .addEventListener("click", function () {
                $("#profileAlert").toggleClass("visible");
            });
        document
            .getElementById("profileButton2")
            .addEventListener("click", function () {
                $("#profileAlert").toggleClass("visible");
            });
        // document.getElementById("back").addEventListener("click", function () {
        //     document.getElementById("profileAlert").style.display = "none";
        // });
        /*
         * Create : zayar(23/1/2022)
         * Update :
         * Explain of function : To toggle inform alert
         * Prarameter : no
         * return : toggle
         * */
        document
            .getElementById("informButton")
            .addEventListener("click", function () {
                $("#informAlert").toggleClass("visible");
            });

        /*
         * Create : zayar(23/1/2022)
         * Update :
         * Explain of function : for initial ifrom alert
         * Prarameter : no
         * return : toggle
         * */

        document.getElementById("forNews").removeAttribute("id");
        document.getElementById("clickNews").style.borderBottom =
            "1px solid black";

        /*
         * Create : zayar(23/1/2022)
         * Update :
         * Explain of function : To toggle inform alert headers
         * Prarameter : no
         * return : toggle
         * */

        document
            .getElementById("clickNews")
            .addEventListener("click", function () {
                document.getElementsByClassName("forMessages")[0].id =
                    "forMessages";
                document.getElementsByClassName("forTracks")[0].id =
                    "forTracks";
                document.getElementById("forNews").removeAttribute("id");
                // document.getElementsByClassName("informAlert")[0].style.height = "60vh";
                document.getElementById("clickMessages").style.borderBottom =
                    "";
                document.getElementById("clickNews").style.borderBottom =
                    "1px solid black";
                document.getElementById("clickTracks").style.borderBottom = "";
            });

        document
            .getElementById("clickMessages")
            .addEventListener("click", function () {
                document.getElementsByClassName("forNews")[0].id = "forNews";
                document.getElementsByClassName("forTracks")[0].id =
                    "forTracks";
                document.getElementById("forMessages").removeAttribute("id");

                document.getElementById("clickMessages").style.borderBottom =
                    "1px solid black";
                document.getElementById("clickNews").style.borderBottom = "";
                document.getElementById("clickTracks").style.borderBottom = "";
                // document.getElementsByClassName("informAlert")[0].style.height =
                //     "60vh";
            });

        document
            .getElementById("clickTracks")
            .addEventListener("click", function () {
                document.getElementsByClassName("forNews")[0].id = "forNews";
                document.getElementsByClassName("forMessages")[0].id =
                    "forMessages";
                document.getElementById("forTracks").removeAttribute("id");

                // document.getElementsByClassName("informAlert")[0].style.height =
                //     "70vh";
                document.getElementById("clickMessages").style.borderBottom =
                    "";
                document.getElementById("clickNews").style.borderBottom = "";
                document.getElementById("clickTracks").style.borderBottom =
                    "1px solid black";
            });
    } else {
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": jQuery('meta[name="csrf-token"]').attr(
                    "content"
                ),
            },
        });

        $.ajax({
            type: "GET",
            url: "getnews",
            dataType: "json",
            success: function (data) {
                console.log(data);
                $("#alertCount").text(data["alertCount"]);
                let newscount = data["limitednews"].length;
                var today = new Date();
                var dd = String(today.getDate()).padStart(2, "0");
                var mm = String(today.getMonth() + 1).padStart(2, "0"); //January is 0!
                var yyyy = today.getFullYear();

                today = yyyy + "-" + mm + "-" + dd;
                console.log(today);
                if (newscount == 0) {
                    $(".forMessages").prepend(
                        `
                        <div class="news nocursor d-flex flex-row justify-content-center align-items-center">
                            <p class="fs-6 fw-bolder mt-2 me-auto">No new has left </p>
                        </div>
                        `
                    );
                } else {
                    for (const news of data["limitednews"]) {
                        var oneD = 1000 * 60 * 60 * 24;

                        var sMS = new Date(news.newscreated);
                        var eMS = new Date(today);
                        var date = Math.round(
                            (eMS.getTime() - sMS.getTime()) / oneD
                        );

                        if (date < 3) {
                            $(".forNews").prepend(
                                `
                            <div class="news nocursor d-flex flex-row justify-content-center align-items-center">
                                    <img src="/storage/newsImage/${news.source}" class="my-3 ms-2" alt="">
                                    <p class="fs-6 fw-bolder mt-2 me-5">${news.title}
                                        (${news.detail})</p>
                                        <img src="img/new.png" alt="" class="newsLogo" >
                                </div>
                            `
                            );
                        } else {
                            $(".forNews").prepend(
                                `
                            <div class="news nocursor d-flex flex-row justify-content-center align-items-center">
                                    <img src="/storage/newsImage/${news.source}" class="my-3 ms-2" alt="">
                                    <p class="fs-6 fw-bolder mt-2 me-5">${news.title}
                                        (${news.detail})</p>
                                        <img src="" alt="" class="newsLogo" >
                                </div>
                            `
                            );
                        }
                    }
                }
                // let newscount = data["limitednews"].length;
                // if (newscount == 0) {
                //     $(".forNews").prepend(
                //         `
                //         <div class="news d-flex flex-row justify-content-center align-items-center">
                //         <p class="fs-6 fw-bolder mt-2 me-auto">No news has left. </p>
                //     </div>
                //         `
                //     );
                // } else {
                //     for (const news of data["limitednews"]) {
                //         $(".forNews").prepend(
                //             `
                //             <div class="news d-flex flex-row justify-content-center align-items-center">
                //                     <img src="/storage/newsImage/${news.source}" class="my-3" alt="">
                //                     <p class="fs-6 fw-bolder mt-2 me-auto">${news.title}
                //                         (${news.detail})</p>
                //                 </div>
                //             `
                //         );
                //     }
                // }
            },
        });

        /*
         * Create : zayar(23/1/2022)
         * Update :
         * Explain of function : To toggle inform alert
         * Prarameter : no
         * return : toggle
         * */

        document
            .getElementById("informButton")
            .addEventListener("click", function () {
                $("#informAlert").toggleClass("visible");
            });

        /*
         * Create : zayar(23/1/2022)
         * Update :
         * Explain of function : for initial ifrom alert
         * Prarameter : no
         * return : toggle
         * */

        document.getElementById("forNews").removeAttribute("id");
        document.getElementById("clickNews").style.borderBottom =
            "1px solid black";

        /*
         * Create : zayar(23/1/2022)
         * Update :
         * Explain of function : To toggle inform alert headers
         * Prarameter : no
         * return : toggle
         * */

        document
            .getElementById("clickNews")
            .addEventListener("click", function () {
                document.getElementsByClassName("forMessages")[0].id =
                    "forMessages";
                document.getElementsByClassName("forTracks")[0].id =
                    "forTracks";
                document.getElementById("forNews").removeAttribute("id");
                // document.getElementsByClassName("informAlert")[0].style.height = "60vh";
                document.getElementById("clickMessages").style.borderBottom =
                    "";
                document.getElementById("clickNews").style.borderBottom =
                    "1px solid black";
                document.getElementById("clickTracks").style.borderBottom = "";
            });
    }
});
