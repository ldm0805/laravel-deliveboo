import './bootstrap';
import '~resources/scss/app.scss';
import * as bootstrap from 'bootstrap';
import.meta.glob([
    '../img/**'
])

const deleteButton = document.querySelectorAll('.confirm-delete[type="submit"]');

deleteButton.forEach((button) => {
    button.addEventListener('click', function (event) {
        event.preventDefault();

        const Title = button.getAttribute('data-title');

        const modal = document.getElementById('delete');

        const bootstrapModal = new bootstrap.Modal(modal);
        bootstrapModal.show();

        const modalTitle = modal.querySelector('#modal-title');
        modalTitle.textContent = Title;

        const deleteButton = modal.querySelector('#confirm-delete');
        deleteButton.addEventListener('click', () => {
            button.parentElement.submit();
        });

    });
});

document.querySelector('form').addEventListener('submit', function (event) {
    let types = document.getElementById('types');
    let errorMessage = document.getElementById('error-message');
    if (types.options.selectedIndex == -1) {
        errorMessage.style.display = 'block';
        event.preventDefault();
    } else {
        errorMessage.style.display = 'none';
    }
});


new MultiSelectTag('types')
