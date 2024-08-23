document.addEventListener('DOMContentLoaded', () => {
    const senha2 = document.getElementById('senha2')
    const senha = document.getElementById('senha')
    const login = document.getElementById('login')

    login.addEventListener('keydown', (event) => {
        if (event.key === 'Enter') {
            senha.focus()
            event.preventDefault()
        }
    })
    senha.addEventListener('keydown', (event) => {
        if (event.key === 'Enter') {
            senha2.focus()
            event.preventDefault()
        }
    })
})