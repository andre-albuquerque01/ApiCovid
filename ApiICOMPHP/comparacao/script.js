function api() {
    let pais = document.querySelector('#pais').value;
    // let result = ;
    // let pais = document.querySelector(('input[name="pais"]') ).value;
    fetch(`https://dev.kidopilabs.com.br/exercicio/covid.php?pais=${pais}`)
        .then(response => response.json())
        .then(data => {
            console.log(data);
            for (i = 0; data.obj > i; i++) {
                console.log(data[i].Confirmados);
            }
            document.querySelector("#result").innerHTML = data[1].Confirmados;
            console.log(data[0].Confirmados);
            document.querySelector('#result').innerHTML = data.Pais.map((pais) => {console.log(pais.Pais)});
        })
        .catch(error => console.error(error))
}

const consumirApi = () => {
    let pais = document.querySelector('#pais').value;
    const response = fetch(`https://dev.kidopilabs.com.br/exercicio/covid.php?pais=${pais}`)
        .then(response => response.json())
        .then(data => console.log(data[0].Confirmados))
        .catch(error => console.log(error))
}