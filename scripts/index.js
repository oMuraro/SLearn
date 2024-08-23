document.addEventListener('DOMContentLoaded', () => {
    const senha = document.getElementById('senha')
    const login = document.getElementById('login')

    login.addEventListener('keydown', (event) => {
        if (event.key === 'Enter') {
            senha.focus()
            event.preventDefault()
        }
    })
})