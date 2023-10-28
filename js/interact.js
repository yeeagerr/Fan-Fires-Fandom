let searchinput2 = document.querySelector(".search-input2");
let tambahan = document.querySelector(".search-input");
let searchbtn = document.querySelector(".search-btn");

searchbtn.addEventListener("click", () => {
  searchinput2.classList.add("input-tambahan");
  tambahan.classList.add("input-tambahan");
  setTimeout(function () {
    tambahan.classList.remove("input-tambahan");
    searchinput2.classList.remove("input-tambahan");
  }, 2000);
});
