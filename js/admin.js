document.querySelector(".threeline").addEventListener("click", () => {
  const navbar = document.querySelector(".navbar");

  navbar.classList.toggle("navtransition");
});

document.querySelector(".threeline").addEventListener("click", () => {
  const navbarside = document.querySelector(".navbarside");

  navbarside.classList.toggle("navtransition");
});
