document.querySelectorAll('.tile:not(.external)').forEach(tile => {
    tile.addEventListener('click', () => {
        const modal = document.getElementById('modal');
        modal.querySelector('.modal-title').textContent = tile.querySelector('.name').textContent.trim();
        modal.querySelector('.modal-file').textContent = tile.dataset.file;
        modal.querySelector('.modal-version').textContent = tile.dataset.version;
        modal.querySelector('.modal-date').textContent = tile.dataset.date;
        modal.querySelector('.modal-size').textContent = tile.dataset.size;
        modal.querySelector('.modal-download').href = tile.dataset.href;
        modal.classList.add('open');
    });
});

const modal = document.getElementById('modal');
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
    modal.classList.remove('open');
    showToast('Letöltés alatt.');
});

document.getElementById('modal-close').addEventListener('click', () => {
    modal.classList.remove('open');
});
modal.addEventListener('click', e => {
    if (e.target === modal) modal.classList.remove('open');
});
document.addEventListener('keydown', e => {
    if (e.key === 'Escape') modal.classList.remove('open');
});
