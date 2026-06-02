/* =====================================================================
   Jak Złożyć Komputer — script.js  (czysty JavaScript, bez frameworków)

   Trzy sposoby wyświetlania grafiki:
   (A) Animowane pojawianie się miniatur (IntersectionObserver) + lightbox
       z animacją skali/opacity        ->  initObserwator(), otworzLightbox()
   (B) Grafika w nowym oknie           ->  otworzWNowymOknie()
   (C) Bardzo duży obraz z przewijaniem i zoomem (podstrona schemat.html)
                                       ->  initSchemat(), ustawZoom()
   Mapa odnośników (hotspoty)          ->  initHotspoty(), obsluzHotspot()
   ===================================================================== */

"use strict";

/* Pamięta aktualnie otwarte w lightboxie zdjęcie (dla przycisku „nowe okno”). */
let aktualnyObraz = { src: "", label: "" };

/* Start po załadowaniu DOM — uruchamiamy tylko te moduły, których elementy
   istnieją na danej podstronie. */
document.addEventListener("DOMContentLoaded", function () {
  ustawRok();
  initHotspoty();
  initLightbox();
  initGaleria();
  initObserwator();
  initSchemat();
});

/* --------------------------------------------------------------------
   Wstawienie bieżącego roku w stopce.
   -------------------------------------------------------------------- */
function ustawRok() {
  const el = document.getElementById("rok");
  if (el) el.textContent = new Date().getFullYear();
}

/* ====================================================================
   MAPA ODNOŚNIKÓW — hotspoty (nakładka <button> nad obrazem)
   ==================================================================== */
function initHotspoty() {
  const hotspoty = document.querySelectorAll(".hotspot");
  hotspoty.forEach(function (btn) {
    btn.addEventListener("click", function () {
      obsluzHotspot(btn);
    });
  });
}

/* Decyduje, co zrobić po kliknięciu hotspotu na podstawie atrybutu data-mode:
   - "window"   -> otwórz obrazek w NOWYM OKNIE (metoda B)
   - "lightbox" -> otwórz w lightboxie (metoda A) [domyślnie] */
function obsluzHotspot(btn) {
  const src = btn.dataset.img;
  const label = btn.dataset.label || "";
  if (btn.dataset.mode === "window") {
    const w = parseInt(btn.dataset.w, 10) || 900;
    const h = parseInt(btn.dataset.h, 10) || 650;
    otworzWNowymOknie(src, label, w, h);
  } else {
    otworzLightbox(src, label);
  }
}

/* ====================================================================
   METODA B — GRAFIKA W NOWYM OKNIE (window.open z wymiarami)
   ==================================================================== */
function otworzWNowymOknie(src, label, w, h) {
  // Adres bezwzględny, by działało niezależnie od bieżącej podstrony.
  const url = new URL(src, window.location.href).href;
  const szer = w || 900;
  const wys = h || 650;
  // Wyśrodkowanie nowego okna na ekranie.
  const lewo = Math.max(0, Math.round((window.screen.width - szer) / 2));
  const gora = Math.max(0, Math.round((window.screen.height - wys) / 2));
  const cechy =
    "width=" + szer + ",height=" + wys +
    ",left=" + lewo + ",top=" + gora +
    ",menubar=no,toolbar=no,location=no,status=no,scrollbars=yes,resizable=yes";

  const okno = window.open(url, "podglad_" + Date.now(), cechy);
  if (okno) {
    okno.focus();
  } else {
    // Gdy przeglądarka zablokuje wyskakujące okno — awaryjnie otwórz w nowej karcie.
    window.open(url, "_blank");
  }
}

/* ====================================================================
   METODA A — LIGHTBOX (animacja skali / przezroczystości w CSS)
   ==================================================================== */
function initLightbox() {
  const lb = document.getElementById("lightbox");
  if (!lb) return;

  const btnZamknij = document.getElementById("lbClose");
  const btnOkno = document.getElementById("lbWindow");

  // Zamknięcie: przycisk X
  btnZamknij.addEventListener("click", zamknijLightbox);

  // Zamknięcie: kliknięcie w tło (poza zdjęciem)
  lb.addEventListener("click", function (e) {
    if (e.target === lb) zamknijLightbox();
  });

  // Zamknięcie: klawisz Escape
  document.addEventListener("keydown", function (e) {
    if (e.key === "Escape" && lb.classList.contains("open")) zamknijLightbox();
  });

  // Przycisk w lightboxie: otwórz to samo zdjęcie w nowym oknie (metoda B)
  btnOkno.addEventListener("click", function () {
    if (aktualnyObraz.src) otworzWNowymOknie(aktualnyObraz.src, aktualnyObraz.label, 1000, 720);
  });
}

/* Otwiera lightbox z animacją (klasa .open uruchamia przejście skali/opacity). */
function otworzLightbox(src, label) {
  const lb = document.getElementById("lightbox");
  if (!lb) return;
  const img = document.getElementById("lbImg");
  const cap = document.getElementById("lbCaption");

  aktualnyObraz = { src: src, label: label };
  img.src = src;
  img.alt = label;
  cap.textContent = label;

  lb.setAttribute("aria-hidden", "false");
  // requestAnimationFrame zapewnia płynne odpalenie animacji wejścia.
  requestAnimationFrame(function () { lb.classList.add("open"); });
  document.body.style.overflow = "hidden"; // blokada przewijania tła
}

/* Zamyka lightbox. */
function zamknijLightbox() {
  const lb = document.getElementById("lightbox");
  if (!lb) return;
  lb.classList.remove("open");
  lb.setAttribute("aria-hidden", "true");
  document.body.style.overflow = "";
}

/* ====================================================================
   GALERIA — miniatury otwierają lightbox, ikona ↗ otwiera nowe okno
   ==================================================================== */
function initGaleria() {
  // Klik w miniaturę -> lightbox (metoda A)
  document.querySelectorAll(".thumb-btn").forEach(function (btn) {
    btn.addEventListener("click", function () {
      otworzLightbox(btn.dataset.img, btn.dataset.label || "");
    });
  });
  // Klik w ikonę ↗ -> nowe okno (metoda B). stopPropagation, by nie odpalić lightboxa.
  document.querySelectorAll(".okno-btn").forEach(function (btn) {
    btn.addEventListener("click", function (e) {
      e.stopPropagation();
      otworzWNowymOknie(btn.dataset.img, "", 900, 650);
    });
  });
}

/* ====================================================================
   METODA A (cz.2) — ANIMOWANE POJAWIANIE SIĘ przy przewijaniu
   IntersectionObserver dodaje klasę .reveal--show, gdy element wejdzie w widok.
   ==================================================================== */
function initObserwator() {
  const elementy = document.querySelectorAll(".reveal");
  if (elementy.length === 0) return;

  // Starsze przeglądarki bez IntersectionObserver — po prostu pokaż wszystko.
  if (!("IntersectionObserver" in window)) {
    elementy.forEach(function (el) { el.classList.add("reveal--show"); });
    return;
  }

  const obserwator = new IntersectionObserver(function (wpisy) {
    wpisy.forEach(function (wpis, i) {
      if (wpis.isIntersecting) {
        // Lekkie opóźnienie kaskadowe dla efektu „jedna po drugiej”.
        wpis.target.style.transitionDelay = (i % 4) * 0.06 + "s";
        wpis.target.classList.add("reveal--show");
        obserwator.unobserve(wpis.target); // animujemy tylko raz
      }
    });
  }, { threshold: 0.15, rootMargin: "0px 0px -40px 0px" });

  elementy.forEach(function (el) { obserwator.observe(el); });
}

/* ====================================================================
   METODA C — BARDZO DUŻY OBRAZ Z PRZEWIJANIEM + ZOOM (schemat.html)
   Sterujemy zmienną CSS --zoom na obrazie (szerokość = base * zoom).
   ==================================================================== */
let zoom = 1;                 // 1.0 = 100%
const ZOOM_MIN = 0.6;         // 60%
const ZOOM_MAX = 3.0;         // 300%
const ZOOM_KROK = 0.2;        // skok przycisków +/-

function initSchemat() {
  const img = document.getElementById("schematImg");
  if (!img) return; // nie jesteśmy na podstronie ze schematem

  const btnIn = document.getElementById("zoomIn");
  const btnOut = document.getElementById("zoomOut");
  const btnReset = document.getElementById("zoomReset");
  const btnOkno = document.getElementById("zoomOkno");

  btnIn.addEventListener("click", function () { ustawZoom(zoom + ZOOM_KROK); });
  btnOut.addEventListener("click", function () { ustawZoom(zoom - ZOOM_KROK); });
  btnReset.addEventListener("click", function () { ustawZoom(1); });
  // Otwórz wielki schemat w nowym oknie (metoda B na podstronie)
  btnOkno.addEventListener("click", function () {
    otworzWNowymOknie(img.getAttribute("src"), "Wielki schemat montażu", 1200, 800);
  });

  // Zoom kółkiem myszy z wciśniętym Ctrl (jak w edytorach grafiki).
  const viewport = document.getElementById("schematViewport");
  viewport.addEventListener("wheel", function (e) {
    if (!e.ctrlKey) return;
    e.preventDefault();
    ustawZoom(zoom + (e.deltaY < 0 ? ZOOM_KROK : -ZOOM_KROK));
  }, { passive: false });

  ustawZoom(1); // ustaw stan początkowy i etykietę „100%”
}

/* Ustawia poziom powiększenia (z ograniczeniem do zakresu) i aktualizuje UI. */
function ustawZoom(nowy) {
  zoom = Math.min(ZOOM_MAX, Math.max(ZOOM_MIN, Math.round(nowy * 100) / 100));
  const img = document.getElementById("schematImg");
  const pokaz = document.getElementById("zoomPokaz");
  if (img) img.style.setProperty("--zoom", zoom);
  if (pokaz) pokaz.textContent = Math.round(zoom * 100) + "%";
}
