document.addEventListener('DOMContentLoaded', function () {
    const deleteButtons = document.querySelectorAll('.delete-button');
    const modal = document.getElementById('deleteModal');
    const modalTitle = document.getElementById('modalTitle');
    const modalMessage = document.getElementById('modalMessage');
    const cancelDelete = document.getElementById('cancelDelete');
    const confirmDelete = document.getElementById('confirmDelete');

    let currentForm = null;

    deleteButtons.forEach(button => {
        button.addEventListener('click', function (e) {
            e.preventDefault();

            currentForm = this.closest('form');

            const isLetter = currentForm.action.includes('/letters/');
            const isCategory = currentForm.action.includes('/categories/');

            if (isLetter) {
                modalTitle.textContent = 'Konfirmasi Hapus Surat';
                modalMessage.textContent = 'Apakah Anda yakin ingin menghapus surat ini? Tindakan ini tidak dapat dibatalkan.';
            } else if (isCategory) {
                modalTitle.textContent = 'Konfirmasi Hapus Kategori';
                modalMessage.textContent = 'Apakah Anda yakin ingin menghapus kategori ini? Surat yang terkait dengan kategori ini tidak akan terpengaruh.';
            } else {
                modalTitle.textContent = 'Konfirmasi Hapus';
                modalMessage.textContent = 'Apakah Anda yakin ingin menghapus item ini?';
            }

            modal.classList.remove('hidden');
        });
    });

    cancelDelete.addEventListener('click', function () {
        modal.classList.add('hidden');
        currentForm = null;
    });

    confirmDelete.addEventListener('click', function () {
        if (currentForm) {
            currentForm.submit();
        }
        modal.classList.add('hidden');
    });

    modal.addEventListener('click', function (e) {
        if (e.target === modal) {
            modal.classList.add('hidden');
            currentForm = null;
        }
    });

    document.addEventListener('keydown', function (e) {
        if (e.key === 'Escape' && !modal.classList.contains('hidden')) {
            modal.classList.add('hidden');
            currentForm = null;
        }
    });
});
