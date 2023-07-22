const loginDiv = document.querySelector('.login-wrapper')
const registerDiv = document.querySelector('.register-wrapper')
const registrationBtn = document.querySelector('#registration-btn')
const form = document.querySelector('#auth-form')
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

// sending form data to server

form.addEventListener('submit', async (event) => {
  event.preventDefault()

  const formData = new FormData(form)

  try {
    const action = form.action

    const response = await fetch(action, {
      method: 'POST',
      body: formData,
    })

    const data = await response.json()

    console.log(data)
  } catch (error) {
    console.log(error)
  }
})
