document.addEventListener("DOMContentLoaded", () => {
    const openBtn = document.getElementById("open-btn");
    const closeBtn = document.getElementById("close-btn");
    const sidebar = document.getElementById("sidebar");
    const mainContent = document.getElementById("main-content");

  // Fungsi untuk membuka sidebar
    openBtn.addEventListener("click", () => {
        sidebar.classList.add("open");
        mainContent.classList.add("shift");
        openBtn.classList.add("hidden"); // Sembunyikan tombol open-btn
    });

  // Fungsi untuk menutup sidebar
    closeBtn.addEventListener("click", () => {
        sidebar.classList.remove("open");
        mainContent.classList.remove("shift");
        openBtn.classList.remove("hidden"); // Tampilkan tombol open-btn
    });
});
