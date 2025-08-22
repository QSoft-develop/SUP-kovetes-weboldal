// Az oldal alapútvonalának meghatározása a history kezeléséhez
const basePath = window.location.pathname.replace(/[^/]*$/, '');
// A letöltési csempék összegyűjtése (külső hivatkozások nélkül)
const tiles = document.querySelectorAll('.tile:not(.external)');
// A modális ablak referenciája
const modal = document.getElementById('modal');

// Kiterjesztés eltávolítása fájlnévből
function removeExtension(file) {
    return file.replace(/\.[^/.]+$/, '');
}

<!-- Link az aral letöltésekhez -->
document.getElementById('foweb').addEventListener('click', function(e) {
    if (e.altKey) {
        this.href = "https://aral.qsoft.hu/d/d11f48cbc61548619ad0";
    } else {
        //this.href = "https://www.qsoft.hu";
    }
});

// Modális ablak megnyitása az adott csempe adataival
function openModal(tile, updateHistory = true) {
    modal.querySelector('.modal-content').style.background = tile.dataset.color;
    modal.querySelector('.modal-title').textContent = tile.querySelector('.name').textContent.trim();
    modal.querySelector('.modal-file').textContent = tile.dataset.file;
    modal.querySelector('.modal-version').textContent = tile.dataset.version;
    modal.querySelector('.modal-date').textContent = tile.dataset.date;
    modal.querySelector('.modal-size').textContent = tile.dataset.size;
    modal.querySelector('.modal-icon').src = tile.dataset.icon;
    modal.querySelector('.modal-download').href = tile.dataset.href;
    modal.classList.add('open');
    if (updateHistory) {
        const fileName = removeExtension(tile.dataset.file);
        history.pushState({ modal: fileName }, '', basePath + fileName);
    }
}

// Modális ablak bezárása és az URL visszaállítása
function closeModal(updateHistory = true) {
    modal.classList.remove('open');
    if (updateHistory) {
        history.replaceState({}, '', basePath);
    }
}

// Csempe kattintására nyitódjon meg a modális ablak
tiles.forEach(tile => {
    tile.addEventListener('click', () => openModal(tile));
});
const downloadBtn = modal.querySelector('.modal-download');
const toastDuration = 5000; // értesítés megjelenítési ideje ms-ben
let toastContainer = document.getElementById('toast-container');

// Értesítés konténer létrehozása, ha még nem létezik
if (!toastContainer) {
    toastContainer = document.createElement('div');
    toastContainer.id = 'toast-container';
    document.body.appendChild(toastContainer);
}

// Rövid ideig megjelenő értesítés létrehozása
function showToast(message) {
    const toast = document.createElement('div');
    toast.className = 'toast';
    toast.textContent = message;
    toastContainer.appendChild(toast);
    setTimeout(() => {
        toast.classList.add('hide');
        toast.addEventListener('animationend', () => toast.remove());
    }, toastDuration);
}

// Letöltés gomb kezelése
downloadBtn.addEventListener('click', () => {
    closeModal();
    showToast('Letöltés alatt.');
});

// Modal bezárása a gomb, háttér vagy ESC billentyű segítségével
document.getElementById('modal-close').addEventListener('click', () => {
    closeModal();
});
modal.addEventListener('click', e => {
    if (e.target === modal) closeModal();
});
document.addEventListener('keydown', e => {
    if (e.key === 'Escape') closeModal();
});

// History állapot alapján nyitja meg a megfelelő modált
function handleState() {
    const segment = decodeURIComponent(window.location.pathname.slice(basePath.length));
    if (segment) {
        const tile = Array.from(tiles).find(t => removeExtension(t.dataset.file) === segment);
        if (tile) {
            openModal(tile, false);
            return;
        }
    }
    closeModal(false);
}

// Az állapotváltozások és az oldal betöltésekor is kezeljük a history-t
window.addEventListener('popstate', handleState);
window.addEventListener('DOMContentLoaded', handleState);
