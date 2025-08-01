const basePath = window.location.pathname.replace(/[^/]*$/, '');
const tiles = document.querySelectorAll('.tile:not(.external)');
const modal = document.getElementById('modal');

function removeExtension(file) {
    return file.replace(/\.[^/.]+$/, '');
}

function openModal(tile, updateHistory = true) {
    modal.querySelector('.modal-title').textContent = tile.querySelector('.name').textContent.trim();
    modal.querySelector('.modal-file').textContent = tile.dataset.file;
    modal.querySelector('.modal-version').textContent = tile.dataset.version;
    modal.querySelector('.modal-date').textContent = tile.dataset.date;
    modal.querySelector('.modal-size').textContent = tile.dataset.size;
    modal.querySelector('.modal-download').href = tile.dataset.href;
    modal.classList.add('open');
    if (updateHistory) {
        const fileName = removeExtension(tile.dataset.file);
        history.pushState({ modal: fileName }, '', basePath + fileName);
    }
}

function closeModal(updateHistory = true) {
    modal.classList.remove('open');
    if (updateHistory) {
        history.replaceState({}, '', basePath);
    }
}

tiles.forEach(tile => {
    tile.addEventListener('click', () => openModal(tile));
});
const downloadBtn = modal.querySelector('.modal-download');
const toastDuration = 5000;
let toastContainer = document.getElementById('toast-container');

if (!toastContainer) {
    toastContainer = document.createElement('div');
    toastContainer.id = 'toast-container';
    document.body.appendChild(toastContainer);
}

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

downloadBtn.addEventListener('click', () => {
    closeModal();
    showToast('Letöltés alatt.');
});

document.getElementById('modal-close').addEventListener('click', () => {
    closeModal();
});
modal.addEventListener('click', e => {
    if (e.target === modal) closeModal();
});
document.addEventListener('keydown', e => {
    if (e.key === 'Escape') closeModal();
});

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

window.addEventListener('popstate', handleState);
window.addEventListener('DOMContentLoaded', handleState);
