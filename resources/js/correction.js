import { Modal } from 'bootstrap';

const ctrlEnterHandler = (event) => {
  const selection = document.getSelection().toString().trim();
  const enterKeyCode = 13;

  if (event.keyCode === enterKeyCode && event.ctrlKey && selection !== '') {
    const location = window.location.href;
    const modal = new Modal(document.getElementById('correctionModal'));

    const incorrectTextField = document.querySelector('.incorrectText');
    incorrectTextField.innerText = selection;

    console.log('location: ', location);
    console.log('selection: ', selection);

    modal.show();

    const btn = document.getElementById('correctionModalSendButton');
    btn.addEventListener('click', async () => {
      const textarea = document.getElementById('correctionModalTextarea');
      console.log('textarea: ', textarea.value);
      modal.hide();
      textarea.value = '';
    });
  }
};

const correctionListener = () => {
  document.addEventListener('keydown', ctrlEnterHandler);
};

correctionListener();
