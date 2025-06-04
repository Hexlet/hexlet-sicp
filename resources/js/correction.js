import axios from 'axios'
import routes from './common/routes.js'

const ctrlEnterHandler = (event) => {
  const selection = document.getSelection()
  const selectedText = selection.toString().trim()
  const enterKeyCode = 13

  if (event.keyCode === enterKeyCode && event.ctrlKey && selectedText !== '') {
    const elements = {
      btn: document.getElementById('correctionModalSendButton'),
      reporterComment: document.getElementById('correctionModalReporterComment'),
      reporterName: document.getElementById('correctionModalReporterName'),
      feedback: document.getElementById('correctionModalFeedback'),
      modal: document.getElementById('correctionModal'),
      typoText: document.getElementById('typoText'),
      typoTextBefore: document.getElementById('typoTextBefore'),
      typoTextAfter: document.getElementById('typoTextAfter'),
    }

    const range = selection.getRangeAt(0)
    const offset = 50
    const start = Math.max(range.startOffset - offset, 0)
    const end = range.endOffset + offset
    const selectedTextBefore = range.startContainer.textContent.slice(start, range.startOffset)
    const selectedTextAfter = range.endContainer.textContent.slice(range.endOffset, end)

    elements.typoText.innerText = selectedText
    elements.typoTextAfter.innerText = selectedTextAfter
    elements.typoTextBefore.innerText = selectedTextBefore

    elements.modal.addEventListener('hidden.bs.modal', () => {
      elements.textarea.value = ''
      elements.feedback.classList.add('d-none')
    })

    const modal = new window.bootstrap.Modal(elements.modal)
    modal.show()

    elements.btn.addEventListener('click', async () => {
      elements.btn.disabled = true

      const data = {
        pageUrl: window.location.href,
        reporterName: elements.reporterName.value,
        reporterComment: elements.reporterComment.value,
        textBeforeTypo: selectedTextBefore,
        textTypo: selectedText,
        textAfterTypo: selectedTextAfter,
      }

      try {
        await axios.post(routes.typosPath(), data)
        modal.hide()
      }
      catch (error) {
        elements.feedback.classList.remove('d-none')
        console.log(error.message)
      }
      finally {
        elements.btn.disabled = false
      }
    })
  }
}

const correctionListener = () => {
  document.addEventListener('keydown', ctrlEnterHandler)
}

export default correctionListener
