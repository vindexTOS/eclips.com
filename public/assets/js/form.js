const loginDiv = document.querySelector('.login-wrapper')
const registerDiv = document.querySelector('.register-wrapper')
const registrationBtn = document.querySelector('#registration-btn')

let registerBool = false
registrationBtn.innerText = 'Register'
registrationBtn.addEventListener('click', () => {
  registerBool = !registerBool

  if (registerBool) {
    loginDiv.style.display = 'none'
    registerDiv.style.display = 'block'
    registrationBtn.innerText = 'Log in'
  } else {
    loginDiv.style.display = 'block'
    registerDiv.style.display = 'none'

    registrationBtn.innerText = 'Register'
  }
})
