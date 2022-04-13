import { Modal } from 'bootstrap';

const ctrlEnterHandler = (event) => {
  if (event.keyCode === 13 && event.ctrlKey) {
    const selection = document.getSelection();
    const location = window.location.href;
    const modal = new Modal(document.getElementById('correctionModal'));

    const incorrectTextField = document.querySelector('.incorrectText');
    incorrectTextField.innerText = selection.toString();

    console.log('location: ', location);
    console.log('selection: ', selection.toString());

    modal.show();

    const btn = document.getElementById('correctionModalSendButton');
    btn.addEventListener('click', async () => {
      const textarea = document.getElementById('correctionModalTextarea');

      console.log('selection: ', textarea.value);

      modal.hide();
    });
  }
};

const correctionListener = () => {
  document.addEventListener('keydown', ctrlEnterHandler);
};

correctionListener();
