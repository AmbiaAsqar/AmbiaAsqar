// navbar
window.addEventListener("scroll", () => {
  const nav = document.querySelector("nav");
  if (scrollY > 10) {
    nav.classList.replace("bg-transparent", "bg-darkblue/50");
    nav.classList.replace("py-10", "py-4");
    nav.classList.add("backdrop-blur-md");
    nav.classList.add("shadow-2xl");
    nav.classList.add("border-b");
    nav.classList.replace("border-white/0", "border-white/20");
  } else {
    nav.classList.replace("bg-darkblue/50", "bg-transparent");
    nav.classList.replace("py-4", "py-10");
    nav.classList.remove("backdrop-blur-md");
    nav.classList.remove("shadow-2xl");
    nav.classList.remove("border-b");
  }
});

toastr.options = {
  progressBar: true,
};
