let marquee = document.querySelector("marquee"),
    importantnews = document.querySelectorAll(".importantnews");

let importantNew = function() {
    if (importantnews.length != 0) {
        for (let i = 0; i < importantnews.length; i++) {
            let category = importantnews[i].getAttribute("id");
            switch (category) {
                case "1":
                    importantnews[i].style.color = "green";
                    break;
                case "2":
                    importantnews[i].style.color = "red";
                    break;
                case "3":
                    importantnews[i].style.color = "blue";
                    break;
                case "4":
                    importantnews[i].style.color = "red";
                    break;
                case "5":
                    importantnews[i].style.color = "black";
                    break;
            }
        }
    } else {
        marquee.style.display = "none";
    }
};

importantNew();