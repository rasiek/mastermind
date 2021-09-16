


const formPropo = document.getElementById("form-try");
const newGameForm = document.getElementById("new-game")



formPropo.addEventListener("submit", (event) => {


    const reqPost = new XMLHttpRequest()
    const formData = new FormData(formPropo)
    reqPost.addEventListener('load', (evt) => {


        const jsonData = evt.target.responseText
        const data = JSON.parse(jsonData)

        let tableTarget = document.getElementById('table-props')

        let tr = document.createElement('tr')

        let numTry = document.createElement('td')
        numTry.innerText = data['num-try']

        let prop = document.createElement('td')
        prop.innerText = data['user-prop']

        let bienP = document.createElement('td')
        bienP.innerText = data['bien-p']

        let malP = document.createElement('td')
        malP.innerText = data['mal-p']

        tr.appendChild(numTry)
        tr.appendChild(prop)
        tr.appendChild(bienP)
        tr.appendChild(malP)

        tableTarget.appendChild(tr)


        if (data['winProp'] == true) {

            formPropo.classList.add('no-active')
            formPropo.classList.remove('form-try')
            newGameForm.classList.add('new-game')
            newGameForm.classList.remove('no-active')

        }
    })


    reqPost.open('post', 'webservices/wsCompare.php')
    reqPost.send(formData)
    event.preventDefault();

})