const header = document.querySelector("header");
window.addEventListener("scroll", function () {
  header.classList.toggle("sticky", window.scrollY > 100);
});

const modal = document.getElementById("blog-detail");
const modalImage = document.getElementById("detailImage");
const modalTitle = document.getElementById("detailTitle");
const modalDescription = document.getElementById("detailDescription");
const closeBtn = document.querySelector(".close");

const blogRows = document.querySelectorAll(".blog-content .row");

blogRows.forEach((row) => {
  row.addEventListener("click", () => {
    const imgSrc = row.querySelector("img").src;
    const title = row.querySelector(".layer h5").innerText;
    const description = row.querySelector(".layer p").innerText;

    modalImage.src = imgSrc;
    modalTitle.innerText = title;
    modalDescription.innerText = description;

    modal.style.display = "block";
  });
});

closeBtn.addEventListener("click", () => {
  modal.style.display = "none";
});

window.addEventListener("click", (event) => {
  if (event.target === modal) {
    modal.style.display = "none";
  }
});

let menu = document.querySelector("#menu-icon");
let navbar = document.querySelector(".navbar");

menu.onclick = () => {
  menu.classList.toggle("bx-x");
  navbar.classList.toggle("active");
};
