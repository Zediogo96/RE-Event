const paginationNumbers = document.getElementById("pagination-numbers");
const paginatedList = document.querySelector(".container-other-events")
const listItems = paginatedList.querySelectorAll("a");
const nextButton = document.getElementById("next-button");
const prevButton = document.getElementById("prev-button");

const paginationLimit = 12;
const pageCount = Math.ceil(listItems.length / paginationLimit);
let currentPage;
let prevRange = 1;
let currRange = paginationLimit;

const appendPageNumber = (index) => {
    const pageNumber = document.createElement("button");
    pageNumber.className = "pagination-number";
    pageNumber.innerHTML = index;
    pageNumber.setAttribute("page-index", index);
    pageNumber.setAttribute("aria-label", "Page " + index);
    pageNumber.setAttribute("id", "page" + index);

    paginationNumbers.appendChild(pageNumber);
};

const getPaginationNumbers = () => {
    for (let i = 1; i <= pageCount; i++) {
        appendPageNumber(i);
    }
};

const setCurrentPage = (pageNum) => {
    currentPage = pageNum;

    prevRange = (pageNum - 1) * paginationLimit;
    currRange = pageNum * paginationLimit;

    // getElementByID with changing page number
    document.getElementById("page" + currentPage).classList.add("active");

    elementContainer.innerHTML = '';

    jsonData.forEach((item, index) => {

        if (index >= prevRange && index < currRange) {
            elementContainer.appendChild(item)
        }
    });

    listItems.forEach((item, index) => {
        item.classList.add("hidden");
        if (index >= prevRange && index < currRange) {
            item.classList.remove("hidden");
        }
        else {
            item.classList.add("hidden");
        }
    });

    console.log(prevRange, currRange);
};

let jsonData = [];
listItems.forEach((item) => {
    jsonData.push(item);
});

let elementContainer = document.querySelector(".container-other-events");


window.addEventListener("load", () => {
    getPaginationNumbers();
    setCurrentPage(1);

    document.querySelectorAll(".pagination-number").forEach((button) => {
        const pageIndex = Number(button.getAttribute("page-index"));

        if (pageIndex) {
            button.addEventListener("click", () => {
                setCurrentPage(pageIndex);
            });
        }


    });
});

nextButton.addEventListener("click", () => {
    if (currentPage < pageCount) {
        document.getElementById("page" + currentPage).classList.remove("active");
        setCurrentPage(currentPage + 1);
    }
});

prevButton.addEventListener("click", () => {
    if (currentPage > 1) {
        document.getElementById("page" + currentPage).classList.remove("active");
        setCurrentPage(currentPage - 1);
    }
});


