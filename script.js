const modal = document.getElementById('modal');
let currentCode = null;

function openModal(tile) {
    modal.querySelector('.modal-title').textContent = tile.querySelector('.name').textContent.trim();
    modal.querySelector('.modal-file').textContent = tile.dataset.file;
    modal.querySelector('.modal-version').textContent = tile.dataset.version;
    modal.querySelector('.modal-date').textContent = tile.dataset.date;
    modal.querySelector('.modal-size').textContent = tile.dataset.size;
    modal.querySelector('.modal-download').href = tile.dataset.href;
    modal.classList.add('open');
    currentCode = tile.dataset.code;
    if (currentCode) {
        history.replaceState(null, '', '#' + currentCode);
    }
}

function closeModal() {
    modal.classList.remove('open');
    currentCode = null;
    history.replaceState(null, '', location.pathname);
}

document.querySelectorAll('.tile:not(.external)').forEach(tile => {
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

document.getElementById('modal-close').addEventListener('click', closeModal);
modal.addEventListener('click', e => {
    if (e.target === modal) closeModal();
});
document.addEventListener('keydown', e => {
    if (e.key === 'Escape') closeModal();
});

function handleHash() {
    const code = location.hash.replace('#', '');
    if (code) {
        const tile = document.querySelector('.tile[data-code="' + code + '"]');
        if (tile) {
            openModal(tile);
        }
    } else if (modal.classList.contains('open')) {
        closeModal();
    }
}

window.addEventListener('hashchange', handleHash);
window.addEventListener('DOMContentLoaded', handleHash);
