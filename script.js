document.querySelectorAll('.tile').forEach(tile => {
    tile.addEventListener('click', e => {
        e.preventDefault();
        const modal = document.getElementById('modal');
        modal.querySelector('.modal-title').textContent = tile.dataset.name;
        modal.querySelector('.modal-file').textContent = tile.dataset.file;
        modal.querySelector('.modal-version').textContent = tile.dataset.version;
        modal.querySelector('.modal-date').textContent = tile.dataset.date;
        modal.querySelector('.modal-size').textContent = tile.dataset.size;
        modal.querySelector('.modal-download').href = tile.href;
        modal.classList.add('open');
    });
});
const modal = document.getElementById('modal');
document.getElementById('modal-close').addEventListener('click', ()=>{
    modal.classList.remove('open');
});
modal.addEventListener('click', e => {
    if(e.target === modal) modal.classList.remove('open');
});
document.addEventListener('keydown', e => {
    if(e.key === 'Escape') modal.classList.remove('open');
});
