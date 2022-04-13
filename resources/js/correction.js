import { Modal } from 'bootstrap';
import axios from 'axios';

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

      console.log(textarea.value);

      try {
        await axios.post('https://hexlet-correction.herokuapp.com/api/workspaces/Title/typos', {
          // "pageUrl": "https://site.com/",
          // "reporterName": "reporterName",
          // "reporterComment": "reporterComment",
          // "textBeforeTypo": "textBeforeTypo",
          // "textTypo": "textTypo",
          // "textAfterTypo": "textAfterTypo"
        }, {
          headers: {
            'Content-Type': 'application/json',
            Authorization: 'Token e0b71e21-0bf8-49f3-a990-7d08bbe65170',
          },
        });
      } catch (err) {
        console.log(err.message);
      }

      modal.hide();
    });
  }
};

const correctionListener = () => {
  document.addEventListener('keydown', ctrlEnterHandler);
};

correctionListener();
