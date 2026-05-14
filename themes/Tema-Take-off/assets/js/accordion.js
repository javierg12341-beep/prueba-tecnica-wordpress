document.addEventListener("DOMContentLoaded", () => {

    const tabs = document.querySelectorAll(".tab-item");

    tabs.forEach((tab, index) => {

        const title = tab.querySelector(".tab-title");
        const content = tab.querySelector(".tab-content");
        const arrow = tab.querySelector(".tab-arrow");

        tab.addEventListener("mouseenter", () => {

            // RESET
            tabs.forEach((otherTab) => {

                const otherTitle = otherTab.querySelector(".tab-title");
                const otherContent = otherTab.querySelector(".tab-content");
                const otherArrow = otherTab.querySelector(".tab-arrow");

                otherTab.classList.remove("border-colsecundary");
                otherTab.classList.add("border-white/20");

                otherTitle.classList.remove("text-colsecundary");
                otherTitle.classList.add("text-white");

                otherArrow.classList.remove("text-colsecundary");
                otherArrow.classList.add("text-white");

                otherContent.style.maxHeight = "0px";

            });

            // ACTIVO
            tab.classList.remove("border-white/20");
            tab.classList.add("border-colsecundary");

            title.classList.remove("text-white");
            title.classList.add("text-colsecundary");

            arrow.classList.remove("text-white");
            arrow.classList.add("text-colsecundary");

            content.style.maxHeight = content.scrollHeight + "px";

        });

    });

});
